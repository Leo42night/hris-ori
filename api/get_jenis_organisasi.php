<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include "koneksi.php";
    $queryjns = "SELECT * FROM m_jenis_organisasi ORDER BY kode_organisasi ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$kode_organisasi = stripslashes ($hasiljns['kode_organisasi']);
    	$label = stripslashes ($hasiljns['label']);
        $datanya["value"] = $kode_organisasi;
        $datanya["text"] = $label;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>