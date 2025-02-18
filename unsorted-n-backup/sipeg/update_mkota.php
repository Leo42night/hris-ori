<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    include 'koneksi_sipeg.php';
    $id = intval($_REQUEST['id']);
    $kota = $_REQUEST['kotamkota'];

    $sql = "update master_kota set kota='$kota' where id=$id";
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