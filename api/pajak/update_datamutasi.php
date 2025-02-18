<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    $id = intval($_REQUEST['id']);
    $nip = $_REQUEST['nipdatamutasi'];
    $tahun = $_REQUEST['tahundatamutasi'];
    $blth_awal = $_REQUEST['blth_awaldatamutasi'];
    $blth_akhir = $_REQUEST['blth_akhirdatamutasi'];
    $netto = floatval($_REQUEST['nettodatamutasi']);
    $pph21 = floatval($_REQUEST['pph21datamutasi']);
    $niptahun = $tahun.".".$nip;

    $sql = "update pendapatan_mutasi set blth_awal='$blth_awal',blth_akhir='$blth_akhir',netto='$netto',pph21='$pph21' where id='$id'";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'id' => $id
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>