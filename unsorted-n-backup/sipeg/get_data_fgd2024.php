<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    function TanggalIndo2($date){
        if(!is_null($date) && strtotime($date)){
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $result = $tgl . "-" . $bulan . "-". $tahun;	
            return($result);
        } else {
            return("");
        }
    }
    function selisihBulan($tgl1, $tgl2){
         $tgl1 = (is_string($tgl1) ? strtotime($tgl1) : $tgl1);
         $tgl2 = (is_string($tgl2) ? strtotime($tgl2) : $tgl2);
         $diff_secs = abs($tgl1 - $tgl2);
         $base_year = min(date("Y", $tgl1), date("Y", $tgl2));
         $diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
         return array( "years" => date("Y", $diff) - $base_year,
        "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1,
        "months" => date("n", $diff) - 1,
        "days_total" => floor($diff_secs / (3600 * 24)),
        "days" => date("j", $diff) - 1,
        "hours_total" => floor($diff_secs / 3600),
        "hours" => date("G", $diff),
        "minutes_total" => floor($diff_secs / 60),
        "minutes" => (int) date("i", $diff),
        "seconds_total" => $diff_secs,
        "seconds" => (int) date("s", $diff)  );        
    }    
    function hitTahun($lahir) {
        $pecah = explode("-", $lahir);
        $thn = $pecah['0'];
        $bln = intval($pecah['1']);
        $tgl = intval($pecah['2']);
        $utahun = date("Y") - $thn;
        $ubulan = date("m") - $bln;
        $uhari = date("j") - $tgl;
        if($uhari < 0){
            $uhari = date("t",mktime(0,0,0,$bln-1,date("m"),date("Y"))) - abs($uhari); $ubulan = $ubulan - 1;
        }
        if($ubulan < 0){
            $ubulan = 12 - abs($ubulan); $utahun = $utahun - 1;
        }
        $tahunnya = $utahun;
        return $tahunnya;
    }
    function hitBulan($lahir) {
        $pecah = explode("-", $lahir);
        $thn = $pecah['0'];
        $bln = intval($pecah['1']);
        $tgl = intval($pecah['2']);
        $utahun = date("Y") - $thn;
        $ubulan = date("m") - $bln;
        $uhari = date("j") - $tgl;
        if($uhari < 0){
            $uhari = date("t",mktime(0,0,0,$bln-1,date("m"),date("Y"))) - abs($uhari); $ubulan = $ubulan - 1;
        }
        if($ubulan < 0){
            $ubulan = 12 - abs($ubulan); $utahun = $utahun - 1;
        }
        $bulannya = $ubulan;
        return $bulannya;
    }
    include "koneksi.php";
    include "koneksi_sipeg.php";

    $pesan = "SPPD 2024 :<br/>";
    $tahun = date("Y");
    $batas_awal = $tahun."-01-01";
    $batas_akhir = $tahun."-09-30";

    $rs2 = mysqli_query($koneksi,"SELECT count(*) as jumlah_input_sppd FROM sppd1 where tanggal>='$batas_awal' and tanggal<='$batas_akhir'");
    $hasil2 = mysqli_fetch_array($rs2);
    if($hasil2){
        $jumlah_input_sppd = intval($hasil2['jumlah_input_sppd']);
    } else {
        $jumlah_input_sppd = 0;
    }
    $pesan .= "jumlah input sppd : ".$jumlah_input_sppd."<br/>";

    $rs2 = mysqli_query($koneksi,"SELECT count(*) as jumlah_sppd_approve1 FROM sppd1 where tanggal>='$batas_awal' and tanggal<='$batas_akhir' and approve1<>'2'");
    $hasil2 = mysqli_fetch_array($rs2);
    if($hasil2){
        $jumlah_sppd_approve1 = intval($hasil2['jumlah_sppd_approve1']);
    } else {
        $jumlah_sppd_approve1 = 0;
    }
    $pesan .= "jumlah sppd blm approve atasan : ".$jumlah_sppd_approve1."<br/>";

    $rs2 = mysqli_query($koneksi,"SELECT count(*) as jumlah_sppd_approve2 FROM sppd1 where tanggal>='$batas_awal' and tanggal<='$batas_akhir' and approve1='2' and approve2<>'2' and approval2<>''");
    $hasil2 = mysqli_fetch_array($rs2);
    if($hasil2){
        $jumlah_sppd_approve2 = intval($hasil2['jumlah_sppd_approve2']);
    } else {
        $jumlah_sppd_approve2 = 0;
    }
    $pesan .= "jumlah sppd blum approve atasan atasan langsung : ".$jumlah_sppd_approve2."<br/>";

    $rs2 = mysqli_query($koneksi,"SELECT count(*) as jumlah_sppd_validasi FROM sppd1 where tanggal>='$batas_awal' and tanggal<='$batas_akhir' and validasi_biaya='0' and (approve2='2' or (approval2<>'' and approve1='2' and approval2=''))");
    $hasil2 = mysqli_fetch_array($rs2);
    if($hasil2){
        $jumlah_sppd_validasi = intval($hasil2['jumlah_sppd_validasi']);
    } else {
        $jumlah_sppd_validasi = 0;
    }
    $pesan .= "jumlah sppd blum verfikasi sdm : ".$jumlah_sppd_validasi."<br/>";

    $rs2 = mysqli_query($koneksi,"SELECT count(*) as jumlah_sppd_keuangan FROM sppd1 where tanggal>='$batas_awal' and tanggal<='$batas_akhir' and validasi_biaya='1' and approvebayar<>'2'");
    $hasil2 = mysqli_fetch_array($rs2);
    if($hasil2){
        $jumlah_sppd_keuangan = intval($hasil2['jumlah_sppd_keuangan']);
    } else {
        $jumlah_sppd_keuangan = 0;
    }
    $pesan .= "jumlah sppd blum approve keuangan : ".$jumlah_sppd_keuangan."<br/>";

    $rs2 = mysqli_query($koneksi,"SELECT count(*) as jumlah_sppd_bayar FROM sppd1 where tanggal>='$batas_awal' and tanggal<='$batas_akhir' and approvebayar='2' and bayar='0'");
    $hasil2 = mysqli_fetch_array($rs2);
    if($hasil2){
        $jumlah_sppd_bayar = intval($hasil2['jumlah_sppd_bayar']);
    } else {
        $jumlah_sppd_bayar = 0;
    }
    $pesan .= "jumlah sppd blum terbayar : ".$jumlah_sppd_bayar."<br/>";

    $rs2 = mysqli_query($koneksi,"SELECT count(*) as jumlah_sppd_terbayar FROM sppd1 where bayar='1' and tgl_bayar>='$batas_awal' and tgl_bayar<='$batas_akhir'");
    $hasil2 = mysqli_fetch_array($rs2);
    if($hasil2){
        $jumlah_sppd_terbayar = intval($hasil2['jumlah_sppd_terbayar']);
    } else {
        $jumlah_sppd_terbayar = 0;
    }
    $pesan .= "jumlah sppd terbayar : ".$jumlah_sppd_terbayar."<br/>";

    $pesan .= "<br/>Reimburse 2024 :<br/>";
    $rs2 = mysqli_query($koneksi,"SELECT count(distinct idsppd) as jumlah_input_restitusi FROM `biaya_restitusi` WHERE idsppd like '2024%'");
    $hasil2 = mysqli_fetch_array($rs2);
    if($hasil2){
        $jumlah_input_restitusi = intval($hasil2['jumlah_input_restitusi']);
    } else {
        $jumlah_input_restitusi = 0;
    }
    $pesan .= "jumlah input remburse : ".$jumlah_input_restitusi."<br/>";

    $rs2 = mysqli_query($koneksi,"SELECT count(distinct a.idsppd) as jumlah_restitusi_approve1 FROM biaya_restitusi a inner join sppd1 b on a.idsppd=b.idsppd WHERE a.idsppd like '2024%' and a.approve1<>'2' and b.bayar_restitusi='0'");
    $hasil2 = mysqli_fetch_array($rs2);
    if($hasil2){
        $jumlah_restitusi_approve1 = intval($hasil2['jumlah_restitusi_approve1']);
    } else {
        $jumlah_restitusi_approve1 = 0;
    }
    $pesan .= "jumlah reimburse blm approve atasan : ".$jumlah_restitusi_approve1."<br/>";

    $rs2 = mysqli_query($koneksi,"SELECT count(distinct a.idsppd) as jumlah_restitusi_validasi FROM biaya_restitusi a inner join sppd1 b on a.idsppd=b.idsppd WHERE a.idsppd like '2024%' and a.approve1='2' and b.validasi_restitusi='0' and b.bayar_restitusi='0'");
    $hasil2 = mysqli_fetch_array($rs2);
    if($hasil2){
        $jumlah_restitusi_validasi = intval($hasil2['jumlah_restitusi_validasi']);
    } else {
        $jumlah_restitusi_validasi = 0;
    }
    $pesan .= "jumlah resimburse blum verfikasi sdm : ".$jumlah_restitusi_validasi."<br/>";

    $rs2 = mysqli_query($koneksi,"SELECT count(distinct a.idsppd) as jumlah_restitusi_bayar FROM biaya_restitusi a inner join sppd1 b on a.idsppd=b.idsppd WHERE a.idsppd like '2024%' and a.approve1='2' and b.validasi_restitusi='1' and b.bayar_restitusi='0'");
    $hasil2 = mysqli_fetch_array($rs2);
    if($hasil2){
        $jumlah_restitusi_bayar = intval($hasil2['jumlah_restitusi_bayar']);
    } else {
        $jumlah_restitusi_bayar = 0;
    }
    $pesan .= "jumlah restitusi blum terbayar : ".$jumlah_restitusi_bayar."<br/>";

    // $pesan .= "<br/>Absensi :<br/>";
    /*
    for($m=1; $m<=12; ++$m){
        // echo date('F', mktime(0, 0, 0, $m, 1)).'<br>';
        $blth = $tahun."-".str_pad($m,2,"0",STR_PAD_LEFT);
        $tgl_awal = $blth."-01";
        $tgl_akhir = date("Y-m-t",strtotime($tgl_awal));
        // $jumlah_hari_awal = intval(date("t",strtotime($tgl_awal)));
        $hari_awal = 1;
        $hari_akhir = intval(date("t",strtotime($tgl_awal)));

        $jumlah_hari_kerja = 0;
        for($i=1; $i<=$hari_akhir; ++$i){
            $tanggal = $blth."-".str_pad($i,2,"0",STR_PAD_LEFT);
            $dayOfWeek = date('w', strtotime($tanggal));
            if ($dayOfWeek != 0 && $dayOfWeek != 6) {
                $jumlah_hari_kerja++;
            }
        }

        $rs2 = mysqli_query($koneksi,"SELECT count(*) as jumlah_libur FROM libur_nasional where tanggal>='$tgl_awal' and tanggal<='$tgl_akhir' and DayOfWeek(tanggal)<>1 and DayOfWeek(tanggal)<>7");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $jumlah_libur = intval($hasil2['jumlah_libur']);
        } else {
            $jumlah_libur = 0;
        }

        $jumlah_hari = $jumlah_hari_kerja-$jumlah_libur;

        $rs2 = mysqli_query($koneksi,"SELECT count(*) as jumlah_absen FROM absensi where tgl_absen>='$tgl_awal' and tgl_absen<='$tgl_akhir' and jam_masuk<>'' and DayOfWeek(tgl_absen)<>1 and DayOfWeek(tgl_absen)<>7");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $jumlah_absen = intval($hasil2['jumlah_absen']);
        } else {
            $jumlah_absen = 0;
        }
        $persen_absen = round($jumlah_absen/$jumlah_hari,2)*100;
        
        // echo $blth." -" .$jumlah_hari."<br/>";
        echo $blth." -" .$jumlah_absen." -" .$persen_absen."<br/>";
        

        // echo $jumlah_input_sppd."<br/>";
        // echo $jumlah_sppd_approve1."<br/>";
        // echo $jumlah_sppd_approve2."<br/>";
    
    }  
    */  
    echo $pesan;
}
?>