<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi_sipeg.php';
    $id = intval($_REQUEST['id']);
    $nip = $_REQUEST['niptpesangon'];
    $blth = $_REQUEST['blthtpesangon'];
    $uang_pesangon = $_REQUEST['uang_pesangontpesangon'];

    $sql = "update pesangon set uang_pesangon='$uang_pesangon' where id=$id";
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