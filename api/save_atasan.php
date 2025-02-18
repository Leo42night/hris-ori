<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
    $nip = $_REQUEST['nipatasan'];
    $start_date_jabatan = $_REQUEST['start_date_jabatanatasan'];
    $start_date = $_REQUEST['start_dateatasan'];
    $end_date = $_REQUEST['end_dateatasan'];
    $jabatan_atasan = $_REQUEST['jabatan_atasan'];
    $nip_atasan = $_REQUEST['nip_atasan'];
    $nama_atasan = $_REQUEST['nama_atasan'];
    $kode_posisi = $_REQUEST['kode_posisiatasan'];

    $sql = "insert into r_atasan";
    $sql .= "(nip,start_date_jabatan,start_date,end_date,jabatan_atasan,nip_atasan,nama_atasan,kode_posisi,status_edit,tgl_edit,user_edit)";    
    $sql .= " values('$nip',start_date_jabatan,'$start_date','$end_date','$jabatan_atasan','$nip_atasan','$nama_atasan','$kode_posisi','1','$hari_ini','$userhris')";
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