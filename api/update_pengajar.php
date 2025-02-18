<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
    $id = intval($_REQUEST['id']);
    $nip = $_REQUEST['nipdiklat'];
    $start_date = $_REQUEST['start_datepengajar'];
    $end_date = $_REQUEST['end_datepengajar'];
    $kode_dahan_profesi = $_REQUEST['kode_dahan_profesipengajar'];
        $rs2 = mysqli_query($koneksi,"select * from m_dahan_profesi where kode='$kode_dahan_profesi'");
        $hasil2 = mysqli_fetch_array($rs2);
        $dahan_profesi = stripslashes ($hasil2['label']);
    $kode_diklat = $_REQUEST['kode_diklatpengajar'];
    $judul_diklat = $_REQUEST['judul_diklatpengajar'];
    $udiklat = $_REQUEST['udiklatpengajar'];
    $jenis_pelaksanaan = $_REQUEST['jenis_pelaksanaanpengajar'];
    $jenis_sertifikasi = $_REQUEST['jenis_sertifikasipengajar'];
    $sifat_diklat = $_REQUEST['sifat_diklatpengajar'];
    $penyelenggaraan = $_REQUEST['penyelenggaraanpengajar'];
    $keterangan_pengajar = $_REQUEST['keterangan_pengajar'];

    $sql = "update r_pengajar set start_date='$start_date',end_date='$end_date',kode_dahan_profesi='$kode_dahan_profesi',dahan_profesi='$dahan_profesi',kode_diklat='$kode_diklat',judul_diklat='$judul_diklat',udiklat='$udiklat',jenis_pelaksanaan='$jenis_pelaksanaan',jenis_sertifikasi='$jenis_sertifikasi',sifat_diklat='$sifat_diklat',penyelenggaraan='$penyelenggaraan',keterangan_pengajar='$keterangan_pengajar' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $status_perubahan = mysqli_affected_rows($koneksi);
        if($status_perubahan>0){
            $sql2 = "update r_pengajar set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
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