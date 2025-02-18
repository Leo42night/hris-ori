<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";

if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    $id = intval($_REQUEST['id']);
    $telepon = $_REQUEST['teleponsettingemail'];
    $email = $_REQUEST['emailsettingemail'];
    $email2 = $_REQUEST['email2settingemail'];

    $sql = "update data_pegawai set telepon='$telepon',email='$email',email2='$email2' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array('id' => $id));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>