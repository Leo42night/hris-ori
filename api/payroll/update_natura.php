<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $id = intval($_REQUEST['id']);
    $nip = trim($_REQUEST['nipnatura']);
    $blth = $_REQUEST['blthnatura'];
    $cop = $_REQUEST['copnatura'];
    $fasilitas_hp = $_REQUEST['fasilitas_hpnatura'];
    $reimburse_kesehatan = $_REQUEST['reimburse_kesehatannatura'];
    $asuransi_kesehatan = $_REQUEST['asuransi_kesehatannatura'];
    $sarana_kerja = $_REQUEST['sarana_kerjanatura'];
    $sppd_manual = $_REQUEST['sppd_manualnatura'];
    $asuransi_purna_jabatan = $_REQUEST['asuransi_purna_jabatannatura'];
    $medical_checkup = $_REQUEST['medical_checkupnatura'];
    $non_rutin_penyesuaian = $_REQUEST['non_rutin_penyesuaiannatura'];

    $sql = "update natura set cop='$cop',fasilitas_hp='$fasilitas_hp',reimburse_kesehatan='$reimburse_kesehatan',asuransi_kesehatan='$asuransi_kesehatan',sarana_kerja='$sarana_kerja',sppd_manual='$sppd_manual',asuransi_purna_jabatan='$asuransi_purna_jabatan',medical_checkup='$medical_checkup',non_rutin_penyesuaian='$non_rutin_penyesuaian' where id=$id";
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