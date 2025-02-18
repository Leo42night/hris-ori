<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $id = intval($_REQUEST['id']);
    $nip = $_REQUEST['nipkaryatulis'];
    $start_date = $_REQUEST['start_datekaryatulis'];
    $end_date = $_REQUEST['end_datekaryatulis'];
    $judul = $_REQUEST['judulkaryatulis'];
    $media_publikasi = $_REQUEST['media_publikasikaryatulis'];
    $tahun = $_REQUEST['tahunkaryatulis'];
    $kode_jenis = $_REQUEST['kode_jeniskaryatulis'];

    $sql = "update r_karya_tulis set start_date='$start_date',end_date='$end_date',judul='$judul',media_publikasi='$media_publikasi',tahun='$tahun',kode_jenis='$kode_jenis' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $status_perubahan = mysqli_affected_rows($koneksi);
        if($status_perubahan>0){
            $sql2 = "update r_karya_tulis set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
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