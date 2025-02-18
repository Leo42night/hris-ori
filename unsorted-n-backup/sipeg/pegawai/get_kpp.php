<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/fungsi.php";

if ($userhris){
    $sqljns = mysqli_query ($koneksi,"SELECT kpp FROM setting_pph ORDER BY kpp ASC");
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$kpp = stripslashesx ($hasiljns['kpp']);
        $datanya["value"] = $kpp;
        $datanya["text"] = $kpp;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>