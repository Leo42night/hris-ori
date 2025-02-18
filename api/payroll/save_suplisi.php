<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $nip = trim($_REQUEST['nipsuplisi']);
    $blth = $_REQUEST['blthsuplisi'];
    $gaji = $_REQUEST['gajisuplisi'];
    $tunjangan_posisi = $_REQUEST['tunjangan_posisisuplisi'];
    $p21b = $_REQUEST['p21bsuplisi'];
    $tunjangan_kemahalan = $_REQUEST['tunjangan_kemahalansuplisi'];
    $tunjangan_perumahan = $_REQUEST['tunjangan_perumahansuplisi'];
    $tunjangan_transportasi = $_REQUEST['tunjangan_transportasisuplisi'];
    $bantuan_pulsa = $_REQUEST['bantuan_pulsasuplisi'];
    $cuti = $_REQUEST['cutisuplisi'];
    $thr = $_REQUEST['thrsuplisi'];
    $iks = $_REQUEST['ikssuplisi'];
    $bonus = $_REQUEST['bonussuplisi'];
    $winduan = $_REQUEST['winduansuplisi'];
    $honorarium_eo = $_REQUEST['honorarium_eosuplisi'];
    $jumlah_suplisi = $_REQUEST['jumlah_suplisisuplisi'];
    $blthnip = $blth.".".$nip;

    $sql = "insert into suplisi(blth,nip,blthnip,gaji,tunjangan_posisi,p21b,tunjangan_kemahalan,tunjangan_perumahan,tunjangan_transportasi,bantuan_pulsa,cuti,thr,iks,bonus,winduan,honorarium_eo,jumlah_suplisi)";
    $sql .= " values('$blth','$nip','$blthnip','$gaji','$tunjangan_posisi','$p21b','$tunjangan_kemahalan','$tunjangan_perumahan','$tunjangan_transportasi','$bantuan_pulsa','$cuti','$thr','$iks','$bonus','$winduan','$honorarium_eo','$jumlah_suplisi')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'nip' => $nip
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>