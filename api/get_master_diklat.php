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

    $nip2 = isset($_REQUEST['nip']) ? $_REQUEST['nip'] : "8017001TRK";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $rs = mysqli_query($koneksi,"select count(*) from r_diklat where nip='$nip2'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from r_diklat where nip='$nip2' order by end_date asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$start_date = stripslashes ($hasil['start_date']);
        $start_date2 = TanggalIndo2($start_date);
    	$end_date = stripslashes ($hasil['end_date']);
        $end_date2 = TanggalIndo2($end_date);
    	$jenis_diklat = stripslashes ($hasil['jenis_diklat']);
            $rs2 = mysqli_query($koneksi,"select * from m_jenis_diklat where kode='$jenis_diklat'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_diklat2 = stripslashes ($hasil2['label']);
            } else {
                $jenis_diklat2 = "";
            }
        $kode_diklat = stripslashes ($hasil['kode_diklat']);
            $rs2 = mysqli_query($koneksi,"select * from m_kode_diklat where kode='$kode_diklat'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $kode_diklat2 = stripslashes ($hasil2['label']);
            } else {
                $kode_diklat2 = "";
            }
        $judul_diklat = stripslashes ($hasil['judul_diklat']);
        $penyelenggaraan = stripslashes ($hasil['penyelenggaraan']);
        $kode_profesi = stripslashes ($hasil['kode_profesi']);
            $rs2 = mysqli_query($koneksi,"select * from m_pohon_profesinew where kode_nama_profesi='$kode_profesi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_profesi = stripslashes ($hasil2['nama_profesi']);
            } else {
                $nama_profesi = "";
            }                        
        
    	$level_profesiensi = stripslashes ($hasil['level_profesiensi']);
            $rs2 = mysqli_query($koneksi,"select * from m_level_profesiensi where kode_level='$level_profesiensi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $level_profesiensi2 = stripslashes ($hasil2['label']);
            } else {
                $level_profesiensi2 = "";
            }
    	$nama_institusi = stripslashes ($hasil['nama_institusi']);
    	$kota_institusi = stripslashes ($hasil['kota_institusi']);
            $rs2 = mysqli_query($koneksi,"select * from m_kabupaten where id_kabupaten='$kota_institusi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $kota_institusi2 = stripslashes ($hasil2['nama_kabupaten']);
            } else {
                $kota_institusi2 = "";
            }
    	$kota_lainnya = stripslashes ($hasil['kota_lainnya']);
    	$negara_institusi = stripslashes ($hasil['negara_institusi']);
            $rs2 = mysqli_query($koneksi,"select * from m_negara where kode_negara='$negara_institusi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $negara_institusi2 = stripslashes ($hasil2['nama_negara']);
            } else {
                $negara_institusi2 = "";
            }
    	$lama_diklat = stripslashes ($hasil['lama_diklat']);
    	$satuan_diklat = stripslashes ($hasil['satuan_diklat']);
            $rs2 = mysqli_query($koneksi,"select * from m_satuan_lama_pendidikan where kode='$satuan_diklat'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $satuan_diklat2 = stripslashes ($hasil2['label']);
            } else {
                $satuan_diklat2 = "";
            }
    	$nilai = stripslashes ($hasil['nilai']);
    	$grade_nilai = stripslashes ($hasil['grade_nilai']);
    	$jenis_pelaksanaan = stripslashes ($hasil['jenis_pelaksanaan']);
            $rs2 = mysqli_query($koneksi,"select * from m_jenis_pelaksanaan where kode='$jenis_pelaksanaan'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_pelaksanaan2 = stripslashes ($hasil2['label']);
            } else {
                $jenis_pelaksanaan2 = "";
            }
    	$jenis_sertifikasi = stripslashes ($hasil['jenis_sertifikasi']);
            $rs2 = mysqli_query($koneksi,"select * from m_jenis_sertifikat where kode='$jenis_sertifikasi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_sertifikasi2 = stripslashes ($hasil2['label']);
            } else {
                $jenis_sertifikasi2 = "";
            }
    	$sifat_diklat = stripslashes ($hasil['sifat_diklat']);
            $rs2 = mysqli_query($koneksi,"select * from m_sifat_diklat where kode='$sifat_diklat'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $sifat_diklat2 = stripslashes ($hasil2['label']);
            } else {
                $sifat_diklat2 = "";
            }
    	$konfirmasi_kehadiran = stripslashes ($hasil['konfirmasi_kehadiran']);
    	$keterangan_lulus = stripslashes ($hasil['keterangan_lulus']);
    	$kode_sertifikat = stripslashes ($hasil['kode_sertifikat']);
    	$tgl_terbit = stripslashes ($hasil['tgl_terbit']);
        $tgl_terbit2 = TanggalIndo2($tgl_terbit);
    	$tgl_selesai = stripslashes ($hasil['tgl_selesai']);
        $tgl_selesai2 = TanggalIndo2($tgl_selesai);
    	$udiklat = stripslashes ($hasil['udiklat']);
            $rs2 = mysqli_query($koneksi,"select * from m_udiklat where kode='$udiklat'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $udiklat2 = stripslashes ($hasil2['label']);
            } else {
                $udiklat2 = "";
            }
    	$keterangan_realisasi = stripslashes ($hasil['keterangan_realisasi']);
    	$keterangan_penyelesaian = stripslashes ($hasil['keterangan_penyelesaian']);
    	$kode_dahan_profesi = stripslashes ($hasil['kode_dahan_profesi']);
            $rs2 = mysqli_query($koneksi,"select * from m_pohon_profesinew where kode_dahan_profesi='$kode_dahan_profesi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $dahan_profesi = stripslashes ($hasil2['dahan_profesi']);
            } else {
                $dahan_profesi = "";
            }
    	$kode_transaksi = stripslashes ($hasil['kode_transaksi']);
        
        $datanya = array();
        $datanya["iddiklat"] = $id;
        $datanya["nipdiklat"] = $nip;
        $datanya["start_datediklat"] = $start_date;
        $datanya["start_date2diklat"] = $start_date2;
        $datanya["end_datediklat"] = $end_date;
        $datanya["end_date2diklat"] = $end_date2;
        $datanya["jenis_diklat"] = $jenis_diklat;
        $datanya["jenis_diklat2"] = $jenis_diklat2;
        $datanya["kode_diklat"] = $kode_diklat;
        $datanya["kode_diklat2"] = $kode_diklat2;
        $datanya["judul_diklat"] = $judul_diklat;
        
        $datanya["judul_diklat"] = $judul_diklat;
        $datanya["penyelenggaraandiklat"] = $penyelenggaraan;
        $datanya["kode_profesidiklat"] = $kode_profesi;
        $datanya["nama_profesidiklat"] = $nama_profesi;
        $datanya["level_profesiensidiklat"] = $level_profesiensi;
        $datanya["level_profesiensi2diklat"] = $level_profesiensi2;
        $datanya["nama_institusidiklat"] = $nama_institusi;
        $datanya["kota_institusidiklat"] = $kota_institusi;
        $datanya["kota_institusi2diklat"] = $kota_institusi2;
        $datanya["kota_lainnyadiklat"] = $kota_lainnya;
        $datanya["negara_institusidiklat"] = $negara_institusi;
        $datanya["negara_institusi2diklat"] = $negara_institusi2;
        $datanya["lama_diklat"] = $lama_diklat;
        $datanya["satuan_diklat"] = $satuan_diklat;
        $datanya["satuan_diklat2"] = $satuan_diklat2;
        $datanya["nilaidiklat"] = $nilai;
        $datanya["grade_nilaidiklat"] = $grade_nilai;
        $datanya["jenis_pelaksanaandiklat"] = $jenis_pelaksanaan;
        $datanya["jenis_pelaksanaan2diklat"] = $jenis_pelaksanaan2;
        $datanya["jenis_sertifikasidiklat"] = $jenis_sertifikasi;
        $datanya["jenis_sertifikasi2diklat"] = $jenis_sertifikasi2;
        $datanya["sifat_diklat"] = $sifat_diklat;
        $datanya["sifat_diklat2"] = $sifat_diklat2;
        $datanya["konfirmasi_kehadirandiklat"] = $konfirmasi_kehadiran;
        $datanya["keterangan_lulusdiklat"] = $keterangan_lulus;
        $datanya["kode_sertifikatdiklat"] = $kode_sertifikat;
        $datanya["tgl_terbitdiklat"] = $tgl_terbit;
        $datanya["tgl_terbit2diklat"] = $tgl_terbit2;
        $datanya["tgl_selesaidiklat"] = $tgl_selesai;
        $datanya["tgl_selesai2diklat"] = $tgl_selesai2;
        $datanya["udiklatdiklat"] = $udiklat;
        $datanya["udiklat2diklat"] = $udiklat2;
        $datanya["keterangan_realisasidiklat"] = $keterangan_realisasi;
        $datanya["keterangan_penyelesaiandiklat"] = $keterangan_penyelesaian;
        $datanya["kode_dahan_profesidiklat"] = $kode_dahan_profesi;
        $datanya["dahan_profesidiklat"] = $dahan_profesi;
        $datanya["kode_transaksidiklat"] = $kode_transaksi;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>