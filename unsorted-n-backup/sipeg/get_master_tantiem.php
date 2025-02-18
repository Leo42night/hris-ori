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
    
    $offset = ($page-1)*$rows;
    $result = array();

    $tahun2 = isset($_POST['tahuntantiemcari']) ? $_POST['tahuntantiemcari'] : date("Y");
    
    $rs = mysqli_query($koneksi,"select count(*) from tantiem");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $items = array();
    $rs = mysqli_query($koneksi,"select a.*,b.nama,b.jabatan from tantiem a left join data_pegawai b on a.nip=b.nip where substr(a.blth,1,4)='$tahun2' order by a.id asc limit $offset,$rows");
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$tahun = stripslashes ($hasil['tahun']);
    	$blth = stripslashes ($hasil['blth']);
    	$nip = stripslashes ($hasil['nip']);
    	$nama = stripslashes ($hasil['nama']);
    	$jabatan = stripslashes ($hasil['jabatan']);
    	$tantiem = floatval($hasil['tantiem']);
    	$pph21 = floatval($hasil['pph21']);
        
        $datanya = array();
        $datanya["idtantiem"] = $id;
        $datanya["tahuntantiem"] = $tahun;
        $datanya["blthtantiem"] = $blth;
        $datanya["niptantiem"] = $nip;
        $datanya["namatantiem"] = $nama;
        $datanya["jabatantantiem"] = $jabatan;
        $datanya["tantiemtantiem"] = $tantiem;
        $datanya["pph21tantiem"] = $pph21;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>