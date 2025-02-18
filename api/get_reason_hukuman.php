<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $queryjns = "SELECT * FROM m_reason_hukuman ORDER BY kode_reason ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$kode_reason = stripslashes ($hasiljns['kode_reason']);
        $label = stripslashes ($hasiljns['label']);
        $datanya["value"] = $kode_reason;
        $datanya["text"] = $kode_reason." | ".$label;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>