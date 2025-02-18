<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";

if ($userhris){
    $queryjns = "SELECT * FROM master_jenis ORDER BY id ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$jenis = stripslashesx ($hasiljns['jenis']);
        $datanya["value"] = $jenis;
        $datanya["text"] = $jenis;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>