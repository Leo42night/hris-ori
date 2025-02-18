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

    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $rs = mysqli_query($koneksi,"select count(*) from master_biaya_sppd");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $items = array();
    $rs = mysqli_query($koneksi,"select * from master_biaya_sppd order by batas_awal desc, level_sppd asc limit $offset,$rows");
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$batas_awal = stripslashes ($hasil['batas_awal']);
        $batas_awal2 = TanggalIndo2($batas_awal);
        $batas_akhir = stripslashes ($hasil['batas_akhir']);
        $batas_akhir2 = TanggalIndo2($batas_akhir);
    	$level_sppd = stripslashes ($hasil['level_sppd']);
            $rs2 = mysqli_query($koneksi,"select uraian from master_level where level='$level_sppd'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_level_sppd = stripslashes ($hasil2['uraian']);
            } else {
                $nama_level_sppd = "";
            }
    	$konsumsi = floatval ($hasil['konsumsi']);
    	$cuci_pakaian = floatval ($hasil['cuci_pakaian']);
        $transportasi_lokal = floatval ($hasil['transportasi_lokal']);
        $penginapan = floatval ($hasil['penginapan']);
        $lumpsum_penginapan = floatval ($hasil['lumpsum_penginapan']);
        
        $datanya = array();
        $datanya["idmbiaya"] = $id;
        $datanya["batas_awalmbiaya"] = $batas_awal;
        $datanya["batas_awal2mbiaya"] = $batas_awal2;
        $datanya["batas_akhirmbiaya"] = $batas_akhir;
        $datanya["batas_akhir2mbiaya"] = $batas_akhir2;
        $datanya["level_sppdmbiaya"] = $level_sppd;
        $datanya["nama_level_sppdmbiaya"] = $nama_level_sppd;
        $datanya["konsumsimbiaya"] = $konsumsi;
        $datanya["cuci_pakaianmbiaya"] = $cuci_pakaian;
        $datanya["transportasi_lokalmbiaya"] = $transportasi_lokal;
        $datanya["penginapanmbiaya"] = $penginapan;
        $datanya["lumpsum_penginapanmbiaya"] = $lumpsum_penginapan;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>