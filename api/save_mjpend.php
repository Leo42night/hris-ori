<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    $idmjpend = $_REQUEST['idmjpend'];
    $labelmjpend = $_REQUEST['labelmjpend'];

    $sql = "insert into m_jenis_pendidikan(kode, label) values('$idmjpend','$labelmjpend')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'idmjpend' => $idmjpend,
    		'labelmjpend' => $labelmjpend
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>