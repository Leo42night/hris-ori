<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    function TanggalIndo2($date){
        if(!is_null($date) && strtotime($date)){
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $result = $tgl . "-" . $bulan . "-". $tahun;	
            return($result);
        } else {
            return("");
        }
    }
    $tanggal = $_REQUEST['tanggallibur'];
    $keterangan = $_REQUEST['keteranganlibur'];
    
    $sql = "insert into libur_nasional(tanggal,keterangan) values('$tanggal','$keterangan')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        echo json_encode(array(
            'tanggal' => $tanggal
        ));
    } else {
        echo json_encode(array('errorMsg'=>'Gagal menyimpan data.'));
    }
}
?>