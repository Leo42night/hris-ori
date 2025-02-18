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
    if(isset($_FILES['file_templatesuplisi'])){
        if(is_uploaded_file($_FILES['file_templatesuplisi']['tmp_name'])){
            $uploadFile = $_FILES['file_templatesuplisi'];                 
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
            $nip = trim($value[1]);
            $blth = trim($value[2]);
            $gaji = floatval($value[3]);
            $tunjangan_posisi = floatval($value[4]);
            $p21b = floatval($value[5]);
            $tunjangan_kemahalan = floatval($value[6]);
            $tunjangan_perumahan = floatval($value[7]);
            $tunjangan_transportasi = floatval($value[8]);
            $bantuan_pulsa = floatval($value[9]);
            $cuti = floatval($value[10]);
            $thr = floatval($value[11]);
            $iks = floatval($value[12]);
            $bonus = floatval($value[13]);
            $winduan = floatval($value[14]);
            $honorarium_eo = floatval($value[15]);
            $jumlah_suplisi = floatval($value[16]);
            $jumlah_suplisi2 = $gaji+$tunjangan_posisi+$p21b+$tunjangan_kemahalan+$tunjangan_perumahan+$tunjangan_transportasi+$bantuan_pulsa+$cuti+$thr+$iks+$bonus+$winduan+$honorarium_eo;
            if($jumlah_suplisi==0){
                $jumlah_suplisi = $jumlah_suplisi2;
            }        
            $blthnip = $blth.".".$nip;
        
            if($nip!=="" && $jumlah_suplisi>0){
                $sql = "insert into suplisi(blth,nip,blthnip,gaji,tunjangan_posisi,p21b,tunjangan_kemahalan,tunjangan_perumahan,tunjangan_transportasi,bantuan_pulsa,cuti,thr,iks,bonus,winduan,honorarium_eo,jumlah_suplisi)";
                $sql .= " values('$blth','$nip','$blthnip','$gaji','$tunjangan_posisi','$p21b','$tunjangan_kemahalan','$tunjangan_perumahan','$tunjangan_transportasi','$bantuan_pulsa','$cuti','$thr','$iks','$bonus','$winduan','$honorarium_eo','$jumlah_suplisi')";
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