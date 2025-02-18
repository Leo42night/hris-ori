<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include "koneksi.php";
    $queryjns = "SELECT * FROM m_gelar_belakang ORDER BY id ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    $datanya["value"] = "";
    $datanya["text"] = "-";
    array_push($items, $datanya);
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
        $kode = stripslashes ($hasiljns['kode']);
        $label = stripslashes ($hasiljns['label']);
        $datanya["value"] = $kode;
        $datanya["text"] = $label;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>