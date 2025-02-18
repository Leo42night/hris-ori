<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    $kode = $_REQUEST['kodembarea'];
    $label = $_REQUEST['labelmbarea'];

    $sql = "insert into m_business_area(kode,label) values('$kode','$label')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'kode' => $kode
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>