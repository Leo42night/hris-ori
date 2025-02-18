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
    if(isset($_FILES['file_templatediklat'])){
        if(is_uploaded_file($_FILES['file_templatediklat']['tmp_name'])){
            $uploadFile = $_FILES['file_templatediklat'];                 
            $ambilExt = explode(".", $uploadFile['name']);
            $fileExt = end($ambilExt);
            $nama_file = reset($ambilExt);
            
            if(strtolower($fileExt)!="xls" && strtolower($fileExt)!="xlsx"){
                echo 'Format file yang di izinkan hanya excel';
                exit;
            }
            $nama_file2 = $userhris."-diklat-".date('YmdHis').".$fileExt";
            move_uploaded_file($uploadFile['tmp_name'],$uploadDir1.$nama_file2);
        } else {
            $nama_file2 = "";
        }
    } else {
        $nama_file2 = "";
    }
    //$nama_file2 = "sandy-pembicara-20230111190139.xlsx";
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
            $penyelenggaraan = trim($value[6]);
            $kode_profesi = trim($value[7]);
            $level_profesiensi = trim($value[8]);
            $nama_institusi = trim($value[9]);
            $kota_institusi = trim($value[10]);
            $kota_lainnya = trim($value[11]);
            $negara_institusi = trim($value[12]);
            $lama_diklat = trim($value[13]);
            $satuan_diklat = trim($value[14]);
            $nilai = trim($value[15]);
            $grade_nilai = trim($value[16]);
            $jenis_pelaksanaan = trim($value[17]);
            $jenis_sertifikasi = trim($value[18]);
            $sifat_diklat = trim($value[19]);
            $konfirmasi_kehadiran = trim($value[12]);
            $keterangan_lulus = trim($value[21]);
            $kode_sertifikat = trim($value[22]);
            $tgl_terbit2 = trim($value[23]);
            $tgl_selesai2 = trim($value[24]);
            $udiklat = trim($value[25]);
            $keterangan_realisasi = trim($value[26]);
            $keterangan_penyelesaian = trim($value[27]);
            $kode_dahan_profesi = trim($value[28]);
            $dahan_profesi = trim($value[29]);
            $kode_transaksi = trim($value[30]);

            $start_date = TanggalIndo2($start_date2);
            $end_date = TanggalIndo2($end_date2);
            $tgl_terbit = TanggalIndo2($tgl_terbit2);
            $tgl_selesai = TanggalIndo2($tgl_selesai2);

            if($nip!==""){
                $sql = "insert into r_diklat";
                $sql .= "(nip,start_date,end_date,jenis_diklat,kode_diklat,judul_diklat,penyelenggaraan,kode_profesi,level_profesiensi,nama_institusi,kota_institusi,kota_lainnya,negara_institusi,lama_diklat,satuan_diklat,nilai,grade_nilai,jenis_pelaksanaan,jenis_sertifikasi,sifat_diklat,konfirmasi_kehadiran,keterangan_lulus,kode_sertifikat,tgl_terbit,tgl_selesai,udiklat,keterangan_realisasi,keterangan_penyelesaian,kode_dahan_profesi,dahan_profesi,kode_transaksi)";    
                $sql .= " values('$nip','$start_date','$end_date','$jenis_diklat','$kode_diklat','$judul_diklat','$penyelenggaraan','$kode_profesi','$level_profesiensi','$nama_institusi','$kota_institusi','$kota_lainnya','$negara_institusi','$lama_diklat','$satuan_diklat','$nilai','$grade_nilai','$jenis_pelaksanaan','$jenis_sertifikasi','$sifat_diklat','$konfirmasi_kehadiran','$keterangan_lulus','$kode_sertifikat','$tgl_terbit','$tgl_selesai','$udiklat','$keterangan_realisasi','$keterangan_penyelesaian','$kode_dahan_profesi','$dahan_profesi','$kode_transaksi')";
                $result = @mysqli_query($koneksi,$sql);
                if($result){
                    $hitungSukses++;
                } else {
                    $hitungGagal++;
                }
                /*
                $rs2 = mysqli_query($koneksi,"select * from r_diklat where nip='$nip' and start_date='$start_date' and end_date='$end_date'");
                $hasil2 = mysqli_fetch_array($rs2);
                if($hasil2){ 
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
                    if($penyelenggaraan!=""){
                        if($sql==""){
                            $sql .= "set penyelenggaraan='$penyelenggaraan'";
                        } else {
                            $sql .= ",penyelenggaraan='$penyelenggaraan'";
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
                    if($nama_institusi!=""){
                        if($sql==""){
                            $sql .= "set nama_institusi='$nama_institusi'";
                        } else {
                            $sql .= ",nama_institusi='$nama_institusi'";
                        }                    
                    }
                    if($kota_institusi!=""){
                        if($sql==""){
                            $sql .= "set kota_institusi='$kota_institusi'";
                        } else {
                            $sql .= ",kota_institusi='$kota_institusi'";
                        }                    
                    }
                    if($kota_lainnya!=""){
                        if($sql==""){
                            $sql .= "set kota_lainnya='$kota_lainnya'";
                        } else {
                            $sql .= ",kota_lainnya='$kota_lainnya'";
                        }                    
                    }
                    if($negara_institusi!=""){
                        if($sql==""){
                            $sql .= "set negara_institusi='$negara_institusi'";
                        } else {
                            $sql .= ",negara_institusi='$negara_institusi'";
                        }                    
                    }
                    if($lama_diklat!=""){
                        if($sql==""){
                            $sql .= "set lama_diklat='$lama_diklat'";
                        } else {
                            $sql .= ",lama_diklat='$lama_diklat'";
                        }                    
                    }
                    if($satuan_diklat!=""){
                        if($sql==""){
                            $sql .= "set satuan_diklat='$satuan_diklat'";
                        } else {
                            $sql .= ",satuan_diklat='$satuan_diklat'";
                        }                    
                    }
                    if($nilai!=""){
                        if($sql==""){
                            $sql .= "set nilai='$nilai'";
                        } else {
                            $sql .= ",nilai='$nilai'";
                        }                    
                    }
                    if($grade_nilai!=""){
                        if($sql==""){
                            $sql .= "set grade_nilai='$grade_nilai'";
                        } else {
                            $sql .= ",grade_nilai='$grade_nilai'";
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
                    if($konfirmasi_kehadiran!=""){
                        if($sql==""){
                            $sql .= "set konfirmasi_kehadiran='$konfirmasi_kehadiran'";
                        } else {
                            $sql .= ",konfirmasi_kehadiran='$konfirmasi_kehadiran'";
                        }                    
                    }
                    if($keterangan_lulus!=""){
                        if($sql==""){
                            $sql .= "set keterangan_lulus='$keterangan_lulus'";
                        } else {
                            $sql .= ",keterangan_lulus='$keterangan_lulus'";
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
                    if($udiklat!=""){
                        if($sql==""){
                            $sql .= "set udiklat='$udiklat'";
                        } else {
                            $sql .= ",udiklat='$udiklat'";
                        }                    
                    }
                    if($keterangan_realisasi!=""){
                        if($sql==""){
                            $sql .= "set keterangan_realisasi='$keterangan_realisasi'";
                        } else {
                            $sql .= ",keterangan_realisasi='$keterangan_realisasi'";
                        }                    
                    }
                    if($keterangan_penyelesaian!=""){
                        if($sql==""){
                            $sql .= "set keterangan_penyelesaian='$keterangan_penyelesaian'";
                        } else {
                            $sql .= ",keterangan_penyelesaian='$keterangan_penyelesaian'";
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
                    if($kode_transaksi!=""){
                        if($sql==""){
                            $sql .= "set kode_transaksi='$kode_transaksi'";
                        } else {
                            $sql .= ",kode_transaksi='$kode_transaksi'";
                        }                    
                    }
                    if($sql!=""){
                        $sql2 = "update r_diklat ";
                        $sql2 .= $sql;
                        $sql2 .= " where nip='$nip' and start_date='$start_date' and end_date='$end_date'"; 
                        $result = @mysqli_query($koneksi,$sql2);
                        if($result){
                            $hitungSukses++;
                        } else {
                            $hitungGagal++;
                        }
    
                    }                    
                } else {
                    $sql = "insert into r_diklat";
                    $sql .= "(nip,start_date,end_date,jenis_diklat,kode_diklat,judul_diklat,penyelenggaraan,kode_profesi,level_profesiensi,nama_institusi,kota_institusi,kota_lainnya,negara_institusi,lama_diklat,satuan_diklat,nilai_grade_nilai,jenis_pelaksanaan,jenis_sertifikasi,sifat_diklat,konfirmasi_kehadiran,keterangan_lulus,kode_sertifikat,tgl_terbit,tgl_selesai,udiklat,keterangan_realisasi,keterangan_penyelesaian,kode_dahan_profesi,dahan_profesi,kode_transaksi)";    
                    $sql .= " values('$nip','$start_date','$end_date','$jenis_diklat','$kode_diklat','$judul_diklat','$penyelenggaraan','$kode_profesi','$level_profesiensi','$nama_institusi','$kota_institusi','$kota_lainnya','$negara_institusi','$lama_diklat','$satuan_diklat','$nilai_grade_nilai','$jenis_pelaksanaan','$jenis_sertifikasi','$sifat_diklat','$konfirmasi_kehadiran','$keterangan_lulus','$kode_sertifikat','$tgl_terbit','$tgl_selesai','$udiklat','$keterangan_realisasi','$keterangan_penyelesaian','$kode_dahan_profesi','$dahan_profesi','$kode_transaksi')";
                    $result = @mysqli_query($koneksi,$sql);
                    if($result){
                        $hitungSukses++;
                    } else {
                        $hitungGagal++;
                    }
                }
                */
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