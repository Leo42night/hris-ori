<?php
// error_reporting(0);
session_start();
require '../vendor/autoload.php';
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
    include 'koneksi_sipeg.php';
    include '../fungsi.php';

    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    $tgl_proses = date("Y-m-d", strtotime("+1 hour"));

    $directoryName = "assets/upload";
    if(!is_dir($directoryName)){
      mkdir($directoryName, 0755, true);
    }    
    $uploadDir1 = $directoryName."/";
    $source = 'assets/index.html';
    $destination = $uploadDir1.'/index.html';
    if (!file_exists($destination)){
      copy($source, $destination);
    }
    if(isset($_FILES['file_templatemgaji'])){
        if(is_uploaded_file($_FILES['file_templatemgaji']['tmp_name'])){
            $uploadFile = $_FILES['file_templatemgaji'];                 
            $ambilExt = explode(".", $uploadFile['name']);
            $fileExt = end($ambilExt);
            $nama_file = reset($ambilExt);
            
            if(strtolower($fileExt)!="xls" && strtolower($fileExt)!="xlsx"){
                echo 'Format file yang di izinkan hanya excel';
                exit;
            }
            $nama_file2 = $userhris."-gaji-".date('YmdHis').".$fileExt";
            move_uploaded_file($uploadFile['tmp_name'],$uploadDir1.$nama_file2);
        } else {
            $nama_file2 = "";
        }
    } else {
        $nama_file2 = "";
    }
    $pesan = $nama_file2;
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
            $nip = trim($value[1]);
            $gaji_dasar = floatval($value[2]);
            $honorarium = floatval($value[3]);
            $honorer = floatval($value[4]);
            $tarif_grade = floatval($value[5]);
            $tunjangan_posisi = floatval($value[6]);
            $p21b = floatval($value[7]);
            $tunjangan_kemahalan = floatval($value[8]);
            $tunjangan_perumahan = floatval($value[9]);
            $tunjangan_transportasi = floatval($value[10]);
            $bantuan_pulsa = floatval($value[11]);
            $tunjangan_kompetensi = floatval($value[12]);
            $dplk_persero = floatval($value[13]);
            $dplk_simponi_pr = floatval($value[14]);
            $nama_tunjangan1 = $value[15];
            $tunjangan1 = floatval($value[16]);
            $nama_tunjangan2 = $value[17];
            $tunjangan2 = floatval($value[18]);
            $nama_tunjangan3 = $value[19];
            $tunjangan3 = floatval($value[20]);
            $nama_tunjangan4 = $value[21];
            $tunjangan4 = floatval($value[22]);
            $bpjs_tk_pp = floatval($value[24]);
            $bpjs_tk_kp = floatval($value[25]);
            $bpjs_tk_kkp = floatval($value[26]);
            $bpjs_tk_htp = floatval($value[27]);
            $bpjs_tk_jhtk = floatval($value[33]);
            $bpjs_tk_pk = floatval($value[34]);
            $rp_bpjs_tk_pp = floatval($value[28]);
            $rp_bpjs_tk_kp = floatval($value[29]);
            $rp_bpjs_tk_kkp = floatval($value[30]);
            $rp_bpjs_tk_htp = floatval($value[31]);
            $rp_bpjs_tk_jhtk = floatval($value[35]);
            $rp_bpjs_tk_pk = floatval($value[36]);
            $bpjs_kes_pp = floatval($value[23]);
            $bpjs_kes_pk = floatval($value[32]);
            $pot_koperasi = floatval($value[37]);
            $pot_bazis = floatval($value[38]);
            $dplk_simponi = floatval($value[39]);
            $pot_dplk_pribadi = floatval($value[40]);
            $cop_kendaraan = floatval($value[41]);
            $iuran_peserta = floatval($value[42]);
            $brpr = floatval($value[43]);
            $sewa_mess = floatval($value[44]);
            $qurban = floatval($value[45]);
            $arisan = floatval($value[46]);
            $nama_potongan1 = $value[47];
            $potongan1 = floatval($value[48]);
            $nama_potongan2 = $value[49];
            $potongan2 = floatval($value[50]);
            $nama_potongan3 = $value[51];
            $potongan3 = floatval($value[52]);
            $nama_potongan4 = $value[53];
            $potongan4 = floatval($value[54]);
            $aktif = "1";

            $rs2 = mysqli_query($koneksi,"select * from data_pegawai where nip='$nip'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis = stripslashesx ($hasil2['jenis']);
                $grade = stripslashesx($hasil2['grade']);
                $skala_grade = stripslashesx($hasil2['skala_grade']);
                $jabatan = stripslashesx($hasil2['jabatan']);
            } else {
                $jenis = "";
                $grade = "";
                $skala_grade = "";
                $jabatan = "";
            }
        
            if($nip!==""){
                $sql = "insert into  master_gaji(nip,jenis,grade,skala_grade,jabatan,gaji_dasar,honorarium,honorer,tarif_grade,tunjangan_posisi,p21b,tunjangan_kemahalan,tunjangan_perumahan,tunjangan_transportasi,bantuan_pulsa,tunjangan_kompetensi,dplk_persero,dplk_simponi_pr";
                $sql .= ",nama_tunjangan1,tunjangan1,nama_tunjangan2,tunjangan2,nama_tunjangan3,tunjangan3,nama_tunjangan4,tunjangan4";
                $sql .= ",bpjs_tk_pp,bpjs_tk_kp,bpjs_tk_kkp,bpjs_tk_htp,bpjs_tk_jhtk,bpjs_tk_pk,rp_bpjs_tk_pp,rp_bpjs_tk_kp,rp_bpjs_tk_kkp,rp_bpjs_tk_htp,rp_bpjs_tk_jhtk,rp_bpjs_tk_pk,bpjs_kes_pp,bpjs_kes_pk";
                $sql .= ",pot_koperasi,pot_bazis,dplk_simponi,pot_dplk_pribadi,cop_kendaraan,iuran_peserta,brpr,sewa_mess,qurban,arisan";
                $sql .= ",nama_potongan1,potongan1,nama_potongan2,potongan2,nama_potongan3,potongan3,nama_potongan4,potongan4)";
                $sql .= " values('$nip','$jenis','$grade','$skala_grade','$jabatan','$gaji_dasar','$honorarium','$honorer','$tarif_grade','$tunjangan_posisi','$p21b','$tunjangan_kemahalan','$tunjangan_perumahan','$tunjangan_transportasi','$bantuan_pulsa','$tunjangan_kompetensi','$dplk_persero','$dplk_simponi_pr";
                $sql .= "','$nama_tunjangan1','$tunjangan1','$nama_tunjangan2','$tunjangan2','$nama_tunjangan3','$tunjangan3','$nama_tunjangan4','$tunjangan4";
                $sql .= "','$bpjs_tk_pp','$bpjs_tk_kp','$bpjs_tk_kkp','$bpjs_tk_htp','$bpjs_tk_jhtk','$bpjs_tk_pk','$rp_bpjs_tk_pp','$rp_bpjs_tk_kp','$rp_bpjs_tk_kkp','$rp_bpjs_tk_htp','$rp_bpjs_tk_jhtk','$rp_bpjs_tk_pk','$bpjs_kes_pp','$bpjs_kes_pk";
                $sql .= "','$pot_koperasi','$pot_bazis','$dplk_simponi','$pot_dplk_pribadi','$cop_kendaraan','$iuran_peserta','$brpr','$sewa_mess','$qurban','$arisan";
                $sql .= "','$nama_potongan1','$potongan1','$nama_potongan2','$potongan2','$nama_potongan3','$potongan3','$nama_potongan4','$potongan4')";
                $result = @mysqli_query($koneksi,$sql);
                if($result){
                    $hitungSukses++;
                    $pesan .= " sukses";
                } else {
                    $hitungGagal++;
                    $pesan .= " ".mysqli_error($koneksi);
                }
            } else {
                $hitungGagal++;
            }
        }
        // echo json_encode(array('successMsg'=>$pesan));
        echo json_encode(array('successMsg'=>'Sukses : '.$hitungSukses.', Gagal : '.$hitungGagal));
    } else {
        //echo json_encode(array('errorMsg'=>'Gagal'));
        //echo json_encode(array('successMsg'=>'Gagal'));
        echo json_encode(array('successMsg'=>'Sukses : '.$hitungSukses.', Gagal : '.$hitungGagal));
    }        
}    
?>