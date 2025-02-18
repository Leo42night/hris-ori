<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    $id = intval($_REQUEST['id']);
    $id_provinsi = $_REQUEST['id_provinsimkabkot'];
    $id_kabupaten = $_REQUEST['id_kabupatenmkabkot'];
    $nama_kabupaten = $_REQUEST['nama_kabupatenmkabkot'];

    $sql = "update m_kabupaten set id_kabupaten='$id_kabupaten', id_provinsi='$id_provinsi', nama_kabupaten='$nama_kabupaten' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'id' => $id,
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>