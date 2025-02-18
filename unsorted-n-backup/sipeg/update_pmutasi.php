<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi_sipeg.php';
    $id = intval($_REQUEST['id']);
    $nip = $_REQUEST['nippmutasi'];
    $blth_awal = $_REQUEST['blth_awalpmutasi'];
    $blth_akhir = $_REQUEST['blth_akhirpmutasi'];
    $netto = $_REQUEST['nettopmutasi'];
    $pph21 = $_REQUEST['pph21pmutasi'];
    $tahun = substr($blth_akhir,0,4);
    $niptahun = $tahun.".".$nip;

    $sql = "update pendapatan_mutasi set nip='$nip',tahun='$tahun',niptahun='$niptahun',blth_awal='$blth_awal',blth_akhir='$blth_akhir',netto='$netto',pph21='$pph21' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'id' => $id
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>