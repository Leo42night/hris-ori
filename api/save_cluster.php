<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    $nip = $_REQUEST['nipcluster'];
    $start_date = $_REQUEST['start_datecluster'];
    $end_date = $_REQUEST['end_datecluster'];
    $assesment = $_REQUEST['assesmentcluster'];
    $cluster = $_REQUEST['cluster'];

    $sql = "insert into r_cluster";
    $sql .= "(nip,start_date,end_date,assesment,cluster)";    
    $sql .= " values('$nip','$start_date','$end_date','$assesment','$cluster')";
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