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
 
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $nama2 = isset($_POST['namamappingpajakcari']) ? $_POST['namamappingpajakcari'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $perintah = "";
    if($nama2!=""){
        $perintah .= " and (nip='$nama2' or nama like '%$nama2%')";
    }
    
    $rs = mysqli_query($koneksi,"select count(*) from data_pegawai where nip<>'' and aktif='1'".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $items = array();
    $rs = mysqli_query($koneksi,"select * from data_pegawai where nip<>'' and aktif='1'".$perintah." order by id desc limit $offset,$rows");
    while ($hasil = mysqli_fetch_array($rs)) {    	
        $nip = stripslashesx ($hasil['nip']);
        $nama = stripslashesx ($hasil['nama']);
        $jabatan = stripslashesx ($hasil['jabatan']);

        $rs2 = mysqli_query($koneksi,"select * from mapping_pajak where nip='$nip'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $id = stripslashesx ($hasil2['id']);
            $kode_departemen = stripslashesx($hasil2['kode_departemen']);
            $kode_project = stripslashesx($hasil2['kode_project']);
            $honorarium = stripslashesx($hasil2['honorarium']);
            $honorer = stripslashesx($hasil2['honorer']);
            $tarif_grade = stripslashesx($hasil2['tarif_grade']);
            $tunjangan_posisi = stripslashesx($hasil2['tunjangan_posisi']);
            $p21b = stripslashesx($hasil2['p21b']);
            $p22b = stripslashesx($hasil2['p22b']);
            $tunjangan_kemahalan = stripslashesx($hasil2['tunjangan_kemahalan']);
            $tunjangan_perumahan = stripslashesx($hasil2['tunjangan_perumahan']);
            $tunjangan_transportasi = stripslashesx($hasil2['tunjangan_transportasi']);
            $bantuan_pulsa = stripslashesx($hasil2['bantuan_pulsa']);
            $tunjangan_kompetensi = stripslashesx($hasil2['tunjangan_kompetensi']);
            $dplk_persero = stripslashesx($hasil2['dplk_persero']);
            $dplk_simponi_pr = stripslashesx($hasil2['dplk_simponi_pr']);
            $bpjs_tk_pp = stripslashesx($hasil2['bpjs_tk_pp']);
            $bpjs_tk_kp = stripslashesx($hasil2['bpjs_tk_kp']);
            $bpjs_tk_kkp = stripslashesx($hasil2['bpjs_tk_kkp']);
            $bpjs_tk_htp = stripslashesx($hasil2['bpjs_tk_htp']);
            $bpjs_kes_pp = stripslashesx ($hasil2['bpjs_kes_pp']);
            $cop = stripslashesx ($hasil2['cop']);
            $fasilitas_hp = stripslashesx ($hasil2['fasilitas_hp']);
            $reimburse_kesehatan = stripslashesx ($hasil2['reimburse_kesehatan']);
            $asuransi_kesehatan = stripslashesx ($hasil2['asuransi_kesehatan']);
            $sarana_kerja = stripslashesx ($hasil2['sarana_kerja']);
            $sppd_manual = stripslashesx ($hasil2['sppd_manual']);
            $asuransi_purna_jabatan = stripslashesx ($hasil2['asuransi_purna_jabatan']);
            $medical_checkup = stripslashesx ($hasil2['medical_checkup']);
            $beban_pph21 = stripslashesx ($hasil2['beban_pph21']);
            $thr = stripslashesx ($hasil2['thr']);
            $cuti = stripslashesx ($hasil2['cuti']);
            $cuti_besar = stripslashesx ($hasil2['cuti_besar']);
            $winduan = stripslashesx ($hasil2['winduan']);
            $iks = stripslashesx ($hasil2['iks']);
            $ikp = stripslashesx ($hasil2['ikp']);
            $sppd_pusat = stripslashesx ($hasil2['sppd_pusat']);
            $sppd_region = stripslashesx ($hasil2['sppd_region']);
            $sppd_mutasi = stripslashesx ($hasil2['sppd_mutasi']);
        } else {
            $id = 0;
            $kode_departemen = "";
            $kode_project = "";
            $honorarium = "";
            $honorer = "";
            $tarif_grade = "";
            $tunjangan_posisi = "";
            $p21b = "";
            $p22b = "";
            $tunjangan_kemahalan = "";
            $tunjangan_perumahan = "";
            $tunjangan_transportasi = "";
            $bantuan_pulsa = "";
            $tunjangan_kompetensi = "";
            $dplk_persero = "";
            $dplk_simponi_pr = "";
            $bpjs_tk_pp = "";
            $bpjs_tk_kp = "";
            $bpjs_tk_kkp = "";
            $bpjs_tk_htp = "";
            $bpjs_kes_pp = "";
            $cop = "";
            $fasilitas_hp = "";
            $reimburse_kesehatan = "";
            $asuransi_kesehatan = "";
            $sarana_kerja = "";
            $sppd_manual = "";
            $asuransi_purna_jabatan = "";
            $medical_checkup = "";
            $beban_pph21 = "";
            $thr = "";
            $cuti = "";
            $cuti_besar = "";
            $winduan = "";
            $iks = "";
            $ikp = "";
            $sppd_pusat = "";
            $sppd_region = "";
            $sppd_mutasi = "";
        }
        
        $datanya = array();
        $datanya["idmappingpajak"] = $id;
        $datanya["nipmappingpajak"] = $nip;
        $datanya["namamappingpajak"] = $nama;
        $datanya["kode_departemenmappingpajak"] = $kode_departemen;
        $datanya["kode_projectmappingpajak"] = $kode_project;
        $datanya["honorariummappingpajak"] = $honorarium;
        $datanya["honorermappingpajak"] = $honorer;
        $datanya["tarif_grademappingpajak"] = $tarif_grade;
        $datanya["tunjangan_posisimappingpajak"] = $tunjangan_posisi;
        $datanya["p21bmappingpajak"] = $p21b;
        $datanya["p22bmappingpajak"] = $p22b;
        $datanya["tunjangan_kemahalanmappingpajak"] = $tunjangan_kemahalan;
        $datanya["tunjangan_perumahanmappingpajak"] = $tunjangan_perumahan;
        $datanya["tunjangan_transportasimappingpajak"] = $tunjangan_transportasi;
        $datanya["bantuan_pulsamappingpajak"] = $bantuan_pulsa;
        $datanya["tunjangan_kompetensimappingpajak"] = $tunjangan_kompetensi;
        $datanya["dplk_perseromappingpajak"] = $dplk_persero;
        $datanya["dplk_simponi_prmappingpajak"] = $dplk_simponi_pr;
        $datanya["bpjs_tk_ppmappingpajak"] = $bpjs_tk_pp;
        $datanya["bpjs_tk_kpmappingpajak"] = $bpjs_tk_kp;
        $datanya["bpjs_tk_kkpmappingpajak"] = $bpjs_tk_kkp;
        $datanya["bpjs_tk_htpmappingpajak"] = $bpjs_tk_htp;
        $datanya["bpjs_kes_ppmappingpajak"] = $bpjs_kes_pp;
        $datanya["copmappingpajak"] = $cop;
        $datanya["fasilitas_hpmappingpajak"] = $fasilitas_hp;
        $datanya["reimburse_kesehatanmappingpajak"] = $reimburse_kesehatan;
        $datanya["asuransi_kesehatanmappingpajak"] = $asuransi_kesehatan;
        $datanya["sarana_kerjamappingpajak"] = $sarana_kerja;
        $datanya["sppd_manualmappingpajak"] = $sppd_manual;
        $datanya["asuransi_purna_jabatanmappingpajak"] = $asuransi_purna_jabatan;
        $datanya["medical_checkupmappingpajak"] = $medical_checkup;
        $datanya["beban_pph21mappingpajak"] = $beban_pph21;
        $datanya["thrmappingpajak"] = $thr;
        $datanya["cutimappingpajak"] = $cuti;
        $datanya["cuti_besarmappingpajak"] = $cuti_besar;
        $datanya["winduanmappingpajak"] = $winduan;
        $datanya["iksmappingpajak"] = $iks;
        $datanya["ikpmappingpajak"] = $ikp;
        $datanya["sppd_pusatmappingpajak"] = $sppd_pusat;
        $datanya["sppd_regionmappingpajak"] = $sppd_region;
        $datanya["sppd_mutasimappingpajak"] = $sppd_mutasi;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>