<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $personal_area = $_REQUEST['personal_area'];
    $queryjns = "SELECT * FROM m_personal_sub_area WHERE personal_area='$personal_area' ORDER BY kode ASC";
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