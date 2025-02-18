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

    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $nip2 = isset($_REQUEST['nip']) ? $_REQUEST['nip'] : "";
    //$nip2 = "9219008ZTY";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $rs = mysqli_query($koneksi,"select count(*) from r_pendidikan where nip='$nip2'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from r_pendidikan where nip='$nip2' order by jenis_pendidikan asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$start_date = stripslashes ($hasil['start_date']);
        $start_date2 = TanggalIndo2($start_date);
    	$end_date = stripslashes ($hasil['end_date']);
        $end_date2 = TanggalIndo2($end_date);
    	$keterangan_pendidikan = stripslashes ($hasil['keterangan_pendidikan']);
            $rs2 = mysqli_query($koneksi,"select label from m_keterangan_pendidikan where kode='$keterangan_pendidikan'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $keterangan_pendidikan2 = stripslashes ($hasil2['label']);
            } else {
                $keterangan_pendidikan2 = "";
            }
    	$jenis_pendidikan = stripslashes ($hasil['jenis_pendidikan']);
            $rs2 = mysqli_query($koneksi,"select label from m_jenis_pendidikan where kode='$jenis_pendidikan'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_pendidikan2 = stripslashes ($hasil2['label']);
            } else {
                $jenis_pendidikan2 = "";
            }
        //$judul_kursus = stripslashes ($hasil['judul_kursus']);
        $jurusan = stripslashes ($hasil['jurusan']);
        $nama_institusi = stripslashes ($hasil['nama_institusi']);
        $kota_institusi = stripslashes ($hasil['kota_institusi']);
            $rs2 = mysqli_query($koneksi,"select nama_kabupaten from m_kabupaten where id_kabupaten='$kota_institusi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $kota_institusi2 = stripslashes ($hasil2['nama_kabupaten']);
            } else {
                $kota_institusi2 = "";
            }
        $kota_institusi_lainnya = stripslashes ($hasil['kota_institusi_lainnya']);
            $rs2 = mysqli_query($koneksi,"select nama_kabupaten from m_kabupaten where id_kabupaten='$kota_institusi_lainnya'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $kota_institusi_lainnya2 = stripslashes ($hasil2['nama_kabupaten']);
            } else {
                $kota_institusi_lainnya2 = "";
            }
    	$negara_institusi = stripslashes ($hasil['negara_institusi']);
            $rs2 = mysqli_query($koneksi,"select nama_negara from m_negara where kode_negara='$negara_institusi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_negara_institusi = stripslashes ($hasil2['nama_negara']);
            } else {
                $nama_negara_institusi = "";
            }
        $lama_pendidikan = stripslashes ($hasil['lama_pendidikan']);
        $satuan_lama_pendidikan = stripslashes ($hasil['satuan_lama_pendidikan']);
            $rs2 = mysqli_query($koneksi,"select * from m_satuan where kode='$satuan_lama_pendidikan'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $satuan_lama_pendidikan2 = stripslashes ($hasil2['label']);
            } else {
                $satuan_lama_pendidikan2 = "";
            }
        $nilai = stripslashes ($hasil['nilai']);
        $kode_transaksi = stripslashes ($hasil['kode_transaksi']);
        if($lama_pendidikan!="" && $lama_pendidikan!="0"){
            $lama_pendidikan2 = $lama_pendidikan." ".$satuan_lama_pendidikan2;
        } else {
            $lama_pendidikan2 = "";
        }
        
        $datanya = array();
        $datanya["idpendidikan"] = $id;
        $datanya["nippendidikan"] = $nip;
        $datanya["start_datependidikan"] = $start_date;
        $datanya["start_date2pendidikan"] = $start_date2;
        $datanya["end_datependidikan"] = $end_date;
        $datanya["end_date2pendidikan"] = $end_date2;
        $datanya["keterangan_pendidikan"] = $keterangan_pendidikan;
        $datanya["keterangan_pendidikan2"] = $keterangan_pendidikan2;
        $datanya["jenis_pendidikan"] = $jenis_pendidikan;
        $datanya["jenis_pendidikan2"] = $jenis_pendidikan2;
        //$datanya["judul_kursuspendidikan"] = $judul_kursus;
        $datanya["jurusanpendidikan"] = $jurusan;
        $datanya["nama_institusipendidikan"] = $nama_institusi;
        $datanya["kota_institusipendidikan"] = $kota_institusi;
        $datanya["kota_institusi2pendidikan"] = $kota_institusi2;
        $datanya["kota_institusi_lainnyapendidikan"] = $kota_institusi_lainnya;
        $datanya["kota_institusi_lainnya2pendidikan"] = $kota_institusi_lainnya2;
        $datanya["negara_institusipendidikan"] = $negara_institusi;
        $datanya["nama_negara_institusipendidikan"] = $nama_negara_institusi;
        $datanya["lama_pendidikan"] = $lama_pendidikan;
        $datanya["lama_pendidikan2"] = $lama_pendidikan2;
        $datanya["satuan_lama_pendidikan"] = $satuan_lama_pendidikan;
        $datanya["nilaipendidikan"] = $nilai;
        $datanya["kode_transaksipendidikan"] = $kode_transaksi;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>