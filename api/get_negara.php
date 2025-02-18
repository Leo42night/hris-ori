<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include "koneksi.php";
    $queryjns = "SELECT * FROM m_negara ORDER BY kode_negara ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$kode_negara = stripslashes ($hasiljns['kode_negara']);
    	$nama_negara = stripslashes ($hasiljns['nama_negara']);
        $datanya["value"] = $kode_negara;
        $datanya["text"] = $nama_negara;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>