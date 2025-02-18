<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $id = intval($_REQUEST['id']);
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

    $sql = "update r_sertifikat set start_date='$start_date',end_date='$end_date',jenis_lembaga='$jenis_lembaga',judul_sertifikasi='$judul_sertifikasi',no_sertifikasi='$no_sertifikasi',kode_profesi_sertifikasi='$kode_profesi_sertifikasi',profesi_sertifikasi='$profesi_sertifikasi',level_profesiensi='$level_profesiensi',nama_institusi='$nama_institusi',kota_institusi='$kota_institusi',kota_institusi_sertifikasi='$kota_institusi_sertifikasi',negara_institusi='$negara_institusi',tgl_mulai='$tgl_mulai',tgl_selesai='$tgl_selesai',nilai_sertifikasi='$nilai_sertifikasi',level_sertifikasi='$level_sertifikasi',lama_sertifikasi='$lama_sertifikasi',satuan_sertifikasi='$satuan_sertifikasi',tgl_expire='$tgl_expire',kode_transaksi='$kode_transaksi' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $status_perubahan = mysqli_affected_rows($koneksi);
        if($status_perubahan>0){
            $sql2 = "update r_sertifikat set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
            $result2 = @mysqli_query($koneksi,$sql2);
        }
    	echo json_encode(array(
    		'nip' => $nip
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>