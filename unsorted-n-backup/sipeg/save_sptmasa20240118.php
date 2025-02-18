<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    ini_set('date.timezone', 'Asia/Jakarta');
    include 'koneksi.php';
    include 'koneksi_sipeg.php';
    $hari_ini = date("Y-m-d H:i:s");
    $jam_ini = date("H:i:s");    
    
    $blth = $_REQUEST['blthsptmasa'];
    $nip2 = $_REQUEST['nipsptmasa'];    
    //$blth = "2023-04";
    //$nip2 = "";

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
    $nama_petugas = stripslashes($hasil1['user_fullname']);

    $rs9 = mysqli_query($koneksi,"select count(*) as jumlahspt from pph21masa where blth='$blth'".$perintah);
    $hasil9 = mysqli_fetch_array($rs9);
    if($hasil9){
        $jumlahspt = intval(stripslashes ($hasil9['jumlahspt']));
    } else {
        $jumlahspt = 0;
    }
    
    if($jumlahspt==0){
        $rs = mysqli_query($koneksi,"select * from gaji where blth='$blth'".$perintah." order by id asc");
        $sukses=0;
        while ($hasil = mysqli_fetch_array($rs)) {
            $no_urut = str_pad($urut2,8,"0",STR_PAD_LEFT);
            $nip = $hasil['nip'];
            $nip_blth = $nip."-".$blth;
            $gaji_dasar = floatval(stripslashes ($hasil['gaji_dasar']));
            $honorarium2 = floatval(stripslashes ($hasil['honorarium']));
            $honorer = floatval(stripslashes ($hasil['honorer']));
            $tarif_grade = floatval(stripslashes ($hasil['tarif_grade']));
            $gaji = $tarif_grade;
            $honorarium = $honorarium2+$honorer;
            $tunjangan_posisi = floatval(stripslashes ($hasil['tunjangan_posisi']));
            $p21b = floatval(stripslashes ($hasil['p21b']));
            $tunjangan_kemahalan = floatval(stripslashes ($hasil['tunjangan_kemahalan']));
            $tunjangan_perumahan = floatval(stripslashes ($hasil['tunjangan_perumahan']));
            $tunjangan_transportasi = floatval(stripslashes ($hasil['tunjangan_transportasi']));
            $bantuan_pulsa = floatval(stripslashes ($hasil['bantuan_pulsa']));
            $dplk_persero = floatval(stripslashes ($hasil['dplk_persero']));
            $dplk_simponi_pr = floatval(stripslashes ($hasil['dplk_simponi_pr']));
            $lembur = floatval(stripslashes ($hasil['lembur']));
            $tunjangan1 = floatval(stripslashes ($hasil['tunjangan1']));
            $tunjangan2 = floatval(stripslashes ($hasil['tunjangan2']));
            $tunjangan3 = floatval(stripslashes ($hasil['tunjangan3']));
            $tunjangan4 = floatval(stripslashes ($hasil['tunjangan4']));
            $bpjs_tk_pp = floatval(stripslashes ($hasil['bpjs_tk_pp']));
            $bpjs_tk_kp = floatval(stripslashes ($hasil['bpjs_tk_kp']));
            $bpjs_tk_kkp = floatval(stripslashes ($hasil['bpjs_tk_kkp']));
            $bpjs_tk_htp = floatval(stripslashes ($hasil['bpjs_tk_htp']));
            $bpjs_tk_jhtk = floatval(stripslashes ($hasil['bpjs_tk_jhtk']));
            $bpjs_tk_pk = floatval(stripslashes ($hasil['bpjs_tk_pk']));
            $bpjs_kes_pp = floatval(stripslashes ($hasil['bpjs_kes_pp']));
            $bpjs_kes_pk = floatval(stripslashes ($hasil['bpjs_kes_pk']));
            //$total_pendapatan = floatval(stripslashes ($hasil['total_pendapatan']));
            $bpjs_pr = floatval(stripslashes ($hasil['bpjs_pr']));
            //$benefit = floatval(stripslashes ($hasil['benefit']));        
            //$pendapatan_benefit = floatval(stripslashes ($hasil['pendapatan_benefit']));        
            $pot_koperasi = floatval(stripslashes ($hasil['pot_koperasi']));        
            $pot_bazis = floatval(stripslashes ($hasil['pot_bazis']));        
            $dplk_simponi = floatval(stripslashes ($hasil['dplk_simponi']));        
            $pot_dplk_pribadi = floatval(stripslashes ($hasil['pot_dplk_pribadi']));        
            $cop_kendaraan = floatval(stripslashes ($hasil['cop_kendaraan']));
            $iuran_peserta = floatval(stripslashes ($hasil['iuran_peserta']));
            $brpr = floatval(stripslashes ($hasil['brpr']));
            $sewa_mess = floatval(stripslashes ($hasil['sewa_mess']));
            $qurban = floatval(stripslashes ($hasil['qurban']));
            $arisan = floatval(stripslashes ($hasil['arisan']));
            $potongan1 = floatval(stripslashes ($hasil['potongan1']));
            $potongan2 = floatval(stripslashes ($hasil['potongan2']));
            $potongan3 = floatval(stripslashes ($hasil['potongan3']));
            $potongan4 = floatval(stripslashes ($hasil['potongan4']));
            //$total_potongan = floatval(stripslashes ($hasil['total_potongan']));

            //$benefit = $bpjs_kes_pp+$bpjs_tk_pp+$bpjs_tk_kp+$bpjs_tk_kkp+$bpjs_tk_htp+$dplk_simponi_pr;
            $benefit = $bpjs_kes_pp+$bpjs_tk_kp+$bpjs_tk_kkp+$dplk_persero+$dplk_simponi_pr;
            $rs31 = mysqli_query($koneksi,"select uang_cuti from cuti_tahunan where blth='$blth' and nip='$nip'");
            $hasil31 = mysqli_fetch_array($rs31);
            if($hasil31){
                $uang_cuti = floatval($hasil31['uang_cuti']);
            } else {
                $uang_cuti = 0;
            }
            
            $rs31 = mysqli_query($koneksi,"select p31 from iks where blth='$blth' and nip='$nip'");
            $hasil31 = mysqli_fetch_array($rs31);
            if($hasil31){
                $iks = floatval($hasil31['p31']);
            } else {
                $iks = 0;
            }
            
            $rs31 = mysqli_query($koneksi,"select bonus from bonus where blth='$blth' and nip='$nip'");
            $hasil31 = mysqli_fetch_array($rs31);
            if($hasil31){
                $bonus = floatval($hasil31['bonus']);
            } else {
                $bonus = 0;
            }
            
            $rs31 = mysqli_query($koneksi,"select honorarium from honorarium_eo where blth='$blth' and nip='$nip'");
            $hasil31 = mysqli_fetch_array($rs31);
            if($hasil31){
                $honorarium_eo = floatval($hasil31['honorarium']);
            } else {
                $honorarium_eo = 0;
            }
            
            $rs31 = mysqli_query($koneksi,"select thr from thr where blth='$blth' and nip='$nip'");
            $hasil31 = mysqli_fetch_array($rs31);
            if($hasil31){
                $thr = floatval($hasil31['thr']);
            } else {
                $thr = 0;
            }
            
            $rs31 = mysqli_query($koneksi,"select winduan from winduan where blth='$blth' and nip='$nip'");
            $hasil31 = mysqli_fetch_array($rs31);
            if($hasil31){
                $uang_winduan = floatval($hasil31['winduan']);
            } else {
                $uang_winduan = 0;
            }            
    
            $tantiem = 0;
            $bonus_thr = $uang_cuti+$iks+$bonus+$honorarium_eo+$thr+$uang_winduan+$tantiem;

            $sppd = 0;
            $lembur = 0;
            
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
            */
            $rs39 = mysqli_query($koneksi,"select * from suplisi where blth='$blth' and nip='$nip'");
            $hasil39 = mysqli_fetch_array($rs39);
            if($hasil31){
                $sgaji = floatval($hasil31['gaji']);
                $stunjangan_posisi = floatval($hasil31['tunjangan_posisi']);
                $sp21b = floatval($hasil31['p21b']);
                $stunjangan_kemahalan = floatval($hasil31['tunjangan_kemahalan']);
                $stunjangan_perumahan = floatval($hasil31['tunjangan_perumahan']);
                $stunjangan_transportasi = floatval($hasil31['tunjangan_transportasi']);
                $sbantuan_pulsa = floatval($hasil31['bantuan_pulsa']);
                $scuti = floatval($hasil31['cuti']);
                $sthr = floatval($hasil31['thr']);
                $siks = floatval($hasil31['iks']);
                $sbonus = floatval($hasil31['bonus']);
                $swinduan = floatval($hasil31['winduan']);
                $shonorarium_eo = floatval($hasil31['honorarium_eo']);
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
            /*
            $sgaji = $sgaji+$gaji;
            $stunjangan_posisi = $stunjangan_posisi+$stunjangan_posisi;
            $sp21b = $sp21b+$sp21b;
            $stunjangan_kemahalan = $stunjangan_kemahalan+$stunjangan_kemahalan;
            $stunjangan_perumahan = $stunjangan_perumahan+$stunjangan_perumahan;
            $stunjangan_transportasi = $stunjangan_transportasi+$stunjangan_transportasi;
            $sbantuan_pulsa = $sbantuan_pulsa+$sbantuan_pulsa;
            $scuti = $scuti+$scuti;
            $sthr = $sthr+$sthr;
            $siks = $siks+$siks;
            $sbonus = $sbonus+$sbonus;
            $swinduan = $swinduan+$swinduan;
            $shonorarium_eo = $shonorarium_eo+$shonorarium_eo;  
            */
            if($honorarium>0){
                $honorarium = $honorarium+$sgaji;
            } else {
                $gaji = $gaji+$sgaji;
            }      
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
            $tunjangan_variable = $tunjangan_posisi+$p21b+$tunjangan_kemahalan+$tunjangan_transportasi+$tunjangan_perumahan+$bantuan_pulsa+$tunjangan1+$tunjangan2+$tunjangan3+$tunjangan4+$lembur+$sppd;
            $natuna = 0;
            $tunjangan_pph = 0;
            $brutob = $gaji+$tunjangan_variable+$honorarium+$benefit+$natuna;
            $biaya_jabatanb1 = round($brutob*0.05,0);
            if($biaya_jabatanb1>500000){
              $biaya_jabatanb = 500000;
            } else {
              $biaya_jabatanb = $biaya_jabatanb1;
            }
            $iuran_pensiunb1 = $bpjs_kes_pk+$bpjs_tk_jhtk+$bpjs_tk_pk+$dplk_simponi;
            //$iuran_pensiunb1 = $bpjs_tk_jhtk+$bpjs_tk_pk;
            if($iuran_pensiunb1>200000){
              $iuran_pensiunb = 200000;
            } else {
              $iuran_pensiunb = $iuran_pensiunb1;
            }

            $rs4 = mysqli_query($koneksi,"select * from data_pegawai where nip='$nip'");
            $hasil4 = mysqli_fetch_array($rs4);
            $tgl_masuk2 = $hasil4['tgl_masuk'];
            $tgl_masuk = date('Y-m-01', strtotime($tgl_masuk2));

            $rs4 = mysqli_query($koneksi,"select * from setting_pegawai where nip='$nip'");
            $hasil4 = mysqli_fetch_array($rs4);
            if($hasil4){
                $status2 = $hasil4['status'];
                $jenis = $hasil4['jenis'];
                $npwp2 = $hasil4['npwp'];
                $kpp = $hasil4['kpp'];
            } else {
                $status2 = "";
                $jenis = "";
                $npwp2 = "";
                $kpp = "";
            }
            if($npwp2==""){
                $npwp = "000000000000000";
            } else {
                $npwp3 = str_replace(",","",$npwp2);
                $npwp3 = str_replace(".","",$npwp3);
                $npwp3 = substr(trim(str_replace(" ","",$npwp3)),0,15);
                $npwp = str_pad($npwp3,15,"0",STR_PAD_LEFT);
            }

            $blth_minimal = $tahunnya."-01-01";
            $blth_maksimal = $tahunnya."-12-01";
            if($tgl_masuk<$blth_minimal){
                $bulan_awal = $blth_minimal;
            } else {
                $bulan_awal = $tgl_masuk;
            }
            $bulan_akhir = date('Y-m-t', strtotime($blth_maksimal));
            $timeStart = strtotime($bulan_awal);
            $timeEnd = strtotime($bulan_akhir);
            $numBulan = 1 + (date("Y",$timeEnd)-date("Y",$timeStart))*12;
            $numBulan += date("m",$timeEnd)-date("m",$timeStart);
            $jumlah_bulan2 = $numBulan;
            if($jumlah_bulan2>12){
                $jumlah_bulan = 12;
            } else {
                $jumlah_bulan = $jumlah_bulan2;
            }    
    
            $brutot = round(($gaji+$tunjangan_variable+$honorarium+$benefit+$natuna)*$jumlah_bulan);
            $biaya_jabatant1 = round($brutot*0.05,0);
            if($biaya_jabatant1>6000000){
              $biaya_jabatant = 6000000;
            } else {
              $biaya_jabatant = $biaya_jabatant1;
            }
            //$iuran_pensiunt1 = round($iuran_pensiunb*$masa_kerja);
            $masa_kerja = 1;
            $iuran_pensiunt1 = ($bpjs_kes_pk+$bpjs_tk_jhtk+$bpjs_tk_pk+$dplk_simponi)*$jumlah_bulan;
            if($iuran_pensiunt1>2400000){
              $iuran_pensiunt = 2400000;
            } else {
              $iuran_pensiunt = $iuran_pensiunt1;
            }
            $biaya_pengurangt = $biaya_jabatant+$iuran_pensiunt;

            $brutot_total = $brutot+$bonus_thr;            
            $biaya_jabatant1_total = round($brutot_total*0.05,0);
            if($biaya_jabatant1_total>6000000){
              $biaya_jabatant_total = 6000000;
            } else {
              $biaya_jabatant_total = $biaya_jabatant1_total;
            }
            $iuran_pensiunt1_total = ($bpjs_kes_pk+$bpjs_tk_jhtk+$bpjs_tk_pk+$dplk_simponi)*$jumlah_bulan;
            if($iuran_pensiunt1_total>2400000){
              $iuran_pensiunt_total = 2400000;
            } else {
              $iuran_pensiunt_total = $iuran_pensiunt1_total;
            }
            if($jenis=="PROHIRE"){
              $biaya_jabatant_total = 0;
            }
            $biaya_pengurangt_total = $biaya_jabatant_total+$iuran_pensiunt_total;
            //$biaya_jabatant1 = round($biaya_jabatanb*$masa_kerja);
            /*
            if($jenis=="PROHIRE"){
              $biaya_jabatant = 0;
            }
            */
                
            $nettot = $brutot-$biaya_pengurangt;
            $nettot_total = $brutot_total-$biaya_pengurangt_total;
            $nettot_sebelumnya = 0;
            $nettot_total_sebelumnya = 0;
            $ppht_sebelumnya = 0; 
            $ppht_sebelumnya2 = 0;            
            /*
            $ppht_sebelumnya1 = 0;      
            $query4 = "SELECT sum(pphb_terutang) as pph21 from pph21masa where nip='$nip' and blth>='$tahun-01' and blth<='$blth'";
            $row4 = $this->db->query($query4)->row();       
            $ppht_sebelumnya1 = ($row4->pph21)*1;
            $ppht_sebelumnya = $ppht_sebelumnya1;  
            */
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

            $rs23 = mysqli_query($koneksi,"select * from master_ptkp where status='$status'");
            $hasil23 = mysqli_fetch_array($rs23);
            if($hasil23){
                $ptkp = floatval($hasil23['ptkp']);
            } else {
                $ptkp = 0;
            }
    
            $pkp2 = floor($nettot_akhir-$ptkp);      
            $pkp_total2 = floor($nettot_total-$ptkp);
            if($pkp2>0){
                $pkp3 = floor($pkp2/1000);          
                $pkp = $pkp3*1000;
            } else {
                $pkp = 0;
            }
            
            if($pkp_total2>0){
              $pkp_total3 = floor($pkp_total2/1000);          
              $pkp_total = $pkp_total3*1000;
            } else {
                $pkp_total = 0;
            }
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
    
            //$ppht_terutang2 = $ppht-$ppht_sebelumnya;
            $ppht_terutang2 = $ppht;
            $pphb1_terutang = round($ppht/$jumlah_bulan);
            if($pkp_total<=60000000){
              $pkp_total1 = $pkp_total;
              $pkp_total2 = 0;
              $pkp_total3 = 0;
              $pkp_total4 = 0;
              $pkp_total5 = 0;
            } else if($pkp_total>60000000 && $pkp_total<=250000000){
                $pkp_total1 = 60000000;
                $pkp_total2 = $pkp_total-$pkp_total1;
                $pkp_total3 = 0;
                $pkp_total4 = 0;
                $pkp_total5 = 0;
            } else if($pkp_total>250000000 && $pkp_total<=500000000){
                $pkp_total1 = 60000000;
                $pkp_total2 = 250000000-$pkp_total1;
                $pkp_total3 = $pkp_total-$pkp_total2-$pkp_total1;
                $pkp_total4 = 0;
                $pkp_total5 = 0;
            } else if($pkp_total>500000000 && $pkp_total<=5000000000){
                $pkp_total1 = 60000000;
                $pkp_total2 = 250000000-$pkp_total1;
                $pkp_total3 = 500000000-$pkp_total2-$pkp_total1;
                $pkp_total4 = $pkp_total-$pkp_total3-$pkp_total2-$pkp_total1;
                $pkp_total5 = 0;
            } else if($pkp_total>5000000000){
                $pkp_total1 = 60000000;
                $pkp_total2 = 250000000-$pkp_total1;
                $pkp_total3 = 500000000-$pkp_total2-$pkp_total1;
                $pkp_total4 = 5000000000-$pkp_total3-$pkp_total2-$pkp_total1;
                $pkp_total5 = $pkp_total-$pkp_total4-$pkp_total3-$pkp_total2-$pkp_total1;
            } else {
                $pkp_total1 = 0;
                $pkp_total2 = 0;
                $pkp_total3 = 0;
                $pkp_total4 = 0;
                $pkp_total5 = 0;
            }
            $ppht_total1 = ceil($pkp_total1*0.05);
            $ppht_total2 = ceil($pkp_total2*0.15);
            $ppht_total3 = ceil($pkp_total3*0.25);
            $ppht_total4 = ceil($pkp_total4*0.30);
            $ppht_total5 = ceil($pkp_total5*0.35);
            $ppht_total = $ppht_total1+$ppht_total2+$ppht_total3+$ppht_total4+$ppht_total5;
    
            $ppht_total_sebelumnya = 0;
    
            $ppht_total_terutang2 = floor($ppht_total);
            if($ppht_total_terutang2>0){
              $ppht_total_terutang = $ppht_total_terutang2;
            } else {
              $ppht_total_terutang = 0;
            }
    
            //Atas Cek Nanti
            if($bonus_thr>0){
              $pphb2_terutang = $ppht_total_terutang-$ppht;
            } else {
              $pphb2_terutang = 0;
            }
            if($pphb2_terutang<=0){
              $pphb2_terutang = 0;
            }
            //Bawah Cek Nanti
    
            //$pphb2_terutang = 0;
            $pphb3_terutang = $pphb1_terutang+$pphb2_terutang;
            //$pphb3_terutang = $pphb1_terutang;
    
            if($pphb3_terutang<=0){
              $pphb_terutang = 0;
            } else {
              $pphb_terutang = $pphb3_terutang;
            }
                                
            $rs32 = mysqli_query($koneksi,"select * from perhitungan_pajak_khusus where nip='$nip'");
            $hasil32 = mysqli_fetch_array($rs32);
            if($hasil32){
                $brutob2 = $brutob;
                $pph_sebelumnya = 0;
                $rs33 = mysqli_query($koneksi,"SELECT sum(brutob) as brutob_sebelumnya,sum(pphb_terutang) as pph_sebelumnya from pph21masa where nip='$nip' and blth>='$tahun-01' and blth<'$blth'");
                $hasil33 = mysqli_fetch_array($rs33);
                if($hasil33){
                    $brutob_sebelumnya = floatval($hasil33['brutob_sebelumnya']);
                    $pph_sebelumnya = floatval($hasil33['pph_sebelumnya']);
                    $brutob2 = $brutob2+$brutob_sebelumnya;
                } else {
                    $brutob_sebelumnya = 0;
                    $pph_sebelumnya = 0;
                    $brutob2 = $brutob2;
                }
                $brutot_total = $brutob;
                //$masa_kerja = 1;
                $biaya_jabatanb = 0;
                $iuran_pensiunb = 0;
                $brutot = 0;
                $biaya_jabatant = 0;
                $iuran_pensiunt = 0;
                $biaya_pengurangt = 0;
                $nettot = 0;
                $brutototal = 0;
                $biaya_jabatant_total = 0;
                $iuran_pensiunt_total = 0;
                $biaya_pengurangt_total = 0;
                //$nettot_total = 0;
                $nettot_total = 0;
                $nettot_sebelumnya = 0;
                $nettot_total_akhir = 0;
                $ptkp = 0;
                $pkp_total = $brutob2;
                $ppht_total = 0;
                $ppht_sebelumnya = $pph_sebelumnya;
                $ppht_total_terutang = 0;
                //$pphb1_terutang = ceil($pkp_total*0.05);
                //$pphb2_terutang = 0;
                //$pphb_terutang = $pphb1_terutang;
                if($pkp_total<=60000000){
                    $pkp_total1 = $pkp_total;
                    $pkp_total2 = 0;
                    $pkp_total3 = 0;
                    $pkp_total4 = 0;
                    $pkp_total5 = 0;
                } else if($pkp_total>60000000 && $pkp_total<=250000000){
                    $pkp_total1 = 60000000;
                    $pkp_total2 = $pkp_total-$pkp_total1;
                    $pkp_total3 = 0;
                    $pkp_total4 = 0;
                    $pkp_total5 = 0;
                } else if($pkp_total>250000000 && $pkp_total<=500000000){
                    $pkp_total1 = 60000000;
                    $pkp_total2 = 250000000-$pkp_total1;
                    $pkp_total3 = $pkp_total-$pkp_total2-$pkp_total1;
                    $pkp_total4 = 0;
                    $pkp_total5 = 0;
                } else if($pkp_total>500000000 && $pkp_total<=5000000000){
                    $pkp_total1 = 60000000;
                    $pkp_total2 = 250000000-$pkp_total1;
                    $pkp_total3 = 500000000-$pkp_total2-$pkp_total1;
                    $pkp_total4 = $pkp_total-$pkp_total3-$pkp_total2-$pkp_total1;
                    $pkp_total5 = 0;
                } else if($pkp_total>5000000000){
                    $pkp_total1 = 60000000;
                    $pkp_total2 = 250000000-$pkp_total1;
                    $pkp_total3 = 500000000-$pkp_total2-$pkp_total1;
                    $pkp_total4 = 5000000000-$pkp_total3-$pkp_total2-$pkp_total1;
                    $pkp_total5 = $pkp_total-$pkp_total4-$pkp_total3-$pkp_total2-$pkp_total1;
                } else {
                    $pkp_total1 = 0;
                    $pkp_total2 = 0;
                    $pkp_total3 = 0;
                    $pkp_total4 = 0;
                    $pkp_total5 = 0;
                }
                $ppht_total1 = ceil($pkp_total1*0.05);
                $ppht_total2 = ceil($pkp_total2*0.15);
                $ppht_total3 = ceil($pkp_total3*0.25);
                $ppht_total4 = ceil($pkp_total4*0.30);
                $ppht_total5 = ceil($pkp_total5*0.35);
                $ppht_total = $ppht_total1+$ppht_total2+$ppht_total3+$ppht_total4+$ppht_total5;
        
                $pphb3_terutang = $ppht_total;
                if($pphb3_terutang<=0){
                    $pphb1_terutang = 0;
                    $pphb2_terutang = 0;
                    $pphb_terutang = 0;
                } else {
                    $pphb1_terutang = $pphb3_terutang-$pph_sebelumnya;
                    $pphb2_terutang = 0;
                    $pphb_terutang = $pphb1_terutang+$pphb2_terutang;
                }
            }
            $nettot_akhir = $nettot_total_akhir;
            $ppht_terutang = $ppht_total_terutang;
            $pkp = $pkp_total;
            $ppht = $ppht_total;
            $ppht_terutang = $ppht_total_terutang;
  
            $pph_sistem  = 0;
            $pph_koreksi = 0;
    
            $tahun = substr($blth,0,4);
            $blthnip = $blth.".".$nip;
            $blth_awal = $blth;
            $blth_akhir = $blth;
            $tgl_proses = date("Y-m-d");
            $petugas = $userhris;
            
            $sql1 = "insert into pph21masa(kpp,npwp,no_urut,nip,status,tahun,blth,blthnip,blth_awal,blth_akhir,masa_kerja,gaji,tunjangan_pph";
            $sql1 .= ",tunjangan_variable,honorarium,benefit,natuna,bonus_thr,brutob,biaya_jabatanb,iuran_pensiunb,brutot";
            $sql1 .= ",biaya_jabatant,iuran_pensiunt,biaya_pengurangt,nettot,brutot_total,biaya_jabatant_total,iuran_pensiunt_total";
            $sql1 .= ",biaya_pengurangt_total,nettot_total,nettot_sebelumnya,nettot_akhir,ptkp,pkp,ppht,ppht_sebelumnya,ppht_terutang";
            $sql1 .= ",pphb1_terutang,pphb2_terutang,pph_sistem,pph_koreksi,pphb_terutang,tgl_proses,petugas)";
            $sql1 .= " values('$kpp','$npwp','$no_urut','$nip','$status','$tahun','$blth','$blthnip','$blth_awal','$blth_akhir','$masa_kerja','$gaji','$tunjangan_pph'";
            $sql1 .= ",'$tunjangan_variable','$honorarium','$benefit','$natuna','$bonus_thr','$brutob','$biaya_jabatanb','$iuran_pensiunb','$brutot'";
            $sql1 .= ",'$biaya_jabatant','$iuran_pensiunt','$biaya_pengurangt','$nettot','$brutot_total','$biaya_jabatant_total','$iuran_pensiunt_total'";
            $sql1 .= ",'$biaya_pengurangt_total','$nettot_total','$nettot_sebelumnya','$nettot_akhir','$ptkp','$pkp','$ppht','$ppht_sebelumnya','$ppht_terutang'";
            $sql1 .= ",'$pphb1_terutang','$pphb2_terutang','$pph_sistem','$pph_koreksi','$pphb_terutang','$tgl_proses','$petugas')";            
            //$perintah92 = $perintah92."insert into pph21masa values('','PCN','$no_urut','$kelompok','$kd_region','$kd_cabang','$kd_unit','$no_spk','$nip','$status','$npwp','$tahun','$blth','$blthnip','$blth_awal','$blth_akhir','$masa_kerja'";
            //$perintah92 = $perintah92.",'$gaji','$tunjangan_pph','$tunjangan_variable','$honorarium','$benefit','$natuna','$bonus_thr','$brutob','$biaya_jabatanb','$iuran_pensiunb'";
            //$perintah92 = $perintah92.",'$brutot','$biaya_jabatant','$iuran_pensiunt','$biaya_pengurangt','$nettot','$nettot_sebelumnya','$nettot_akhir','$ptkp','$pkp','$ppht','$ppht_sebelumnya','$ppht_terutang','$ppht_total_terutang','$pphb1_terutang','$pphb2_terutang','$pphb_terutang','$tgl_proses','$petugas','$nip_blth')";
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
            echo json_encode(array('success'=>true));
        } else {
            //echo json_encode(array('errorMsg'=>'Gagal menyimpan data.'));
            echo json_encode(array('errorMsg'=>mysqli_error()));
        }
    } else {
        echo json_encode(array('errorMsg'=>'SPT Masa untuk bulan '.$blth.' sudah pernah diproses.'));
    }
}
?>