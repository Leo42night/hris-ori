<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    $kolom = $_REQUEST['kolommapping'];
    $kode_akun = $_REQUEST['kode_akunmapping'];
    $nama_akun = $_REQUEST['nama_akunmapping'];
    $item_no = $_REQUEST['item_nomapping'];

    $sql = "insert into master_mapping(kolom,kode_akun,nama_akun,item_no) values('$kolom','$kode_akun','$nama_akun','$item_no')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'kolom' => $kolom
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>