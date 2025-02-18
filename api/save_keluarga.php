<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
    $nip = $_REQUEST['nipkeluarga'];
    $start_date = $_REQUEST['start_datekeluarga'];
    $end_date = $_REQUEST['end_datekeluarga'];
    $id_jenis_keluarga = $_REQUEST['id_jenis_keluargakeluarga'];
    $no_urut = $_REQUEST['no_urutkeluarga'];
    $nama = $_REQUEST['namakeluarga'];
    $jenis_kelamin = $_REQUEST['jenis_kelaminkeluarga'];
    $tempat_lahir = $_REQUEST['tempat_lahirkeluarga'];
    $tgl_lahir = $_REQUEST['tgl_lahirkeluarga'];
    $id_agama = $_REQUEST['id_agamakeluarga'];
    $pekerjaan = $_REQUEST['pekerjaankeluarga'];
    $pln_group = $_REQUEST['pln_groupkeluarga'];
    $kode_perusahaan = $_REQUEST['kode_perusahaankeluarga'];
    $nip_keluarga = $_REQUEST['nip_keluargakeluarga'];
    $status_warganegara = $_REQUEST['status_warganegarakeluarga'];
    $jenis_alamat = $_REQUEST['jenis_alamatkeluarga'];
    $alamat = $_REQUEST['alamatkeluarga'];
    $id_provinsi = $_REQUEST['id_provinsikeluarga'];
    $id_kabupaten = $_REQUEST['id_kabupatenkeluarga'];
    $kode_pos = $_REQUEST['kode_poskeluarga'];
    $no_kk = $_REQUEST['no_kkkeluarga'];
    $nik = $_REQUEST['nikkeluarga'];
    $npwp = $_REQUEST['npwpkeluarga'];
    $telepon = $_REQUEST['teleponkeluarga'];
    $gol_darah = $_REQUEST['gol_darahkeluarga'];
    $no_bpjs_kes = $_REQUEST['no_bpjs_keskeluarga'];

    $sql = "insert into r_keluarga";
    $sql .= "(nip,start_date,end_date,id_jenis_keluarga,no_urut,nama,jenis_kelamin,tempat_lahir,tgl_lahir,id_agama,pekerjaan,pln_group,kode_perusahaan,nip_keluarga,status_warganegara,jenis_alamat,alamat,id_provinsi,id_kabupaten,kode_pos,no_kk,nik,npwp,telepon,gol_darah,no_bpjs_kes,status_edit,tgl_edit,user_edit)";
    $sql .= " values('$nip','$start_date','$end_date','$id_jenis_keluarga','$no_urut','$nama','$jenis_kelamin','$tempat_lahir','$tgl_lahir','$id_agama','$pekerjaan','$pln_group','$kode_perusahaan','$nip_keluarga','$status_warganegara','$jenis_alamat','$alamat','$id_provinsi','$id_kabupaten','$kode_pos','$no_kk','$nik','$npwp','$telepon','$gol_darah','$no_bpjs_kes','1','$hari_ini','$userhris')";
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