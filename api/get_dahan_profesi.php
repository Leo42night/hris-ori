<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $queryjns = "SELECT id,kode_dahan_profesi,dahan_profesi FROM m_pohon_profesinew group by kode_dahan_profesi ORDER BY kode_dahan_profesi ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$kode_dahan_profesi = stripslashes ($hasiljns['kode_dahan_profesi']);
    	$dahan_profesi = stripslashes ($hasiljns['dahan_profesi']);
        $datanya["value"] = $kode_dahan_profesi;
        $datanya["text"] = $kode_dahan_profesi." | ".$dahan_profesi;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>