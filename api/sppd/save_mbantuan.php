<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $id = intval($_REQUEST['id']);
    $jarak_awal = $_REQUEST['jarak_awalmbantuan'];
    $jarak_akhir = $_REQUEST['jarak_akhirmbantuan'];
    $status = $_REQUEST['statusmbantuan'];
    $tarif = $_REQUEST['tarifmbantuan'];
    $level1 = $_REQUEST['level1mbantuan'];
    $level2 = $_REQUEST['level2mbantuan'];
    $level3 = $_REQUEST['level3mbantuan'];
    $level4 = $_REQUEST['level4mbantuan'];
    $level5 = $_REQUEST['level5mbantuan'];
    $level6 = $_REQUEST['level6mbantuan'];
    $level7 = $_REQUEST['level7mbantuan'];

    $sql = "insert into master_bantuan_mutasi(jarak_awal,jarak_akhir,tarif,status,level1,level2,level3,level4,level5,level6,level7)";
    $sql .= " values('$jarak_awal','$jarak_akhir','$tarif','$status','$level1','$level2','$level3','$level4','$level5','$level6','$level7')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'id' => $id
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>