<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    $tanggal = date("Y-m-d", strtotime("+1 hour"));
    $tahun = date("Y", strtotime("+1 hour"));

    $usernya = $_REQUEST['usernya'];
    $newpassword = md5("Hris@123");

    $sql = "update masteruser set user_pass='$newpassword' where user_name='$usernya'";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        echo json_encode(array('success'=>true));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>