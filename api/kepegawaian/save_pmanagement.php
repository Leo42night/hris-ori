<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $kode_posisi = $_REQUEST['kode_posisipmanagement'];
    $nama_posisi = $_REQUEST['nama_posisipmanagement'];
    $status = $_REQUEST['statuspmanagement'];
    $start_date = $_REQUEST['start_datepmanagement'];
    $end_date = $_REQUEST['end_datepmanagement'];
    $nip = $_REQUEST['nippmanagement'];
    $job_key = $_REQUEST['job_keypmanagement'];
    $job_level = $_REQUEST['job_levelpmanagement'];
    $ftk = $_REQUEST['ftkpmanagement'];
    $posisi_kunci = $_REQUEST['posisi_kuncipmanagement'];
    $kode_posisi_atasan = $_REQUEST['kode_posisi_atasanpmanagement'];
    $nama_posisi_atasan = $_REQUEST['nama_posisi_atasanpmanagement'];
    $pln_group = "1006";

    $sql = "insert into r_position_management";
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