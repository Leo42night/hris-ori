<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
    $nip = $_REQUEST['nippengajar'];
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

    $sql = "insert into r_pengajar";
    $sql .= "(nip,start_date,end_date,kode_dahan_profesi,dahan_profesi,kode_diklat,judul_diklat,udiklat,jenis_pelaksanaan,jenis_sertifikasi,sifat_diklat,penyelenggaraan,keterangan_pengajar,status_edit,tgl_edit,user_edit)";    
    $sql .= " values('$nip','$start_date','$end_date','$kode_dahan_profesi','$dahan_profesi','$kode_diklat','$judul_diklat','$udiklat','$jenis_pelaksanaan','$jenis_sertifikasi','$sifat_diklat','$penyelenggaraan','$keterangan_pengajar','1','$hari_ini','$userhris')";
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