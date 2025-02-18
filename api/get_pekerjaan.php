<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $queryjns = "SELECT * FROM m_pekerjaan ORDER BY id ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$label = stripslashes ($hasiljns['label']);
        $datanya["value"] = $label;
        $datanya["text"] = $label;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>