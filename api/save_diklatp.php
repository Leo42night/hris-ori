<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    $nip = $_REQUEST['nipdiklatp'];
    $start_date = $_REQUEST['start_datediklatp'];
    $end_date = $_REQUEST['end_datediklatp'];
    $jenis_diklat = $_REQUEST['jenis_diklatdiklatp'];
    $kode_diklat = $_REQUEST['kode_diklatdiklatp'];
    $judul_diklat = $_REQUEST['judul_diklatdiklatp'];
    $udiklat = $_REQUEST['udiklatdiklatp'];
    $kode_profesi = $_REQUEST['kode_profesidiklatp'];
    $level_profesiensi = $_REQUEST['level_profesiensidiklatp'];
    $grade_nilai = $_REQUEST['grade_nilaidiklatp'];
    $nilai = $_REQUEST['nilaidiklatp'];
    $keterangan_lulus = $_REQUEST['keterangan_lulusdiklatp'];
    $keterangan_penyelesaian = $_REQUEST['keterangan_penyelesaiandiklatp'];
    $kode_sertifikat = $_REQUEST['kode_sertifikatdiklatp'];
    $tgl_terbit = $_REQUEST['tgl_terbitdiklatp'];
    $tgl_selesai = $_REQUEST['tgl_selesaidiklatp'];
    $kode_transaksi = $_REQUEST['kode_transaksidiklatp'];

    $sql = "insert into r_diklat_penjenjangan";
    $sql .= "(nip,start_date,end_date,jenis_diklat,kode_diklat,judul_diklat,udiklat,kode_profesi,level_profesiensi,grade_nilai,nilai,keterangan_lulus,keterangan_penyelesaian,kode_sertifikat,tgl_terbit,tgl_selesai,kode_transaksi,status_edit,tgl_edit,user_edit)";    
    $sql .= " values('$nip','$start_date','$end_date','$jenis_diklat','$kode_diklat','$judul_diklat','$udiklat','$kode_profesi','$level_profesiensi','$grade_nilai','$nilai','$keterangan_lulus','$keterangan_penyelesaian','$kode_sertifikat','$tgl_terbit','$tgl_selesai','$kode_transaksi','1','$hari_ini','$userhris')";
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