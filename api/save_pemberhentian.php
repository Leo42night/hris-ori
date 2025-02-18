<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
    $nip = $_REQUEST['nippemberhentian'];
    $tgl_lahir = $_REQUEST['tgl_lahirpemberhentian'];
    $person_grade = $_REQUEST['person_gradepemberhentian'];
    $phdp_terakhir = $_REQUEST['phdp_terakhirpemberhentian'];
    $agama = $_REQUEST['agamapemberhentian'];
    $jenis_kelamin = $_REQUEST['jenis_kelaminpemberhentian'];
    $nik = $_REQUEST['nikpemberhentian'];
    $npwp = $_REQUEST['npwppemberhentian'];
    $tgl_masuk = $_REQUEST['tgl_masukpemberhentian'];
    $tgl_capeg = $_REQUEST['tgl_capegpemberhentian'];
    $tgl_tetap = $_REQUEST['tgl_tetappemberhentian'];
    $tgl_berhenti = $_REQUEST['tgl_berhentipemberhentian'];
    $alasan_berhenti = $_REQUEST['alasan_berhentipemberhentian'];
    $dplk_dapen = $_REQUEST['dplk_dapenpemberhentian'];
    $bank_dplk = $_REQUEST['bank_dplkpemberhentian'];
    $no_peserta = $_REQUEST['no_pesertapemberhentian'];
    $no_bpjs_kes = $_REQUEST['no_bpjs_kespemberhentian'];
    $no_bpjs_tk = $_REQUEST['no_bpjs_tkpemberhentian'];
    if($tgl_berhenti!=""){
        $tahun_pemberhentian = substr($tgl_berhenti,0,4);
    } else {
        $tahun_pemberhentian = "";
    }
    $kode_pln_group = "1006";

    $sql = "insert into r_pemberhentian";
    $sql .= "(nip,tgl_lahir,jenis_kelamin,person_grade,phdp_terakhir,agama,nik,npwp,tgl_masuk,tgl_capeg,tgl_tetap,tgl_berhenti,alasan_berhenti,dplk_dapen,bank_dplk,no_peserta,no_bpjs_kes,no_bpjs_tk,tahun_pemberhentian,kode_pln_group,status_edit,tgl_edit,user_edit)";
    $sql .= " values('$nip','$tgl_lahir','$jenis_kelamin','$person_grade','$phdp_terakhir','$agama','$nik','$npwp','$tgl_masuk','$tgl_capeg','$tgl_tetap','$tgl_berhenti','$alasan_berhenti','$dplk_dapen','$bank_dplk','$no_peserta','$no_bpjs_kes','$no_bpjs_tk','$tahun_pemberhentian','$kode_pln_group','1','$hari_ini','$userhris')";
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