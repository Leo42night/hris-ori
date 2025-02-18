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
    if(isset($_FILES['file_templatediklatp'])){
        if(is_uploaded_file($_FILES['file_templatediklatp']['tmp_name'])){
            $uploadFile = $_FILES['file_templatediklatp'];                 
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
            $jenis_diklat = trim($value[3]);
            $kode_diklat = trim($value[4]);
            $judul_diklat = trim($value[5]);
            $udiklat = trim($value[25]);
            $kode_profesi = trim($value[7]);
            $level_profesiensi = trim($value[8]);
            $grade_nilai = trim($value[16]);
            $nilai = trim($value[15]);
            $keterangan_lulus = trim($value[21]);
            $keterangan_penyelesaian = trim($value[27]);
            $kode_sertifikat = trim($value[22]);
            $tgl_terbit2 = trim($value[23]);
            $tgl_selesai2 = trim($value[24]);
            $kode_transaksi = trim($value[30]);

            $start_date = TanggalIndo2($start_date2);
            $end_date = TanggalIndo2($end_date2);
            $tgl_terbit = TanggalIndo2($tgl_terbit2);
            $tgl_selesai = TanggalIndo2($tgl_selesai2);

            if($nip!==""){
                $rs2 = mysqli_query($koneksi,"select * from r_diklat_penjenjangan where nip='$nip' and start_date='$start_date' and end_date='$end_date'");
                $jumlah_data2 = mysqli_num_rows($rs2);            
                if($jumlah_data2==0){  
                    $sql = "insert into r_diklat_penjenjangan";
                    $sql .= "(nip,start_date,end_date,jenis_diklat,kode_diklat,judul_diklat,udiklat,kode_profesi,level_profesiensi,grade_nilai,nilai,keterangan_lulus,keterangan_penyelesaian,kode_sertifikat,tgl_terbit,tgl_selesai,kode_transaksi)";    
                    $sql .= " values('$nip','$start_date','$end_date','$jenis_diklat','$kode_diklat','$judul_diklat','$udiklat','$kode_profesi','$level_profesiensi','$grade_nilai','$nilai','$keterangan_lulus','$keterangan_penyelesaian','$kode_sertifikat','$tgl_terbit','$tgl_selesai','$kode_transaksi')";
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
                    if($jenis_diklat!=""){
                        if($sql==""){
                            $sql .= "set jenis_diklat='$jenis_diklat'";
                        } else {
                            $sql .= ",jenis_diklat='$jenis_diklat'";
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
                    if($kode_profesi!=""){
                        if($sql==""){
                            $sql .= "set kode_profesi='$kode_profesi'";
                        } else {
                            $sql .= ",kode_profesi='$kode_profesi'";
                        }                    
                    }
                    if($level_profesiensi!=""){
                        if($sql==""){
                            $sql .= "set level_profesiensi='$level_profesiensi'";
                        } else {
                            $sql .= ",level_profesiensi='$level_profesiensi'";
                        }                    
                    }
                    if($grade_nilai!=""){
                        if($sql==""){
                            $sql .= "set grade_nilai='$grade_nilai'";
                        } else {
                            $sql .= ",grade_nilai='$grade_nilai'";
                        }                    
                    }
                    if($nilai!=""){
                        if($sql==""){
                            $sql .= "set nilai='$nilai'";
                        } else {
                            $sql .= ",nilai='$nilai'";
                        }                    
                    }
                    if($keterangan_lulus!=""){
                        if($sql==""){
                            $sql .= "set keterangan_lulus='$keterangan_lulus'";
                        } else {
                            $sql .= ",keterangan_lulus='$keterangan_lulus'";
                        }                    
                    }
                    if($keterangan_penyelesaian!=""){
                        if($sql==""){
                            $sql .= "set keterangan_penyelesaian='$keterangan_penyelesaian'";
                        } else {
                            $sql .= ",keterangan_penyelesaian='$keterangan_penyelesaian'";
                        }                    
                    }
                    if($kode_sertifikat!=""){
                        if($sql==""){
                            $sql .= "set kode_sertifikat='$kode_sertifikat'";
                        } else {
                            $sql .= ",kode_sertifikat='$kode_sertifikat'";
                        }                    
                    }
                    if($tgl_terbit!=""){
                        if($sql==""){
                            $sql .= "set tgl_terbit='$tgl_terbit'";
                        } else {
                            $sql .= ",tgl_terbit='$tgl_terbit'";
                        }                    
                    }
                    if($tgl_selesai!=""){
                        if($sql==""){
                            $sql .= "set tgl_selesai='$tgl_selesai'";
                        } else {
                            $sql .= ",tgl_selesai='$tgl_selesai'";
                        }                    
                    }
                    if($kode_transaksi!=""){
                        if($sql==""){
                            $sql .= "set kode_transaksi='$kode_transaksi'";
                        } else {
                            $sql .= ",kode_transaksi='$kode_transaksi'";
                        }                    
                    }
                    if($sql!=""){
                        $sql2 = "update r_diklatp ";
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