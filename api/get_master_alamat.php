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
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $nip2 = isset($_REQUEST['nip']) ? $_REQUEST['nip'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $rs = mysqli_query($koneksi,"select count(*) from r_alamat where nip='$nip2'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from r_alamat where nip='$nip2' order by id desc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$start_date = stripslashes ($hasil['start_date']);
        $start_date2 = TanggalIndo2($start_date);
    	$end_date = stripslashes ($hasil['end_date']);
        $end_date2 = TanggalIndo2($end_date);
        $jenis_alamat = stripslashes ($hasil['jenis_alamat']);
            $rs2 = mysqli_query($koneksi,"select label from m_jenis_alamat where kode='$jenis_alamat'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_alamat2 = stripslashes ($hasil2['label']);        
            } else {
                $jenis_alamat2 = "";
            }
    	$rumah_atas_nama = stripslashes ($hasil['rumah_atas_nama']);
        $alamat_lengkap = stripslashes ($hasil['alamat_lengkap']);
        $id_provinsi = stripslashes ($hasil['id_provinsi']);
            $rs2 = mysqli_query($koneksi,"select nama_provinsi from m_provinsi where id_provinsi='$id_provinsi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_provinsi = stripslashes ($hasil2['nama_provinsi']);
            } else {
                $nama_provinsi = "";
            }
        $id_kabupaten = stripslashes ($hasil['id_kabupaten']);
            $rs2 = mysqli_query($koneksi,"select nama_kabupaten from m_kabupaten where id_provinsi='$id_provinsi' and id_kabupaten='$id_kabupaten'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_kabupaten = stripslashes ($hasil2['nama_kabupaten']);
            } else {
                $nama_kabupaten = "";
            }
        $kode_pos = stripslashes ($hasil['kode_pos']);
        $negara = stripslashes ($hasil['negara']);
            $rs2 = mysqli_query($koneksi,"select nama_negara from m_negara where kode_negara='$negara'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $negara2 = stripslashes ($hasil2['nama_negara']);        
            } else {
                $negara2 = "";
            }
        $jarak = stripslashes ($hasil['jarak']);
        
        $datanya = array();
        $datanya["idalamat"] = $id;
        $datanya["nipalamat"] = $nip;
        $datanya["start_datealamat"] = $start_date;
        $datanya["start_date2alamat"] = $start_date2;
        $datanya["end_datealamat"] = $end_date;
        $datanya["end_date2alamat"] = $end_date2;
        $datanya["jenis_alamatalamat"] = $jenis_alamat;
        $datanya["jenis_alamat2alamat"] = $jenis_alamat2;
        $datanya["alamat_lengkapalamat"] = $alamat_lengkap;
        $datanya["rumah_atas_namaalamat"] = $rumah_atas_nama;
        $datanya["id_provinsialamat"] = $id_provinsi;
        $datanya["nama_provinsialamat"] = $nama_provinsi;
        $datanya["id_kabupatenalamat"] = $id_kabupaten;
        $datanya["nama_kabupatenalamat"] = $nama_kabupaten;
        $datanya["kode_posalamat"] = $kode_pos;
        $datanya["negaraalamat"] = $negara;
        $datanya["negara2alamat"] = $negara2;
        $datanya["jarakalamat"] = $jarak;
        $datanya["jarak2alamat"] = number_format(floatval($jarak),0,',','.')." KM";
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>