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
    if(isset($_FILES['file_templatejabatan'])){
        if(is_uploaded_file($_FILES['file_templatejabatan']['tmp_name'])){
            $uploadFile = $_FILES['file_templatejabatan'];                 
            $ambilExt = explode(".", $uploadFile['name']);
            $fileExt = end($ambilExt);
            $nama_file = reset($ambilExt);
            
            if(strtolower($fileExt)!="xls" && strtolower($fileExt)!="xlsx"){
                echo 'Format file yang di izinkan hanya excel';
                exit;
            }
            $nama_file2 = $userhris."-jabatan-".date('YmdHis').".$fileExt";
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
            $ee_group = trim($value[3]);
            $ee_subgroup = trim($value[4]);
            $job_key = trim($value[5]);
            $jabatan = trim($value[6]);
            $kota_organisasi = trim($value[7]);
            $jenis_jabatan = trim($value[8]);
            $jenjang_jabatan = trim($value[9]);
            $kode_profesi = trim($value[10]);
            $nama_profesi = trim($value[11]);
            $jenis_unit = trim($value[12]);
            $kelas_unit = trim($value[13]);
            $kode_daerah = trim($value[14]);
            $stream_business = trim($value[15]);
            $achievements = trim($value[16]);
            $tupoksi = trim($value[17]);        
            $company_code = trim($value[18]);        
            $business_area = trim($value[19]);        
            $personal_area = trim($value[20]);        
            $personal_sub_area = trim($value[21]);        
            $level_organisasi1 = trim($value[22]);        
            $level_organisasi2 = trim($value[23]);        
            $level_organisasi3 = trim($value[24]);        
            $level_organisasi4 = trim($value[25]);        
            $level_organisasi5 = trim($value[26]);        
            $level_organisasi6 = trim($value[27]);        
            $level_organisasi7 = trim($value[28]);        
            $level_organisasi8 = trim($value[29]);        
            $level_organisasi9 = trim($value[30]);        
            $level_organisasi10 = trim($value[31]);        
            $level_organisasi11 = trim($value[32]);        
            $level_organisasi12 = trim($value[33]);        
            $level_organisasi13 = trim($value[34]);        
            $level_organisasi14 = trim($value[35]);        
            $level_organisasi15 = trim($value[36]);        
            $tingkat_pengalaman = trim($value[37]);        
            $jenis_jabatan_ap = trim($value[38]);        
            $jenjang_jabatan_ap = trim($value[39]);        
            $kode_posisi = trim($value[40]);        

            $start_date = TanggalIndo2($start_date2);
            $end_date = TanggalIndo2($end_date2);

            if($nip!==""){
                $rs2 = mysqli_query($koneksi,"select * from r_jabatan where nip='$nip' and start_date='$start_date' and end_date='$end_date'");
                $jumlah_data2 = mysqli_num_rows($rs2);            
                if($jumlah_data2==0){ 
                    $sql = "insert into r_jabatan";
                    $sql .= "(nip,start_date,end_date,ee_group,ee_subgroup,job_key,jabatan,kota_organisasi,jenis_jabatan,jenjang_jabatan,kode_profesi,nama_profesi,jenis_unit,kelas_unit,kode_daerah,stream_business,achievements,tupoksi,company_code,business_area,personal_area,personal_sub_area,level_organisasi1,level_organisasi2,level_organisasi3,level_organisasi4,level_organisasi5,level_organisasi6,level_organisasi7,level_organisasi8,level_organisasi9,level_organisasi10,level_organisasi11,level_organisasi12,level_organisasi13,level_organisasi14,level_organisasi15,tingkat_pengalaman,jenis_jabatan_ap,jenjang_jabatan_ap,kode_posisi,status_edit,tgl_edit,user_edit)";    
                    $sql .= " values('$nip','$start_date','$end_date','$ee_group','$ee_subgroup','$job_key','$jabatan','$kota_organisasi','$jenis_jabatan','$jenjang_jabatan','$kode_profesi','$nama_profesi','$jenis_unit','$kelas_unit','$kode_daerah','$stream_business','$achievements','$tupoksi','$company_code','$business_area','$personal_area','$personal_sub_area','$level_organisasi1','$level_organisasi2','$level_organisasi3','$level_organisasi4','$level_organisasi5','$level_organisasi6','$level_organisasi7','$level_organisasi8','$level_organisasi9','$level_organisasi10','$level_organisasi11','$level_organisasi12','$level_organisasi13','$level_organisasi14','$level_organisasi15','$tingkat_pengalaman','$jenis_jabatan_ap','$jenjang_jabatan_ap','$kode_posisi','1','$hari_ini','$userhris')";
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
                    if($id_ee_group!=""){
                        if($sql==""){
                            $sql .= "set id_ee_group='$id_ee_group'";
                        } else {
                            $sql .= ",id_ee_group='$id_ee_group'";
                        }                    
                    }
                    if($ee_subgroup!=""){
                        if($sql==""){
                            $sql .= "set ee_subgroup='$ee_subgroup'";
                        } else {
                            $sql .= ",ee_subgroup='$ee_subgroup'";
                        }                    
                    }
                    if($job_key!=""){
                        if($sql==""){
                            $sql .= "set job_key='$job_key'";
                        } else {
                            $sql .= ",job_key='$job_key'";
                        }                    
                    }
                    if($jabatan!=""){
                        if($sql==""){
                            $sql .= "set jabatan='$jabatan'";
                        } else {
                            $sql .= ",jabatan='$jabatan'";  
                        }                    
                    }
                    if($organisasi!=""){
                        if($sql==""){
                            $sql .= "set organisasi='$organisasi'";
                        } else {
                            $sql .= ",organisasi='$organisasi'";  
                        }                    
                    }
                    if($id_kabupaten!=""){
                        if($sql==""){
                            $sql .= "set id_kabupaten='$id_kabupaten'";
                        } else {
                            $sql .= ",id_kabupaten='$id_kabupaten'";  
                        }                    
                    }
                    if($jenis_jabatan!=""){
                        if($sql==""){
                            $sql .= "set jenis_jabatan='$jenis_jabatan'";
                        } else {
                            $sql .= ",jenis_jabatan='$jenis_jabatan'";  
                        }                    
                    }
                    if($jenjang_jabatan!=""){
                        if($sql==""){
                            $sql .= "set jenjang_jabatan='$jenjang_jabatan'";
                        } else {
                            $sql .= ",jenjang_jabatan='$jenjang_jabatan'";  
                        }                    
                    }
                    if($kode_profesi!=""){
                        if($sql==""){
                            $sql .= "set kode_profesi='$kode_profesi'";
                        } else {
                            $sql .= ",kode_profesi='$kode_profesi'";  
                        }                    
                    }
                    if($nama_profesi!=""){
                        if($sql==""){
                            $sql .= "set nama_profesi='$nama_profesi'";
                        } else {
                            $sql .= ",nama_profesi='$nama_profesi'";  
                        }                    
                    }
                    if($jenis_unit!=""){
                        if($sql==""){
                            $sql .= "set jenis_unit='$jenis_unit'";
                        } else {
                            $sql .= ",jenis_unit='$jenis_unit'";  
                        }                    
                    }
                    if($kelas_unit!=""){
                        if($sql==""){
                            $sql .= "set kelas_unit='$kelas_unit'";
                        } else {
                            $sql .= ",kelas_unit='$kelas_unit'";  
                        }                    
                    }
                    if($kode_daerah!=""){
                        if($sql==""){
                            $sql .= "set kode_daerah='$kode_daerah'";
                        } else {
                            $sql .= ",kode_daerah='$kode_daerah'";  
                        }                    
                    }
                    if($stream_business!=""){
                        if($sql==""){
                            $sql .= "set stream_business='$stream_business'";
                        } else {
                            $sql .= ",stream_business='$stream_business'";  
                        }                    
                    }
                    if($nip_atasan!=""){
                        if($sql==""){
                            $sql .= "set nip_atasan='$nip_atasan'";
                        } else {
                            $sql .= ",nip_atasan='$nip_atasan'";  
                        }                    
                    }
                    if($jabatan_atasan!=""){
                        if($sql==""){
                            $sql .= "set jabatan_atasan='$jabatan_atasan'";
                        } else {
                            $sql .= ",jabatan_atasan='$jabatan_atasan'";  
                        }                    
                    }
                    if($sql!=""){
                        $sql2 = "update r_jabatan ";
                        $sql2 .= $sql;
                        $sql2 .= " where nip='$nip'"; 
                        $result = @mysqli_query($koneksi,$sql2);
                        if($result){
                            $status_perubahan = mysqli_affected_rows($koneksi);
                            if($status_perubahan>0){
                                $sql2 = "update r_jabatan set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
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