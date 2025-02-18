<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $nip = $_REQUEST['niphukuman'];
    $start_date = $_REQUEST['start_datehukuman'];
    $end_date = $_REQUEST['end_datehukuman'];
    $jenis_grievances = $_REQUEST['jenis_grievanceshukuman'];
    $reason_grievances = $_REQUEST['reason_grievanceshukuman'];
    $nip_atasan = $_REQUEST['nip_atasanhukuman'];
    $nama_atasan = $_REQUEST['nama_atasanhukuman'];
    $status_grievances = $_REQUEST['status_grievanceshukuman'];
    $stage_grievances = $_REQUEST['stage_grievanceshukuman'];
    $result_grievances = $_REQUEST['result_grievanceshukuman'];
    $rupiah = $_REQUEST['rupiahhukuman'];
    $no_sk_hukuman = $_REQUEST['no_sk_hukuman'];
    $tgl_sk_hukuman = $_REQUEST['tgl_sk_hukuman'];
    $pasal_pelanggaran = $_REQUEST['pasal_pelanggaranhukuman'];
    $hukuman = $_REQUEST['hukumanhukuman'];
    $keterangan = $_REQUEST['keteranganhukuman'];
    $no_sk_terkait = $_REQUEST['no_sk_terkaithukuman'];

    $sql = "insert into r_hukuman";
    $sql .= "(nip,start_date,end_date,jenis_grievances,reason_grievances,nip_atasan,nama_atasan,status_grievances,stage_grievances,result_grievances,rupiah,no_sk_hukuman,tgl_sk_hukuman,pasal_pelanggaran,hukuman,keterangan,no_sk_terkait,status_edit,tgl_edit,user_edit)";    
    $sql .= " values('$nip','$start_date','$end_date','$jenis_grievances','$reason_grievances','$nip_atasan','$nama_atasan','$status_grievances','$stage_grievances','$result_grievances','$rupiah','$no_sk_hukuman','$tgl_sk_hukuman','$pasal_pelanggaran','$hukuman','$keterangan','$no_sk_terkait','1','$hari_ini','$userhris')";
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