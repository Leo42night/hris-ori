<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    // include "koneksi_teams.php"; ??? db "teams"
    $queryjns = "SELECT * FROM master_region ORDER BY id ASC";
    $sqljns = mysqli_query ($koneksi_teams,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$kd_region_sap = stripslashes ($hasiljns['kd_region_sap']);
        $datanya["value"] = $kd_region_sap;
        $datanya["text"] = $kd_region_sap;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>