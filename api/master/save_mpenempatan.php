<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    $id = intval($_REQUEST['id']);
    $penempatan = strtoupper(trim($_REQUEST['penempatanmpenempatan']));
    $lat = $_REQUEST['latmpenempatan'];
    $lon = $_REQUEST['lonmpenempatan'];
    $waktu = $_REQUEST['waktumpenempatan'];

    $sql = "insert into master_penempatan(penempatan,lat,lon,waktu) values('$penempatan','$lat','$lon','$waktu')";
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