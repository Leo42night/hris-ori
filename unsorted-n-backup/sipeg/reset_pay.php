<?php
session_start();
$userhris = $_SESSION["userakseshris"];
ini_set('date.timezone', 'Asia/Jakarta');
if ($userhris){
    include 'koneksi.php';
    include 'koneksi_sipeg.php';
    $hari_ini = date("Y-m-d");
    $jam_ini = date("H:i:s");
    
    $blth = $_REQUEST['blth'];
    //$blth = "2023-03";
    $sql = "delete from gaji where blth='$blth'";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array('success'=>true));
    } else {
    	echo json_encode(array('errorMsg'=>'Gagal hapus data.'));
    }
}
?>