<?php
session_start();
$userhris = $_SESSION["userakseshris"];
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

    $tahun_ini = date("Y");
    $status2 = isset($_POST['statusrestitusicari']) ? $_POST['statusrestitusicari'] : "0";
    $nip2 = isset($_POST['niprestitusicari']) ? $_POST['niprestitusicari'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    $perintah = "";    
    if($status2!="9"){        
        if($perintah==""){
            $perintah .= " where validasi_restitusi='$status2'";
        } else {
            $perintah .= " and validasi_restitusi='$status2'";
        }
    }
    if($nip2!=""){
        if($perintah==""){
            $perintah .= " where (nip='$nip2' or nama like '%$nip2%')";
        } else {
            $perintah .= " and (nip='$nip2' or nama like '%$nip2%')";
        }
    }
    
    $offset = ($page-1)*$rows;
    $result = array();
    // $rs = mysqli_query($koneksi,"select count(*) from v_sppd where restitusi>0".$perintah);
    // $rs = mysqli_query($koneksi,"select count(*) from v_sppd where restitusi>0".$perintah);
    $rs = mysqli_query($koneksi,"select count(*) from sppd1".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    //$result["total"] = mysqli_num_rows($rs);
    
    $items = array();
    // $rs = mysqli_query($koneksi,"select * from v_sppd where restitusi>0".$perintah." order by id desc limit $offset,$rows");
    $rs = mysqli_query($koneksi,"select * from sppd1".$perintah." order by id desc limit $offset,$rows");
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = $hasil['id'];
    	$idsppd = $hasil['idsppd'];
    	$tanggal = $hasil['tanggal'];
        $tanggal2 = TanggalIndo2($tanggal);
    	$tingkat_sppd = $hasil['tingkat_sppd'];
            $rs2 = mysqli_query($koneksi,"select nama_tingkat from tingkat_sppd where kd_tingkat='$tingkat_sppd'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $tingkat_sppd2 = $hasil2['nama_tingkat'];
            } else {
                $tingkat_sppd2 = "";
            }
    	$jenis_sppd = $hasil['jenis_sppd'];
            $rs2 = mysqli_query($koneksi,"select nama_sppd from jenis_sppd where kd_sppd='$jenis_sppd'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_sppd2 = $hasil2['nama_sppd'];
            } else {
                $jenis_sppd2 = "";
            }
    	$level_sppd = $hasil['level_sppd'];
            $rs2 = mysqli_query($koneksi,"select uraian from master_level where level='$level_sppd'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $level_sppd2 = $hasil2['uraian'];
            } else {
                $level_sppd2 = "";
            }
    	$no_sppd = $hasil['no_sppd'];
    	$nip = $hasil['nip'];
    	$nama = $hasil['nama'];
    	$grade = $hasil['grade'];
    	$jabatan = $hasil['jabatan'];
    	$maksud = $hasil['maksud'];
    	$agenda = $hasil['agenda'];
    	$kedudukan = $hasil['kedudukan'];
    	$tujuan = $hasil['tujuan'];
    	$jarak = $hasil['jarak'];
    	$transportasi = $hasil['transportasi'];
    	$tgl_awal = $hasil['tgl_awal'];
        $tgl_awal2 = TanggalIndo2($tgl_awal);
    	$tgl_akhir = $hasil['tgl_akhir'];
        $tgl_akhir2 = TanggalIndo2($tgl_akhir);
    	$hari = $hasil['hari'];
    	$jenis_tujuan = $hasil['jenis_tujuan'];
        // $restitusi = floatval($hasil['restitusi']);
        $bayar_restitusi = intval($hasil['bayar_restitusi']);
    	$validasi_restitusi = $hasil['validasi_restitusi'];
    	$tgl_validasi_restitusi = $hasil['tgl_validasi_restitusi'];
        $tgl_validasi_restitusi2 = TanggalIndo2($tgl_validasi_restitusi);
    	$tgl_bayar_restitusi = $hasil['tgl_bayar_restitusi'];
        $tgl_bayar_restitusi2 = TanggalIndo2($tgl_bayar_restitusi);
    
        $datanya = array();
        $datanya["idrestitusi"] = $id;
        $datanya["idsppdrestitusi"] = $idsppd;
        $datanya["tanggalrestitusi"] = $tanggal;
        $datanya["tanggal2restitusi"] = $tanggal2;
        $datanya["tingkat_sppdrestitusi"] = $tingkat_sppd;
        $datanya["tingkat_sppd2restitusi"] = $tingkat_sppd2;
        $datanya["jenis_sppdrestitusi"] = $jenis_sppd;
        $datanya["jenis_sppd2restitusi"] = $jenis_sppd2;
        $datanya["level_sppdrestitusi"] = $level_sppd;
        $datanya["level_sppd2restitusi"] = $level_sppd2;
        $datanya["no_sppdrestitusi"] = $no_sppd;
        $datanya["niprestitusi"] = $nip;
        $datanya["namarestitusi"] = $nama;
        $datanya["graderestitusi"] = $grade;
        $datanya["jabatanrestitusi"] = $jabatan;
        $datanya["maksudrestitusi"] = $maksud;
        $datanya["agendarestitusi"] = $agenda;
        $datanya["kedudukanrestitusi"] = $kedudukan;
        $datanya["tujuanrestitusi"] = $tujuan;
        $datanya["jarakrestitusi"] = $jarak;
        $datanya["transportasirestitusi"] = $transportasi;
        $datanya["tgl_awalrestitusi"] = $tgl_awal;
        $datanya["tgl_awal2restitusi"] = $tgl_awal2;
        $datanya["tgl_akhirrestitusi"] = $tgl_akhir;
        $datanya["tgl_akhir2restitusi"] = $tgl_akhir2;
        $datanya["harirestitusi"] = $hari;
        $datanya["jenis_tujuanrestitusi"] = $jenis_tujuan;
        $datanya["restitusirestitusi"] = floatval($tgl_bayar_restitusirestitusi['bayar_restitusi']);
        // $datanya["restitusirestitusi"] = $restitusi;
        $datanya["restitusi2restitusi"] = number_format(floatval($hasil['bayar_restitusi']),0,',','.');
        // $datanya["restitusi2restitusi"] = number_format($restitusi,0,',','.');
        $datanya["validasi_restitusirestitusi"] = $validasi_restitusi;
        $datanya["tgl_validasi_restitusirestitusi"] = $tgl_validasi_restitusi;
        $datanya["tgl_validasi_restitusi2restitusi"] = $tgl_validasi_restitusi2;
        $datanya["bayar_restitusirestitusi"] = $bayar_restitusi;
        $datanya["tgl_bayar_restitusirestitusi"] = $tgl_bayar_restitusi;
        $datanya["tgl_bayar_restitusi2restitusi"] = $tgl_bayar_restitusi2;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>