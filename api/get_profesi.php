<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include "koneksi.php";
    $queryjns = "SELECT * FROM m_pohon_profesinew group by kode_nama_profesi ORDER BY kode_nama_profesi ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$kode_nama_profesi = stripslashes ($hasiljns['kode_nama_profesi']);
        $nama_profesi = stripslashes ($hasiljns['nama_profesi']);
        $datanya["value"] = $kode_nama_profesi;
        $datanya["text"] = $kode_nama_profesi." | ".$nama_profesi;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>