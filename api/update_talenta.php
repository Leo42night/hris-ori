<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
    $id = intval($_REQUEST['id']);
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

    $sql = "update r_talenta set start_date='$start_date',end_date='$end_date',nilai_talenta='$nilai_talenta',nki='$nki',kode_nki='$kode_nki',nsk='$nsk',kode_nsk='$kode_nsk' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $status_perubahan = mysqli_affected_rows($koneksi);
        if($status_perubahan>0){
            $sql2 = "update r_talenta set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
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