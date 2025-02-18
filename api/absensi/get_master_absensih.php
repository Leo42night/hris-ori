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
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $blth_ini = date("Y-m");    
    $tanggal2 = isset($_POST['tanggalabsensihcari']) ? $_POST['tanggalabsensihcari'] : date("Y-m-d");
    $nip2 = isset($_POST['nipabsensihcari']) ? $_POST['nipabsensihcari'] : "";

    $tanggal22 = TanggalIndo2($tanggal2);
    
    $perintah = "";    
    if($nip2!=""){
        $perintah .= " and (a.nip='$nip2' or a.nama like '%$nip2%')";
    }         
    
    $offset = ($page-1)*$rows;
    $result = array();

    $rs = mysqli_query($koneksi,"select count(distinct a.nip) from data_pegawai a left join absensi b on a.nip=b.nip where a.aktif='1'".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    


    $items = array();
    $sql = "select '".$tanggal22."' as tgl_absen22,a.nip as nipnya,a.nama,a.jabatan,b.* from data_pegawai a";
    $sql .= " LEFT JOIN absensi b ON a.nip = b.nip and b.tgl_absen='$tanggal2'";
    $sql .= " where a.aktif='1'".$perintah." order by a.id asc limit $offset,$rows";
    $rs2 = mysqli_query($koneksi,$sql);
    while ($hasil = mysqli_fetch_array($rs2)) {
    	$nip = $hasil['nipnya'];
    	$nama = $hasil['nama'];
        $jabatan = $hasil['jabatan'];
        $tgl_absen22 = $hasil['tgl_absen22'];

        $id = $hasil['id'];
        $tgl_absen = $hasil['tgl_absen'];
        /*
        if($tgl_absen!=""){
            $tgl_absen2 = TanggalIndo2($tgl_absen);
        } else {
            $tgl_absen2 = "";
        }
        */
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
        

        $datanya = array();
        $datanya["nipabsensih"] = $nip;
        $datanya["namaabsensih"] = $nama;
        $datanya["jabatanabsensih"] = $jabatan;

        $datanya["idabsensih"] = $id;
        $datanya["tgl_absenabsensih"] = $tgl_absen;
        $datanya["tgl_absen2absensih"] = $tgl_absen22;
        $datanya["jam_masukabsensih"] = $jam_masuk;
        
        $datanya["lat_masukabsensih"] = $lat_masuk;
        $datanya["lon_masukabsensih"] = $lon_masuk;
        $datanya["jarak_masukabsensih"] = $jarak_masuk;
        $datanya["jarak_masuk2absensih"] = $jarak_masuk2;
        $datanya["jam_pulangabsensih"] = $jam_pulang;
        $datanya["lat_pulangabsensih"] = $lat_pulang;
        $datanya["lon_pulangabsensih"] = $lon_pulang;
        $datanya["jarak_pulangabsensih"] = $jarak_pulang;
        $datanya["jarak_pulang2absensih"] = $jarak_pulang2;
        $datanya["status2absensih"] = $status2;
        $datanya["statusabsensih"] = $status;
        $datanya["durasiabsensih"] = $durasi;
        
        array_push($items, $datanya);
        
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>