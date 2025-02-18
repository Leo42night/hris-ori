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
    
    $blth2 = isset($_POST['blthedata2cari']) ? $_POST['blthedata2cari'] : date("Y-m");

    /*
    $rs = mysqli_query($koneksi,"select count(*) from m_edata");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    */
    $result["total"] = 1;    
    
    $rs = mysqli_query($koneksi,"select * from m_edata where status='1' and url<>'' order by id asc");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id_edata = stripslashes ($hasil['id']);
        $nama_data = stripslashes ($hasil['nama_data']);
        $nama_tabel = stripslashes ($hasil['nama_tabel']);
        //$nama_tabel_update = stripslashes ($hasil['nama_tabel_update']);
        //$url_api = stripslashes ($hasil['url_api']);
        $url = stripslashes ($hasil['url']);
        
        $rs2 = mysqli_query($koneksi,"select count(*) as jumlah_data from ".$nama_tabel." where status_edit='1'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $jumlah_data = intval($hasil2['jumlah_data']);
        } else {
            $jumlah_data = 0;
        }
        
        $datanya = array();
        $datanya["idedata2"] = $id_edata;
        $datanya["id_edata2"] = $id_edata;
        $datanya["nama_dataedata2"] = $nama_data;
        $datanya["nama_tabeledata2"] = $nama_tabel;
        //$datanya["nama_tabel_updateedata2"] = $nama_tabel_update;
        $datanya["jumlah_dataedata2"] = $jumlah_data;
        //$datanya["url_apiedata2"] = $url_api;
        $datanya["urledata2"] = $url;
        $datanya["blthedata2"] = $blth2;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>