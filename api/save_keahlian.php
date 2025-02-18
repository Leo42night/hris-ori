<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $nip = $_REQUEST['nipkeahlian'];
    $start_date = $_REQUEST['start_datekeahlian'];
    $end_date = $_REQUEST['end_datekeahlian'];
    $kode_profesi = $_REQUEST['kode_profesikeahlian'];
    $tingkat_keahlian = $_REQUEST['tingkat_keahlian'];

    $sql = "insert into r_keahlian";
    $sql .= "(nip,start_date,end_date,kode_profesi,tingkat_keahlian,status_edit,tgl_edit,user_edit)";    
    $sql .= " values('$nip','$start_date','$end_date','$kode_profesi','$tingkat_keahlian','1','$hari_ini','$userhris')";
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