<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    include 'koneksi_sipeg.php';
    $id = intval($_REQUEST['id']);
    $tahun = $_REQUEST['tahuntantiem'];
    $blth = $_REQUEST['blthtantiem'];
    $nip = $_REQUEST['niptantiem'];
    $tantiem = $_REQUEST['tantiemtantiem'];
    $pph21 = $_REQUEST['pph21tantiem'];
    $niptahun = $tahun."-".$nip;

    $sql = "update tantiem set blth='$blth',tahun='$tahun',nip='$nip',niptahun='$niptahun',tantiem='$tantiem',pph21='$pph21' where id='$id'";
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