<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include "koneksi.php";
    $queryjns = "SELECT * FROM m_satuan_lama_pendidikan ORDER BY id ASC";
    //$queryjns = "SELECT * FROM m_satuan ORDER BY id ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
        $kode = stripslashes ($hasiljns['kode']);
    	$label = stripslashes ($hasiljns['label']);
        $datanya["value"] = $kode;
        $datanya["text"] = $label;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>