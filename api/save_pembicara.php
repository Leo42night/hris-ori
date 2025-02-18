<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
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

    $sql = "insert into r_pembicara";
    $sql .= "(nip,start_date,end_date,judul_acara,kode_penyelenggaraan,lokasi,peserta,tingkat_acara,kode_dahan_profesi,dahan_profesi,kode_diklat,judul_diklat,udiklat,jenis_pelaksanaan,jenis_sertifikasi,sifat_diklat,status_edit,tgl_edit,user_edit)";    
    $sql .= " values('$nip','$start_date','$end_date','$judul_acara','$kode_penyelenggaraan','$lokasi','$peserta','$tingkat_acara','$kode_dahan_profesi','$dahan_profesi','$kode_diklat','$judul_diklat','$udiklat','$jenis_pelaksanaan','$jenis_sertifikasi','$sifat_diklat','1','$hari_ini','$userhris')";
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