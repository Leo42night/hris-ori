<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";
if ($userhris){
    function TanggalIndo2($date){
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);
        $result = $tgl . "-" . $bulan . "-". $tahun;	
        return($result);
    }
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
    $tahun_ini = date("Y");
    
    $blth2 = isset($_POST['blthsptcari']) ? $_POST['blthsptcari'] : date("Y-m");
    $kpp2 = isset($_POST['kppsptcari']) ? $_POST['kppsptcari'] : "SEMUA";
    $nip2 = isset($_POST['nipsptcari']) ? $_POST['nipsptcari'] : "";

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
    $rs = mysqli_query($koneksi,"select count(*) from pph a inner join data_pegawai b on a.nip=b.nip where a.blth='$blth2'".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select a.*,b.nama,b.jabatan,b.npwp from pph a inner join data_pegawai b on a.nip=b.nip where a.blth='$blth2'".$perintah." order by a.no_urut asc limit $offset,$rows");
    // echo "select a.*,b.nama,b.jabatan,b.npwp from pph a inner join data_pegawai b on a.nip=b.nip where a.blth='$blth2'".$perintah." order by a.no_urut asc limit $offset,$rows";
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
    	// $brutot_total= stripslashesx ($hasil['brutot_total']);
    	// $biaya_jabatant_total = floatval ($hasil['biaya_jabatant_total']);
    	// $iuran_pensiunt_total = floatval ($hasil['iuran_pensiunt_total']);
    	// $biaya_pengurangt_total = floatval ($hasil['biaya_pengurangt_total']);
    	// $nettot_total = stripslashesx ($hasil['nettot_total']);
    	$nettot_sebelumnya = stripslashesx ($hasil['nettot_sebelumnya']);
    	$nettot_akhir = stripslashesx ($hasil['nettot_akhir']);
    	$ptkp = stripslashesx ($hasil['ptkp']);
    	$pkp = stripslashesx ($hasil['pkp']);
    	$ppht = stripslashesx ($hasil['ppht']);
    	$ppht_sebelumnya = stripslashesx ($hasil['ppht_sebelumnya']);
    	$ppht_terutang = stripslashesx ($hasil['ppht_terutang']);
    	//$ppht_total_terutang = stripslashesx ($hasil['ppht_total_terutang']);
    	// $pphb1_terutang = stripslashesx ($hasil['pphb1_terutang']);
    	// $pphb2_terutang = stripslashesx ($hasil['pphb2_terutang']);
    	$pphb_terutang = stripslashesx ($hasil['pphb_terutang']);
    	$tgl_proses = stripslashesx ($hasil['tgl_proses']);
        $tgl_proses2 = TanggalIndo2($tgl_proses);
    	$petugas = stripslashesx ($hasil['petugas']);

        $datanya = array();
        $datanya["idspt"] = $id;
        $datanya["nipspt"] = $nip;
        $datanya["no_urutspt"] = $no_urut;
        $datanya["namaspt"] = $nama;
        $datanya["jabatanspt"] = $jabatan;
        $datanya["statusspt"] = $status;
        $datanya["npwpspt"] = $npwp;
        $datanya["tahunspt"] = $tahun;
        $datanya["blthspt"] = $blth;
        $datanya["blthnipspt"] = $blthnip;
        $datanya["blth_awalspt"] = $blth_awal;
        $datanya["blth_akhirspt"] = $blth_akhir;
        $datanya["masa_kerjaspt"] = $masa_kerja;
        $datanya["gajispt"] = $gaji;
        $datanya["tunjangan_pphspt"] = $tunjangan_pph;
        $datanya["tunjangan_variablespt"] = $tunjangan_variable;
        $datanya["honorariumspt"] = $honorarium;
        $datanya["benefitspt"] = $benefit;
        $datanya["natunaspt"] = $natuna;
        $datanya["beban_pph21spt"] = $beban_pph21;
        $datanya["bonus_thrspt"] = $bonus_thr;
        $datanya["brutobspt"] = $brutob;
        $datanya["biaya_jabatanbspt"] = $biaya_jabatanb;
        $datanya["iuran_pensiunbspt"] = $iuran_pensiunb;
        $datanya["brutotspt"] = $brutot;
        $datanya["biaya_jabatantspt"] = $biaya_jabatant;
        $datanya["iuran_pensiuntspt"] = $iuran_pensiunt;
        $datanya["biaya_pengurangtspt"] = $biaya_pengurangt;
        $datanya["nettotspt"] = $nettot;
        // $datanya["brutot_totalspt"] = $brutot_total;
        // $datanya["biaya_jabatant_totalspt"] = $biaya_jabatant_total;
        // $datanya["iuran_pensiunt_totalspt"] = $iuran_pensiunt_total;
        // $datanya["biaya_pengurangt_totalspt"] = $biaya_pengurangt_total;
        // $datanya["nettot_totalspt"] = $nettot_total;
        $datanya["nettot_sebelumnyaspt"] = $nettot_sebelumnya;
        $datanya["nettot_akhirspt"] = $nettot_akhir;
        $datanya["ptkpspt"] = $ptkp;
        $datanya["pkpspt"] = $pkp;
        $datanya["pphtspt"] = $ppht;
        $datanya["ppht_sebelumnyaspt"] = $ppht_sebelumnya;
        $datanya["ppht_terutangspt"] = $ppht_terutang;
        //$datanya["ppht_total_terutangspt"] = $ppht_total_terutang;
        // $datanya["pphb1_terutangspt"] = $pphb1_terutang;
        // $datanya["pphb2_terutangspt"] = $pphb2_terutang;
        $datanya["pphb_terutangspt"] = $pphb_terutang;
        $datanya["tgl_prosesspt"] = $tgl_proses;
        $datanya["tgl_proses2spt"] = $tgl_proses2;
        $datanya["petugasspt"] = $petugas;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>