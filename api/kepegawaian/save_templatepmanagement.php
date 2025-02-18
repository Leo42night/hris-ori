<?php
//error_reporting(0);
session_start();
require 'vendor/autoload.php';
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

    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));

    $directoryName = "upload";
    if(!is_dir($directoryName)){
      mkdir($directoryName, 0755, true);
    }    
    $uploadDir1 = $directoryName."/";
    $source = 'assets/index.html';
    $destination = $uploadDir1.'/index.html';
    if (!file_exists($destination)){
      copy($source, $destination);
    }
    if(isset($_FILES['file_templatepmanagement'])){
        if(is_uploaded_file($_FILES['file_templatepmanagement']['tmp_name'])){
            $uploadFile = $_FILES['file_templatepmanagement'];                 
            $ambilExt = explode(".", $uploadFile['name']);
            $fileExt = end($ambilExt);
            $nama_file = reset($ambilExt);
            
            if(strtolower($fileExt)!="xls" && strtolower($fileExt)!="xlsx"){
                echo 'Format file yang di izinkan hanya excel';
                exit;
            }
            $nama_file2 = $userhris."-pmanagement-".date('YmdHis').".$fileExt";
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
            $kode_posisi = trim($value[0]);
            $nama_posisi = trim($value[1]);
            $status = trim($value[2]);
            $start_date2 = trim($value[3]);
            $end_date2 = trim($value[4]);
            $nip = trim($value[5]);
            $job_key = trim($value[6]);
            $job_level = trim($value[7]);
            $ftk = trim($value[8]);
            $posisi_kunci = trim($value[9]);
            $kode_posisi_atasan = trim($value[10]);
            $nama_posisi_atasan = trim($value[11]);

            $start_date = TanggalIndo2($start_date2);
            $end_date = TanggalIndo2($end_date2);

            if($kode_posisi!==""){
                $rs2 = mysqli_query($koneksi,"select * from r_position_management where kode_posisi='$kode_posisi'");
                $jumlah_data2 = mysqli_num_rows($rs2);            
                if($jumlah_data2==0){  
                    $sql = "insert into r_position_management";
                    $sql .= "(kode_posisi,nama_posisi,status,start_date,end_date,nip,job_key,job_level,ftk,posisi_kunci,kode_posisi_atasan,nama_posisi_atasan,status_edit,tgl_edit,user_edit)";
                    $sql .= " values('$kode_posisi','$nama_posisi','$status','$start_date','$end_date','$nip','$job_key','$job_level','$ftk','$posisi_kunci','$kode_posisi_atasan','$nama_posisi_atasan','1','$hari_ini','$userhris')";
                    $result = @mysqli_query($koneksi,$sql);
                    if($result){
                        $hitungSukses++;
                    } else {
                        $hitungGagal++;
                    }
                }
                //$result = @mysqli_query($koneksi,$sql);
            }
        }
        //echo json_encode(array('successMsg'=>'Sukses'));
        echo json_encode(array('successMsg'=>'Sukses : '.$hitungSukses.', Gagal : '.$hitungGagal));
    } else {
        //echo json_encode(array('errorMsg'=>'Gagal'));
        echo json_encode(array('successMsg'=>'Gagal'));
    }    
}    
?>