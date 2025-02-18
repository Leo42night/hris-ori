<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";
    $queryjns = "SELECT nip,nama FROM data_pegawai ORDER BY id ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$nip = stripslashesx ($hasiljns['nip']);
    	$nama = stripslashesx ($hasiljns['nama']);
        $datanya["value"] = $nip;
        $datanya["text"] = $nip." | ".$nama;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>