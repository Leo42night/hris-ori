<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    // include "koneksi_teams.php"; ??? db "teams"
    $kode_departemen2 = isset($_GET['kode_departemen']) ? $_GET['kode_departemen'] : "xxx";
    $perintah = "";
    if($kode_departemen2!=""){
        if($kode_departemen2=="PAPA"){
            $perintah .= " and (kd_project like '$kode_departemen2%' or kd_project like 'MAPA%')";
        } else {
            $perintah .= " and kd_project like '$kode_departemen2%'";
        }
    }

    $queryjns = "SELECT * FROM project_sap where status='tYES'".$perintah." ORDER BY id ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$kd_project = stripslashes ($hasiljns['kd_project']);
    	$nama_project = stripslashes ($hasiljns['nama_project']);
        $datanya["value"] = $kd_project;
        $datanya["text"] = $kd_project." - ".$nama_project;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>