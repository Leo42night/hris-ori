<?php
// error_reporting(0);
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
    $tgl_proses = date("Y-m-d", strtotime("+1 hour"));

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
    if(isset($_FILES['file_templatetikp'])){
        if(is_uploaded_file($_FILES['file_templatetikp']['tmp_name'])){
            $uploadFile = $_FILES['file_templatetikp'];                 
            $ambilExt = explode(".", $uploadFile['name']);
            $fileExt = end($ambilExt);
            $nama_file = reset($ambilExt);
            
            if(strtolower($fileExt)!="xls" && strtolower($fileExt)!="xlsx"){
                echo 'Format file yang di izinkan hanya excel';
                exit;
            }
            $nama_file2 = $userhris."-tikp-".date('YmdHis').".$fileExt";
            move_uploaded_file($uploadFile['tmp_name'],$uploadDir1.$nama_file2);
        } else {
            $nama_file2 = "";
        }
    } else {
        $nama_file2 = "";
    }
    $pesan = $nama_file2;
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
            $blth = trim($value[1]);
            $tahun = trim($value[2]);
            $nip = trim($value[3]);
            $bonus = floatval(trim($value[4]));
            $tahun = substr($blth,0,4);
            $niptahun = $tahun.".".$nip.".".$blth;
        
            if($nip!=="" && $bonus>0){
                $rs2 = mysqli_query($koneksi,"select * from data_pegawai where nip='$nip'");
                $hasil2 = mysqli_fetch_array($rs2);
                if($hasil2){
                    $bank_payroll = stripslashesx ($hasil2['nama_bank']);
                    $no_rek_payroll = stripslashesx ($hasil2['no_rekening']);
                    $an_payroll = stripslashesx ($hasil2['nama_rekening']);            
                } else {
                    $bank_payroll = "";
                    $no_rek_payroll = "";
                    $an_payroll = "";
                }
        
                // $sql = "insert into bonus(blth,tahun,nip,niptahun,bonus,tgl_proses,petugas,bank_payroll,no_rek_payroll,an_payroll)";
                // $sql .= " values('$blth','$tahun','$nip','$niptahun','$bonus','$tgl_proses','$userhris','$bank_payroll','$no_rek_payroll','$an_payroll')";
                $sql = "insert into bonus(blth,tahun,nip,niptahun,bonus,tgl_proses,petugas)";
                $sql .= " values('$blth','$tahun','$nip','$niptahun','$bonus','$tgl_proses','$userhris')";
                $result = @mysqli_query($koneksi,$sql);
                if($result){
                    $hitungSukses++;
                    $pesan .= " sukses";
                } else {
                    $hitungGagal++;
                    $pesan .= " ".mysqli_error($koneksi);
                }
            }
        }
        // echo json_encode(array('successMsg'=>$pesan));
        echo json_encode(array('successMsg'=>'Sukses : '.$hitungSukses.', Gagal : '.$hitungGagal));
    } else {
        //echo json_encode(array('errorMsg'=>'Gagal'));
        //echo json_encode(array('successMsg'=>'Gagal'));
        echo json_encode(array('errorMsg'=>'Sukses : '.$hitungSukses.', Gagal : '.$hitungGagal));
    }        
}    
?>