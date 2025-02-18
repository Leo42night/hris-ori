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
    if(isset($_FILES['file_templateaward'])){
        if(is_uploaded_file($_FILES['file_templateaward']['tmp_name'])){
            $uploadFile = $_FILES['file_templateaward'];                 
            $ambilExt = explode(".", $uploadFile['name']);
            $fileExt = end($ambilExt);
            $nama_file = reset($ambilExt);
            
            if(strtolower($fileExt)!="xls" && strtolower($fileExt)!="xlsx"){
                echo 'Format file yang di izinkan hanya excel';
                exit;
            }
            $nama_file2 = $userhris."-award-".date('YmdHis').".$fileExt";
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
            $kode_award = trim($value[3]);
            $uraian_award = trim($value[4]);
            $no_sk_penghargaan = trim($value[5]);
            $tgl_sk_penghargaan2 = trim($value[6]);
            $tingkat_acara = trim($value[7]);
            $diberikan_oleh = trim($value[8]);

            $start_date = TanggalIndo2($start_date2);
            $end_date = TanggalIndo2($end_date2);
            $tgl_sk_penghargaan = TanggalIndo2($tgl_sk_penghargaan2);

            if($nip!==""){
                $rs2 = mysqli_query($koneksi,"select * from r_award where nip='$nip' and start_date='$start_date' and end_date='$end_date'");
                $jumlah_data2 = mysqli_num_rows($rs2);            
                if($jumlah_data2==0){ 
                    $sql = "insert into r_award";
                    $sql .= "(nip,start_date,end_date,kode_award,uraian_award,no_sk_penghargaan,tgl_sk_penghargaan,tingkat_acara,diberikan_oleh,status_edit,tgl_edit,user_edit)";    
                    $sql .= " values('$nip','$start_date','$end_date','$kode_award','$uraian_award','$no_sk_penghargaan','$tgl_sk_penghargaan','$tingkat_acara','$diberikan_oleh','1','$hari_ini','$userhris')";
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
                    if($kode_award!=""){
                        if($sql==""){
                            $sql .= "set kode_award='$kode_award'";
                        } else {
                            $sql .= ",kode_award='$kode_award'";
                        }                    
                    }
                    if($uraian_award!=""){
                        if($sql==""){
                            $sql .= "set uraian_award='$uraian_award'";
                        } else {
                            $sql .= ",uraian_award='$uraian_award'";
                        }                    
                    }
                    if($no_sk_penghargaan!=""){
                        if($sql==""){
                            $sql .= "set no_sk_penghargaan='$no_sk_penghargaan'";
                        } else {
                            $sql .= ",no_sk_penghargaan='$no_sk_penghargaan'";
                        }                    
                    }
                    if($tgl_sk_penghargaan!=""){
                        if($sql==""){
                            $sql .= "set tgl_sk_penghargaan='$tgl_sk_penghargaan'";
                        } else {
                            $sql .= ",tgl_sk_penghargaan='$tgl_sk_penghargaan'";
                        }                    
                    }
                    if($tingkat_acara!=""){
                        if($sql==""){
                            $sql .= "set tingkat_acara='$tingkat_acara'";
                        } else {
                            $sql .= ",tingkat_acara='$tingkat_acara'";
                        }                    
                    }
                    if($diberikan_oleh!=""){
                        if($sql==""){
                            $sql .= "set diberikan_oleh='$diberikan_oleh'";
                        } else {
                            $sql .= ",diberikan_oleh='$diberikan_oleh'";
                        }                    
                    }
                    if($sql!=""){
                        $sql2 = "update r_award ";
                        $sql2 .= $sql;
                        $sql2 .= " where nip='$nip'"; 
                        $result = @mysqli_query($koneksi,$sql2);
                        if($result){
                            $status_perubahan = mysqli_affected_rows($koneksi);
                            if($status_perubahan>0){
                                $sql2 = "update r_award set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
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