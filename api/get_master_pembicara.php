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

    $nip2 = isset($_REQUEST['nip']) ? $_REQUEST['nip'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $rs = mysqli_query($koneksi,"select count(*) from r_pembicara where nip='$nip2'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from r_pembicara where nip='$nip2' order by end_date asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$start_date = stripslashes ($hasil['start_date']);
        $start_date2 = TanggalIndo2($start_date);
    	$end_date = stripslashes ($hasil['end_date']);
        $end_date2 = TanggalIndo2($end_date);
        $judul_acara = stripslashes ($hasil['judul_acara']);
    	$kode_penyelenggaraan = stripslashes ($hasil['kode_penyelenggaraan']);
            $rs2 = mysqli_query($koneksi,"select * from m_penyelenggaraan where kode='$kode_penyelenggaraan'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $penyelenggaraan = stripslashes ($hasil2['label']);
            } else {
                $penyelenggaraan = "";
            }                                                                                    
        $lokasi = stripslashes ($hasil['lokasi']);
        $peserta = stripslashes ($hasil['peserta']);
    	$tingkat_acara = stripslashes ($hasil['tingkat_acara']);
            $rs2 = mysqli_query($koneksi,"select * from m_tingkat_acara where kode='$tingkat_acara'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $tingkat_acara2 = stripslashes ($hasil2['label']);
            } else {
                $tingkat_acara2 = "";
            }                                                                                    
    	$kode_dahan_profesi = stripslashes ($hasil['kode_dahan_profesi']);
            $rs2 = mysqli_query($koneksi,"select dahan_profesi from m_pohon_profesinew where kode_dahan_profesi='$kode_dahan_profesi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $dahan_profesi = stripslashes ($hasil2['dahan_profesi']);
            } else {
                $dahan_profesi = "";
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
    	$udiklat = stripslashes ($hasil['udiklat']);
            $rs2 = mysqli_query($koneksi,"select * from m_udiklat where kode='$udiklat'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $udiklat2 = stripslashes ($hasil2['label']);
            } else {
                $udiklat2 = "";
            }                                                                                    
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
        
        $datanya = array();
        $datanya["idpembicara"] = $id;
        $datanya["nippembicara"] = $nip;
        $datanya["start_datepembicara"] = $start_date;
        $datanya["start_date2pembicara"] = $start_date2;
        $datanya["end_datepembicara"] = $end_date;
        $datanya["end_date2pembicara"] = $end_date2;
        $datanya["judul_acarapembicara"] = $judul_acara;
        $datanya["kode_penyelenggaraanpembicara"] = $kode_penyelenggaraan;
        $datanya["penyelenggaraanpembicara"] = $penyelenggaraan;
        $datanya["lokasipembicara"] = $lokasi;
        $datanya["pesertapembicara"] = $peserta;
        $datanya["tingkat_acarapembicara"] = $tingkat_acara;
        $datanya["tingkat_acara2pembicara"] = $tingkat_acara2;
        $datanya["kode_dahan_profesipembicara"] = $kode_dahan_profesi;
        $datanya["dahan_profesipembicara"] = $dahan_profesi;
        $datanya["kode_diklatpembicara"] = $kode_diklat;
        $datanya["kode_diklat2pembicara"] = $kode_diklat2;
        $datanya["judul_diklatpembicara"] = $judul_diklat;
        $datanya["udiklatpembicara"] = $udiklat;
        $datanya["udiklat2pembicara"] = $udiklat2;
        $datanya["jenis_pelaksanaanpembicara"] = $jenis_pelaksanaan;
        $datanya["jenis_pelaksanaan2pembicara"] = $jenis_pelaksanaan2;
        $datanya["jenis_sertifikasipembicara"] = $jenis_sertifikasi;
        $datanya["jenis_sertifikasi2pembicara"] = $jenis_sertifikasi2;
        $datanya["sifat_diklatpembicara"] = $sifat_diklat;
        $datanya["sifat_diklat2pembicara"] = $sifat_diklat2;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>