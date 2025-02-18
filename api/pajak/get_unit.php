<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include "koneksi.php";
    include "koneksi_sipeg.php";
    $sqljns = mysqli_query ($koneksi,"SELECT nama_unit FROM master_penempatan group by nama_unit ORDER BY nama_unit ASC");
    $items = array();
    $datanya = array();
    $datanya["value"] = "";
    $datanya["text"] = "-";
    array_push($items, $datanya);

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