<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $kode = $_REQUEST['kodemdplk'];
    $jenis_dplk = $_REQUEST['labelmdplk'];

    $sql = "insert into m_jenis_dplk(kode,jenis_dplk) values('$kode','$jenis_dplk')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'labelmdplk' => $jenis_dplk
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>