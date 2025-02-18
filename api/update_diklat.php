<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $id = intval($_REQUEST['id']);
    $nip = $_REQUEST['nipdiklat'];
    $start_date = $_REQUEST['start_datediklat'];
    $end_date = $_REQUEST['end_datediklat'];
    $jenis_diklat = $_REQUEST['jenis_diklat'];
    $kode_diklat = $_REQUEST['kode_diklat'];
    $judul_diklat = $_REQUEST['judul_diklat'];
    $penyelenggaraan = $_REQUEST['penyelenggaraandiklat'];
    $kode_profesi = $_REQUEST['kode_profesidiklat'];
    $level_profesiensi = $_REQUEST['level_profesiensidiklat'];
    $nama_institusi = $_REQUEST['nama_institusidiklat'];
    $kota_institusi = $_REQUEST['kota_institusidiklat'];
    $kota_lainnya = $_REQUEST['kota_lainnyadiklat'];
    $negara_institusi = $_REQUEST['negara_institusidiklat'];
    $lama_diklat = $_REQUEST['lama_diklat'];
    $satuan_diklat = $_REQUEST['satuan_diklat'];
    $nilai = $_REQUEST['nilaidiklat'];
    $grade_nilai = $_REQUEST['grade_nilaidiklat'];
    $jenis_pelaksanaan = $_REQUEST['jenis_pelaksanaandiklat'];
    $jenis_sertifikasi = $_REQUEST['jenis_sertifikasidiklat'];
    $sifat_diklat = $_REQUEST['sifat_diklat'];
    $konfirmasi_kehadiran = $_REQUEST['konfirmasi_kehadirandiklat'];
    $keterangan_lulus = $_REQUEST['keterangan_lulusdiklat'];
    $kode_sertifikat = $_REQUEST['kode_sertifikatdiklat'];
    $tgl_terbit = $_REQUEST['tgl_terbitdiklat'];
    $tgl_selesai = $_REQUEST['tgl_selesaidiklat'];
    $udiklat = $_REQUEST['udiklatdiklat'];
    $keterangan_realisasi = $_REQUEST['keterangan_realisasidiklat'];
    $keterangan_penyelesaian = $_REQUEST['keterangan_penyelesaiandiklat'];
    $kode_dahan_profesi = $_REQUEST['kode_dahan_profesidiklat'];
        $rs2 = mysqli_query($koneksi,"select * from m_dahan_profesi where kode='$kode_dahan_profesi'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $dahan_profesi = stripslashes ($hasil2['label']);
        } else {
            $dahan_profesi = "";
        }
    $kode_transaksi = $_REQUEST['kode_transaksidiklat'];

    $sql = "update r_diklat set start_date='$start_date',end_date='$end_date',jenis_diklat='$jenis_diklat',kode_diklat='$kode_diklat',judul_diklat='$judul_diklat',penyelenggaraan='$penyelenggaraan',kode_profesi='$kode_profesi',level_profesiensi='$level_profesiensi',nama_institusi='$nama_institusi',kota_institusi='$kota_institusi',kota_lainnya='$kota_lainnya',negara_institusi='$negara_institusi',lama_diklat='$lama_diklat',satuan_diklat='$satuan_diklat',nilai='$nilai',grade_nilai='$grade_nilai',jenis_pelaksanaan='$jenis_pelaksanaan',jenis_sertifikasi='$jenis_sertifikasi',sifat_diklat='$sifat_diklat',konfirmasi_kehadiran='$konfirmasi_kehadiran',keterangan_lulus='$keterangan_lulus',kode_sertifikat='$kode_sertifikat',tgl_terbit='$tgl_terbit',tgl_selesai='$tgl_selesai',udiklat='$udiklat',keterangan_realisasi='$keterangan_realisasi',keterangan_penyelesaian='$keterangan_penyelesaian',kode_dahan_profesi='$kode_dahan_profesi',dahan_profesi='$dahan_profesi',kode_transaksi='$kode_transaksi' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $status_perubahan = mysqli_affected_rows($koneksi);
        if($status_perubahan>0){
            $sql2 = "update r_diklat set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
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