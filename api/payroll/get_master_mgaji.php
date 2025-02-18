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
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";    
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $nama2 = isset($_POST['namamgajicari']) ? $_POST['namamgajicari'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $perintah = "";
    if($nama2!=""){
        // $perintah .= " and (a.nip='$nama2' or a.nama like '%$nama2%')";
        $perintah .= " and (nip='$nama2' or nama like '%$nama2%')";
        //$perintah .= " where nip like '%$nama2%'";
    }
    
    // $rs = mysqli_query($koneksi,"select count(*) from data_pegawai a left join master_gaji b on a.nip=b.nip where a.aktif='1'".$perintah);
    $rs = mysqli_query($koneksi,"select count(*) from data_pegawai where nip<>'' and aktif='1'".$perintah);
    // $rs = mysqli_query($koneksi,"select count(a.nip) from hrisnew.data_pegawai a inner join organikplnt.data_pegawai b on a.nip=b.nip where b.aktif='1'".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $items = array();
    // $rs2 = mysqli_query($koneksi,"select a.nip,a.nama,b.* from data_pegawai a left join master_gaji b on a.nip=b.nip where a.aktif='1'".$perintah." order by a.nip asc limit $offset,$rows");
    $rs = mysqli_query($koneksi,"select * from data_pegawai where nip<>'' and aktif='1'".$perintah." order by id desc limit $offset,$rows");
    // $rs = mysqli_query($koneksi,"select a.nip,a.nama_lengkap from hrisnew.data_pegawai a inner join organikplnt.data_pegawai b on a.nip=b.nip where b.aktif='1'".$perintah." order by nip asc limit $offset,$rows");
    while ($hasil = mysqli_fetch_array($rs)) {    	
        $nip = stripslashesx ($hasil['nip']);
        $nama = stripslashesx ($hasil['nama']);

        $rs2 = mysqli_query($koneksi,"select * from master_gaji where nip='$nip'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $id = stripslashesx ($hasil2['id']);
            $gaji_dasar = stripslashesx($hasil2['gaji_dasar']);
            $honorarium = stripslashesx($hasil2['honorarium']);
            $honorer = stripslashesx($hasil2['honorer']);
            $tarif_grade = stripslashesx($hasil2['tarif_grade']);
            $tunjangan_posisi = stripslashesx($hasil2['tunjangan_posisi']);
            $p21b = stripslashesx($hasil2['p21b']);
            $tunjangan_kemahalan = stripslashesx($hasil2['tunjangan_kemahalan']);
            $tunjangan_perumahan = stripslashesx($hasil2['tunjangan_perumahan']);
            $tunjangan_transportasi = stripslashesx($hasil2['tunjangan_transportasi']);
            $bantuan_pulsa = stripslashesx($hasil2['bantuan_pulsa']);
            $tunjangan_kompetensi = stripslashesx($hasil2['tunjangan_kompetensi']);
            $dplk_persero = stripslashesx($hasil2['dplk_persero']);
            $dplk_simponi_pr = stripslashesx($hasil2['dplk_simponi_pr']);
            $nama_tunjangan1 = stripslashesx($hasil2['nama_tunjangan1']);
            $tunjangan1 = stripslashesx($hasil2['tunjangan1']);
            $nama_tunjangan2 = stripslashesx($hasil2['nama_tunjangan2']);
            $tunjangan2 = stripslashesx($hasil2['tunjangan2']);
            $nama_tunjangan3 = stripslashesx($hasil2['nama_tunjangan3']);
            $tunjangan3 = stripslashesx($hasil2['tunjangan3']);
            $nama_tunjangan4 = stripslashesx($hasil2['nama_tunjangan4']);
            $tunjangan4 = stripslashesx($hasil2['tunjangan4']);
            $bpjs_tk_pp = stripslashesx($hasil2['bpjs_tk_pp']);
            $bpjs_tk_kp = stripslashesx($hasil2['bpjs_tk_kp']);
            $bpjs_tk_kkp = stripslashesx($hasil2['bpjs_tk_kkp']);
            $bpjs_tk_htp = stripslashesx($hasil2['bpjs_tk_htp']);
            $bpjs_tk_jhtk = stripslashesx($hasil2['bpjs_tk_jhtk']);
            $bpjs_tk_pk = stripslashesx($hasil2['bpjs_tk_pk']);
            $bpjs_kes_pp = stripslashesx($hasil2['bpjs_kes_pp']);
            $bpjs_kes_pk = stripslashesx($hasil2['bpjs_kes_pk']);
            $rp_bpjs_tk_pp = stripslashesx($hasil2['rp_bpjs_tk_pp']);
            $rp_bpjs_tk_kp = stripslashesx($hasil2['rp_bpjs_tk_kp']);
            $rp_bpjs_tk_kkp = stripslashesx($hasil2['rp_bpjs_tk_kkp']);
            $rp_bpjs_tk_htp = stripslashesx($hasil2['rp_bpjs_tk_htp']);
            $rp_bpjs_tk_jhtk = stripslashesx($hasil2['rp_bpjs_tk_jhtk']);
            $rp_bpjs_tk_pk = stripslashesx($hasil2['rp_bpjs_tk_pk']);
            $pot_koperasi = stripslashesx($hasil2['pot_koperasi']);
            $pot_bazis = stripslashesx($hasil2['pot_bazis']);
            $dplk_simponi = stripslashesx($hasil2['dplk_simponi']);
            $pot_dplk_pribadi = stripslashesx($hasil2['pot_dplk_pribadi']);
            $cop_kendaraan = stripslashesx($hasil2['cop_kendaraan']);
            $iuran_peserta = stripslashesx($hasil2['iuran_peserta']);
            $brpr = stripslashesx($hasil2['brpr']);
            $sewa_mess = stripslashesx($hasil2['sewa_mess']);
            $qurban = stripslashesx($hasil2['qurban']);
            $arisan = stripslashesx($hasil2['arisan']);
            $nama_potongan1 = stripslashesx($hasil2['nama_potongan1']);
            $potongan1 = stripslashesx($hasil2['potongan1']);
            $nama_potongan2 = stripslashesx($hasil2['nama_potongan2']);
            $potongan2 = stripslashesx($hasil2['potongan2']);
            $nama_potongan3 = stripslashesx($hasil2['nama_potongan3']);
            $potongan3 = stripslashesx($hasil2['potongan3']);
            $nama_potongan4 = stripslashesx($hasil2['nama_potongan4']);
            $potongan4 = stripslashesx($hasil2['potongan4']);
        } else {
            $id = 0;
            $gaji_dasar = 0;
            $honorarium = 0;
            $honorer = 0;
            $tarif_grade = 0;
            $tunjangan_posisi = 0;
            $p21b = 0;
            $tunjangan_kemahalan = 0;
            $tunjangan_perumahan = 0;
            $tunjangan_transportasi = 0;
            $bantuan_pulsa = 0;
            $tunjangan_kompetensi = 0;
            $dplk_persero = 0;
            $dplk_simponi_pr = 0;
            $nama_tunjangan1 = 0;
            $tunjangan1 = 0;
            $nama_tunjangan2 = 0;
            $tunjangan2 = 0;
            $nama_tunjangan3 = 0;
            $tunjangan3 = 0;
            $nama_tunjangan4 = 0;
            $tunjangan4 = 0;
            $bpjs_tk_pp = 0;
            $bpjs_tk_kp = 0;
            $bpjs_tk_kkp = 0;
            $bpjs_tk_htp = 0;
            $bpjs_tk_jhtk = 0;
            $bpjs_tk_pk = 0;
            $bpjs_kes_pp = 0;
            $bpjs_kes_pk = 0;
            $rp_bpjs_tk_pp = 0;
            $rp_bpjs_tk_kp = 0;
            $rp_bpjs_tk_kkp = 0;
            $rp_bpjs_tk_htp = 0;
            $rp_bpjs_tk_jhtk = 0;
            $rp_bpjs_tk_pk = 0;
            $pot_koperasi = 0;
            $pot_bazis = 0;
            $dplk_simponi = 0;
            $pot_dplk_pribadi = 0;
            $cop_kendaraan = 0;
            $iuran_peserta = 0;
            $brpr = 0;
            $sewa_mess = 0;
            $qurban = 0;
            $arisan = 0;
            $nama_potongan1 = 0;
            $potongan1 = 0;
            $nama_potongan2 = 0;
            $potongan2 = 0;
            $nama_potongan3 = 0;
            $potongan3 = 0;
            $nama_potongan4 = 0;
            $potongan4 = 0;
        }
        
        $datanya = array();
        $datanya["idmgaji"] = $id;
        $datanya["nipmgaji"] = $nip;
        $datanya["namamgaji"] = $nama;
        $datanya["gaji_dasarmgaji"] = $gaji_dasar;
        $datanya["honorariummgaji"] = $honorarium;
        $datanya["honorermgaji"] = $honorer;
        $datanya["tarif_grademgaji"] = $tarif_grade;
        $datanya["tunjangan_posisimgaji"] = $tunjangan_posisi;
        $datanya["p21bmgaji"] = $p21b;
        $datanya["tunjangan_kemahalanmgaji"] = $tunjangan_kemahalan;
        $datanya["tunjangan_perumahanmgaji"] = $tunjangan_perumahan;
        $datanya["tunjangan_transportasimgaji"] = $tunjangan_transportasi;
        $datanya["bantuan_pulsamgaji"] = $bantuan_pulsa;
        $datanya["tunjangan_kompetensimgaji"] = $tunjangan_kompetensi;
        $datanya["dplk_perseromgaji"] = floatval($dplk_persero);
        $datanya["dplk_simponi_prmgaji"] = $dplk_simponi_pr;
        $datanya["nama_tunjangan1mgaji"] = $nama_tunjangan1;
        $datanya["tunjangan1mgaji"] = $tunjangan1;
        $datanya["nama_tunjangan2mgaji"] = $nama_tunjangan2;
        $datanya["tunjangan2mgaji"] = $tunjangan2;
        $datanya["nama_tunjangan3mgaji"] = $nama_tunjangan3;
        $datanya["tunjangan3mgaji"] = $tunjangan3;
        $datanya["nama_tunjangan4mgaji"] = $nama_tunjangan4;
        $datanya["tunjangan4mgaji"] = $tunjangan4;
        $datanya["bpjs_tk_ppmgaji"] = $bpjs_tk_pp;
        $datanya["bpjs_tk_kpmgaji"] = $bpjs_tk_kp;
        $datanya["bpjs_tk_kkpmgaji"] = $bpjs_tk_kkp;
        $datanya["bpjs_tk_htpmgaji"] = $bpjs_tk_htp;
        $datanya["bpjs_tk_jhtkmgaji"] = $bpjs_tk_jhtk;
        $datanya["bpjs_tk_pkmgaji"] = $bpjs_tk_pk;
        $datanya["bpjs_kes_ppmgaji"] = $bpjs_kes_pp;
        $datanya["bpjs_kes_pkmgaji"] = $bpjs_kes_pk;
        $datanya["rp_bpjs_tk_ppmgaji"] = $rp_bpjs_tk_pp;
        $datanya["rp_bpjs_tk_kpmgaji"] = $rp_bpjs_tk_kp;
        $datanya["rp_bpjs_tk_kkpmgaji"] = $rp_bpjs_tk_kkp;
        $datanya["rp_bpjs_tk_htpmgaji"] = $rp_bpjs_tk_htp;
        $datanya["rp_bpjs_tk_jhtkmgaji"] = $rp_bpjs_tk_jhtk;
        $datanya["rp_bpjs_tk_pkmgaji"] = $rp_bpjs_tk_pk;
        $datanya["pot_koperasimgaji"] = $pot_koperasi;
        $datanya["pot_bazismgaji"] = $pot_bazis;
        $datanya["dplk_simponimgaji"] = $dplk_simponi;
        $datanya["pot_dplk_pribadimgaji"] = $pot_dplk_pribadi;
        $datanya["cop_kendaraanmgaji"] = $cop_kendaraan;
        $datanya["iuran_pesertamgaji"] = $iuran_peserta;
        $datanya["brprmgaji"] = $brpr;
        $datanya["sewa_messmgaji"] = $sewa_mess;
        $datanya["qurbanmgaji"] = $qurban;
        $datanya["arisanmgaji"] = $arisan;
        $datanya["nama_potongan1mgaji"] = $nama_potongan1;
        $datanya["potongan1mgaji"] = $potongan1;
        $datanya["nama_potongan2mgaji"] = $nama_potongan2;
        $datanya["potongan2mgaji"] = $potongan2;
        $datanya["nama_potongan3mgaji"] = $nama_potongan3;
        $datanya["potongan3mgaji"] = $potongan3;
        $datanya["nama_potongan4mgaji"] = $nama_potongan4;
        $datanya["potongan4mgaji"] = $potongan4;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>