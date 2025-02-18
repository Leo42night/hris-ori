<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $id = intval($_REQUEST['id']);
    $kodemnegara = $_REQUEST['kodemnegara'];
    $namamnegara = $_REQUEST['namamnegara'];

    $sql = "update m_negara set kode_negara='$kodemnegara', nama_negara='$namamnegara' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'id' => $id,
    		'kodemnegara' => $kodemnegara,
    		'namamnegara' => $namamnegara
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>