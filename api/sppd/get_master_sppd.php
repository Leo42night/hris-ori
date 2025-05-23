<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";

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
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $tahun_ini = date("Y");

    // untuk filtering
    $status2 = isset($_POST['statussppdcari']) ? $_POST['statussppdcari'] : "0"; // 0 = belum bayar, 1 = sudah bayar
    $jenis_sppd2 = isset($_POST['jenis_sppdsppdcari']) ? $_POST['jenis_sppdsppdcari'] : "semua";
    $nip2 = isset($_POST['nipsppdcari']) ? $_POST['nipsppdcari'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    $perintah = "";    
    if($status2!="9"){
        if($perintah==""){
            $perintah .= " where bayar='$status2'";
        } else {
            $perintah .= " and bayar='$status2'";
        }
    }
    if($jenis_sppd2!="semua"){
        if($perintah==""){
            $perintah .= " where jenis_sppd='$jenis_sppd2'";
        } else {
            $perintah .= " and jenis_sppd='$jenis_sppd2'";
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
    $rs = mysqli_query($koneksi,"select count(*) from sppd1".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $items = array();
    $rs = mysqli_query($koneksi,"select * from sppd1".$perintah." order by idsppd desc limit $offset,$rows");
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
    	$sub_jenis_sppd = $hasil['sub_jenis_sppd'];
            $rs2 = mysqli_query($koneksi,"select nama_sub_sppd from sub_jenis_sppd where kd_sub_sppd='$sub_jenis_sppd'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $sub_jenis_sppd2 = $hasil2['nama_sub_sppd'];
            } else {
                $sub_jenis_sppd2 = "";
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
    	$kd_project_sap = $hasil['kd_project_sap'];
        $nama_project_sap = $hasil['nama_project_sap'];
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
            $rs2 = mysqli_query($koneksi,"select jabatan from data_pegawai where nip='$approval1'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jabatan_approval1 = $hasil2['jabatan'];
            } else {
                $jabatan_approval1 = "";
            }
    	$tgl_approve1 = $hasil['tgl_approve1'];
        $tgl_approve12 = TanggalIndo2($tgl_approve1);
    	$alasan_reject1 = $hasil['alasan_reject1'];
    	$approve2 = $hasil['approve2'];
    	$approval2 = $hasil['approval2'];
            $rs2 = mysqli_query($koneksi,"select jabatan from data_pegawai where nip='$approval2'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jabatan_approval2 = $hasil2['jabatan'];
            } else {
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
            $rs2 = mysqli_query($koneksi,"select jabatan from data_pegawai where nip='$approvalsdm'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jabatan_approvalsdm = $hasil2['jabatan'];
            } else {
                $jabatan_approvalsdm = "DIVISI SDM";
            }
    	$tgl_approvesdm = $hasil['tgl_approvesdm'];
        $tgl_approvesdm2 = TanggalIndo2($tgl_approvesdm);
    	$alasan_rejectsdm = $hasil['alasan_rejectsdm'];
    	$approvebayar = $hasil['approvebayar'];
    	$approvalbayar = $hasil['approvalbayar'];
            $rs2 = mysqli_query($koneksi,"select jabatan from data_pegawai where nip='$approvalbayar'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jabatan_approvalbayar = $hasil2['jabatan'];
            } else {
                $jabatan_approvalbayar = "DIVISI KEUANGAN";
            }
    	$tgl_approvebayar = $hasil['tgl_approvebayar'];
        $tgl_approvebayar2 = TanggalIndo2($tgl_approvebayar);
    	$alasan_rejectbayar = $hasil['alasan_rejectbayar'];
    	$bayar = $hasil['bayar'];
    	$tgl_bayar = $hasil['tgl_bayar'];
        $tgl_bayar2 = TanggalIndo2($tgl_bayar);

        // styling colloumn "Timeline"
        // take
        // PENGAJUAN : 01.02.2025
        // :
        // Ditolak (02.02.2025)
        // :
        // Menunggu Approval
        // DIVISI SDM :
        // Ditolak (05.02.2025)
        // VALIDASI BIAYA :
        // 04.02.2025
        // DIVISI KEUANGAN :
        // Menunggu Approval
        // STATUS BAYAR :
        // Belum Terbayar 

        $timeline = '';
        $timeline .= 'PENGAJUAN : '.$tanggal2;
        $timeline .= '<span class="brxsmall1"></span>';
        $timeline .= '<span style="font-size:8px;">Jabatan Approve: '.$jabatan_approval1.'</span> :';
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
        // Dipakai di Rincian Biaya: transportasibiaya, transportasi_lokalbiaya
        $rs8 = mysqli_query($koneksi,"select * from biaya_sppd1 where idsppd='$idsppd'");
        $hasil8 = mysqli_fetch_array($rs8);
        if($hasil8){
            $transportasi9 = floatval($hasil8['transportasi']);
            $transportasi_lokal9 = floatval($hasil8['transportasi_lokal']);
            $airport_tax9 = floatval($hasil8['airport_tax']);
            $hari_konsumsi19 = floatval($hasil8['hari_konsumsi1']);
            $persen_konsumsi19 = floatval($hasil8['persen_konsumsi1']);
            $nilai_konsumsi19 = floatval($hasil8['nilai_konsumsi1']);
            $total_konsumsi19 = floatval($hasil8['total_konsumsi1']);
            $hari_laundry19 = floatval($hasil8['hari_laundry1']);
            $persen_laundry19 = floatval($hasil8['persen_laundry1']);
            $nilai_laundry19 = floatval($hasil8['nilai_laundry1']);
            $total_laundry19 = floatval($hasil8['total_laundry1']);
            $hari_penginapan19 = floatval($hasil8['hari_penginapan1']);
            $persen_penginapan19 = floatval($hasil8['persen_penginapan1']);
            $nilai_penginapan19 = floatval($hasil8['nilai_penginapan1']);
            $total_penginapan19 = floatval($hasil8['total_penginapan1']);
            $hari_konsumsi29 = floatval($hasil8['hari_konsumsi2']);
            $persen_konsumsi29 = floatval($hasil8['persen_konsumsi2']);
            $nilai_konsumsi29 = floatval($hasil8['nilai_konsumsi2']);
            $total_konsumsi29 = floatval($hasil8['total_konsumsi2']);
            $hari_laundry29 = floatval($hasil8['hari_laundry2']);
            $persen_laundry29 = floatval($hasil8['persen_laundry2']);
            $nilai_laundry29 = floatval($hasil8['nilai_laundry2']);
            $total_laundry29 = floatval($hasil8['total_laundry2']);
            $hari_penginapan29 = floatval($hasil8['hari_penginapan2']);
            $persen_penginapan29 = floatval($hasil8['persen_penginapan2']);
            $nilai_penginapan29 = floatval($hasil8['nilai_penginapan2']);
            $total_penginapan29 = floatval($hasil8['total_penginapan2']);
            $hari_pegawai9 = floatval($hasil8['hari_pegawai']);
            $persen_pegawai9 = floatval($hasil8['persen_pegawai']);
            $nilai_pegawai9 = floatval($hasil8['nilai_pegawai']);
            $total_pegawai9 = floatval($hasil8['total_pegawai']);
            $hari_keluarga9 = floatval($hasil8['hari_keluarga']);
            $persen_keluarga9 = floatval($hasil8['persen_keluarga']);
            $nilai_keluarga9 = floatval($hasil8['nilai_keluarga']);
            $total_keluarga9 = floatval($hasil8['total_keluarga']);
            $hari_pengantar9 = floatval($hasil8['hari_pengantar']);
            $persen_pengantar9 = floatval($hasil8['persen_pengantar']);
            $nilai_pengantar9 = floatval($hasil8['nilai_pengantar']);
            $total_pengantar9 = floatval($hasil8['total_pengantar']);
            $hari_suamiistri9 = floatval($hasil8['hari_suamiistri']);
            $persen_suamiistri9 = floatval($hasil8['persen_suamiistri']);
            $nilai_suamiistri9 = floatval($hasil8['nilai_suamiistri']);
            $total_suamiistri9 = floatval($hasil8['total_suamiistri']);
            $hari_anak9 = floatval($hasil8['hari_anak']);
            $persen_anak9 = floatval($hasil8['persen_anak']);
            $nilai_anak9 = floatval($hasil8['nilai_anak']);        
            $total_anak9 = floatval($hasil8['total_anak']);        
            $total_pengepakan9 = floatval($hasil8['total_pengepakan']);
            $total = floatval($hasil8['total']);
        } else {
            $transportasi9 = 0;
            $transportasi_lokal9 = 0;
            $airport_tax9 = 0;
            $hari_konsumsi19 = 0;
            $persen_konsumsi19 = 0;
            $nilai_konsumsi19 = 0;
            $total_konsumsi19 = 0;
            $hari_laundry19 = 0;
            $persen_laundry19 = 0;
            $nilai_laundry19 = 0;
            $total_laundry19 = 0;
            $hari_penginapan19 = 0;
            $persen_penginapan19 = 0;
            $nilai_penginapan19 = 0;
            $total_penginapan19 = 0;
            $hari_konsumsi29 = 0;
            $persen_konsumsi29 = 0;
            $nilai_konsumsi29 = 0;
            $total_konsumsi29 = 0;
            $hari_laundry29 = 0;
            $persen_laundry29 = 0;
            $nilai_laundry29 = 0;
            $total_laundry29 = 0;
            $hari_penginapan29 = 0;
            $persen_penginapan29 = 0;
            $nilai_penginapan29 = 0;
            $total_penginapan29 = 0;
            $hari_pegawai9 = 0;
            $persen_pegawai9 = 0;
            $nilai_pegawai9 = 0;
            $total_pegawai9 = 0;
            $hari_keluarga9 = 0;
            $persen_keluarga9 = 0;
            $nilai_keluarga9 = 0;
            $total_keluarga9 = 0;
            $hari_pengantar9 = 0;
            $persen_pengantar9 = 0;
            $nilai_pengantar9 = 0;
            $total_pengantar9 = 0;
            $hari_suamiistri9 = 0;
            $persen_suamiistri9 = 0;
            $nilai_suamiistri9 = 0;
            $total_suamiistri9 = 0;
            $hari_anak9 = 0;
            $persen_anak9 = 0;
            $nilai_anak9 = 0;        
            $total_anak9 = 0;    
            $total_pengepakan9 = 0;    
            $total = 0;
        }

        $rs8 = mysqli_query($koneksi,"select sum(nilai) as restitusi from biaya_restitusi where idsppd='$idsppd'");
        $hasil8 = mysqli_fetch_array($rs8);
        if($hasil8){
            $restitusi = floatval($hasil8['restitusi']);
        } else {
            $restitusi = 0;
        }
    
        $datanya = array();
        $datanya["idsppd"] = $id;
        $datanya["idsppdsppd"] = $idsppd;
        $datanya["tanggalsppd"] = $tanggal;
        $datanya["tanggal2sppd"] = $tanggal2;
        $datanya["tingkat_sppdsppd"] = $tingkat_sppd;
        $datanya["tingkat_sppd2sppd"] = $tingkat_sppd2;
        $datanya["jenis_sppdsppd"] = $jenis_sppd;
        $datanya["jenis_sppd2sppd"] = $jenis_sppd2;
        $datanya["sub_jenis_sppdsppd"] = $sub_jenis_sppd;
        $datanya["sub_jenis_sppd2sppd"] = $sub_jenis_sppd2;
        $datanya["level_sppdsppd"] = $level_sppd;
        $datanya["level_sppd2sppd"] = $level_sppd2;
        $datanya["no_sppdsppd"] = $no_sppd;
        $datanya["nipsppd"] = $nip;
        $datanya["namasppd"] = $nama;
        $datanya["gradesppd"] = $grade;
        $datanya["jabatansppd"] = $jabatan;
        $datanya["kd_project_sapsppd"] = $kd_project_sap;
        $datanya["nama_project_sapsppd"] = $nama_project_sap;
        $datanya["maksudsppd"] = $maksud;
        $datanya["agendasppd"] = $agenda;
        $datanya["kedudukansppd"] = $kedudukan;
        $datanya["tujuansppd"] = $tujuan;
        $datanya["jaraksppd"] = $jarak;
        $datanya["transportasisppd"] = $transportasi;
        $datanya["tgl_awalsppd"] = $tgl_awal;
        $datanya["tgl_awal2sppd"] = $tgl_awal2;
        $datanya["tgl_akhirsppd"] = $tgl_akhir;
        $datanya["tgl_akhir2sppd"] = $tgl_akhir2;
        $datanya["harisppd"] = $hari;
        $datanya["jenis_tujuansppd"] = $jenis_tujuan;
        $datanya["approve1sppd"] = $approve1;
        $datanya["approval1sppd"] = $approval1;
        $datanya["jabatan_approval1sppd"] = $jabatan_approval1;
        $datanya["tgl_approve1sppd"] = $tgl_approve1;
        $datanya["tgl_approve12sppd"] = $tgl_approve12;
        $datanya["alasan_reject1sppd"] = $alasan_reject1;
        $datanya["approve2sppd"] = $approve2;
        $datanya["approval2sppd"] = $approval2;
        $datanya["jabatan_approval2sppd"] = $jabatan_approval2;
        $datanya["tgl_approve2sppd"] = $tgl_approve2;
        $datanya["tgl_approve22sppd"] = $tgl_approve22;
        $datanya["alasan_reject2sppd"] = $alasan_reject2;
        $datanya["validasi_biayasppd"] = $validasi_biaya;
        $datanya["tgl_validasisppd"] = $tgl_validasi;
        $datanya["tgl_validasi2sppd"] = $tgl_validasi2;
        $datanya["approvesdmsppd"] = $approvesdm;
        $datanya["approvalsdmsppd"] = $approvalsdm;
        $datanya["jabatan_approvalsdmsppd"] = $jabatan_approvalsdm;
        $datanya["tgl_approvesdmsppd"] = $tgl_approvesdm;
        $datanya["tgl_approve2sdmsppd"] = $tgl_approvesdm2;
        $datanya["alasan_rejectsdmsppd"] = $alasan_rejectsdm;
        $datanya["approvebayarsppd"] = $approvebayar;
        $datanya["approvalbayarsppd"] = $approvalbayar;
        $datanya["jabatan_approvalbayarsppd"] = $jabatan_approvalbayar;
        $datanya["tgl_approvebayarsppd"] = $tgl_approvebayar;
        $datanya["tgl_approvebayar2sppd"] = $tgl_approvebayar2;
        $datanya["alasan_rejectbayarsppd"] = $alasan_rejectbayar;
        $datanya["bayarsppd"] = $bayar;
        $datanya["tgl_bayarsppd"] = $tgl_bayar;
        $datanya["tgl_bayar2sppd"] = $tgl_bayar2;
        $datanya["totalsppd"] = $total;
        $datanya["total2sppd"] = number_format($total,0,',','.');
        $datanya["restitusisppd"] = $restitusi;
        $datanya["restitusi2sppd"] = number_format($restitusi,0,',','.');
        $datanya["timelinesppd"] = $timeline;

        $datanya["transportasibiaya"] = $transportasi9;
        $datanya["transportasi_lokalbiaya"] = $transportasi_lokal9;
        $datanya["airport_taxbiaya"] = $airport_tax9;
        $datanya["hari_konsumsi1biaya"] = $hari_konsumsi19;
        $datanya["persen_konsumsi1biaya"] = $persen_konsumsi19;
        $datanya["nilai_konsumsi1biaya"] = number_format($nilai_konsumsi19,0,',','.');
        $datanya["nilai_konsumsi12biaya"] = $nilai_konsumsi19;
        $datanya["total_konsumsi1biaya"] = $total_konsumsi19;
        $datanya["hari_laundry1biaya"] = $hari_laundry19;
        $datanya["persen_laundry1biaya"] = $persen_laundry19;
        $datanya["nilai_laundry1biaya"] = number_format($nilai_laundry19,0,',','.');
        $datanya["nilai_laundry12biaya"] = $nilai_laundry19;
        $datanya["total_laundry1biaya"] = $total_laundry19;
        $datanya["hari_penginapan1biaya"] = $hari_penginapan19;
        $datanya["persen_penginapan1biaya"] = $persen_penginapan19;
        $datanya["nilai_penginapan1biaya"] = number_format($nilai_penginapan19,0,',','.');
        $datanya["nilai_penginapan12biaya"] = $nilai_penginapan19;
        $datanya["total_penginapan1biaya"] = $total_penginapan19;
        $datanya["hari_konsumsi2biaya"] = $hari_konsumsi29;
        $datanya["persen_konsumsi2biaya"] = $persen_konsumsi29;
        $datanya["nilai_konsumsi2biaya"] = number_format($nilai_konsumsi29,0,',','.');
        $datanya["nilai_konsumsi22biaya"] = $nilai_konsumsi29;
        $datanya["total_konsumsi2biaya"] = $total_konsumsi29;
        $datanya["hari_laundry2biaya"] = $hari_laundry29;
        $datanya["persen_laundry2biaya"] = $persen_laundry29;
        $datanya["nilai_laundry2biaya"] = number_format($nilai_laundry29,0,',','.');
        $datanya["nilai_laundry22biaya"] = $nilai_laundry29;
        $datanya["total_laundry2biaya"] = $total_laundry29;
        $datanya["hari_penginapan2biaya"] = $hari_penginapan29;
        $datanya["persen_penginapan2biaya"] = $persen_penginapan29;
        $datanya["nilai_penginapan2biaya"] = number_format($nilai_penginapan29,0,',','.');
        $datanya["nilai_penginapan22biaya"] = $nilai_penginapan29;
        $datanya["total_penginapan2biaya"] = $total_penginapan29;
        $datanya["hari_pegawaibiaya"] = $hari_pegawai9;
        $datanya["persen_pegawaibiaya"] = $persen_pegawai9;
        $datanya["nilai_pegawaibiaya"] = number_format($nilai_pegawai9,0,',','.');
        $datanya["nilai_pegawai2biaya"] = $nilai_pegawai9;
        $datanya["total_pegawaibiaya"] = $total_pegawai9;
        $datanya["hari_keluargabiaya"] = $hari_keluarga9;
        $datanya["persen_keluargabiaya"] = $persen_keluarga9;
        $datanya["nilai_keluargabiaya"] = number_format($nilai_keluarga9,0,',','.');
        $datanya["nilai_keluarga2biaya"] = $nilai_keluarga9;
        $datanya["total_keluargabiaya"] = $total_keluarga9;
        $datanya["hari_pengantarbiaya"] = $hari_pengantar9;
        $datanya["persen_pengantarbiaya"] = $persen_pengantar9;
        $datanya["nilai_pengantarbiaya"] = number_format($nilai_pengantar9,0,',','.');
        $datanya["nilai_pengantar2biaya"] = $nilai_pengantar9;
        $datanya["total_pengantarbiaya"] = $total_pengantar9;
        $datanya["hari_suamiistribiaya"] = $hari_suamiistri9;
        $datanya["persen_suamiistribiaya"] = $persen_suamiistri9;
        $datanya["nilai_suamiistribiaya"] = number_format($nilai_suamiistri9,0,',','.');
        $datanya["nilai_suamiistri2biaya"] = $nilai_suamiistri9;
        $datanya["total_suamiistribiaya"] = $total_suamiistri9;
        $datanya["hari_anakbiaya"] = $hari_anak9;
        $datanya["persen_anakbiaya"] = $persen_anak9;
        $datanya["nilai_anakbiaya"] = number_format($nilai_anak9,0,',','.');
        $datanya["nilai_anak2biaya"] = $nilai_anak9;
        $datanya["total_anakbiaya"] = $total_anak9;
        $datanya["total_pengepakanbiaya"] = $total_pengepakan9;
        $datanya["totalbiaya"] = $total;

        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>