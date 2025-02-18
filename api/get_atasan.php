<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include "koneksi.php";
    $queryjns = "SELECT nip,nama_lengkap FROM data_pegawai ORDER BY id ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$nip = stripslashes ($hasiljns['nip']);
        $nama_lengkap = stripslashes ($hasiljns['nama_lengkap']);
        $datanya["value"] = $nip;
        $datanya["text"] = $nip." | ".$nama_lengkap;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>