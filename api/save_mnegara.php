<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $kodemnegara = $_REQUEST['kodemnegara'];
    $namamnegara = $_REQUEST['namamnegara'];

    $sql = "insert into m_negara(kode_negara, nama_negara) values('$kodemnegara','$namamnegara')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'kodemnegara' => $kodemnegara,
    		'namamnegara' => $namamnegara
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>