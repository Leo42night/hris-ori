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

    $nip2 = isset($_REQUEST['nip']) ? $_REQUEST['nip'] : "9219008ZTY";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $rs = mysqli_query($koneksi,"select count(*) from r_pengajar where nip='$nip2'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from r_pengajar where nip='$nip2' order by end_date asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$start_date = stripslashes ($hasil['start_date']);
        $start_date2 = TanggalIndo2($start_date);
    	$end_date = stripslashes ($hasil['end_date']);
        $end_date2 = TanggalIndo2($end_date);
    	$kode_dahan_profesi = stripslashes ($hasil['kode_dahan_profesi']);
            $rs2 = mysqli_query($koneksi,"select * from m_pohon_profesinew where kode_dahan_profesi='$kode_dahan_profesi'");
            $hasil2 = mysqli_fetch_array($rs2);
            $dahan_profesi = stripslashes ($hasil2['dahan_profesi']);
        $kode_diklat = stripslashes ($hasil['kode_diklat']);
        $judul_diklat = stripslashes ($hasil['judul_diklat']);
    	$udiklat = stripslashes ($hasil['udiklat']);
            $rs2 = mysqli_query($koneksi,"select * from m_udiklat where kode='$udiklat'");
            $hasil2 = mysqli_fetch_array($rs2);
            $udiklat2 = stripslashes ($hasil2['label']);
    	$jenis_pelaksanaan = stripslashes ($hasil['jenis_pelaksanaan']);
            $rs2 = mysqli_query($koneksi,"select * from m_jenis_pelaksanaan where kode='$jenis_pelaksanaan'");
            $hasil2 = mysqli_fetch_array($rs2);
            $jenis_pelaksanaan2 = stripslashes ($hasil2['label']);
    	$jenis_sertifikasi = stripslashes ($hasil['jenis_sertifikasi']);
            $rs2 = mysqli_query($koneksi,"select * from m_jenis_sertifikat where kode='$jenis_sertifikasi'");
            $hasil2 = mysqli_fetch_array($rs2);
            $jenis_sertifikasi2 = stripslashes ($hasil2['label']);
    	$sifat_diklat = stripslashes ($hasil['sifat_diklat']);
            $rs2 = mysqli_query($koneksi,"select * from m_sifat_diklat where kode='$sifat_diklat'");
            $hasil2 = mysqli_fetch_array($rs2);
            $sifat_diklat2 = stripslashes ($hasil2['label']);
        $penyelenggaraan = stripslashes ($hasil['penyelenggaraan']);
        $keterangan_pengajar = stripslashes ($hasil['keterangan_pengajar']);
        
        $datanya = array();
        $datanya["idpengajar"] = $id;
        $datanya["nippengajar"] = $nip;
        $datanya["start_datepengajar"] = $start_date;
        $datanya["start_date2pengajar"] = $start_date2;
        $datanya["end_datepengajar"] = $end_date;
        $datanya["end_date2pengajar"] = $end_date2;
        $datanya["kode_dahan_profesipengajar"] = $kode_dahan_profesi;
        $datanya["dahan_profesipengajar"] = $dahan_profesi;
        $datanya["kode_diklatpengajar"] = $kode_diklat;
        $datanya["judul_diklatpengajar"] = $judul_diklat;
        /*
        $datanya["tingkat_acarapengajar"] = $tingkat_acara;
        $datanya["tingkat_acara2pengajar"] = $tingkat_acara2;
        */
        //$datanya["kode_pengajarpengajar"] = $kode_pengajar;
        $datanya["judul_diklatpengajar"] = $judul_diklat;
        $datanya["udiklatpengajar"] = $udiklat;
        $datanya["udiklat2pengajar"] = $udiklat2;
        $datanya["jenis_pelaksanaanpengajar"] = $jenis_pelaksanaan;
        $datanya["jenis_pelaksanaan2pengajar"] = $jenis_pelaksanaan2;
        $datanya["jenis_sertifikasipengajar"] = $jenis_sertifikasi;
        $datanya["jenis_sertifikasi2pengajar"] = $jenis_sertifikasi2;
        $datanya["sifat_diklatpengajar"] = $sifat_diklat;
        $datanya["sifat_diklat2pengajar"] = $sifat_diklat2;
        $datanya["penyelenggaraanpengajar"] = $penyelenggaraan;
        $datanya["keterangan_pengajar"] = $keterangan_pengajar;
        
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>