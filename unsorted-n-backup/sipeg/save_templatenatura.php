<?php
error_reporting(0);
session_start();
require '../vendor/autoload.php';
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

    include 'koneksi_sipeg.php';

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
    if(isset($_FILES['file_templatenatura'])){
        if(is_uploaded_file($_FILES['file_templatenatura']['tmp_name'])){
            $uploadFile = $_FILES['file_templatenatura'];                 
            $ambilExt = explode(".", $uploadFile['name']);
            $fileExt = end($ambilExt);
            $nama_file = reset($ambilExt);
            
            if(strtolower($fileExt)!="xls" && strtolower($fileExt)!="xlsx"){
                echo 'Format file yang di izinkan hanya excel';
                exit;
            }
            $nama_file2 = $userhris."-suplisi-".date('YmdHis').".$fileExt";
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
            $blth = $value[1];
            $nip = $value[2];
            $cop = floatval($value[5]);
            $fasilitas_hp = floatval($value[6]);
            $reimburse_kesehatan = floatval($value[7]);
            $asuransi_kesehatan = floatval($value[8]);
            $sarana_kerja = floatval($value[9]);
            $sppd_manual = floatval($value[10]);
            $asuransi_purna_jabatan = floatval($value[11]);
            $medical_checkup = floatval($value[12]);
            if($cop!=""){
                $cop = str_replace(",","",$cop);
                $cop = str_replace(".","",$cop);
                $cop = floatval($cop);
            } else {
                $cop = 0;
            }
            if($fasilitas_hp!=""){
                $fasilitas_hp = str_replace(",","",$fasilitas_hp);
                $fasilitas_hp = str_replace(".","",$fasilitas_hp);
                $fasilitas_hp = floatval($fasilitas_hp);
            } else {
                $fasilitas_hp = 0;
            }
            if($reimburse_kesehatan!=""){
                $reimburse_kesehatan = str_replace(",","",$reimburse_kesehatan);
                $reimburse_kesehatan = str_replace(".","",$reimburse_kesehatan);
                $reimburse_kesehatan = floatval($reimburse_kesehatan);
            } else {
                $reimburse_kesehatan = 0;
            }
            if($asuransi_kesehatan!=""){
                $asuransi_kesehatan = str_replace(",","",$asuransi_kesehatan);
                $asuransi_kesehatan = str_replace(".","",$asuransi_kesehatan);
                $asuransi_kesehatan = floatval($asuransi_kesehatan);
            } else {
                $asuransi_kesehatan = 0;
            }
            if($sarana_kerja!=""){
                $sarana_kerja = str_replace(",","",$sarana_kerja);
                $sarana_kerja = str_replace(".","",$sarana_kerja);
                $sarana_kerja = floatval($sarana_kerja);
            } else {
                $sarana_kerja = 0;
            }
            if($sppd_manual!=""){
                $sppd_manual = str_replace(",","",$sppd_manual);
                $sppd_manual = str_replace(".","",$sppd_manual);
                $sppd_manual = floatval($sppd_manual);
            } else {
                $sppd_manual = 0;
            }
            if($asuransi_purna_jabatan!=""){
                $asuransi_purna_jabatan = str_replace(",","",$asuransi_purna_jabatan);
                $asuransi_purna_jabatan = str_replace(".","",$asuransi_purna_jabatan);
                $asuransi_purna_jabatan = floatval($asuransi_purna_jabatan);
            } else {
                $asuransi_purna_jabatan = 0;
            }
            if($medical_checkup!=""){
                $medical_checkup = str_replace(",","",$medical_checkup);
                $medical_checkup = str_replace(".","",$medical_checkup);
                $medical_checkup = floatval($medical_checkup);
            } else {
                $medical_checkup = 0;
            }
            $jumlah = $cop+$fasilitas_hp+$reimburse_kesehatan+$asuransi_kesehatan+$sarana_kerja+$sppd_manual+$asuransi_purna_jabatan+$medical_checkup;
            $blthnip = $blth.".".$nip;
        
            if($nip!="" && $blth!="" && $jumlah>0){
                $sql = "insert into natura(blth,nip,blthnip,cop,fasilitas_hp,reimburse_kesehatan,asuransi_kesehatan,sarana_kerja,sppd_manual,asuransi_purna_jabatan,medical_checkup)";
                $sql .= " values('$blth','$nip','$blthnip','$cop','$fasilitas_hp','$reimburse_kesehatan','$asuransi_kesehatan','$sarana_kerja','$sppd_manual','$asuransi_purna_jabatan','$medical_checkup')";
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