<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
    $id = intval($_REQUEST['id']);
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

    $sql = "update r_position_management set kode_posisi='$kode_posisi',nama_posisi='$nama_posisi',status='$status',start_date='$start_date',end_date='$end_date',nip='$nip',job_key='$job_key',job_level='$job_level',ftk='$ftk',posisi_kunci='$posisi_kunci',kode_posisi_atasan='$kode_posisi_atasan',nama_posisi_atasan='$nama_posisi_atasan' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $status_perubahan = mysqli_affected_rows($koneksi);
        if($status_perubahan>0){
            $sql2 = "update r_position_management set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
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