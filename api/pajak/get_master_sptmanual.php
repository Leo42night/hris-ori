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
    
    $blth2 = isset($_POST['blthsptmanualcari']) ? $_POST['blthsptmanualcari'] : date("Y-m");
    $kpp2 = isset($_POST['kppsptmanualcari']) ? $_POST['kppsptmanualcari'] : "SEMUA";
    $nip2 = isset($_POST['nipsptmanualcari']) ? $_POST['nipsptmanualcari'] : "";

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
    $rs = mysqli_query($koneksi,"select count(*) from pphmanual a inner join data_pegawai b on a.nip=b.nip where a.blth='$blth2'".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select a.*,b.nama,b.jabatan,b.npwp from pphmanual a inner join data_pegawai b on a.nip=b.nip where a.blth='$blth2'".$perintah." order by a.no_urut asc limit $offset,$rows");
    // echo "select a.*,b.nama,b.jabatan,b.npwp from pphmanual a inner join data_pegawai b on a.nip=b.nip where a.blth='$blth2'".$perintah." order by a.no_urut asc limit $offset,$rows";
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
        // $beban_pph21 = stripslashesx ($hasil['beban_pph21']);
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
        $datanya["idsptmanual"] = $id;
        $datanya["nipsptmanual"] = $nip;
        $datanya["no_urutsptmanual"] = $no_urut;
        $datanya["namasptmanual"] = $nama;
        $datanya["jabatansptmanual"] = $jabatan;
        $datanya["statussptmanual"] = $status;
        $datanya["npwpsptmanual"] = $npwp;
        $datanya["tahunsptmanual"] = $tahun;
        $datanya["blthsptmanual"] = $blth;
        $datanya["blthnipsptmanual"] = $blthnip;
        $datanya["blth_awalsptmanual"] = $blth_awal;
        $datanya["blth_akhirsptmanual"] = $blth_akhir;
        $datanya["masa_kerjasptmanual"] = $masa_kerja;
        $datanya["gajisptmanual"] = $gaji;
        $datanya["tunjangan_pphsptmanual"] = $tunjangan_pph;
        $datanya["tunjangan_variablesptmanual"] = $tunjangan_variable;
        $datanya["honorariumsptmanual"] = $honorarium;
        $datanya["benefitsptmanual"] = $benefit;
        $datanya["natunasptmanual"] = $natuna;
        // $datanya["beban_pph21sptmanual"] = $beban_pph21;
        $datanya["bonus_thrsptmanual"] = $bonus_thr;
        $datanya["brutobsptmanual"] = $brutob;
        $datanya["biaya_jabatanbsptmanual"] = $biaya_jabatanb;
        $datanya["iuran_pensiunbsptmanual"] = $iuran_pensiunb;
        $datanya["brutotsptmanual"] = $brutot;
        $datanya["biaya_jabatantsptmanual"] = $biaya_jabatant;
        $datanya["iuran_pensiuntsptmanual"] = $iuran_pensiunt;
        $datanya["biaya_pengurangtsptmanual"] = $biaya_pengurangt;
        $datanya["nettotsptmanual"] = $nettot;
        // $datanya["brutot_totalsptmanual"] = $brutot_total;
        // $datanya["biaya_jabatant_totalsptmanual"] = $biaya_jabatant_total;
        // $datanya["iuran_pensiunt_totalsptmanual"] = $iuran_pensiunt_total;
        // $datanya["biaya_pengurangt_totalsptmanual"] = $biaya_pengurangt_total;
        // $datanya["nettot_totalsptmanual"] = $nettot_total;
        $datanya["nettot_sebelumnyasptmanual"] = $nettot_sebelumnya;
        $datanya["nettot_akhirsptmanual"] = $nettot_akhir;
        $datanya["ptkpsptmanual"] = $ptkp;
        $datanya["pkpsptmanual"] = $pkp;
        $datanya["pphtsptmanual"] = $ppht;
        $datanya["ppht_sebelumnyasptmanual"] = $ppht_sebelumnya;
        $datanya["ppht_terutangsptmanual"] = $ppht_terutang;
        //$datanya["ppht_total_terutangsptmanual"] = $ppht_total_terutang;
        // $datanya["pphb1_terutangsptmanual"] = $pphb1_terutang;
        // $datanya["pphb2_terutangsptmanual"] = $pphb2_terutang;
        $datanya["pphb_terutangsptmanual"] = $pphb_terutang;
        $datanya["tgl_prosessptmanual"] = $tgl_proses;
        $datanya["tgl_proses2sptmanual"] = $tgl_proses2;
        $datanya["petugassptmanual"] = $petugas;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>