<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $nama2 = isset($_POST['namavendorcari']) ? $_POST['namavendorcari'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $perintah = "";
    if($nama2!=""){
        if($perintah==""){
            $perintah .= " where nama_vendor like '%$nama2%'";
        } else {
            $perintah .= " and nama_vendor like '%$nama2%'";
        }
    }
    
    $rs = mysqli_query($koneksi,"select count(*) from data_vendor".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from data_vendor".$perintah." order by id asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
        $kd_vendor = stripslashes ($hasil['kd_vendor']);
        $nama_vendor = stripslashes ($hasil['nama_vendor']);
        $valid = stripslashes ($hasil['valid']);
        
        $datanya = array();
        $datanya["idvendor"] = $id;
        $datanya["kd_vendorvendor"] = $kd_vendor;
        $datanya["nama_vendorvendor"] = $nama_vendor;
        $datanya["validvendor"] = $valid;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>