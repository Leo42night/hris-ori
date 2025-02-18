<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    $id_provinsi = $_REQUEST['id_provinsimkabkot'];
    $id_kabupaten = $_REQUEST['id_kabupatenmkabkot'];
    $nama_kabupaten = $_REQUEST['nama_kabupatenmkabkot'];

    $sql = "insert into m_kabupaten(id_kabupaten, id_provinsi, nama_kabupaten) values('$id_kabupaten','$id_provinsi','$nama_kabupaten')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'id_provinsi' => $id_provinsi
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>