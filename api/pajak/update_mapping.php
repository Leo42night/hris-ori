<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    // include 'koneksi_sipeg.php';
    $id = intval($_REQUEST['id']);
    $kolom = $_REQUEST['kolommapping'];
    $kode_akun = $_REQUEST['kode_akunmapping'];
    $nama_akun = $_REQUEST['nama_akunmapping'];
    $item_no = $_REQUEST['item_nomapping'];

    $sql = "update master_mapping set kolom='$kolom',kode_akun='$kode_akun',nama_akun='$nama_akun',item_no='$item_no' where id=$id";
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