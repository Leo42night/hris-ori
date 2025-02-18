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

    $blth2 = isset($_REQUEST['blthnaturacari']) ? $_REQUEST['blthnaturacari'] : date("Y-m");
    $nama2 = isset($_REQUEST['namanaturacari']) ? $_REQUEST['namanaturacari'] : "";
    $perintah = "";
    if($nama2!=""){
        $perintah .= " and (a.nip='$nama2' or b.nama like '%$nama2%')";
    }
    
    $rs = mysqli_query($koneksi,"select count(*) from natura a left join data_pegawai b on a.nip=b.nip where a.blth='$blth2'".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select a.*,b.nama,b.jabatan from natura a left join data_pegawai b on a.nip=b.nip where a.blth='$blth2'".$perintah." order by a.id asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashesx ($hasil['id']);
    	$nip = stripslashesx ($hasil['nip']);
    	$nama = stripslashesx ($hasil['nama']);
    	$jabatan = stripslashesx ($hasil['jabatan']);
    	$blth = stripslashesx ($hasil['blth']);
    	$blthnip = stripslashesx ($hasil['blthnip']);
    	$cop = stripslashesx ($hasil['cop']);
        $fasilitas_hp = stripslashesx ($hasil['fasilitas_hp']);
        $reimburse_kesehatan = stripslashesx ($hasil['reimburse_kesehatan']);
        $asuransi_kesehatan = stripslashesx ($hasil['asuransi_kesehatan']);
        $sarana_kerja = stripslashesx ($hasil['sarana_kerja']);
        $sppd_manual = stripslashesx ($hasil['sppd_manual']);
        $asuransi_purna_jabatan = stripslashesx ($hasil['asuransi_purna_jabatan']);
        $medical_checkup = stripslashesx ($hasil['medical_checkup']);
        $non_rutin_penyesuaian = stripslashesx ($hasil['non_rutin_penyesuaian']);
        
        $datanya = array();
        $datanya["idnatura"] = $id;
        $datanya["nipnatura"] = $nip;
        $datanya["namanatura"] = $nama;
        $datanya["jabatannatura"] = $jabatan;
        $datanya["blthnatura"] = $blth;
        $datanya["blthnipnatura"] = $blthnip;
        $datanya["copnatura"] = $cop;
        $datanya["fasilitas_hpnatura"] = $fasilitas_hp;
        $datanya["reimburse_kesehatannatura"] = $reimburse_kesehatan;
        $datanya["asuransi_kesehatannatura"] = $asuransi_kesehatan;
        $datanya["sarana_kerjanatura"] = $sarana_kerja;
        $datanya["sppd_manualnatura"] = $sppd_manual;
        $datanya["asuransi_purna_jabatannatura"] = $asuransi_purna_jabatan;
        $datanya["medical_checkupnatura"] = $medical_checkup;
        $datanya["non_rutin_penyesuaiannatura"] = $non_rutin_penyesuaian;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>