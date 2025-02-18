<?php
error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if ($userhris && $superadminhris=="1"){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $user_name = $_REQUEST['user_nameuser'];
    $user_pass = md5($_REQUEST['user_passuser']);
    if($_REQUEST['superadmin']){
        $superadmin = $_REQUEST['superadmin'];
    } else {
        $superadmin = "0";
    }
    $user_email = $_REQUEST['user_emailuser'];
    $user_fullname = $_REQUEST['user_fullnameuser'];
    $jabatan = $_REQUEST['jabatanuser'];
    $aktif = $_REQUEST['statususer'];
    $foto = "";

    $sql = "insert into masteruser(user_name,user_pass,superadmin,user_email,user_fullname,jabatan,aktif) values('$user_name','$user_pass','$superadmin','$user_email','$user_fullname','$jabatan','$aktif')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'user_name' => $user_name
    	));
    } else {
    	echo json_encode(array('errorMsg'=>'Gagal simpan data.'));
    }
}    
?>