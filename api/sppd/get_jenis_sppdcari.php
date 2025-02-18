<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    $queryjns = "SELECT * FROM jenis_sppd ORDER BY kd_sppd ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    $datanya["value"] = "semua";
    $datanya["text"] = "Semua";
    array_push($items, $datanya);
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$kd_sppd = stripslashes ($hasiljns['kd_sppd']);
    	$nama_sppd = stripslashes ($hasiljns['nama_sppd']);
        $datanya["value"] = $kd_sppd;
        $datanya["text"] = $nama_sppd;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>