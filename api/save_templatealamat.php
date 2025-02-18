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
    if(isset($_FILES['file_templatealamat'])){
        if(is_uploaded_file($_FILES['file_templatealamat']['tmp_name'])){
            $uploadFile = $_FILES['file_templatealamat'];                 
            $ambilExt = explode(".", $uploadFile['name']);
            $fileExt = end($ambilExt);
            $nama_file = reset($ambilExt);
            
            if(strtolower($fileExt)!="xls" && strtolower($fileExt)!="xlsx"){
                echo 'Format file yang di izinkan hanya excel';
                exit;
            }
            $nama_file2 = $userhris."-alamat-".date('YmdHis').".$fileExt";
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
            $jenis_alamat = trim($value[3]);
            $rumah_atas_nama = trim($value[4]);
            $alamat_lengkap = trim($value[5]);
            $id_provinsi = trim($value[6]);
            $id_kabupaten = trim($value[7]);
            $kode_pos = trim($value[8]);
            $negara = trim($value[9]);
            $jarak = trim($value[10]);

            $start_date = TanggalIndo2($start_date2);
            $end_date = TanggalIndo2($end_date2);

            if($nip!==""){
                $rs2 = mysqli_query($koneksi,"select * from r_alamat where nip='$nip' and jenis_alamat='$jenis_alamat'");
                $jumlah_data2 = mysqli_num_rows($rs2);            
                if($jumlah_data2==0){  
                    $sql = "insert into r_alamat";
                    $sql .= "(nip,start_date,end_date,jenis_alamat,rumah_atas_nama,alamat_lengkap,id_provinsi,id_kabupaten,kode_pos,negara,jarak,status_edit,tgl_edit,user_edit)";
                    $sql .= " values('$nip','$start_date','$end_date','$jenis_alamat','$rumah_atas_nama','$alamat_lengkap','$id_provinsi','$id_kabupaten','$kode_pos','$negara','$jarak','$jarak','1','$hari_ini','$userhris')";
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
                    if($jenis_alamat!=""){
                        if($sql==""){
                            $sql .= "set jenis_alamat='$jenis_alamat'";
                        } else {
                            $sql .= ",jenis_alamat='$jenis_alamat'";
                        }                    
                    }
                    if($rumah_atas_nama!=""){
                        if($sql==""){
                            $sql .= "set rumah_atas_nama='$rumah_atas_nama'";
                        } else {
                            $sql .= ",rumah_atas_nama='$rumah_atas_nama'";
                        }                    
                    }
                    if($alamat_lengkap!=""){
                        if($sql==""){
                            $sql .= "set alamat_lengkap='$alamat_lengkap'";
                        } else {
                            $sql .= ",alamat_lengkap='$alamat_lengkap'";
                        }                    
                    }
                    if($id_provinsi!=""){
                        if($sql==""){
                            $sql .= "set id_provinsi='$id_provinsi'";
                        } else {
                            $sql .= ",id_provinsi='$id_provinsi'";  
                        }                    
                    }
                    if($id_kabupaten!=""){
                        if($sql==""){
                            $sql .= "set id_kabupaten='$id_kabupaten'";
                        } else {
                            $sql .= ",id_kabupaten='$id_kabupaten'";
                        }                    
                    }
                    if($kode_pos!=""){
                        if($sql==""){
                            $sql .= "set kode_pos='$kode_pos'";
                        } else {
                            $sql .= ",kode_pos='$kode_pos'";
                        }                    
                    }
                    if($negara!=""){
                        if($sql==""){
                            $sql .= "set negara='$negara'";
                        } else {
                            $sql .= ",negara='$negara'";
                        }                    
                    }
                    if($jarak!=""){
                        if($sql==""){
                            $sql .= "set jarak='$jarak'";
                        } else {
                            $sql .= ",jarak='$jarak'";
                        }                    
                    }
                    if($sql!=""){
                        $sql2 = "update r_alamat ";
                        $sql2 .= $sql;
                        $sql2 .= " where nip='$nip'"; 
                        $result = @mysqli_query($koneksi,$sql2);
                        if($result){
                            $status_perubahan = mysqli_affected_rows($koneksi);
                            if($status_perubahan>0){
                                $sql2 = "update r_alamat set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
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