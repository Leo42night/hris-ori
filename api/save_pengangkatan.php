<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $kode_posisi = $_REQUEST['kode_posisipengangkatan'];
    $nama_posisi = $_REQUEST['nama_posisipengangkatan'];
    $status = $_REQUEST['statuspengangkatan'];
    $start_date = $_REQUEST['start_datepengangkatan'];
    $end_date = $_REQUEST['end_datepengangkatan'];
    $nip = $_REQUEST['nippengangkatan'];
    $job_key = $_REQUEST['job_keypengangkatan'];
    $job_level = $_REQUEST['job_levelpengangkatan'];
    $ftk = $_REQUEST['ftkpengangkatan'];
    $posisi_kunci = $_REQUEST['posisi_kuncipengangkatan'];
    $kode_posisi_atasan = $_REQUEST['kode_posisi_atasanpengangkatan'];
    $nama_posisi_atasan = $_REQUEST['nama_posisi_atasanpengangkatan'];
    $pln_group = "1006";

    $sql = "insert into r_pengangkatan";
    $sql .= "(kode_posisi,nama_posisi,status,start_date,end_date,nip,job_key,job_level,ftk,posisi_kunci,kode_posisi_atasan,nama_posisi_atasan,status_edit,tgl_edit,user_edit)";
    $sql .= " values('$kode_posisi','$nama_posisi','$status','$start_date','$end_date','$nip','$job_key','$job_level','$ftk','$posisi_kunci','$kode_posisi_atasan','$nama_posisi_atasan','1','$hari_ini','$userhris')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'kode_posisi' => $kode_posisi
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>