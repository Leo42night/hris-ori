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


    $transportasi = $_REQUEST['transportasibiaya'];
    $transportasi_lokal = $_REQUEST['transportasi_lokalbiaya'];
    $airport_tax = $_REQUEST['airport_taxbiaya'];
    //$hari_konsumsi1 = $_REQUEST['hari_konsumsi1biaya'];
    $persen_konsumsi1 = $_REQUEST['persen_konsumsi1biaya'];
    $nilai_konsumsi1 = $_REQUEST['nilai_konsumsi12biaya'];
    $total_konsumsi1 = $_REQUEST['total_konsumsi1biaya'];
    //$hari_laundry1 = $_REQUEST['hari_laundry1biaya'];
    $persen_laundry1 = $_REQUEST['persen_laundry1biaya'];
    $nilai_laundry1 = $_REQUEST['nilai_laundry12biaya'];
    $total_laundry1 = $_REQUEST['total_laundry1biaya'];
    //$hari_penginapan1 = $_REQUEST['hari_penginapan1biaya'];
    $persen_penginapan1 = $_REQUEST['persen_penginapan1biaya'];
    $nilai_penginapan1 = $_REQUEST['nilai_penginapan12biaya'];
    $total_penginapan1 = $_REQUEST['total_penginapan1biaya'];
    //$hari_konsumsi2 = $_REQUEST['hari_konsumsi2biaya'];
    $persen_konsumsi2 = $_REQUEST['persen_konsumsi2biaya'];
    $nilai_konsumsi2 = $_REQUEST['nilai_konsumsi22biaya'];
    $total_konsumsi2 = $_REQUEST['total_konsumsi2biaya'];
    //$hari_laundry2 = $_REQUEST['hari_laundry2biaya'];
    $persen_laundry2 = $_REQUEST['persen_laundry2biaya'];
    $nilai_laundry2 = $_REQUEST['nilai_laundry22biaya'];
    $total_laundry2 = $_REQUEST['total_laundry2biaya'];
    //$hari_penginapan2 = $_REQUEST['hari_penginapan2biaya'];
    $persen_penginapan2 = $_REQUEST['persen_penginapan2biaya'];
    $nilai_penginapan2 = $_REQUEST['nilai_penginapan22biaya'];
    $total_penginapan2 = $_REQUEST['total_penginapan2biaya'];
    //$hari_pegawai = $_REQUEST['hari_pegawaibiaya'];
    $persen_pegawai = $_REQUEST['persen_pegawaibiaya'];
    $nilai_pegawai = $_REQUEST['nilai_pegawai2biaya'];
    $total_pegawai = $_REQUEST['total_pegawaibiaya'];
    //$hari_keluarga = $_REQUEST['hari_keluargabiaya'];
    $persen_keluarga = $_REQUEST['persen_keluargabiaya'];
    $nilai_keluarga = $_REQUEST['nilai_keluarga2biaya'];
    $total_keluarga = $_REQUEST['total_keluargabiaya'];
    //$hari_pengantar = $_REQUEST['hari_pengantarbiaya'];
    $persen_pengantar = $_REQUEST['persen_pengantarbiaya'];
    $nilai_pengantar = $_REQUEST['nilai_pengantar2biaya'];
    $total_pengantar = $_REQUEST['total_pengantarbiaya'];
    //$hari_suamiistri = $_REQUEST['hari_suamiistribiaya'];
    $persen_suamiistri = $_REQUEST['persen_suamiistribiaya'];
    $nilai_suamiistri = $_REQUEST['nilai_suamiistri2biaya'];
    $total_suamiistri = $_REQUEST['total_suamiistribiaya'];
    //$hari_anak = $_REQUEST['hari_anakbiaya'];
    $persen_anak = $_REQUEST['persen_anakbiaya'];
    $nilai_anak = $_REQUEST['nilai_anak2biaya'];
    $total_anak = $_REQUEST['total_anakbiaya'];
    $total_pengepakan = $_REQUEST['total_pengepakanbiaya'];
    $total = $_REQUEST['totalbiaya'];

    $sql = "update biaya_sppd1 set ";
    $sql .= "transportasi='$transportasi',total_transport='$transportasi',transportasi_lokal='$transportasi_lokal',airport_tax='$airport_tax',";
    $sql .= "persen_konsumsi1='$persen_konsumsi1',nilai_konsumsi1='$nilai_konsumsi1',total_konsumsi1='$total_konsumsi1',";
    $sql .= "persen_laundry1='$persen_laundry1',nilai_laundry1='$nilai_laundry1',total_laundry1='$total_laundry1',";
    $sql .= "persen_penginapan1='$persen_penginapan1',nilai_penginapan1='$nilai_penginapan1',total_penginapan1='$total_penginapan1',";
    $sql .= "persen_konsumsi2='$persen_konsumsi2',nilai_konsumsi2='$nilai_konsumsi2',total_konsumsi2='$total_konsumsi2',";
    $sql .= "persen_laundry2='$persen_laundry2',nilai_laundry2='$nilai_laundry2',total_laundry2='$total_laundry2',";
    $sql .= "persen_penginapan2='$persen_penginapan2',nilai_penginapan2='$nilai_penginapan2',total_penginapan2='$total_penginapan2',";
    $sql .= "persen_pegawai='$persen_pegawai',nilai_pegawai='$nilai_pegawai',total_pegawai='$total_pegawai',";
    $sql .= "persen_keluarga='$persen_keluarga',nilai_keluarga='$nilai_keluarga',total_keluarga='$total_keluarga',";
    $sql .= "persen_pengantar='$persen_pengantar',nilai_pengantar='$nilai_pengantar',total_pengantar='$total_pengantar',";
    $sql .= "persen_suamiistri='$persen_suamiistri',nilai_suamiistri='$nilai_suamiistri',total_suamiistri='$total_suamiistri',";
    $sql .= "persen_anak='$persen_anak',nilai_anak='$nilai_anak',total_anak='$total_anak',";
    $sql .= "total_pengepakan='$total_pengepakan',total='$total'";
    $sql .= " where idsppd='$idsppd'";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        echo json_encode(array('success'=>true, 'idsppd'=>$idsppd,'total'=>$total));  
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>