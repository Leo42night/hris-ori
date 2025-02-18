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
    if(isset($_FILES['file_templatepembicara'])){
        if(is_uploaded_file($_FILES['file_templatepembicara']['tmp_name'])){
            $uploadFile = $_FILES['file_templatepembicara'];                 
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
            $start_date2 = trim($value[0]);
            $end_date2 = trim($value[1]);
            $nip = trim($value[2]);        
            $judul_acara = trim($value[3]);
            $kode_penyelenggaraan = trim($value[4]);
            $lokasi = trim($value[5]);
            $peserta = trim($value[6]);
            $tingkat_acara = trim($value[7]);
            $kode_dahan_profesi = trim($value[8]);
            $dahan_profesi = trim($value[9]);
            $kode_diklat = trim($value[10]);
            $judul_diklat = trim($value[11]);
            $udiklat = trim($value[12]);
            $jenis_pelaksanaan = trim($value[13]);
            $jenis_sertifikasi = trim($value[14]);
            $sifat_diklat = trim($value[15]);

            $start_date = TanggalIndo2($start_date2);
            $end_date = TanggalIndo2($end_date2);

            if($nip!==""){
                $rs2 = mysqli_query($koneksi,"select * from r_pembicara where nip='$nip' and start_date='$start_date' and end_date='$end_date'");
                $jumlah_data2 = mysqli_num_rows($rs2);            
                if($jumlah_data2==0){  
                    $sql = "insert into r_pembicara";
                    $sql .= "(nip,start_date,end_date,judul_acara,kode_penyelenggaraan,lokasi,peserta,tingkat_acara,kode_dahan_profesi,dahan_profesi,kode_diklat,judul_diklat,udiklat,jenis_pelaksanaan,jenis_sertifikasi,sifat_diklat,status_edit,tgl_edit,user_edit)";    
                    $sql .= " values('$nip','$start_date','$end_date','$judul_acara','$kode_penyelenggaraan','$lokasi','$peserta','$tingkat_acara','$kode_dahan_profesi','$dahan_profesi','$kode_diklat','$judul_diklat','$udiklat','$jenis_pelaksanaan','$jenis_sertifikasi','$sifat_diklat','1','$hari_ini','$userhris')";
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
                    if($judul_acara!=""){
                        if($sql==""){
                            $sql .= "set judul_acara='$judul_acara'";
                        } else {
                            $sql .= ",judul_acara='$judul_acara'";
                        }                    
                    }
                    if($judul_acara!=""){
                        if($sql==""){
                            $sql .= "set judul_acara='$judul_acara'";
                        } else {
                            $sql .= ",judul_acara='$judul_acara'";
                        }                    
                    }
                    if($lokasi!=""){
                        if($sql==""){
                            $sql .= "set lokasi='$lokasi'";
                        } else {
                            $sql .= ",lokasi='$lokasi'";
                        }                    
                    }
                    if($peserta!=""){
                        if($sql==""){
                            $sql .= "set peserta='$peserta'";
                        } else {
                            $sql .= ",peserta='$peserta'";
                        }                    
                    }
                    if($tingkat_acara!=""){
                        if($sql==""){
                            $sql .= "set tingkat_acara='$tingkat_acara'";
                        } else {
                            $sql .= ",tingkat_acara='$tingkat_acara'";
                        }                    
                    }
                    if($kode_dahan_profesi!=""){
                        if($sql==""){
                            $sql .= "set kode_dahan_profesi='$kode_dahan_profesi'";
                        } else {
                            $sql .= ",kode_dahan_profesi='$kode_dahan_profesi'";
                        }                    
                    }
                    if($dahan_profesi!=""){
                        if($sql==""){
                            $sql .= "set dahan_profesi='$dahan_profesi'";
                        } else {
                            $sql .= ",dahan_profesi='$dahan_profesi'";
                        }                    
                    }
                    if($kode_diklat!=""){
                        if($sql==""){
                            $sql .= "set kode_diklat='$kode_diklat'";
                        } else {
                            $sql .= ",kode_diklat='$kode_diklat'";
                        }                    
                    }
                    if($judul_diklat!=""){
                        if($sql==""){
                            $sql .= "set judul_diklat='$judul_diklat'";
                        } else {
                            $sql .= ",judul_diklat='$judul_diklat'";
                        }                    
                    }
                    if($udiklat!=""){
                        if($sql==""){
                            $sql .= "set udiklat='$udiklat'";
                        } else {
                            $sql .= ",udiklat='$udiklat'";
                        }                    
                    }
                    if($jenis_pelaksanaan!=""){
                        if($sql==""){
                            $sql .= "set jenis_pelaksanaan='$jenis_pelaksanaan'";
                        } else {
                            $sql .= ",jenis_pelaksanaan='$jenis_pelaksanaan'";
                        }                    
                    }
                    if($jenis_sertifikasi!=""){
                        if($sql==""){
                            $sql .= "set jenis_sertifikasi='$jenis_sertifikasi'";
                        } else {
                            $sql .= ",jenis_sertifikasi='$jenis_sertifikasi'";
                        }                    
                    }
                    if($sifat_diklat!=""){
                        if($sql==""){
                            $sql .= "set sifat_diklat='$sifat_diklat'";
                        } else {
                            $sql .= ",sifat_diklat='$sifat_diklat'";
                        }                    
                    }
                    if($sql!=""){
                        $sql2 = "update r_pembicara ";
                        $sql2 .= $sql;
                        $sql2 .= " where nip='$nip'"; 
                        $result = @mysqli_query($koneksi,$sql2);
                        if($result){
                            $status_perubahan = mysqli_affected_rows($koneksi);
                            if($status_perubahan>0){
                                $sql2 = "update r_pembicara set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
                                $result2 = @mysqli_query($koneksi,$sql2);
                            }                    
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