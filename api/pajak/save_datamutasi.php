<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    include 'koneksi_sipeg.php';
    $nip = $_REQUEST['nipdatamutasi'];
    $tahun = $_REQUEST['tahundatamutasi'];
    $blth_awal = $_REQUEST['blth_awaldatamutasi'];
    $blth_akhir = $_REQUEST['blth_akhirdatamutasi'];
    $netto = floatval($_REQUEST['nettodatamutasi']);
    $pph21 = floatval($_REQUEST['pph21datamutasi']);
    $niptahun = $tahun.".".$nip;

    $sql = "insert into pendapatan_mutasi(nip,tahun,niptahun,blth_awal,blth_akhir,netto,pph21)";
    $sql .= " values('$nip','$tahun','$niptahun','$blth_awal','$blth_akhir','$netto','$pph21')";
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