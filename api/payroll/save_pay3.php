<?php
session_start();
$kelompokloginsipeg = $_SESSION["kelompokaksessipeg"];
$regionloginsipeg = $_SESSION["regionaksessipeg"];
$cabangloginsipeg = $_SESSION["cabangaksessipeg"];
$userloginsipeg = $_SESSION["useraksessipeg"];
$namaloginsipeg = $_SESSION["userfullnamesipeg"];
$adminpayroll = $_SESSION["adminpayroll"];
if ($userloginsipeg && $adminpayroll=="1" && $regionloginsipeg=="00"){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    
    $blth = $_REQUEST['blthpay3'];
    $nip2 = $_REQUEST['nippay3'];
    //$blth = "2021-07";
    //$nip2 = "99210330BRU";
    /*
    $rs92 = "delete from gaji where blth='$blth2' and nip='$nip2'";
    $result92 = @mysqli_query($rs92);    
    */
    $rs9 = mysqli_query($koneksi,"select count(*) as jumlahgaji from gaji where blth='$blth' and nip='$nip2'");
    $hasil9 = mysqli_fetch_array($rs9);
    if($hasil9){
	    $jumlahgaji = floatval(stripslashes ($hasil9['jumlahgaji']));
    } else {
        $jumlahgaji = 0;
    }
    
    if($jumlahgaji==0){
        $rs = mysqli_query($koneksi,"select * from data_pegawai where approve='1' and (aktif='1' or (aktif<>'1' and nip in (select nip from gaji_prosentase where blth='$blth'))) and nip='$nip2'");
        $hasil = mysqli_fetch_array($rs);
        $nip = stripslashes ($hasil['nip']);
        $kelompok = stripslashes ($hasil['kelompok']);
        $kd_region = stripslashes ($hasil['kd_region']);
        $kd_cabang = stripslashes ($hasil['kd_cabang']);
        $kd_unitpln = stripslashes ($hasil['kd_unitpln']);
        $kd_unit = stripslashes ($hasil['kd_unit']);
        $kd_jenis = stripslashes ($hasil['kd_jenis']);
        $jabatan = stripslashes ($hasil['jabatan']);            
        $nama_bank = stripslashes ($hasil['nama_bank']);
        $no_rekening = stripslashes ($hasil['no_rekening']);
        $nama_rekening = stripslashes ($hasil['nama_rekening']);
        $nama_bank_dplk = stripslashes ($hasil['nama_bank_dplk']);
        $no_rekening_dplk = stripslashes ($hasil['no_rekening_dplk']);
        $nama_rekening_dplk = stripslashes ($hasil['nama_rekening_dplk']);
        $status2 = stripslashes ($hasil['status']);
        $npwp2 = stripslashes ($hasil['npwp']);
        if($npwp2==""){
            $npwp = "000000000000000";
        } else {
            $npwp3 = str_replace(",","",$npwp2);
            $npwp3 = str_replace(".","",$npwp3);
            $npwp3 = str_replace(" ","",$npwp3);
            $npwp = str_pad($npwp3,15,"0",STR_PAD_LEFT);
        }

        $kelompok = stripslashes ($hasil['kelompok']);
        $no_spk = stripslashes ($hasil['no_spk']);
            $rs21 = mysqli_query($koneksi,"select * from master_spk where no_spk='$no_spk'");
            $hasil21 = mysqli_fetch_array($rs21);
            if($hasil21){
                $kd_kategori = stripslashes ($hasil21['kategori']);
                $perhitungan_bpjs = stripslashes ($hasil21['perhitungan_bpjs']);
                $perhitungan_dplk = stripslashes ($hasil21['perhitungan_dplk']);
                $setting_pph = stripslashes ($hasil21['setting_pph']);
                $jenis_penggajian = stripslashes ($hasil21['jenis_penggajian']);
            } else {
                $kd_kategori = "";
                $perhitungan_bpjs = "";
                $perhitungan_dplk = "";
                $setting_pph = "";
                $jenis_penggajian = "";
            }
        
        $blth_nip = $blth.".".$nip;
        $status_bpjs_kes = stripslashes ($hasil['status_bpjs_kes']);
        $status_bpjs_tk = stripslashes ($hasil['status_bpjs_tk']);
        
        $rs2 = mysqli_query($koneksi,"select * from master_gaji where nip='$nip' and aktif='1'");
        $hasil2 = mysqli_fetch_array($rs2);
        $honor = round(floatval(stripslashes ($hasil2['honor'])),0);
        $umk = floatval(stripslashes ($hasil2['umk']));
        $koefisien = floatval(stripslashes ($hasil2['koefisien']));
        $upah_pokok = round(floatval(stripslashes ($hasil2['upah_pokok'])),0);
        //$gaji = $honor+$upah_pokok;
        $transport = floatval(stripslashes ($hasil2['transport']));
        $tunjangan_profesi = round(floatval(stripslashes ($hasil2['tunjangan_profesi'])),0);
        $tunjangan_jabatan = round(floatval(stripslashes ($hasil2['tunjangan_jabatan'])),0);
        $tunjangan_pph21 = round(floatval(stripslashes ($hasil2['tunjangan_pph21'])),0);
        $nama_tunjangan1 = stripslashes ($hasil2['nama_tunjangan1']);
        $tunjangan1 = round(floatval(stripslashes ($hasil2['tunjangan1'])),0);
        $nama_tunjangan2 = stripslashes ($hasil2['nama_tunjangan2']);
        $tunjangan2 = round(floatval(stripslashes ($hasil2['tunjangan2'])),0);
        $nama_tunjangan3 = stripslashes ($hasil2['nama_tunjangan3']);
        $tunjangan3 = round(floatval(stripslashes ($hasil2['tunjangan3'])),0);
        $nama_tunjangan4 = stripslashes ($hasil2['nama_tunjangan4']);
        $tunjangan4 = round(floatval(stripslashes ($hasil2['tunjangan4'])),0);
        $nama_tunjangan5 = stripslashes ($hasil2['nama_tunjangan5']);
        $tunjangan5 = round(floatval(stripslashes ($hasil2['tunjangan5'])),0);
        $nama_tunjangan6 = stripslashes ($hasil2['nama_tunjangan6']);
        $tunjangan6 = round(floatval(stripslashes ($hasil2['tunjangan6'])),0);
        $nama_tunjangan7 = stripslashes ($hasil2['nama_tunjangan7']);
        $tunjangan7 = round(floatval(stripslashes ($hasil2['tunjangan7'])),0);
        $potongan_pph21 = round((stripslashes ($hasil2['potongan_pph21'])),0);
        $nama_potongan1 = stripslashes ($hasil2['nama_potongan1']);
        $potongan1 = round(floatval(stripslashes ($hasil2['potongan1'])),0);
        $nama_potongan2 = stripslashes ($hasil2['nama_potongan2']);
        $potongan2 = round(floatval(stripslashes ($hasil2['potongan2'])),0);
        $nama_potongan3 = stripslashes ($hasil2['nama_potongan3']);
        $potongan3 = round(floatval(stripslashes ($hasil2['potongan3'])),0);
        $nama_potongan4 = stripslashes ($hasil2['nama_potongan4']);
        $potongan4 = round(floatval(stripslashes ($hasil2['potongan4'])),0);
        $nama_potongan5 = stripslashes ($hasil2['nama_potongan5']);
        $potongan5 = round(floatval(stripslashes ($hasil2['potongan5'])),0);
        $nama_potongan6 = stripslashes ($hasil2['nama_potongan6']);
        $potongan6 = round(floatval(stripslashes ($hasil2['potongan6'])),0);
        $nama_potongan7 = stripslashes ($hasil2['nama_potongan7']);
        $potongan7 = round(floatval(stripslashes ($hasil2['potongan7'])),0);
        //$perhitungan = stripslashes ($hasil2['perhitungan']);
        $bpjs_tk_pp2 = floatval(stripslashes ($hasil2['bpjs_tk_pp']));
        $bpjs_tk_kp2 = floatval(stripslashes ($hasil2['bpjs_tk_kp']));
        $bpjs_tk_kkp2 = floatval(stripslashes ($hasil2['bpjs_tk_kkp']));
        $bpjs_tk_htp2 = floatval(stripslashes ($hasil2['bpjs_tk_htp']));
        $bpjs_tk_jhtk2 = floatval(stripslashes ($hasil2['bpjs_tk_jhtk']));
        $bpjs_tk_pk2 = floatval(stripslashes ($hasil2['bpjs_tk_pk']));
        $bpjs_kes_pp2 = floatval(stripslashes ($hasil2['bpjs_kes_pp']));
        $bpjs_kes_pk2 = floatval(stripslashes ($hasil2['bpjs_kes_pk']));
        //$dplk = (stripslashes ($hasil2['dplk']));

        $upah_pokok2 = round(floatval(stripslashes ($hasil2['upah_pokok'])),0);
        $transport2 = round(floatval(stripslashes ($hasil2['transport'])),0);
        $tunjangan_profesi2 = round(floatval(stripslashes ($hasil2['tunjangan_profesi'])),0);
        $tunjangan_jabatan2 = round(floatval(stripslashes ($hasil2['tunjangan_jabatan'])),0);
        $tunjangan12 = round(floatval(stripslashes ($hasil2['tunjangan1'])),0);
        $tunjangan22 = round(floatval(stripslashes ($hasil2['tunjangan2'])),0);
        $tunjangan32 = round(floatval(stripslashes ($hasil2['tunjangan3'])),0);
        $tunjangan42 = round(floatval(stripslashes ($hasil2['tunjangan4'])),0);
        $tunjangan52 = round(floatval(stripslashes ($hasil2['tunjangan5'])),0);
        $tunjangan62 = round(floatval(stripslashes ($hasil2['tunjangan6'])),0);
        $tunjangan72 = round(floatval(stripslashes ($hasil2['tunjangan7'])),0);

        $rs29 = mysqli_query($koneksi,"select * from gaji_prosentase where blth='$blth' and nip='$nip'");
        $jumlah29 = mysqli_num_rows($rs29);
        if($jumlah29>0){
            $hasil29 = mysqli_fetch_array($rs29);
            $prosentase = floatval(stripslashes ($hasil29['prosentase']));
        } else {
            $prosentase = 0;
        }
        
        if($prosentase>0 && $prosentase<100){
            $honor = round(($honor*$prosentase)/100,0);
            $upah_pokok = round(($upah_pokok*$prosentase)/100,0);
            $transport = round(($transport*$prosentase)/100,0);
            $tunjangan_profesi = round(($tunjangan_profesi*$prosentase)/100,0);
            $tunjangan_jabatan = round(($tunjangan_jabatan*$prosentase)/100,0);
            $tunjangan1 = round(($tunjangan1*$prosentase)/100,0);
            $tunjangan2 = round(($tunjangan2*$prosentase)/100,0);
            $tunjangan3 = round(($tunjangan3*$prosentase)/100,0);
            $tunjangan4 = round(($tunjangan4*$prosentase)/100,0);
            $tunjangan5 = round(($tunjangan5*$prosentase)/100,0);
            $tunjangan6 = round(($tunjangan6*$prosentase)/100,0);
            $tunjangan7 = round(($tunjangan7*$prosentase)/100,0);
        } else {
            $honor = $honor;
            $upah_pokok = $upah_pokok;
            $transport = $transport;
            $tunjangan_profesi = $tunjangan_profesi;
            $tunjangan_jabatan = $tunjangan_jabatan;
            $tunjangan1 = $tunjangan1;
            $tunjangan2 = $tunjangan2;
            $tunjangan3 = $tunjangan3;
            $tunjangan4 = $tunjangan4;
            $tunjangan5 = $tunjangan5;
            $tunjangan6 = $tunjangan6;
            $tunjangan7 = $tunjangan7;
        }
        //$gaji = $honor+$upah_pokok+$transport+$tunjangan_profesi+$tunjangan_jabatan+$tunjangan1+$tunjangan2+$tunjangan3+$tunjangan4+$tunjangan5+$tunjangan6+$tunjangan7;
        $gaji = $honor+$upah_pokok;
        
        $total_premi = 0;
        $total_lembur = 0;
        $total_sppd = 0;
        
        $rs5 = mysqli_query($koneksi,"select * from varcost where nip='$nip' and blth_gaji='$blth'");
        $jumlah5 = mysqli_num_rows($rs5);
        if($jumlah5>0){
            $hasil5 = mysqli_fetch_array($rs5);
            $nama_tunjanganvar1 = stripslashes ($hasil5['nama_tunjanganvar1']);
            $tunjanganvar1 = round(floatval(stripslashes ($hasil5['tunjanganvar1'])),0);
            $nama_tunjanganvar2 = stripslashes ($hasil5['nama_tunjanganvar2']);
            $tunjanganvar2 = round(floatval(stripslashes ($hasil5['tunjanganvar2'])),0);
            $nama_tunjanganvar3 = stripslashes ($hasil5['nama_tunjanganvar3']);
            $tunjanganvar3 = round(floatval(stripslashes ($hasil5['tunjanganvar3'])),0);
            $nama_potonganvar1 = stripslashes ($hasil5['nama_potonganvar1']);
            $potonganvar1 = round(floatval(stripslashes ($hasil5['potonganvar1'])),0);
            $nama_potonganvar2 = stripslashes ($hasil5['nama_potonganvar2']);
            $potonganvar2 = round(floatval(stripslashes ($hasil5['potonganvar2'])),0);
            $nama_potonganvar3 = stripslashes ($hasil5['nama_potonganvar3']);
            $potonganvar3 = round(floatval(stripslashes ($hasil5['potonganvar3'])),0);
        } else {
            $nama_tunjanganvar1 = "";
            $tunjanganvar1 = 0;
            $nama_tunjanganvar2 = "";
            $tunjanganvar2 = 0;
            $nama_tunjanganvar3 = "";
            $tunjanganvar3 = 0;
            $nama_potonganvar1 = "";
            $potonganvar1 = 0;
            $nama_potonganvar2 = "";
            $potonganvar2 = 0;
            $nama_potonganvar3 = "";
            $potonganvar3 = 0;
        }
        $perhitungannya = explode(",", $perhitungan_bpjs);
        $thp = 0;
        foreach($perhitungannya as $perhitungannya2){
            if($perhitungannya2=="1"){
                $thp = $thp+$umk;
            } else if($perhitungannya2=="2"){
                $thp = $thp+$upah_pokok2;
            } else if($perhitungannya2=="3"){
                $thp = $thp+$tunjangan_profesi2;
            } else if($perhitungannya2=="4"){
                $thp = $thp+$transport2;
            } else if($perhitungannya2=="5"){
                $thp = $thp+$tunjangan_jabatan2;
            } else if($perhitungannya2=="6"){
                $thp = $thp+$tunjangan12;
            } else if($perhitungannya2=="7"){
                $thp = $thp+$tunjangan22;
            } else if($perhitungannya2=="8"){
                $thp = $thp+$tunjangan32;
            } else if($perhitungannya2=="9"){
                $thp = $thp+$tunjangan42;
            } else if($perhitungannya2=="10"){
                $thp = $thp+$tunjangan52;
            } else if($perhitungannya2=="11"){
                $thp = $thp+$tunjangan62;
            } else if($perhitungannya2=="12"){
                $thp = $thp+$tunjangan72;
            } else {
                $thp = $thp;
            }
        }
        if($thp>12000000){
            $thp = 12000000;
        } else {
            $thp = $thp;
        }

        if($kd_jenis!="06"){
            $bpjs_tk_pp = round(($thp*$bpjs_tk_pp2)/100,0);
            $bpjs_tk_kp = round(($thp*$bpjs_tk_kp2)/100,0);
            $bpjs_tk_kkp = round(($thp*$bpjs_tk_kkp2)/100,0);
            $bpjs_tk_htp = round(($thp*$bpjs_tk_htp2)/100,0);
            $bpjs_tk_jhtk = round(($thp*$bpjs_tk_jhtk2)/100,0);
            $bpjs_tk_pk = round(($thp*$bpjs_tk_pk2)/100,0);
        } else {
            $bpjs_tk_pp = 0;
            $bpjs_tk_kp = 0;
            $bpjs_tk_kkp = 0;
            $bpjs_tk_htp = 0;
            $bpjs_tk_jhtk = 0;
            $bpjs_tk_pk = 0;
        }
        /*
        if($status_bpjs_tk=="1"){
            $bpjs_tk_pp = round(($thp*$bpjs_tk_pp2)/100,0);
            $bpjs_tk_kp = round(($thp*$bpjs_tk_kp2)/100,0);
            $bpjs_tk_kkp = round(($thp*$bpjs_tk_kkp2)/100,0);
            $bpjs_tk_htp = round(($thp*$bpjs_tk_htp2)/100,0);
            $bpjs_tk_jhtk = round(($thp*$bpjs_tk_jhtk2)/100,0);
            $bpjs_tk_pk = round(($thp*$bpjs_tk_pk2)/100,0);
        } else {
            $bpjs_tk_pp = 0;
            $bpjs_tk_kp = 0;
            $bpjs_tk_kkp = 0;
            $bpjs_tk_htp = 0;
            $bpjs_tk_jhtk = 0;
            $bpjs_tk_pk = 0;
        }
        */
        if($status_bpjs_kes=="1"){
            if($kd_jenis!="06"){
                $bpjs_kes_pp = round(($thp*$bpjs_kes_pp2)/100,0);
                $bpjs_kes_pk = round(($thp*$bpjs_kes_pk2)/100,0);
            } else {
                $bpjs_kes_pp = 0;
                $bpjs_kes_pk = 0;    
            }
        } else {
            $bpjs_kes_pp = 0;
            $bpjs_kes_pk = 0;
        }     

        $perhitungannya2 = explode(",", $perhitungan_dplk);
        $thp2 = 0;
        foreach($perhitungannya2 as $perhitungannya22){
            if($perhitungannya22=="1"){
                $thp2 = $thp2+$umk;
            } else if($perhitungannya22=="2"){
                $thp2 = $thp2+$upah_pokok;
            } else if($perhitungannya22=="3"){
                $thp2 = $thp2+$tunjangan_profesi;
            } else if($perhitungannya22=="4"){
                $thp2 = $thp2+$transport;
            } else if($perhitungannya22=="5"){
                $thp2 = $thp2+$tunjangan_jabatan;
            } else if($perhitungannya22=="6"){
                $thp2 = $thp2+$tunjangan1;
            } else if($perhitungannya22=="7"){
                $thp2 = $thp2+$tunjangan2;
            } else if($perhitungannya22=="8"){
                $thp2 = $thp2+$tunjangan3;
            } else if($perhitungannya22=="9"){
                $thp2 = $thp2+$tunjangan4;
            } else if($perhitungannya22=="10"){
                $thp2 = $thp2+$tunjangan5;
            } else if($perhitungannya22=="11"){
                $thp2 = $thp2+$tunjangan6;
            } else if($perhitungannya22=="12"){
                $thp2 = $thp2+$tunjangan7;
            } else {
                $thp2 = $thp2;
            }
        }
        if(trim($no_rekening_dplk)!="" && trim($no_rekening_dplk)!="-"){
            $dplk = round((9.2/60)*$thp2,0);
        } else {
            $dplk = 0;
        }
        //$tunjangan_pph21 = 0;  
        
                    
        //if($setting_pph!="0"){
            $masa_kerja = 12;
            $bpjs_tk_kkp = round($bpjs_tk_kkp,0);
            $bpjs_tk_kp = round($bpjs_tk_kp,0);
            $bpjs_kes_pp = round($bpjs_kes_pp,0);
            $benefit = $bpjs_tk_kkp+$bpjs_tk_kp+$bpjs_kes_pp;
            //$benefit = $bpjs_tk_kkp+$bpjs_tk_kp;
            
            $bpjs_tk_jhtk = round($bpjs_tk_jhtk,0);
            $bpjs_tk_pk = round($bpjs_tk_pk,0);
            $iuran_pensiunb = $bpjs_tk_jhtk+$bpjs_tk_pk;
            
            $thr = 0;        
            $natuna = 0;
            $honorarium = 0;
            $bonus = 0;
            $bonus_thr = $bonus+$thr;
            
            $tunjangan_variable = $transport+$tunjangan_jabatan+$tunjangan_profesi+$tunjangan1+$tunjangan2+$tunjangan3+$tunjangan4+$tunjangan5+$tunjangan6+$tunjangan7+$tunjanganvar1+$tunjanganvar2+$tunjanganvar3+$total_lembur+$total_premi+$total_sppd;
            $brutob = $gaji+$tunjangan_variable+$honorarium+$benefit+$natuna;
            $biaya_jabatanb1 = round($brutob*0.05,0);
            if($biaya_jabatanb1>500000){
                $biaya_jabatanb = 500000;
            } else {
                $biaya_jabatanb = $biaya_jabatanb1;
            }
            $brutot = round(($gaji+$tunjangan_variable+$honorarium+$benefit+$natuna)*$masa_kerja);
            //$biaya_jabatant = round($biaya_jabatanb*$masa_kerja);
            $biaya_jabatant1 = round($brutot*0.05,0);
                if($biaya_jabatant1>6000000){
                    $biaya_jabatant = 6000000;
                } else {
                    $biaya_jabatant = $biaya_jabatant1;
                }
            $iuran_pensiunt1 = round($iuran_pensiunb*$masa_kerja);
            if($iuran_pensiunt1>2400000){
                $iuran_pensiunt = 2400000;
            } else {
                $iuran_pensiunt = $iuran_pensiunt1;
            }

            $biaya_pengurangt = $biaya_jabatant+$iuran_pensiunt;
            $nettot = $brutot-$biaya_pengurangt;
            $nettot_sebelumnya = 0;
            $nettot_akhir = $nettot+$nettot_sebelumnya;

            $brutot_total = round((($gaji+$tunjangan_variable+$honorarium+$benefit+$natuna)*$masa_kerja)+$bonus_thr);
            $biaya_jabatant1_total = round($brutot_total*0.05,0);
            if($biaya_jabatant1_total>6000000){
                $biaya_jabatant_total = 6000000;
            } else {
                $biaya_jabatant_total = $biaya_jabatant1_total;
            }
            $iuran_pensiunt1_total = round($iuran_pensiunb*$masa_kerja);
            if($iuran_pensiunt1_total>2400000){
                $iuran_pensiunt_total = 2400000;
            } else {
                $iuran_pensiunt_total = $iuran_pensiunt1_total;
            }
            $biaya_pengurangt_total = $biaya_jabatant_total+$iuran_pensiunt_total;
            $nettot_total = $brutot_total-$biaya_pengurangt_total;
            $nettot_total_sebelumnya = 0;
            $nettot_total_akhir = $nettot_total+$nettot_total_sebelumnya;
                    
            if($status2!=""){
                $status = $status2;
            } else {
                $status = "K0";
            }
            $rs3 = mysqli_query($koneksi,"select * from master_ptkp where status='$status'");
            $hasil3 = mysqli_fetch_array($rs3);  
            $ptkp = floatval($hasil3['ptkp']);
            $pkp2 = floor($nettot_akhir-$ptkp);
            $pkp2_total = floor($nettot_total_akhir-$ptkp);
            
            if($pkp2>0){
                $pkp3 = floor($pkp2/1000);          
                $pkp = $pkp3*1000;
            } else {
                $pkp = 0;
            }
            /*
            if($pkp<=50000000){
                $pkp1 = $pkp;
                $pkp2 = 0;
                $pkp3 = 0;
                $pkp4 = 0;
            } else if($pkp>50000000 && $pkp<=250000000){
                $pkp1 = 50000000;
                $pkp2 = $pkp-$pkp1;
                $pkp3 = 0;
                $pkp4 = 0;
            } else if($pkp>250000000 && $pkp<=500000000){
                $pkp1 = 50000000;
                $pkp2 = 250000000-$pkp1;
                $pkp3 = $pkp-$pkp2-$pkp1;
                $pkp4 = 0;
            } else if($pkp>500000000){
                $pkp1 = 50000000;
                $pkp2 = 250000000-$pkp1;
                $pkp3 = 500000000-$pkp1;
                $pkp4 = $pkp-$pkp3-$pkp2-$pkp1;
            } else {
                $pkp1 = 0;
                $pkp2 = 0;
                $pkp3 = 0;
                $pkp4 = 0;
            }
            if($npwp=="000000000000000" || $npwp=="" || $npwp=="null"){
                $ppht1 = ceil($pkp1*0.05*1.2);
                $ppht2 = ceil($pkp2*0.15*1.2);
                $ppht3 = ceil($pkp3*0.25*1.2);
                $ppht4 = ceil($pkp4*0.30*1.2);
            } else {
                $ppht1 = ceil($pkp1*0.05);
                $ppht2 = ceil($pkp2*0.15);
                $ppht3 = ceil($pkp3*0.25);
                $ppht4 = ceil($pkp4*0.30);
            }
            $ppht = $ppht1+$ppht2+$ppht3+$ppht4;
            */
            //Baru
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

            /*
            $ppht_sebelumnya = 0;
            $rs4 = mysqli_query($koneksi,"select pphb_terutang as ppht_sebelumnya from pph21masa where blth>='$tahunnya-01' and blth<'$blth'");
            $hasil4 = mysqli_fetch_array($rs4);
            if($hasil4){
                $ppht_sebelumnya = floatval(stripslashes ($hasil4['ppht_sebelumnya']));
            } else {
                $ppht_sebelumnya = 0;
            }
            */
            $ppht_sebelumnya = 0;
            
            $ppht_terutang2 = $ppht-$ppht_sebelumnya;
            if($ppht_terutang2>0){
                $ppht_terutang = $ppht_terutang2;
            } else {
                $ppht_terutang = 0;
            }
            
            if($ppht_terutang>0){
                $pphb1_terutang = ceil($ppht_terutang/$masa_kerja);  
                //$pphb_terutang = $ppht_terutang;
            } else {
                $pphb1_terutang = 0;
            }

            
            if($pkp2_total>0){
                $pkp3_total = floor($pkp2_total/1000);          
                $pkp_total = $pkp3_total*1000;
            } else {
                $pkp_total = 0;
            }
            
            if($pkp_total<=50000000){
                $pkp1_total = $pkp_total;
                $pkp2_total = 0;
                $pkp3_total = 0;
                $pkp4_total = 0;
            } else if($pkp_total>50000000 && $pkp_total<=250000000){
                $pkp1_total = 50000000;
                $pkp2_total = $pkp_total-$pkp1;
                $pkp3_total = 0;
                $pkp4_total = 0;
            } else if($pkp_total>250000000 && $pkp_total<=500000000){
                $pkp1_total = 50000000;
                $pkp2_total = 250000000-$pkp1;
                $pkp3_total = $pkp_total-$pkp2-$pkp1;
                $pkp4_total = 0;
            } else if($pkp_total>500000000){
                $pkp1_total = 50000000;
                $pkp2_total = 250000000-$pkp1;
                $pkp3_total = 500000000-$pkp1;
                $pkp4_total = $pkp_total-$pkp3-$pkp2-$pkp1;
            } else {
                $pkp1_total = 0;
                $pkp2_total = 0;
                $pkp3_total = 0;
                $pkp4_total = 0;
            }
            if($npwp=="000000000000000"){
                $ppht1 = ceil($pkp1_total*0.05*1.2);
                $ppht2 = ceil($pkp2_total*0.15*1.2);
                $ppht3 = ceil($pkp3_total*0.25*1.2);
                $ppht4 = ceil($pkp4_total*0.30*1.2);
            } else {
                $ppht1 = ceil($pkp1_total*0.05);
                $ppht2 = ceil($pkp2_total*0.15);
                $ppht3 = ceil($pkp3_total*0.25);
                $ppht4 = ceil($pkp4_total*0.30);
            }
            $ppht_total = $ppht1_total+$ppht2_total+$ppht3_total+$ppht4_total;
            $ppht_total_sebelumnya = 0;
            $ppht_total_terutang2 = $ppht_total-$ppht_total_sebelumnya;
            if($ppht_total_terutang2>0){
                $ppht_total_terutang = $ppht_total_terutang2;
            } else {
                $ppht_total_terutang = 0;
            }
            $pphb21_terutang = $ppht_total_terutang-$ppht_terutang;
            if($pphb21_terutang>0){
                $pphb2_terutang = $pphb21_terutang;  
            } else {
                $pphb2_terutang = 0;
            }
            $pphb_terutang = $pphb1_terutang+$pphb2_terutang;
            $potongan_pph21 = $pphb1_terutang+$pphb2_terutang;
        /*
        } else {
            $pphb_terutang = 0;
            $potongan_pph21 = 0;
        } 
        */   
    
        $bpjs_tk_perusahaan = $bpjs_tk_pp+$bpjs_tk_kp+$bpjs_tk_kkp+$bpjs_tk_htp;
        $bpjs_kes_perusahaan = $bpjs_kes_pp;
        $potbpjstk = $bpjs_tk_jhtk+$bpjs_tk_pk;
        $potbpjskes = $bpjs_kes_pk;
        $total_benefit = $bpjs_kes_perusahaan+$bpjs_tk_perusahaan;
        
        $total_pendapatan = $honor+$upah_pokok+$transport+$tunjangan_profesi+$tunjangan_jabatan;
        $total_pendapatan = $total_pendapatan+$tunjangan_pph21+$tunjangan1+$tunjangan2+$tunjangan3+$tunjangan4+$tunjangan5+$tunjangan6+$tunjangan7;
        $total_pendapatan = $total_pendapatan+$tunjanganvar1+$tunjanganvar2+$tunjanganvar3+$total_lembur+$total_premi;

        $pendapatan_benefit = $total_pendapatan+$total_benefit;
        
        $total_potongan = $potongan1+$potongan2+$potongan3+$potongan4+$potongan5+$potongan6+$potongan7;
        $total_potongan = $potbpjstk+$potbpjskes+$total_potongan+$potonganvar1+$potonganvar2+$potonganvar3+$potongan_pph21;
        
        $upah_bersih = $total_pendapatan-$total_potongan;

        $totaltunjangan = $transport+$tunjangan_profesi+$tunjangan_jabatan+$tunjangan1+$tunjangan2+$tunjangan3+$tunjangan4+$tunjangan5+$tunjangan6+$tunjangan7;
        $tvarcost = $tunjanganvar1+$tunjanganvar2+$tunjanganvar3;
        $totalpotongan = $potongan1+$potongan2+$potongan3+$potongan4+$potongan5+$potongan6+$potongan7;
        $pvarcost = $potonganvar1+$potonganvar2+$potonganvar3;

        $tahun = substr($blth,0,4);
        $blthnip = $blth.".".$nip;
        $blth_awal = $blth;
        $blth_akhir = $blth;
        $tgl_proses = date("Y-m-d");
        $petugas = $userloginsipeg;

        $perintah92 = "";
        $perintah92 = $perintah92."insert into pphmasa values('','PCN','$no_urut','$kelompok','$kd_region','$kd_cabang','$kd_unit','$no_spk','$nip','$status','$npwp','$tahun','$blth','$blthnip','$blth_awal','$blth_akhir','$masa_kerja'";
        $perintah92 = $perintah92.",'$gaji','$tunjangan_pph','$tunjangan_variable','$honorarium','$benefit','$natuna','$bonus_thr','$brutob','$biaya_jabatanb','$iuran_pensiunb'";
        $perintah92 = $perintah92.",'$brutot','$biaya_jabatant','$iuran_pensiunt','$biaya_pengurangt','$nettot','$nettot_sebelumnya','$nettot_akhir','$ptkp','$pkp','$ppht','$ppht_sebelumnya','$ppht_terutang','$ppht_total_terutang','$pphb1_terutang','$pphb2_terutang','$pphb_terutang','$tgl_proses','$petugas')";
        $result92 = @mysqli_query($koneksi,$perintah92);
        if ($result92){
            $sql4 = "insert into gaji values('','$blth','$kd_region','$kd_cabang','$kd_unitpln','$kd_unit','$kd_jenis','$no_spk','$kelompok','$jenis_penggajian','$jabatan','$nip','$blth_nip','$honor','$umk','$koefisien','$upah_pokok','$transport','$tunjangan_profesi','$tunjangan_jabatan'";
            $sql4 = $sql4.",'$tunjangan_pph21','$nama_tunjangan1','$tunjangan1','$nama_tunjangan2','$tunjangan2','$nama_tunjangan3','$tunjangan3','$nama_tunjangan4','$tunjangan4','$nama_tunjangan5','$tunjangan5','$nama_tunjangan6','$tunjangan6','$nama_tunjangan7','$tunjangan7'";
            $sql4 = $sql4.",'$potongan_pph21','$nama_potongan1','$potongan1','$nama_potongan2','$potongan2','$nama_potongan3','$potongan3','$nama_potongan4','$potongan4','$nama_potongan5','$potongan5','$nama_potongan6','$potongan6','$nama_potongan7','$potongan7'";
            $sql4 = $sql4.",'$bpjs_tk_pp','$bpjs_tk_kp','$bpjs_tk_kkp','$bpjs_tk_htp','$bpjs_tk_jhtk','$bpjs_tk_pk','$bpjs_kes_pp','$bpjs_kes_pk','$dplk','$total_lembur','$total_premi','$total_sppd'";
            $sql4 = $sql4.",'$nama_tunjanganvar1','$tunjanganvar1','$nama_tunjanganvar2','$tunjanganvar2','$nama_tunjanganvar3','$tunjanganvar3','$nama_potonganvar1','$potonganvar1','$nama_potonganvar2','$potonganvar2','$nama_potonganvar3','$potonganvar3'";
            $sql4 = $sql4.",'$nama_bank','$no_rekening','$nama_rekening','$totaltunjangan','$tvarcost','$total_pendapatan','$total_benefit','$pendapatan_benefit','$totalpotongan','$pvarcost','$total_potongan','$bpjs_kes_perusahaan','$bpjs_tk_perusahaan','$potbpjskes','$potbpjstk','$upah_bersih')";
            $result4 = @mysqli_query($koneksi,$sql4);
            if ($result4){
                echo json_encode(array('success'=>true));
            } else {
                echo json_encode(array('errorMsg'=>'Gagal menyimpan data.'));
            }
        }
    } else {
        echo json_encode(array('errorMsg'=>'Gaji untuk bulan ini sudah pernah diproses.'));
    }
}
?>