<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    function TanggalIndo2($date){
        if(!is_null($date) && strtotime($date)){
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $result = $tgl . "-" . $bulan . "-". $tahun;	
            return($result);
        } else {
            return("");
        }
    }
    function hitTahun($lahir) {
        if(strtotime($lahir)){
            $pecah = explode("-", $lahir);
            $thn = $pecah['0'];
            $bln = intval($pecah['1']);
            $tgl = intval($pecah['2']);
            $utahun = date("Y") - $thn;
            $ubulan = date("m") - $bln;
            $uhari = date("j") - $tgl;
            if($uhari < 0){
                $uhari = date("t",mktime(0,0,0,$bln-1,date("m"),date("Y"))) - abs($uhari); $ubulan = $ubulan - 1;
            }
            if($ubulan < 0){
                $ubulan = 12 - abs($ubulan); $utahun = $utahun - 1;
            }
            $tahunnya = $utahun;
            return $tahunnya;
        } else {
            return 0;
        }
    }

    include "koneksi.php";
    include "../fungsi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $blth_ini = date("Y-m"); 
    $today = date("Y-m-d");
    $tahun2 = isset($_POST['tahunliburcari']) ? $_POST['tahunliburcari'] : date("Y");
    
    $offset = ($page-1)*$rows;
    $result = array();
    $rs = mysqli_query($koneksi,"select count(*) from libur_nasional where substr(tanggal,1,4)='$tahun2'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    


    $items = array();
    $no=1;
    $rs2 = mysqli_query($koneksi,"select * from libur_nasional where substr(tanggal,1,4)='$tahun2' order by tanggal desc limit $offset,$rows");
    while ($hasil2 = mysqli_fetch_array($rs2)) {
    	$id = $hasil2['id'];
        $tanggal = $hasil2['tanggal'];
        $tanggal2 = TanggalIndo2($tanggal);
    	$keterangan = $hasil2['keterangan'];
    
        $datanya = array();
        $datanya["idlibur"] = $id;
        $datanya["tanggallibur"] = $tanggal;
        $datanya["tanggal2libur"] = $tanggal2;
        $datanya["keteranganlibur"] = $keterangan;

        array_push($items, $datanya);
        $no=$no+1;
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>