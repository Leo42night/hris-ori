<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
    $id = intval($_REQUEST['id']);
    $nip = $_REQUEST['nipatasan'];
    $start_date_jabatan = $_REQUEST['start_date_jabatanatasan'];
    $start_date = $_REQUEST['start_dateatasan'];
    $end_date = $_REQUEST['end_dateatasan'];
    $jabatan_atasan = $_REQUEST['jabatan_atasan'];
    $nip_atasan = $_REQUEST['nip_atasan'];
    $nama_atasan = $_REQUEST['nama_atasan'];
    $kode_posisi = $_REQUEST['kode_posisiatasan'];

    $sql = "update r_atasan set start_date_jabatan='$start_date_jabatan',start_date='$start_date',end_date='$end_date',jabatan_atasan='$jabatan_atasan',nip_atasan='$nip_atasan',nama_atasan='$nama_atasan',kode_posisi='$kode_posisi' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $status_perubahan = mysqli_affected_rows($koneksi);
        if($status_perubahan>0){
            $sql2 = "update r_atasan set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
            $result2 = @mysqli_query($koneksi,$sql2);
        }
    	echo json_encode(array(
    		'id' => $id
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>