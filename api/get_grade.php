<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include "koneksi.php";
    $queryjns = "SELECT * FROM m_grade ORDER BY id ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
        $kode_grade = stripslashes ($hasiljns['kode_grade']);
    	$label = stripslashes ($hasiljns['label']);
        $datanya["value"] = $kode_grade;
        $datanya["text"] = $label;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>