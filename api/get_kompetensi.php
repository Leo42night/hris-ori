<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $queryjns = "SELECT * FROM m_kompetensi ORDER BY kode_kompetensi ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$kode = stripslashes ($hasiljns['kode_kompetensi']);
    	$label = stripslashes ($hasiljns['kompetensi']);
        $datanya["value"] = $kode;
        $datanya["text"] = $kode." | ".$label;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>