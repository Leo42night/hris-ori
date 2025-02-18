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
    include "koneksi_sipeg.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $blth_ini = date("Y-m");    
    //$blth2 = isset($_POST['blthrijincari']) ? $_POST['blthrijincari'] : "";
    $jenis_ijin2 = isset($_POST['jenis_ijinrijincari']) ? $_POST['jenis_ijinrijincari'] : "semua";
    $nip2 = isset($_POST['nipmcuticari']) ? $_POST['nipmcuticari'] : "";
    $perintah = "";
    if($jenis_ijin2!="semua"){
        $perintah .= " and a.jenis_ijin='$jenis_ijin2'";
    }
    if($nip2!=""){
        $perintah .= " and (a.nip='$nip2' or b.nama like '%$nip2%')";
    }
    
    $offset = ($page-1)*$rows;
    $result = array();
    $rs = mysqli_query($koneksi,"select count(a.id) from ijin a inner join data_pegawai b on a.nip=b.nip where b.aktif='1'".$perintah);
    //$rs = mysqli_query($koneksi,"select count(*) from ijin");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    


    $items = array();
    $no=1;
    $rs2 = mysqli_query($koneksi,"select a.*,b.nama,b.jabatan,b.aktif from ijin a inner join data_pegawai b on a.nip=b.nip where b.aktif='1'".$perintah." order by tgl_awal desc, id desc limit $offset,$rows");
    while ($hasil2 = mysqli_fetch_array($rs2)) {
    	$id = stripslashes ($hasil2['id']);
        $nip = stripslashes ($hasil2['nip']);
    	$nama = stripslashes ($hasil2['nama']);
        $jabatan = stripslashes ($hasil2['jabatan']);
        $tgl_pengajuan = stripslashes ($hasil2['tgl_pengajuan']);
        $tgl_pengajuan2 = TanggalIndo2($tgl_pengajuan);
        $jenis_ijin = stripslashes ($hasil2['jenis_ijin']);
        $tgl_mulai = stripslashes ($hasil2['tgl_awal']);
        $tgl_mulai2 = TanggalIndo2($tgl_mulai);
        $tgl_selesai = stripslashes ($hasil2['tgl_akhir']);
        $tgl_selesai2 = TanggalIndo2($tgl_selesai);
        $hari = stripslashes ($hasil2['hari']);
        $alasan_ijin = stripslashes ($hasil2['alasan_ijin']);
        $eviden2 = stripslashes ($hasil2['eviden']);
        if($eviden2!=""){
            $eviden = "android/evidenijin/".$eviden2;
        } else {
            $eviden = "";
        }
    
        $approve1 = stripslashes ($hasil2['approve1']);
        $tgl_approve1 = stripslashes ($hasil2['tgl_approve1']);
        $tgl_approve12 = TanggalIndo2($tgl_approve1);
        $approval1 = stripslashes ($hasil2['approval1']);
        $alasan_reject1 = stripslashes ($hasil2['alasan_reject1']);
        if($approval1!=""){
            $rs31 = mysqli_query($koneksi,"select nama from data_pegawai where nip='$approval1'");
            $hasil31 = mysqli_fetch_array($rs31);
            if($hasil31){
                $nama_approval1 = stripslashes ($hasil31['nama']);
            } else {
                $nama_approval1 = "";
            }
        } else {
            $nama_approval1 = "";
        }
    
        $approve2 = stripslashes ($hasil2['approve2']);
        $tgl_approve2 = stripslashes ($hasil2['tgl_approve2']);
        $tgl_approve22 = TanggalIndo2($tgl_approve2);
        $approval2 = stripslashes ($hasil2['approval2']);
        $alasan_reject2 = stripslashes ($hasil2['alasan_reject2']);
        if($approval2!=""){
            $rs32 = mysqli_query($koneksi,"select nama from data_pegawai where nip='$approval2'");
            $hasil32 = mysqli_fetch_array($rs32);
            if($hasil32){
                $nama_approval2 = stripslashes ($hasil32['nama']);
            } else {
                $nama_approval2 = "";
            }
        } else {
            $nama_approval2 = "";
        }
    
        $datanya = array();
        $datanya["idrijin"] = $id;
        $datanya["tgl_pengajuanrijin"] = $tgl_pengajuan;
        $datanya["tgl_pengajuan2rijin"] = $tgl_pengajuan2;
        $datanya["niprijin"] = $nip;
        $datanya["namarijin"] = $nama;
        $datanya["jabatanrijin"] = $jabatan;
        $datanya["jenis_ijinrijin"] = $jenis_ijin;
        $datanya["tgl_awalrijin"] = $tgl_mulai;
        $datanya["tgl_awal2rijin"] = $tgl_mulai2;
        $datanya["tgl_akhirrijin"] = $tgl_selesai;
        $datanya["tgl_akhir2rijin"] = $tgl_selesai2;
        $datanya["haririjin"] = $hari;
        $datanya["alasan_ijinrijin"] = $alasan_ijin;
        $datanya["evidenrijin"] = $eviden;
    
        $datanya["approve1rijin"] = $approve1;
        $datanya["tgl_approve1rijin"] = $tgl_approve1;
        $datanya["tgl_approve12rijin"] = $tgl_approve12;
        $datanya["approval1rijin"] = $approval1;
        $datanya["alasan_reject1rijin"] = $alasan_reject1;
        $datanya["nama_approval1rijin"] = $nama_approval1;
    
        $datanya["approve2rijin"] = $approve2;
        $datanya["tgl_approve2rijin"] = $tgl_approve2;
        $datanya["tgl_approve22rijin"] = $tgl_approve22;
        $datanya["approval2rijin"] = $approval2;
        $datanya["alasan_reject2rijin"] = $alasan_reject2;
        $datanya["nama_approval2rijin"] = $nama_approval2;
        array_push($items, $datanya);
        $no=$no+1;
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>