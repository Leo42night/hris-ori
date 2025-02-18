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

    $idsppd = $_REQUEST['idsppd'];
    //$idsppd = "2023000391";

    $sql = "update sppd1 set validasi_restitusi='0',tgl_validasi_restitusi='' where idsppd='$idsppd'";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        echo json_encode(array('success'=>true));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>