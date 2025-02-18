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
    include "../fungsi.php";    
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    // $nama2 = isset($_POST['namamappingcari']) ? $_POST['namamappingcari'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    // $perintah = "";
    // if($nama2!=""){
    //     $perintah .= " and (nip='$nama2' or nama like '%$nama2%')";
    // }
    
    $rs = mysqli_query($koneksi,"select count(*) from master_mapping");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $items = array();
    $rs = mysqli_query($koneksi,"select * from master_mapping order by kolom,id asc limit $offset,$rows");
    while ($hasil = mysqli_fetch_array($rs)) {    	
        $id = stripslashesx ($hasil['id']);
        $kolom = stripslashesx ($hasil['kolom']);
        $kode_akun = stripslashesx ($hasil['kode_akun']);
        $nama_akun = stripslashesx ($hasil['nama_akun']);
        
        $datanya = array();
        $datanya["idmapping"] = $id;
        $datanya["kolommapping"] = $kolom;
        $datanya["kode_akunmapping"] = $kode_akun;
        $datanya["nama_akunmapping"] = $nama_akun;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>