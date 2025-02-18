<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include "koneksi.php";
    /*
    $kode_jenis_jabatan2 = isset($_GET['kode_jenis_jabatan']) ? $_GET['kode_jenis_jabatan'] : "";
    if($kode_jenis_jabatan2==""){
        $queryjns = "SELECT * FROM m_jenjang_jabatan ORDER BY id ASC";
    } else {
        $queryjns = "SELECT * FROM m_jenjang_jabatan where kode_jenis_jabatan='$kode_jenis_jabatan2' ORDER BY id ASC";
    }
    */
    $queryjns = "SELECT * FROM m_jenjang_jabatan ORDER BY id ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$kode = stripslashes ($hasiljns['kode']);
        $label = stripslashes ($hasiljns['label']);
        $datanya["value"] = $kode;
        $datanya["text"] = $kode." | ".$label;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>