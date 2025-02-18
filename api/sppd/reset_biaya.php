<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    $tanggal = date("Y-m-d", strtotime("+1 hour"));
    $tahun = date("Y", strtotime("+1 hour"));

    $idsppd = $_REQUEST['idsppd'];
    //$idsppd = "2023000391";

    $sql = "update biaya_sppd1 set ";
    $sql .= "transportasi='0',total_transport='0',transportasi_lokal='0',airport_tax='0',hari_konsumsi1='0',persen_konsumsi1='0',";
    $sql .= "nilai_konsumsi1='0',total_konsumsi1='0',hari_laundry1='0',persen_laundry1='0',";
    $sql .= "nilai_laundry1='0',total_laundry1='0',hari_penginapan1='0',persen_penginapan1='0',";
    $sql .= "nilai_penginapan1='0',total_penginapan1='0',hari_konsumsi2='0',persen_konsumsi2='0',";
    $sql .= "nilai_konsumsi2='0',total_konsumsi2='0',hari_laundry2='0',persen_laundry2='0',";
    $sql .= "nilai_laundry2='0',total_laundry2='0',hari_penginapan2='0',persen_penginapan2='0',";
    $sql .= "nilai_penginapan2='0',total_penginapan2='0',hari_pegawai='0',persen_pegawai='0',";
    $sql .= "nilai_pegawai='0',total_pegawai='0',keluarga='0',hari_keluarga='0',persen_keluarga='0',";
    $sql .= "nilai_keluarga='0',total_keluarga='0',pengantar='0',hari_pengantar='0',persen_pengantar='0',";
    $sql .= "nilai_pengantar='0',total_pengantar='0',hari_suamiistri='0',persen_suamiistri='0',";
    $sql .= "nilai_suamiistri='0',total_suamiistri='0',anak='0',hari_anak='0',persen_anak='0',";
    $sql .= "nilai_anak='0',total_anak='0',berat_pengepakan='0',nilai_pengepakan='0',total_pengepakan='0',";
    $sql .= "kurs_ln='0',transporta_ln='0',transportb_ln='0',transportc_ln='0',transportd_ln='0',transportasi_lokal_ln='0',airport_tax_ln='0',hari_lumpsum='0',";
    $sql .= "nilai_lumpsum='0',hari_pegawai_ln='0',persen_pegawai_ln='0',nilai_pegawai_ln='0',hari_keluarga_ln='0',persen_keluarga_ln='0',";
    $sql .= "nilai_keluarga_ln='0',hari_pengantar_ln='0',persen_pengantar_ln='0',nilai_pengantar_ln='0',baju_hangat_ln='0',total='0'";
    $sql .= " where idsppd='$idsppd'";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        echo json_encode(array('success'=>true));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>