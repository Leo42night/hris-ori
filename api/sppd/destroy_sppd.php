<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    $tanggal = date("Y-m-d", strtotime("+1 hour"));
    $tahun = date("Y", strtotime("+1 hour"));

    $id = intval($_REQUEST['id']);
    $idsppd = $_REQUEST['idsppd'];
    
    $sql = "delete from sppd1 where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $sql2 = "delete from biaya_sppd1 where idsppd='$idsppd'";
        $result2 = @mysqli_query($koneksi,$sql2);
        $sql3 = "delete from biaya_restitusi where idsppd='$idsppd'";
        $result3 = @mysqli_query($koneksi,$sql3);
    
    	echo json_encode(array('success'=>true));
    } else {
    	echo json_encode(array('errorMsg'=>'Gagal hapus data.'));
    }
}    
?>