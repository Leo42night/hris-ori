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
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $tahun_ini = date("Y");
    $nip2 = isset($_POST['nipdataapprovalcari']) ? $_POST['nipdataapprovalcari'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    $perintah = "";    
    if($nip2!=""){
        $perintah .= " and (nip='$nip2' or nama like '%$nip2%')";
    }
    
    $offset = ($page-1)*$rows;
    $result = array();
    $rs = mysqli_query($koneksi,"select count(*) from sppd1 where approvebayar<>'2' and bayar='0'".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $items = array();
    $rs = mysqli_query($koneksi,"select * from sppd1 where approvebayar<>'2' and bayar='0'".$perintah." order by id desc limit $offset,$rows");
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
    	$approve1 = $hasil['approve1'];
    	$approval1 = $hasil['approval1'];
            $rs2 = mysqli_query($koneksi,"select nama,jabatan from data_pegawai where nip='$approval1'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_approval1 = $hasil2['nama'];
                $jabatan_approval1 = $hasil2['jabatan'];
            } else {
                $nama_approval1 = "";
                $jabatan_approval1 = "";
            }
    	$tgl_approve1 = $hasil['tgl_approve1'];
        $tgl_approve12 = TanggalIndo2($tgl_approve1);
    	$alasan_reject1 = $hasil['alasan_reject1'];
    	$approve2 = $hasil['approve2'];
    	$approval2 = $hasil['approval2'];
            $rs2 = mysqli_query($koneksi,"select nama,jabatan from data_pegawai where nip='$approval2'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_approval2 = $hasil2['nama'];
                $jabatan_approval2 = $hasil2['jabatan'];
            } else {
                $nama_approval2 = "";
                $jabatan_approval2 = "";
            }
    	$tgl_approve2 = $hasil['tgl_approve2'];
        $tgl_approve22 = TanggalIndo2($tgl_approve2);
    	$alasan_reject2 = $hasil['alasan_reject2'];
    	$validasi_biaya = $hasil['validasi_biaya'];
    	$tgl_validasi = $hasil['tgl_validasi'];
        $tgl_validasi2 = TanggalIndo2($tgl_validasi);
    	$approvesdm = $hasil['approvesdm'];
    	$approvalsdm = $hasil['approvalsdm'];
            $rs2 = mysqli_query($koneksi,"select nama,jabatan from data_pegawai where nip='$approvalsdm'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_approvalsdm = $hasil2['nama'];
                $jabatan_approvalsdm = $hasil2['jabatan'];
            } else {
                $nama_approvalsdm = "";
                $jabatan_approvalsdm = "DIVISI SDM";
            }
    	$tgl_approvesdm = $hasil['tgl_approvesdm'];
        $tgl_approvesdm2 = TanggalIndo2($tgl_approvesdm);
    	$alasan_rejectsdm = $hasil['alasan_rejectsdm'];
    	$approvebayar = $hasil['approvebayar'];
    	$approvalbayar = $hasil['approvalbayar'];
            $rs2 = mysqli_query($koneksi,"select nama,jabatan from data_pegawai where nip='$approvalbayar'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_approvalbayar = $hasil2['nama'];
                $jabatan_approvalbayar = $hasil2['jabatan'];
            } else {
                $nama_approvalbayar = "";
                $jabatan_approvalbayar = "DIVISI KEUANGAN";
            }
    	$tgl_approvebayar = $hasil['tgl_approvebayar'];
        $tgl_approvebayar2 = TanggalIndo2($tgl_approvebayar);
    	$alasan_rejectbayar = $hasil['alasan_rejectbayar'];
    	$bayar = $hasil['bayar'];
    	$tgl_bayar = $hasil['tgl_bayar'];
        $tgl_bayar2 = TanggalIndo2($tgl_bayar);


        $timeline = '';
        $timeline .= 'PENGAJUAN : '.$tanggal2;
        $timeline .= '<span class="brxsmall1"></span>';
        $timeline .= '<span style="font-size:8px;">'.$jabatan_approval1.'</span> :';
        $timeline .= '<span class="brxsmall2"></span>';
        if($approve1=="2"){
            $timeline .= '<span style="color:#0000CD;">Disetujui ('.$tgl_approve12.')</span>';
        } else if($approve1=="1"){
            $timeline .= '<span style="color:red;">Ditolak ('.$tgl_approve12.')</span>';
        } else {
            $timeline .= '<span style="color:red;">Menunggu Approval</span>';
        }        
        if($approval2!=""){
            $timeline .= '<span class="brxsmall1"></span>';
            $timeline .= '<span style="font-size:8px;">'.$jabatan_approval2.'</span> :';
            $timeline .= '<span class="brxsmall2"></span>';
            if($approve2=="2"){
                $timeline .= '<span style="color:#0000CD;">Disetujui ('.$tgl_approve22.')</span>';
            } else if($approve2=="1"){
                $timeline .= '<span style="color:red;">Ditolak ('.$tgl_approve22.')</span>';
            } else {
                $timeline .= '<span style="color:red;">Menunggu Approval</span>';
            }
        }
        $timeline .= '<span class="brxsmall1"></span>';
        $timeline .= '<span style="font-size:8px;">'.$jabatan_approvalsdm.'</span> :';
        $timeline .= '<span class="brxsmall2"></span>';
        if($approvesdm=="2"){
            $timeline .= '<span style="color:#0000CD;">Disetujui ('.$tgl_approvesdm2.')</span>';
        } else if($approvesdm=="1"){
            $timeline .= '<span style="color:red;">Ditolak ('.$tgl_approvesdm2.')</span>';
        } else {
            $timeline .= '<span style="color:red;">Menunggu Approval</span>';
        }        
        $timeline .= '<span class="brxsmall1"></span>';
        $timeline .= '<span style="font-size:8px;">VALIDASI BIAYA</span> :';
        $timeline .= '<span class="brxsmall2"></span>';
        if($validasi_biaya=="1"){
            $timeline .= '<span style="color:#0000CD;">'.$tgl_validasi2.'</span>';
        } else {
            $timeline .= '<span style="color:red;">Belum Validasi</span>';
        }        
        $timeline .= '<span class="brxsmall1"></span>';
        $timeline .= '<span style="font-size:8px;">'.$jabatan_approvalbayar.'</span> :';
        $timeline .= '<span class="brxsmall2"></span>';
        if($approvebayar=="2"){
            $timeline .= '<span style="color:#0000CD;">Disetujui ('.$tgl_approvebayar2.')</span>';
        } else if($approvebayar=="1"){
            $timeline .= '<span style="color:red;">Ditolak ('.$tgl_approvebayar2.')</span>';
        } else {
            $timeline .= '<span style="color:red;">Menunggu Approval</span>';
        }        
        $timeline .= '<span class="brxsmall1"></span>';
        $timeline .= '<span style="font-size:8px;">STATUS BAYAR</span> :';
        $timeline .= '<span class="brxsmall2"></span>';
        if($bayar=="1"){
            $timeline .= '<span style="color:#0000CD;">Terbayar ('.$tgl_bayar2.')</span>';
        } else {
            $timeline .= '<span style="color:red;">Belum Terbayar</span>';
        }        
    
        $datanya = array();
        $datanya["iddataapproval"] = $id;
        $datanya["idsppddataapproval"] = $idsppd;
        $datanya["tanggaldataapproval"] = $tanggal;
        $datanya["tanggal2dataapproval"] = $tanggal2;
        $datanya["tingkat_sppddataapproval"] = $tingkat_sppd;
        $datanya["tingkat_sppd2dataapproval"] = $tingkat_sppd2;
        $datanya["jenis_sppddataapproval"] = $jenis_sppd;
        $datanya["jenis_sppd2dataapproval"] = $jenis_sppd2;
        $datanya["level_sppddataapproval"] = $level_sppd;
        $datanya["level_sppd2dataapproval"] = $level_sppd2;
        $datanya["no_sppddataapproval"] = $no_sppd;
        $datanya["nipdataapproval"] = $nip;
        $datanya["namadataapproval"] = $nama;
        $datanya["gradedataapproval"] = $grade;
        $datanya["jabatandataapproval"] = $jabatan;
        $datanya["maksuddataapproval"] = $maksud;
        $datanya["agendadataapproval"] = $agenda;
        $datanya["kedudukandataapproval"] = $kedudukan;
        $datanya["tujuandataapproval"] = $tujuan;
        $datanya["jarakdataapproval"] = $jarak;
        $datanya["transportasidataapproval"] = $transportasi;
        $datanya["tgl_awaldataapproval"] = $tgl_awal;
        $datanya["tgl_awal2dataapproval"] = $tgl_awal2;
        $datanya["tgl_akhirdataapproval"] = $tgl_akhir;
        $datanya["tgl_akhir2dataapproval"] = $tgl_akhir2;
        $datanya["haridataapproval"] = $hari;
        $datanya["jenis_tujuandataapproval"] = $jenis_tujuan;
        $datanya["approve1dataapproval"] = $approve1;
        $datanya["approval1dataapproval"] = $approval1;
        $datanya["nama_approval1dataapproval"] = $nama_approval1;
        $datanya["jabatan_approval1dataapproval"] = $jabatan_approval1;
        $datanya["tgl_approve1dataapproval"] = $tgl_approve1;
        $datanya["tgl_approve12dataapproval"] = $tgl_approve12;
        $datanya["alasan_reject1dataapproval"] = $alasan_reject1;
        $datanya["approve2dataapproval"] = $approve2;
        $datanya["approval2dataapproval"] = $approval2;
        $datanya["nama_approval2dataapproval"] = $nama_approval2;
        $datanya["jabatan_approval2dataapproval"] = $jabatan_approval2;
        $datanya["tgl_approve2dataapproval"] = $tgl_approve2;
        $datanya["tgl_approve22dataapproval"] = $tgl_approve22;
        $datanya["alasan_reject2dataapproval"] = $alasan_reject2;
        $datanya["validasi_biayadataapproval"] = $validasi_biaya;
        $datanya["tgl_validasidataapproval"] = $tgl_validasi;
        $datanya["tgl_validasi2dataapproval"] = $tgl_validasi2;
        $datanya["approvesdmdataapproval"] = $approvesdm;
        $datanya["approvalsdmdataapproval"] = $approvalsdm;
        $datanya["nama_approvalsdmdataapproval"] = $nama_approvalsdm;
        $datanya["jabatan_approvalsdmdataapproval"] = $jabatan_approvalsdm;
        $datanya["tgl_approvesdmdataapproval"] = $tgl_approvesdm;
        $datanya["tgl_approve2sdmdataapproval"] = $tgl_approvesdm2;
        $datanya["alasan_rejectsdmdataapproval"] = $alasan_rejectsdm;
        $datanya["approvebayardataapproval"] = $approvebayar;
        $datanya["approvalbayardataapproval"] = $approvalbayar;
        $datanya["nama_approvalbayardataapproval"] = $nama_approvalbayar;
        $datanya["jabatan_approvalbayardataapproval"] = $jabatan_approvalbayar;
        $datanya["tgl_approvebayardataapproval"] = $tgl_approvebayar;
        $datanya["tgl_approvebayar2dataapproval"] = $tgl_approvebayar2;
        $datanya["alasan_rejectbayardataapproval"] = $alasan_rejectbayar;
        $datanya["bayardataapproval"] = $bayar;
        $datanya["tgl_bayardataapproval"] = $tgl_bayar;
        $datanya["tgl_bayar2dataapproval"] = $tgl_bayar2;
        $datanya["timelinedataapproval"] = $timeline;

        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>