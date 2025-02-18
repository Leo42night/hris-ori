<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    $sql = "delete from master_mapping where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array('success'=>true));
    } else {
    	echo json_encode(array('errorMsg'=>'Gagal hapus data.'));
    }
}    
?>