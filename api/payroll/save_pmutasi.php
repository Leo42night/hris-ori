<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $nip = $_REQUEST['nippmutasi'];
    $blth_awal = $_REQUEST['blth_awalpmutasi'];
    $blth_akhir = $_REQUEST['blth_akhirpmutasi'];
    $netto = $_REQUEST['nettopmutasi'];
    $pph21 = $_REQUEST['pph21pmutasi'];
    $tahun = substr($blth_akhir,0,4);
    $niptahun = $tahun.".".$nip;

    $sql = "insert into pendapatan_mutasi(nip,tahun,niptahun,blth_awal,blth_akhir,netto,pph21) values('$nip','$tahun','$niptahun','$blth_awal','$blth_akhir','$netto','$pph21')";
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