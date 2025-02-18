<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $id = intval($_REQUEST['id']);
    $nip = $_REQUEST['nippembicara'];
    $start_date = $_REQUEST['start_datepembicara'];
    $end_date = $_REQUEST['end_datepembicara'];
    $judul_acara = $_REQUEST['judul_acarapembicara'];
    $kode_penyelenggaraan = $_REQUEST['kode_penyelenggaraanpembicara'];
    $lokasi = $_REQUEST['lokasipembicara'];
    $peserta = $_REQUEST['pesertapembicara'];
    $tingkat_acara = $_REQUEST['tingkat_acarapembicara'];
    $kode_dahan_profesi = $_REQUEST['kode_dahan_profesipembicara'];
        $rs2 = mysqli_query($koneksi,"select * from m_dahan_profesi where kode='$kode_dahan_profesi'");
        $hasil2 = mysqli_fetch_array($rs2);
        $dahan_profesi = stripslashes ($hasil2['label']);
    $kode_diklat = $_REQUEST['kode_diklatpembicara'];
    $judul_diklat = $_REQUEST['judul_diklatpembicara'];
    $udiklat = $_REQUEST['udiklatpembicara'];
    $jenis_pelaksanaan = $_REQUEST['jenis_pelaksanaanpembicara'];
    $jenis_sertifikasi = $_REQUEST['jenis_sertifikasipembicara'];
    $sifat_diklat = $_REQUEST['sifat_diklatpembicara'];

    $sql = "update r_pembicara set start_date='$start_date',end_date='$end_date',judul_acara='$judul_acara',kode_penyelenggaraan='$kode_penyelenggaraan',lokasi='$lokasi',peserta='$peserta',tingkat_acara='$tingkat_acara',kode_dahan_profesi='$kode_dahan_profesi',dahan_profesi='$dahan_profesi',kode_diklat='$kode_diklat',judul_diklat='$judul_diklat',udiklat='$udiklat',jenis_pelaksanaan='$jenis_pelaksanaan',jenis_sertifikasi='$jenis_sertifikasi',sifat_diklat='$sifat_diklat' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $status_perubahan = mysqli_affected_rows($koneksi);
        if($status_perubahan>0){
            $sql2 = "update r_pembicara set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
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