<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
    $id = intval($_REQUEST['id']);
    $nip = $_REQUEST['nipaward'];
    $start_date = $_REQUEST['start_dateaward'];
    $end_date = $_REQUEST['end_dateaward'];
    $kode_award = $_REQUEST['kode_award'];
    $uraian_award = $_REQUEST['uraian_award'];
    $no_sk_penghargaan = $_REQUEST['no_sk_penghargaanaward'];
    $tgl_sk_penghargaan = $_REQUEST['tgl_sk_penghargaanaward'];
    $tingkat_acara = $_REQUEST['tingkat_acaraaward'];
    $diberikan_oleh = $_REQUEST['diberikan_olehaward'];

    $sql = "update r_award set start_date='$start_date',end_date='$end_date',kode_award='$kode_award',uraian_award='$uraian_award',no_sk_penghargaan='$no_sk_penghargaan',tgl_sk_penghargaan='$tgl_sk_penghargaan',tingkat_acara='$tingkat_acara',diberikan_oleh='$diberikan_oleh' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $status_perubahan = mysqli_affected_rows($koneksi);
        if($status_perubahan>0){
            $sql2 = "update r_award set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
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