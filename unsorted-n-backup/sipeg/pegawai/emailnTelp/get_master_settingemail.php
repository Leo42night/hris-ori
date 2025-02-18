<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/fungsi.php";

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
    
    $nama2 = isset($_POST['namasettingemailcari']) ? $_POST['namasettingemailcari'] : "";
    $perintah = "";
    if($nama2!=""){
        $perintah .= " and (nip='$nama2' or nama like '%$nama2%')";
    }
    
    $rs = mysqli_query($koneksi,"select count(*) from data_pegawai where aktif='1'".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from data_pegawai where aktif='1'".$perintah." order by id desc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashesx ($hasil['id']);
    	$nip = stripslashesx ($hasil['nip']);
        $nama = stripslashesx ($hasil['nama']);
        $telepon = stripslashesx ($hasil['telepon']);
    	$email = stripslashesx ($hasil['email']);
    	$email2 = stripslashesx ($hasil['email2']);
        
        $datanya = array();
        $datanya["idsettingemail"] = $id;
        $datanya["nipsettingemail"] = $nip;
        $datanya["namasettingemail"] = $nama;
        $datanya["teleponsettingemail"] = $telepon;
        $datanya["emailsettingemail"] = $email;
        $datanya["email2settingemail"] = $email2;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>