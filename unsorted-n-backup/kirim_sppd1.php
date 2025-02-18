<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "vendor/autoload.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
date_default_timezone_set("Asia/Jakarta");
function TanggalIndo($date){
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");     
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);     
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;	
    return($result);
}    
function TanggalIndo2($date){
    if(strtotime($date)){
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);
        $result = $tgl . "." . $bulan . ".". $tahun;	
        return($result);
    } else {
        return("");
    }
}

// $idsppd = $_REQUEST['idsppd'];
$idsppd = "2024000594";
$rs = mysqli_query($koneksi,"select * from sppd1 where idsppd='$idsppd'");
$hasil = mysqli_fetch_array($rs);
if($hasil){
	$id = $hasil['id'];
	$idsppd = $hasil['idsppd'];
    $tanggal = $hasil['tanggal'];
    $tanggal2 = TanggalIndo2($tanggal);
    $tingkat_sppd = $hasil['tingkat_sppd'];
        $rs1 = mysqli_query($koneksi,"select nama_tingkat from tingkat_sppd where kd_tingkat='$tingkat_sppd'");
    	$hasil1 = mysqli_fetch_array($rs1);
        if($hasil1){
            $nama_tingkat_sppd = $hasil1['nama_tingkat'];
        } else {
            $nama_tingkat_sppd = "";
        }
    $jenis_sppd = $hasil['jenis_sppd'];
        $rs2 = mysqli_query($koneksi,"select nama_sppd from jenis_sppd where kd_sppd='$jenis_sppd'");
    	$hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $nama_jenis_sppd = $hasil2['nama_sppd'];
        } else {
            $nama_jenis_sppd = "";
        }
    $level_sppd = $hasil['level_sppd'];
        $rs3 = mysqli_query($koneksi,"select uraian from master_level where level='$level_sppd'");
    	$hasil3 = mysqli_fetch_array($rs3);
        if($hasil3){
            $nama_level_sppd = $hasil3['uraian'];
        } else {
            $nama_level_sppd = "";
        }
    $no_sppd = $hasil['no_sppd'];
    $nip = $hasil['nip'];
    $nama = $hasil['nama'];
    $kedudukan = $hasil['kedudukan'];
    $tujuan = $hasil['tujuan'];
    $transportasi = $hasil['transportasi'];
    $tgl_awal = $hasil['tgl_awal'];
    $tgl_akhir = $hasil['tgl_akhir'];
    $tgl_awal2 = TanggalIndo2($tgl_awal);
    $tgl_akhir2 = TanggalIndo2($tgl_akhir);
    $hari = $hasil['hari'];
    $maksud = $hasil['maksud'];
    $kd_project_sap = $hasil['kd_project_sap'];
    $nama_project_sap = $hasil['nama_project_sap'];

    $approve1 = $hasil['approve1'];
    $tgl_approve1 = $hasil['tgl_approve1'];
    $tgl_approve12 = TanggalIndo2($tgl_approve1);
    $approval1 = $hasil['approval1'];
    $alasan_reject1 = $hasil['alasan_reject1'];
    $rs31 = mysqli_query($koneksi,"select jabatan,email,email2 from data_pegawai where nip='$approval1'");
    $hasil31 = mysqli_fetch_array($rs31);
    if($hasil31){
        $nama_approval1 = $hasil31['jabatan'];
        $email1 = $hasil31['email'];
        $email2 = $hasil31['email2'];
    } else {
        $nama_approval1 = "";
        $email1 = "";
        $email2 = "";
    }

    $pesan = '<table style="width:100%;margin-left:10px;margin-right:10px;">';
    $pesan .= '<tr>';
    $pesan .= '<td style="width:100px;border:none">Nip</td>';
    $pesan .= '<td style="width:10px;border:none">:</td>';
    $pesan .= '<td style="border:none">'.$nip.'</td>';
    $pesan .= "</tr>";
    $pesan .= '<tr>';
    $pesan .= '<td style="border:none;">Nama</td>';
    $pesan .= '<td style="border:none;">:</td>';
    $pesan .= '<td style="border:none;">'.$nama.'</td>';
    $pesan .= "</tr>";
    $pesan .= '<tr>';
    $pesan .= '<td style="border:none;">Tingkat</td>';
    $pesan .= '<td style="border:none;">:</td>';
    $pesan .= '<td style="border:none;">'.$nama_tingkat_sppd.'</td>';
    $pesan .= "</tr>";
    $pesan .= '<tr>';
    $pesan .= '<td style="border:none;">Jenis</td>';
    $pesan .= '<td style="border:none;">:</td>';
    $pesan .= '<td style="border:none;">'.$nama_jenis_sppd.'</td>';
    $pesan .= "</tr>";
    $pesan .= '<tr>';
    $pesan .= '<td style="border:none;">Level</td>';
    $pesan .= '<td style="border:none;">:</td>';
    $pesan .= '<td style="border:none;">'.$nama_level_sppd.'</td>';
    $pesan .= "</tr>";
    $pesan .= '<tr>';
    $pesan .= '<td style="border:none;vertical-align:top;">Cost Center</td>';
    $pesan .= '<td style="border:none;vertical-align:top;">:</td>';
    $pesan .= '<td style="border:none;vertical-align:top;">'.$kd_project_sap.'<br/>'.$nama_project_sap.'</td>';
    $pesan .= "</tr>";
    $pesan .= '<tr>';
    $pesan .= '<td style="border:none;">Kedudukan</td>';
    $pesan .= '<td style="border:none;">:</td>';
    $pesan .= '<td style="border:none;">'.$kedudukan.'</td>';
    $pesan .= "</tr>";
    $pesan .= '<tr>';
    $pesan .= '<td style="border:none;">Tujuan</td>';
    $pesan .= '<td style="border:none;">:</td>';
    $pesan .= '<td style="border:none;">'.$tujuan.'</td>';
    $pesan .= "</tr>";
    $pesan .= "</tr>";
    $pesan .= '<tr>';
    $pesan .= '<td style="border:none;">Berangkat</td>';
    $pesan .= '<td style="border:none;">:</td>';
    $pesan .= '<td style="border:none;">'.$tgl_awal2.'</td>';
    $pesan .= "</tr>";
    $pesan .= '<tr>';
    $pesan .= '<td style="border:none;">Kembali</td>';
    $pesan .= '<td style="border:none;">:</td>';
    $pesan .= '<td style="border:none;">'.$tgl_akhir2.'</td>';
    $pesan .= "</tr>";
    $pesan .= '<tr>';
    $pesan .= '<td style="border:none;">Lama</td>';
    $pesan .= '<td style="border:none;">:</td>';
    $pesan .= '<td style="border:none;">'.$hari.' hari</td>';
    $pesan .= "</tr>";
    $pesan .= '<tr>';
    $pesan .= '<td style="border:none;vertical-align:top;">Maksud</td>';
    $pesan .= '<td style="border:none;vertical-align:top;">:</td>';
    $pesan .= '<td style="border:none;vertical-align:top;">'.$maksud.'</td>';
    $pesan .= "</tr>";
    $pesan .= "</table>";
    // echo $pesan;

    // if(($email1!="" && strlen($email1)>=10) || ($email2!="" && strlen($email2)>=10)){
        $mail = new PHPMailer;
        $mail->SMTPDebug = 3;
        // $mail->SMTPDebug = false;
        $mail->isSMTP();        
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;                      
        $mail->Username = "nextnusadaya@gmail.com";             
        $mail->Password = "xgcxmycohrmdfnac";                       
        $mail->SMTPSecure = "tls";                       
        $mail->Port = 587;                    
        $mail->From = "nextnusadaya@gmail.com";
        $mail->FromName = "HRIS";
        $mail->addAddress("sporsdor@gmail.com", "Sandy");
        // if($email1!="" && strlen($email1)>=10){
        //     $mail->addAddress($email1, $nama);
        // }
        // if($email2!="" && strlen($email2)>=10){
        //     $mail->addAddress($email2, $nama);
        // }
        $mail->isHTML(true);
        $content = '';
        $content .= '<h3>SPPD No : '.$no_sppd.'</h3>';
        $content .= '<p></p>';    
        $content .= '<p>Rincian SPPD :</p>';
        $content .= '<p>'.$pesan.'</p>';
        $content .= '<p>atas perhatian dan kerjasamanya, diucapkan terima kasih</p>';
        $mail->Subject = "Permintaan Approval";
        $mail->Body = $content;
        // $mail->send();
        if(!$mail->send()){
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message has been sent successfully";
        }
    // }
    
    
}
?>