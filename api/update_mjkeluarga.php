<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    $id = intval($_REQUEST['id']);
    $idmjkeluarga = $_REQUEST['idmjkeluarga'];
    $labelmjkeluarga = $_REQUEST['labelmjkeluarga'];

    $sql = "update m_jenis_keluarga set id_jenis_keluarga='$idmjkeluarga', label='$labelmjkeluarga' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'id' => $id,
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>