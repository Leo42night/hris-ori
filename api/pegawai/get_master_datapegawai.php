<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";

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

    $kunci = "cipher.hris@s7o";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $jenis2 = isset($_POST['jenisdatapegawaicari']) ? $_POST['jenisdatapegawaicari'] : "semua";
    $aktif2 = isset($_POST['aktifdatapegawaicari']) ? $_POST['aktifdatapegawaicari'] : "1";
    $nama2 = isset($_POST['namadatapegawaicari']) ? $_POST['namadatapegawaicari'] : "";
    $perintah = "";
    if($jenis2!="semua"){
        if($perintah==""){
            $perintah .= " where jenis='$jenis2'";
        } else {
            $perintah .= " and jenis='$jenis2'";
        }
    }
    if($aktif2=="1"){
        if($perintah==""){
            $perintah .= " where aktif='1'";
        } else {
            $perintah .= " and aktif='1'";
        }
    } else {
        if($perintah==""){
            $perintah .= " where aktif<>'1'";
        } else {
            $perintah .= " and aktif<>'1'";
        }
    }
    if($nama2!=""){
        $perintah .= " and (nip='$nama2' or nama like '%$nama2%')";
    }
    
    $rs = mysqli_query($koneksi,"select count(*) from data_pegawai".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from data_pegawai".$perintah." order by id desc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashesx ($hasil['id']);
    	$nip = stripslashesx ($hasil['nip']);
    	$jenis_mutasi = stripslashesx ($hasil['jenis_mutasi']);
    	$jenis = stripslashesx ($hasil['jenis']);
        $no_sk = stripslashesx ($hasil['no_sk']);
        $nama = stripslashesx ($hasil['nama']);
        $jenis_kelamin = stripslashesx ($hasil['jenis_kelamin']);
    	$tempat_lahir = stripslashesx ($hasil['tempat_lahir']);
    	$tgl_lahir = stripslashesx ($hasil['tgl_lahir']);
        $tgl_lahir2 = TanggalIndo2($tgl_lahir);
    	$alamat = stripslashesx ($hasil['alamat']);
    	$alamat_domisili = stripslashesx ($hasil['alamat_domisili']);
    	$jabatan = stripslashesx ($hasil['jabatan']);
    	$divisi = stripslashesx ($hasil['divisi']);
    	$bidang = stripslashesx ($hasil['bidang']);
    	$sub_bidang = stripslashesx ($hasil['sub_bidang']);
    	$region = stripslashesx ($hasil['region']);
    	$unit = stripslashesx ($hasil['unit']);
    	$penempatan = stripslashesx ($hasil['penempatan']);
    	$grade = stripslashesx ($hasil['grade']);
        
        if(strpos($nip, "PCN") !== false || strpos($nip, "HPI") !== false || strpos($nip, "PRO") !== false){
            $nama_grade = $grade;
        } else {
            $rs2 = mysqli_query($koneksi,"select label as nama_grade from m_grade where kode_grade='$grade'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_grade = stripslashesx($hasil2['nama_grade']);
            } else {
                $nama_grade = $grade;
            }
        }

    	$skala_grade = stripslashesx ($hasil['skala_grade']);
    	$pendidikan = stripslashesx ($hasil['pendidikan']);
    	$jurusan = stripslashesx ($hasil['jurusan']);
    	$nik = stripslashesx ($hasil['nik']);
    	$no_kk = stripslashesx ($hasil['no_kk']);
    	$status = stripslashesx ($hasil['status']);
    	$telepon = stripslashesx ($hasil['telepon']);
    	$tgl_masuk = stripslashesx ($hasil['tgl_masuk']);
        $tgl_masuk2 = TanggalIndo2($tgl_masuk);
    	$tgl_capeg = stripslashesx ($hasil['tgl_capeg']);
        $tgl_capeg2 = TanggalIndo2($tgl_capeg);
    	$tgl_pegawai = stripslashesx ($hasil['tgl_pegawai']);
        $tgl_pegawai2 = TanggalIndo2($tgl_pegawai);
    	$tgl_awal_pkwt = stripslashesx ($hasil['tgl_awal_pkwt']);
    	$tgl_akhir_pkwt = stripslashesx ($hasil['tgl_akhir_pkwt']);
    	$tgl_awal_pkwtt = stripslashesx ($hasil['tgl_awal_pkwtt']);
    	$tgl_awal_tugaskarya = stripslashesx ($hasil['tgl_awal_tugaskarya']);
    	$tgl_akhir_tugaskarya = stripslashesx ($hasil['tgl_akhir_tugaskarya']);
    	$email = stripslashesx ($hasil['email']);
    	$email2 = stripslashesx ($hasil['email2']);
    	$agama = stripslashesx ($hasil['agama']);
    	$gol_darah = stripslashesx ($hasil['gol_darah']);
    	$npwp = stripslashesx ($hasil['npwp']);
    	$kpp = stripslashesx ($hasil['kpp']);
    	$nama_bank = stripslashesx ($hasil['nama_bank']);
    	$no_rekening = stripslashesx ($hasil['no_rekening']);
    	$nama_rekening = stripslashesx ($hasil['nama_rekening']);
    	$nama_bank2 = stripslashesx ($hasil['nama_bank2']);
    	$no_rekening2 = stripslashesx ($hasil['no_rekening2']);
    	$nama_rekening2 = stripslashesx ($hasil['nama_rekening2']);
    	$ibu_kandung = stripslashesx ($hasil['ibu_kandung']);
    	$baju = stripslashesx ($hasil['baju']);
    	$celana = stripslashesx ($hasil['celana']);
    	$sepatu = stripslashesx ($hasil['sepatu']);
    	$no_bpjs_kes = stripslashesx ($hasil['no_bpjs_kes']);
    	$tgl_bpjs_kes = stripslashesx ($hasil['tgl_bpjs_kes']);
    	$va_bpjs_kes = stripslashesx ($hasil['va_bpjs_kes']);
    	$no_bpjs_tk = stripslashesx ($hasil['no_bpjs_tk']);
    	$tgl_bpjs_tk = stripslashesx ($hasil['tgl_bpjs_tk']);
    	$va_bpjs_tk = stripslashesx ($hasil['va_bpjs_tk']);
    	$no_inhealth = stripslashesx ($hasil['no_inhealth']);
    	$tgl_inhealth = stripslashesx ($hasil['tgl_inhealth']);
    	$nama_bankdplk = stripslashesx ($hasil['nama_bankdplk']);
    	$no_rekeningdplk = stripslashesx ($hasil['no_rekeningdplk']);
    	$no_cifdplk = stripslashesx ($hasil['no_cifdplk']);
    	$aktif = stripslashesx ($hasil['aktif']);
    	$tgl_berhenti = stripslashesx ($hasil['tgl_berhenti']);
    	$keterangan = stripslashesx ($hasil['keterangan']);
    	$password = stripslashesx ($hasil['password']);
    	$atasan_langsung = stripslashesx ($hasil['atasan_langsung']);
    	$atasan_atasan_langsung = stripslashesx ($hasil['atasan_atasan_langsung']);
    	$level_sppd = stripslashesx ($hasil['level_sppd']);
    	$akses = stripslashesx ($hasil['akses']);
    	$kode_device = stripslashesx ($hasil['kode_device']);
    	$userid = stripslashesx ($hasil['userid']);
    	$welcome = stripslashesx ($hasil['welcome']);
    	$foto = stripslashesx ($hasil['foto']);
    	$approval_sdm = stripslashesx ($hasil['approval_sdm']);
    	$approval_pembayaran = stripslashesx ($hasil['approval_pembayaran']);
    	$approval_konsumsi = stripslashesx ($hasil['approval_konsumsi']);
    	$kasir = stripslashesx ($hasil['kasir']);
        $kd_project_sap = stripslashesx ($hasil['kd_project_sap']);

        if($nik!="" && strlen($nik)>20){
            $nik = decryptText($nik, $kunci);
        }
        if($no_kk!="" && strlen($no_kk)>20){
            $no_kk = decryptText($no_kk, $kunci);
        }
        if($npwp!="" && strlen($npwp)>20){
            $npwp = decryptText($npwp, $kunci);
        }
        if($telepon!="" && strlen($telepon)>20){
            $telepon = decryptText($telepon, $kunci);
        }
        
        $datanya = array();
        $datanya["iddatapegawai"] = $id;
        $datanya["nipdatapegawai"] = $nip;
        $datanya["jenis_mutasidatapegawai"] = $jenis_mutasi;
        $datanya["jenisdatapegawai"] = $jenis;
        $datanya["no_skdatapegawai"] = $no_sk;
        $datanya["namadatapegawai"] = $nama;
        $datanya["jenis_kelamindatapegawai"] = $jenis_kelamin;
        $datanya["tempat_lahirdatapegawai"] = $tempat_lahir;
        $datanya["tgl_lahirdatapegawai"] = $tgl_lahir;
        $datanya["tgl_lahir2datapegawai"] = $tgl_lahir2;
        $datanya["alamatdatapegawai"] = $alamat;
        $datanya["alamat_domisilidatapegawai"] = $alamat_domisili;
        $datanya["jabatandatapegawai"] = $jabatan;
        $datanya["divisidatapegawai"] = $divisi;
        $datanya["bidangdatapegawai"] = $bidang;
        $datanya["sub_bidangdatapegawai"] = $sub_bidang;
        $datanya["regiondatapegawai"] = $region;
        $datanya["unitdatapegawai"] = $unit;
        $datanya["penempatandatapegawai"] = $penempatan;
        $datanya["gradedatapegawai"] = $grade;
        $datanya["nama_gradedatapegawai"] = $nama_grade;
        $datanya["skala_gradedatapegawai"] = $skala_grade;
        $datanya["pendidikandatapegawai"] = $pendidikan;
        $datanya["jurusandatapegawai"] = $jurusan;
        $datanya["nikdatapegawai"] = $nik;
        $datanya["no_kkdatapegawai"] = $no_kk;
        $datanya["statusdatapegawai"] = $status;
        $datanya["telepondatapegawai"] = $telepon;
        $datanya["tgl_masukdatapegawai"] = $tgl_masuk;
        $datanya["tgl_masuk2datapegawai"] = $tgl_masuk2;
        $datanya["tgl_capegdatapegawai"] = $tgl_capeg;
        $datanya["tgl_capeg2datapegawai"] = $tgl_capeg2;
        $datanya["tgl_pegawaidatapegawai"] = $tgl_pegawai2;
        $datanya["tgl_pegawai2datapegawai"] = $tgl_pegawai;
        $datanya["tgl_awal_pkwtdatapegawai"] = $tgl_awal_pkwt;
        $datanya["tgl_akhir_pkwtdatapegawai"] = $tgl_akhir_pkwt;
        $datanya["tgl_awal_pkwttdatapegawai"] = $tgl_awal_pkwtt;
        $datanya["tgl_awal_tugaskaryadatapegawai"] = $tgl_awal_tugaskarya;
        $datanya["tgl_akhir_tugaskaryadatapegawai"] = $tgl_akhir_tugaskarya;
        $datanya["emaildatapegawai"] = $email;
        $datanya["email2datapegawai"] = $email2;
        $datanya["agamadatapegawai"] = $agama;
        $datanya["gol_darahdatapegawai"] = $gol_darah;
        $datanya["npwpdatapegawai"] = $npwp;
        $datanya["kppdatapegawai"] = $kpp;
        $datanya["nama_bankdatapegawai"] = $nama_bank;
        $datanya["no_rekeningdatapegawai"] = $no_rekening;
        $datanya["nama_rekeningdatapegawai"] = $nama_rekening;
        $datanya["nama_bank2datapegawai"] = $nama_bank2;
        $datanya["no_rekening2datapegawai"] = $no_rekening2;
        $datanya["nama_rekening2datapegawai"] = $nama_rekening2;
        $datanya["ibu_kandungdatapegawai"] = $ibu_kandung;
        $datanya["bajudatapegawai"] = $baju;
        $datanya["celanadatapegawai"] = $celana;
        $datanya["sepatudatapegawai"] = $sepatu;
        $datanya["no_bpjs_kesdatapegawai"] = $no_bpjs_kes;
        $datanya["tgl_bpjs_kesdatapegawai"] = $tgl_bpjs_kes;
        $datanya["va_bpjs_kesdatapegawai"] = $va_bpjs_kes;
        $datanya["no_bpjs_tkdatapegawai"] = $no_bpjs_tk;
        $datanya["tgl_bpjs_tkdatapegawai"] = $tgl_bpjs_tk;
        $datanya["va_bpjs_tkdatapegawai"] = $va_bpjs_tk;
        $datanya["no_inhealthdatapegawai"] = $no_inhealth;
        $datanya["tgl_inhealthdatapegawai"] = $tgl_inhealth;
        $datanya["nama_bankdplkdatapegawai"] = $nama_bankdplk;
        $datanya["no_rekeningdplkdatapegawai"] = $no_rekeningdplk;
        $datanya["no_cifdplkdatapegawai"] = $no_cifdplk;
        $datanya["aktifdatapegawai"] = $aktif;
        $datanya["tgl_berhentidatapegawai"] = $tgl_berhenti;
        $datanya["keterangandatapegawai"] = $keterangan;
        $datanya["passworddatapegawai"] = $password;
        $datanya["atasan_langsungdatapegawai"] = $atasan_langsung;
        $datanya["atasan_atasan_langsungdatapegawai"] = $atasan_atasan_langsung;
        $datanya["level_sppddatapegawai"] = $level_sppd;
        $datanya["aksesdatapegawai"] = $akses;
        $datanya["kode_devicedatapegawai"] = $kode_device;
        $datanya["kd_project_sapdatapegawai"] = $kd_project_sap;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>