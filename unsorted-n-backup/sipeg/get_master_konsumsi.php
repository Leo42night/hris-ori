<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    function TanggalIndo2($date){
        if(!is_null($date) && strtotime($date)){
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $result = $tgl . "-" . $bulan . "-". $tahun;	
            return($result);
        } else {
            return("");
        }
    }
    include "koneksi.php";
    include "../fungsi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $blth_ini = date("Y-m");    
    //$blth2 = isset($_POST['blthkonsumsicari']) ? $_POST['blthkonsumsicari'] : "";
    $tgl_awal = isset($_POST['tgl_awalkonsumsicari']) ? $_POST['tgl_awalkonsumsicari'] : date("Y-m-01");
    $tgl_akhir = isset($_POST['tgl_akhirkonsumsicari']) ? $_POST['tgl_akhirkonsumsicari'] : date("Y-m-t");
    $nip2 = isset($_POST['nipkonsumsicari']) ? $_POST['nipkonsumsicari'] : "";
    $perintah = "";
    if($nip2!=""){
        $perintah .= " and (a.nip='$nip2' or b.nama like '%$nip2%')";
    }
    
    $offset = ($page-1)*$rows;
    $result = array();
    $rs = mysqli_query($koneksi,"select count(a.id) from konsumsi a inner join data_pegawai b on a.user_permintaan=b.nip where a.tgl_acara>='$tgl_awal' and a.tgl_acara<='$tgl_akhir'".$perintah);
    //$rs = mysqli_query($koneksi,"select count(*) from ijin");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    


    $items = array();
    $no=1;
    $rs2 = mysqli_query($koneksi,"select a.*,b.nama as nama_permintaan,b.jabatan from konsumsi a inner join data_pegawai b on a.user_permintaan=b.nip where a.tgl_acara>='$tgl_awal' and a.tgl_acara<='$tgl_akhir'".$perintah." order by tgl_acara desc, id desc limit $offset,$rows");
    while ($hasil2 = mysqli_fetch_array($rs2)) {
    	$id = stripslashesx ($hasil2['id']);
        $no_pengajuan = stripslashesx ($hasil2['no_pengajuan']);
        $user_permintaan = stripslashesx ($hasil2['user_permintaan']);
    	$nama_permintaan = stripslashesx ($hasil2['nama_permintaan']);
        $jabatan = stripslashesx ($hasil2['jabatan']);
        $tgl_permintaan = stripslashesx ($hasil2['tgl_permintaan']);
        $tgl_permintaan2 = TanggalIndo2($tgl_permintaan);
        $jenis_acara = stripslashesx ($hasil2['jenis_acara']);
        $uraian_acara = stripslashesx ($hasil2['uraian_acara']);
        $lokasi = stripslashesx ($hasil2['lokasi']);
        $tgl_acara = stripslashesx ($hasil2['tgl_acara']);
        $tgl_acara2 = TanggalIndo2($tgl_acara);
        $jam_mulai = stripslashesx ($hasil2['jam_mulai']);
        $jam_selesai = stripslashesx ($hasil2['jam_selesai']);
        $jumlah_peserta = stripslashesx ($hasil2['jumlah_peserta']);
        $jenis_makanan = stripslashesx ($hasil2['jenis_makanan']);
        $uraian_makanan = stripslashesx ($hasil2['uraian_makanan']);
        $uraian_minuman = stripslashesx ($hasil2['uraian_minuman']);
    
        $approve1 = stripslashesx ($hasil2['approve1']);
        $tgl_approve1 = stripslashesx ($hasil2['tgl_approve1']);
        $tgl_approve12 = TanggalIndo2($tgl_approve1);
        $approval1 = stripslashesx ($hasil2['approval1']);
        $alasan_reject1 = stripslashesx ($hasil2['alasan_reject1']);
        if($approval1!=""){
            $rs31 = mysqli_query($koneksi,"select nama from data_pegawai where nip='$approval1'");
            $hasil31 = mysqli_fetch_array($rs31);
            if($hasil31){
                $nama_approval1 = stripslashesx ($hasil31['nama']);
            } else {
                $nama_approval1 = "";
            }
        } else {
            $nama_approval1 = "";
        }
        $approve2 = stripslashesx ($hasil2['approve2']);
        $tgl_approve2 = stripslashesx ($hasil2['tgl_approve2']);
        $tgl_approve22 = TanggalIndo2($tgl_approve2);
        $approval2 = stripslashesx ($hasil2['approval2']);
        $alasan_reject2 = stripslashesx ($hasil2['alasan_reject2']);
        if($approval2!=""){
            $rs31 = mysqli_query($koneksi,"select nama from data_pegawai where nip='$approval2'");
            $hasil31 = mysqli_fetch_array($rs31);
            if($hasil31){
                $nama_approval2 = stripslashesx ($hasil31['nama']);
            } else {
                $nama_approval2 = "";
            }
        } else {
            $nama_approval2 = "";
        }
        $approve3 = stripslashesx ($hasil2['approve3']);
        $tgl_approve3 = stripslashesx ($hasil2['tgl_approve3']);
        $tgl_approve32 = TanggalIndo2($tgl_approve3);
        $approval3 = stripslashesx ($hasil2['approval3']);
        $alasan_reject3 = stripslashesx ($hasil2['alasan_reject3']);
        if($approval3!=""){
            $rs31 = mysqli_query($koneksi,"select nama from data_pegawai where nip='$approval3'");
            $hasil31 = mysqli_fetch_array($rs31);
            if($hasil31){
                $nama_approval3 = stripslashesx ($hasil31['nama']);
            } else {
                $nama_approval3 = "";
            }
        } else {
            $nama_approval3 = "";
        }
    
        $datanya = array();
        $datanya["idkonsumsi"] = $id;
        $datanya["no_pengajuankonsumsi"] = $no_pengajuan;
        $datanya["tgl_permintaankonsumsi"] = $tgl_permintaan;
        $datanya["tgl_permintaan2konsumsi"] = $tgl_permintaan2;
        $datanya["user_permintaankonsumsi"] = $user_permintaan;
        $datanya["nama_permintaankonsumsi"] = $nama_permintaan;
        $datanya["jabatankonsumsi"] = $jabatan;
        $datanya["jenis_acarakonsumsi"] = $jenis_acara;
        $datanya["uraian_acarakonsumsi"] = $uraian_acara;
        $datanya["lokasikonsumsi"] = $lokasi;
        $datanya["tgl_acarakonsumsi"] = $tgl_acara;
        $datanya["tgl_acara2konsumsi"] = $tgl_acara2;
        $datanya["jam_mulaikonsumsi"] = $jam_mulai;
        $datanya["jam_selesaikonsumsi"] = $jam_selesai;
        $datanya["jumlah_pesertakonsumsi"] = $jumlah_peserta;
        $datanya["jenis_makanankonsumsi"] = $jenis_makanan;
        $datanya["uraian_makanankonsumsi"] = $uraian_makanan;
        $datanya["uraian_minumankonsumsi"] = $uraian_minuman;
    
        $datanya["approve1konsumsi"] = $approve1;
        $datanya["tgl_approve1konsumsi"] = $tgl_approve1;
        $datanya["tgl_approve12konsumsi"] = $tgl_approve12;
        $datanya["approval1konsumsi"] = $approval1;
        $datanya["alasan_reject1konsumsi"] = $alasan_reject1;
        $datanya["nama_approval1konsumsi"] = $nama_approval1;
    
        $datanya["approve2konsumsi"] = $approve2;
        $datanya["tgl_approve2konsumsi"] = $tgl_approve2;
        $datanya["tgl_approve22konsumsi"] = $tgl_approve22;
        $datanya["approval2konsumsi"] = $approval2;
        $datanya["alasan_reject2konsumsi"] = $alasan_reject2;
        $datanya["nama_approval2konsumsi"] = $nama_approval2;
    
        $datanya["approve3konsumsi"] = $approve3;
        $datanya["tgl_approve3konsumsi"] = $tgl_approve3;
        $datanya["tgl_approve32konsumsi"] = $tgl_approve32;
        $datanya["approval3konsumsi"] = $approval3;
        $datanya["alasan_reject3konsumsi"] = $alasan_reject3;
        $datanya["nama_approval3konsumsi"] = $nama_approval3;
        array_push($items, $datanya);
        $no=$no+1;
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>