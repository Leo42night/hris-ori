<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
    $nip = $_REQUEST['nipmedsos'];
    $start_date = $_REQUEST['start_datemedsos'];
    $end_date = $_REQUEST['end_datemedsos'];
    $jenis_medsos = $_REQUEST['jenis_medsos'];
    $id_medsos = $_REQUEST['id_medsos'];

    $sql = "insert into r_medsos";
    $sql .= "(nip,start_date,end_date,jenis_medsos,id_medsos,status_edit,tgl_edit,user_edit)";    
    $sql .= " values('$nip','$start_date','$end_date','$jenis_medsos','$id_medsos','1','$hari_ini','$userhris')";
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