<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
    $nip = $_REQUEST['nippenugasan'];
    $start_date = $_REQUEST['start_datepenugasan'];
    $end_date = $_REQUEST['end_datepenugasan'];
    $tupoksi = $_REQUEST['tupoksipenugasan'];
    $peran = $_REQUEST['peranpenugasan'];
    $penugasan = $_REQUEST['penugasanpenugasan'];

    $sql = "insert into r_penugasan";
    $sql .= "(nip,start_date,end_date,tupoksi,peran,penugasan,status_edit,tgl_edit,user_edit)";    
    $sql .= " values('$nip','$start_date','$end_date','$tupoksi','$peran','$penugasan','1','$hari_ini','$userhris')";
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