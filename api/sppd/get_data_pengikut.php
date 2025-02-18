<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
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

    $idsppd = $_REQUEST['idsppd'];

    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
    
    $offset = ($page-1)*$rows;
    $result = array();
    $result["total"] = 1;    
    
    $items = array();
    $rs = mysqli_query($koneksi,"select * from pengikut_sppd where idsppd='$idsppd' order by id asc");
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nama = stripslashes ($hasil['nama']);
    	$hubungan = stripslashes ($hasil['hubungan']);
    
        $datanya = array();
        $datanya["idpengikut"] = $id;
        $datanya["idsppdpengikut"] = $idsppd;
        $datanya["namapengikut"] = $nama;
        $datanya["hubunganpengikut"] = $hubungan;
        $datanya["nama2pengikut"] = strtoupper($nama);
        $datanya["hubungan2pengikut"] = strtoupper($hubungan);
        $datanya["idsppdpengikut2"] = $idsppd;
        $datanya["namapengikut2"] = $nama;
        $datanya["hubunganpengikut2"] = $hubungan;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>