<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
// echo "hallo";
// exit;

if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    $tanggal = date("Y-m-d", strtotime("+1 hour"));
    $tahun = date("Y", strtotime("+1 hour"));

    $rs3 = mysqli_query($koneksi,"select idsppd from sppd1 where substr(idsppd,1,4)='$tahun' order by idsppd desc limit 1");
    $hasil3 = mysqli_fetch_array($rs3);
    if($hasil3){
        $idsppd2 = stripslashes ($hasil3['idsppd']);
        $idsppd3 = intval(substr($idsppd2,-6));
        $idsppd = $tahun.str_pad(($idsppd3+1),6,"0",STR_PAD_LEFT);
    } else {
        $idsppd3 = 0;
        $idsppd = $tahun.str_pad(($idsppd3+1),6,"0",STR_PAD_LEFT);
    }
    
    $rs3 = mysqli_query($koneksi,"select substr(no_sppd,1,4) as urut from sppd1 where substr(no_sppd,-4)='$tahun' order by (substr(no_sppd,1,4)*1) desc limit 1");
    $hasil3 = mysqli_fetch_array($rs3);
    if($hasil3){
        $urut2 = intval($hasil3['urut']);
        $no_sppd = str_pad($urut2+1,4,"0",STR_PAD_LEFT).".SPPD/MUM.00.07/PLN-TRK/".$tahun;
    } else {
        $urut2 = 0;
        $no_sppd = str_pad($urut2+1,4,"0",STR_PAD_LEFT).".SPPD/MUM.00.07/PLN-TRK/".$tahun;
    }

    $tingkat_sppd = $_REQUEST['tingkat_sppdsppd']; //tidak ada
    $jenis_sppd = $_REQUEST['jenis_sppdsppd']; //jenis_sppd
    $sub_jenis_sppd = $_REQUEST['sub_jenis_sppdsppd'];
    $level_sppd = $_REQUEST['level_sppdsppd'];
    $nip = $_REQUEST['nipsppd'];    
        $rs2 = mysqli_query($koneksi,"select grade,jabatan from data_pegawai where nip='$nip'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $grade = $hasil2['grade'];
            //$jabatan = $hasil2['jabatan'];
        } else {
            $grade = "";
            //$jabatan = "";
        }
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
    // echo json_encode(['jarak'=>$jarak]);
    $sql = "insert into sppd1";
    $sql .= "(idsppd,tanggal,tingkat_sppd,jenis_sppd,level_sppd,sub_jenis_sppd,kd_project_sap,nama_project_sap,no_sppd,nip,nama,grade,jabatan,maksud,agenda,kedudukan,tujuan,jarak,transportasi,tgl_awal,tgl_akhir,hari,approval1,approval2)";
    $sql .= " values('$idsppd','$tanggal','$tingkat_sppd','$jenis_sppd','$level_sppd','$sub_jenis_sppd','$kd_project_sap','$nama_project_sap','$no_sppd','$nip','$nama','$grade','$jabatan','$maksud','$agenda','$kedudukan','$tujuan','$jarak','$transportasi','$tgl_awal','$tgl_akhir','$hari','$approval1','$approval2')";
    $result = mysqli_query($koneksi,$sql);
    
    if ($result){
        $sql2 = "insert into biaya_sppd1(idsppd) values('$idsppd')";
        $result2 = mysqli_query($koneksi,$sql2);
        //$sql3 = "insert into biaya_restitusi(idsppd) values('$idsppd')";
        //$result3 = @mysqli_query($koneksi,$sql3);
    	echo json_encode(array(
    		'nip' => $nip,
            'result' => $result
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>