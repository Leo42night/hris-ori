<?php
//error_reporting(0);
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/vendor/autoload.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
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
    if(isset($_FILES['file_templatepeg'])){
        if(is_uploaded_file($_FILES['file_templatepeg']['tmp_name'])){
            $uploadFile = $_FILES['file_templatepeg'];                 
            $ambilExt = explode(".", $uploadFile['name']);
            $fileExt = end($ambilExt);
            $nama_file = reset($ambilExt);
            
            if(strtolower($fileExt)!="xls" && strtolower($fileExt)!="xlsx"){
                echo 'Format file yang di izinkan hanya excel';
                exit;
            }
            $nama_file2 = $userhris."-peg-".date('YmdHis').".$fileExt";
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
            $tgl_masuk2 = trim($value[3]);
            $tgl_capeg2 = trim($value[4]);
            $tgl_tetap2 = trim($value[5]);
            $title = trim($value[6]);
            $nama_lengkap = trim($value[7]);
            $gelar_depan = trim($value[8]);
            $gelar_belakang = trim($value[9]);
            $know_as = trim($value[10]);
            $tempat_lahir = trim($value[11]);
            $tgl_lahir2 = trim($value[12]);
            $kode_negara = trim($value[13]);
            $jenis_kelamin = trim($value[14]);
            $id_agama = trim($value[15]);
            $status_nikah = trim($value[16]);
            $tgl_nikah2 = trim($value[17]);
            $status_warganegara = trim($value[18]);
            $gol_darah = trim($value[19]);
            $suku = trim($value[20]);
            $telepon_utama = trim($value[21]);
            $telepon_cadangan1 = trim($value[22]);
            $telepon_cadangan2 = trim($value[23]);
            $telepon_cadangan3 = trim($value[24]);
            $telepon_darurat = trim($value[25]);
            $jenis_dplk = trim($value[26]);
            $id_dplk = trim($value[27]);
            $bank_dplk = trim($value[28]);
            $no_bpjs_kes = trim($value[29]);
            $no_bpjs_tk = trim($value[30]);
            $bank_payroll = trim($value[31]);
            $an_payroll = trim($value[32]);
            $no_rek_payroll = trim($value[33]);
            $status_integrasi = trim($value[34]);

            $start_date = TanggalIndo2($start_date2);
            $end_date = TanggalIndo2($end_date2);
            $tgl_masuk = TanggalIndo2($tgl_masuk2);
            $tgl_capeg = TanggalIndo2($tgl_capeg2);
            $tgl_tetap = TanggalIndo2($tgl_tetap2);
            $tgl_lahir = TanggalIndo2($tgl_lahir2);
            $tgl_nikah = TanggalIndo2($tgl_nikah2); 

            if($nip!==""){
                $rs2 = mysqli_query($koneksi,"select * from data_pegawai where nip='$nip'");
                $jumlah_data2 = mysqli_num_rows($rs2);            
                if($jumlah_data2==0){                    
                    $sql = "insert into data_pegawai";
                    $sql .= "(nip,start_date,end_date,tgl_masuk,tgl_capeg,tgl_tetap,title,nama_lengkap,gelar_depan,gelar_belakang,know_as,tempat_lahir,tgl_lahir,kode_negara,jenis_kelamin,id_agama,status_nikah,tgl_nikah,status_warganegara,gol_darah,suku,telepon_utama,telepon_cadangan1,telepon_cadangan2,telepon_cadangan3,telepon_darurat,jenis_dplk,id_dplk,bank_dplk,no_bpjs_kes,no_bpjs_tk,bank_payroll,an_payroll,no_rek_payroll,status_integrasi,status_edit,tgl_edit,user_edit)";
                    $sql .= " values('$nip','$start_date','$end_date','$tgl_masuk','$tgl_capeg','$tgl_tetap','$title','$nama_lengkap','$gelar_depan','$gelar_belakang','$know_as','$tempat_lahir','$tgl_lahir','$kode_negara','$jenis_kelamin','$id_agama','$status_nikah','$tgl_nikah','$status_warganegara','$gol_darah','$suku','$telepon_utama','$telepon_cadangan1','$telepon_cadangan2','$telepon_cadangan3','$telepon_darurat','$jenis_dplk','$id_dplk','$bank_dplk','$no_bpjs_kes','$no_bpjs_tk','$bank_payroll','$an_payroll','$no_rek_payroll','$status_integrasi','1','$hari_ini','$userhris')";
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
                    if($tgl_masuk!=""){
                        if($sql==""){
                            $sql .= "set tgl_masuk='$tgl_masuk'";
                        } else {
                            $sql .= ",tgl_masuk='$tgl_masuk'";
                        }                    
                    }
                    if($tgl_capeg!=""){
                        if($sql==""){
                            $sql .= "set tgl_capeg='$tgl_capeg'";
                        } else {
                            $sql .= ",tgl_capeg='$tgl_capeg'";
                        }                    
                    }
                    if($tgl_tetap!=""){
                        if($sql==""){
                            $sql .= "set tgl_tetap='$tgl_tetap'";
                        } else {
                            $sql .= ",tgl_tetap='$tgl_tetap'";
                        }                    
                    }
                    if($title!=""){
                        if($sql==""){
                            $sql .= "set title='$title'";
                        } else {
                            $sql .= ",title='$title'";  
                        }                    
                    }
                    if($nama_lengkap!=""){
                        if($sql==""){
                            $sql .= "set nama_lengkap='$nama_lengkap'";
                        } else {
                            $sql .= ",nama_lengkap='$nama_lengkap'";
                        }                    
                    }
                    if($gelar_depan!=""){
                        if($sql==""){
                            $sql .= "set gelar_depan='$gelar_depan'";
                        } else {
                            $sql .= ",gelar_depan='$gelar_depan'";
                        }                    
                    }
                    if($gelar_belakang!=""){
                        if($sql==""){
                            $sql .= "set gelar_belakang='$gelar_belakang'";
                        } else {
                            $sql .= ",gelar_belakang='$gelar_belakang'";
                        }                    
                    }
                    if($know_as!=""){
                        if($sql==""){
                            $sql .= "set know_as='$know_as'";
                        } else {
                            $sql .= ",know_as='$know_as'";
                        }                    
                    }
                    if($tempat_lahir!=""){
                        if($sql==""){
                            $sql .= "set tempat_lahir='$tempat_lahir'";
                        } else {
                            $sql .= ",tempat_lahir='$tempat_lahir'";
                        }                    
                    }
                    if($tgl_lahir!=""){
                        if($sql==""){
                            $sql .= "set tgl_lahir='$tgl_lahir'";
                        } else {
                            $sql .= ",tgl_lahir='$tgl_lahir'";
                        }                    
                    }
                    if($kode_negara!=""){
                        if($sql==""){
                            $sql .= "set kode_negara='$kode_negara'";
                        } else {
                            $sql .= ",kode_negara='$kode_negara'";
                        }                    
                    }
                    if($jenis_kelamin!=""){
                        if($sql==""){
                            $sql .= "set jenis_kelamin='$jenis_kelamin'";
                        } else {
                            $sql .= ",jenis_kelamin='$jenis_kelamin'";
                        }                    
                    }
                    if($id_agama!=""){
                        if($sql==""){
                            $sql .= "set id_agama='$id_agama'";
                        } else {
                            $sql .= ",id_agama='$id_agama'";
                        }                    
                    }
                    if($status_nikah!=""){
                        if($sql==""){
                            $sql .= "set status_nikah='$status_nikah'";
                        } else {
                            $sql .= ",status_nikah='$status_nikah'";
                        }                    
                    }
                    if($tgl_nikah!=""){
                        if($sql==""){
                            $sql .= "set tgl_nikah='$tgl_nikah'";
                        } else {
                            $sql .= ",tgl_nikah='$tgl_nikah'";
                        }                    
                    }
                    if($status_warganegara!=""){
                        if($sql==""){
                            $sql .= "set status_warganegara='$status_warganegara'";
                        } else {
                            $sql .= ",status_warganegara='$status_warganegara'";
                        }                    
                    }
                    if($gol_darah!=""){
                        if($sql==""){
                            $sql .= "set gol_darah='$gol_darah'";
                        } else {
                            $sql .= ",gol_darah='$gol_darah'";
                        }                    
                    }
                    if($suku!=""){
                        if($sql==""){
                            $sql .= "set suku='$suku'";
                        } else {
                            $sql .= ",suku='$suku'";    
                        }                    
                    }
                    if($telepon_utama!=""){
                        if($sql==""){
                            $sql .= "set telepon_utama='$telepon_utama'";
                        } else {
                            $sql .= ",telepon_utama='$telepon_utama'";
                        }                    
                    }
                    if($telepon_cadangan1!=""){
                        if($sql==""){
                            $sql .= "set telepon_cadangan1='$telepon_cadangan1'";
                        } else {
                            $sql .= ",telepon_cadangan1='$telepon_cadangan1'";
                        }                    
                    }
                    if($telepon_cadangan2!=""){
                        if($sql==""){
                            $sql .= "set telepon_cadangan2='$telepon_cadangan2'";
                        } else {
                            $sql .= ",telepon_cadangan2='$telepon_cadangan2'";
                        }
                    }
                    if($telepon_cadangan3!=""){
                        if($sql==""){
                            $sql .= "set telepon_cadangan3='$telepon_cadangan3'";
                        } else {
                            $sql .= ",telepon_cadangan3='$telepon_cadangan3'";
                        }
                    }
                    if($telepon_darurat!=""){
                        if($sql==""){
                            $sql .= "set telepon_darurat='$telepon_darurat'";
                        } else {
                            $sql .= ",telepon_darurat='$telepon_darurat'";
                        }
                    }
                    if($jenis_dplk!=""){
                        if($sql==""){
                            $sql .= "set jenis_dplk='$jenis_dplk'";
                        } else {
                            $sql .= ",jenis_dplk='$jenis_dplk'";
                        }
                    }
                    if($id_dplk!=""){
                        if($sql==""){
                            $sql .= "set id_dplk='$id_dplk'";
                        } else {
                            $sql .= ",id_dplk='$id_dplk'";
                        }
                    }
                    if($bank_dplk!=""){
                        if($sql==""){
                            $sql .= "set bank_dplk='$bank_dplk'";
                        } else {
                            $sql .= ",bank_dplk='$bank_dplk'";
                        }
                    }
                    if($no_bpjs_kes!=""){
                        if($sql==""){
                            $sql .= "set no_bpjs_kes='$no_bpjs_kes'";
                        } else {
                            $sql .= ",no_bpjs_kes='$no_bpjs_kes'";
                        }
                    }
                    if($no_bpjs_tk!=""){
                        if($sql==""){
                            $sql .= "set no_bpjs_tk='$no_bpjs_tk'";
                        } else {
                            $sql .= ",no_bpjs_tk='$no_bpjs_tk'";
                        }
                    }
                    if($bank_payroll!=""){
                        if($sql==""){
                            $sql .= "set bank_payroll='$bank_payroll'";
                        } else {
                            $sql .= ",bank_payroll='$bank_payroll'";
                        }
                    }
                    if($an_payroll!=""){
                        if($sql==""){
                            $sql .= "set an_payroll='$an_payroll'";
                        } else {
                            $sql .= ",an_payroll='$an_payroll'";
                        }
                    }
                    if($no_rek_payroll!=""){
                        if($sql==""){
                            $sql .= "set no_rek_payroll='$no_rek_payroll'";
                        } else {
                            $sql .= ",no_rek_payroll='$no_rek_payroll'";
                        }
                    }
                    if($sql!=""){
                        $sql2 = "update data_pegawai ";
                        $sql2 .= $sql;
                        $sql2 .= " where nip='$nip'"; 
                        $result = @mysqli_query($koneksi,$sql2);
                        if($result){
                            $status_perubahan = mysqli_affected_rows($koneksi);
                            if($status_perubahan>0){
                                $sql2 = "update data_pegawai set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
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