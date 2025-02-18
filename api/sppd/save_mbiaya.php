<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/stringvalidasi.php";
    $id = intval($_REQUEST['id']);
    $batas_awal = $_REQUEST['batas_awalmbiaya'];
    $batas_akhir = $_REQUEST['batas_akhirmbiaya'];
    $level_sppd = trim($_REQUEST['level_sppdmbiaya']);
    $konsumsi = $_REQUEST['konsumsimbiaya'];
    $cuci_pakaian = $_REQUEST['cuci_pakaianmbiaya'];
    $transportasi_lokal = $_REQUEST['transportasi_lokalmbiaya'];
    $penginapan = $_REQUEST['penginapanmbiaya'];
    $lumpsum_penginapan = $_REQUEST['lumpsum_penginapanmbiaya'];

    $sql = "insert into master_biaya_sppd(batas_awal,batas_akhir,level_sppd,konsumsi,cuci_pakaian,transportasi_lokal,penginapan,lumpsum_penginapan) values('$batas_awal','$batas_akhir','$level_sppd','$konsumsi','$cuci_pakaian','$transportasi_lokal','$penginapan','$lumpsum_penginapan')";
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