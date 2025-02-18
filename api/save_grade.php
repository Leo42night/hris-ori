<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
    $nip = $_REQUEST['nipgrade'];
    $start_date = $_REQUEST['start_dategrade'];
    $end_date = $_REQUEST['end_dategrade'];
    $grade = $_REQUEST['grade'];
    $level_phdp = $_REQUEST['level_phdpgrade'];
    $kode_reason = $_REQUEST['kode_reasongrade'];
    $kode_subtype = $_REQUEST['kode_subtypegrade'];

    $sql = "insert into r_grade";
    $sql .= "(nip,start_date,end_date,grade,level_phdp,kode_reason,kode_subtype,status_edit,tgl_edit,user_edit)";
    $sql .= " values('$nip','$start_date','$end_date','$grade','$level_phdp','$kode_reason','$kode_subtype','1','$hari_ini','$userhris')";
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