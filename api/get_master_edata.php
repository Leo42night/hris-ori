<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if ($userhris){
    function TanggalIndo2($date){
        if($date!="" && $date!=null){
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $result = $tgl . "." . $bulan . ".". $tahun;	
            return($result);
        } else {
            return("");
        }
    }

    include "koneksi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $offset = ($page-1)*$rows;
    $result = array();
    
    $blth2 = isset($_POST['blthedatacari']) ? $_POST['blthedatacari'] : date("Y-m");

    /*
    $rs = mysqli_query($koneksi,"select count(*) from m_edata");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    */
    $result["total"] = 1;    
    
    $rs = mysqli_query($koneksi,"select * from m_edata where nama_file<>'' order by id asc");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id_edata = stripslashes ($hasil['id']);
        $nama_data = stripslashes ($hasil['nama_data']);        
        
        $rs2 = mysqli_query($koneksi,"select * from edata where blth='$blth2' and id_edata=$id_edata order by id asc");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $id = stripslashes ($hasil2['id']);
            $tgl_export = stripslashes ($hasil2['tgl_export']);
            $file_export = stripslashes ($hasil2['file_export']);
            $petugas = stripslashes ($hasil2['petugas']);
            if($petugas!=""){
                $rs3 = mysqli_query($koneksi,"select user_fullname from masteruser where user_name='$petugas'");
                $hasil3 = mysqli_fetch_array($rs3);
                $nama_petugas = stripslashes ($hasil3['user_fullname']);
            } else {
                $nama_petugas = "";
            }
        } else {
            $id = 0;
            $tgl_export = "";
            $file_export = "";
            $petugas = "";
            $nama_petugas = "";
        }
        
        $datanya = array();
        $datanya["idedata"] = $id;
        $datanya["id_edata"] = $id_edata;
        $datanya["nama_dataedata"] = $nama_data;
        $datanya["blthedata"] = $blth2;
        $datanya["tgl_exportedata"] = $tgl_export;
        $datanya["file_exportedata"] = $file_export;
        $datanya["petugasedata"] = $petugas;
        $datanya["nama_petugasedata"] = $nama_petugas;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>