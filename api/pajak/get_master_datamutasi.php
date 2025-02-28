<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
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

    $tahun2 = isset($_POST['tahundatamutasicari']) ? $_POST['tahundatamutasicari'] : date("Y");

    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $rs = mysqli_query($koneksi,"select count(*) from pendapatan_mutasi where tahun='$tahun2'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $items = array();
    $rs = mysqli_query($koneksi,"select a.*,b.nama,b.jabatan from pendapatan_mutasi a left join data_pegawai b on a.nip=b.nip where a.tahun='$tahun2' order by a.id asc limit $offset,$rows");
    // echo "select a.*,b.nama,b.jabatan from pendapatan_mutasi a left join data_pegawai b on a.nip=b.nip where a.tahun='$tahun2' order by a.id asc limit $offset,$rows";
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$nama = stripslashes ($hasil['nama']);
    	$jabatan = stripslashes ($hasil['jabatan']);
    	$tahun = stripslashes ($hasil['tahun']);
    	$blth_awal = stripslashes ($hasil['blth_awal']);
    	$blth_akhir = stripslashes ($hasil['blth_akhir']);
    	$netto = floatval($hasil['netto']);
    	$pph21 = floatval($hasil['pph21']);
        
        $datanya = array();
        $datanya["iddatamutasi"] = $id;
        $datanya["nipdatamutasi"] = $nip;
        $datanya["namadatamutasi"] = $nama;
        $datanya["jabatandatamutasi"] = $jabatan;
        $datanya["tahundatamutasi"] = $tahun;
        $datanya["blth_awaldatamutasi"] = $blth_awal;
        $datanya["blth_akhirdatamutasi"] = $blth_akhir;
        $datanya["nettodatamutasi"] = $netto;
        $datanya["pph21datamutasi"] = $pph21;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>