<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $idmagama = $_REQUEST['idmagama'];
    $labelmagama = $_REQUEST['labelmagama'];

    $sql = "insert into m_agama(id_agama, label) values('$idmagama','$labelmagama')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'idmagama' => $idmagama,
    		'labelmagama' => $labelmagama
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>