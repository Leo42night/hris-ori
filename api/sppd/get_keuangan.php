<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";
if ($userhris){
    $queryjns = "SELECT nip,nama,jabatan FROM data_pegawai where nip<>'$userhris' ORDER BY nama ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    $datanya["value"] = "";
    $datanya["text"] = "-";
    array_push($items, $datanya);
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$nip = stripslashesx ($hasiljns['nip']);
    	$nama = stripslashesx ($hasiljns['nama']);
        $jabatan = stripslashesx ($hasiljns['jabatan']);
        $datanya["value"] = $nip;
        $datanya["text"] = $nama." | ".$jabatan;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>