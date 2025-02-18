<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    include 'koneksi_sipeg.php';
    $tahun = $_REQUEST['tahuntantiem'];
    $blth = $_REQUEST['blthtantiem'];
    $nip = $_REQUEST['niptantiem'];
    $tantiem = $_REQUEST['tantiemtantiem'];
    $pph21 = $_REQUEST['pph21tantiem'];
    $niptahun = $tahun."-".$nip;

    $sql = "insert into tantiem(blth,tahun,nip,niptahun,tantiem,pph21) values('$blth','$tahun','$nip','$niptahun','$tantiem','$pph21')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'nip' => $nip
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>