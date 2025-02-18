<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $kd_area = $_REQUEST['kd_area'];
    
    $items = array();
    $datanya = array();
    $datanya["value"] = "";
    $datanya["text"] = "-";
    array_push($items, $datanya);

    $sqljns = mysqli_query ($koneksi,"SELECT nama_unit FROM master_penempatan where kd_area='$kd_area' group by nama_unit ORDER BY nama_unit ASC");
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$nama_unit = stripslashes ($hasiljns['nama_unit']);

        $datanya = array();
        $datanya["value"] = $nama_unit;
        $datanya["text"] = $nama_unit;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>