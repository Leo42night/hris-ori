<?php
session_start();
$regionvsipeg = $_SESSION["kd_regionvsipeg"];
$cabangvsipeg = $_SESSION["kd_cabangvsipeg"];
$idspkvsipeg = $_SESSION["idspkvsipeg"];
$wilayahvsipeg = $_SESSION["kd_wilayahvsipeg"];
$up3vsipeg = $_SESSION["kd_up3vsipeg"];
$uservsipeg = $_SESSION["uservsipeg"];
$namavsipeg = $_SESSION["namavsipeg"];
$idspkvsipeg = $_SESSION["idspkvsipeg"];
$unitvsipeg = $_SESSION["kd_unitvsipeg"];
$approval1vsipeg = $_SESSION["approval1vsipeg"];
if ($uservsipeg){
    include 'koneksi.php';
    $id = intval($_REQUEST['id']);

    $sql = "delete from absensi where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array('success'=>true));
    } else {
    	echo json_encode(array('errorMsg'=>'Gagal hapus data.'));
    }
}
?>