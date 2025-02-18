<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    $id = intval($_REQUEST['id']);
    $kpp = $_REQUEST['kppkpp'];
    $npwp_pemotong = $_REQUEST['npwp_pemotongkpp'];
    $nama_pemotong = $_REQUEST['nama_pemotongkpp'];
    $npwp_pejabat = $_REQUEST['npwp_pejabatkpp'];
    $nama_pejabat = $_REQUEST['nama_pejabatkpp'];
    $alamat = $_REQUEST['alamatkpp'];
    $alamat2 = $_REQUEST['alamat2kpp'];
    $telepon = $_REQUEST['teleponkpp'];
    $email = $_REQUEST['emailkpp'];

    $sql = "update setting_pph set kpp='$kpp',npwp_pemotong='$npwp_pemotong',nama_pemotong='$nama_pemotong',npwp_pejabat='$npwp_pejabat',nama_pejabat='$nama_pejabat',alamat='$alamat',alamat2='$alamat2',telepon='$telepon',email='$email' where id=$id";
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