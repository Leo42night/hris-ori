<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    $id = intval($_REQUEST['id']);

    $sql = "delete from ijin where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array('success'=>true));
    } else {
    	echo json_encode(array('errorMsg'=>'Gagal hapus data.'));
    }
}
?>