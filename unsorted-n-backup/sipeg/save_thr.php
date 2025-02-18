<?php
session_start();
$userhris = $_SESSION["userakseshris"];
ini_set('date.timezone', 'Asia/Jakarta');
if ($userhris){
    include 'koneksi.php';
    // include 'koneksi_sipeg.php';
    $tgl_proses = date("Y-m-d");
    $jam_ini = date("H:i:s");
    
    $blth = $_REQUEST['blththr'];
    $tgl_thr = $_REQUEST['tgl_thrthr'];
    $tgl_thr2 = date('Y-m-01', strtotime($tgl_thr));
    $jenisthr = $_REQUEST['jenisthrthr'];
    $koefisien1 = $_REQUEST['koefisien1thr'];
    $koefisien2 = $_REQUEST['koefisien2thr'];
    /*
    $blth = "2023-04";
    $tgl_thr = "2023-04-22";
    $tgl_thr2 = date('Y-m-t', strtotime($tgl_thr));
    $jenisthr = "1";
    $koefisien = 2;
    */
    
    $tahun = substr($blth,0,4);    
    $tgl_minimal2 = date('Y-m-t', strtotime($tgl_thr2.'-12 months'));
    $tgl_minimal = date('Y-m-01', strtotime($tgl_minimal2.'+1 days'));
    $tgl_maksimal = date('Y-m-t', strtotime($tgl_thr));

    $rs2 = mysqli_query($koneksi,"select * from jenis_thr where jenisthr='$jenisthr'");
    $hasil2 = mysqli_fetch_array($rs2);
    $nama_jenisthr = stripslashesx ($hasil2['nama_jenisthr']);
    $agama = stripslashesx ($hasil2['agama']);

    /*
    $blth_awal = date('Y-m', strtotime($tgl_thr2.'-1 month'));
    $blth_awal = substr($tgl_thr,0,7);
    //$batas_minimal = date('Y-m-d', strtotime($tgl_thr2. ' - 30 days'));
    $batas_minimal = date('Y-m-d', strtotime($tgl_thr2.'-1 month'));
    $blth_minimal2 = date('Y-m-t', strtotime($tgl_thr2.'-12 month'));
    $tgl_minimal = date('Y-m-01', strtotime($blth_minimal2.'+1 day'));
    $blth_minimal = date('Y-m', strtotime($tgl_minimal));
    $bulan_akhir = date("Y-m-t", strtotime($blth2."-01"));
    */

    $rs9 = mysqli_query($koneksi,"select count(*) as jumlahthr from thr where tahun='$tahun' and jenisthr='$jenisthr'");
    $hasil9 = mysqli_fetch_array($rs9);
    if($hasil9){
        $jumlahthr = intval(stripslashesx ($hasil9['jumlahthr']));
    } else {
        $jumlahthr = 0;
    }
    
    if($jumlahthr==0){
        $sukses=0;
        $gagal=0;
        //$rs2 = mysqli_query($koneksi,"select a.*,b.tgl_berhenti from hrisnew.data_pegawai a inner join organikplnt.setting_pegawai b on a.nip=b.nip where a.agama='$agama' and a.tgl_masuk>='$tgl_minimal' and a.tgl_masuk<>'' and (a.aktif='1' or (a.aktif<>'1' and b.tgl_berhenti<>'' and b.tgl_berhenti<='$tgl_maksimal'))");
        // $rs2 = mysqli_query($koneksi,"select a.*,b.jenis,b.tgl_berhenti from hrisnew.data_pegawai a inner join organikplnt.setting_pegawai b on a.nip=b.nip where a.id_agama='$agama' and a.tgl_masuk<='$tgl_minimal' and a.tgl_masuk<>'' and (a.aktif='1' or (a.aktif<>'1' and b.tgl_berhenti<>'' and b.tgl_berhenti<='$tgl_maksimal'))");
        $rs2 = mysqli_query($koneksi,"select * from data_pegawaiwhere agama='$agama' and tgl_masuk<='$tgl_minimal' and tgl_masuk<>'' and (aktif='1' or (aktif<>'1' and tgl_berhenti<>'' and tgl_berhenti<='$tgl_maksimal'))");
        while ($hasil2 = mysqli_fetch_array($rs2)) {
        	$nip = stripslashesx ($hasil2['nip']);
            $niptahun = $tahun.".".$nip;
            $jenis = stripslashesx ($hasil2['jenis']);
            $aktif = stripslashesx ($hasil2['aktif']);
            $tgl_masuk = stripslashesx ($hasil2['tgl_masuk']);
            $tgl_berhenti = stripslashesx ($hasil2['tgl_berhenti']);
            $agama = stripslashesx ($hasil2['id_agama']);
        	$bank_payroll = stripslashesx ($hasil2['nama_bank']);
        	$no_rek_payroll = stripslashesx ($hasil2['no_rekening']);
        	$an_payroll = stripslashesx ($hasil2['nama_bank']);

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
            $thr = round(($koefisien*$p1)*($jumlah_bulan/12),0);
            //if($thr>0){
                $sql4 = "insert into thr(jenisthr,blth,tahun,nip,niptahun,agama,aktif,tgl_masuk,tgl_berhenti,blth_awal,blth_akhir,jumlah_bulan,koefisien,p1,thr,tgl_proses,petugas,bank_payroll,no_rek_payroll,an_payroll)";
                $sql4 .= " values('$jenisthr','$blth','$tahun','$nip','$niptahun','$agama','$aktif','$tgl_masuk','$tgl_berhenti','$blth_awal','$blth_akhir','$jumlah_bulan','$koefisien','$p1','$thr','$tgl_proses','$userhris','$bank_payroll','$no_rek_payroll','$an_payroll')";
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
        echo json_encode(array('errorMsg'=>$nama_jenisthr.' ini sudah pernah diproses.'));
    }
}
?>