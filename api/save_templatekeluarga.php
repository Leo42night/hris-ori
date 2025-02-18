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
    if(isset($_FILES['file_templatekeluarga'])){
        if(is_uploaded_file($_FILES['file_templatekeluarga']['tmp_name'])){
            $uploadFile = $_FILES['file_templatekeluarga'];                 
            $ambilExt = explode(".", $uploadFile['name']);
            $fileExt = end($ambilExt);
            $nama_file = reset($ambilExt);
            
            if(strtolower($fileExt)!="xls" && strtolower($fileExt)!="xlsx"){
                echo 'Format file yang di izinkan hanya excel';
                exit;
            }
            $nama_file2 = $userhris."-keluarga-".date('YmdHis').".$fileExt";
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
            $id_jenis_keluarga = trim($value[3]);
            $no_urut = trim($value[4]);
            $nama = trim($value[5]);
            $jenis_kelamin = trim($value[6]);
            $tempat_lahir = trim($value[7]);
            $tgl_lahir2 = trim($value[8]);
            $id_agama = trim($value[9]);
            $pekerjaan = trim($value[10]);
            $pln_group = trim($value[11]);
            $kode_perusahaan = trim($value[12]);
            $nip_keluarga = trim($value[13]);
            $status_warganegara = trim($value[14]);
            $jenis_alamat = trim($value[15]);
            $alamat = trim($value[16]);
            $id_provinsi = trim($value[17]);
            $id_kabupaten = trim($value[18]);
            $kode_pos = trim($value[19]);
            $no_kk = trim($value[20]);
            $nik = trim($value[21]);
            $npwp = trim($value[22]);
            $telepon = trim($value[23]);
            $gol_darah = trim($value[24]);
            $np_bpjs_kes = trim($value[25]);

            $start_date = TanggalIndo2($start_date2);
            $end_date = TanggalIndo2($end_date2);
            $tgl_lahir = TanggalIndo2($tgl_lahir2);

            if($nip!==""){
                $rs2 = mysqli_query($koneksi,"select * from r_keluarga where nip='$nip' and start_date='$start_date' and end_date='$end_date' and id_jenis_keluarga='$id_jenis_keluarga'");
                $jumlah_data2 = mysqli_num_rows($rs2);            
                if($jumlah_data2==0){  
                    $sql = "insert into r_keluarga";
                    $sql .= "(nip,start_date,end_date,id_jenis_keluarga,no_urut,nama,jenis_kelamin,tempat_lahir,tgl_lahir,id_agama,pekerjaan,pln_group,kode_perusahaan,nip_keluarga,status_warganegara,jenis_alamat,alamat,id_provinsi,id_kabupaten,kode_pos,no_kk,nik,npwp,telepon,gol_darah,no_bpjs_kes,status_edit,tgl_edit,user_edit)";
                    $sql .= " values('$nip','$start_date','$end_date','$id_jenis_keluarga','$no_urut','$nama','$jenis_kelamin','$tempat_lahir','$tgl_lahir','$id_agama','$pekerjaan','$pln_group','$kode_perusahaan','$nip_keluarga','$status_warganegara','$jenis_alamat','$alamat','$id_provinsi','$id_kabupaten','$kode_pos','$no_kk','$nik','$npwp','$telepon','$gol_darah','$no_bpjs_kes','1','$hari_ini','$userhris')";
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
                    if($id_jenis_keluarga!=""){
                        if($sql==""){
                            $sql .= "set id_jenis_keluarga='$id_jenis_keluarga'";
                        } else {
                            $sql .= ",id_jenis_keluarga='$id_jenis_keluarga'";
                        }                    
                    }
                    if($no_urut!=""){
                        if($sql==""){
                            $sql .= "set no_urut='$no_urut'";
                        } else {
                            $sql .= ",no_urut='$no_urut'";
                        }                    
                    }
                    if($nama!=""){
                        if($sql==""){
                            $sql .= "set nama='$nama'";
                        } else {
                            $sql .= ",nama='$nama'";
                        }                    
                    }
                    if($jenis_kelamin!=""){
                        if($sql==""){
                            $sql .= "set jenis_kelamin='$jenis_kelamin'";
                        } else {
                            $sql .= ",jenis_kelamin='$jenis_kelamin'";  
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
                    if($id_agama!=""){
                        if($sql==""){
                            $sql .= "set id_agama='$id_agama'";
                        } else {
                            $sql .= ",id_agama='$id_agama'";
                        }                    
                    }
                    if($pekerjaan!=""){
                        if($sql==""){
                            $sql .= "set pekerjaan='$pekerjaan'";
                        } else {
                            $sql .= ",pekerjaan='$pekerjaan'";
                        }                    
                    }
                    if($pln_group!=""){
                        if($sql==""){
                            $sql .= "set pln_group='$pln_group'";
                        } else {
                            $sql .= ",pln_group='$pln_group'";
                        }                    
                    }
                    if($kode_perusahaan!=""){
                        if($sql==""){
                            $sql .= "set kode_perusahaan='$kode_perusahaan'";
                        } else {
                            $sql .= ",kode_perusahaan='$kode_perusahaan'";
                        }                    
                    }
                    if($nip_keluarga!=""){
                        if($sql==""){
                            $sql .= "set nip_keluarga='$nip_keluarga'";
                        } else {
                            $sql .= ",nip_keluarga='$nip_keluarga'";
                        }                    
                    }
                    if($status_warganegara!=""){
                        if($sql==""){
                            $sql .= "set status_warganegara='$status_warganegara'";
                        } else {
                            $sql .= ",status_warganegara='$status_warganegara'";
                        }                    
                    }
                    if($jenis_alamat!=""){
                        if($sql==""){
                            $sql .= "set jenis_alamat='$jenis_alamat'";
                        } else {
                            $sql .= ",jenis_alamat='$jenis_alamat'";
                        }                    
                    }
                    if($alamat!=""){
                        if($sql==""){
                            $sql .= "set alamat='$alamat'";
                        } else {
                            $sql .= ",alamat='$alamat'";
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
                    if($no_kk!=""){
                        if($sql==""){
                            $sql .= "set no_kk='$no_kk'";
                        } else {
                            $sql .= ",no_kk='$no_kk'";
                        }                    
                    }
                    if($nik!=""){
                        if($sql==""){
                            $sql .= "set nik='$nik'";
                        } else {
                            $sql .= ",nik='$nik'";
                        }                    
                    }
                    if($npwp!=""){
                        if($sql==""){
                            $sql .= "set npwp='$npwp'";
                        } else {
                            $sql .= ",npwp='$npwp'";
                        }                    
                    }
                    if($telepon!=""){
                        if($sql==""){
                            $sql .= "set telepon='$telepon'";
                        } else {
                            $sql .= ",telepon='$telepon'";
                        }                    
                    }
                    if($gol_darah!=""){
                        if($sql==""){
                            $sql .= "set gol_darah='$gol_darah'";
                        } else {
                            $sql .= ",gol_darah='$gol_darah'";
                        }                    
                    }
                    if($no_bpjs_kes!=""){
                        if($sql==""){
                            $sql .= "set no_bpjs_kes='$no_bpjs_kes'";
                        } else {
                            $sql .= ",no_bpjs_kes='$no_bpjs_kes'";
                        }                    
                    }
                    if($sql!=""){
                        $sql2 = "update r_keluarga ";
                        $sql2 .= $sql;
                        $sql2 .= " where nip='$nip'"; 
                        $result = @mysqli_query($koneksi,$sql2);
                        if($result){
                            $status_perubahan = mysqli_affected_rows($koneksi);
                            if($status_perubahan>0){
                                $sql2 = "update r_keluarga set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
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