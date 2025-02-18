<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if ($userhris && $superadminhris=="1"){
    include 'koneksi.php';
    $id = intval($_REQUEST['id']);
    if($_REQUEST['superadmin']){
        $superadmin = $_REQUEST['superadmin'];
    } else {
        $superadmin = "0";
    }
    $user_email = $_REQUEST['user_emailuser'];
    $user_fullname = $_REQUEST['user_fullnameuser'];
    $jabatan = $_REQUEST['jabatanuser'];
    $aktif = $_REQUEST['statususer'];

    $sql = "update masteruser set superadmin='$superadmin',user_email='$user_email',user_fullname='$user_fullname',jabatan='$jabatan',aktif='$aktif' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'id' => $id
    	));
    } else {
    	echo json_encode(array('errorMsg'=>'Gagal simpan data.'));
    }
}    
?>