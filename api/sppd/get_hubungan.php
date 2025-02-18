<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    function TanggalIndo2($date){
        if($date!="" && $date!=null){
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $result = $tgl . "." . $bulan . ".". $tahun;	
            return($result);
        } else {
            return("");
        }
    }
    
    $idsppd = $_REQUEST['idsppd'];

    $rs2 = mysqli_query($koneksi,"select nip,jenis_sppd from sppd1 where idsppd='$idsppd'");
    $hasil2 = mysqli_fetch_array($rs2);
    if($hasil2){
    	$nip = stripslashes ($hasil2['nip']);
        $jenis_sppd = stripslashes ($hasil2['jenis_sppd']);
    } else {
        $nip = "";
        $jenis_sppd = "1";
    }

    $rs2 = mysqli_query($koneksi,"select jenis_kelamin from data_pegawai where nip='$nip'");
    $hasil2 = mysqli_fetch_array($rs2);
    if($hasil2){
    	$jenis_kelamin = stripslashes ($hasil2['jenis_kelamin']);
    } else {
        $jenis_kelamin = "JK1";
    }
    
    //JK1
    $items = array();    
    if($jenis_sppd=="2"){
        $datanya = array();
        $datanya["value"] = "keluarga";
        $datanya["text"] = "Keluarga";
        array_push($items, $datanya);

        $datanya = array();
        $datanya["value"] = "pengantar";
        $datanya["text"] = "Pengantar";
        array_push($items, $datanya);
    } else {
        $datanya = array();
        if($jenis_kelamin=="JK1"){
            $datanya["value"] = "istri";
            $datanya["text"] = "Istri";
        } else {
            $datanya["value"] = "suami";
            $datanya["text"] = "Suami";
        }
        array_push($items, $datanya);

        $datanya = array();
        $datanya["value"] = "anak";
        $datanya["text"] = "Anak";
        array_push($items, $datanya);
    }
    echo json_encode($items);
}
?>