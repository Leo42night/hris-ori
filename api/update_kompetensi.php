<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    $id = intval($_REQUEST['id']);
    $nip = $_REQUEST['nipdiklat'];
    $start_date = $_REQUEST['start_datekompetensi'];
    $end_date = $_REQUEST['end_datekompetensi'];
    $cluster = $_REQUEST['clusterkompetensi'];
    $kompetensi = $_REQUEST['kompetensi'];
    $rating = $_REQUEST['ratingkompetensi'];
    $deskripsi = $_REQUEST['deskripsikompetensi'];
    $presentase = $_REQUEST['presentasekompetensi'];

    $sql = "update r_kompetensi set start_date='$start_date',end_date='$end_date',cluster='$cluster',kompetensi='$kompetensi',rating='$rating',deskripsi='$deskripsi',presentase='$presentase' where id=$id";
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