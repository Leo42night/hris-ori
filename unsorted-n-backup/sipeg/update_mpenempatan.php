<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    include 'koneksi_sipeg.php';
    $id = intval($_REQUEST['id']);
    $penempatan = strtoupper(trim($_REQUEST['penempatanmpenempatan']));
    $lat = $_REQUEST['latmpenempatan'];
    $lon = $_REQUEST['lonmpenempatan'];
    $waktu = $_REQUEST['waktumpenempatan'];

    $sql = "update master_penempatan set penempatan='$penempatan',lat='$lat',lon='$lon',waktu='$waktu' where id=$id";
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