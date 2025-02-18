<?php
session_start();
$regionloginsipeg = $_SESSION["regionaksessipeg"];
$cabangloginsipeg = $_SESSION["cabangaksessipeg"];
$userloginsipeg = $_SESSION["useraksessipeg"];
$aksesloginsipeg = $_SESSION["userhak_aksessipeg"];
$adminloginsipeg = $_SESSION["useradminsipeg"];
$namaloginsipeg = $_SESSION["userfullnamesipeg"];
if ($userloginsipeg){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
        
    $kelompok2 = htmlspecialchars($_REQUEST['kelompokpay4']);
    $blth2 = htmlspecialchars($_REQUEST['blthpay4']);
    $nip2 = htmlspecialchars($_REQUEST['nippay4']);

    if($kelompok2=="SEMUA"){
        $rs92 = mysqli_query($koneksi,"select count(*) as jumlahdata from kuncipayroll where blth='$blth' and status='1'");
    } else {
        $rs92 = mysqli_query($koneksi,"select count(*) as jumlahdata from kuncipayroll where blth='$blth' and kelompok='$kelompok2' and status='1'");        
    }
    $hasil92 = mysqli_fetch_array($rs92);
    if($hasil92){
        $jumlahdata = intval(stripslashes ($hasil92['jumlahdata']));
    } else {
        $jumlahdata = 0;
    }
    
    if($jumlahdata==0){    
        $rs8 = "delete from pphmasa where blth='$blth2' and nip='$nip2'";
        $result8 = @mysqli_query($koneksi,$rs8);
        if($result8){
            $rs9 = "delete from gaji where blth='$blth2' and nip='$nip2'";
            $result9 = @mysqli_query($koneksi,$rs9);
            if($sukses>0){
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