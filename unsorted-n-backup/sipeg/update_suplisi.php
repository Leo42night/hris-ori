<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi_sipeg.php';
    $id = intval($_REQUEST['id']);
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

    $sql = "update suplisi set gaji='$gaji',tunjangan_posisi='$tunjangan_posisi',p21b='$p21b',tunjangan_kemahalan='$tunjangan_kemahalan',tunjangan_perumahan='$tunjangan_perumahan',tunjangan_transportasi='$tunjangan_transportasi',bantuan_pulsa='$bantuan_pulsa',cuti='$cuti',thr='$thr',iks='$iks',bonus='$bonus',winduan='$winduan',honorarium_eo='$honorarium_eo',jumlah_suplisi='$jumlah_suplisi' where id=$id";
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