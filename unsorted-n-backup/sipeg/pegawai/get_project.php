<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    $sqljns = mysqli_query ($koneksi,"SELECT * FROM data_project ORDER BY id ASC");
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$kd_project_sap = stripslashes ($hasiljns['kd_project_sap']);
    	$nama_project = stripslashes ($hasiljns['nama_project']);
        $datanya["value"] = $kd_project_sap;
        $datanya["text"] = $nama_project;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>