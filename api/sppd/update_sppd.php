<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    $tanggal = date("Y-m-d", strtotime("+1 hour"));
    $tahun = date("Y", strtotime("+1 hour"));

    $id = intval($_REQUEST['id']);
    $tingkat_sppd = $_REQUEST['tingkat_sppdsppd'];
    $jenis_sppd = $_REQUEST['jenis_sppdsppd'];
    $sub_jenis_sppd = $_REQUEST['sub_jenis_sppdsppd'];
    $level_sppd = $_REQUEST['level_sppdsppd'];
    $nip = $_REQUEST['nipsppd'];    
    $nama = $_REQUEST['namasppd'];
    $jabatan = $_REQUEST['jabatansppd'];
    $kd_project_sap = $_REQUEST['kd_project_sapsppd'];
        $rs2 = mysqli_query($koneksi,"select nama_project from data_project where kd_project_sap='$kd_project_sap'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $nama_project_sap = $hasil2['nama_project'];
        } else {
            $nama_project_sap = "";
        }
    $maksud = $_REQUEST['maksudsppd'];
    $agenda = $_REQUEST['agendasppd'];
    $kedudukan = $_REQUEST['kedudukansppd'];
    $tujuan = $_REQUEST['tujuansppd'];
    $jarak = $_REQUEST['jaraksppd'];
    //$transportasi = $_REQUEST['transportasisppd'];
    $transportasinya = $_REQUEST['transportasinya'];
    $transportasi = str_replace("|",",",$transportasinya);
    $tgl_awal = $_REQUEST['tgl_awalsppd'];
    $tgl_akhir = $_REQUEST['tgl_akhirsppd'];
    $hari = $_REQUEST['harisppd'];
    $approval1 = $_REQUEST['approval1sppd'];
    $approval2 = $_REQUEST['approval2sppd'];

    $sql = "update sppd1 set tingkat_sppd='$tingkat_sppd',jenis_sppd='$jenis_sppd',level_sppd='$level_sppd',sub_jenis_sppd='$sub_jenis_sppd',kd_project_sap='$kd_project_sap',nama_project_sap='$nama_project_sap',maksud='$maksud',agenda='$agenda',kedudukan='$kedudukan',tujuan='$tujuan',jarak='$jarak',transportasi='$transportasi',tgl_awal='$tgl_awal',tgl_akhir='$tgl_akhir',hari='$hari',approval1='$approval1',approval2='$approval2' where id=$id";
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