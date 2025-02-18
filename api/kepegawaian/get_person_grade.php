<?php
// digunakan untuk menu input select
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    $queryjns = "SELECT * FROM m_grade ORDER BY id ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    $datanya["value"] = "-"; // opsi awal yg kosong
    $datanya["text"] = "-"; // opsi awal yg kosong
    array_push($items, $datanya);
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
        $kode = stripslashes ($hasiljns['kode_grade']);
        $name = stripslashes ($hasiljns['label']);
        $datanya["value"] = $kode;
        $datanya["text"] = $name;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>