<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");

    $nip = $_REQUEST['nip'];

    $sql = "update data_pegawai set kode_device='' where nip='$nip'";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        echo json_encode(array('success'=>true));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>