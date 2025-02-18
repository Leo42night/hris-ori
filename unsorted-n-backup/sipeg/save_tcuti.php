<?php
session_start();
$userhris = $_SESSION["userakseshris"];
ini_set('date.timezone', 'Asia/Jakarta');
if ($userhris){
    include 'koneksi.php';
    include 'koneksi_sipeg.php';
    $tgl_proses = date("Y-m-d");
    $jam_ini = date("H:i:s");
    
    $blth = $_REQUEST['blthtcuti'];
    $tgl_tcuti = $_REQUEST['tgl_tcutitcuti'];
    $tgl_tcuti2 = date('Y-m-01', strtotime($tgl_tcuti));
    $jenistcuti = $_REQUEST['jenistcutitcuti'];
    $koefisien1 = $_REQUEST['koefisien1tcuti'];
    $koefisien2 = $_REQUEST['koefisien2tcuti'];
    /*
    $blth = "2023-04";
    $tgl_tcuti = "2023-04-22";
    $tgl_tcuti2 = date('Y-m-t', strtotime($tgl_tcuti));
    $jenistcuti = "1";
    $koefisien = 2;
    */
    
    $tahun = substr($blth,0,4);    
    $tgl_minimal2 = date('Y-m-t', strtotime($tgl_tcuti2.'-12 months'));
    $tgl_minimal = date('Y-m-01', strtotime($tgl_minimal2.'+1 days'));
    $tgl_maksimal = date('Y-m-t', strtotime($tgl_tcuti));

    $rs2 = mysqli_query($koneksi,"select * from jenis_tcuti where jenistcuti='$jenistcuti'");
    $hasil2 = mysqli_fetch_array($rs2);
    $nama_jenistcuti = stripslashes ($hasil2['nama_jenistcuti']);
    $agama = stripslashes ($hasil2['agama']);

    /*
    $blth_awal = date('Y-m', strtotime($tgl_tcuti2.'-1 month'));
    $blth_awal = substr($tgl_tcuti,0,7);
    //$batas_minimal = date('Y-m-d', strtotime($tgl_tcuti2. ' - 30 days'));
    $batas_minimal = date('Y-m-d', strtotime($tgl_tcuti2.'-1 month'));
    $blth_minimal2 = date('Y-m-t', strtotime($tgl_tcuti2.'-12 month'));
    $tgl_minimal = date('Y-m-01', strtotime($blth_minimal2.'+1 day'));
    $blth_minimal = date('Y-m', strtotime($tgl_minimal));
    $bulan_akhir = date("Y-m-t", strtotime($blth2."-01"));
    */

    $rs9 = mysqli_query($koneksi,"select count(*) as jumlahtcuti from tcuti where tahun='$tahun' and jenistcuti='$jenistcuti'");
    $hasil9 = mysqli_fetch_array($rs9);
    if($hasil9){
        $jumlahtcuti = intval(stripslashes ($hasil9['jumlahtcuti']));
    } else {
        $jumlahtcuti = 0;
    }
    
    if($jumlahtcuti==0){
        $sukses=0;
        $gagal=0;
        //$rs2 = mysqli_query($koneksi,"select a.*,b.tgl_berhenti from hrisnew.data_pegawai a inner join organikplnt.setting_pegawai b on a.nip=b.nip where a.agama='$agama' and a.tgl_masuk>='$tgl_minimal' and a.tgl_masuk<>'' and (a.aktif='1' or (a.aktif<>'1' and b.tgl_berhenti<>'' and b.tgl_berhenti<='$tgl_maksimal'))");
        $rs2 = mysqli_query($koneksi,"select a.*,b.jenis,b.tgl_berhenti from hrisnew.data_pegawai a inner join organikplnt.setting_pegawai b on a.nip=b.nip where a.id_agama='$agama' and a.tgl_masuk<='$tgl_minimal' and a.tgl_masuk<>'' and (a.aktif='1' or (a.aktif<>'1' and b.tgl_berhenti<>'' and b.tgl_berhenti<='$tgl_maksimal'))");
        while ($hasil2 = mysqli_fetch_array($rs2)) {
        	$nip = stripslashes ($hasil2['nip']);
            $niptahun = $tahun.".".$nip;
            $jenis = stripslashes ($hasil2['jenis']);
            $aktif = stripslashes ($hasil2['aktif']);
            $tgl_masuk = stripslashes ($hasil2['tgl_masuk']);
            $tgl_berhenti = stripslashes ($hasil2['tgl_berhenti']);
            $agama = stripslashes ($hasil2['id_agama']);
        	$bank_payroll = stripslashes ($hasil2['bank_payroll']);
        	$no_rek_payroll = stripslashes ($hasil2['no_rek_payroll']);
        	$an_payroll = stripslashes ($hasil2['an_payroll']);

            if($jenis=='ORGANIK' || $jenis=='TUGAS KARYA' || $jenis=='TUGAS KERJA'){
                $koefisien = $koefisien1;
            } else {
                $koefisien = $koefisien2;
            }

            $rs3 = mysqli_query($koneksi,"select honorarium,honorer,tarif_grade from master_gaji where nip='$nip'");
            $hasil3 = mysqli_fetch_array($rs3);
            if($hasil3){
                $tarif_grade = floatval($hasil3['tarif_grade']);
                $honorarium = floatval($hasil3['honorarium']);
                $honorer = floatval($hasil3['honorer']);
            } else {
                $tarif_grade = 0;
                $honorarium = 0;
                $honorer = 0;
            }
            $p1 = $tarif_grade+$honorarium+$honorer;
            if($aktif=="1"){
                if($tgl_masuk<=$tgl_minimal){
                    $bulan_awal = $tgl_minimal;
                } else {
                    $bulan_awal = date('Y-m-01', strtotime($tgl_masuk));
                }
                $bulan_akhir = $tgl_maksimal;
            } else {
                if($tgl_masuk<=$tgl_minimal){
                    $bulan_awal = $tgl_minimal;
                } else {
                    $bulan_awal = date('Y-m-01', strtotime($tgl_masuk));
                }
                if($tgl_berhenti>$tgl_maksimal){
                    $bulan_akhir = $tgl_maksimal;
                } else {
                    $bulan_akhir = date('Y-m-t', strtotime($tgl_berhenti));
                }
            }
            $blth_awal = date('Y-m', strtotime($bulan_awal));
            $blth_akhir = date('Y-m', strtotime($bulan_akhir));
            $timeStart = strtotime($bulan_awal);
            $timeEnd = strtotime($bulan_akhir);
            $numBulan = 1 + (date("Y",$timeEnd)-date("Y",$timeStart))*12;
            $numBulan += date("m",$timeEnd)-date("m",$timeStart);
            $jumlah_bulan2 = $numBulan;             
            if($jumlah_bulan2>12){
                $jumlah_bulan = 12;
            } else {
                $jumlah_bulan = intval($jumlah_bulan2);
            }
            $tcuti = round(($koefisien*$p1)*($jumlah_bulan/12),0);
            //if($tcuti>0){
                $sql4 = "insert into tcuti(jenistcuti,blth,tahun,nip,niptahun,agama,aktif,tgl_masuk,tgl_berhenti,blth_awal,blth_akhir,jumlah_bulan,koefisien,p1,tcuti,tgl_proses,petugas,bank_payroll,no_rek_payroll,an_payroll)";
                $sql4 .= " values('$jenistcuti','$blth','$tahun','$nip','$niptahun','$agama','$aktif','$tgl_masuk','$tgl_berhenti','$blth_awal','$blth_akhir','$jumlah_bulan','$koefisien','$p1','$tcuti','$tgl_proses','$userhris','$bank_payroll','$no_rek_payroll','$an_payroll')";
                $result4 = @mysqli_query($koneksi,$sql4);
                if ($result4){
                    $sukses = $sukses+1;
                } else {
                    $sukses = $sukses;
                }  
            //}
        }
        echo json_encode(array('errorMsg'=>'Sukses : '.$sukses.', Gagal : '.$gagal));
    } else {
        echo json_encode(array('errorMsg'=>$nama_jenistcuti.' ini sudah pernah diproses.'));
    }
}
?>