<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";
if ($userhris){
    $kolom = $_REQUEST['kolom'];

    $items = array();
    $datanya["value"] = "";
    $datanya["text"] = "-";
    array_push($items, $datanya);

    $sql = mysqli_query($koneksi,"select * from master_mapping where kolom='$kolom'");
    while ($hasil = mysqli_fetch_array ($sql)) {
    	$kode_akun = stripslashesx ($hasil['kode_akun']);
        $nama_akun = stripslashesx ($hasil['nama_akun']);
        $datanya["value"] = $kode_akun;
        $datanya["text"] = $kode_akun." - ".$nama_akun;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>