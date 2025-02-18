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
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
    
    $offset = ($page-1)*$rows;
    $result = array();

    $blth2 = isset($_REQUEST['blthsuplisicari']) ? $_REQUEST['blthsuplisicari'] : date("Y-m");
    $nama2 = isset($_REQUEST['namasuplisicari']) ? $_REQUEST['namasuplisicari'] : "";
    $perintah = "";
    if($nama2!=""){
        $perintah .= " and b.nama like '%$nama2%'";
    }
    
    $rs = mysqli_query($koneksi,"select count(*) from suplisi a left join data_pegawai b on a.nip=b.nip where a.blth='$blth2'".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select a.*,b.nama from suplisi a left join data_pegawai b on a.nip=b.nip where a.blth='$blth2'".$perintah." order by a.id asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashesx ($hasil['id']);
    	$nip = stripslashesx ($hasil['nip']);
    	$nama = stripslashesx ($hasil['nama']);
    	$blth = stripslashesx ($hasil['blth']);
    	$gaji = stripslashesx ($hasil['gaji']);
    	$tunjangan_posisi = stripslashesx ($hasil['tunjangan_posisi']);
        $p21b = stripslashesx ($hasil['p21b']);
        $tunjangan_kemahalan = stripslashesx ($hasil['tunjangan_kemahalan']);
        $tunjangan_perumahan = stripslashesx ($hasil['tunjangan_perumahan']);
        $tunjangan_transportasi = stripslashesx ($hasil['tunjangan_transportasi']);
        $bantuan_pulsa = stripslashesx ($hasil['bantuan_pulsa']);
        $cuti = stripslashesx ($hasil['cuti']);
        $thr = stripslashesx ($hasil['thr']);
        $iks = stripslashesx ($hasil['iks']);
        $bonus = stripslashesx ($hasil['bonus']);
        $winduan = stripslashesx ($hasil['winduan']);
        $honorarium_eo = stripslashesx ($hasil['honorarium_eo']);
        $keterangan = stripslashesx ($hasil['keterangan']);
        $jumlah_suplisi = $gaji+$tunjangan_posisi+$p21b+$tunjangan_kemahalan+$tunjangan_perumahan+$tunjangan_transportasi+$bantuan_pulsa+$cuti+$thr+$iks+$bonus+$winduan+$honorarium_eo;
        
        $datanya = array();
        $datanya["idsuplisi"] = $id;
        $datanya["nipsuplisi"] = $nip;
        $datanya["namasuplisi"] = $nama;
        $datanya["blthsuplisi"] = $blth;
        $datanya["gajisuplisi"] = $gaji;
        $datanya["tunjangan_posisisuplisi"] = $tunjangan_posisi;
        $datanya["p21bsuplisi"] = $p21b;
        $datanya["tunjangan_kemahalansuplisi"] = $tunjangan_kemahalan;
        $datanya["tunjangan_perumahansuplisi"] = $tunjangan_perumahan;
        $datanya["tunjangan_transportasisuplisi"] = $tunjangan_transportasi;
        $datanya["bantuan_pulsasuplisi"] = $bantuan_pulsa;
        $datanya["cutisuplisi"] = $cuti;
        $datanya["thrsuplisi"] = $thr;
        $datanya["ikssuplisi"] = $iks;
        $datanya["bonussuplisi"] = $bonus;
        $datanya["winduansuplisi"] = $winduan;
        $datanya["honorarium_eosuplisi"] = $honorarium_eo;
        $datanya["jumlah_suplisisuplisi"] = $jumlah_suplisi;
        $datanya["keterangansuplisi"] = $keterangan;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>