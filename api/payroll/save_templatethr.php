<?php
error_reporting(0);
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");   
    function TanggalIndo2($date){
        if($date!=""){
            $tgl = substr($date, 0, 2);
            $bulan = substr($date, 3, 2);
            $tahun   = substr($date, 6, 4);
            $result = $tahun . "-" . $bulan . "-". $tgl;	
            return($result);
        } else {
            return("");
        }
    }

    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";

    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));

    $directoryName = "assets/upload";
    if(!is_dir($directoryName)){
      mkdir($directoryName, 0755, true);
    }    
    $uploadDir1 = $directoryName."/";
    $source = 'assets/index.html';
    $destination = $uploadDir1.'/index.html';
    if (!file_exists($destination)){
      copy($source, $destination);
    }
    if(isset($_FILES['file_templatethr'])){
        if(is_uploaded_file($_FILES['file_templatethr']['tmp_name'])){
            $uploadFile = $_FILES['file_templatethr'];                 
            $ambilExt = explode(".", $uploadFile['name']);
            $fileExt = end($ambilExt);
            $nama_file = reset($ambilExt);
            
            if(strtolower($fileExt)!="xls" && strtolower($fileExt)!="xlsx"){
                echo 'Format file yang di izinkan hanya excel';
                exit;
            }
            $nama_file2 = $userhris."-thr-".date('YmdHis').".$fileExt";
            move_uploaded_file($uploadFile['tmp_name'],$uploadDir1.$nama_file2);
        } else {
            $nama_file2 = "";
        }
    } else {
        $nama_file2 = "";
    }    
    if ($nama_file2!=""){
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($directoryName."/".$nama_file2);
        
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();
        
        unset($rows[0]);
        //unset($rows[1]);
        
        $tz = 'Asia/Jakarta';
        $dt = new DateTime("now", new DateTimeZone($tz));
        $timestamp = $dt->format('Y-m-d G:i:s');
        
        $hitungSukses = 0;
        $hitungGagal = 0;
        
        foreach ($rows as $key => $value) {
            $jenisthr = trim($value[1]);
            $blth = trim($value[2]);
            $nip = trim($value[3]);
            $blth_awal = trim($value[4]);
            $blth_akhir = trim($value[5]);
            $jumlah_bulan = intval($value[6]);
            $thr = trim($value[7]);
            $tahun = substr($blth,0,4);
            $niptahun = $tahun.".".$nip;
        
            if($nip!==""){
                $rs2 = mysqli_query($koneksi,"select * from data_pegawai where nip='$nip'");
                $hasil2 = mysqli_fetch_array($rs2);
                if($hasil2){
                    $agama = stripslashesx ($hasil2['agama']);
                    $aktif = stripslashesx ($hasil2['aktif']);
                    $tgl_masuk = stripslashesx ($hasil2['tgl_masuk']);
                    $tgl_berhenti = stripslashesx ($hasil2['tgl_berhenti']);
                    $bank_payroll = stripslashesx ($hasil2['nama_bank']);
                    $no_rek_payroll = stripslashesx ($hasil2['no_rekening']);
                    $an_payroll = stripslashesx ($hasil2['nama_rekening']);            
                } else {
                    $agama = "";
                    $aktif = "";
                    $tgl_masuk = "";
                    $tgl_berhenti = "";
                    $bank_payroll = "";
                    $no_rek_payroll = "";
                    $an_payroll = "";
                }

                $rs3 = mysqli_query($koneksi,"select tarif_grade,honorarium,honorer from master_gaji where nip='$nip'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $tarif_grade = floatval($hasil3['tarif_grade']);
                    $honorarium = floatval($hasil3['honorarium']);
                    $honorer = floatval($hasil3['honorer']);
                } else {
                    $tarif_grade = 0;
                    $honorarium = 0;
                    $honorer = 0;
                }
                $p1 = $tarif_grade+$honorarium+$honorer;
        
                // $sql = "insert into thr(jenisthr,blth,tahun,nip,niptahun,agama,aktif,tgl_masuk,tgl_berhenti,blth_awal,blth_akhir,jumlah_bulan,p1,thr,petugas,bank_payroll,no_rek_payroll,an_payroll)";
                // $sql .= " values('$jenisthr','$blth','$tahun','$nip','$niptahun','$agama','$aktif','$tgl_masuk','$tgl_berhenti','$blth_awal','$blth_akhir','$jumlah_bulan','$p1','$thr','$userhris','$bank_payroll','$no_rek_payroll','$an_payroll')";
                $sql = "insert into thr(jenisthr,blth,tahun,nip,niptahun,agama,aktif,tgl_masuk,tgl_berhenti,blth_awal,blth_akhir,jumlah_bulan,p1,thr,petugas)";
                $sql .= " values('$jenisthr','$blth','$tahun','$nip','$niptahun','$agama','$aktif','$tgl_masuk','$tgl_berhenti','$blth_awal','$blth_akhir','$jumlah_bulan','$p1','$thr','$userhris')";
                $result = @mysqli_query($koneksi,$sql);
                if($result){
                    $hitungSukses++;
                } else {
                    $hitungGagal++;
                }
            }
        }
        //echo json_encode(array('successMsg'=>'Sukses'));
        echo json_encode(array('successMsg'=>'Sukses : '.$hitungSukses.', Gagal : '.$hitungGagal));
    } else {
        //echo json_encode(array('errorMsg'=>'Gagal'));
        //echo json_encode(array('successMsg'=>'Gagal'));
        echo json_encode(array('errorMsg'=>'Sukses : '.$hitungSukses.', Gagal : '.$hitungGagal));
    }        
}    
?>