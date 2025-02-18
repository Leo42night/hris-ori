<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $nip = $_REQUEST['nipurjab'];
    $lokasi_file = $_REQUEST['lokasi_fileurjab'];
    $nama_file = $_REQUEST['nama_fileurjab'];
    $no_dokumen = $_REQUEST['no_dokumenurjab'];
    $keterangan = $_REQUEST['keteranganurjab'];

    $sql = "insert into r_urjab";
    $sql .= "(nip,lokasi_file,nama_file,no_dokumen,keterangan)";    
    $sql .= " values('$nip','$lokasi_file','$nama_file','$no_dokumen','$keterangan')";
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