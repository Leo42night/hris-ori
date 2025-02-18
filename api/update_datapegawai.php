<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
    $id = intval($_REQUEST['id']);
    $nip = $_REQUEST['nippegawai'];
    $start_date = $_REQUEST['start_datepegawai'];
    $end_date = $_REQUEST['end_datepegawai'];
    $tgl_masuk = $_REQUEST['tgl_masukpegawai'];
    $tgl_capeg = $_REQUEST['tgl_capegpegawai'];
    $tgl_tetap = $_REQUEST['tgl_tetappegawai'];
    $title = $_REQUEST['titlepegawai'];
    $nama_lengkap = $_REQUEST['nama_lengkappegawai'];
    $gelar_depan = $_REQUEST['gelar_depanpegawai'];
    $gelar_belakang = $_REQUEST['gelar_belakangpegawai'];
    $know_as = $_REQUEST['know_aspegawai'];
    $tempat_lahir = $_REQUEST['tempat_lahirpegawai'];
    $tgl_lahir = $_REQUEST['tgl_lahirpegawai'];
    $kode_negara = $_REQUEST['kode_negarapegawai'];
    $jenis_kelamin = $_REQUEST['jenis_kelaminpegawai'];
    $id_agama = $_REQUEST['id_agamapegawai'];
    $status_nikah = $_REQUEST['status_nikahpegawai'];
    $tgl_nikah = $_REQUEST['tgl_nikahpegawai'];
    $status_warganegara = $_REQUEST['status_warganegarapegawai'];
    $gol_darah = $_REQUEST['gol_darahpegawai'];
    $suku = $_REQUEST['sukupegawai'];
    $telepon_utama = $_REQUEST['telepon_utamapegawai'];
    $telepon_cadangan1 = $_REQUEST['telepon_cadangan1pegawai'];
    $telepon_cadangan2 = $_REQUEST['telepon_cadangan2pegawai'];
    $telepon_cadangan3 = $_REQUEST['telepon_cadangan3pegawai'];
    $telepon_darurat = $_REQUEST['telepon_daruratpegawai'];
    $jenis_dplk = $_REQUEST['jenis_dplkpegawai'];
    $id_dplk = $_REQUEST['id_dplkpegawai'];
    $bank_dplk = $_REQUEST['bank_dplkpegawai'];
    $no_bpjs_kes = $_REQUEST['no_bpjs_kespegawai'];
    $no_bpjs_tk = $_REQUEST['no_bpjs_tkpegawai'];
    $bank_payroll = $_REQUEST['bank_payrollpegawai'];
    $an_payroll = $_REQUEST['an_payrollpegawai'];
    $no_rek_payroll = $_REQUEST['no_rek_payrollpegawai'];
    $status_integrasi = $_REQUEST['status_integrasipegawai'];

    $sql = "update data_pegawai set start_date='$start_date',end_date='$end_date',tgl_masuk='$tgl_masuk',tgl_capeg='$tgl_capeg',tgl_tetap='$tgl_tetap',title='$title',nama_lengkap='$nama_lengkap',gelar_depan='$gelar_depan',gelar_belakang='$gelar_belakang',know_as='$know_as',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',kode_negara='$kode_negara',jenis_kelamin='$jenis_kelamin',id_agama='$id_agama',status_nikah='$status_nikah',tgl_nikah='$tgl_nikah',status_warganegara='$status_warganegara',gol_darah='$gol_darah',suku='$suku',telepon_utama='$telepon_utama',telepon_cadangan1='$telepon_cadangan1',telepon_cadangan2='$telepon_cadangan2',telepon_cadangan3='$telepon_cadangan3',telepon_darurat='$telepon_darurat',jenis_dplk='$jenis_dplk',id_dplk='$id_dplk',bank_dplk='$bank_dplk',no_bpjs_kes='$no_bpjs_kes',no_bpjs_tk='$no_bpjs_tk',bank_payroll='$bank_payroll',an_payroll='$an_payroll',no_rek_payroll='$no_rek_payroll',status_integrasi='$status_integrasi' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $status_perubahan = mysqli_affected_rows($koneksi);
        if($status_perubahan>0){
            $sql2 = "update data_pegawai set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
            $result2 = @mysqli_query($koneksi,$sql2);
        }
    	echo json_encode(array(
    		'nip' => $nip
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>