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
    
    $rs = mysqli_query($koneksi,"select count(*) from m_kabupaten");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from m_kabupaten order by id asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$id_provinsi = stripslashes ($hasil['id_provinsi']);
            $rs2 = mysqli_query($koneksi,"select nama_provinsi from m_provinsi where id_provinsi='$id_provinsi'");
            $hasil2 = mysqli_fetch_array($rs2);
            $nama_provinsi = stripslashes ($hasil2['nama_provinsi']);
    	$id_kabupaten = stripslashes ($hasil['id_kabupaten']);
    	$nama_kabupaten = stripslashes ($hasil['nama_kabupaten']);
        
        $datanya = array();
        $datanya["idmkabkot"] = $id;
        $datanya["id_provinsimkabkot"] = $id_provinsi;
        $datanya["nama_provinsimkabkot"] = $nama_provinsi;
        $datanya["id_kabupatenmkabkot"] = $id_kabupaten;
        $datanya["nama_kabupatenmkabkot"] = $nama_kabupaten;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>