<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
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
    function get_day_name($date){
        $timestamp = strtotime($date);
        return date('D', $timestamp);
    }
    
    function getAllDates($startingDate, $endingDate){
        $datesArray = [];
    
        $startingDate = strtotime($startingDate);
        $endingDate = strtotime($endingDate);
                
        for ($currentDate = $startingDate; $currentDate <= $endingDate; $currentDate += (86400)) {
            $date = date('Y-m-d', $currentDate);
            $datesArray[] = $date;
        }
    
        return $datesArray;
    }
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $nip2 = $_REQUEST['nip'];
    $blth2 = $_REQUEST['blth'];
    // $nip2 = '7719002PCN';
    // $blth2 = "2024-04";
    $tgl_awal = $blth2."-01";
    $tgl_akhir = date("Y-m-t",strtotime($tgl_awal));
    
    $offset = ($page-1)*$rows;
    $result = array();

    $result["total"] = 1;    


    $items = array();
    $dates = getAllDates($tgl_awal, $tgl_akhir);
    foreach ($dates as $date) {
        $hari = date('l', strtotime($date));
        $tanggal = $date;
        $tanggal2 = TanggalIndo2($tanggal);
    
        $pesan = "";
        if($hari=="Saturday" || $hari=="Sunday"){
            // $cek_data++;
            $pesan = "Weekend";
        }

        $rs9 = mysqli_query($koneksi,"select id from sppd1 where tgl_awal<='$tanggal' and tgl_akhir>='$tanggal' and nip='$nip2'");
        $hasil9 = mysqli_fetch_array($rs9);
        if($hasil9){
            $pesan = "Dinas";
        }
        $rs9 = mysqli_query($koneksi,"select id from cuti where tgl_awal<='$tanggal' and tgl_akhir>='$tanggal' and nip='$nip2'");
        $hasil9 = mysqli_fetch_array($rs9);
        if($hasil9){
            $pesan = "Cuti";
        }
        $rs9 = mysqli_query($koneksi,"select id from ijin where tgl_awal<='$tanggal' and tgl_akhir>='$tanggal' and nip='$nip2'");
        $hasil9 = mysqli_fetch_array($rs9);
        if($hasil9){
            $pesan = "Izin";
        }
        $rs9 = mysqli_query($koneksi,"select * from libur_nasional where tanggal='$tanggal'");
        $hasil9 = mysqli_fetch_array($rs9);
        if($hasil9){
            $keterangan = $hasil9['keterangan'];
            $pesan = $keterangan;
        }  
                
        $rs = mysqli_query($koneksi,"select * from absensi where nip='$nip2' and tgl_absen='$tanggal'");
        $hasil = mysqli_fetch_array($rs);
        if($hasil){
            $id = $hasil['id'];
            $tgl_absen = $hasil['tgl_absen'];
            $tgl_absen2 = TanggalIndo2($tgl_absen);
            $jam_masuk = $hasil['jam_masuk'];
            
            $lat_masuk = $hasil['lat_masuk'];
            $lon_masuk = $hasil['lon_masuk'];
            $jarak_masuk = floatval($hasil['jarak_masuk']);
            $jam_pulang = $hasil['jam_pulang'];
            $lat_pulang = $hasil['lat_pulang'];
            $lon_pulang = $hasil['lon_pulang'];
            $jarak_pulang = floatval($hasil['jarak_pulang']);
            
            if($jam_masuk!=""){
                if($jarak_masuk>999){
                    $jarak_masuk2 = number_format($jarak_masuk/1000,2,',','.')." KM";
                } else {
                    $jarak_masuk2 = $jarak_masuk." MTR";
                }
            } else {
                $jarak_masuk2 = "";
            }

            if($jam_pulang!=""){
                if($jarak_pulang>999){
                    $jarak_pulang2 = number_format($jarak_pulang/1000,2,',','.')." KM";
                } else {
                    $jarak_pulang2 = $jarak_pulang." MTR";
                }
            } else {
                $jarak_pulang2 = "";
            }
            $status = $hasil['status'];
            if($status!="WFO" && $status!="WFH" && $status!=""){
                $status2 = "SHIFT ".$status;
            } else if($status=="WFO" || $status=="WFH"){
                $status2 = $status;
            } else {
                $status2 = "";
            }        
            $durasi = $hasil['durasi'];
            $keterangan = "Absen";
        } else {
            $id = 0;
            $tgl_absen = "";
            $tgl_absen2 = "";
            $jam_masuk = "";            
            $lat_masuk = "";
            $lon_masuk = "";
            $jarak_masuk = "";
            $jam_pulang = "";
            $lat_pulang = "";
            $lon_pulang = "";
            $jarak_pulang = "";
            $jarak_masuk2 = "";
            $jarak_pulang2 = "";
            $status = "";
            $status2 = "";
            $durasi = "";
            if($pesan!=""){
                $keterangan = $pesan;
            } else {
                $keterangan = "Tidak Absen";
            }
        }                

        $datanya = array();
        // $datanya["niprincianabsen"] = $nip;
        // $datanya["namarincianabsen"] = $nama;
        // $datanya["jabatanrincianabsen"] = $jabatan;

        $datanya["idrincianabsen"] = $id;
        $datanya["niprincianabsen"] = $nip2;
        $datanya["tanggalrincianabsen"] = $tanggal;
        $datanya["tanggal2rincianabsen"] = $tanggal2;
        $datanya["tgl_absenrincianabsen"] = $tgl_absen;
        $datanya["tgl_absen2rincianabsen"] = $tgl_absen2;
        $datanya["jam_masukrincianabsen"] = $jam_masuk;
        
        $datanya["lat_masukrincianabsen"] = $lat_masuk;
        $datanya["lon_masukrincianabsen"] = $lon_masuk;
        $datanya["jarak_masukrincianabsen"] = $jarak_masuk;
        $datanya["jarak_masuk2rincianabsen"] = $jarak_masuk2;
        $datanya["jam_pulangrincianabsen"] = $jam_pulang;
        $datanya["lat_pulangrincianabsen"] = $lat_pulang;
        $datanya["lon_pulangrincianabsen"] = $lon_pulang;
        $datanya["jarak_pulangrincianabsen"] = $jarak_pulang;
        $datanya["jarak_pulang2rincianabsen"] = $jarak_pulang2;
        $datanya["status2rincianabsen"] = $status2;
        $datanya["statusrincianabsen"] = $status;
        $datanya["durasirincianabsen"] = $durasi;
        $datanya["keteranganrincianabsen"] = $keterangan;
        
        array_push($items, $datanya);
        
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>