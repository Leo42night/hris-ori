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
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
    
    $offset = ($page-1)*$rows;
    $result = array();
    $result["total"] = 1;    
    
    $items = array();
    $rs = mysqli_query($koneksi,"select * from data_pegawai where aktif='1' order by nama asc");
    while ($hasil = mysqli_fetch_array($rs)) {
    	$nip = stripslashes ($hasil['nip']);
    	$nama = stripslashes ($hasil['nama']);
    	$jabatan = stripslashes ($hasil['jabatan']);
    	$approval1 = stripslashes ($hasil['atasan_langsung']);
            $rs2 = mysqli_query($koneksi,"select jabatan from data_pegawai where nip='$approval1'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jabatan_approval1 = stripslashes ($hasil2['jabatan']);
            } else {
                $jabatan_approval1 = "";
            }
    	$approval2 = stripslashes ($hasil['atasan_atasan_langsung']);
            $rs2 = mysqli_query($koneksi,"select jabatan from data_pegawai where nip='$approval2'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jabatan_approval2 = stripslashes ($hasil2['jabatan']);
            } else {
                $jabatan_approval2 = "";
            }
        $level_sppd = stripslashes ($hasil['level_sppd']);
            $rs2 = mysqli_query($koneksi,"select uraian from master_level where level='$level_sppd'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_level = stripslashes ($hasil2['uraian']);
            } else {
                $nama_level = "";
            }
    
        $datanya = array();
        $datanya["nip9"] = $nip;
        $datanya["nama9"] = $nama;
        $datanya["jabatan9"] = $jabatan;
        $datanya["approval19"] = $approval1;
        $datanya["jabatan_approval19"] = $jabatan_approval1;
        $datanya["approval29"] = $approval2;
        $datanya["jabatan_approval29"] = $jabatan_approval2;
        $datanya["level_sppd9"] = $level_sppd;
        $datanya["nama_level9"] = $nama_level;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>