<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $nip = $_REQUEST['nippendidikan'];
    $start_date = $_REQUEST['start_datependidikan'];
    $end_date = $_REQUEST['end_datependidikan'];
    $keterangan_pendidikan = $_REQUEST['keterangan_pendidikan'];
    $jenis_pendidikan = $_REQUEST['jenis_pendidikan'];
    //$judul_kursus = $_REQUEST['judul_kursuspendidikan'];
    $jurusan = $_REQUEST['jurusanpendidikan'];
    $nama_institusi = $_REQUEST['nama_institusipendidikan'];
    $kota_institusi = $_REQUEST['kota_institusipendidikan'];
    $kota_institusi_lainnya = $_REQUEST['kota_institusi_lainnyapendidikan'];
    $negara_institusi = $_REQUEST['negara_institusipendidikan'];
    $lama_pendidikan = $_REQUEST['lama_pendidikan'];
    $satuan_lama_pendidikan = $_REQUEST['satuan_lama_pendidikan'];
    $nilai = $_REQUEST['nilaipendidikan'];
    $kode_transaksi = $_REQUEST['kode_transaksipendidikan'];

    $sql = "insert into r_pendidikan";
    $sql .= "(nip,start_date,end_date,keterangan_pendidikan,jenis_pendidikan,jurusan,nama_institusi,kota_institusi,kota_institusi_lainnya,negara_institusi,lama_pendidikan,satuan_lama_pendidikan,nilai,kode_transaksi,status_edit,tgl_edit,user_edit)";
    $sql .= " values('$nip','$start_date','$end_date','$keterangan_pendidikan','$jenis_pendidikan','$jurusan','$nama_institusi','$kota_institusi','$kota_institusi_lainnya','$negara_institusi','$lama_pendidikan','$satuan_lama_pendidikan','$nilai','$kode_transaksi','1','$hari_ini','$userhris')";
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