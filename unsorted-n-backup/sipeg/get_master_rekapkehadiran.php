<?php
//error_reporting(0);
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
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $blth_ini = date("Y-m");    
    $blth_awal2 = isset($_POST['blth_awalrekapkehadirancari']) ? $_POST['blth_awalrekapkehadirancari'] : date("Y-m");
    $blth_akhir2 = isset($_POST['blth_akhirrekapkehadirancari']) ? $_POST['blth_akhirrekapkehadirancari'] : date("Y-m");
    $nama2 = isset($_POST['namarekapkehadirancari']) ? $_POST['namarekapkehadirancari'] : "";
    $tgl_awal = $blth_awal2."-01";
    $tgl_akhir = date("Y-m-t",strtotime($blth_akhir2."-01"));
    $start_date = date_create($tgl_awal);
    $end_date = date_create($tgl_akhir);

    $perintah = "";
    if($nama2!=""){
        $perintah .= " and (a.nip='$nama2' or a.nama like '%$nama2%')";
    }   
    
    $offset = ($page-1)*$rows;
    $result = array();

    $rs = mysqli_query($koneksi,"select count(a.nip) from data_pegawai a where a.aktif='1'".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    


    $items = array();
    $sql = "select a.nip,a.nama,a.jabatan,b.jumlah_absen from data_pegawai a";
    $sql .= " LEFT JOIN (SELECT nip,count(nip) as jumlah_absen FROM absensi where tgl_absen>='$tgl_awal' and tgl_absen<='$tgl_akhir' and jam_masuk<>'' and DayOfWeek(tgl_absen)<>1 and DayOfWeek(tgl_absen)<>7 GROUP BY nip) b ON a.nip = b.nip";
    // $sql .= " LEFT JOIN (SELECT nip,count(nip) as jumlah_pulang FROM absensi where tgl_absen>='$tgl_awal' and tgl_absen<='$tgl_akhir' and jam_masuk<>'' and jam_pulang<>'' and DayOfWeek(tgl_absen)<>1 and DayOfWeek(tgl_absen)<>7 GROUP BY nip) c ON a.nip = c.nip";
    $sql .= " where a.aktif='1'";
    $sql .= $perintah." order by a.id asc limit $offset,$rows";
    $rs2 = mysqli_query($koneksi,$sql);
    while ($hasil2 = mysqli_fetch_array($rs2)) {
    	$nip = stripslashes ($hasil2['nip']);
    	$nama = stripslashes ($hasil2['nama']);
        $jabatan = stripslashes ($hasil2['jabatan']);
        $jumlah_absen = floatval ($hasil2['jumlah_absen']);
        // $jumlah_pulang = floatval ($hasil2['jumlah_pulang']);

        // $jumlah_sppd = 0;
        // $rs41 = mysqli_query($koneksi,"select tgl_awal,tgl_akhir from sppd1 where nip='$nip' and ((tgl_awal>='$tgl_awal' and tgl_awal<='$tgl_akhir') or (tgl_akhir>='$tgl_awal' and tgl_akhir<='$tgl_akhir'))");
        // while ($hasil41 = mysqli_fetch_array($rs41)) {
        //     $tgl_awalnya = stripslashes ($hasil41['tgl_awal']);
        //     $tgl_akhirnya = stripslashes ($hasil41['tgl_akhir']);
        //     if($tgl_awalnya<$tgl_awal){
        //         $tgl_awalnya = $tgl_awal;
        //     }
        //     if($tgl_akhirnya>$tgl_akhir){
        //         $tgl_akhirnya = $tgl_akhir;
        //     }
        //     $tgl1 = new DateTime($tgl_awalnya);
        //     $tgl2 = new DateTime($tgl_akhirnya);
        //     $d = $tgl2->diff($tgl1)->days + 1;
        //     //echo $d." hari";            
        //     $jumlah_sppd = $jumlah_sppd+$d;

        //     //$rs42 = mysqli_query($koneksi,"select count(id) from sppd1 where nip='$nip' and ((tgl_awal>='$tgl_awal' and tgl_awal<='$tgl_akhir') or (tgl_akhir>='$tgl_awal' and tgl_akhir<='$tgl_akhir'))");
        // }
        
        $jumlah_cuti = 0;
        $rs41 = mysqli_query($koneksi,"select tgl_awal,tgl_akhir from cuti where nip='$nip' and ((tgl_awal>='$tgl_awal' and tgl_awal<='$tgl_akhir') or (tgl_akhir>='$tgl_awal' and tgl_akhir<='$tgl_akhir'))");
        while ($hasil41 = mysqli_fetch_array($rs41)) {
            $tgl_awalnya = stripslashes ($hasil41['tgl_awal']);
            $tgl_akhirnya = stripslashes ($hasil41['tgl_akhir']);
            if($tgl_awalnya<$tgl_awal){
                $tgl_awalnya = $tgl_awal;
            }
            if($tgl_akhirnya>$tgl_akhir){
                $tgl_akhirnya = $tgl_akhir;
            }
            $tgl1 = new DateTime($tgl_awalnya);
            $tgl2 = new DateTime($tgl_akhirnya);
            $d = $tgl2->diff($tgl1)->days + 1;
            //echo $d." hari";            
            $jumlah_cuti = $jumlah_cuti+$d;

            //$rs42 = mysqli_query($koneksi,"select count(id) from sppd1 where nip='$nip' and ((tgl_awal>='$tgl_awal' and tgl_awal<='$tgl_akhir') or (tgl_akhir>='$tgl_awal' and tgl_akhir<='$tgl_akhir'))");
        }
        
        $jumlah_ijin = 0;
        $rs41 = mysqli_query($koneksi,"select tgl_awal,tgl_akhir from ijin where nip='$nip' and ((tgl_awal>='$tgl_awal' and tgl_awal<='$tgl_akhir') or (tgl_akhir>='$tgl_awal' and tgl_akhir<='$tgl_akhir'))");
        while ($hasil41 = mysqli_fetch_array($rs41)) {
            $tgl_awalnya = stripslashes ($hasil41['tgl_awal']);
            $tgl_akhirnya = stripslashes ($hasil41['tgl_akhir']);
            if($tgl_awalnya<$tgl_awal){
                $tgl_awalnya = $tgl_awal;
            }
            if($tgl_akhirnya>$tgl_akhir){
                $tgl_akhirnya = $tgl_akhir;
            }
            $tgl1 = new DateTime($tgl_awalnya);
            $tgl2 = new DateTime($tgl_akhirnya);
            $d = $tgl2->diff($tgl1)->days + 1;
            //echo $d." hari";            
            $jumlah_ijin = $jumlah_ijin+$d;

            //$rs42 = mysqli_query($koneksi,"select count(id) from sppd1 where nip='$nip' and ((tgl_awal>='$tgl_awal' and tgl_awal<='$tgl_akhir') or (tgl_akhir>='$tgl_awal' and tgl_akhir<='$tgl_akhir'))");
        }
        
        //SELECT DATEDIFF("2017-06-16", "2017-06-15")
        
        /*
        $jumlah_sppd = 0;
        $interval = new DateInterval('P1D');
        $date_range = new DatePeriod($start_date, $interval, $end_date);
        foreach ($date_range as $date) {
            $tanggal = $date->format('Y-m-d');
            $rs41 = mysqli_query($koneksi,"select id from sppd1 where tgl_awal<='$tanggal' and tgl_akhir>='$tanggal'");            
            $hasil41 = mysqli_fetch_array($rs41);
            if($hasil4){
                $nama_cuti = $hasil4['nama_cuti'];
            } else {
                $nama_cuti = "";
            }
        }    
        */    

        $datanya = array();
        $datanya["blth_awalrekapkehadiran"] = $blth_awal2;
        $datanya["blth_akhirrekapkehadiran"] = $blth_akhir2;
        $datanya["niprekapkehadiran"] = $nip;
        $datanya["namarekapkehadiran"] = $nama;
        $datanya["jabatanrekapkehadiran"] = $jabatan;
        $datanya["jumlah_absenrekapkehadiran"] = $jumlah_absen;
        // $datanya["jumlah_pulangrekapkehadiran"] = $jumlah_pulang;
        // $datanya["jumlah_sppdrekapkehadiran"] = $jumlah_sppd;
        $datanya["jumlah_cutirekapkehadiran"] = $jumlah_cuti;
        $datanya["jumlah_ijinrekapkehadiran"] = $jumlah_ijin;
        array_push($items, $datanya);
        
    }
    $result["rows"] = $items;
    echo json_encode($result);

}
?>