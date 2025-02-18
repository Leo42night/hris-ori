<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
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

    include "koneksi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $nip2 = isset($_REQUEST['nip']) ? $_REQUEST['nip'] : "8017001TRK";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $rs = mysqli_query($koneksi,"select count(*) from r_sertifikat where nip='$nip2'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from r_sertifikat where nip='$nip2' order by end_date asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$start_date = stripslashes ($hasil['start_date']);
        $start_date2 = TanggalIndo2($start_date);
    	$end_date = stripslashes ($hasil['end_date']);
        $end_date2 = TanggalIndo2($end_date);
    	$jenis_lembaga = stripslashes ($hasil['jenis_lembaga']);
            $rs2 = mysqli_query($koneksi,"select * from m_jenis_lembaga where kode='$jenis_lembaga'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_lembaga2 = stripslashes ($hasil2['label']);
            } else {
                $jenis_lembaga2 = "";
            }
        $judul_sertifikasi = stripslashes ($hasil['judul_sertifikasi']);
        $no_sertifikasi = stripslashes ($hasil['no_sertifikasi']);
        $kode_profesi_sertifikasi = stripslashes ($hasil['kode_profesi_sertifikasi']);
        $profesi_sertifikasi = stripslashes ($hasil['profesi_sertifikasi']);
        $level_profesiensi = stripslashes ($hasil['level_profesiensi']);
            $rs2 = mysqli_query($koneksi,"select * from m_level_profesiensi where kode_level='$level_profesiensi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_level_profesiensi = stripslashes ($hasil2['label']);
            } else {
                $nama_level_profesiensi = "";
            }
        $nama_institusi = stripslashes ($hasil['nama_institusi']);
    	$kota_institusi = stripslashes ($hasil['kota_institusi']);
    	$negara_institusi = stripslashes ($hasil['negara_institusi']);
            $rs2 = mysqli_query($koneksi,"select nama_negara from m_negara where kode_negara='$negara_institusi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $negara_institusi2 = stripslashes ($hasil2['nama_negara']);
            } else {
                $negara_institusi2 = "";
            }
    	$tgl_mulai = stripslashes ($hasil['tgl_mulai']);
        $tgl_mulai2 = TanggalIndo2($tgl_mulai);
    	$tgl_selesai = stripslashes ($hasil['tgl_selesai']);
        $tgl_selesai2 = TanggalIndo2($tgl_selesai);
        $nilai_sertifikasi = stripslashes ($hasil['nilai_sertifikasi']);
        $level_sertifikasi = stripslashes ($hasil['level_sertifikasi']);
            $rs2 = mysqli_query($koneksi,"select label from m_level_sertifikasi where kode='$level_sertifikasi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $level_sertifikasi2 = stripslashes ($hasil2['label']);
            } else {
                $level_sertifikasi2 = "";
            }
        $lama_sertifikasi = stripslashes ($hasil['lama_sertifikasi']);
        $satuan_sertifikasi = stripslashes ($hasil['satuan_sertifikasi']);
            $rs2 = mysqli_query($koneksi,"select * from m_satuan_lama_pendidikan where kode='$satuan_sertifikasi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $satuan_sertifikasi2 = stripslashes ($hasil2['label']);
            } else {
                $satuan_sertifikasi2 = "";
            }
    	$tgl_expire = stripslashes ($hasil['tgl_expire']);
        $tgl_expire2 = TanggalIndo2($tgl_expire);
        $kode_transaksi = stripslashes ($hasil['kode_transaksi']);
        
        $datanya = array();
        $datanya["idsertifikat"] = $id;
        $datanya["nipsertifikat"] = $nip;
        $datanya["start_datesertifikat"] = $start_date;
        $datanya["start_date2sertifikat"] = $start_date2;
        $datanya["end_datesertifikat"] = $end_date;
        $datanya["end_date2sertifikat"] = $end_date2;
        $datanya["jenis_lembagasertifikat"] = $jenis_lembaga;
        $datanya["jenis_lembaga2sertifikat"] = $jenis_lembaga2;
        $datanya["judul_sertifikasisertifikat"] = $judul_sertifikasi;
        $datanya["no_sertifikasisertifikat"] = $no_sertifikasi;
        $datanya["kode_profesi_sertifikasisertifikat"] = $kode_profesi_sertifikasi;
        $datanya["profesi_sertifikasisertifikat"] = $profesi_sertifikasi;
        $datanya["level_profesiensisertifikat"] = $level_profesiensi;
        $datanya["nama_level_profesiensisertifikat"] = $nama_level_profesiensi;
        $datanya["nama_institusisertifikat"] = $nama_institusi;
        $datanya["kota_institusisertifikat"] = $kota_institusi;
        //$datanya["kode_negarasertifikat"] = $kode_negara;
        $datanya["negara_institusisertifikat"] = $negara_institusi;
        $datanya["negara_institusi2sertifikat"] = $negara_institusi2;
        $datanya["tgl_mulaisertifikat"] = $tgl_mulai;
        $datanya["tgl_mulai2sertifikat"] = $tgl_mulai2;
        $datanya["tgl_selesaisertifikat"] = $tgl_selesai;
        $datanya["tgl_selesai2sertifikat"] = $tgl_selesai2;
        $datanya["nilai_sertifikasisertifikat"] = $nilai_sertifikasi;
        $datanya["level_sertifikasisertifikat"] = $level_sertifikasi;
        $datanya["level_sertifikasi2sertifikat"] = $level_sertifikasi2;
        $datanya["lama_sertifikasisertifikat"] = $lama_sertifikasi;
        $datanya["satuan_sertifikasisertifikat"] = $satuan_sertifikasi;
        $datanya["tgl_expiresertifikat"] = $tgl_expire;
        $datanya["tgl_expire2sertifikat"] = $tgl_expire2;
        $datanya["kode_transaksisertifikat"] = $kode_transaksi;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>