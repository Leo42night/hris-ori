<?php
error_reporting(1);
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/stringvalidasi.php";
    $kunci = "cipher.hris@s7o";
    $sukses = 0;
    $gagal = 0;
    $rs = mysqli_query($koneksi,"select * from data_pegawai where (nik<>'' and LENGTH(nik)<=20) or (no_kk<>'' and LENGTH(no_kk)<=20) or (npwp<>'' and LENGTH(npwp)<=20) or (telepon<>'' and LENGTH(telepon)<=20) order by id asc");
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashesx ($hasil['id']);
    	$nik = stripslashesx ($hasil['nik']);
    	$no_kk = stripslashesx ($hasil['no_kk']);
    	$telepon = stripslashesx ($hasil['telepon']);
        $npwp = stripslashesx ($hasil['npwp']);
        
        if($nik!="" && strlen($nik)<=20){
            $nik = encryptText($nik, $kunci);
        }
        if($no_kk!="" && strlen($no_kk)<=20){
            $no_kk = encryptText($no_kk, $kunci);
        }
        if($npwp!="" && strlen($npwp)<=20){
            $npwp = encryptText($npwp, $kunci);
        }
        if($telepon!="" && strlen($telepon)<=20){
            $telepon = encryptText($telepon, $kunci);
        }

        $sql = "update data_pegawai set nik='$nik',no_kk='$no_kk',telepon='$telepon',npwp='$npwp' where id=$id";
        $result = @mysqli_query($koneksi,$sql);
        if($result){
            $sukses++;
        } else {
            $gagal++;
        }
    }
    echo "Sukses : ".$sukses.", Gagal : ".$gagal;
}
?>