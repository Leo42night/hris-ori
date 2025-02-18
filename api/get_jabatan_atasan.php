<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php"; 
    $nip = $_REQUEST['nip'];

    //$rs = mysqli_query($koneksi,"select jabatan FROM r_jabatan WHERE nip='$nip' order by start_date desc, end_date desc limit 1");
    $rs = mysqli_query($koneksi,"select jabatan FROM r_jabatan WHERE nip='$nip'");
    if($rs){
        $hasil = mysqli_fetch_array($rs);
        $jabatan = $hasil['jabatan'];
    } else {
        $jabatan = "";
    }
        
    echo json_encode(array('jabatan' => $jabatan));
}
?>