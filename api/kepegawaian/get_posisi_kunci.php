<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $queryjns = "SELECT * FROM m_posisi_kunci ORDER BY kode ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
        $kode = stripslashes ($hasiljns['kode']);
        $label = stripslashes ($hasiljns['label']);
        $datanya["value"] = $kode;
        $datanya["text"] = $kode." | ".$label;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>