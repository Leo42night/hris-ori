<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $queryjns = "SELECT * FROM m_provinsi ORDER BY id_provinsi ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$id_provinsi = stripslashes ($hasiljns['id_provinsi']);
        $nama_provinsi = stripslashes ($hasiljns['nama_provinsi']);
        $datanya["value"] = $id_provinsi;
        $datanya["text"] = $nama_provinsi;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>