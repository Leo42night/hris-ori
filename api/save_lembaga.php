<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $nip = $_REQUEST['niplembaga'];
    $start_date = $_REQUEST['start_datelembaga'];
    $end_date = $_REQUEST['end_datelembaga'];
    $kode_organisasi = $_REQUEST['kode_organisasilembaga'];
    $nama_organisasi = $_REQUEST['nama_organisasilembaga'];
    $jabatan = $_REQUEST['jabatanlembaga'];
    $uraian_kegiatan = $_REQUEST['uraian_kegiatanlembaga'];

    $sql = "insert into r_lembaga";
    $sql .= "(nip,start_date,end_date,nama_organisasi,jabatan,uraian_kegiatan,kode_organisasi,status_edit,tgl_edit,user_edit)";    
    $sql .= " values('$nip','$start_date','$end_date','$nama_organisasi','$jabatan','$uraian_kegiatan','$kode_organisasi','1','$hari_ini','$userhris')";
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