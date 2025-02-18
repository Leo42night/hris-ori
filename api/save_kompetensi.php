<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    $nip = $_REQUEST['nipkompetensi'];
    $start_date = $_REQUEST['start_datekompetensi'];
    $end_date = $_REQUEST['end_datekompetensi'];
    $cluster = $_REQUEST['clusterkompetensi'];
    $kompetensi = $_REQUEST['kompetensi'];
    $rating = $_REQUEST['ratingkompetensi'];
    $deskripsi = $_REQUEST['deskripsikompetensi'];
    $presentase = $_REQUEST['presentasekompetensi'];

    $sql = "insert into r_kompetensi";
    $sql .= "(nip,start_date,end_date,cluster,kompetensi,rating,deskripsi,presentase,status_edit,tgl_edit,user_edit)";    
    $sql .= " values('$nip','$start_date','$end_date','$cluster','$kompetensi','$rating','$deskripsi','$presentase','1','$hari_ini','$userhris')";
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