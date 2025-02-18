<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include "koneksi.php";
    $queryjns = "SELECT * FROM m_jenis_dplk ORDER BY id ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
        $kode = stripslashes ($hasiljns['kode']);
        $jenis_dplk = stripslashes ($hasiljns['jenis_dplk']);
        $datanya["value"] = $kode;
        $datanya["text"] = $jenis_dplk;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>