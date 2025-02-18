<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $nip = $_REQUEST['niptalenta'];
    $start_date = $_REQUEST['start_datetalenta'];
    $end_date = $_REQUEST['end_datetalenta'];
    $nilai_talenta = $_REQUEST['nilai_talenta'];
    $nki = $_REQUEST['nkitalenta'];
    $nsk = $_REQUEST['nsktalenta'];
    $kode_nki = $_REQUEST['kode_nkitalenta'];
    $kode_nsk = $_REQUEST['kode_nsktalenta'];
    /*
    $rs2 = mysqli_query($koneksi,"select * from m_nki where score_awal<='$nki' and score_akhir>='$nki'");
    $hasil2 = mysqli_fetch_array($rs2);
    $kode_nki = stripslashes ($hasil2['kode_nki']);

    $rs2 = mysqli_query($koneksi,"select * from m_nsk where score_awal<='$nsk' and score_akhir>='$nsk'");
    $hasil2 = mysqli_fetch_array($rs2);
    $kode_nsk = stripslashes ($hasil2['kode_nsk']);
    */

    $sql = "insert into r_talenta";
    $sql .= "(nip,start_date,end_date,nilai_talenta,nki,kode_nki,nsk,kode_nsk,status_edit,tgl_edit,user_edit)";    
    $sql .= " values('$nip','$start_date','$end_date','$nilai_talenta','$nki','$kode_nki','$nsk','$kode_nsk','1','$hari_ini','$userhris')";
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