<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include "koneksi.php";
    include "koneksi_teams.php";
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