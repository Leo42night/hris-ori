<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    $idmjkeluarga = $_REQUEST['idmjkeluarga'];
    $labelmjkeluarga = $_REQUEST['labelmjkeluarga'];

    $sql = "insert into m_jenis_keluarga(id_jenis_keluarga, label) values('$idmjkeluarga','$labelmjkeluarga')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'idmjkeluarga' => $idmjkeluarga,
    		'labelmjkeluarga' => $labelmjkeluarga
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>