<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $queryjns = "SELECT * FROM m_ee_group ORDER BY kode_ee_group ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$kode_ee_group = stripslashes ($hasiljns['kode_ee_group']);
    	$ee_group = stripslashes ($hasiljns['ee_group']);
        $datanya["value"] = $kode_ee_group;
        $datanya["text"] = $ee_group;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>