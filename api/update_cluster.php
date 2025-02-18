<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $id = intval($_REQUEST['id']);
    $nip = $_REQUEST['nipdiklat'];
    $start_date = $_REQUEST['start_datecluster'];
    $end_date = $_REQUEST['end_datecluster'];
    $assesment = $_REQUEST['assesmentcluster'];
    $cluster = $_REQUEST['cluster'];

    $sql = "update r_cluster set start_date='$start_date',end_date='$end_date',assesment='$assesment',cluster='$cluster' where id=$id";
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