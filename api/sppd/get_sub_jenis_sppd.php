<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    $jenis_sppd2 = isset($_REQUEST['jenis_sppd']) ? $_REQUEST['jenis_sppd'] : "";
    
    $items = array();
    if($jenis_sppd2=="1"){
        $sqljns = mysqli_query($koneksi,"SELECT * FROM sub_jenis_sppd ORDER BY kd_sub_sppd ASC");
        while ($hasiljns = mysqli_fetch_array ($sqljns)) {
            $kd_sub_sppd = stripslashes ($hasiljns['kd_sub_sppd']);
            $nama_sub_sppd = stripslashes ($hasiljns['nama_sub_sppd']);
            $datanya["value"] = $kd_sub_sppd;
            $datanya["text"] = $nama_sub_sppd;
            array_push($items, $datanya);
        }
    } else {
        $datanya["value"] = "";
        $datanya["text"] = "-";
        array_push($items, $datanya);    
    }
    echo json_encode($items);
}    
?>