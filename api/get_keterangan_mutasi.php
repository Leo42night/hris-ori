<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    $queryjns = "SELECT * FROM m_keterangan_mutasi ORDER BY id ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
        $kode = stripslashes ($hasiljns['kode']);
        $name = stripslashes ($hasiljns['name']);
        $datanya["value"] = $kode;
        $datanya["text"] = $name;
        array_push($items, $datanya);
    }
    echo json_encode($items);
} 

?>