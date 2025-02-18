<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    $kode = $_REQUEST['kodemgbelakang'];
    $label = $_REQUEST['labelmgbelakang'];

    $sql = "insert into m_gelar_belakang(kode,label) values('$kode','$label')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'label' => $label
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>