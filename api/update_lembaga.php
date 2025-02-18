<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $id = intval($_REQUEST['id']);
    $nip = $_REQUEST['niplembaga'];
    $start_date = $_REQUEST['start_datelembaga'];
    $end_date = $_REQUEST['end_datelembaga'];
    $kode_organisasi = $_REQUEST['kode_organisasilembaga'];
    $nama_organisasi = $_REQUEST['nama_organisasilembaga'];
    $jabatan = $_REQUEST['jabatanlembaga'];
    $uraian_kegiatan = $_REQUEST['uraian_kegiatanlembaga'];

    $sql = "update r_lembaga set start_date='$start_date',end_date='$end_date',nama_organisasi='$nama_organisasi',jabatan='$jabatan',uraian_kegiatan='$uraian_kegiatan',kode_organisasi='$kode_organisasi' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $status_perubahan = mysqli_affected_rows($koneksi);
        if($status_perubahan>0){
            $sql2 = "update r_lembaga set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
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