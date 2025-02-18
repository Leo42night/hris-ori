<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $kode_ee_group = $_REQUEST['kodemeegroup'];
    $ee_group = $_REQUEST['labelmeegroup'];
    $keterangan = $_REQUEST['keteranganmeegroup'];

    $sql = "insert into m_ee_group(kode_ee_group,ee_group,keterangan) values('$kode_ee_group','$ee_group','$keterangan')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'kode_ee_group' => $kode_ee_group
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>