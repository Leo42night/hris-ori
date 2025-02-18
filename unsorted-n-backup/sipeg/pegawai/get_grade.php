<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/fungsi.php";

if ($userhris){
    $queryjns = "SELECT * FROM master_grade ORDER BY id ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$grade = stripslashesx ($hasiljns['grade']);
        $datanya["value"] = $grade;
        $datanya["text"] = $grade;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>