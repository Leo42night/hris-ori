<?php
session_start();
$userhris = $_SESSION["userakseshris"];
ini_set('date.timezone', 'Asia/Jakarta');
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    
    $tgl_proses = date("Y-m-d");
    $jam_ini = date("H:i:s");
    
    $tahun = $_REQUEST['tahunthr2'];
    $jenisthr = $_REQUEST['jenisthrthr2'];

    $sql = "delete from thr where tahun='$tahun' and jenisthr='$jenisthr'";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        echo json_encode(array('success'=>true));
    } else {
        echo json_encode(array('errorMsg'=>'Gaggal reset THR.'));
    }
}
?>