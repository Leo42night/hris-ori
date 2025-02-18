<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    function TanggalIndo2($date){
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);
        $result = $tgl . "-" . $bulan . "-". $tahun;	
        return($result);
    }
    include "koneksi.php";
    include "../fungsi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
    $tahun_ini = date("Y");
    
    $blth2 = isset($_POST['blthsptmasacari']) ? $_POST['blthsptmasacari'] : date("Y-m");
    $kpp2 = isset($_POST['kppsptmasacari']) ? $_POST['kppsptmasacari'] : "SEMUA";
    $nip2 = isset($_POST['nipsptmasacari']) ? $_POST['nipsptmasacari'] : "";

    $offset = ($page-1)*$rows;
    $result = array();
    $perintah = "";    
    if($kpp2!="SEMUA"){
        $perintah .= " and a.kpp='$kpp2'";
    }
    if($nip2!=""){
        $perintah .= " and (a.nip='$nip2' or b.nama like '%$nip2%')";
    }
    
    $offset = ($page-1)*$rows;
    $result = array();
    $rs = mysqli_query($koneksi,"select count(*) from pph21masa a inner join data_pegawai b on a.nip=b.nip where a.blth='$blth2'".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select a.*,b.nama,b.jabatan from pph21masa a inner join data_pegawai b on a.nip=b.nip where a.blth='$blth2'".$perintah." order by a.no_urut asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashesx ($hasil['id']);
    	$no_urut = stripslashesx ($hasil['no_urut']);
    	$nip = stripslashesx ($hasil['nip']);
        $nama = stripslashesx ($hasil['nama']);
        $jabatan = stripslashesx ($hasil['jabatan']);
            /*
            $rs2 = mysqli_query($koneksi,"select nama_lengkap from data_pegawai where nip='$nip'");
            $hasil2 = mysqli_fetch_array($rs2);
            $nama = stripslashesx ($hasil2['nama_lengkap']);
            */
            // $rs2 = mysqli_query($koneksi,"select jabatan from setting_pegawai where nip='$nip'");
            // $hasil2 = mysqli_fetch_array($rs2);
            // $jabatan = stripslashesx ($hasil2['jabatan']);
            
    	$status = stripslashesx ($hasil['status']);
    	$npwp = stripslashesx ($hasil['npwp']);
    	$tahun = stripslashesx ($hasil['tahun']);
    	$blth = stripslashesx ($hasil['blth']);
    	$blthnip = stripslashesx ($hasil['blthnip']);
    	$blth_awal = stripslashesx ($hasil['blth_awal']);
    	$blth_akhir = stripslashesx ($hasil['blth_akhir']);
    	$masa_kerja = stripslashesx ($hasil['masa_kerja']);
    	$gaji = stripslashesx ($hasil['gaji']);
    	$tunjangan_pph = stripslashesx ($hasil['tunjangan_pph']);
    	$tunjangan_variable = stripslashesx ($hasil['tunjangan_variable']);
    	$honorarium = stripslashesx ($hasil['honorarium']);
    	$benefit = stripslashesx ($hasil['benefit']);
    	$natuna = stripslashesx ($hasil['natuna']);
        $beban_pph21 = stripslashesx ($hasil['beban_pph21']);
    	$bonus_thr = stripslashesx ($hasil['bonus_thr']);
    	$brutob = stripslashesx ($hasil['brutob']);
    	$biaya_jabatanb = stripslashesx ($hasil['biaya_jabatanb']);
    	$iuran_pensiunb = stripslashesx ($hasil['iuran_pensiunb']);
    	$brutot = stripslashesx ($hasil['brutot']);
    	$biaya_jabatant = stripslashesx ($hasil['biaya_jabatant']);
    	$iuran_pensiunt = stripslashesx ($hasil['iuran_pensiunt']);
    	$biaya_pengurangt = stripslashesx ($hasil['biaya_pengurangt']);
    	$nettot = stripslashesx ($hasil['nettot']);
    	$brutot_total= stripslashesx ($hasil['brutot_total']);
    	$biaya_jabatant_total = floatval ($hasil['biaya_jabatant_total']);
    	$iuran_pensiunt_total = floatval ($hasil['iuran_pensiunt_total']);
    	$biaya_pengurangt_total = floatval ($hasil['biaya_pengurangt_total']);
    	$nettot_total = stripslashesx ($hasil['nettot_total']);
    	$nettot_sebelumnya = stripslashesx ($hasil['nettot_sebelumnya']);
    	$nettot_akhir = stripslashesx ($hasil['nettot_akhir']);
    	$ptkp = stripslashesx ($hasil['ptkp']);
    	$pkp = stripslashesx ($hasil['pkp']);
    	$ppht = stripslashesx ($hasil['ppht']);
    	$ppht_sebelumnya = stripslashesx ($hasil['ppht_sebelumnya']);
    	$ppht_terutang = stripslashesx ($hasil['ppht_terutang']);
    	//$ppht_total_terutang = stripslashesx ($hasil['ppht_total_terutang']);
    	$pphb1_terutang = stripslashesx ($hasil['pphb1_terutang']);
    	$pphb2_terutang = stripslashesx ($hasil['pphb2_terutang']);
    	$pphb_terutang = stripslashesx ($hasil['pphb_terutang']);
    	$tgl_proses = stripslashesx ($hasil['tgl_proses']);
        $tgl_proses2 = TanggalIndo2($tgl_proses);
    	$petugas = stripslashesx ($hasil['petugas']);

        $datanya = array();
        $datanya["idsptmasa"] = $id;
        $datanya["nipsptmasa"] = $nip;
        $datanya["no_urutsptmasa"] = $no_urut;
        $datanya["namasptmasa"] = $nama;
        $datanya["jabatansptmasa"] = $jabatan;
        $datanya["statussptmasa"] = $status;
        $datanya["npwpsptmasa"] = $npwp;
        $datanya["tahunsptmasa"] = $tahun;
        $datanya["blthsptmasa"] = $blth;
        $datanya["blthnipsptmasa"] = $blthnip;
        $datanya["blth_awalsptmasa"] = $blth_awal;
        $datanya["blth_akhirsptmasa"] = $blth_akhir;
        $datanya["masa_kerjasptmasa"] = $masa_kerja;
        $datanya["gajisptmasa"] = $gaji;
        $datanya["tunjangan_pphsptmasa"] = $tunjangan_pph;
        $datanya["tunjangan_variablesptmasa"] = $tunjangan_variable;
        $datanya["honorariumsptmasa"] = $honorarium;
        $datanya["benefitsptmasa"] = $benefit;
        $datanya["natunasptmasa"] = $natuna;
        $datanya["beban_pph21sptmasa"] = $beban_pph21;
        $datanya["bonus_thrsptmasa"] = $bonus_thr;
        $datanya["brutobsptmasa"] = $brutob;
        $datanya["biaya_jabatanbsptmasa"] = $biaya_jabatanb;
        $datanya["iuran_pensiunbsptmasa"] = $iuran_pensiunb;
        $datanya["brutotsptmasa"] = $brutot;
        $datanya["biaya_jabatantsptmasa"] = $biaya_jabatant;
        $datanya["iuran_pensiuntsptmasa"] = $iuran_pensiunt;
        $datanya["biaya_pengurangtsptmasa"] = $biaya_pengurangt;
        $datanya["nettotsptmasa"] = $nettot;
        $datanya["brutot_totalsptmasa"] = $brutot_total;
        $datanya["biaya_jabatant_totalsptmasa"] = $biaya_jabatant_total;
        $datanya["iuran_pensiunt_totalsptmasa"] = $iuran_pensiunt_total;
        $datanya["biaya_pengurangt_totalsptmasa"] = $biaya_pengurangt_total;
        $datanya["nettot_totalsptmasa"] = $nettot_total;
        $datanya["nettot_sebelumnyasptmasa"] = $nettot_sebelumnya;
        $datanya["nettot_akhirsptmasa"] = $nettot_akhir;
        $datanya["ptkpsptmasa"] = $ptkp;
        $datanya["pkpsptmasa"] = $pkp;
        $datanya["pphtsptmasa"] = $ppht;
        $datanya["ppht_sebelumnyasptmasa"] = $ppht_sebelumnya;
        $datanya["ppht_terutangsptmasa"] = $ppht_terutang;
        //$datanya["ppht_total_terutangsptmasa"] = $ppht_total_terutang;
        $datanya["pphb1_terutangsptmasa"] = $pphb1_terutang;
        $datanya["pphb2_terutangsptmasa"] = $pphb2_terutang;
        $datanya["pphb_terutangsptmasa"] = $pphb_terutang;
        $datanya["tgl_prosessptmasa"] = $tgl_proses;
        $datanya["tgl_proses2sptmasa"] = $tgl_proses2;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>