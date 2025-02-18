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
    if(isset($_FILES['file_templatehukuman'])){
        if(is_uploaded_file($_FILES['file_templatehukuman']['tmp_name'])){
            $uploadFile = $_FILES['file_templatehukuman'];                 
            $ambilExt = explode(".", $uploadFile['name']);
            $fileExt = end($ambilExt);
            $nama_file = reset($ambilExt);
            
            if(strtolower($fileExt)!="xls" && strtolower($fileExt)!="xlsx"){
                echo 'Format file yang di izinkan hanya excel';
                exit;
            }
            $nama_file2 = $userhris."-hukuman-".date('YmdHis').".$fileExt";
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
            $jenis_grievances = trim($value[3]);
            $reason_grievances = trim($value[4]);
            $nip_atasan = trim($value[5]);
            $nama_atasan = trim($value[6]);
            $status_grievances = trim($value[7]);
            $stage_grievances = trim($value[8]);
            $result_grievances = trim($value[9]);
            $rupiah = trim($value[10]);
            $no_sk_hukuman = trim($value[11]);
            $tgl_sk_hukuman2 = trim($value[12]);
            $pasal_pelanggaran = trim($value[13]);
            $hukuman = trim($value[14]);
            $keterangan = trim($value[15]);
            $no_sk_terkait = trim($value[16]);

            $start_date = TanggalIndo2($start_date2);
            $end_date = TanggalIndo2($end_date2);
            $tgl_sk_hukuman = TanggalIndo2($tgl_sk_hukuman2);

            $sql = "insert into r_hukuman";
            $sql .= "(nip,start_date,end_date,jenis_grievances,reason_grievances,nip_atasan,nama_atasan,status_grievances,stage_grievances,result_grievances,rupiah,no_sk_hukuman,tgl_sk_hukuman,pasal_pelanggaran,hukuman,keterangan,no_sk_terkait,status_edit,tgl_edit,user_edit)";    
            $sql .= " values('$nip','$start_date','$end_date','$jenis_grievances','$reason_grievances','$nip_atasan','$nama_atasan','$status_grievances','$stage_grievances','$result_grievances','$rupiah','$no_sk_hukuman','$tgl_sk_hukuman','$pasal_pelanggaran','$hukuman','$keterangan','$no_sk_terkait','1','$hari_ini','$userhris')";
            $result = @mysqli_query($koneksi,$sql);
        }
        echo json_encode(array('successMsg'=>'Sukses'));
    } else {
        echo json_encode(array('errorMsg'=>'Gagal'));
    }    
}    
?>