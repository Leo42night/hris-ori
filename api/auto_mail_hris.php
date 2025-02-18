<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "vendor/autoload.php";
include "koneksi.php";
date_default_timezone_set("Asia/Jakarta");
$jam = date("H:i");
if($jam>="09:00" && $jam<="09:59"){
    $pesan = "";
    $sql = "select approval1 as nip from sppd1 where approve1<>'2' and bayar='0' and approval1<>'' and approval1 not like '%sistem%'";
    $sql .= " union select approval2 as nip from sppd1 where approve1='2' and approve2<>'2' and approval2<>'' and bayar='0' and approval2 not like '%sistem%'";
    $sql .= " union select approval1 as nip from cuti where approve1<>'2' and approval1<>'' and approval1 not like '%sistem%'";
    $sql .= " union select approval1 as nip from ijin where approve1<>'2' and approval1<>'' and approval1 not like '%sistem%'";
    $sql .= " group by nip";
    $rs = mysqli_query($koneksi,$sql);
    while ($hasil = mysqli_fetch_array($rs)) {
        $nip = $hasil['nip'];

        $rs20 = mysqli_query($koneksi,"select nama,email,email2 from data_pegawai where nip='$nip' and aktif='1'");
        $hasil20 = mysqli_fetch_array($rs20);
        if($hasil20){
            $nama = $hasil20['nama'];
            $email1 = $hasil20['email'];
            $email2 = $hasil20['email2'];
            if($email1==$email2){
                $email2 = "";
            }
        } else {
            $nama = "";
            $email1 = "";
            $email2 = "";
        }

        $rs21 = mysqli_query($koneksi,"select count(*) as jumlah_sppd from sppd1 where (approval1='$nip' and approve1<>'2') or (approval2='$nip' and approve1='2' and approve2<>'2')");
        $hasil21 = mysqli_fetch_array($rs21);
        if($hasil21){
            $jumlah_sppd = $hasil21['jumlah_sppd'];
        } else {
            $jumlah_sppd = 0;
        }

        $rs22 = mysqli_query($koneksi,"select count(*) as jumlah_cuti from cuti where approval1='$nip' and approve1<>'2'");
        $hasil22 = mysqli_fetch_array($rs22);
        if($hasil22){
            $jumlah_cuti = $hasil22['jumlah_cuti'];
        } else {
            $jumlah_cuti = 0;
        }

        $rs23 = mysqli_query($koneksi,"select count(*) as jumlah_ijin from ijin where approval1='$nip' and approve1<>'2'");
        $hasil23 = mysqli_fetch_array($rs23);
        if($hasil23){
            $jumlah_ijin = $hasil23['jumlah_ijin'];
        } else {
            $jumlah_ijin = 0;
        }
        $pesan = "";
        if($jumlah_sppd>0){
            $pesan .= "Jumlah SPPD : ".$jumlah_sppd."<br/>";
        }
        if($jumlah_cuti>0){
            $pesan .= "Jumlah Cuti : ".$jumlah_cuti."<br/>";
        }
        if($jumlah_ijin>0){
            $pesan .= "Jumlah Izin : ".$jumlah_ijin."<br/>";
        }
        $pesan .= "<br/>";

        if(($email1!="" && strlen($email1)>=10) or ($email2!="" && strlen($email2)>=10)){        
            $mail = new PHPMailer;
            $mail->SMTPDebug = false;
            $mail->isSMTP();        
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;                      
            $mail->Username = "nextnusadaya@gmail.com";             
            $mail->Password = "xgcxmycohrmdfnac";                       
            $mail->SMTPSecure = "tls";                       
            $mail->Port = 587;                    
            $mail->From = "nextnusadaya@gmail.com";
            $mail->FromName = "HRIS";
            if($email1!="" && strlen($email1)>=10){
                $mail->addAddress($email1, $nama);
            }
            if($email2!="" && strlen($email2)>=10){
                $mail->addAddress($email2, $nama);
            }
            $mail->isHTML(true);
            $content = '';
            $content .= '<h3>Notifikasi Harian</h3>';
            $content .= '<p></p>';    
            $content .= '<p>Berikut disampaikan rekapitulasi data yang memerlukan approval :</p>';
            $content .= '<p>'.$pesan.'</p>';
            $content .= '<p>atas perhatian dan kerjasamanya, diucapkan terima kasih</p>';
            $mail->Subject = "Permintaan Approval";
            $mail->Body = $content;
            $mail->send();
        }
        
    }
    echo $pesan;
}
?>