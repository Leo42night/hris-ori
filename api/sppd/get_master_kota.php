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
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
    
    $offset = ($page-1)*$rows;
    $result = array();
    $result["total"] = 1;    
    
    $items = array();
    $rs = mysqli_query($koneksi,"select * from master_kota order by kota asc");
    //$rs = mysqli_query($koneksi,"select * from m_kabupaten order by nama_kabupaten asc");
    while ($hasil = mysqli_fetch_array($rs)) {
    	$kota = stripslashes ($hasil['kota']);
    
        $datanya = array();
        $datanya["kota"] = $kota;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>