<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $id = intval($_REQUEST['id']);
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

    $sql = "update r_pemberhentian set tgl_lahir='$tgl_lahir',jenis_kelamin='$jenis_kelamin',person_grade='$person_grade',phdp_terakhir='$phdp_terakhir',agama='$agama',nik='$nik',npwp='$npwp',tgl_masuk='$tgl_masuk',tgl_capeg='$tgl_capeg',tgl_tetap='$tgl_tetap',tgl_berhenti='$tgl_berhenti',alasan_berhenti='$alasan_berhenti',dplk_dapen='$dplk_dapen',bank_dplk='$bank_dplk',no_peserta='$no_peserta',no_bpjs_kes='$no_bpjs_kes',no_bpjs_tk='$no_bpjs_tk',tahun_pemberhentian='$tahun_pemberhentian' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $status_perubahan = mysqli_affected_rows($koneksi);
        if($status_perubahan>0){
            $sql2 = "update r_pemberhentian set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
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