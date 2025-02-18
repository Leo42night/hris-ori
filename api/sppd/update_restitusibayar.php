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

    $id = intval($_REQUEST['id']);
    $tgl_bayar = $_REQUEST['tgl_bayarrestitusibayar'];
    $sql = "update sppd1 set bayar_restitusi='1',tgl_bayar_restitusi='$tgl_bayar' where id='$id'";
    $result = @mysqli_query($koneksi,$sql);    
    if($result){
    	echo json_encode(array(
    		'tgl_bayar' => $tgl_bayar
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>