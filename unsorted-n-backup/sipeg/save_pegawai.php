<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
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

    $person_grade = $_REQUEST['person_gradepegawai'];
    if($person_grade=="-"){
        $person_grade = "";
    }
    $nik = $_REQUEST['nikpegawai'];
    $npwp = $_REQUEST['npwppegawai'];
    $keterangan_mutasi = $_REQUEST['keterangan_mutasipegawai'];
    if($tgl_tetap!=""){
        $tahun_pengangkatan = substr($tgl_tetap,0,4);
    } else {
        $tahun_pengangkatan = "";
    }
    $kode_pln_group = "1006";

    $sql = "insert into data_pegawai";
    $sql .= "(nip,start_date,end_date,tgl_masuk,tgl_capeg,tgl_tetap,title,nama_lengkap,gelar_depan,gelar_belakang,know_as,tempat_lahir,tgl_lahir,kode_negara,jenis_kelamin,id_agama,status_nikah,tgl_nikah,status_warganegara,gol_darah,suku,telepon_utama,telepon_cadangan1,telepon_cadangan2,telepon_cadangan3,telepon_darurat,jenis_dplk,id_dplk,bank_dplk,no_bpjs_kes,no_bpjs_tk,nama_bank,no_rekening,nama_rekening,status_integrasi,status_edit,tgl_edit,user_edit)";
    $sql .= " values('$nip','$start_date','$end_date','$tgl_masuk','$tgl_capeg','$tgl_tetap','$title','$nama_lengkap','$gelar_depan','$gelar_belakang','$know_as','$tempat_lahir','$tgl_lahir','$kode_negara','$jenis_kelamin','$id_agama','$status_nikah','$tgl_nikah','$status_warganegara','$gol_darah','$suku','$telepon_utama','$telepon_cadangan1','$telepon_cadangan2','$telepon_cadangan3','$telepon_darurat','$jenis_dplk','$id_dplk','$bank_dplk','$no_bpjs_kes','$no_bpjs_tk','$nama_bank','$no_rekening','$nama_rekening','$status_integrasi','1','$hari_ini','$userhris')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $sql2 = "insert into r_pengangkatan";
        $sql2 .= "(nip,tgl_lahir,jenis_kelamin,person_grade,agama,nik,npwp,tgl_masuk,tgl_capeg,tgl_tetap,keterangan_mutasi,tahun_pengangkatan,kode_pln_group,status_edit,tgl_edit,user_edit)";
        $sql2 .= " values('$nip','$tgl_lahir','$jenis_kelamin','$person_grade','$id_agama','$nik','$npwp','$tgl_masuk','$tgl_capeg','$tgl_tetap','$keterangan_mutasi','$tahun_pengangkatan','$kode_pln_group','1','$hari_ini','$userhris')";    
        $result2 = @mysqli_query($koneksi,$sql2);
        if ($result2){
    	    echo json_encode(array('nip' => $nip));
        } else {
            echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));            
        }
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>