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
    $approval1 = $_REQUEST['approval1approval'];
    $approval2 = $_REQUEST['approval2approval'];
    $approvalsdm = $_REQUEST['approvalsdmapproval'];
    $approvalbayar = $_REQUEST['approvalbayarapproval'];

    $sql = "update sppd1 set approval1='$approval1',approval2='$approval2',approvalsdm='$approvalsdm',approvalbayar='$approvalbayar' where id=$id";
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