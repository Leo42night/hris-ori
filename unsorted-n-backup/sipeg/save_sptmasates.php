<?php
error_reporting(1);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    ini_set('date.timezone', 'Asia/Jakarta');
    include 'koneksi.php';
    // include 'koneksi_sipeg.php';
    include '../fungsi.php';
    include "../stringvalidasi.php";
    $kunci = "cipher.hris@s7o";
    $hari_ini = date("Y-m-d H:i:s");
    $jam_ini = date("H:i:s");    
    
    // $blth = $_REQUEST['blthsptmasa'];
    // $kpp2 = $_REQUEST['kppsptmasa'];
    // $nip2 = $_REQUEST['nipsptmasa'];    
    // $userhris = $_REQUEST['userhris'];    
    $blth = "2024-12";
    $kpp2 = "SEMUA";
    // $nip2 = "7702003R2";
    $nip2 = "7719002PCN";
    $userhris = "sandy";
    
    $tahunnya = substr($blth,0,4);
    $tahun = substr($blth,0,4);
    if($nip2!=""){
        $aktivitas = "Proses SPT Masa untuk blth : $blth, nip : $nip2";
    } else {
        $aktivitas = "Proses SPT Masa untuk blth : $blth";
    }
    
    $perintah = "";
    if($nip2!=""){
        $perintah .= " and nip='$nip2'";
    }
    
    $rs99 = mysqli_query($koneksi,"select no_urut from pph21masa where blth='$blth' order by (no_urut*1) desc limit 1");
    $hasil99 = mysqli_fetch_array($rs99);
    if($hasil99){
        $urut = intval($hasil99['no_urut']);
        $urut2 = $urut+1;
    } else {
        $urut2 = 1;
    }
    
    $rs1 = mysqli_query($koneksi,"select user_fullname from masteruser where user_name='$userhris'");
    $hasil1 = mysqli_fetch_array($rs1);
    $nama_petugas = stripslashesx($hasil1['user_fullname']);
    
    $rs9 = mysqli_query($koneksi,"select count(*) as jumlahspt from pph21masa where blth='$blth'".$perintah);
    $hasil9 = mysqli_fetch_array($rs9);
    if($hasil9){
        $jumlahspt = intval(stripslashesx ($hasil9['jumlahspt']));
    } else {
        $jumlahspt = 0;
    }
    
    // $pesan = "";
    if($jumlahspt==0){
        $sukses=0;
        if($blth<$tahun."-12"){
            /*
            $rs4 = mysqli_query($koneksi,"SELECT * from v_list_pajak where nip<>'' and blth<>'' and blth='$blth'".$perintah." group by nip order by nip asc");
            while($hasil4 = mysqli_fetch_array($rs4)){
                $nip2 = $hasil4['nip'];
                $kode = $blth."-".$nip2;
    
                $rs14 = mysqli_query($koneksi,"SELECT nip from gaji where blth='$blth' and nip='$nip2'");
                $hasil14 = mysqli_fetch_array($rs14);
                if($hasil14){
                    $data_gaji = 1;
                } else {
                    $data_gaji = 0;
                }
            
                $no_urut = str_pad($urut2,8,"0",STR_PAD_LEFT);
    
                $rs3 = mysqli_query($koneksi,"SELECT * from data_pegawai where nip='$nip2'");
                $hasil3 = mysqli_fetch_array($rs3);
                $nip = $hasil3['nip'];
                $niplama = $hasil3['niplama'];
                $tgl_masuk = $hasil3['tgl_masuk'];
                $kpp = $hasil3['kpp'];
                $npwp = $hasil3['npwp'];
                $npwp1 = $npwp;
                if($npwp!="" && strlen($npwp)>20){
                    $npwp = decryptText($npwp, $kunci);
                }    
                $npwp = str_replace(" ","",$npwp);
                $npwp = str_replace("-","",$npwp);
                $npwp = str_replace(".","",$npwp);
                $npwp = str_replace(",","",$npwp);
                $npwp = str_replace("'","",$npwp);
                $npwp = substr($npwp,0,15);
    
                $jenis_mutasi = $hasil3['jenis_mutasi'];
                $jenis = $hasil3['jenis'];
                $grade = $hasil3['grade'];
                $skala_grade = $hasil3['skala_grade'];
                $jabatan = $hasil3['jabatan'];
                //$tgl_masuk = $hasil['tgl_masuk'];
                $tgl_berhenti = $hasil3['tgl_berhenti'];
                $status2 = $hasil3['status'];
                $aktif = $hasil3['aktif'];
                $blthnip = $blth.".".$nip;
                
                $rs39 = mysqli_query($koneksi,"SELECT min(blth) as bulan_masuk from gaji where nip='$nip'");
                $hasil39 = mysqli_fetch_array($rs39);
                if($hasil39){
                    $bulan_masuk = $hasil39['bulan_masuk'];
                } else {
                    $bulan_masuk = "";
                }
                if($bulan_masuk!==""){
                    $tgl_masuk = $bulan_masuk."-01";  
                } else {
                    $tgl_masuk = $tgl_masuk;
                }        
                    
                $rs = mysqli_query($koneksi,"SELECT * from gaji where blth='$blth' and nip='$nip2'");
                $hasil = mysqli_fetch_array($rs);
                if($hasil){
                    $gaji_dasar = floatval($hasil['gaji_dasar']);
                    $honorarium2 = floatval($hasil['honorarium']);
                    $honorer = floatval($hasil['honorer']);
                    $honorarium = $honorarium2+$honorer;
                    $tarif_grade = floatval($hasil['tarif_grade']);
                    $gaji = $tarif_grade;
                    $thp = $tarif_grade+$honorarium+$honorer;
                    $tunjangan_posisi = floatval($hasil['tunjangan_posisi']);
                    $p21b = floatval($hasil['p21b']);
                    $tunjangan_kemahalan = floatval($hasil['tunjangan_kemahalan']);
                    $tunjangan_perumahan = floatval($hasil['tunjangan_perumahan']);
                    $tunjangan_transportasi = floatval($hasil['tunjangan_transportasi']);
                    $bantuan_pulsa = floatval($hasil['bantuan_pulsa']);
                    $tunjangan_kompetensi = floatval($hasil['tunjangan_kompetensi']);
                    $dplk_persero = floatval($hasil['dplk_persero']);
                    $dplk_simponi_pr = floatval($hasil['dplk_simponi_pr']);
                    $lembur = floatval($hasil['lembur']);
                    $tunjangan1 = floatval($hasil['tunjangan1']);
                    $tunjangan2 = floatval($hasil['tunjangan2']);
                    $tunjangan3 = floatval($hasil['tunjangan3']);
                    $tunjangan4 = floatval($hasil['tunjangan4']);
                    $pot_koperasi = floatval($hasil['pot_koperasi']);
                    $pot_bazis = floatval($hasil['pot_bazis']);
                    $dplk_simponi = floatval($hasil['dplk_simponi']);
                    $pot_dplk_pribadi = floatval($hasil['pot_dplk_pribadi']);
                    $potongan1 = floatval($hasil['potongan1']);
                    $potongan2 = floatval($hasil['potongan2']);
                    $potongan3 = floatval($hasil['potongan3']);
                    $potongan4 = floatval($hasil['potongan4']);
            
                    $bpjs_tk_pp = floatval($hasil['bpjs_tk_pp']);
                    $bpjs_tk_kp = floatval($hasil['bpjs_tk_kp']);
                    $bpjs_tk_kkp = floatval($hasil['bpjs_tk_kkp']);
                    $bpjs_tk_htp = floatval($hasil['bpjs_tk_htp']);
                    $bpjs_tk_jhtk = floatval($hasil['bpjs_tk_jhtk']);
                    $bpjs_tk_pk = floatval($hasil['bpjs_tk_pk']);
                    $bpjs_kes_pp = floatval($hasil['bpjs_kes_pp']);
                    $bpjs_kes_pk = floatval($hasil['bpjs_kes_pk']);
                } else {
                    $gaji_dasar = 0;
                    $honorarium2 = 0;
                    $honorer = 0;
                    $honorarium = 0;
                    $tarif_grade = 0;
                    $gaji = 0;
                    $thp = 0;
                    $tunjangan_posisi = 0;
                    $p21b = 0;
                    $tunjangan_kemahalan = 0;
                    $tunjangan_perumahan = 0;
                    $tunjangan_transportasi = 0;
                    $bantuan_pulsa = 0;
                    $tunjangan_kompetensi = 0;
                    $dplk_persero = 0;
                    $dplk_simponi_pr = 0;
                    $lembur = 0;
                    $tunjangan1 = 0;
                    $tunjangan2 = 0;
                    $tunjangan3 = 0;
                    $tunjangan4 = 0;
                    $pot_koperasi = 0;
                    $pot_bazis = 0;
                    $dplk_simponi = 0;
                    $pot_dplk_pribadi = 0;
                    $potongan1 = 0;
                    $potongan2 = 0;
                    $potongan3 = 0;
                    $potongan4 = 0;
            
                    $bpjs_tk_pp = 0;
                    $bpjs_tk_kp = 0;
                    $bpjs_tk_kkp = 0;
                    $bpjs_tk_htp = 0;
                    $bpjs_tk_jhtk = 0;
                    $bpjs_tk_pk = 0;
                    $bpjs_kes_pp = 0;
                    $bpjs_kes_pk = 0;
                }
        
                // $benefit = $bpjs_kes_pp+$bpjs_tk_pp+$bpjs_tk_kp+$bpjs_tk_kkp+$bpjs_tk_htp+$dplk_simponi_pr;
                $benefit2 = $bpjs_kes_pp+$bpjs_tk_kp+$bpjs_tk_kkp+$dplk_persero+$dplk_simponi_pr;
        
                //$iuran_pensiunb = $bpjs_tk_jhtk+$bpjs_tk_pk+$bpjs_kes_pk+$dplk_simponi;
                //$query3 = "SELECT * from cuti_tahunan where nip='$nip' and blth='$blth'";
                $blth2 = date('Y-m-t', strtotime($blth."-01"));
                // if($blth_gaji!=$blth){
                //   $blth2 = date('Y-m-t', strtotime($blth_gaji."-01"));
                // }
                //$blth2 = date('Y-m-t', strtotime($blth."-01"));
                $blth_awal = $blth;
                $blth_akhir = $blth;
                $masa_kerja = 1;
    
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(uang_cuti) as uang_cuti from cuti_tahunan where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $uang_cuti = floatval($hasil3['uang_cuti']);
                } else {
                    $uang_cuti = 0;
                }
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(uang_cuti) as uang_cuti_besar from cuti_besar where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $uang_cuti_besar = floatval($hasil3['uang_cuti_besar']);
                } else {
                    $uang_cuti_besar = 0;
                }
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(p31) as iks from iks where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $iks = floatval($hasil3['iks']);
                } else {
                    $iks = 0;
                }
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(bonus) as bonus from bonus where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $bonus = floatval($hasil3['bonus']);
                } else {
                    $bonus = 0;
                }
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(honorarium) as honorarium_eo from honorarium_eo where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $honorarium_eo = floatval($hasil3['honorarium_eo']);
                } else {
                    $honorarium_eo = 0;
                }
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(thr) as thr from thr where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $thr = floatval($hasil3['thr']);
                } else {
                    $thr = 0;
                }
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(winduan) as uang_winduan from winduan where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $uang_winduan = floatval($hasil3['uang_winduan']);
                } else {
                    $uang_winduan = 0;
                }
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(uang_pesangon) as uang_pesangon from pesangon where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $uang_pesangon = floatval($hasil3['uang_pesangon']);
                } else {
                    $uang_pesangon = 0;
                }
                    
                $tantiem = 0;
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(a.total) as sppd_pusat from biaya_sppd1 a inner join sppd1 b on a.idsppd=b.idsppd where b.nip='$nip' and b.kd_project_sap='PUST_KPUS_13_0000' and b.jenis_sppd<>'3' and substr(b.tgl_bayar,1,7)='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $sppd_pusat = floatval($hasil3['sppd_pusat']);
                } else {
                    $sppd_pusat = 0;
                }
                $rs3 = mysqli_query($koneksi,"SELECT sum(a.total) as sppd_region from biaya_sppd1 a inner join sppd1 b on a.idsppd=b.idsppd where b.nip='$nip' and b.kd_project_sap<>'PUST_KPUS_13_0000' and b.jenis_sppd<>'3' and substr(b.tgl_bayar,1,7)='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $sppd_region = floatval($hasil3['sppd_region']);
                } else {
                    $sppd_region = 0;
                }
                $rs3 = mysqli_query($koneksi,"SELECT sum(a.total) as sppd_mutasi from biaya_sppd1 a inner join sppd1 b on a.idsppd=b.idsppd where b.nip='$nip' and b.jenis_sppd='3' and substr(b.tgl_bayar,1,7)='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $sppd_mutasi = floatval($hasil3['sppd_mutasi']);
                } else {
                    $sppd_mutasi = 0;
                }
                $sppd = $sppd_pusat+$sppd_region+$sppd_mutasi;
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(cop) as cop,sum(fasilitas_hp) as fasilitas_hp,sum(reimburse_kesehatan) as reimburse_kesehatan,sum(asuransi_kesehatan) as asuransi_kesehatan,sum(sarana_kerja) as sarana_kerja,sum(sppd_manual) as sppd_manual,sum(asuransi_purna_jabatan) as asuransi_purna_jabatan,sum(medical_checkup) as medical_checkup from natura where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $cop = floatval($hasil3['cop']);
                    $fasilitas_hp = floatval($hasil3['fasilitas_hp']);
                    $reimburse_kesehatan = floatval($hasil3['reimburse_kesehatan']);
                    $asuransi_kesehatan = floatval($hasil3['asuransi_kesehatan']);
                    $sarana_kerja = floatval($hasil3['sarana_kerja']);
                    $sppd_manual = floatval($hasil3['sppd_manual']);
                    $asuransi_purna_jabatan = floatval($hasil3['asuransi_purna_jabatan']);
                    $medical_checkup = floatval($hasil3['medical_checkup']);
                } else {
                    $cop = 0;
                    $fasilitas_hp = 0;
                    $reimburse_kesehatan = 0;
                    $asuransi_kesehatan = 0;
                    $sarana_kerja = 0;
                    $sppd_manual = 0;
                    $asuransi_purna_jabatan = 0;
                    $medical_checkup = 0;
                }
                $natuna = $sppd+$cop+$fasilitas_hp+$reimburse_kesehatan+$asuransi_kesehatan+$sarana_kerja+$sppd_manual+$asuransi_purna_jabatan+$medical_checkup;
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(gaji) as gaji,sum(tunjangan_posisi) as tunjangan_posisi,sum(p21b) as p21b,sum(tunjangan_kemahalan) as tunjangan_kemahalan,sum(tunjangan_perumahan) as tunjangan_perumahan,sum(tunjangan_transportasi) as tunjangan_transportasi,sum(bantuan_pulsa) as bantuan_pulsa,sum(cuti) as cuti,sum(thr) as thr,sum(iks) as iks,sum(bonus) as bonus,sum(winduan) as winduan,sum(honorarium_eo) as honorarium_eo from suplisi where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $sgaji = floatval($hasil3['gaji']);
                    $stunjangan_posisi = floatval($hasil3['tunjangan_posisi']);
                    $sp21b = floatval($hasil3['p21b']);
                    $stunjangan_kemahalan = floatval($hasil3['tunjangan_kemahalan']);
                    $stunjangan_perumahan = floatval($hasil3['tunjangan_perumahan']);
                    $stunjangan_transportasi = floatval($hasil3['tunjangan_transportasi']);
                    $sbantuan_pulsa = floatval($hasil3['bantuan_pulsa']);
                    $scuti = floatval($hasil3['cuti']);
                    $sthr = floatval($hasil3['thr']);
                    $siks = floatval($hasil3['iks']);
                    $sbonus = floatval($hasil3['bonus']);
                    $swinduan = floatval($hasil3['winduan']);
                    $shonorarium_eo = floatval($hasil3['honorarium_eo']);
                } else {
                    $sgaji = 0;
                    $stunjangan_posisi = 0;
                    $sp21b = 0;
                    $stunjangan_kemahalan = 0;
                    $stunjangan_perumahan = 0;
                    $stunjangan_transportasi = 0;
                    $sbantuan_pulsa = 0;
                    $scuti = 0;
                    $sthr = 0;
                    $siks = 0;
                    $sbonus = 0;
                    $swinduan = 0;
                    $shonorarium_eo = 0;
                }
                if($honorarium2>0){
                $honorarium2 = $honorarium2+$sgaji;
                } else if($honorer>0){
                $honorer = $honorer+$sgaji;
                } else {
                $gaji = $gaji+$sgaji;
                }
                $honorarium = $honorarium2+$honorer;
                $tunjangan_posisi = $tunjangan_posisi+$stunjangan_posisi;
                $p21b = $p21b+$sp21b;
                $tunjangan_kemahalan = $tunjangan_kemahalan+$stunjangan_kemahalan;
                $tunjangan_transportasi = $tunjangan_transportasi+$stunjangan_transportasi;
                $tunjangan_perumahan = $tunjangan_perumahan+$stunjangan_perumahan;
                $bantuan_pulsa = $bantuan_pulsa+$sbantuan_pulsa;
                $uang_cuti = $uang_cuti+$scuti;
                $iks = $iks+$siks;
                $bonus = $bonus+$sbonus;
                $honorarium_eo = $honorarium_eo+$shonorarium_eo;
                $thr = $thr+$sthr;
                $uang_winduan = $uang_winduan+$swinduan;
        
                //$sppd = 0;
                $tunjangan_variable = $tunjangan_posisi+$p21b+$tunjangan_kemahalan+$tunjangan_transportasi+$tunjangan_perumahan+$bantuan_pulsa+$tunjangan_kompetensi+$tunjangan1+$tunjangan2+$tunjangan3+$tunjangan4+$lembur;
                //$natuna = 0;
        
                //$bonus_thr = $uang_cuti+$iks+$bonus+$honorarium_eo+$thr+$uang_winduan+$uang_suplisi;      
                $bonus_thr = $uang_cuti+$uang_cuti_besar+$iks+$bonus+$honorarium_eo+$thr+$uang_winduan+$tantiem+$uang_pesangon;
                $tunjangan_pph = 0;
    
                $rs3 = mysqli_query($koneksi,"select * from beban_pph21 where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $beban_pph21 = floatval($hasil3['beban_pph21']);
                } else {
                    $beban_pph21 = 0;
                }
        
                $brutob = $gaji+$tunjangan_variable+$honorarium+$benefit2+$natuna+$beban_pph21+$bonus_thr;
                $biaya_jabatanb = 0;
                $iuran_pensiunb = 0;
    
                //Batas Atas Mapping Pajak
    
                $rs2 = mysqli_query($koneksi,"SELECT * from mapping_pajak where nip='$nip2'");
                $hasil2 = mysqli_fetch_array($rs2);
                if($hasil2){                
                    $kode_departemen = $hasil2['kode_departemen'];
                    $kode_project = $hasil2['kode_project'];
                    $akun_honorarium = $hasil2['honorarium'];
                    $akun_honorer = $hasil2['honorer'];
                    $akun_tarif_grade = $hasil2['tarif_grade'];
                    $akun_tunjangan_posisi = $hasil2['tunjangan_posisi'];
                    $akun_p21b = $hasil2['p21b'];
                    $akun_p22b = $hasil2['p22b'];
                    $akun_tunjangan_kemahalan = $hasil2['tunjangan_kemahalan'];
                    $akun_tunjangan_perumahan = $hasil2['tunjangan_perumahan'];
                    $akun_tunjangan_transportasi = $hasil2['tunjangan_transportasi'];
                    $akun_bantuan_pulsa = $hasil2['bantuan_pulsa'];
                    $akun_tunjangan_kompetensi = $hasil2['tunjangan_kompetensi'];
                    $akun_dplk_persero = $hasil2['dplk_persero'];
                    $akun_dplk_simponi_pr = $hasil2['dplk_simponi_pr'];        
                    $akun_bpjs_tk_pp = $hasil2['bpjs_tk_pp'];
                    $akun_bpjs_tk_kp = $hasil2['bpjs_tk_kp'];
                    $akun_bpjs_tk_kkp = $hasil2['bpjs_tk_kkp'];
                    $akun_bpjs_tk_htp = $hasil2['bpjs_tk_htp'];
                    $akun_bpjs_kes_pp = $hasil2['bpjs_kes_pp'];
                    $akun_cop = $hasil2['cop'];
                    $akun_fasilitas_hp = $hasil2['fasilitas_hp'];
                    $akun_reimburse_kesehatan = $hasil2['reimburse_kesehatan'];
                    $akun_asuransi_kesehatan = $hasil2['asuransi_kesehatan'];
                    $akun_sarana_kerja = $hasil2['sarana_kerja'];
                    $akun_sppd_manual = $hasil2['sppd_manual'];
                    $akun_asuransi_purna_jabatan = $hasil2['asuransi_purna_jabatan'];
                    $akun_medical_checkup = $hasil2['medical_checkup'];
                    $akun_beban_pph21 = $hasil2['beban_pph21'];
                    $akun_thr = $hasil2['thr'];
                    $akun_cuti = $hasil2['cuti'];
                    $akun_cuti_besar = $hasil2['cuti_besar'];
                    $akun_winduan = $hasil2['winduan'];
                    $akun_iks = $hasil2['iks'];
                    $akun_ikp = $hasil2['ikp'];
                    $akun_sppd_pusat = $hasil2['sppd_pusat'];
                    $akun_sppd_region = $hasil2['sppd_region'];
                    $akun_sppd_mutasi = $hasil2['sppd_mutasi'];
                } else {
                    $akun_honorarium = "";
                    $akun_honorer = "";
                    $akun_tarif_grade = "";
                    $akun_tunjangan_posisi = "";
                    $akun_p21b = "";
                    $akun_p22b = "";
                    $akun_tunjangan_kemahalan = "";
                    $akun_tunjangan_perumahan = "";
                    $akun_tunjangan_transportasi = "";
                    $akun_bantuan_pulsa = "";
                    $akun_tunjangan_kompetensi = "";
                    $akun_dplk_persero = "";
                    $akun_dplk_simponi_pr = "";        
                    $akun_bpjs_tk_pp = "";
                    $akun_bpjs_tk_kp = "";
                    $akun_bpjs_tk_kkp = "";
                    $akun_bpjs_tk_htp = "";
                    $akun_bpjs_kes_pp = "";
                    $akun_cop = "";
                    $akun_fasilitas_hp = "";
                    $akun_reimburse_kesehatan = "";
                    $akun_asuransi_kesehatan = "";
                    $akun_sarana_kerja = "";
                    $akun_sppd_manual = "";
                    $akun_asuransi_purna_jabatan = "";
                    $akun_medical_checkup = "";
                    $akun_beban_pph21 = "";
                    $akun_thr = "";
                    $akun_cuti = "";
                    $akun_cuti_besar = "";
                    $akun_winduan = "";
                    $akun_iks = "";
                    $akun_ikp = "";
                    $akun_sppd_pusat = "";
                    $akun_sppd_region = "";
                    $akun_sppd_mutasi = "";
                }
                // $bruto = $honorarium+$honorer+$tarif_grade+$tunjangan_posisi+$p21b+$p22b+$tunjangan_kemahalan+$tunjangan_perumahan+$tunjangan_transportasi+$bantuan_pulsa+$tunjangan_kompetensi+$dplk_persero+$dplk_simponi_pr+$bpjs_tk_pp+$bpjs_tk_kp+$bpjs_tk_kkp+$bpjs_tk_htp+$bpjs_kes_pp+$cop+$fasilitas_hp+$reimburse_kesehatan+$asuransi_kesehatan+$sarana_kerja+$sppd_manual+$asuransi_purna_jabatan+$medical_checkup+$beban_pph21+$thr+$uang_cuti+$uang_cuti_besar+$uang_winduan+$iks+$bonus+$sppd_pusat+$sppd_region+$sppd_mutasi;
                $bruto = $honorarium2+$honorer+$tarif_grade+$tunjangan_posisi+$p21b+$p22b+$tunjangan_kemahalan+$tunjangan_perumahan+$tunjangan_transportasi+$bantuan_pulsa+$tunjangan_kompetensi+$dplk_persero+$dplk_simponi_pr+$bpjs_tk_kp+$bpjs_tk_kkp+$bpjs_kes_pp+$cop+$fasilitas_hp+$reimburse_kesehatan+$asuransi_kesehatan+$sarana_kerja+$sppd_manual+$asuransi_purna_jabatan+$medical_checkup+$beban_pph21+$thr+$uang_cuti+$uang_cuti_besar+$uang_winduan+$iks+$bonus+$sppd_pusat+$sppd_region+$sppd_mutasi;
    
                //Batas Bawah Mapping Pajak
        
                // $brutot = $brutob+$bonus_thr;
                $brutot = $brutob;
                $brutot_total = $brutob;
                $biaya_jabatant_total = 0;
                $iuran_pensiunt_total = 0;
                $biaya_pengurangt_total = $biaya_jabatant_total+$iuran_pensiunt_total;
                $biaya_jabatant = 0;
                $iuran_pensiunt = 0;    
                $biaya_pengurangt = $biaya_jabatant+$iuran_pensiunt;
                $nettot = $brutot-$biaya_pengurangt;
                $nettot_sebelumnya = 0;
                $nettot_total_sebelumnya = 0;
                $ppht_sebelumnya = 0; 
                $ppht_sebelumnya2 = 0;
                $ppht_sebelumnya1 = 0;
                
                //Batas Bawah
        
                $nettot_sebelumnya = 0;
                $nettot_akhir = $nettot+$nettot_sebelumnya;
        
                $nettot_total = $brutot_total-$biaya_pengurangt_total;
                $nettot_total_sebelumnya = 0;
                $nettot_total_akhir = $nettot_total+$nettot_total_sebelumnya;
        
                if($status2!="" && $status2!="-"){
                $status = $status2;
                } else {
                $status = "K0";
                }
                if($status=="TK0" || $status=="TK1" || $status=="K0"){
                    $kategori_pajak = "A";
                } else if($status=="TK2" || $status=="TK3" || $status=="K1" || $status=="K2"){
                    $kategori_pajak = "B";
                } else if($status=="K3"){
                    $kategori_pajak = "C";
                } else {
                    $kategori_pajak = "";
                }
    
                $rs3 = mysqli_query($koneksi,"select * from master_ptkp where status='$status'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $ptkp = floatval($hasil3['ptkp']);
                } else {
                    $ptkp = 0;
                }
        
                $pkp = 0;
                $rs3 = mysqli_query($koneksi,"select * from kategori_pajak where kategori='$kategori_pajak' and batas_awal<='$brutot' and batas_akhir>='$brutot'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $tarif = floatval($hasil3['tarif']);
                } else {
                    $tarif = 0;
                }
    
                $rs3 = mysqli_query($koneksi,"select * from perhitungan_pajak_pesangon where nip='$nip'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $status_pesangon = 1;
                } else {
                    $status_pesangon = 0;
                }
    
                $ppht_terutang = 0;
                $pph_sistem = 0;
                $pph_koreksi = 0;
                if($status_pesangon==0){
                    if(intval($data_gaji)==1){
                        $pphb1_terutang = ceil(($brutot*$tarif)/100);
                        $ppht = $pphb1_terutang;
                    } else {
                        $pkp = $brutot;
                        if($pkp<=60000000){
                            $pkp1 = $pkp;
                            $pkp2 = 0;
                            $pkp3 = 0;
                            $pkp4 = 0;
                            $pkp5 = 0;
                        } else if($pkp>60000000 && $pkp<=250000000){
                            $pkp1 = 60000000;
                            $pkp2 = $pkp-$pkp1;
                            $pkp3 = 0;
                            $pkp4 = 0;
                            $pkp5 = 0;
                        } else if($pkp>250000000 && $pkp<=500000000){
                            $pkp1 = 60000000;
                            $pkp2 = 250000000-$pkp1;
                            $pkp3 = $pkp-$pkp2-$pkp1;
                            $pkp4 = 0;
                            $pkp5 = 0;
                        } else if($pkp>500000000 && $pkp<=5000000000){
                            $pkp1 = 60000000;
                            $pkp2 = 250000000-$pkp1;
                            $pkp3 = 500000000-$pkp2-$pkp1;
                            $pkp4 = $pkp-$pkp3-$pkp2-$pkp1;
                            $pkp5 = 0;
                        } else if($pkp>5000000000){
                            $pkp1 = 60000000;
                            $pkp2 = 250000000-$pkp1;
                            $pkp3 = 500000000-$pkp2-$pkp1;
                            $pkp4 = 5000000000-$pkp3-$pkp2-$pkp1;
                            $pkp5 = $pkp-$pkp4-$pkp3-$pkp2-$pkp1;
                        } else {
                            $pkp1 = 0;
                            $pkp2 = 0;
                            $pkp3 = 0;
                            $pkp4 = 0;
                            $pkp5 = 0;
                        }
                        $ppht1 = ceil($pkp1*0.05);
                        $ppht2 = ceil($pkp2*0.15);
                        $ppht3 = ceil($pkp3*0.25);
                        $ppht4 = ceil($pkp4*0.30);
                        $ppht5 = ceil($pkp5*0.35);
    
                        $ppht = $ppht1+$ppht2+$ppht3+$ppht4+$ppht5;
                        $pphb1_terutang = $ppht;
                    }
                } else {
                    $pkp = $brutot;
                    if($pkp<=50000000){
                        $pkp1 = $pkp;
                        $pkp2 = 0;
                        $pkp3 = 0;
                        $pkp4 = 0;
                        $pkp5 = 0;
                    } else if($pkp>50000000 && $pkp<=100000000){
                        $pkp1 = 50000000;
                        $pkp2 = $pkp-$pkp1;
                        $pkp3 = 0;
                        $pkp4 = 0;
                        $pkp5 = 0;
                    } else if($pkp>100000000 && $pkp<=500000000){
                        $pkp1 = 50000000;
                        $pkp2 = 100000000-$pkp1;
                        $pkp3 = $pkp-$pkp2-$pkp1;
                        $pkp4 = 0;
                        $pkp5 = 0;
                    } else if($pkp>500000000 && $pkp<=5000000000){
                        $pkp1 = 60000000;
                        $pkp2 = 250000000-$pkp1;
                        $pkp3 = 500000000-$pkp2-$pkp1;
                        $pkp4 = $pkp-$pkp3-$pkp2-$pkp1;
                        $pkp5 = 0;
                    } else if($pkp>5000000000){
                        $pkp1 = 60000000;
                        $pkp2 = 250000000-$pkp1;
                        $pkp3 = 500000000-$pkp2-$pkp1;
                        $pkp4 = 5000000000-$pkp3-$pkp2-$pkp1;
                        $pkp5 = $pkp-$pkp4-$pkp3-$pkp2-$pkp1;
                    } else {
                        $pkp1 = 0;
                        $pkp2 = 0;
                        $pkp3 = 0;
                        $pkp4 = 0;
                        $pkp5 = 0;
                    }
                    // $ppht1 = ceil($pkp1*0.05);
                    $ppht1 = 0;
                    $ppht2 = ceil($pkp2*0.05);
                    $ppht3 = ceil($pkp3*0.15);
                    $ppht4 = ceil($pkp4*0.25);
                    $ppht5 = ceil($pkp5*0.30);
    
                    $ppht = $ppht1+$ppht2+$ppht3+$ppht4+$ppht5;
                    $pphb1_terutang = $ppht;
                }
                // $pphb1_terutang = ceil(($brutot*$tarif)/100);
                $pphb2_terutang = 0;
                $pphb_terutang = $pphb1_terutang;
                $tgl_proses = date("Y-m-d");
                $petugas = $userhris;
    
                if($bruto==$brutob){
                    $pph21 = $pphb_terutang;
                } else {
                    $pph21 = 0;
                }
                $sql2 = "insert into mapping_sptmasa(blth,nip,kode,kode_departemen,kode_project,honorarium,honorer,tarif_grade,tunjangan_posisi,p21b,p22b,tunjangan_kemahalan,tunjangan_perumahan";
                $sql2 .= ",tunjangan_transportasi,bantuan_pulsa,tunjangan_kompetensi,dplk_persero,dplk_simponi_pr,bpjs_tk_pp,bpjs_tk_kp,bpjs_tk_kkp,bpjs_tk_htp,bpjs_kes_pp";
                $sql2 .= ",cop,fasilitas_hp,reimburse_kesehatan,asuransi_kesehatan,sarana_kerja,sppd_manual,asuransi_purna_jabatan,medical_checkup,beban_pph21";
                $sql2 .= ",thr,cuti,cuti_besar,winduan,iks,ikp,sppd_pusat,sppd_region,sppd_mutasi,bruto,pph21";
                $sql2 .= ",akun_honorarium,akun_honorer,akun_tarif_grade,akun_tunjangan_posisi,akun_p21b,akun_p22b,akun_tunjangan_kemahalan,akun_tunjangan_perumahan";
                $sql2 .= ",akun_tunjangan_transportasi,akun_bantuan_pulsa,akun_tunjangan_kompetensi,akun_dplk_persero,akun_dplk_simponi_pr,akun_bpjs_tk_pp,akun_bpjs_tk_kp,akun_bpjs_tk_kkp,akun_bpjs_tk_htp,akun_bpjs_kes_pp";
                $sql2 .= ",akun_cop,akun_fasilitas_hp,akun_reimburse_kesehatan,akun_asuransi_kesehatan,akun_sarana_kerja,akun_sppd_manual,akun_asuransi_purna_jabatan,akun_medical_checkup,akun_beban_pph21";
                $sql2 .= ",akun_thr,akun_cuti,akun_cuti_besar,akun_winduan,akun_iks,akun_ikp,akun_sppd_pusat,akun_sppd_region,akun_sppd_mutasi)";
                $sql2 .= " values('$blth','$nip','$kode','$kode_departemen','$kode_project','$honorarium','$honorer','$tarif_grade','$tunjangan_posisi','$p21b','$p22b','$tunjangan_kemahalan','$tunjangan_perumahan'";
                $sql2 .= ",'$tunjangan_transportasi','$bantuan_pulsa','$tunjangan_kompetensi','$dplk_persero','$dplk_simponi_pr','$bpjs_tk_pp','$bpjs_tk_kp','$bpjs_tk_kkp','$bpjs_tk_htp','$bpjs_kes_pp'";
                $sql2 .= ",'$cop','$fasilitas_hp','$reimburse_kesehatan','$asuransi_kesehatan','$sarana_kerja','$sppd_manual','$asuransi_purna_jabatan','$medical_checkup','$beban_pph21'";
                $sql2 .= ",'$thr','$uang_cuti','$uang_cuti_besar','$uang_winduan','$iks','$bonus','$sppd_pusat','$sppd_region','$sppd_mutasi','$bruto','$pphb_terutang'";
                $sql2 .= ",'$akun_honorarium','$akun_honorer','$akun_tarif_grade','$akun_tunjangan_posisi','$akun_p21b','$akun_p22b','$akun_tunjangan_kemahalan','$akun_tunjangan_perumahan'";
                $sql2 .= ",'$akun_tunjangan_transportasi','$akun_bantuan_pulsa','$akun_tunjangan_kompetensi','$akun_dplk_persero','$akun_dplk_simponi_pr','$akun_bpjs_tk_pp','$akun_bpjs_tk_kp','$akun_bpjs_tk_kkp','$akun_bpjs_tk_htp','$akun_bpjs_kes_pp'";
                $sql2 .= ",'$akun_cop','$akun_fasilitas_hp','$akun_reimburse_kesehatan','$akun_asuransi_kesehatan','$akun_sarana_kerja','$akun_sppd_manual','$akun_asuransi_purna_jabatan','$akun_medical_checkup','$akun_beban_pph21'";
                $sql2 .= ",'$akun_thr','$akun_cuti','$akun_cuti_besar','$akun_winduan','$akun_iks','$akun_ikp','$akun_sppd_pusat','$akun_sppd_region','$akun_sppd_mutasi')";
                $result2 = @mysqli_query($koneksi,$sql2);
                
                $sql1 = "insert into pph21masa(kpp,npwp,no_urut,nip,status,tahun,blth,blthnip,blth_awal,blth_akhir,masa_kerja,gaji,tunjangan_pph";
                $sql1 .= ",tunjangan_variable,honorarium,benefit,natuna,beban_pph21,bonus_thr,brutob,biaya_jabatanb,iuran_pensiunb,brutot";
                $sql1 .= ",biaya_jabatant,iuran_pensiunt,biaya_pengurangt,nettot,brutot_total,biaya_jabatant_total,iuran_pensiunt_total";
                $sql1 .= ",biaya_pengurangt_total,nettot_total,nettot_sebelumnya,nettot_akhir,ptkp,pkp,ppht,ppht_sebelumnya,ppht_terutang";
                $sql1 .= ",pphb1_terutang,pphb2_terutang,pph_sistem,pph_koreksi,pphb_terutang,tgl_proses,petugas)";
                $sql1 .= " values('$kpp','$npwp','$no_urut','$nip','$status','$tahun','$blth','$blthnip','$blth_awal','$blth_akhir','$masa_kerja','$gaji','$tunjangan_pph'";
                $sql1 .= ",'$tunjangan_variable','$honorarium','$benefit2','$natuna','$beban_pph21','$bonus_thr','$brutob','$biaya_jabatanb','$iuran_pensiunb','$brutot'";
                $sql1 .= ",'$biaya_jabatant','$iuran_pensiunt','$biaya_pengurangt','$nettot','$brutot_total','$biaya_jabatant_total','$iuran_pensiunt_total'";
                $sql1 .= ",'$biaya_pengurangt_total','$nettot_total','$nettot_sebelumnya','$nettot_akhir','$ptkp','$pkp','$ppht','$ppht_sebelumnya','$ppht_terutang'";
                $sql1 .= ",'$pphb1_terutang','$pphb2_terutang','$pph_sistem','$pph_koreksi','$pphb_terutang','$tgl_proses','$petugas')";            
                $result1 = @mysqli_query($koneksi,$sql1);
                if ($result1){
                    $sukses = $sukses+1;
                } else {
                    $sukses = $sukses;
                }  
                $urut2 = $urut2+1;
            }
            if($sukses>0){
                $kode = $hari_ini."-".$userhris."-".$aktivitas;
                $sql5 = "insert into log_aktivitas(tanggal,user,nama,aktivitas,kode) values('$hari_ini','$userhris','$nama_petugas','$aktivitas','$kode')";
                $result5 = @mysqli_query($koneksi,$sql5);
                // echo json_encode(array('success'=>true));
            } else {
                //echo json_encode(array('errorMsg'=>'Gagal menyimpan data.'));
                // echo json_encode(array('errorMsg'=>mysqli_error()));
            }
            */
        } else {
            //Proses Pajak Rampung
            $pesan = "";
            $blth_awal = $tahun."-01";
            $blth_akhir = $tahun."-12";
            $rs4 = mysqli_query($koneksi,"SELECT trim(nip) as nip from v_list_pajak where nip<>'' and blth<>'' and blth<>'-' and substr(blth,1,4)='$tahun'".$perintah." group by trim(nip) order by nip asc");
            while($hasil4 = mysqli_fetch_array($rs4)){
                $nip2 = $hasil4['nip'];
                $kode = $blth."-".$nip2;
                $blthnip = $blth.".".$nip2;                
    
                $no_urut = str_pad($urut2,8,"0",STR_PAD_LEFT);
    
                $rs3 = mysqli_query($koneksi,"SELECT * from data_pegawai where nip='$nip2'");
                $hasil3 = mysqli_fetch_array($rs3);
                $nip = $hasil3['nip'];
                $niplama = $hasil3['niplama'];
                $tgl_masuk = $hasil3['tgl_masuk'];
                $kpp = $hasil3['kpp'];
                $npwp = $hasil3['npwp'];
                $npwp1 = $npwp;
                if($npwp!="" && strlen($npwp)>20){
                    $npwp = decryptText($npwp, $kunci);
                }    
                $npwp = str_replace(" ","",$npwp);
                $npwp = str_replace("-","",$npwp);
                $npwp = str_replace(".","",$npwp);
                $npwp = str_replace(",","",$npwp);
                $npwp = str_replace("'","",$npwp);
                $npwp = substr($npwp,0,15);
    
                $jenis_mutasi = $hasil3['jenis_mutasi'];
                $jenis = $hasil3['jenis'];
                $grade = $hasil3['grade'];
                $skala_grade = $hasil3['skala_grade'];
                $jabatan = $hasil3['jabatan'];
                //$tgl_masuk = $hasil['tgl_masuk'];
                $tgl_berhenti = $hasil3['tgl_berhenti'];
                $status2 = $hasil3['status'];
                $aktif = $hasil3['aktif'];
                
                $rs39 = mysqli_query($koneksi,"SELECT min(blth) as bulan_masuk from gaji where nip='$nip'");
                $hasil39 = mysqli_fetch_array($rs39);
                if($hasil39){
                    $bulan_masuk = $hasil39['bulan_masuk'];
                } else {
                    $bulan_masuk = "";
                }
                if($bulan_masuk!==""){
                    $tgl_masuk = $bulan_masuk."-01";  
                } else {
                    $tgl_masuk = $tgl_masuk;
                }                           
                
                $gaji_dasar = 0;
                $honorarium2 = 0;
                $honorer = 0;
                $honorarium = 0;
                $tarif_grade = 0;
                $gaji = 0;
                $thp = 0;
                $tunjangan_posisi = 0;
                $p21b = 0;
                $tunjangan_kemahalan = 0;
                $tunjangan_perumahan = 0;
                $tunjangan_transportasi = 0;
                $bantuan_pulsa = 0;
                $tunjangan_kompetensi = 0;
                $dplk_persero = 0;
                $dplk_simponi_pr = 0;
                $lembur = 0;
                $tunjangan1 = 0;
                $tunjangan2 = 0;
                $tunjangan3 = 0;
                $tunjangan4 = 0;
                $pot_koperasi = 0;
                $pot_bazis = 0;
                $dplk_simponi = 0;
                $pot_dplk_pribadi = 0;
                $potongan1 = 0;
                $potongan2 = 0;
                $potongan3 = 0;
                $potongan4 = 0;
        
                $bpjs_tk_pp = 0;
                $bpjs_tk_kp = 0;
                $bpjs_tk_kkp = 0;
                $bpjs_tk_htp = 0;
                $bpjs_tk_jhtk = 0;
                $bpjs_tk_pk = 0;
                $bpjs_kes_pp = 0;
                $bpjs_kes_pk = 0;
                $rs = mysqli_query($koneksi,"SELECT * from gaji where blth>='$blth_awal' and blth<='$blth_akhir' and nip='$nip'");
                while($hasil = mysqli_fetch_array($rs)){
                    $gaji_dasar2 = floatval($hasil['gaji_dasar']);
                    $honorarium3 = floatval($hasil['honorarium']);
                    $honorer3 = floatval($hasil['honorer']);
                    $honorarium2 = $honorarium3+$honorer3;
                    $tarif_grade2 = floatval($hasil['tarif_grade']);
                    $gaji2 = $tarif_grade;
                    $thp2 = $tarif_grade+$honorarium3+$honorer3;
                    $tunjangan_posisi2 = floatval($hasil['tunjangan_posisi']);
                    $p21b2 = floatval($hasil['p21b']);
                    $tunjangan_kemahalan2 = floatval($hasil['tunjangan_kemahalan']);
                    $tunjangan_perumahan2 = floatval($hasil['tunjangan_perumahan']);
                    $tunjangan_transportasi2 = floatval($hasil['tunjangan_transportasi']);
                    $bantuan_pulsa2 = floatval($hasil['bantuan_pulsa']);
                    $tunjangan_kompetensi2 = floatval($hasil['tunjangan_kompetensi']);
                    $dplk_persero2 = floatval($hasil['dplk_persero']);
                    $dplk_simponi_pr2 = floatval($hasil['dplk_simponi_pr']);
                    $lembur2 = floatval($hasil['lembur']);
                    $tunjangan12 = floatval($hasil['tunjangan1']);
                    $tunjangan22 = floatval($hasil['tunjangan2']);
                    $tunjangan32 = floatval($hasil['tunjangan3']);
                    $tunjangan42 = floatval($hasil['tunjangan4']);
                    $pot_koperasi2 = floatval($hasil['pot_koperasi']);
                    $pot_bazis2 = floatval($hasil['pot_bazis']);
                    $dplk_simponi2 = floatval($hasil['dplk_simponi']);
                    $pot_dplk_pribadi2 = floatval($hasil['pot_dplk_pribadi']);
                    $potongan12 = floatval($hasil['potongan1']);
                    $potongan22 = floatval($hasil['potongan2']);
                    $potongan32 = floatval($hasil['potongan3']);
                    $potongan42 = floatval($hasil['potongan4']);
            
                    $bpjs_tk_pp2 = floatval($hasil['bpjs_tk_pp']);
                    $bpjs_tk_kp2 = floatval($hasil['bpjs_tk_kp']);
                    $bpjs_tk_kkp2 = floatval($hasil['bpjs_tk_kkp']);
                    $bpjs_tk_htp2 = floatval($hasil['bpjs_tk_htp']);
                    $bpjs_tk_jhtk2 = floatval($hasil['bpjs_tk_jhtk']);
                    $bpjs_tk_pk2 = floatval($hasil['bpjs_tk_pk']);
                    $bpjs_kes_pp2 = floatval($hasil['bpjs_kes_pp']);
                    $bpjs_kes_pk2 = floatval($hasil['bpjs_kes_pk']);
    
                    $gaji_dasar = $gaji_dasar+$gaji_dasar2;
                    $honorarium = $honorarium+$honorarium2;
                    $honorer = $honorer+$honorer2;
                    // $honorarium = $honorarium+$honorarium2;
                    $tarif_grade = $tarif_grade+$tarif_grade2;
                    // $gaji = $gaji+$gaji2;
                    $gaji = $gaji+$tarif_grade2;
                    $thp = $thp+$thp2;
                    $tunjangan_posisi = $tunjangan_posisi+$tunjangan_posisi2;
                    $p21b = $p21b+$p21b2;
                    $tunjangan_kemahalan = $tunjangan_kemahalan+$tunjangan_kemahalan2;
                    $tunjangan_perumahan = $tunjangan_perumahan+$tunjangan_perumahan2;
                    $tunjangan_transportasi = $tunjangan_transportasi+$tunjangan_transportasi2;
                    $bantuan_pulsa = $bantuan_pulsa+$bantuan_pulsa2;
                    $tunjangan_kompetensi = $tunjangan_kompetensi+$tunjangan_kompetensi2;
                    $dplk_persero = $dplk_persero+$dplk_persero2;
                    $dplk_simponi_pr = $dplk_simponi_pr+$dplk_simponi_pr2;
                    $lembur = $lembur+$lembur2;
                    $tunjangan1 = $tunjangan1+$tunjangan12;
                    $tunjangan2 = $tunjangan2+$tunjangan22;
                    $tunjangan3 = $tunjangan3+$tunjangan32;
                    $tunjangan4 = $tunjangan4+$tunjangan42;
                    $pot_koperasi = $pot_koperasi+$pot_koperasi2;
                    $pot_bazis = $pot_bazis+$pot_bazis2;
                    $dplk_simponi = $dplk_simponi+$dplk_simponi2;
                    $pot_dplk_pribadi = $pot_dplk_pribadi+$pot_dplk_pribadi2;
                    $potongan1 = $potongan1+$potongan12;
                    $potongan2 = $potongan2+$potongan22;
                    $potongan3 = $potongan3+$potongan32;
                    $potongan4 = $potongan4+$potongan42;
            
                    $bpjs_tk_pp = $bpjs_tk_pp+$bpjs_tk_pp2;
                    $bpjs_tk_kp = $bpjs_tk_kp+$bpjs_tk_kp2;
                    $bpjs_tk_kkp = $bpjs_tk_kkp+$bpjs_tk_kkp2;
                    $bpjs_tk_htp = $bpjs_tk_htp+$bpjs_tk_htp2;
                    $bpjs_tk_jhtk = $bpjs_tk_jhtk+$bpjs_tk_jhtk2;
                    $bpjs_tk_pk = $bpjs_tk_pk+$bpjs_tk_pk2;
                    $bpjs_kes_pp = $bpjs_kes_pp+$bpjs_kes_pp2;
                    $bpjs_kes_pk = $bpjs_kes_pk+$bpjs_kes_pk2;
    
                }
        
                // $benefit = $bpjs_kes_pp+$bpjs_tk_pp+$bpjs_tk_kp+$bpjs_tk_kkp+$bpjs_tk_htp+$dplk_simponi_pr;
                $benefit2 = $bpjs_kes_pp+$bpjs_tk_kp+$bpjs_tk_kkp+$dplk_persero+$dplk_simponi_pr;
        
                //$iuran_pensiunb = $bpjs_tk_jhtk+$bpjs_tk_pk+$bpjs_kes_pk+$dplk_simponi;
                //$query3 = "SELECT * from cuti_tahunan where nip='$nip' and blth='$blth'";
                // $blth2 = date('Y-m-t', strtotime($blth."-01"));
                // if($blth_gaji!=$blth){
                //   $blth2 = date('Y-m-t', strtotime($blth_gaji."-01"));
                // }
                //$blth2 = date('Y-m-t', strtotime($blth."-01"));
                // $blth_awal = $blth;
                // $blth_akhir = $blth;
    
                $rs44 = mysqli_query($koneksi,"SELECT min(blth) as blth_awal2,max(blth) as blth_akhir2 from v_list_pajak where trim(nip)='$nip' and blth<>'' and blth<>'-' and substr(blth,1,4)='$tahun'");
                $hasil44 = mysqli_fetch_array($rs44);
                if($hasil44){
                    $blth_awal2 = $hasil44['blth_awal2'];
                    $blth_akhir2 = $hasil44['blth_akhir2'];
                    $bulan1 = intval(substr($blth_awal2,-2));
                    $bulan2 = intval(substr($blth_akhir2,-2));
                    $masa_kerja = ($bulan2-$bulan1)+1;
                } else {
                    $blth_awal2 = $blth;
                    $blth_akhir2 = $blth;
                    $masa_kerja = 1;
                }                
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(uang_cuti) as uang_cuti from cuti_tahunan where nip='$nip' and blth>='$blth_awal' and blth<='$blth_akhir'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $uang_cuti = floatval($hasil3['uang_cuti']);
                } else {
                    $uang_cuti = 0;
                }
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(uang_cuti) as uang_cuti_besar from cuti_besar where nip='$nip' and blth>='$blth_awal' and blth<='$blth_akhir'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $uang_cuti_besar = floatval($hasil3['uang_cuti_besar']);
                } else {
                    $uang_cuti_besar = 0;
                }
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(p31) as iks from iks where nip='$nip' and blth>='$blth_awal' and blth<='$blth_akhir'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $iks = floatval($hasil3['iks']);
                } else {
                    $iks = 0;
                }
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(bonus) as bonus from bonus where nip='$nip' and blth>='$blth_awal' and blth<='$blth_akhir'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $bonus = floatval($hasil3['bonus']);
                } else {
                    $bonus = 0;
                }
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(honorarium) as honorarium_eo from honorarium_eo where nip='$nip' and blth>='$blth_awal' and blth<='$blth_akhir'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $honorarium_eo = floatval($hasil3['honorarium_eo']);
                } else {
                    $honorarium_eo = 0;
                }
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(thr) as thr from thr where nip='$nip' and blth>='$blth_awal' and blth<='$blth_akhir'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $thr = floatval($hasil3['thr']);
                } else {
                    $thr = 0;
                }
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(winduan) as uang_winduan from winduan where nip='$nip' and blth>='$blth_awal' and blth<='$blth_akhir'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $uang_winduan = floatval($hasil3['uang_winduan']);
                } else {
                    $uang_winduan = 0;
                }
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(uang_pesangon) as uang_pesangon from pesangon where nip='$nip' and blth>='$blth_awal' and blth<='$blth_akhir'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $uang_pesangon = floatval($hasil3['uang_pesangon']);
                } else {
                    $uang_pesangon = 0;
                }
                    
                $tantiem = 0;
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(a.total) as sppd_pusat from biaya_sppd1 a inner join sppd1 b on a.idsppd=b.idsppd where b.nip='$nip' and b.kd_project_sap='PUST_KPUS_13_0000' and b.jenis_sppd<>'3' and substr(b.tgl_bayar,1,7)>='$blth_awal' and substr(b.tgl_bayar,1,7)<='$blth_akhir'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $sppd_pusat = floatval($hasil3['sppd_pusat']);
                } else {
                    $sppd_pusat = 0;
                }
                $rs3 = mysqli_query($koneksi,"SELECT sum(a.total) as sppd_region from biaya_sppd1 a inner join sppd1 b on a.idsppd=b.idsppd where b.nip='$nip' and b.kd_project_sap<>'PUST_KPUS_13_0000' and b.jenis_sppd<>'3' and substr(b.tgl_bayar,1,7)>='$blth_awal' and substr(b.tgl_bayar,1,7)<='$blth_akhir'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $sppd_region = floatval($hasil3['sppd_region']);
                } else {
                    $sppd_region = 0;
                }
                $rs3 = mysqli_query($koneksi,"SELECT sum(a.total) as sppd_mutasi from biaya_sppd1 a inner join sppd1 b on a.idsppd=b.idsppd where b.nip='$nip' and b.jenis_sppd='3' and substr(b.tgl_bayar,1,7)>='$blth_awal' and substr(b.tgl_bayar,1,7)<='$blth_akhir'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $sppd_mutasi = floatval($hasil3['sppd_mutasi']);
                } else {
                    $sppd_mutasi = 0;
                }
                $sppd = $sppd_pusat+$sppd_region+$sppd_mutasi;
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(cop) as cop,sum(fasilitas_hp) as fasilitas_hp,sum(reimburse_kesehatan) as reimburse_kesehatan,sum(asuransi_kesehatan) as asuransi_kesehatan,sum(sarana_kerja) as sarana_kerja,sum(sppd_manual) as sppd_manual,sum(asuransi_purna_jabatan) as asuransi_purna_jabatan,sum(medical_checkup) as medical_checkup from natura where nip='$nip' and blth>='$blth_awal' and blth<='$blth_akhir'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $cop = floatval($hasil3['cop']);
                    $fasilitas_hp = floatval($hasil3['fasilitas_hp']);
                    $reimburse_kesehatan = floatval($hasil3['reimburse_kesehatan']);
                    $asuransi_kesehatan = floatval($hasil3['asuransi_kesehatan']);
                    $sarana_kerja = floatval($hasil3['sarana_kerja']);
                    $sppd_manual = floatval($hasil3['sppd_manual']);
                    $asuransi_purna_jabatan = floatval($hasil3['asuransi_purna_jabatan']);
                    $medical_checkup = floatval($hasil3['medical_checkup']);
                } else {
                    $cop = 0;
                    $fasilitas_hp = 0;
                    $reimburse_kesehatan = 0;
                    $asuransi_kesehatan = 0;
                    $sarana_kerja = 0;
                    $sppd_manual = 0;
                    $asuransi_purna_jabatan = 0;
                    $medical_checkup = 0;
                }
                $natuna = $sppd+$cop+$fasilitas_hp+$reimburse_kesehatan+$asuransi_kesehatan+$sarana_kerja+$sppd_manual+$asuransi_purna_jabatan+$medical_checkup;
                
                // $rs3 = mysqli_query($koneksi,"SELECT sum(gaji) as gaji,sum(tunjangan_posisi) as tunjangan_posisi,sum(p21b) as p21b,sum(tunjangan_kemahalan) as tunjangan_kemahalan,sum(tunjangan_perumahan) as tunjangan_perumahan,sum(tunjangan_transportasi) as tunjangan_transportasi,sum(bantuan_pulsa) as bantuan_pulsa,sum(cuti) as cuti,sum(thr) as thr,sum(iks) as iks,sum(bonus) as bonus,sum(winduan) as winduan,sum(honorarium_eo) as honorarium_eo from suplisi where nip='$nip' and blth>='$blth_awal' and blth<='$blth_akhir'");
                // $hasil3 = mysqli_fetch_array($rs3);
                // if($hasil3){
                //     $sgaji = floatval($hasil3['gaji']);
                //     $stunjangan_posisi = floatval($hasil3['tunjangan_posisi']);
                //     $sp21b = floatval($hasil3['p21b']);
                //     $stunjangan_kemahalan = floatval($hasil3['tunjangan_kemahalan']);
                //     $stunjangan_perumahan = floatval($hasil3['tunjangan_perumahan']);
                //     $stunjangan_transportasi = floatval($hasil3['tunjangan_transportasi']);
                //     $sbantuan_pulsa = floatval($hasil3['bantuan_pulsa']);
                //     $scuti = floatval($hasil3['cuti']);
                //     $sthr = floatval($hasil3['thr']);
                //     $siks = floatval($hasil3['iks']);
                //     $sbonus = floatval($hasil3['bonus']);
                //     $swinduan = floatval($hasil3['winduan']);
                //     $shonorarium_eo = floatval($hasil3['honorarium_eo']);
                // } else {
                //     $sgaji = 0;
                //     $stunjangan_posisi = 0;
                //     $sp21b = 0;
                //     $stunjangan_kemahalan = 0;
                //     $stunjangan_perumahan = 0;
                //     $stunjangan_transportasi = 0;
                //     $sbantuan_pulsa = 0;
                //     $scuti = 0;
                //     $sthr = 0;
                //     $siks = 0;
                //     $sbonus = 0;
                //     $swinduan = 0;
                //     $shonorarium_eo = 0;
                // }
                /*
                $sgaji = 0;
                $stunjangan_posisi = 0;
                $sp21b = 0;
                $stunjangan_kemahalan = 0;
                $stunjangan_perumahan = 0;
                $stunjangan_transportasi = 0;
                $sbantuan_pulsa = 0;
                $scuti = 0;
                $sthr = 0;
                $siks = 0;
                $sbonus = 0;
                $swinduan = 0;
                $shonorarium_eo = 0;
                $rs3 = mysqli_query($koneksi,"SELECT * from suplisi where nip='$nip' and blth>='$blth_awal' and blth<='$blth_akhir'");
                while($hasil3 = mysqli_fetch_array($rs3)){
                    $sgaji2 = floatval($hasil3['gaji']);
                    $stunjangan_posisi2 = floatval($hasil3['tunjangan_posisi']);
                    $sp21b2 = floatval($hasil3['p21b']);
                    $stunjangan_kemahalan2 = floatval($hasil3['tunjangan_kemahalan']);
                    $stunjangan_perumahan2 = floatval($hasil3['tunjangan_perumahan']);
                    $stunjangan_transportasi2 = floatval($hasil3['tunjangan_transportasi']);
                    $sbantuan_pulsa2 = floatval($hasil3['bantuan_pulsa']);
                    $scuti2 = floatval($hasil3['cuti']);
                    $sthr2 = floatval($hasil3['thr']);
                    $siks2 = floatval($hasil3['iks']);
                    $sbonus2 = floatval($hasil3['bonus']);
                    $swinduan2 = floatval($hasil3['winduan']);
                    $shonorarium_eo2 = floatval($hasil3['honorarium_eo']);

                    $sgaji = $sgaji+$sgaji2;
                    $stunjangan_posisi = $stunjangan_posisi+$stunjangan_posisi2;
                    $sp21b = $sp21b+$sp21b2;
                    $stunjangan_kemahalan = $stunjangan_kemahalan+$stunjangan_kemahalan2;
                    $stunjangan_perumahan = $stunjangan_perumahan+$stunjangan_perumahan2;
                    $stunjangan_transportasi = $stunjangan_transportasi+$stunjangan_transportasi2;
                    $sbantuan_pulsa = $sbantuan_pulsa+$sbantuan_pulsa2;
                    $scuti = $scuti+$scuti2;
                    $sthr = $sthr+$sthr2;
                    $siks = $siks+$siks2;
                    $sbonus = $sbonus+$sbonus2;
                    $swinduan = $swinduan+$swinduan2;
                    $shonorarium_eo = $shonorarium_eo+$shonorarium_eo2;    
                }
                if($honorarium>0){
                    $honorarium = $honorarium+$sgaji;
                } else {
                    $gaji = $gaji+$sgaji;
                }
                */
                // if($honorarium2>0){
                //     $honorarium2 = $honorarium2+$sgaji;
                // } else if($honorer>0){
                //     $honorer = $honorer+$sgaji;
                // } else {
                //     $gaji = $gaji+$sgaji;
                // }
                // $gaji = $gaji+$sgaji;
                
                // $honorarium = $honorarium+$honorarium2;
                $tunjangan_posisi = $tunjangan_posisi+$stunjangan_posisi;
                $p21b = $p21b+$sp21b;
                $tunjangan_kemahalan = $tunjangan_kemahalan+$stunjangan_kemahalan;
                $tunjangan_transportasi = $tunjangan_transportasi+$stunjangan_transportasi;
                $tunjangan_perumahan = $tunjangan_perumahan+$stunjangan_perumahan;
                $bantuan_pulsa = $bantuan_pulsa+$sbantuan_pulsa;
                $uang_cuti = $uang_cuti+$scuti;
                $iks = $iks+$siks;
                $bonus = $bonus+$sbonus;
                $honorarium_eo = $honorarium_eo+$shonorarium_eo;
                $thr = $thr+$sthr;
                $uang_winduan = $uang_winduan+$swinduan;
        
                //$sppd = 0;
                $tunjangan_variable = $tunjangan_posisi+$p21b+$tunjangan_kemahalan+$tunjangan_transportasi+$tunjangan_perumahan+$bantuan_pulsa+$tunjangan_kompetensi+$tunjangan1+$tunjangan2+$tunjangan3+$tunjangan4+$lembur;
                //$natuna = 0;
        
                //$bonus_thr = $uang_cuti+$iks+$bonus+$honorarium_eo+$thr+$uang_winduan+$uang_suplisi;      
                $bonus_thr = $uang_cuti+$uang_cuti_besar+$iks+$bonus+$honorarium_eo+$thr+$uang_winduan+$tantiem+$uang_pesangon;
                $tunjangan_pph = 0;
    
                $rs3 = mysqli_query($koneksi,"select sum(beban_pph21) as beban_pph21 from beban_pph21 where nip='$nip' and blth>='$blth_awal' and blth<='$blth_akhir'");
                // $rs3 = mysqli_query($koneksi,"select * from beban_pph21 where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $beban_pph21 = floatval($hasil3['beban_pph21']);
                } else {
                    $beban_pph21 = 0;
                }
        
                $brutob = 0;
                $biaya_jabatanb = 0;
                $iuran_pensiunb = 0;
                $brutot = $gaji+$tunjangan_variable+$honorarium+$benefit2+$natuna+$beban_pph21+$bonus_thr;
                $biaya_jabatant1 = round($brutot*0.05,0);
                if($biaya_jabatant1>6000000){
                    $biaya_jabatant = 6000000;
                } else {
                    $biaya_jabatant = $biaya_jabatant1;
                }
                //$iuran_pensiunt1 = $bpjs_tk_jhtk+$bpjs_tk_pk+$dplk_simponi;
                $iuran_pensiunt1 = $bpjs_tk_jhtk+$bpjs_tk_pk;
                if($iuran_pensiunt1>2400000){
                    $iuran_pensiunt = 2400000;
                } else {
                    $iuran_pensiunt = $iuran_pensiunt1;
                }
                $biaya_pengurangt = $biaya_jabatant+$iuran_pensiunt;
    
                // $biaya_jabatanb = 0;
                // $iuran_pensiunb = 0;
    
                //Batas Atas Mapping Pajak Rampung (ambil 1 bulan)
                /*
                $rs3 = mysqli_query($koneksi,"SELECT sum(uang_cuti) as uang_cuti from cuti_tahunan where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $uang_cuti_mapping = floatval($hasil3['uang_cuti']);
                } else {
                    $uang_cuti_mapping = 0;
                }
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(uang_cuti) as uang_cuti_besar from cuti_besar where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $uang_cuti_besar_mapping = floatval($hasil3['uang_cuti_besar']);
                } else {
                    $uang_cuti_besar_mapping = 0;
                }
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(p31) as iks from iks where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $iks_mapping = floatval($hasil3['iks']);
                } else {
                    $iks_mapping = 0;
                }
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(bonus) as bonus from bonus where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $bonus_mapping = floatval($hasil3['bonus']);
                } else {
                    $bonus_mapping = 0;
                }
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(honorarium) as honorarium_eo from honorarium_eo where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $honorarium_eo_mapping = floatval($hasil3['honorarium_eo']);
                } else {
                    $honorarium_eo_mapping = 0;
                }
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(thr) as thr from thr where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $thr_mapping = floatval($hasil3['thr']);
                } else {
                    $thr_mapping = 0;
                }
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(winduan) as uang_winduan from winduan where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $uang_winduan_mapping = floatval($hasil3['uang_winduan']);
                } else {
                    $uang_winduan_mapping = 0;
                }
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(uang_pesangon) as uang_pesangon from pesangon where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $uang_pesangon_mapping = floatval($hasil3['uang_pesangon']);
                } else {
                    $uang_pesangon_mapping = 0;
                }
                    
                $tantiem_mapping = 0;
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(a.total) as sppd_pusat from biaya_sppd1 a inner join sppd1 b on a.idsppd=b.idsppd where b.nip='$nip' and b.kd_project_sap='PUST_KPUS_13_0000' and b.jenis_sppd<>'3' and substr(b.tgl_bayar,1,7)='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $sppd_pusat_mapping = floatval($hasil3['sppd_pusat']);
                } else {
                    $sppd_pusat_mapping = 0;
                }
                $rs3 = mysqli_query($koneksi,"SELECT sum(a.total) as sppd_region from biaya_sppd1 a inner join sppd1 b on a.idsppd=b.idsppd where b.nip='$nip' and b.kd_project_sap<>'PUST_KPUS_13_0000' and b.jenis_sppd<>'3' and substr(b.tgl_bayar,1,7)='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $sppd_region_mapping = floatval($hasil3['sppd_region']);
                } else {
                    $sppd_region_mapping = 0;
                }
                $rs3 = mysqli_query($koneksi,"SELECT sum(a.total) as sppd_mutasi from biaya_sppd1 a inner join sppd1 b on a.idsppd=b.idsppd where b.nip='$nip' and b.jenis_sppd='3' and substr(b.tgl_bayar,1,7)='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $sppd_mutasi_mapping = floatval($hasil3['sppd_mutasi']);
                } else {
                    $sppd_mutasi_mapping = 0;
                }
                $sppd_mapping = $sppd_pusat_mapping+$sppd_region_mapping+$sppd_mutasi_mapping;
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(cop) as cop,sum(fasilitas_hp) as fasilitas_hp,sum(reimburse_kesehatan) as reimburse_kesehatan,sum(asuransi_kesehatan) as asuransi_kesehatan,sum(sarana_kerja) as sarana_kerja,sum(sppd_manual) as sppd_manual,sum(asuransi_purna_jabatan) as asuransi_purna_jabatan,sum(medical_checkup) as medical_checkup from natura where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $cop_mapping = floatval($hasil3['cop']);
                    $fasilitas_hp_mapping = floatval($hasil3['fasilitas_hp']);
                    $reimburse_kesehatan_mapping = floatval($hasil3['reimburse_kesehatan']);
                    $asuransi_kesehatan_mapping = floatval($hasil3['asuransi_kesehatan']);
                    $sarana_kerja_mapping = floatval($hasil3['sarana_kerja']);
                    $sppd_manual_mapping = floatval($hasil3['sppd_manual']);
                    $asuransi_purna_jabatan_mapping = floatval($hasil3['asuransi_purna_jabatan']);
                    $medical_checkup_mapping = floatval($hasil3['medical_checkup']);
                } else {
                    $cop_mapping = 0;
                    $fasilitas_hp_mapping = 0;
                    $reimburse_kesehatan_mapping = 0;
                    $asuransi_kesehatan_mapping = 0;
                    $sarana_kerja_mapping = 0;
                    $sppd_manual_mapping = 0;
                    $asuransi_purna_jabatan_mapping = 0;
                    $medical_checkup_mapping = 0;
                }
                $natuna_mapping = $sppd_mapping+$cop_mapping+$fasilitas_hp_mapping+$reimburse_kesehatan_mapping+$asuransi_kesehatan_mapping+$sarana_kerja_mapping+$sppd_manual_mapping+$asuransi_purna_jabatan_mapping+$medical_checkup_mapping;
                
                $rs3 = mysqli_query($koneksi,"SELECT sum(gaji) as gaji,sum(tunjangan_posisi) as tunjangan_posisi,sum(p21b) as p21b,sum(tunjangan_kemahalan) as tunjangan_kemahalan,sum(tunjangan_perumahan) as tunjangan_perumahan,sum(tunjangan_transportasi) as tunjangan_transportasi,sum(bantuan_pulsa) as bantuan_pulsa,sum(cuti) as cuti,sum(thr) as thr,sum(iks) as iks,sum(bonus) as bonus,sum(winduan) as winduan,sum(honorarium_eo) as honorarium_eo from suplisi where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $sgaji_mapping = floatval($hasil3['gaji']);
                    $stunjangan_posisi_mapping = floatval($hasil3['tunjangan_posisi']);
                    $sp21b_mapping = floatval($hasil3['p21b']);
                    $stunjangan_kemahalan_mapping = floatval($hasil3['tunjangan_kemahalan']);
                    $stunjangan_perumahan_mapping = floatval($hasil3['tunjangan_perumahan']);
                    $stunjangan_transportasi_mapping = floatval($hasil3['tunjangan_transportasi']);
                    $sbantuan_pulsa_mapping = floatval($hasil3['bantuan_pulsa']);
                    $scuti_mapping = floatval($hasil3['cuti']);
                    $sthr_mapping = floatval($hasil3['thr']);
                    $siks_mapping = floatval($hasil3['iks']);
                    $sbonus_mapping = floatval($hasil3['bonus']);
                    $swinduan_mapping = floatval($hasil3['winduan']);
                    $shonorarium_eo_mapping = floatval($hasil3['honorarium_eo']);
                } else {
                    $sgaji_mapping = 0;
                    $stunjangan_posisi_mapping = 0;
                    $sp21b_mapping = 0;
                    $stunjangan_kemahalan_mapping = 0;
                    $stunjangan_perumahan_mapping = 0;
                    $stunjangan_transportasi_mapping = 0;
                    $sbantuan_pulsa_mapping = 0;
                    $scuti_mapping = 0;
                    $sthr_mapping = 0;
                    $siks_mapping = 0;
                    $sbonus_mapping = 0;
                    $swinduan_mapping = 0;
                    $shonorarium_eo_mapping = 0;
                }
                if($honorarium3>0){
                    $honorarium2_mapping = $honorarium3+$sgaji_mapping;
                } else if($honorer3>0){
                    $honorer_mapping = $honorer_mapping+$sgaji_mapping;
                } else {
                    $gaji_mapping = $gaji_mapping+$sgaji_mapping;
                }
                $honorarium_mapping = $honorarium3+$honore3;
                $tunjangan_posisi_mapping = $tunjangan_posisi_mapping+$stunjangan_posisi_mapping;
                $p21b_mapping = $p21b_mapping+$sp21b_mapping;
                $tunjangan_kemahalan_mapping = $tunjangan_kemahalan_mapping+$stunjangan_kemahalan_mapping;
                $tunjangan_transportasi_mapping = $tunjangan_transportasi_mapping+$stunjangan_transportasi_mapping;
                $tunjangan_perumahan_mapping = $tunjangan_perumahan_mapping+$stunjangan_perumahan_mapping;
                $bantuan_pulsa_mapping = $bantuan_pulsa_mapping+$sbantuan_pulsa_mapping;
                $uang_cuti_mapping = $uang_cuti_mapping+$scuti_mapping;
                $iks_mapping = $iks_mapping+$siks_mapping;
                $bonus_mapping = $bonus_mapping+$sbonus_mapping;
                $honorarium_eo_mapping = $honorarium_eo_mapping+$shonorarium_eo_mapping;
                $thr_mapping = $thr_mapping+$sthr_mapping;
                $uang_winduan_mapping = $uang_winduan_mapping+$swinduan_mapping;
        
                //$sppd = 0;
                $tunjangan_variable_mapping = $tunjangan_posisi_mapping+$p21b_mapping+$tunjangan_kemahalan_mapping+$tunjangan_transportasi_mapping+$tunjangan_perumahan_mapping+$bantuan_pulsa_mapping+$tunjangan_kompetensi_mapping+$tunjangan1_mapping+$tunjangan2_mapping+$tunjangan3_mapping+$tunjangan4_mapping+$lembur_mapping;
                //$natuna = 0;
        
                //$bonus_thr = $uang_cuti+$iks+$bonus+$honorarium_eo+$thr+$uang_winduan+$uang_suplisi;      
                $bonus_thr_mapping = $uang_cuti_mapping+$uang_cuti_besar_mapping+$iks_mapping+$bonus_mapping+$honorarium_eo_mapping+$thr_mapping+$uang_winduan_mapping+$tantiem_mapping+$uang_pesangon_mapping;
                $tunjangan_pph_mapping = 0;
    
                $rs3 = mysqli_query($koneksi,"select * from beban_pph21 where nip='$nip' and blth='$blth'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $beban_pph21_mapping = floatval($hasil3['beban_pph21']);
                } else {
                    $beban_pph21_mapping = 0;
                }
        
                $brutob_mapping = $gaji_mapping+$tunjangan_variable_mapping+$honorarium_mapping+$benefit2_mapping+$natuna_mapping+$beban_pph21_mapping+$bonus_thr_mapping;
                $biaya_jabatanb_mapping = 0;
                $iuran_pensiunb_mapping = 0;
    
                $rs2 = mysqli_query($koneksi,"SELECT * from mapping_pajak where nip='$nip2'");
                $hasil2 = mysqli_fetch_array($rs2);
                if($hasil2){                
                    $kode_departemen = $hasil2['kode_departemen'];
                    $kode_project = $hasil2['kode_project'];
                    $akun_honorarium = $hasil2['honorarium'];
                    $akun_honorer = $hasil2['honorer'];
                    $akun_tarif_grade = $hasil2['tarif_grade'];
                    $akun_tunjangan_posisi = $hasil2['tunjangan_posisi'];
                    $akun_p21b = $hasil2['p21b'];
                    $akun_p22b = $hasil2['p22b'];
                    $akun_tunjangan_kemahalan = $hasil2['tunjangan_kemahalan'];
                    $akun_tunjangan_perumahan = $hasil2['tunjangan_perumahan'];
                    $akun_tunjangan_transportasi = $hasil2['tunjangan_transportasi'];
                    $akun_bantuan_pulsa = $hasil2['bantuan_pulsa'];
                    $akun_tunjangan_kompetensi = $hasil2['tunjangan_kompetensi'];
                    $akun_dplk_persero = $hasil2['dplk_persero'];
                    $akun_dplk_simponi_pr = $hasil2['dplk_simponi_pr'];        
                    $akun_bpjs_tk_pp = $hasil2['bpjs_tk_pp'];
                    $akun_bpjs_tk_kp = $hasil2['bpjs_tk_kp'];
                    $akun_bpjs_tk_kkp = $hasil2['bpjs_tk_kkp'];
                    $akun_bpjs_tk_htp = $hasil2['bpjs_tk_htp'];
                    $akun_bpjs_kes_pp = $hasil2['bpjs_kes_pp'];
                    $akun_cop = $hasil2['cop'];
                    $akun_fasilitas_hp = $hasil2['fasilitas_hp'];
                    $akun_reimburse_kesehatan = $hasil2['reimburse_kesehatan'];
                    $akun_asuransi_kesehatan = $hasil2['asuransi_kesehatan'];
                    $akun_sarana_kerja = $hasil2['sarana_kerja'];
                    $akun_sppd_manual = $hasil2['sppd_manual'];
                    $akun_asuransi_purna_jabatan = $hasil2['asuransi_purna_jabatan'];
                    $akun_medical_checkup = $hasil2['medical_checkup'];
                    $akun_beban_pph21 = $hasil2['beban_pph21'];
                    $akun_thr = $hasil2['thr'];
                    $akun_cuti = $hasil2['cuti'];
                    $akun_cuti_besar = $hasil2['cuti_besar'];
                    $akun_winduan = $hasil2['winduan'];
                    $akun_iks = $hasil2['iks'];
                    $akun_ikp = $hasil2['ikp'];
                    $akun_sppd_pusat = $hasil2['sppd_pusat'];
                    $akun_sppd_region = $hasil2['sppd_region'];
                    $akun_sppd_mutasi = $hasil2['sppd_mutasi'];
                } else {
                    $akun_honorarium = "";
                    $akun_honorer = "";
                    $akun_tarif_grade = "";
                    $akun_tunjangan_posisi = "";
                    $akun_p21b = "";
                    $akun_p22b = "";
                    $akun_tunjangan_kemahalan = "";
                    $akun_tunjangan_perumahan = "";
                    $akun_tunjangan_transportasi = "";
                    $akun_bantuan_pulsa = "";
                    $akun_tunjangan_kompetensi = "";
                    $akun_dplk_persero = "";
                    $akun_dplk_simponi_pr = "";        
                    $akun_bpjs_tk_pp = "";
                    $akun_bpjs_tk_kp = "";
                    $akun_bpjs_tk_kkp = "";
                    $akun_bpjs_tk_htp = "";
                    $akun_bpjs_kes_pp = "";
                    $akun_cop = "";
                    $akun_fasilitas_hp = "";
                    $akun_reimburse_kesehatan = "";
                    $akun_asuransi_kesehatan = "";
                    $akun_sarana_kerja = "";
                    $akun_sppd_manual = "";
                    $akun_asuransi_purna_jabatan = "";
                    $akun_medical_checkup = "";
                    $akun_beban_pph21 = "";
                    $akun_thr = "";
                    $akun_cuti = "";
                    $akun_cuti_besar = "";
                    $akun_winduan = "";
                    $akun_iks = "";
                    $akun_ikp = "";
                    $akun_sppd_pusat = "";
                    $akun_sppd_region = "";
                    $akun_sppd_mutasi = "";
                }
                // $bruto = $honorarium+$honorer+$tarif_grade+$tunjangan_posisi+$p21b+$p22b+$tunjangan_kemahalan+$tunjangan_perumahan+$tunjangan_transportasi+$bantuan_pulsa+$tunjangan_kompetensi+$dplk_persero+$dplk_simponi_pr+$bpjs_tk_pp+$bpjs_tk_kp+$bpjs_tk_kkp+$bpjs_tk_htp+$bpjs_kes_pp+$cop+$fasilitas_hp+$reimburse_kesehatan+$asuransi_kesehatan+$sarana_kerja+$sppd_manual+$asuransi_purna_jabatan+$medical_checkup+$beban_pph21+$thr+$uang_cuti+$uang_cuti_besar+$uang_winduan+$iks+$bonus+$sppd_pusat+$sppd_region+$sppd_mutasi;
                // $bruto = $honorarium2+$honorer+$tarif_grade+$tunjangan_posisi+$p21b+$p22b+$tunjangan_kemahalan+$tunjangan_perumahan+$tunjangan_transportasi+$bantuan_pulsa+$tunjangan_kompetensi+$dplk_persero+$dplk_simponi_pr+$bpjs_tk_kp+$bpjs_tk_kkp+$bpjs_kes_pp+$cop+$fasilitas_hp+$reimburse_kesehatan+$asuransi_kesehatan+$sarana_kerja+$sppd_manual+$asuransi_purna_jabatan+$medical_checkup+$beban_pph21+$thr+$uang_cuti+$uang_cuti_besar+$uang_winduan+$iks+$bonus+$sppd_pusat+$sppd_region+$sppd_mutasi;
                $bruto = 0;    
                */
                //Batas Bawah Mapping Pajak
        
                // $brutot = $brutob+$bonus_thr;
                // $brutot = $honorarium2+$honorer+$tarif_grade+$tunjangan_posisi+$p21b+$p22b+$tunjangan_kemahalan+$tunjangan_perumahan+$tunjangan_transportasi+$bantuan_pulsa+$tunjangan_kompetensi+$dplk_persero+$dplk_simponi_pr+$bpjs_tk_kp+$bpjs_tk_kkp+$bpjs_kes_pp+$cop+$fasilitas_hp+$reimburse_kesehatan+$asuransi_kesehatan+$sarana_kerja+$sppd_manual+$asuransi_purna_jabatan+$medical_checkup+$beban_pph21+$thr+$uang_cuti+$uang_cuti_besar+$uang_winduan+$iks+$bonus+$sppd_pusat+$sppd_region+$sppd_mutasi;
                // $brutot = $brutob;
                $brutot_total = 0;
                $biaya_jabatant_total = 0;
                $iuran_pensiunt_total = 0;
                $biaya_pengurangt_total = $biaya_jabatant_total+$iuran_pensiunt_total;
                // $biaya_jabatant = 0;
                // $iuran_pensiunt = 0;    
                // $biaya_pengurangt = $biaya_jabatant+$iuran_pensiunt;
                $nettot = $brutot-$biaya_pengurangt;
                $nettot_sebelumnya = 0;
                $nettot_total_sebelumnya = 0;
                $ppht_sebelumnya = 0; 
                $ppht_sebelumnya2 = 0;
                $ppht_sebelumnya1 = 0;
                
                //Batas Bawah
        
                $rs32 = mysqli_query($koneksi,"select * from pendapatan_mutasi where nip='$nip' and tahun='$tahun'");
                $hasil32 = mysqli_fetch_array($rs32);
                if($hasil32){
                    $blth_awal3 = $hasil32['blth_awal'];
                    $blth_akhir3 = $hasil32['blth_akhir'];
                    $nettot_sebelumnya = floatval($hasil32['netto']);
                    $ppht_sebelumnya2 = floatval($hasil32['pph21']);
                } else {
                    $blth_awal3 = $blth_awal2;
                    $blth_akhir3 = $blth_akhir2;
                    $nettot_sebelumnya = 0;
                    $ppht_sebelumnya2 = 0;
                }
    
                $rs42 = mysqli_query($koneksi,"SELECT sum(pphb_terutang) as pph21 from pph21masa where nip='$nip' and blth>='$blth_awal' and blth<='$blth_akhir'");
                $hasil42 = mysqli_fetch_array($rs42);
                if($hasil42){
                    $ppht_sebelumnya1 = floatval($hasil42['pph21']);
                } else {
                    $ppht_sebelumnya1 = 0;
                }
    
                $nettot_akhir = $nettot+$nettot_sebelumnya;
                $ppht_sebelumnya = $ppht_sebelumnya2+$ppht_sebelumnya1;
        
                $nettot_total = $brutot_total-$biaya_pengurangt_total;
                $nettot_total_sebelumnya = 0;
                $nettot_total_akhir = $nettot_total+$nettot_total_sebelumnya;
        
                if($status2!="" && $status2!="-"){
                    $status = $status2;
                } else {
                    $status = "K0";
                }
                if($status=="TK0" || $status=="TK1" || $status=="K0"){
                    $kategori_pajak = "A";
                } else if($status=="TK2" || $status=="TK3" || $status=="K1" || $status=="K2"){
                    $kategori_pajak = "B";
                } else if($status=="K3"){
                    $kategori_pajak = "C";
                } else {
                    $kategori_pajak = "";
                }
    
                $rs3 = mysqli_query($koneksi,"select * from master_ptkp where status='$status'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $ptkp = floatval($hasil3['ptkp']);
                } else {
                    $ptkp = 0;
                }
        
                // $pkp = 0;
                // $rs3 = mysqli_query($koneksi,"select * from kategori_pajak where kategori='$kategori_pajak' and batas_awal<='$brutot' and batas_akhir>='$brutot'");
                // $hasil3 = mysqli_fetch_array($rs3);
                // if($hasil3){
                //     $tarif = floatval($hasil3['tarif']);
                // } else {
                //     $tarif = 0;
                // }
    
                // $rs3 = mysqli_query($koneksi,"select * from perhitungan_pajak_pesangon where nip='$nip'");
                // $hasil3 = mysqli_fetch_array($rs3);
                // if($hasil3){
                //     $status_pesangon = 1;
                // } else {
                //     $status_pesangon = 0;
                // }
    
                $rs3 = mysqli_query($koneksi,"select * from perhitungan_pajak_pesangon where nip='$nip'");
                $hasil3 = mysqli_fetch_array($rs3);
                if($hasil3){
                    $status_dekom = 1;
                } else {
                    $status_dekom = 0;
                }
                if($status_dekom==0){
                    $pkp1 = $nettot_akhir-$ptkp;
                } else {
                    $pkp1 = $nettot_akhir;
                }
                $pkp2 = floor($pkp1);                
                if($pkp2>0){
                    $pkp3 = floor($pkp2/1000);          
                    $pkp = $pkp3*1000;
                } else {
                    $pkp = 0;
                }        
                $ppht_terutang = 0;
                $pph_sistem = 0;
                $pph_koreksi = 0;
                // $pkp = $brutot;
                if($pkp<=60000000){
                    $pkp1 = $pkp;
                    $pkp2 = 0;
                    $pkp3 = 0;
                    $pkp4 = 0;
                    $pkp5 = 0;
                } else if($pkp>60000000 && $pkp<=250000000){
                    $pkp1 = 60000000;
                    $pkp2 = $pkp-$pkp1;
                    $pkp3 = 0;
                    $pkp4 = 0;
                    $pkp5 = 0;
                } else if($pkp>250000000 && $pkp<=500000000){
                    $pkp1 = 60000000;
                    $pkp2 = 250000000-$pkp1;
                    $pkp3 = $pkp-$pkp2-$pkp1;
                    $pkp4 = 0;
                    $pkp5 = 0;
                } else if($pkp>500000000 && $pkp<=5000000000){
                    $pkp1 = 60000000;
                    $pkp2 = 250000000-$pkp1;
                    $pkp3 = 500000000-$pkp2-$pkp1;
                    $pkp4 = $pkp-$pkp3-$pkp2-$pkp1;
                    $pkp5 = 0;
                } else if($pkp>5000000000){
                    $pkp1 = 60000000;
                    $pkp2 = 250000000-$pkp1;
                    $pkp3 = 500000000-$pkp2-$pkp1;
                    $pkp4 = 5000000000-$pkp3-$pkp2-$pkp1;
                    $pkp5 = $pkp-$pkp4-$pkp3-$pkp2-$pkp1;
                } else {
                    $pkp1 = 0;
                    $pkp2 = 0;
                    $pkp3 = 0;
                    $pkp4 = 0;
                    $pkp5 = 0;
                }
                $ppht1 = ceil($pkp1*0.05);
                $ppht2 = ceil($pkp2*0.15);
                $ppht3 = ceil($pkp3*0.25);
                $ppht4 = ceil($pkp4*0.30);
                $ppht5 = ceil($pkp5*0.35);
    
                $ppht = $ppht1+$ppht2+$ppht3+$ppht4+$ppht5;
    
                $ppht_terutang2 = $ppht-$ppht_sebelumnya;
                if($ppht_terutang2>0){
                    $ppht_terutang = $ppht_terutang2;
                } else {
                    $ppht_terutang = 0;
                }
    
                $pphb1_terutang = $ppht_terutang;
                // $pphb1_terutang = $ppht;
                // if($pphb1_terutang<0){
                //     $pphb1_terutang = 0;
                // }
                // $pphb1_terutang = ceil(($brutot*$tarif)/100);
                $pphb2_terutang = 0;
        
                $pphb_terutang = $pphb1_terutang;
                $pph21 = $pphb_terutang;
                $tgl_proses = date("Y-m-d");
                $petugas = $userhris;
    
                // if($bruto==$brutob){
                //     $pph21 = $pphb_terutang;
                // } else {
                //     $pph21 = 0;
                // }
                // $pesan .= $nip2.", ppht : ".$ppht."<br/>";
                
    
                // $pesan .= "kode : ".$kode.", blthnip : ".$blthnip.", pph : ".$pphb1_terutang."<br/>";
                // $pesan .= $nip.", netto : ".$nettot.", ptkp : ".$ptkp.", pkp : ".$pkp.", ppht : ".$ppht.", pph : ".$pphb1_terutang."<br/>";
               
                // $sql2 = "insert into mapping_sptmasa(blth,nip,kode,kode_departemen,kode_project,honorarium,honorer,tarif_grade,tunjangan_posisi,p21b,p22b,tunjangan_kemahalan,tunjangan_perumahan";
                // $sql2 .= ",tunjangan_transportasi,bantuan_pulsa,tunjangan_kompetensi,dplk_persero,dplk_simponi_pr,bpjs_tk_pp,bpjs_tk_kp,bpjs_tk_kkp,bpjs_tk_htp,bpjs_kes_pp";
                // $sql2 .= ",cop,fasilitas_hp,reimburse_kesehatan,asuransi_kesehatan,sarana_kerja,sppd_manual,asuransi_purna_jabatan,medical_checkup,beban_pph21";
                // $sql2 .= ",thr,cuti,cuti_besar,winduan,iks,ikp,sppd_pusat,sppd_region,sppd_mutasi,bruto,pph21";
                // $sql2 .= ",akun_honorarium,akun_honorer,akun_tarif_grade,akun_tunjangan_posisi,akun_p21b,akun_p22b,akun_tunjangan_kemahalan,akun_tunjangan_perumahan";
                // $sql2 .= ",akun_tunjangan_transportasi,akun_bantuan_pulsa,akun_tunjangan_kompetensi,akun_dplk_persero,akun_dplk_simponi_pr,akun_bpjs_tk_pp,akun_bpjs_tk_kp,akun_bpjs_tk_kkp,akun_bpjs_tk_htp,akun_bpjs_kes_pp";
                // $sql2 .= ",akun_cop,akun_fasilitas_hp,akun_reimburse_kesehatan,akun_asuransi_kesehatan,akun_sarana_kerja,akun_sppd_manual,akun_asuransi_purna_jabatan,akun_medical_checkup,akun_beban_pph21";
                // $sql2 .= ",akun_thr,akun_cuti,akun_cuti_besar,akun_winduan,akun_iks,akun_ikp,akun_sppd_pusat,akun_sppd_region,akun_sppd_mutasi)";
                // $sql2 .= " values('$blth','$nip','$kode','$kode_departemen','$kode_project','$honorarium_mapping','$honorer_mapping','$tarif_grade_mapping','$tunjangan_posisi_mapping','$p21b_mapping','$p22b_mapping','$tunjangan_kemahalan_mapping','$tunjangan_perumahan_mapping'";
                // $sql2 .= ",'$tunjangan_transportasi_mapping','$bantuan_pulsa_mapping','$tunjangan_kompetensi_mapping','$dplk_persero_mapping','$dplk_simponi_pr_mapping','$bpjs_tk_pp_mapping','$bpjs_tk_kp_mapping','$bpjs_tk_kkp_mapping','$bpjs_tk_htp_mapping','$bpjs_kes_pp_mapping'";
                // $sql2 .= ",'$cop_mapping','$fasilitas_hp_mapping','$reimburse_kesehatan_mapping','$asuransi_kesehatan_mapping','$sarana_kerja_mapping','$sppd_manual_mapping','$asuransi_purna_jabatan_mapping','$medical_checkup_mapping','$beban_pph21_mapping'";
                // $sql2 .= ",'$thr_mapping','$uang_cuti_mapping','$uang_cuti_besar_mapping','$uang_winduan_mapping','$iks_mapping','$bonus_mapping','$sppd_pusat_mapping','$sppd_region_mapping','$sppd_mutasi_mapping','$brutob_mapping','$pph21'";
                // $sql2 .= ",'$akun_honorarium','$akun_honorer','$akun_tarif_grade','$akun_tunjangan_posisi','$akun_p21b','$akun_p22b','$akun_tunjangan_kemahalan','$akun_tunjangan_perumahan'";
                // $sql2 .= ",'$akun_tunjangan_transportasi','$akun_bantuan_pulsa','$akun_tunjangan_kompetensi','$akun_dplk_persero','$akun_dplk_simponi_pr','$akun_bpjs_tk_pp','$akun_bpjs_tk_kp','$akun_bpjs_tk_kkp','$akun_bpjs_tk_htp','$akun_bpjs_kes_pp'";
                // $sql2 .= ",'$akun_cop','$akun_fasilitas_hp','$akun_reimburse_kesehatan','$akun_asuransi_kesehatan','$akun_sarana_kerja','$akun_sppd_manual','$akun_asuransi_purna_jabatan','$akun_medical_checkup','$akun_beban_pph21'";
                // $sql2 .= ",'$akun_thr','$akun_cuti','$akun_cuti_besar','$akun_winduan','$akun_iks','$akun_ikp','$akun_sppd_pusat','$akun_sppd_region','$akun_sppd_mutasi')";
                // $result2 = @mysqli_query($koneksi,$sql2);
                
                $sql1 = "insert into pph21masa(kpp,npwp,no_urut,nip,status,tahun,blth,blthnip,blth_awal,blth_akhir,masa_kerja,gaji,tunjangan_pph";
                $sql1 .= ",tunjangan_variable,honorarium,benefit,natuna,beban_pph21,bonus_thr,brutob,biaya_jabatanb,iuran_pensiunb,brutot";
                $sql1 .= ",biaya_jabatant,iuran_pensiunt,biaya_pengurangt,nettot,brutot_total,biaya_jabatant_total,iuran_pensiunt_total";
                $sql1 .= ",biaya_pengurangt_total,nettot_total,nettot_sebelumnya,nettot_akhir,ptkp,pkp,ppht,ppht_sebelumnya,ppht_terutang";
                $sql1 .= ",pphb1_terutang,pphb2_terutang,pph_sistem,pph_koreksi,pphb_terutang,tgl_proses,petugas)";
                $sql1 .= " values('$kpp','$npwp','$no_urut','$nip','$status','$tahun','$blth','$blthnip','$blth_awal2','$blth_akhir2','$masa_kerja','$gaji','$tunjangan_pph'";
                $sql1 .= ",'$tunjangan_variable','$honorarium','$benefit2','$natuna','$beban_pph21','$bonus_thr','$brutob','$biaya_jabatanb','$iuran_pensiunb','$brutot'";
                $sql1 .= ",'$biaya_jabatant','$iuran_pensiunt','$biaya_pengurangt','$nettot','$brutot_total','$biaya_jabatant_total','$iuran_pensiunt_total'";
                $sql1 .= ",'$biaya_pengurangt_total','$nettot_total','$nettot_sebelumnya','$nettot_akhir','$ptkp','$pkp','$ppht','$ppht_sebelumnya','$ppht_terutang'";
                $sql1 .= ",'$pphb1_terutang','$pphb2_terutang','$pph_sistem','$pph_koreksi','$pphb_terutang','$tgl_proses','$petugas')";            
                $result1 = @mysqli_query($koneksi,$sql1);
                if ($result1){
                    if($ppht_terutang2<0){
                        $sql3 = "insert into kelebihan_bayar_rampung(blth,nip,ppht,ppht_sebelumnya,ppht_mutasi,selisih,blthnip)";
                        $sql3 .= " values('$blth','$nip','$ppht','$ppht_sebelumnya1','$ppht_sebelumnya2','$ppht_terutang2','$blthnip')";
                        $result3 = @mysqli_query($koneksi,$sql3);
                    }
                    $sukses = $sukses+1;
                } else {
                    $sukses = $sukses;
                }  
                $urut2 = $urut2+1;
                
            }
            
            if($sukses>0){
                $kode = $hari_ini."-".$userhris."-".$aktivitas;
                $sql5 = "insert into log_aktivitas(tanggal,user,nama,aktivitas,kode) values('$hari_ini','$userhris','$nama_petugas','$aktivitas','$kode')";
                $result5 = @mysqli_query($koneksi,$sql5);
                echo json_encode(array('success'=>true));
            } else {
                //echo json_encode(array('errorMsg'=>'Gagal menyimpan data.'));
                echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
            }
            
        }
        // echo $pesan;
    } else {
        echo json_encode(array('errorMsg'=>'SPT Masa untuk bulan '.$blth.' sudah pernah diproses.'));
    }
    // echo json_encode(array('success'=>true));
    
}
?>