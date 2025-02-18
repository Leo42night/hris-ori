<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    include 'koneksi_sipeg.php';
    $hari_ini = date("Y-m-d H:i:s");
    $jam_ini = date("H:i:s");

    $rs1 = mysqli_query($koneksi,"select user_fullname from masteruser where user_name='$userhris'");
    $hasil1 = mysqli_fetch_array($rs1);
    $nama_petugas = stripslashes($hasil1['user_fullname']);
        
    $blth2 = $_REQUEST['blthsptmasa2'];
    $nip2 = $_REQUEST['nipsptmasa2'];
    
    if($nip2!=""){
        $aktivitas = "Reset SPT Masa untuk blth : $blth, nip : $nip2";
    } else {
        $aktivitas = "Reset SPT Masa untuk blth : $blth";
    }

    $perintah = "";
    if($nip2!=""){
        $perintah = $perintah." and nip='$nip2'";
    }
    $jumlahdata = 0;
    if($jumlahdata==0){
        $rs9 = "delete from pph21masa where blth='$blth2'".$perintah;
        $result9 = @mysqli_query($koneksi,$rs9);
        if($result9){
            $kode = $hari_ini."-".$userhris."-".$aktivitas;
            $sql5 = "insert into log_aktivitas(tanggal,user,nama,aktivitas,kode) values('$hari_ini','$userhris','$nama_petugas','$aktivitas','$kode')";
            $result5 = @mysqli_query($koneksi,$sql5);
            echo json_encode(array('success'=>true));
        } else {
            //echo json_encode(array('errorMsg'=>'Gagal reset data.'));
            echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
        }
    } else {
        echo json_encode(array('errorMsg'=>'Status proses SPT Masa untuk bulan ini sudah terkunci.'));
    }    
}
?>