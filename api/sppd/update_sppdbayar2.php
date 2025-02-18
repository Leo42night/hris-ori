<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    $tanggal = date("Y-m-d", strtotime("+1 hour"));
    $tahun = date("Y", strtotime("+1 hour"));

    // $id = intval($_REQUEST['id']);
    $tgl_bayar = $_REQUEST['tgl_bayarsppdbayar2'];
    $ids2 = $_REQUEST['idsnya'];
    $idsnya = explode(";", $ids2);
    $sukses = 0;
    foreach($idsnya as $idsnya2){
        $sql = "update sppd1 set bayar='1',tgl_bayar='$tgl_bayar' where id='$idsnya2'";
        $result = @mysqli_query($koneksi,$sql);    
        if($result){
            $sukses++;
        }
    }
    if($sukses>0){
    	echo json_encode(array(
    		'tgl_bayar' => $tgl_bayar
    	));
    } else {
    	echo json_encode(array('errorMsg'=>'Update pembayaran kolektif gagal'));
    }
}    
?>