<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/vendor/autoload.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/vendor/pear/http_request2/HTTP/Request2.php"; // Only when installed with PEAR
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if ($userhris){    
    date_default_timezone_set("Asia/Jakarta");   
    function TanggalIndo2($date){
        if($date!="" && $date!=null){
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $result = $tgl . "." . $bulan . ".". $tahun;	
            return($result);
        } else {
            //return("01.01.1970");
            return("");
        }
    }

    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";

    $rs30 = mysqli_query($koneksi,"select * from baseurl_api order by id desc limit 1");
    $hasil30 = mysqli_fetch_array($rs30);
    if($hasil30){
        $baseurl = $hasil30['baseurl'];
    } else {
        $baseurl = "";
    }    

    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    $rs31 = mysqli_query($koneksi,"select * from akses_token order by id desc limit 1");
    $hasil31 = mysqli_fetch_array($rs31);
    if($hasil31){
        $jwtToken = $hasil31['jwtToken'];
    } else {
        $jwtToken = "";
    }    
    //$nip = "9219008ZTY";

    $rs31 = mysqli_query($koneksi,"select nip from r_diklat where status_edit='1' group by nip order by nip asc limit 1");
    while($row1 = mysqli_fetch_array($rs31)){
        $nip = $row1['nip'];

        $datanya = "[";
        $i=1;
        $rs32 = mysqli_query($koneksi,"select * from r_diklat where nip='$nip' order by id asc");
        while($row = mysqli_fetch_array($rs32)){
            //$row = mysqli_fetch_array($rs32);
            $id = intval($row['id']);
            $tgl_edit = $row['tgl_edit'];
            $user_edit = $row['user_edit'];
            $nip = $row['nip'];
            $start_date = TanggalIndo2($row["start_date"]);
            $end_date = TanggalIndo2($row["end_date"]);
            $jenis_diklat = $row["jenis_diklat"];
            $kode_diklat = $row["kode_diklat"];
            $judul_diklat = $row["judul_diklat"];
            $penyelenggaraan = $row["penyelenggaraan"];
            $kode_profesi = $row["kode_profesi"];
            $level_profesiensi = $row["level_profesiensi"];
            $nama_institusi = $row["nama_institusi"];
            $kota_institusi = $row["kota_institusi"];
            $kota_lainnya = $row["kota_lainnya"];
            $negara_institusi = $row["negara_institusi"];
            $lama_diklat = $row["lama_diklat"];
            $satuan_diklat = $row["satuan_diklat"];
            $nilai = $row["nilai"];
            $grade_nilai = $row["grade_nilai"];
            $jenis_pelaksanaan = $row["jenis_pelaksanaan"];
            $jenis_sertifikasi = $row["jenis_sertifikasi"];
            $sifat_diklat = $row["sifat_diklat"];
            $konfirmasi_kehadiran = $row["konfirmasi_kehadiran"];
            $keterangan_lulus = $row["keterangan_lulus"];
            $kode_sertifikat = $row["kode_sertifikat"];
            $tgl_terbit = TanggalIndo2($row["tgl_terbit"]);
            $tgl_selesai = TanggalIndo2($row["tgl_selesai"]);
            $udiklat = $row["udiklat"];
            $keterangan_realisasi = $row["keterangan_realisasi"];
            $keterangan_penyelesaian = $row["keterangan_penyelesaian"];
            $kode_dahan_profesi = $row["kode_dahan_profesi"];
            $dahan_profesi = $row["dahan_profesi"];
            $identity_pln_group = "1006";
            $kode_transaksi = $row["kode_transaksi"];
            if($i>1){
                $datanya .= ',';    
            }
            $datanya .= '
            {
                "startDate": "'.$start_date.'",
                "endDate": "'.$start_date.'",
                "nip": "'.$nip.'",
                "kodeJenisDiklat": "'.$jenis_diklat.'",
                "kodeDiklat": "'.$kode_diklat.'",
                "judulDiklat": "'.$judul_diklat.'",
                "kodePenyelenggaraan": "'.$penyelenggaraan.'",
                "kodeProfesi": "'.$kode_profesi.'",
                "kodeLevelProfesiensi": "'.$level_profesiensi.'",
                "namaInstitusiDiklat": "'.$nama_institusi.'",
                "kodeKotaKabupaten": "'.$kota_institusi.'",
                "kotaInstitusiDiklatLain": "'.$kota_lainnya.'",
                "kodeNegara": "'.$negara_institusi.'",
                "angkaLamaDiklat": "'.$lama_diklat.'",
                "kodeSatuanLama": "'.$satuan_diklat.'",
                "nilai": "'.$nilai.'",
                "gradeNilai": "'.$grade_nilai.'",
                "kodeJenisPelaksanaan": "'.$jenis_pelaksanaan.'",
                "kodeJenisSertifikat": "'.$jenis_sertifikasi.'",
                "kodeSifatDiklat": "'.$sifat_diklat.'",
                "konfirmasiKehadiran": "'.$konfirmasi_kehadiran.'",
                "keteranganLulus": "'.$keterangan_lulus.'",
                "kodeSertifikat": "'.$kode_sertifikat.'",
                "tglTerbitSertifikat": "'.$tgl_terbit.'",
                "tglSelesaiSertifikat": "'.$tgl_selesai.'",
                "kodeUdiklat": "'.$udiklat.'",
                "keteranganRealisasi": "'.$keterangan_realisasi.'",
                "keteranganPenyelesaian": "'.$keterangan_penyelesaian.'",
                "kodeDahanProfesi": "'.$kode_dahan_profesi.'",
                "kodeTransaksi": "'.$kode_transaksi.'",
                "kodePlnGroup": "'.$identity_pln_group.'"
            }';
            $i++; 
        } 
        $datanya .= "]";   
    }
    echo json_encode(array('resultMsg'=>json_decode($datanya)));
}
?>