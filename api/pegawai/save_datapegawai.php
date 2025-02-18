<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";

if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    $kunci = "cipher.hris@s7o";
    $nip = trim($_REQUEST['nipdatapegawai']);
    $password = $nip;
    $niplama = $_REQUEST['niplamadatapegawai'];
    $jenis_mutasi = $_REQUEST['jenis_mutasidatapegawai'];
    $akses = $_REQUEST['aksesdatapegawai'];
    $jenis = $_REQUEST['jenisdatapegawai'];
    $no_sk = $_REQUEST['no_skdatapegawai'];
    $nama = $_REQUEST['namadatapegawai'];
    $jenis_kelamin = $_REQUEST['jenis_kelamindatapegawai'];
    $tempat_lahir = $_REQUEST['tempat_lahirdatapegawai'];
    $tgl_lahir = $_REQUEST['tgl_lahirdatapegawai'];
    $alamat = $_REQUEST['alamatdatapegawai'];
    $alamat_domisili = $_REQUEST['alamat_domisilidatapegawai'];
    $jabatan = $_REQUEST['jabatandatapegawai'];
    $divisi = $_REQUEST['divisidatapegawai'];
    $penempatan = $_REQUEST['penempatandatapegawai'];
    $bidang = $_REQUEST['bidangdatapegawai'];
    $sub_bidang = $_REQUEST['sub_bidangdatapegawai'];
    $grade = $_REQUEST['gradedatapegawai'];
    $skala_grade = $_REQUEST['skala_gradedatapegawai'];
    $pendidikan = $_REQUEST['pendidikandatapegawai'];
    $jurusan = $_REQUEST['jurusandatapegawai'];
    // $suku = $_REQUEST['sukudatapegawai'];
    $nik = $_REQUEST['nikdatapegawai'];
    $no_kk = $_REQUEST['no_kkdatapegawai'];
    $status = $_REQUEST['statusdatapegawai'];
    $agama = $_REQUEST['agamadatapegawai'];
    $telepon = $_REQUEST['telepondatapegawai'];
    $email = $_REQUEST['emaildatapegawai'];
    $email2 = $_REQUEST['email2datapegawai'];
    $gol_darah = $_REQUEST['gol_darahdatapegawai'];
    $npwp = $_REQUEST['npwpdatapegawai'];
    $kpp = $_REQUEST['kppdatapegawai'];
    $level_sppd = $_REQUEST['level_sppddatapegawai'];
    $atasan_langsung = $_REQUEST['atasan_langsungdatapegawai'];
    $atasan_atasan_langsung = $_REQUEST['atasan_atasan_langsungdatapegawai'];
    $tgl_masuk = $_REQUEST['tgl_masukdatapegawai'];
    $tgl_capeg = $_REQUEST['tgl_capegdatapegawai'];
    $tgl_pegawai = $_REQUEST['tgl_pegawaidatapegawai'];
    $nama_bank = $_REQUEST['nama_bankdatapegawai'];
    $no_rekening = $_REQUEST['no_rekeningdatapegawai'];
    $nama_rekening = $_REQUEST['nama_rekeningdatapegawai'];
    $nama_bankdplk = $_REQUEST['nama_bankdplkdatapegawai'];
    $no_rekeningdplk = $_REQUEST['no_rekeningdplkdatapegawai'];
    $no_cifdplk = $_REQUEST['no_cifdplkdatapegawai'];
    $no_bpjs_kes = $_REQUEST['no_bpjs_kesdatapegawai'];
    $tgl_bpjs_kes = $_REQUEST['tgl_bpjs_kesdatapegawai'];
    $va_bpjs_kes = $_REQUEST['va_bpjs_kesdatapegawai'];
    $no_bpjs_tk = $_REQUEST['no_bpjs_tkdatapegawai'];
    $tgl_bpjs_tk = $_REQUEST['tgl_bpjs_tkdatapegawai'];
    $va_bpjs_tk = $_REQUEST['va_bpjs_tkdatapegawai'];
    $no_inhealth = $_REQUEST['no_inhealthdatapegawai'];
    $tgl_inhealth = $_REQUEST['tgl_inhealthdatapegawai'];
    $aktif = $_REQUEST['aktifdatapegawai'];
    $tgl_berhenti = $_REQUEST['tgl_berhentidatapegawai'];
    $kd_project_sap = $_REQUEST['kd_project_sapdatapegawai'];

    // $rs2 = mysqli_query($koneksi,"select * from validasikey where jenis_app='hris' order by id desc limit 1");
    // $hasil2 = mysqli_fetch_array($rs2);
    // if($hasil2){
    //     $kunci = stripslashes($hasil2['kunci']);
    // } else {
    //     $kunci = "";
    // }
    
    if($nik!=""){
        $nik = encryptText($nik, $kunci);
    }
    if($no_kk!=""){
        $no_kk = encryptText($no_kk, $kunci);
    }
    if($npwp!=""){
        $npwp = encryptText($npwp, $kunci);
    }
    if($telepon!=""){
        $telepon = encryptText($telepon, $kunci);
    }

    $sql = "insert into data_pegawai";
    $sql .= "(nip,niplama,jenis,no_sk,nama,jenis_kelamin";
    $sql .= ",tempat_lahir,tgl_lahir,alamat,alamat_domisili,jabatan,divisi,bidang,sub_bidang";
    $sql .= ",penempatan,grade,skala_grade,pendidikan,jurusan,nik,no_kk,status,telepon";
    $sql .= ",tgl_masuk,tgl_capeg,tgl_pegawai,email,email2,agama,gol_darah,npwp,kpp";
    $sql .= ",nama_bank,no_rekening,nama_rekening,no_bpjs_kes,tgl_bpjs_kes";
    $sql .= ",no_bpjs_tk,tgl_bpjs_tk,va_bpjs_tk,no_inhealth,tgl_inhealth";
    $sql .= ",nama_bankdplk,no_rekeningdplk,no_cifdplk,aktif,tgl_berhenti,password";
    $sql .= ",atasan_langsung,atasan_atasan_langsung,level_sppd,kd_project_sap)";
    $sql .= " values('$nip','$niplama','$jenis','$no_sk','$nama','$jenis_kelamin'";
    $sql .= ",'$tempat_lahir','$tgl_lahir','$alamat','$alamat_domisili','$jabatan','$divisi','$bidang','$sub_bidang'";
    $sql .= ",'$penempatan','$grade','$skala_grade','$pendidikan','$jurusan','$nik','$no_kk','$status','$telepon'";
    $sql .= ",'$tgl_masuk','$tgl_capeg','$tgl_pegawai','$email','$email2','$agama','$gol_darah','$npwp','$kpp'";
    $sql .= ",'$nama_bank','$no_rekening','$nama_rekening','$no_bpjs_kes','$tgl_bpjs_kes'";
    $sql .= ",'$no_bpjs_tk','$tgl_bpjs_tk','$va_bpjs_tk','$no_inhealth','$tgl_inhealth'";
    $sql .= ",'$nama_bankdplk','$no_rekeningdplk','$no_cifdplk','$aktif','$tgl_berhenti','$password'";
    $sql .= ",'$atasan_langsung','$atasan_atasan_langsung','$level_sppd','$kd_project_sap')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $sql2 = "insert into master_gaji (nip,jenis,grade,skala_grade,jabatan,aktif) values('$nip','$jenis','$grade','$skala_grade','$jabatan','$aktif')";
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