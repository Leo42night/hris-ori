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

    $nama2 = isset($_POST['namamgajicari']) ? $_POST['namamgajicari'] : "";
    
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
    	$nip = stripslashes ($hasil['nip']);
    	$start_date = stripslashes ($hasil['start_date']);
    	$end_date = stripslashes ($hasil['end_date']);
        $nama_lengkap = stripslashes ($hasil['nama_lengkap']);

        $rs2 = mysqli_query($koneksi2,"select * from master_gaji where nip='$nip'");
        $hasil2 = mysqli_fetch_array($rs2);
        $id = stripslashes ($hasil2['id']);
        $gaji_dasar = stripslashes($hasil2['gaji_dasar']);
        $honorarium = stripslashes($hasil2['honorarium']);
        $honorer = stripslashes($hasil2['honorer']);
        $tarif_grade = stripslashes($hasil2['tarif_grade']);
        $tunjangan_posisi = stripslashes($hasil2['tunjangan_posisi']);
        $tunjangan_kemahalan = stripslashes($hasil2['tunjangan_kemahalan']);
        $tunjangan_perumahan = stripslashes($hasil2['tunjangan_perumahan']);
        $tunjangan_transportasi = stripslashes($hasil2['tunjangan_transportasi']);
        $bantuan_pulsa = stripslashes($hasil2['bantuan_pulsa']);
        $dplk_persero = stripslashes($hasil2['dplk_persero']);
        $dplk_simponi_pr = stripslashes($hasil2['dplk_simponi_pr']);
        $nama_tunjangan1 = stripslashes($hasil2['nama_tunjangan1']);
        $tunjangan1 = stripslashes($hasil2['tunjangan1']);
        $nama_tunjangan2 = stripslashes($hasil2['nama_tunjangan2']);
        $tunjangan2 = stripslashes($hasil2['tunjangan2']);
        $nama_tunjangan3 = stripslashes($hasil2['nama_tunjangan3']);
        $tunjangan3 = stripslashes($hasil2['tunjangan3']);
        $nama_tunjangan4 = stripslashes($hasil2['nama_tunjangan4']);
        $tunjangan4 = stripslashes($hasil2['tunjangan4']);
        $bpjs_tk_pp = stripslashes($hasil2['bpjs_tk_pp']);
        $bpjs_tk_kp = stripslashes($hasil2['bpjs_tk_kp']);
        $bpjs_tk_kkp = stripslashes($hasil2['bpjs_tk_kkp']);
        $bpjs_tk_htp = stripslashes($hasil2['bpjs_tk_htp']);
        $bpjs_tk_jhtk = stripslashes($hasil2['bpjs_tk_jhtk']);
        $bpjs_tk_pk = stripslashes($hasil2['bpjs_tk_pk']);
        $bpjs_kes_pp = stripslashes($hasil2['bpjs_kes_pp']);
        $bpjs_kes_pk = stripslashes($hasil2['bpjs_kes_pk']);
        $rp_bpjs_tk_pp = stripslashes($hasil2['rp_bpjs_tk_pp']);
        $rp_bpjs_tk_kp = stripslashes($hasil2['rp_bpjs_tk_kp']);
        $rp_bpjs_tk_kkp = stripslashes($hasil2['rp_bpjs_tk_kkp']);
        $rp_bpjs_tk_htp = stripslashes($hasil2['rp_bpjs_tk_htp']);
        $rp_bpjs_tk_jhtk = stripslashes($hasil2['rp_bpjs_tk_jhtk']);
        $rp_bpjs_tk_pk = stripslashes($hasil2['rp_bpjs_tk_pk']);
        $pot_koperasi = stripslashes($hasil2['pot_koperasi']);
        $pot_bazis = stripslashes($hasil2['pot_bazis']);
        $dplk_simponi = stripslashes($hasil2['dplk_simponi']);
        $pot_dplk_pribadi = stripslashes($hasil2['pot_dplk_pribadi']);
        $cop_kendaraan = stripslashes($hasil2['cop_kendaraan']);
        $iuran_peserta = stripslashes($hasil2['iuran_peserta']);
        $brpr = stripslashes($hasil2['brpr']);
        $sewa_mess = stripslashes($hasil2['sewa_mess']);
        $qurban = stripslashes($hasil2['qurban']);
        $arisan = stripslashes($hasil2['arisan']);
        $nama_potongan1 = stripslashes($hasil2['nama_potongan1']);
        $potongan1 = stripslashes($hasil2['potongan1']);
        $nama_potongan2 = stripslashes($hasil2['nama_potongan2']);
        $potongan2 = stripslashes($hasil2['potongan2']);
        $nama_potongan3 = stripslashes($hasil2['nama_potongan3']);
        $potongan3 = stripslashes($hasil2['potongan3']);
        $nama_potongan4 = stripslashes($hasil2['nama_potongan4']);
        $potongan4 = stripslashes($hasil2['potongan4']);
        
        $datanya = array();
        $datanya["idmgaji"] = $id;
        $datanya["nipmgaji"] = $nip;
        $datanya["start_datemgaji"] = $start_date;
        $datanya["end_datemgaji"] = $end_date;
        $datanya["nama_lengkapmgaji"] = $nama_lengkap;
        $datanya["gaji_dasarmgaji"] = $gaji_dasar;
        $datanya["honorariummgaji"] = $honorarium;
        $datanya["honorermgaji"] = $honorer;
        $datanya["tarif_grademgaji"] = $tarif_grade;
        $datanya["tunjangan_posisimgaji"] = $tunjangan_posisi;
        $datanya["tunjangan_kemahalanmgaji"] = $tunjangan_kemahalan;
        $datanya["tunjangan_perumahanmgaji"] = $tunjangan_perumahan;
        $datanya["tunjangan_transportasimgaji"] = $tunjangan_transportasi;
        $datanya["bantuan_pulsamgaji"] = $bantuan_pulsa;
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