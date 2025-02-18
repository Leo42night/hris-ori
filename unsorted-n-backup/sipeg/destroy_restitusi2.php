<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi_sipeg.php';
    date_default_timezone_set("Asia/Jakarta");

    $id = intval($_REQUEST['id']);
    //$id = 2921;

    $sql = "delete from biaya_restitusi where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array('success'=>true));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>