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
    if(isset($_FILES['file_templatesertifikat'])){
        if(is_uploaded_file($_FILES['file_templatesertifikat']['tmp_name'])){
            $uploadFile = $_FILES['file_templatesertifikat'];                 
            $ambilExt = explode(".", $uploadFile['name']);
            $fileExt = end($ambilExt);
            $nama_file = reset($ambilExt);
            
            if(strtolower($fileExt)!="xls" && strtolower($fileExt)!="xlsx"){
                echo 'Format file yang di izinkan hanya excel';
                exit;
            }
            $nama_file2 = $userhris."-sertifikat-".date('YmdHis').".$fileExt";
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
            $jenis_lembaga = trim($value[3]);
            $judul_sertifikasi = trim($value[4]);
            $no_sertifikasi = trim($value[5]);
            $kode_profesi_sertifikasi = trim($value[6]);
            $profesi_sertifikasi = trim($value[7]);
            $level_profesiensi = trim($value[8]);
            $nama_institusi = trim($value[9]);
            $kota_institusi = trim($value[10]);
            $kota_institusi_sertifikasi = trim($value[11]);
            $negara_institusi = trim($value[12]);
            $tgl_mulai2 = trim($value[13]);
            $tgl_selesai2 = trim($value[14]);
            $nilai_sertifikasi = trim($value[15]);
            $level_sertifikasi = trim($value[16]);
            $lama_sertifikasi = trim($value[17]);
            $satuan_sertifikasi = trim($value[18]);
            $tgl_expire2 = trim($value[19]);
            $kode_transaksi = trim($value[20]);

            $start_date = TanggalIndo2($start_date2);
            $end_date = TanggalIndo2($end_date2);
            $tgl_mulai = TanggalIndo2($tgl_mulai2);
            $tgl_selesai = TanggalIndo2($tgl_selesai2);
            $tgl_expire = TanggalIndo2($tgl_expire2);

            if($nip!==""){
                $rs2 = mysqli_query($koneksi,"select * from r_sertifikat where nip='$nip' and start_date='$start_date' and end_date='$end_date'");
                $jumlah_data2 = mysqli_num_rows($rs2);            
                if($jumlah_data2==0){ 
                    $sql = "insert into r_sertifikat";
                    $sql .= "(nip,start_date,end_date,jenis_lembaga,judul_sertifikasi,no_sertifikasi,kode_profesi_sertifikasi,profesi_sertifikasi,level_profesiensi,nama_institusi,kota_institusi,kota_institusi_sertifikasi,negara_institusi,tgl_mulai,tgl_selesai,nilai_sertifikasi,level_sertifikasi,lama_sertifikasi,satuan_sertifikasi,tgl_expire,kode_transaksi,status_edit,tgl_edit,user_edit)";    
                    $sql .= " values('$nip','$start_date','$end_date','$jenis_lembaga','$judul_sertifikasi','$no_sertifikasi','$kode_profesi_sertifikasi','$profesi_sertifikasi','$level_profesiensi','$nama_institusi','$kota_institusi','$kota_institusi_sertifikasi','$negara_institusi','$tgl_mulai','$tgl_selesai','$nilai_sertifikasi','$level_sertifikasi','$lama_sertifikasi','$satuan_sertifikasi','$tgl_expire','$kode_transaksi','1','$hari_ini','$userhris')";
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
                    if($jenis_lembaga!=""){
                        if($sql==""){
                            $sql .= "set jenis_lembaga='$jenis_lembaga'";
                        } else {
                            $sql .= ",jenis_lembaga='$jenis_lembaga'";
                        }                    
                    }
                    if($judul_sertifikasi!=""){
                        if($sql==""){
                            $sql .= "set judul_sertifikasi='$judul_sertifikasi'";
                        } else {
                            $sql .= ",judul_sertifikasi='$judul_sertifikasi'";
                        }                    
                    }
                    if($no_sertifikasi!=""){
                        if($sql==""){
                            $sql .= "set no_sertifikasi='$no_sertifikasi'";
                        } else {
                            $sql .= ",no_sertifikasi='$no_sertifikasi'";
                        }                    
                    }
                    if($kode_profesi_sertifikasi!=""){
                        if($sql==""){
                            $sql .= "set kode_profesi_sertifikasi='$kode_profesi_sertifikasi'";
                        } else {
                            $sql .= ",kode_profesi_sertifikasi='$kode_profesi_sertifikasi'";
                        }                    
                    }
                    if($profesi_sertifikasi!=""){
                        if($sql==""){
                            $sql .= "set profesi_sertifikasi='$profesi_sertifikasi'";
                        } else {
                            $sql .= ",profesi_sertifikasi='$profesi_sertifikasi'";
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
                    if($kota_institusi_sertifikasi!=""){
                        if($sql==""){
                            $sql .= "set kota_institusi_sertifikasi='$kota_institusi_sertifikasi'";
                        } else {
                            $sql .= ",kota_institusi_sertifikasi='$kota_institusi_sertifikasi'";
                        }                    
                    }
                    if($negara_institusi!=""){
                        if($sql==""){
                            $sql .= "set negara_institusi='$negara_institusi'";
                        } else {
                            $sql .= ",negara_institusi='$negara_institusi'";
                        }                    
                    }
                    if($tgl_mulai!=""){
                        if($sql==""){
                            $sql .= "set tgl_mulai='$tgl_mulai'";
                        } else {
                            $sql .= ",tgl_mulai='$tgl_mulai'";
                        }                    
                    }
                    if($tgl_selesai!=""){
                        if($sql==""){
                            $sql .= "set tgl_selesai='$tgl_selesai'";
                        } else {
                            $sql .= ",tgl_selesai='$tgl_selesai'";
                        }                    
                    }
                    if($nilai_sertifikasi!=""){
                        if($sql==""){
                            $sql .= "set nilai_sertifikasi='$nilai_sertifikasi'";
                        } else {
                            $sql .= ",nilai_sertifikasi='$nilai_sertifikasi'";
                        }                    
                    }
                    if($level_sertifikasi!=""){
                        if($sql==""){
                            $sql .= "set level_sertifikasi='$level_sertifikasi'";
                        } else {
                            $sql .= ",level_sertifikasi='$level_sertifikasi'";
                        }                    
                    }
                    if($lama_sertifikasi!=""){
                        if($sql==""){
                            $sql .= "set lama_sertifikasi='$lama_sertifikasi'";
                        } else {
                            $sql .= ",lama_sertifikasi='$lama_sertifikasi'";
                        }                    
                    }
                    if($satuan_sertifikasi!=""){
                        if($sql==""){
                            $sql .= "set satuan_sertifikasi='$satuan_sertifikasi'";
                        } else {
                            $sql .= ",satuan_sertifikasi='$satuan_sertifikasi'";
                        }                    
                    }
                    if($tgl_expire!=""){
                        if($sql==""){
                            $sql .= "set tgl_expire='$tgl_expire'";
                        } else {
                            $sql .= ",tgl_expire='$tgl_expire'";
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
                        $sql2 = "update r_sertifikat ";
                        $sql2 .= $sql;
                        $sql2 .= " where nip='$nip'"; 
                        $result = @mysqli_query($koneksi,$sql2);
                        if($result){
                            $status_perubahan = mysqli_affected_rows($koneksi);
                            if($status_perubahan>0){
                                $sql2 = "update r_sertifikat set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where nip='$nip'";
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