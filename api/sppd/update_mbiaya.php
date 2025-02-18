<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $id = intval($_REQUEST['id']);
    $batas_awal = $_REQUEST['batas_awalmbiaya'];
    $batas_akhir = $_REQUEST['batas_akhirmbiaya'];
    $level_sppd = trim($_REQUEST['level_sppdmbiaya']);
    $konsumsi = $_REQUEST['konsumsimbiaya'];
    $cuci_pakaian = $_REQUEST['cuci_pakaianmbiaya'];
    $transportasi_lokal = $_REQUEST['transportasi_lokalmbiaya'];
    $penginapan = $_REQUEST['penginapanmbiaya'];
    $lumpsum_penginapan = $_REQUEST['lumpsum_penginapanmbiaya'];

    $sql = "update master_biaya_sppd set batas_awal='$batas_awal',batas_akhir='$batas_akhir',level_sppd='$level_sppd',konsumsi='$konsumsi',cuci_pakaian='$cuci_pakaian',transportasi_lokal='$transportasi_lokal',penginapan='$penginapan',lumpsum_penginapan='$lumpsum_penginapan' where id=$id";
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