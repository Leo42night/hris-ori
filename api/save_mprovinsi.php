<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $idmprovinsi = $_REQUEST['idmprovinsi'];
    $labelmprovinsi = $_REQUEST['labelmprovinsi'];

    $sql = "insert into m_provinsi(id_provinsi, nama_provinsi) values('$idmprovinsi','$labelmprovinsi')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'idmprovinsi' => $idmprovinsi,
    		'labelmprovinsi' => $labelmprovinsi
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>