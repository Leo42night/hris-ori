<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $nip = $_REQUEST['nipalamat'];
    $start_date = $_REQUEST['start_datealamat'];
    $end_date = $_REQUEST['end_datealamat'];
    $jenis_alamat = $_REQUEST['jenis_alamatalamat'];
    $rumah_atas_nama = $_REQUEST['rumah_atas_namaalamat'];
    $alamat_lengkap = $_REQUEST['alamat_lengkapalamat'];
    $id_provinsi = $_REQUEST['id_provinsialamat'];
    $id_kabupaten = $_REQUEST['id_kabupatenalamat'];
    $know_as = $_REQUEST['know_asalamat'];
    $kode_pos = $_REQUEST['kode_posalamat'];
    $negara = $_REQUEST['negaraalamat'];
    $jarak = $_REQUEST['jarakalamat'];

    $sql = "insert into r_alamat";
    $sql .= "(nip,start_date,end_date,jenis_alamat,rumah_atas_nama,alamat_lengkap,id_provinsi,id_kabupaten,kode_pos,negara,jarak,status_edit,tgl_edit,user_edit)";
    $sql .= " values('$nip','$start_date','$end_date','$jenis_alamat','$rumah_atas_nama','$alamat_lengkap','$id_provinsi','$id_kabupaten','$kode_pos','$negara','$jarak','1','$hari_ini','$userhris')";
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