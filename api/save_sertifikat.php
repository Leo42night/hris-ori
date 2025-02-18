<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
    $nip = $_REQUEST['nipsertifikat'];
    $start_date = $_REQUEST['start_datesertifikat'];
    $end_date = $_REQUEST['end_datesertifikat'];
    $jenis_lembaga = $_REQUEST['jenis_lembagasertifikat'];
    $judul_sertifikasi = $_REQUEST['judul_sertifikasisertifikat'];
    $no_sertifikasi = $_REQUEST['no_sertifikasisertifikat'];
    $kode_profesi_sertifikasi = $_REQUEST['kode_profesi_sertifikasisertifikat'];
    $profesi_sertifikasi = $_REQUEST['profesi_sertifikasisertifikat'];
    $level_profesiensi = $_REQUEST['level_profesiensisertifikat'];
    $nama_institusi = $_REQUEST['nama_institusisertifikat'];
    $kota_institusi = $_REQUEST['kota_institusisertifikat'];
    $kota_institusi_sertifikasi = $_REQUEST['kota_institusi_sertifikasisertifikat'];
    $negara_institusi = $_REQUEST['negara_institusisertifikat'];
    $tgl_mulai = $_REQUEST['tgl_mulaisertifikat'];
    $tgl_selesai = $_REQUEST['tgl_selesaisertifikat'];
    $nilai_sertifikasi = $_REQUEST['nilai_sertifikasisertifikat'];
    $level_sertifikasi = $_REQUEST['level_sertifikasisertifikat'];
    $lama_sertifikasi = intval($_REQUEST['lama_sertifikasisertifikat']);
    $satuan_sertifikasi = $_REQUEST['satuan_sertifikasisertifikat'];
    $tgl_expire = $_REQUEST['tgl_expiresertifikat'];
    $kode_transaksi = $_REQUEST['kode_transaksisertifikat'];

    $sql = "insert into r_sertifikat";
    $sql .= "(nip,start_date,end_date,jenis_lembaga,judul_sertifikasi,no_sertifikasi,kode_profesi_sertifikasi,profesi_sertifikasi,level_profesiensi,nama_institusi,kota_institusi,kota_institusi_sertifikasi,negara_institusi,tgl_mulai,tgl_selesai,nilai_sertifikasi,level_sertifikasi,lama_sertifikasi,satuan_sertifikasi,tgl_expire,kode_transaksi,status_edit,tgl_edit,user_edit)";    
    $sql .= " values('$nip','$start_date','$end_date','$jenis_lembaga','$judul_sertifikasi','$no_sertifikasi','$kode_profesi_sertifikasi','$profesi_sertifikasi','$level_profesiensi','$nama_institusi','$kota_institusi','$kota_institusi_sertifikasi','$negara_institusi','$tgl_mulai','$tgl_selesai','$nilai_sertifikasi','$level_sertifikasi','$lama_sertifikasi','$satuan_sertifikasi','$tgl_expire','$kode_transaksi','1','$hari_ini','$userhris')";
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