<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $sqljns = mysqli_query ($koneksi,"SELECT * FROM master_region ORDER BY id ASC");
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$kd_region = stripslashes ($hasiljns['kd_region']);
    	$nama_region = stripslashes ($hasiljns['nama_region']);
        $lat = stripslashes ($hasiljns['lat']);
        $lon = stripslashes ($hasiljns['lon']);
        $datanya["value"] = $kd_region;
        $datanya["text"] = $nama_region;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>