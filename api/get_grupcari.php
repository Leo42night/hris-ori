<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include "koneksi.php";
    $queryjns = "SELECT grup FROM master_grup ORDER BY id ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    $datanya["value"] = "";
    $datanya["text"] = "SEMUA";
    array_push($items, $datanya);
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$grup = stripslashes ($hasiljns['grup']);
        $datanya["value"] = $grup;
        $datanya["text"] = $grup;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>