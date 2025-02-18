<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include "koneksi_sipeg.php";
    $queryjns = "SELECT * FROM master_restitusi ORDER BY id ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$nama_restitusi = stripslashes ($hasiljns['nama_restitusi']);
        $datanya["value"] = $nama_restitusi;
        $datanya["text"] = $nama_restitusi;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>