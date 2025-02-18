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
    
    $offset = ($page-1)*$rows;
    $result = array();

    $tahun2 = isset($_REQUEST['tahunpmutasicari']) ? $_REQUEST['tahunpmutasicari'] : date("Y");
    $nama2 = isset($_REQUEST['namapmutasicari']) ? $_REQUEST['namapmutasicari'] : "";
    $perintah = "";
    if($nama2!=""){
        $perintah .= " and b.nama like '%$nama2%'";
    }
    
    $rs = mysqli_query($koneksi,"select count(*) from pendapatan_mutasi a left join data_pegawai b on a.nip=b.nip where a.tahun='$tahun2'".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select a.*,b.nama from pendapatan_mutasi a left join data_pegawai b on a.nip=b.nip where a.tahun='$tahun2'".$perintah." order by a.id asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashesx ($hasil['id']);
    	$nip = stripslashesx ($hasil['nip']);
    	$nama = stripslashesx ($hasil['nama']);
    	$tahun = stripslashesx ($hasil['tahun']);
    	$blth_awal = stripslashesx ($hasil['blth_awal']);
    	$blth_akhir = stripslashesx ($hasil['blth_akhir']);
        $netto = stripslashesx ($hasil['netto']);
        $pph21 = stripslashesx ($hasil['pph21']);
        
        $datanya = array();
        $datanya["idpmutasi"] = $id;
        $datanya["nippmutasi"] = $nip;
        $datanya["namapmutasi"] = $nama;
        $datanya["tahunpmutasi"] = $tahun;
        $datanya["blth_awalpmutasi"] = $blth_awal;
        $datanya["blth_akhirpmutasi"] = $blth_akhir;
        $datanya["nettopmutasi"] = $netto;
        $datanya["pph21pmutasi"] = $pph21;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>