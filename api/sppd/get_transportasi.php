<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    $queryjns = "SELECT * FROM master_transportasi ORDER BY id ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$transportasi = stripslashes ($hasiljns['transportasi']);
        $datanya["value"] = $transportasi;
        $datanya["text"] = $transportasi;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>