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

    include "koneksi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $tahun_ini = date("Y");
    $status2 = isset($_POST['statussppdcari']) ? $_POST['statussppdcari'] : "0";
    $nip2 = isset($_POST['nipsppdcari']) ? $_POST['nipsppdcari'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    $perintah = "";    
    if($status2!="3"){
        if($status2=="1"){
            if($perintah==""){
                $perintah .= " where validasi_biaya='1' and bayar='0'";
            } else {
                $perintah .= " and validasi_biaya='1' and bayar='0'";
            }
        } else if($status2=="2"){
            if($perintah==""){
                $perintah .= " where validasi_biaya='1' and bayar='1'";
            } else {
                $perintah .= " and validasi_biaya='1' and bayar='1'";
            }
        } else {
            if($perintah==""){
                $perintah .= " where validasi_biaya='0'";
            } else {
                $perintah .= " and validasi_biaya='0'";
            }
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
    $rs = mysqli_query($koneksi,"select * from sppd1".$perintah." order by tanggal,id asc limit $offset,$rows");
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$idsppd = stripslashes ($hasil['idsppd']);
    	$tanggal = stripslashes ($hasil['tanggal']);
        $tanggal2 = TanggalIndo2($tanggal);
    	$tingkat_sppd = stripslashes ($hasil['tingkat_sppd']);
            $rs2 = mysqli_query($koneksi,"select nama_tingkat from tingkat_sppd where kd_tingkat='$tingkat_sppd'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $tingkat_sppd2 = stripslashes ($hasil2['nama_tingkat']);
            } else {
                $tingkat_sppd2 = "";
            }
    	$jenis_sppd = stripslashes ($hasil['jenis_sppd']);
            $rs2 = mysqli_query($koneksi,"select nama_sppd from jenis_sppd where kd_sppd='$jenis_sppd'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_sppd2 = stripslashes ($hasil2['nama_sppd']);
            } else {
                $jenis_sppd2 = "";
            }
    	$level_sppd = stripslashes ($hasil['level_sppd']);
            $rs2 = mysqli_query($koneksi,"select uraian from master_level where level='$level_sppd'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $level_sppd2 = stripslashes ($hasil2['uraian']);
            } else {
                $level_sppd2 = "";
            }
    	$no_sppd = stripslashes ($hasil['no_sppd']);
    	$nip = stripslashes ($hasil['nip']);
    	$nama = stripslashes ($hasil['nama']);
    	$grade = stripslashes ($hasil['grade']);
    	$jabatan = stripslashes ($hasil['jabatan']);
    	$maksud = stripslashes ($hasil['maksud']);
    	$agenda = stripslashes ($hasil['agenda']);
    	$kedudukan = stripslashes ($hasil['kedudukan']);
    	$tujuan = stripslashes ($hasil['tujuan']);
    	$jarak = stripslashes ($hasil['jarak']);
    	$transportasi = stripslashes ($hasil['transportasi']);
    	$tgl_awal = stripslashes ($hasil['tgl_awal']);
        $tgl_awal2 = TanggalIndo2($tgl_awal);
    	$tgl_akhir = stripslashes ($hasil['tgl_akhir']);
        $tgl_akhir2 = TanggalIndo2($tgl_akhir);
    	$hari = stripslashes ($hasil['hari']);
    	$jenis_tujuan = stripslashes ($hasil['jenis_tujuan']);
    	$approve1 = stripslashes ($hasil['approve1']);
    	$approval1 = stripslashes ($hasil['approval1']);
            $rs2 = mysqli_query($koneksi,"select jabatan from setting_pegawai where nip='$approval1'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jabatan_approval1 = stripslashes($hasil2['jabatan']);
            } else {
                $jabatan_approval1 = "";
            }
    	$tgl_approve1 = stripslashes ($hasil['tgl_approve1']);
        $tgl_approve12 = TanggalIndo2($tgl_approve1);
    	$alasan_reject1 = stripslashes ($hasil['alasan_reject1']);
    	$approve2 = stripslashes ($hasil['approve2']);
    	$approval2 = stripslashes ($hasil['approval2']);
            $rs2 = mysqli_query($koneksi,"select jabatan from setting_pegawai where nip='$approval2'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jabatan_approval2 = stripslashes ($hasil2['jabatan']);
            } else {
                $jabatan_approval2 = "";
            }
    	$tgl_approve2 = stripslashes ($hasil['tgl_approve2']);
        $tgl_approve22 = TanggalIndo2($tgl_approve2);
    	$alasan_reject2 = stripslashes ($hasil['alasan_reject2']);
    	$validasi_biaya = stripslashes ($hasil['validasi_biaya']);
    	$tgl_validasi = stripslashes ($hasil['tgl_validasi']);
        $tgl_validasi2 = TanggalIndo2($tgl_validasi);
    	$approvesdm = stripslashes ($hasil['approvesdm']);
    	$approvalsdm = stripslashes ($hasil['approvalsdm']);
            $rs2 = mysqli_query($koneksi,"select jabatan from setting_pegawai where nip='$approvalsdm'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jabatan_approvalsdm = stripslashes ($hasil2['jabatan']);
            } else {
                $jabatan_approvalsdm = "DIVISI SDM";
            }
    	$tgl_approvesdm = stripslashes ($hasil['tgl_approvesdm']);
        $tgl_approvesdm2 = TanggalIndo2($tgl_approvesdm);
    	$alasan_rejectsdm = stripslashes ($hasil['alasan_rejectsdm']);
    	$approvebayar = stripslashes ($hasil['approvebayar']);
    	$approvalbayar = stripslashes ($hasil['approvalbayar']);
            $rs2 = mysqli_query($koneksi,"select jabatan from setting_pegawai where nip='$approvalbayar'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jabatan_approvalbayar = stripslashes ($hasil2['jabatan']);
            } else {
                $jabatan_approvalbayar = "DIVISI KEUANGAN";
            }
    	$tgl_approvebayar = stripslashes ($hasil['tgl_approvebayar']);
        $tgl_approvebayar2 = TanggalIndo2($tgl_approvebayar);
    	$alasan_rejectbayar = stripslashes ($hasil['alasan_rejectbayar']);
    	$bayar = stripslashes ($hasil['bayar']);
    	$tgl_bayar = stripslashes ($hasil['tgl_bayar']);
        $tgl_bayar2 = TanggalIndo2($tgl_bayar);

        $rs8 = mysqli_query($koneksi,"select total from biaya_sppd1 where idsppd='$idsppd'");
        $hasil8 = mysqli_fetch_array($rs8);
        if($hasil8){
            $total = floatval($hasil8['total']);
        } else {
            $total = 0;
        }

        $rs8 = mysqli_query($koneksi,"select sum(nilai) as restitusi from biaya_restitusi where idsppd='$idsppd'");
        $hasil8 = mysqli_fetch_array($rs8);
        if($hasil8){
            $restitusi = floatval($hasil8['restitusi']);
        } else {
            $restitusi = 0;
        }


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
        $datanya["idsppd"] = $id;
        $datanya["idsppdsppd"] = $idsppd;
        $datanya["tanggalsppd"] = $tanggal;
        $datanya["tanggal2sppd"] = $tanggal2;
        $datanya["tingkat_sppdsppd"] = $tingkat_sppd;
        $datanya["tingkat_sppd2sppd"] = $tingkat_sppd2;
        $datanya["jenis_sppdsppd"] = $jenis_sppd;
        $datanya["jenis_sppd2sppd"] = $jenis_sppd2;
        $datanya["level_sppdsppd"] = $level_sppd;
        $datanya["level_sppd2sppd"] = $level_sppd2;
        $datanya["no_sppdsppd"] = $no_sppd;
        $datanya["nipsppd"] = $nip;
        $datanya["namasppd"] = $nama;
        $datanya["gradesppd"] = $grade;
        $datanya["jabatansppd"] = $jabatan;
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
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>