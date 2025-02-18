<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";

if ($userhris){
    $id = intval($_REQUEST['id']);
    $nip = $_REQUEST['nip'];
    
    $sql = "delete from data_pegawai where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $sql2 = "delete from master_gaji where nip='$nip'";
        $result2 = @mysqli_query($koneksi,$sql2);    
    	echo json_encode(array('success'=>true));
    } else {
    	echo json_encode(array('errorMsg'=>'Gagal hapus data.'));
    }
}    
?>