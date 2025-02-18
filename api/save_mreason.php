<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    $idmreason = $_REQUEST['idmreason'];
    $labelmreason = $_REQUEST['labelmreason'];

    $sql = "insert into m_reason(kode, label) values('$idmreason','$labelmreason')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'idmreason' => $idmreason,
    		'labelmreason' => $labelmreason
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>