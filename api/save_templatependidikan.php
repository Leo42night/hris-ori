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
    if(isset($_FILES['file_templatependidikan'])){
        if(is_uploaded_file($_FILES['file_templatependidikan']['tmp_name'])){
            $uploadFile = $_FILES['file_templatependidikan'];                 
            $ambilExt = explode(".", $uploadFile['name']);
            $fileExt = end($ambilExt);
            $nama_file = reset($ambilExt);
            
            if(strtolower($fileExt)!="xls" && strtolower($fileExt)!="xlsx"){
                echo 'Format file yang di izinkan hanya excel';
                exit;
            }
            $nama_file2 = $userhris."-pendidikan-".date('YmdHis').".$fileExt";
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
            $keterangan_pendidikan = trim($value[3]);
            $kode_pendidikan = trim($value[4]);
            $jurusan = trim($value[5]);
            $nama_institusi = trim($value[6]);
            $kota_institusi = trim($value[7]);
            $kota_institusi_lainnya = trim($value[8]);
            $negara_institusi = trim($value[9]);
            $lama_pendidikan = trim($value[10]);
            $satuan_lama_pendidikan = trim($value[11]);
            $nilai = trim($value[12]);
            $kode_transaksi = trim($value[13]);

            $start_date = TanggalIndo2($start_date2);
            $end_date = TanggalIndo2($end_date2);

            if($nip!==""){
                $rs2 = mysqli_query($koneksi,"select * from r_pendidikan where nip='$nip' and start_date='$start_date' and end_date='$end_date'");
                $jumlah_data2 = mysqli_num_rows($rs2);            
                if($jumlah_data2==0){  
                    $sql = "insert into r_pendidikan";
                    $sql .= "(nip,start_date,end_date,keterangan_pendidikan,kode_pendidikan,jurusan,nama_institusi,kota_institusi,kota_institusi_lainnya,negara_institusi,lama_pendidikan,satuan_lama_pendidikan,nilai,kode_transaksi,status_edit,tgl_edit,user_edit)";
                    $sql .= " values('$nip','$start_date','$end_date','$keterangan_pendidikan','$kode_pendidikan','$jurusan','$nama_institusi','$kota_institusi','$kota_institusi_lainnya','$negara_institusi','$lama_pendidikan','$satuan_lama_pendidikan','$nilai','$kode_transaksi','1','$hari_ini','$userhris')";
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
                    if($keterangan_pendidikan!=""){
                        if($sql==""){
                            $sql .= "set keterangan_pendidikan='$keterangan_pendidikan'";
                        } else {
                            $sql .= ",keterangan_pendidikan='$keterangan_pendidikan'";
                        }                    
                    }
                    if($kode_pendidikan!=""){
                        if($sql==""){
                            $sql .= "set kode_pendidikan='$kode_pendidikan'";
                        } else {
                            $sql .= ",kode_pendidikan='$kode_pendidikan'";
                        }                    
                    }
                    if($judul_kursus!=""){
                        if($sql==""){
                            $sql .= "set judul_kursus='$judul_kursus'";
                        } else {
                            $sql .= ",judul_kursus='$judul_kursus'";
                        }                    
                    }
                    if($jurusan!=""){
                        if($sql==""){
                            $sql .= "set jurusan='$jurusan'";
                        } else {
                            $sql .= ",jurusan='$jurusan'";  
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
                    if($negara_institusi!=""){
                        if($sql==""){
                            $sql .= "set negara_institusi='$negara_institusi'";
                        } else {
                            $sql .= ",negara_institusi='$negara_institusi'";
                        }                    
                    }
                    if($lama_pendidikan!=""){
                        if($sql==""){
                            $sql .= "set lama_pendidikan='$lama_pendidikan'";
                        } else {
                            $sql .= ",lama_pendidikan='$lama_pendidikan'";
                        }                    
                    }
                    if($satuan_lama_pendidikan!=""){
                        if($sql==""){
                            $sql .= "set satuan_lama_pendidikan='$satuan_lama_pendidikan'";
                        } else {
                            $sql .= ",satuan_lama_pendidikan='$satuan_lama_pendidikan'";
                        }                    
                    }
                    if($nilai!=""){
                        if($sql==""){
                            $sql .= "set nilai='$nilai'";
                        } else {
                            $sql .= ",nilai='$nilai'";
                        }                    
                    }
                    if($sql!=""){
                        $sql2 = "update r_pendidikan ";
                        $sql2 .= $sql;
                        $sql2 .= " where nip='$nip'"; 
                        $result = @mysqli_query($koneksi,$sql2);
                        if($result){
                            $status_perubahan = mysqli_affected_rows($koneksi);
                            if($status_perubahan>0){
                                $sql2 = "update r_pendidikan set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
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