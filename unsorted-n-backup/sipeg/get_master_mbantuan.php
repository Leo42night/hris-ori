<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
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
    include "koneksi_sipeg.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
    
    $status2 = isset($_POST['statusmbantuancari']) ? $_POST['statusmbantuancari'] : "semua";
    // $level_sppd2 = isset($_POST['level_sppdmbantuancari']) ? $_POST['level_sppdmbantuancari'] : "semua";
    $perintah = "";
    if($status2!="semua"){
        $perintah .= " where status='$status2'";
    }

    $offset = ($page-1)*$rows;
    $result = array();
    
    $rs = mysqli_query($koneksi,"select count(*) from master_bantuan_mutasi".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $items = array();
    $rs = mysqli_query($koneksi,"select * from master_bantuan_mutasi".$perintah." order by id asc limit $offset,$rows");
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$jarak_awal = stripslashes ($hasil['jarak_awal']);
        $jarak_akhir = stripslashes ($hasil['jarak_akhir']);
    	$tarif = floatval ($hasil['tarif']);
    	$status = stripslashes ($hasil['status']);
    	$level1 = floatval ($hasil['level1']);
        $level2 = floatval ($hasil['level2']);
        $level3 = floatval ($hasil['level3']);
        $level4 = floatval ($hasil['level4']);
        $level5 = floatval ($hasil['level5']);
        $level6 = floatval ($hasil['level6']);
        $level7 = floatval ($hasil['level7']);
        
        $datanya = array();
        $datanya["idmbantuan"] = $id;
        $datanya["jarak_awalmbantuan"] = $jarak_awal;
        $datanya["jarak_akhirmbantuan"] = $jarak_akhir;
        $datanya["statusmbantuan"] = $status;
        $datanya["tarifmbantuan"] = $tarif;
        $datanya["level1mbantuan"] = $level1;
        $datanya["level2mbantuan"] = $level2;
        $datanya["level3mbantuan"] = $level3;
        $datanya["level4mbantuan"] = $level4;
        $datanya["level5mbantuan"] = $level5;
        $datanya["level6mbantuan"] = $level6;
        $datanya["level7mbantuan"] = $level7;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>