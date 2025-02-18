<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
require_once $_SERVER['DOCUMENT_ROOT'] . '/hris-ori/database/koneksi.php';
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

    $nama2 = isset($_POST['namapegawaicari']) ? $_POST['namapegawaicari'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $perintah = "";
    if($nama2!=""){
        if($perintah==""){
            $perintah .= " where nip like '%$nama2%' or nama_lengkap like '%$nama2%'";
        } else {
            $perintah .= " and nip like '%$nama2%' or nama_lengkap like '%$nama2%'";
        }
    }
    
    $rs = mysqli_query($koneksi,"select count(*) from data_pegawai".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from data_pegawai".$perintah." order by id desc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$start_date = stripslashes ($hasil['start_date']);
        $start_date2 = TanggalIndo2($start_date);
    	$end_date = stripslashes ($hasil['end_date']);
        $end_date2 = TanggalIndo2($end_date);
    	$tgl_masuk = strtoupper(stripslashes ($hasil['tgl_masuk']));
        $tgl_masuk2 = TanggalIndo2($tgl_masuk);
    	$tgl_capeg = stripslashes ($hasil['tgl_capeg']);
        $tgl_capeg2 = TanggalIndo2($tgl_capeg);
        $tgl_tetap = stripslashes ($hasil['tgl_tetap']);
        $tgl_tetap2 = TanggalIndo2($tgl_tetap);
        $title = stripslashes ($hasil['title']);
            $rs2 = mysqli_query($koneksi,"select label from m_title where kode='$title'");            
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $title2 = stripslashes ($hasil2['label']);
            } else {
                $title2 = "";
            }
        $nama_lengkap = stripslashes ($hasil['nama_lengkap']);
        $gelar_depan = stripslashes ($hasil['gelar_depan']);
            $rs2 = mysqli_query($koneksi,"select label from m_gelar_depan where kode='$gelar_depan'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $gelar_depan2 = stripslashes ($hasil2['label']);
            } else {
                $gelar_depan2 = "";
            }
        $gelar_belakang = stripslashes ($hasil['gelar_belakang']);
            $rs2 = mysqli_query($koneksi,"select label from m_gelar_belakang where kode='$gelar_belakang'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $gelar_belakang2 = stripslashes ($hasil2['label']);
            } else {
                $gelar_belakang2 = "";
            }
        $know_as = stripslashes ($hasil['know_as']);
        $tempat_lahir = stripslashes ($hasil['tempat_lahir']);
        $tgl_lahir = stripslashes ($hasil['tgl_lahir']);
        $tgl_lahir2 = TanggalIndo2($tgl_lahir);
        $kode_negara = stripslashes ($hasil['kode_negara']);
            $rs2 = mysqli_query($koneksi,"select nama_negara from m_negara where kode_negara='$kode_negara'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_negara = stripslashes ($hasil2['nama_negara']);
            } else {
                $nama_negara = "";
            }
        $jenis_kelamin = stripslashes ($hasil['jenis_kelamin']);
            $rs2 = mysqli_query($koneksi,"select label from m_jenis_kelamin where kode='$jenis_kelamin'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_kelamin2 = stripslashes ($hasil2['label']);
            } else {
                $jenis_kelamin2 = "";
            }
        $id_agama = stripslashes ($hasil['id_agama']);
            $rs2 = mysqli_query($koneksi,"select label from m_agama where id_agama='$id_agama'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_agama = stripslashes ($hasil2['label']);
            } else {
                $nama_agama = "";
            }
        $status_nikah = stripslashes ($hasil['status_nikah']);
            $rs2 = mysqli_query($koneksi,"select label from m_status_nikah where kode='$status_nikah'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $status_nikah2 = stripslashes ($hasil2['label']);
            } else {
                $status_nikah2 = "";
            }
        $tgl_nikah = stripslashes ($hasil['tgl_nikah']);
        $tgl_nikah2 = TanggalIndo2($tgl_nikah);
        $status_warganegara = stripslashes ($hasil['status_warganegara']);
            $rs2 = mysqli_query($koneksi,"select label from m_status_kewarganegaraan where kode='$status_warganegara'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $status_warganegara2 = stripslashes ($hasil2['label']);
            } else {
                $status_warganegara2 = "";
            }
        $gol_darah = stripslashes ($hasil['gol_darah']);
            $rs2 = mysqli_query($koneksi,"select label from m_gol_darah where kode='$gol_darah'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $gol_darah2 = stripslashes ($hasil2['label']);
            } else {
                $gol_darah2 = "";
            }
        $suku = stripslashes ($hasil['suku']);
        $telepon_utama = stripslashes ($hasil['telepon_utama']);
        $telepon_cadangan1 = stripslashes ($hasil['telepon_cadangan1']);
        $telepon_cadangan2 = stripslashes ($hasil['telepon_cadangan2']);
        $telepon_cadangan3 = stripslashes ($hasil['telepon_cadangan3']);
        $telepon_darurat = stripslashes ($hasil['telepon_darurat']);
        $jenis_dplk = stripslashes ($hasil['jenis_dplk']);
            $rs2 = mysqli_query($koneksi,"select jenis_dplk from m_jenis_dplk where kode='$jenis_dplk'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_dplk2 = stripslashes ($hasil2['jenis_dplk']);
            } else {
                $jenis_dplk2 = "";
            }
        $id_dplk = stripslashes ($hasil['id_dplk']);
        $bank_dplk = stripslashes ($hasil['bank_dplk']);
        $no_bpjs_kes = stripslashes ($hasil['no_bpjs_kes']);
        $no_bpjs_tk = stripslashes ($hasil['no_bpjs_tk']);
        $bank_payroll = stripslashes ($hasil['bank_payroll']);
        $an_payroll = stripslashes ($hasil['an_payroll']);
        $no_rek_payroll = stripslashes ($hasil['no_rek_payroll']);        
        $status_integrasi = stripslashes ($hasil['status_integrasi']);
            $rs2 = mysqli_query($koneksi,"select label from m_status_integrasi where kode_integrasi='$status_integrasi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $status_integrasi2 = stripslashes ($hasil2['label']);
            } else {
                $status_integrasi2 = "";
            }

        $rs3 = mysqli_query($koneksi,"select * from r_pengangkatan where nip='$nip' order by tgl_masuk desc limit 1");
        $hasil3 = mysqli_fetch_array($rs3);
        if($hasil3){
            $person_grade = stripslashes ($hasil3['person_grade']);
            $nik = stripslashes ($hasil3['nik']);
            $npwp = stripslashes ($hasil3['npwp']);
            $keterangan_mutasi = stripslashes ($hasil3['keterangan_mutasi']);
            $person_grade = stripslashes ($hasil3['person_grade']);
        } else {
            $person_grade = "-";
            $nik = "";
            $npwp = "";
            $keterangan_mutasi = "";
            $person_grade = "";
        }
        
        $datanya = array();
        $datanya["idpegawai"] = $id;
        $datanya["nippegawai"] = $nip;
        $datanya["start_datepegawai"] = $start_date;
        $datanya["start_date2pegawai"] = $start_date2;
        $datanya["end_datepegawai"] = $end_date;
        $datanya["end_date2pegawai"] = $end_date2;
        $datanya["tgl_masukpegawai"] = $tgl_masuk;
        $datanya["tgl_masuk2pegawai"] = $tgl_masuk2;
        $datanya["tgl_capegpegawai"] = $tgl_capeg;
        $datanya["tgl_capeg2pegawai"] = $tgl_capeg2;
        $datanya["tgl_tetappegawai"] = $tgl_tetap;
        $datanya["tgl_tetap2pegawai"] = $tgl_tetap2;
        $datanya["titlepegawai"] = $title;
        $datanya["title2pegawai"] = $title2;
        $datanya["nama_lengkappegawai"] = $nama_lengkap;
        $datanya["gelar_depanpegawai"] = $gelar_depan;
        $datanya["gelar_depan2pegawai"] = $gelar_depan2;
        $datanya["gelar_belakangpegawai"] = $gelar_belakang;
        $datanya["gelar_belakang2pegawai"] = $gelar_belakang2;
        $datanya["know_aspegawai"] = $know_as;
        $datanya["tempat_lahirpegawai"] = $tempat_lahir;
        $datanya["tgl_lahirpegawai"] = $tgl_lahir;
        $datanya["tgl_lahir2pegawai"] = $tgl_lahir2;
        $datanya["kode_negarapegawai"] = $kode_negara;
        $datanya["nama_negarapegawai"] = $nama_negara;
        $datanya["jenis_kelaminpegawai"] = $jenis_kelamin;
        $datanya["jenis_kelamin2pegawai"] = $jenis_kelamin2;
        $datanya["idpegawai"] = $id;
        $datanya["id_agamapegawai"] = $id_agama;
        $datanya["nama_agamapegawai"] = $nama_agama;
        $datanya["status_nikahpegawai"] = $status_nikah;
        $datanya["status_nikah2pegawai"] = $status_nikah2;
        $datanya["tgl_nikahpegawai"] = $tgl_nikah;
        $datanya["tgl_nikah2pegawai"] = $tgl_nikah2;
        $datanya["status_warganegarapegawai"] = $status_warganegara;
        $datanya["status_warganegara2pegawai"] = $status_warganegara2;
        $datanya["gol_darahpegawai"] = $gol_darah;
        $datanya["gol_darah2pegawai"] = $gol_darah2;
        $datanya["sukupegawai"] = $suku;
        $datanya["telepon_utamapegawai"] = $telepon_utama;
        $datanya["telepon_cadangan1pegawai"] = $telepon_cadangan1;
        $datanya["telepon_cadangan2pegawai"] = $telepon_cadangan2;
        $datanya["telepon_cadangan3pegawai"] = $telepon_cadangan3;
        $datanya["telepon_daruratpegawai"] = $telepon_darurat;
        $datanya["jenis_dplkpegawai"] = $jenis_dplk;
        $datanya["jenis_dplk2pegawai"] = $jenis_dplk2;
        $datanya["id_dplkpegawai"] = $id_dplk;
        $datanya["bank_dplkpegawai"] = $bank_dplk;
        $datanya["no_bpjs_kespegawai"] = $no_bpjs_kes;
        $datanya["no_bpjs_tkpegawai"] = $no_bpjs_tk;
        $datanya["bank_payrollpegawai"] = $bank_payroll;
        $datanya["an_payrollpegawai"] = $an_payroll;
        $datanya["no_rek_payrollpegawai"] = $no_rek_payroll;
        $datanya["status_integrasipegawai"] = $status_integrasi;
        $datanya["status_integrasi2pegawai"] = $status_integrasi2;

        $datanya["person_gradepegawai"] = $person_grade;
        $datanya["nikpegawai"] = $nik;
        $datanya["npwppegawai"] = $npwp;
        $datanya["keterangan_mutasipegawai"] = $keterangan_mutasi;
        $datanya["person_gradepegawai"] = $person_grade;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>