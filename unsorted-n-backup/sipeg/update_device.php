<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
$userhris = $_SESSION["userakseshris"];
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

    include 'koneksi_sipeg.php';
    $nip = $_REQUEST['nipdevice'];
    $akses = $_REQUEST['aksesdevice'];
    
    $sql = "update setting_pegawai set akses='$akses' where nip='$nip'";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        echo json_encode(array(
            'nip' => $nip
        ));
    } else {
        echo json_encode(array('errorMsg'=>'Gagal menyimpan data.'));
    }
}
?>