<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    $id = intval($_REQUEST['id']);
    $kode = $_REQUEST['kodemgbelakang'];
    $label = $_REQUEST['labelmgbelakang'];

    $sql = "update m_gelar_belakang set kode='$kode',label='$label' where id=$id";
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