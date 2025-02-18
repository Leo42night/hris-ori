<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $nip = $_REQUEST['nipkaryatulis'];
    $start_date = $_REQUEST['start_datekaryatulis'];
    $end_date = $_REQUEST['end_datekaryatulis'];
    $judul = $_REQUEST['judulkaryatulis'];
    $media_publikasi = $_REQUEST['media_publikasikaryatulis'];
    $tahun = $_REQUEST['tahunkaryatulis'];
    $kode_jenis = $_REQUEST['kode_jeniskaryatulis'];

    $sql = "insert into r_karya_tulis";
    $sql .= "(nip,start_date,end_date,judul,media_publikasi,tahun,kode_jenis,status_edit,tgl_edit,user_edit)";    
    $sql .= " values('$nip','$start_date','$end_date','$judul','$media_publikasi','$tahun','$kode_jenis','1','$hari_ini','$userhris')";
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