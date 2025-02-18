<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){

    $items = array();
    $datanya["value"] = "SEMUA";
    $datanya["text"] = "SEMUA";
    array_push($items, $datanya);
    $sqljns = mysqli_query ($koneksi,"SELECT kpp FROM setting_pph ORDER BY kpp ASC");
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$kpp = stripslashes ($hasiljns['kpp']);
        $datanya["value"] = $kpp;
        $datanya["text"] = $kpp;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>