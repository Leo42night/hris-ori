<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    $idmplng = $_REQUEST['idmplng'];
    $labelmplng = $_REQUEST['labelmplng'];

    $sql = "insert into m_pln_group(kode, label) values('$idmplng','$labelmplng')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'idmplng' => $idmplng,
    		'labelmplng' => $labelmplng
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>