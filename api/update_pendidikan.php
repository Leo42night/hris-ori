<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $id = intval($_REQUEST['id']);
    $nip = $_REQUEST['nippendidikan'];
    $start_date = $_REQUEST['start_datependidikan'];
    $end_date = $_REQUEST['end_datependidikan'];
    $keterangan_pendidikan = $_REQUEST['keterangan_pendidikan'];
    $jenis_pendidikan = $_REQUEST['jenis_pendidikan'];
    $jurusan = $_REQUEST['jurusanpendidikan'];
    $nama_institusi = $_REQUEST['nama_institusipendidikan'];
    $kota_institusi = $_REQUEST['kota_institusipendidikan'];
    $kota_institusi_lainnya = $_REQUEST['kota_institusi_lainnyapendidikan'];
    $negara_institusi = $_REQUEST['negara_institusipendidikan'];
    $lama_pendidikan = $_REQUEST['lama_pendidikan'];
    $satuan_lama_pendidikan = $_REQUEST['satuan_lama_pendidikan'];
    $nilai = $_REQUEST['nilaipendidikan'];
    $kode_transaksi = $_REQUEST['kode_transaksipendidikan'];

    $sql = "update r_pendidikan set start_date='$start_date',end_date='$end_date',keterangan_pendidikan='$keterangan_pendidikan',jenis_pendidikan='$jenis_pendidikan',jurusan='$jurusan',nama_institusi='$nama_institusi',kota_institusi='$kota_institusi',kota_institusi_lainnya='$kota_institusi_lainnya',negara_institusi='$negara_institusi',lama_pendidikan='$lama_pendidikan',satuan_lama_pendidikan='$satuan_lama_pendidikan',nilai='$nilai',kode_transaksi='$kode_transaksi' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $status_perubahan = mysqli_affected_rows($koneksi);
        if($status_perubahan>0){
            $sql2 = "update r_pendidikan set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
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