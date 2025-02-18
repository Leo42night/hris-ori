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

    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $offset = ($page-1)*$rows;
    $result = array();
    
    $nama_tabel = $_REQUEST['nama_tabel'];
    $blth = $_REQUEST['blth'];
    //$nama_tabel = "r_alamat";
    //$blth = "2023-01";

    /*
    $rs = mysqli_query($koneksi,"select count(*) from m_edata");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    */
    $result["total"] = 1;    
    
    $rs = mysqli_query($koneksi,"select * from history_update where nama_tabel='$nama_tabel' and SUBSTR(tgl_update_sap, 1, 7)='$blth' order by id desc limit 20");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	//$nama_tabel = stripslashes ($hasil['nama_tabel']);
        $id_data = stripslashes ($hasil['id_data']);
        $tgl_perubahan = stripslashes ($hasil['tgl_perubahan']);
        $user_perubahan = stripslashes ($hasil['user_perubahan']);
        $tgl_update_sap = stripslashes ($hasil['tgl_update_sap']);
        $user_update_sap = stripslashes ($hasil['user_update_sap']);
        $status = stripslashes ($hasil['status']);
        $keterangan = stripslashes ($hasil['keterangan']);

        $rs2 = mysqli_query($koneksi,"select nip from ".$nama_tabel." where id='$id_data' or nip='$id_data'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $nip = stripslashes ($hasil2['nip']);
        } else {
            $nip = "";
        }

        $rs3 = mysqli_query($koneksi,"select nama_data from m_edata where nama_tabel='$nama_tabel'");
        $hasil3 = mysqli_fetch_array($rs3);
        $nama_data = stripslashes ($hasil3['nama_data']);
        
        $datanya = array();
        $datanya["id_datadedata2"] = $id_data;
        $datanya["nipedata2"] = $nip;
        $datanya["nama_dataedata2"] = $nama_data;
        $datanya["tgl_update_sapdedata2"] = $tgl_update_sap;
        $datanya["user_update_sapdedata2"] = $user_update_sap;
        $datanya["statusdedata2"] = $status;
        $datanya["keterangandedata2"] = $keterangan;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>