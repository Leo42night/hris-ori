<?php
session_start();
$kelompokloginsipeg = $_SESSION["kelompokaksessipeg"];
$regionloginsipeg = $_SESSION["regionaksessipeg"];
$cabangloginsipeg = $_SESSION["cabangaksessipeg"];
$userloginsipeg = $_SESSION["useraksessipeg"];
$namaloginsipeg = $_SESSION["userfullnamesipeg"];
$adminpayroll = $_SESSION["adminpayroll"];
ini_set('date.timezone', 'Asia/Jakarta');
if ($userloginsipeg && $adminpayroll=="1" && $regionloginsipeg=="00"){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $hari_ini = date("Y-m-d");
    $jam_ini = date("H:i:s");
        
    $blth = $_REQUEST['blthpay2'];
    $kelompok2 = $_REQUEST['kelompokpay2'];
    $kd_region2 = $_REQUEST['kd_regionpay2'];
    $kd_cabang2 = $_REQUEST['kd_cabangpay2'];
    $no_spk2 = $_REQUEST['spknya'];    
    $spknya = join(',', explode("|", $no_spk2));
    
    $aktivitas = "Reset data gaji untuk blth : $blth, region : $kd_region2, cabang : $kd_cabang2, kelompok : $kelompok2, spk : $no_spk2";
    $perintah = "";
    if($kelompok2!="SEMUA"){
        $perintah = $perintah." and kelompok='$kelompok2'";
    }
    if($kd_region2!="00"){
        $perintah = $perintah." and kd_region='$kd_region2'";
    }    
    if($kd_cabang2!="000"){
        $perintah = $perintah." and kd_cabang='$kd_cabang2'";
    }

    if($kelompok2=="SEMUA"){
        $rs92 = mysqli_query($koneksi,"select count(*) as jumlahdata from kuncipayroll where blth='$blth' and status='1' order by id desc limit 1");
    } else {
        $rs92 = mysqli_query($koneksi,"select count(*) as jumlahdata from kuncipayroll where blth='$blth' and kelompok='$kelompok2' and status='1' order by id desc limit 1");        
    }
    $hasil92 = mysqli_fetch_array($rs92);
    if($hasil92){
        $jumlahdata = intval(stripslashes ($hasil92['jumlahdata']));    
    } else {
        $jumlahdata = 0;
    }
    //$jumlahdata = mysqli_num_rows($rs92);
    if($jumlahdata==0){
        if($no_spk2!="SEMUA" && $no_spk2!=""){
            $rs8 = "delete from pphmasa where blth='$blth' and find_in_set(no_spk, '$spknya')".$perintah;
        } else {
            $rs8 = "delete from pphmasa where blth='$blth'".$perintah;
        }
        $result8 = @mysqli_query($koneksi,$rs8);
        if($result8){
            if($no_spk2!="SEMUA" && $no_spk2!=""){
                $rs9 = "delete from gaji where blth='$blth' and find_in_set(no_spk, '$spknya')".$perintah;
            } else {
                $rs9 = "delete from gaji where blth='$blth'".$perintah;
            }
            $result9 = @mysqli_query($koneksi,$rs9);
            if($result9){
                $sql5 = "insert into data_aktivitas values('','$hari_ini','$jam_ini','$userloginsipeg','$aktivitas')";
                $result5 = @mysqli_query($koneksi,$sql5);
                echo json_encode(array('success'=>true));
            } else {
                echo json_encode(array('errorMsg'=>'Gagal menyimpan data.'));
            }
        }
    } else {
        echo json_encode(array('errorMsg'=>'Status proses Payroll untuk bulan ini sudah terkunci, silahkan hubungi administrator.'));
    }
}
?>