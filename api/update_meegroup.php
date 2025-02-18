<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $id = intval($_REQUEST['id']);
    $kode_ee_group = $_REQUEST['kodemeegroup'];
    $ee_group = $_REQUEST['labelmeegroup'];
    $keterangan = $_REQUEST['keteranganmeegroup'];

    $sql = "update m_ee_group set kode_ee_group='$kode_ee_group',ee_group='$ee_group',keterangan='$keterangan' where id=$id";
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