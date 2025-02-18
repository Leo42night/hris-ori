<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
    include 'koneksi_sipeg.php';
    $idsppd = $_REQUEST['idsppdpengikut2'];
    $nama = $_REQUEST['namapengikut2'];
    $hubungan = $_REQUEST['hubunganpengikut2'];

    $sql = "insert into pengikut_sppd(idsppd,nama,hubungan) values('$idsppd','$nama','$hubungan')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'idsppd' => $idsppd
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>