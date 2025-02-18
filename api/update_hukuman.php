<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
    $id = intval($_REQUEST['id']);
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

    $sql = "update r_hukuman set start_date='$start_date',end_date='$end_date',jenis_grievances='$jenis_grievances',reason_grievances='$reason_grievances',nip_atasan='$nip_atasan',nama_atasan='$nama_atasan',status_grievances='$status_grievances',stage_grievances='$stage_grievances',result_grievances='$result_grievances',rupiah='$rupiah',no_sk_hukuman='$no_sk_hukuman',tgl_sk_hukuman='$tgl_sk_hukuman',pasal_pelanggaran='$pasal_pelanggaran',hukuman='$hukuman',keterangan='$keterangan',no_sk_terkait='$no_sk_terkait' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $status_perubahan = mysqli_affected_rows($koneksi);
        if($status_perubahan>0){
            $sql2 = "update r_hukuman set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
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