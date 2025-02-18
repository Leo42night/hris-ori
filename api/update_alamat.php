<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
    $id = intval($_REQUEST['id']);    
    $start_date = $_REQUEST['start_datealamat'];
    $end_date = $_REQUEST['end_datealamat'];
    $jenis_alamat = $_REQUEST['jenis_alamatalamat'];
    $rumah_atas_nama = $_REQUEST['rumah_atas_namaalamat'];
    $alamat_lengkap = $_REQUEST['alamat_lengkapalamat'];
    $id_provinsi = $_REQUEST['id_provinsialamat'];
    $id_kabupaten = $_REQUEST['id_kabupatenalamat'];
    $know_as = $_REQUEST['know_asalamat'];
    $kode_pos = trim($_REQUEST['kode_posalamat']);
    $negara = $_REQUEST['negaraalamat'];
    $jarak = $_REQUEST['jarakalamat'];
    /*
    $rs = mysqli_query($koneksi,"select * from r_alamat where id='$id'");
    $hasil = mysqli_fetch_array($rs);
    $nip = stripslashes ($hasil['nip']);
    $h_start_date = stripslashes ($hasil['start_date']);
    $h_end_date = stripslashes ($hasil['end_date']);
    $h_jenis_alamat = stripslashes ($hasil['jenis_alamat']);
    $h_rumah_atas_nama = stripslashes ($hasil['rumah_atas_nama']);
    $h_alamat_lengkap = stripslashes ($hasil['alamat_lengkap']);
    $h_id_provinsi = stripslashes ($hasil['id_provinsi']);
    $h_id_kabupaten = stripslashes ($hasil['id_kabupaten']);
    $h_know_as = stripslashes ($hasil['know_as']);
    $h_kode_pos = stripslashes ($hasil['kode_pos']);
    $h_negara = stripslashes ($hasil['negara']);
    $h_jarak = stripslashes ($hasil['jarak']);

    $id_update = $userhris."-".time();
    */
    $sql = "update r_alamat set start_date='$start_date',end_date='$end_date',jenis_alamat='$jenis_alamat',rumah_atas_nama='$rumah_atas_nama',alamat_lengkap='$alamat_lengkap',id_provinsi='$id_provinsi',id_kabupaten='$id_kabupaten',kode_pos='$kode_pos',negara='$negara',jarak='$jarak' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $status_perubahan = mysqli_affected_rows($koneksi);
        if($status_perubahan>0){
            $sql2 = "update r_alamat set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
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