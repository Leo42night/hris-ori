<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include "koneksi.php";
    include "koneksi_sipeg.php";
    $queryjns = "SELECT * FROM jenis_cuti ORDER BY kd_cuti ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$kd_cuti = stripslashes ($hasiljns['kd_cuti']);
    	$nama_cuti = stripslashes ($hasiljns['nama_cuti']);
        $datanya["value"] = $kd_cuti;
        $datanya["text"] = $nama_cuti;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>