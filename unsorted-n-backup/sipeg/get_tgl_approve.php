<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    function TanggalIndo2($date){
        if($date!="" && $date!=null){
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $result = $tgl . "." . $bulan . ".". $tahun;	
            return($result);
        } else {
            return("");
        }
    }

    include "koneksi.php";
    include "../fungsi.php";
    $queryjns = "SELECT tgl_approvebayar FROM sppd1 where approvebayar='2' and bayar='0' group by tgl_approvebayar ORDER BY tgl_approvebayar ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    $datanya["value"] = "";
    $datanya["text"] = "-";
    array_push($items, $datanya);
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$tgl_approvebayar = stripslashesx ($hasiljns['tgl_approvebayar']);
        $tgl_approvebayar2 = TanggalIndo2($tgl_approvebayar);
        $datanya["value"] = $tgl_approvebayar;
        $datanya["text"] = $tgl_approvebayar2;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>