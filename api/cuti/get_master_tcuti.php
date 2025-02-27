<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";
if ($userhris){
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $tahun_ini = date("Y");
    $nip2 = isset($_POST['niptcuticari']) ? $_POST['niptcuticari'] : "";
    $blth2 = isset($_POST['blthtcuticari']) ? $_POST['blthtcuticari'] : date("Y-m");
    
    $offset = ($page-1)*$rows;
    $result = array();
    $perintah = "";    
    if($nip2!=""){
        $perintah .= " and (a.nip='$nip2' or b.nama like '%$nip2%')";
    }
    
    $offset = ($page-1)*$rows;
    $result = array();
    $rs = mysqli_query($koneksi,"select count(*) from cuti_tahunan a left join data_pegawai b on a.nip=b.nip where a.blth='$blth2'".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $items = array();
    $rs = mysqli_query($koneksi,"select a.*,b.nama,b.nama_bank,b.no_rekening,b.nama_rekening from cuti_tahunan a left join data_pegawai b on a.nip=b.nip where a.blth='$blth2'".$perintah." order by id asc limit $offset,$rows");
    // echo "select a.*,b.nama,b.nama_bank,b.no_rekening,b.nama_rekening from cuti_tahunan a left join data_pegawai b on a.nip=b.nip where a.blth='$blth2'".$perintah." order by id asc limit $offset,$rows";
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashesx ($hasil['id']);
    	$blth = stripslashesx ($hasil['blth']);
    	$nip = stripslashesx ($hasil['nip']);
    	$nama_lengkap = stripslashesx ($hasil['nama']);
    	$uang_cuti = floatval(stripslashesx ($hasil['uang_cuti']));
        // $blth_awal = stripslashesx ($hasil['blth_awal']);
        // $blth_akhir = stripslashesx ($hasil['blth_akhir']);
        $bank_payroll = stripslashesx ($hasil['nama_bank']);
        $no_rek_payroll = stripslashesx ($hasil['no_rekening']);
        $an_payroll = stripslashesx ($hasil['nama_rekening']);
        // if($blth_awal=="" || $blth_akhir==""){
        //     $blth2 = $blth."-01";
        //     $blth_akhir = date('Y-m', strtotime($blth2.'-1 days'));
        //     $blth_akhir2 = date('Y-m-t', strtotime($blth_akhir));
        //     $blth_awal = date('Y-m', strtotime($blth_akhir2.'-12 months'));    
        // }

        $datanya = array();
        $datanya["idtcuti"] = $id;
        $datanya["blthtcuti"] = $blth;
        $datanya["niptcuti"] = $nip;
        $datanya["nama_lengkaptcuti"] = $nama_lengkap;
        $datanya["uang_cutitcuti"] = $uang_cuti;
        // $datanya["blth_awaltcuti"] = $blth_awal;
        // $datanya["blth_akhirtcuti"] = $blth_akhir;
        $datanya["bank_payrolltcuti"] = $bank_payroll;
        $datanya["no_rek_payrolltcuti"] = $no_rek_payroll;
        $datanya["an_payrolltcuti"] = $an_payroll;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>