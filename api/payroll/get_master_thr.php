<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $tahun_ini = date("Y");
    $nip2 = isset($_POST['nipthrcari']) ? $_POST['nipthrcari'] : "";
    $tahun2 = isset($_POST['tahunthrcari']) ? $_POST['tahunthrcari'] : date("Y");
    $jenisthr2 = isset($_POST['jenisthrthrcari']) ? $_POST['jenisthrthrcari'] :"0";
    
    $offset = ($page-1)*$rows;
    $result = array();
    $perintah = "";    
    if($jenisthr2!="0"){
        $perintah .= " and a.jenisthr='$jenisthr2'";
    }
    if($nip2!=""){
        $perintah .= " and (a.nip='$nip2' or b.nama like '%$nip2%')";
    }
    
    $offset = ($page-1)*$rows;
    $result = array();
    //$rs = mysqli_query($koneksi,"select count(*) from gaji a left join data_pegawai b on a.nip=b.nip where a.blth='$blth2'".$perintah);
    $rs = mysqli_query($koneksi,"select count(*) from thr a left join data_pegawai b on a.nip=b.nip where a.tahun='$tahun2'".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $items = array();
    $rs = mysqli_query($koneksi,"select a.*,b.nama,b.nama_bank,b.no_rekening,b.nama_rekening from thr a left join data_pegawai b on a.nip=b.nip where a.tahun='$tahun2'".$perintah." order by id asc limit $offset,$rows");
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashesx ($hasil['id']);
        $jenisthr = stripslashesx ($hasil['jenisthr']);
    	$blth = stripslashesx ($hasil['blth']);
    	$nip = stripslashesx ($hasil['nip']);
    	$nama_lengkap = stripslashesx ($hasil['nama']);
    	$agama = stripslashesx ($hasil['agama']);
    	$blth_awal = stripslashesx ($hasil['blth_awal']);
    	$blth_akhir = stripslashesx ($hasil['blth_akhir']);
    	$jumlah_bulan = intval(stripslashesx ($hasil['jumlah_bulan']));
    	$p1 = floatval(stripslashesx ($hasil['p1']));
        $koefisien = intval(stripslashesx ($hasil['koefisien']));
    	$thr = floatval(stripslashesx ($hasil['thr']));
        $bank_payroll = stripslashesx ($hasil['nama_bank']);
        $no_rek_payroll = stripslashesx ($hasil['no_rekening']);
        $an_payroll = stripslashesx ($hasil['nama_bank']);

        $rs2 = mysqli_query($koneksi,"select nama_jenisthr from jenis_thr where jenisthr='$jenisthr'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $nama_jenisthr = stripslashesx ($hasil2['nama_jenisthr']);
        } else {
            $nama_jenisthr = "";
        }
        // if($jenisthr==="1"){
        //     $nama_jenisthr = "THR IDUL FITRI";
        // } else if($jenisthr==="2"){
        //     $nama_jenisthr = "THR NATAL";
        // } else if($jenisthr==="3"){
        //     $nama_jenisthr = "THR NYEPI";
        // } else if($jenisthr==="4"){
        //     $nama_jenisthr = "THR WAISAK";
        // } else {
        //     $nama_jenisthr = "";
        // }

        // $rs2 = mysqli_query($koneksi,"select label from m_agama where id_agama='$agama'");
        // $hasil2 = mysqli_fetch_array($rs2);
        // if($hasil2){
        //     $agama2 = stripslashesx ($hasil2['label']);
        // } else {
        //     $agama2 = "";
        // }

        // $rs2 = mysqli_query($koneksi,"select label from m_agama where id_agama='$agama'");
        // $hasil2 = mysqli_fetch_array($rs2);
        // if($hasil2){
        //     $agama1 = stripslashesx ($hasil2['label']);
        // } else {
        //     $agama1 = "";
        // }

        if($agama=="I"){
            $nama_agama = "Islam";
        } else if($agama=="K"){
            $nama_agama = "Khatolik";
        } else if($agama=="P"){
            $nama_agama = "Protestan";
        } else if($agama=="H"){
            $nama_agama = "Hindu";
        } else if($agama=="B"){
            $nama_agama = "Budha";
        } else {
            $nama_agama = "";
        }
        // if($agama1!=""){
        //     $nama_agama = $agama1;
        // } else {
        //     $nama_agama = $agama2;
        // }

    
        $datanya = array();
        $datanya["idthr"] = $id;
        $datanya["jenisthrthr"] = $jenisthr;
        $datanya["nama_jenisthrthr"] = $nama_jenisthr;
        $datanya["blththr"] = $blth;
        $datanya["nipthr"] = $nip;
        $datanya["nama_lengkapthr"] = $nama_lengkap;
        $datanya["agamathr"] = $agama;
        $datanya["agama2thr"] = $nama_agama;
        $datanya["blth_awalthr"] = $blth_awal;
        $datanya["blth_akhirthr"] = $blth_akhir;
        $datanya["jumlah_bulanthr"] = $jumlah_bulan;
        $datanya["p1thr"] = $p1;
        $datanya["koefisienthr"] = $koefisien;
        $datanya["thrthr"] = $thr;
        $datanya["bank_payrollthr"] = $bank_payroll;
        $datanya["no_rek_payrollthr"] = $no_rek_payroll;
        $datanya["an_payrollthr"] = $an_payroll;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>