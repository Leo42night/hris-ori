<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include "koneksi.php";
    $queryjns = "SELECT * FROM m_status_integrasi ORDER BY kode_integrasi ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$kode_integrasi = stripslashes ($hasiljns['kode_integrasi']);
    	$label = stripslashes ($hasiljns['label']);
        $datanya["value"] = $kode_integrasi;
        $datanya["text"] = $label;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>