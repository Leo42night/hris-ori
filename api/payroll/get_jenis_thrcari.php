<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $queryjns = "SELECT * FROM jenis_thr ORDER BY jenisthr ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    $datanya["value"] = "0";
    $datanya["text"] = "SEMUA";
    array_push($items, $datanya);
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$jenisthr = stripslashes ($hasiljns['jenisthr']);
    	$nama_jenisthr = stripslashes ($hasiljns['nama_jenisthr']);
        $datanya["value"] = $jenisthr;
        $datanya["text"] = $nama_jenisthr;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>