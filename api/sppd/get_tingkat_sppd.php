<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    $queryjns = "SELECT * FROM tingkat_sppd ORDER BY kd_tingkat ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$kd_tingkat = stripslashes ($hasiljns['kd_tingkat']);
    	$nama_tingkat = stripslashes ($hasiljns['nama_tingkat']);
        $datanya["value"] = $kd_tingkat;
        $datanya["text"] = $nama_tingkat;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>