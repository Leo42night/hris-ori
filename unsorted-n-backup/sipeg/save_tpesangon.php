<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $nip = $_REQUEST['niptpesangon'];
    $blth = $_REQUEST['blthtpesangon'];
    $uang_pesangon = $_REQUEST['uang_pesangontpesangon'];
    $nipblth = $blth.".".$nip;

    $sql = "insert into pesangon(blth,nip,nipblth,uang_pesangon,tgl_proses,petugas) values('$blth','$nip','$nipblth','$uang_pesangon','$hari_ini','$userhris')";
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