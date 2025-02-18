<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $nip = $_REQUEST['nipaward'];
    $start_date = $_REQUEST['start_dateaward'];
    $end_date = $_REQUEST['end_dateaward'];
    $kode_award = $_REQUEST['kode_award'];
    $uraian_award = $_REQUEST['uraian_award'];
    $no_sk_penghargaan = $_REQUEST['no_sk_penghargaanaward'];
    $tgl_sk_penghargaan = $_REQUEST['tgl_sk_penghargaanaward'];
    $tingkat_acara = $_REQUEST['tingkat_acaraaward'];
    $diberikan_oleh = $_REQUEST['diberikan_olehaward'];

    $sql = "insert into r_award";
    $sql .= "(nip,start_date,end_date,kode_award,uraian_award,no_sk_penghargaan,tgl_sk_penghargaan,tingkat_acara,diberikan_oleh,status_edit,tgl_edit,user_edit)";    
    $sql .= " values('$nip','$start_date','$end_date','$kode_award','$uraian_award','$no_sk_penghargaan','$tgl_sk_penghargaan','$tingkat_acara','$diberikan_oleh','1','$hari_ini','$userhris')";
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