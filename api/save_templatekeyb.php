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

    include 'koneksi.php';

    $hari_ini = date("Y-m-d");

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
    if(isset($_FILES['file_templatekeyb'])){
        if(is_uploaded_file($_FILES['file_templatekeyb']['tmp_name'])){
            $uploadFile = $_FILES['file_templatekeyb'];                 
            $ambilExt = explode(".", $uploadFile['name']);
            $fileExt = end($ambilExt);
            $nama_file = reset($ambilExt);
            
            if(strtolower($fileExt)!="xls" && strtolower($fileExt)!="xlsx"){
                echo 'Format file yang di izinkan hanya excel';
                exit;
            }
            $nama_file2 = $userhris."-keyb-".date('YmdHis').".$fileExt";
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
            $start_date2 = trim($value[0]);
            $end_date2 = trim($value[1]);
            $nip = trim($value[2]);        
            $kompetensi = trim($value[3]);
            $detail_keyb = trim($value[4]);
            $nilai = trim($value[5]);
            $assignment = trim($value[6]);
            $self = trim($value[7]);
            $training = trim($value[8]);

            $start_date = TanggalIndo2($start_date2);
            $end_date = TanggalIndo2($end_date2);

            if($nip!==""){
                $rs2 = mysqli_query($koneksi,"select * from r_keyb where nip='$nip' and start_date='$start_date' and end_date='$end_date'");
                $jumlah_data2 = mysqli_num_rows($rs2);            
                if($jumlah_data2==0){  
                    $sql = "insert into r_keyb";
                    $sql .= "(nip,start_date,end_date,kompetensi,detail_keyb,nilai,assignment,self,training)";    
                    $sql .= " values('$nip','$start_date','$end_date','$kompetensi','$detail_keyb','$nilai','$assignment','$self','$training')";
                    $result = @mysqli_query($koneksi,$sql);
                    if($result){
                        $hitungSukses++;
                    } else {
                        $hitungGagal++;
                    }
                } else {
                    $sql = "";
                    if($start_date!=""){
                        if($sql==""){
                            $sql .= "set start_date='$start_date'";
                        } else {
                            $sql .= ",start_date='$start_date'";
                        }
                    }
                    if($end_date!=""){
                        if($sql==""){
                            $sql .= "set end_date='$end_date'";
                        } else {
                            $sql .= ",end_date='$end_date'";
                        }                    
                    }
                    if($kompetensi!=""){
                        if($sql==""){
                            $sql .= "set kompetensi='$kompetensi'";
                        } else {
                            $sql .= ",kompetensi='$kompetensi'";
                        }                    
                    }
                    if($detail_keyb!=""){
                        if($sql==""){
                            $sql .= "set detail_keyb='$detail_keyb'";
                        } else {
                            $sql .= ",detail_keyb='$detail_keyb'";
                        }                    
                    }
                    if($nilai!=""){
                        if($sql==""){
                            $sql .= "set nilai='$nilai'";
                        } else {
                            $sql .= ",nilai='$nilai'";
                        }                    
                    }
                    if($assignment!=""){
                        if($sql==""){
                            $sql .= "set assignment='$assignment'";
                        } else {
                            $sql .= ",assignment='$assignment'";
                        }                    
                    }
                    if($self!=""){
                        if($sql==""){
                            $sql .= "set self='$self'";
                        } else {
                            $sql .= ",self='$self'";
                        }                    
                    }
                    if($training!=""){
                        if($sql==""){
                            $sql .= "set training='$training'";
                        } else {
                            $sql .= ",training='$training'";
                        }                    
                    }
                    if($sql!=""){
                        $sql2 = "update r_keyb ";
                        $sql2 .= $sql;
                        $sql2 .= " where nip='$nip'"; 
                        $result = @mysqli_query($koneksi,$sql2);
                        if($result){
                            $hitungSukses++;
                        } else {
                            $hitungGagal++;
                        }
    
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