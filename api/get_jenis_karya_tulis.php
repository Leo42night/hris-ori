<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $queryjns = "SELECT * FROM m_jenis_karya_tulis ORDER BY kode_jenis ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$kode_jenis = stripslashes ($hasiljns['kode_jenis']);
    	$label = stripslashes ($hasiljns['label']);
        $datanya["value"] = $kode_jenis;
        $datanya["text"] = $label;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>