<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    ini_set('date.timezone', 'Asia/Jakarta');
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";
    $hari_ini = date("Y-m-d H:i:s");
    $jam_ini = date("H:i:s");    
    
    // $blth = $_REQUEST['blthbebanpph'];
    // $kpp2 = $_REQUEST['kppbebanpph'];
    // $nip2 = $_REQUEST['nipbebanpph'];    
    $blth = "2024-03";
    $kpp2 = "SEMUA";
    $nip2 = "8510210Z";

    $tahunnya = substr($blth,0,4);
    $tahun = substr($blth,0,4);
    if($nip2!=""){
        $aktivitas = "Proses Beban PPh untuk blth : $blth, nip : $nip2";
    } else {
        $aktivitas = "Proses Beban PPh untuk blth : $blth";
    }

    $perintah = "";
    if($kpp2!="SEMUA"){
        $perintah .= " and kpp='$kpp2'";
    }
    if($nip2!=""){
        $perintah .= " and nip='$nip2'";
    }

    $rs99 = mysqli_query($koneksi,"select no_urut from beban_pph21 where blth='$blth' order by (no_urut*1) desc limit 1");
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

    $rs9 = mysqli_query($koneksi,"select count(*) as jumlahspt from beban_pph21 where blth='$blth'".$perintah);
    $hasil9 = mysqli_fetch_array($rs9);
    if($hasil9){
        $jumlahspt = intval(stripslashesx ($hasil9['jumlahspt']));
    } else {
        $jumlahspt = 0;
    }
    
    $pesan = "";
    // if($jumlahspt==0){
        $sukses=0;
        $rs4 = mysqli_query($koneksi,"SELECT * from v_list_pajak where nip<>'' and blth='$blth'".$perintah." group by nip");
        while($hasil4 = mysqli_fetch_array($rs4)){
            $nip2 = $hasil4['nip'];            
        
            $rs14 = mysqli_query($koneksi,"SELECT nip from gaji where blth='$blth' and nip='$nip2'");
            $hasil14 = mysqli_fetch_array($rs14);
            if($hasil14){
                $data_gaji = 1;
            } else {
                $data_gaji = 0;
            }
            
        
            // $rs52 = mysqli_query($koneksi,"SELECT blth from gaji where nip='$nip2' and blth>='$tahun-01' and blth<='$blth' group by blth order by blth desc limit 1");
            // $hasil52 = mysqli_fetch_array($rs52);
            // if($hasil52){
            //     $blth_gaji = $hasil52['blth'];
            // } else {
            //     $blth_gaji = $blth;
            // }
            $no_urut = str_pad($urut2,8,"0",STR_PAD_LEFT);
            // $pesan .= $nip2." ".$data_gaji."<br/>";
            $rs3 = mysqli_query($koneksi,"SELECT * from data_pegawai where nip='$nip2'");
            $hasil3 = mysqli_fetch_array($rs3);
            $nip = $hasil3['nip'];
            $niplama = $hasil3['niplama'];
            $tgl_masuk = $hasil3['tgl_masuk'];
            $kpp = $hasil3['kpp'];
            $npwp1 = $hasil3['npwp'];
            $npwp = str_replace(" ","",$npwp1);
            $npwp = str_replace("-","",$npwp);
            $npwp = str_replace(".","",$npwp);
            $npwp = str_replace(",","",$npwp);
            $npwp = str_replace("'","",$npwp);
            $npwp2 = $npwp;
            
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

    
            //$benefit = $bpjs_tk_pp+$bpjs_tk_kp+$bpjs_tk_kkp+$bpjs_tk_htp+$bpjs_kes_pp+$dplk_simponi_pr;
            $benefit = $bpjs_kes_pp+$bpjs_tk_pp+$bpjs_tk_kp+$bpjs_tk_kkp+$bpjs_tk_htp+$dplk_simponi_pr;
            //$benefit2 = $bpjs_kes_pp+$bpjs_tk_kp+$bpjs_tk_kkp;
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
                
            $tantiem = 0;
            
            $rs3 = mysqli_query($koneksi,"SELECT sum(a.total) as sppd from biaya_sppd1 a inner join sppd1 b on a.idsppd=b.idsppd where b.nip='$nip' and substr(b.tgl_bayar,1,7)='$blth'");
            $hasil3 = mysqli_fetch_array($rs3);
            if($hasil3){
                $sppd = floatval($hasil3['sppd']);
            } else {
                $sppd = 0;
            }
            
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
            $tunjangan_variable = $tunjangan_posisi+$p21b+$tunjangan_kemahalan+$tunjangan_transportasi+$tunjangan_perumahan+$bantuan_pulsa+$tunjangan_kompetensi+$tunjangan1+$tunjangan2+$tunjangan3+$tunjangan4+$lembur;
            //$natuna = 0;
    
            //$bonus_thr = $uang_cuti+$iks+$bonus+$honorarium_eo+$thr+$uang_winduan+$uang_suplisi;      
            $bonus_thr = $uang_cuti+$iks+$bonus+$honorarium_eo+$thr+$uang_winduan+$tantiem;
            $tunjangan_pph = 0;
            $brutob = $gaji+$tunjangan_variable+$honorarium+$benefit2+$natuna;
            $biaya_jabatanb = 0;
            $iuran_pensiunb = 0;
    
            $brutot = round($gaji+$tunjangan_variable+$honorarium+$benefit2+$natuna);
            $brutot_total = $brutot+$bonus_thr;
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

            $ppht_terutang = 0;
            $pph_sistem = 0;
            $pph_koreksi = 0;
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
            // $pphb1_terutang = ceil(($brutot*$tarif)/100);
            $pphb2_terutang = 0;
            $pphb_terutang = $pphb1_terutang;
      
            $tgl_proses = date("Y-m-d");
            $petugas = $userhris;
            $pesan .= $nip." ".$pphb1_terutang."<br/>";  
            
            // $sql1 = "insert into beban_pph21(kpp,npwp,no_urut,nip,status,tahun,blth,blthnip,blth_awal,blth_akhir,masa_kerja,gaji,tunjangan_pph";
            // $sql1 .= ",tunjangan_variable,honorarium,benefit,natuna,beban_pph21,bonus_thr,brutob,biaya_jabatanb,iuran_pensiunb,brutot";
            // $sql1 .= ",biaya_jabatant,iuran_pensiunt,biaya_pengurangt,nettot,brutot_total,biaya_jabatant_total,iuran_pensiunt_total";
            // $sql1 .= ",biaya_pengurangt_total,nettot_total,nettot_sebelumnya,nettot_akhir,ptkp,pkp,ppht,ppht_sebelumnya,ppht_terutang";
            // $sql1 .= ",pphb1_terutang,pphb2_terutang,pph_sistem,pph_koreksi,pphb_terutang,tgl_proses,petugas)";
            // $sql1 .= " values('$kpp','$npwp','$no_urut','$nip','$status','$tahun','$blth','$blthnip','$blth_awal','$blth_akhir','$masa_kerja','$gaji','$tunjangan_pph'";
            // $sql1 .= ",'$tunjangan_variable','$honorarium','$benefit','$natuna','$pphb_terutang','$bonus_thr','$brutob','$biaya_jabatanb','$iuran_pensiunb','$brutot'";
            // $sql1 .= ",'$biaya_jabatant','$iuran_pensiunt','$biaya_pengurangt','$nettot','$brutot_total','$biaya_jabatant_total','$iuran_pensiunt_total'";
            // $sql1 .= ",'$biaya_pengurangt_total','$nettot_total','$nettot_sebelumnya','$nettot_akhir','$ptkp','$pkp','$ppht','$ppht_sebelumnya','$ppht_terutang'";
            // $sql1 .= ",'$pphb1_terutang','$pphb2_terutang','$pph_sistem','$pph_koreksi','$pphb_terutang','$tgl_proses','$petugas')";            
            // $result1 = @mysqli_query($koneksi,$sql1);
            // if ($result1){                
            //     $sukses = $sukses+1;
            // } else {
            //     $sukses = $sukses;
            //     // $pesan .= "Nip ".$nip." gagal".mysqli_error($koneksi)."<br/>";
            //     // $pesan .= "Nip ".$nip." gagal".mysqli_error($koneksi)."<br/>";
            // }  
            // $urut2 = $urut2+1;
        }
        // if($sukses>0){
        //     $kode = $hari_ini."-".$userhris."-".$aktivitas;
        //     $sql5 = "insert into log_aktivitas(tanggal,user,nama,aktivitas,kode) values('$hari_ini','$userhris','$nama_petugas','$aktivitas','$kode')";
        //     $result5 = @mysqli_query($koneksi,$sql5);
        //     echo json_encode(array('success'=>true));
        // } else {
        //     //echo json_encode(array('errorMsg'=>'Gagal menyimpan data.'));
        //     echo json_encode(array('errorMsg'=>mysqli_error()));
        // }
    // } else {
    //     // echo json_encode(array('errorMsg'=>'Beban PPh untuk bulan '.$blth.' sudah pernah diproses.'));
    // }
    echo $pesan;
}
?>