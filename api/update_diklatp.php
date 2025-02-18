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

    $sql = "update r_diklat_penjenjangan set start_date='$start_date',end_date='$end_date',jenis_diklat='$jenis_diklat',kode_diklat='$kode_diklat',judul_diklat='$judul_diklat',udiklat='$udiklat',kode_profesi='$kode_profesi',level_profesiensi='$level_profesiensi',grade_nilai='$grade_nilai',nilai='$nilai',keterangan_lulus='$keterangan_lulus',keterangan_penyelesaian='$keterangan_penyelesaian',kode_sertifikat='$kode_sertifikat',tgl_terbit='$tgl_terbit',tgl_selesai='$tgl_selesai',kode_transaksi='$kode_transaksi' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $status_perubahan = mysqli_affected_rows($koneksi);
        if($status_perubahan>0){
            $sql2 = "update r_diklat_penjenjangan set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
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