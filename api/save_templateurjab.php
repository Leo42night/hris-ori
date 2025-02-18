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
    if(isset($_FILES['file_templateurjab'])){
        if(is_uploaded_file($_FILES['file_templateurjab']['tmp_name'])){
            $uploadFile = $_FILES['file_templateurjab'];                 
            $ambilExt = explode(".", $uploadFile['name']);
            $fileExt = end($ambilExt);
            $nama_file = reset($ambilExt);
            
            if(strtolower($fileExt)!="xls" && strtolower($fileExt)!="xlsx"){
                echo 'Format file yang di izinkan hanya excel';
                exit;
            }
            $nama_file2 = $userhris."-pembicara-".date('YmdHis').".$fileExt";
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
            $nip = trim($value[0]);        
            $lokasi_file = trim($value[1]);
            $nama_file = trim($value[2]);
            $no_dokumen = trim($value[3]);
            $keterangan = trim($value[4]);

            if($nip!==""){
                $rs2 = mysqli_query($koneksi,"select * from r_urjab where nip='$nip' and start_date='$start_date' and end_date='$end_date'");
                $jumlah_data2 = mysqli_num_rows($rs2);            
                if($jumlah_data2==0){  
                    $sql = "insert into r_urjab";
                    $sql .= "(nip,lokasi_file,nama_file,no_dokumen,keterangan)";    
                    $sql .= " values('$nip','$lokasi_file','$nama_file','$no_dokumen','$keterangan')";
                    $result = @mysqli_query($koneksi,$sql);
                    if($result){
                        $hitungSukses++;
                    } else {
                        $hitungGagal++;
                    }
                } else {
                    $sql = "";
                    if($lokasi_file!=""){
                        if($sql==""){
                            $sql .= "set lokasi_file='$lokasi_file'";
                        } else {
                            $sql .= ",lokasi_file='$lokasi_file'";
                        }
                    }
                    if($nama_file!=""){
                        if($sql==""){
                            $sql .= "set nama_file='$nama_file'";
                        } else {
                            $sql .= ",nama_file='$nama_file'";
                        }                    
                    }
                    if($no_dokumen!=""){
                        if($sql==""){
                            $sql .= "set no_dokumen='$no_dokumen'";
                        } else {
                            $sql .= ",no_dokumen='$no_dokumen'";
                        }                    
                    }
                    if($keterangan!=""){
                        if($sql==""){
                            $sql .= "set keterangan='$keterangan'";
                        } else {
                            $sql .= ",keterangan='$keterangan'";
                        }                    
                    }
                    if($sql!=""){
                        $sql2 = "update r_urjab ";
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