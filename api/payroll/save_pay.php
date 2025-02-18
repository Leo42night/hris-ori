<?php
session_start();
$userhris = $_SESSION["userakseshris"];
ini_set('date.timezone', 'Asia/Jakarta');
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/stringvalidasi.php";
    $kunci = "cipher.hris@s7o";
    $hari_ini = date("Y-m-d");
    $jam_ini = date("H:i:s");
    
    $blth = $_REQUEST['blth'];
    // $blth = "2024-01";

    $rs9 = mysqli_query($koneksi,"select count(*) as jumlahgaji from gaji where blth='$blth'");
    $hasil9 = mysqli_fetch_array($rs9);
    if($hasil9){
        $jumlahgaji = intval(stripslashesx ($hasil9['jumlahgaji']));
    } else {
        $jumlahgaji = 0;
    }
    
    if($jumlahgaji==0){
        $sukses=0;
        $gagal=0;
        $rs2 = mysqli_query($koneksi,"select a.*,b.nama_bank,b.no_rekening,b.nama_rekening from master_gaji a inner join data_pegawai b on a.nip=b.nip and b.aktif='1'");
        while ($hasil2 = mysqli_fetch_array($rs2)) {
        	$nip = stripslashesx ($hasil2['nip']);
            $nipblth = $blth.".".$nip;
        	$bank_payroll = stripslashesx ($hasil2['nama_bank']);
        	$no_rek_payroll = stripslashesx ($hasil2['no_rekening']);
        	$an_payroll = stripslashesx ($hasil2['nama_bank']);
            $gaji_dasar = stripslashesx($hasil2['gaji_dasar']);
            $honorarium = stripslashesx($hasil2['honorarium']);
            $honorer = stripslashesx($hasil2['honorer']);
            $tarif_grade = stripslashesx($hasil2['tarif_grade']);
            $tunjangan_posisi = stripslashesx($hasil2['tunjangan_posisi']);
            $p21b = stripslashesx($hasil2['p21b']);
            $tunjangan_kemahalan = stripslashesx($hasil2['tunjangan_kemahalan']);
            $tunjangan_perumahan = stripslashesx($hasil2['tunjangan_perumahan']);
            $tunjangan_transportasi = stripslashesx($hasil2['tunjangan_transportasi']);
            $bantuan_pulsa = stripslashesx($hasil2['bantuan_pulsa']);
            $tunjangan_kompetensi = stripslashesx($hasil2['tunjangan_kompetensi']);
            $dplk_persero = stripslashesx($hasil2['dplk_persero']);
            $dplk_simponi_pr = stripslashesx($hasil2['dplk_simponi_pr']);
            $nama_tunjangan1 = stripslashesx($hasil2['nama_tunjangan1']);
            $tunjangan1 = stripslashesx($hasil2['tunjangan1']);
            $nama_tunjangan2 = stripslashesx($hasil2['nama_tunjangan2']);
            $tunjangan2 = stripslashesx($hasil2['tunjangan2']);
            $nama_tunjangan3 = stripslashesx($hasil2['nama_tunjangan3']);
            $tunjangan3 = stripslashesx($hasil2['tunjangan3']);
            $nama_tunjangan4 = stripslashesx($hasil2['nama_tunjangan4']);
            $tunjangan4 = stripslashesx($hasil2['tunjangan4']);
            $bpjs_tk_pp = stripslashesx($hasil2['bpjs_tk_pp']);
            $bpjs_tk_kp = stripslashesx($hasil2['bpjs_tk_kp']);
            $bpjs_tk_kkp = stripslashesx($hasil2['bpjs_tk_kkp']);
            $bpjs_tk_htp = stripslashesx($hasil2['bpjs_tk_htp']);
            $bpjs_tk_jhtk = stripslashesx($hasil2['bpjs_tk_jhtk']);
            $bpjs_tk_pk = stripslashesx($hasil2['bpjs_tk_pk']);
            $bpjs_kes_pp = stripslashesx($hasil2['bpjs_kes_pp']);
            $bpjs_kes_pk = stripslashesx($hasil2['bpjs_kes_pk']);
            $rp_bpjs_tk_pp = stripslashesx($hasil2['rp_bpjs_tk_pp']);
            $rp_bpjs_tk_kp = stripslashesx($hasil2['rp_bpjs_tk_kp']);
            $rp_bpjs_tk_kkp = stripslashesx($hasil2['rp_bpjs_tk_kkp']);
            $rp_bpjs_tk_htp = stripslashesx($hasil2['rp_bpjs_tk_htp']);
            $rp_bpjs_tk_jhtk = stripslashesx($hasil2['rp_bpjs_tk_jhtk']);
            $rp_bpjs_tk_pk = stripslashesx($hasil2['rp_bpjs_tk_pk']);
            $pot_koperasi = stripslashesx($hasil2['pot_koperasi']);
            $pot_bazis2 = floatval($hasil2['pot_bazis']);
            $dplk_simponi = stripslashesx($hasil2['dplk_simponi']);
            $pot_dplk_pribadi = stripslashesx($hasil2['pot_dplk_pribadi']);
            $cop_kendaraan = stripslashesx($hasil2['cop_kendaraan']);
            $iuran_peserta = stripslashesx($hasil2['iuran_peserta']);
            $brpr = stripslashesx($hasil2['brpr']);
            $sewa_mess = stripslashesx($hasil2['sewa_mess']);
            $qurban = stripslashesx($hasil2['qurban']);
            $arisan = stripslashesx($hasil2['arisan']);
            $nama_potongan1 = stripslashesx($hasil2['nama_potongan1']);
            $potongan1 = stripslashesx($hasil2['potongan1']);
            $nama_potongan2 = stripslashesx($hasil2['nama_potongan2']);
            $potongan2 = stripslashesx($hasil2['potongan2']);
            $nama_potongan3 = stripslashesx($hasil2['nama_potongan3']);
            $potongan3 = stripslashesx($hasil2['potongan3']);
            $nama_potongan4 = stripslashesx($hasil2['nama_potongan4']);
            $potongan4 = stripslashesx($hasil2['potongan4']);
            $thp = $tarif_grade+$honorarium+$honorer;
            if($thp>12000000){
              $thp2 = 12000000;
            } else {
              $thp2 = $thp;
            }

            $rs3 = mysqli_query($koneksi,"select * from data_pegawai where nip='$nip'");
            $hasil3 = mysqli_fetch_array($rs3);
            if($hasil3){
                $npwp2 = stripslashesx ($hasil3['npwp']);
                $kpp = stripslashesx ($hasil3['kpp']);
                $jenis = stripslashesx ($hasil3['jenis']);
                $no_bpjs_tk = stripslashesx ($hasil3['no_bpjs_tk']);
                $no_bpjs_kes = stripslashesx ($hasil3['no_bpjs_kes']);
                $no_rekeningdplk = stripslashesx ($hasil3['no_rekeningdplk']);
            } else {
                $npwp2 = "";
                $kpp = "";
                $jenis = "";
                $no_bpjs_tk = "";
                $no_bpjs_tk = "";
                $no_rekeningdplk = "";
            }
            $npwp1 = $npwp2;
            if($npwp2!="" && strlen($npwp2)>20){
                $npwp2 = decryptText($npwp2, $kunci);
            }    
            if($npwp2==""){
                $npwp = "000000000000000";
            } else {
                $npwp3 = str_replace(",","",$npwp2);
                $npwp3 = str_replace(".","",$npwp3);
                $npwp3 = str_replace(" ","",$npwp3);
                $npwp3 = trim(substr($npwp3,0,15));
                $npwp = str_pad($npwp3,15,"0",STR_PAD_LEFT);
            }

            if($no_bpjs_tk!=""){
                if(floatval($bpjs_tk_pp)>0){
                    $bpjs_tk_pp = round((($bpjs_tk_pp)*$thp2)/100,0);
                } else {
                    $bpjs_tk_pp = 0;
                }
                if(floatval($bpjs_tk_kp)>0){
                    $bpjs_tk_kp = round((($bpjs_tk_kp)*$thp2)/100,0);
                } else {
                    $bpjs_tk_kp = 0;
                }
                if(floatval($bpjs_tk_kkp)>0){
                    $bpjs_tk_kkp = round((($bpjs_tk_kkp)*$thp2)/100,0);
                } else {
                    $bpjs_tk_kkp = 0;
                }
                if(floatval($bpjs_tk_htp)>0){
                    $bpjs_tk_htp = round((($bpjs_tk_htp)*$thp2)/100,0);
                } else {
                    $bpjs_tk_htp = 0;
                }
                if(floatval($bpjs_tk_jhtk)>0){
                    $bpjs_tk_jhtk = round((($bpjs_tk_jhtk)*$thp2)/100,0);
                } else {
                    $bpjs_tk_jhtk = 0;
                }
                if(floatval($bpjs_tk_pk)>0){
                    $bpjs_tk_pk = round((($bpjs_tk_pk)*$thp2)/100,0);
                } else {
                    $bpjs_tk_pk = 0;
                }
            } else {
                $bpjs_tk_pp = 0;
                $bpjs_tk_kp = 0;
                $bpjs_tk_kkp = 0;
                $bpjs_tk_htp = 0;
                $bpjs_tk_jhtk = 0;
                $bpjs_tk_pk = 0;
            }
            if(floatval($rp_bpjs_tk_pp)>0){
                $bpjs_tk_pp = $rp_bpjs_tk_pp;
            }

            if(floatval($rp_bpjs_tk_kp)>0){
                $bpjs_tk_kp = $rp_bpjs_tk_kp;
            }

            if(floatval($rp_bpjs_tk_kkp)>0){
                $bpjs_tk_kkp = $rp_bpjs_tk_kkp;
            }

            if(floatval($rp_bpjs_tk_htp)>0){
                $bpjs_tk_htp = $rp_bpjs_tk_htp;
            }

            if(floatval($rp_bpjs_tk_jhtk)>0){
                $bpjs_tk_jhtk = $rp_bpjs_tk_jhtk;
            }

            if(floatval($rp_bpjs_tk_pk)>0){
                $bpjs_tk_pk = $rp_bpjs_tk_pk;
            }
      
            if($no_bpjs_kes!=""){
                if(floatval($bpjs_kes_pp)>0){
                    $bpjs_kes_pp = round((($bpjs_kes_pp)*$thp2)/100,0);
                } else {
                    $bpjs_kes_pp = 0;
                }
                if(floatval($bpjs_kes_pk)>0){
                    $bpjs_kes_pk = round((($bpjs_kes_pk)*$thp2)/100,0);
                } else {
                    $bpjs_kes_pk = 0;
                }
            } else {
                $bpjs_kes_pp = 0;
                $bpjs_kes_pk = 0;      
            }
            if($no_rekeningdplk!=""){
                if(floatval($dplk_simponi_pr)>0){
                    // $dplk_simponi_pr = round(($dplk_simponi_pr*$thp2)/100,0);
                    $dplk_simponi_pr = round(($dplk_simponi_pr*$thp)/100,0);
                } else {
                    $dplk_simponi_pr = 0;
                }
                if(floatval($dplk_simponi)>0){
                    // $dplk_simponi = round(($dplk_simponi*$thp2)/100,0);
                    $dplk_simponi = round(($dplk_simponi*$thp)/100,0);
                } else {
                    $dplk_simponi = 0;
                }
            } else {
                $dplk_simponi_pr = 0;
                $dplk_simponi = 0;
            }
            $pph21 = 0;
            $bpjs_pr = $bpjs_tk_pp+$bpjs_tk_kp+$bpjs_tk_kkp+$bpjs_tk_htp+$bpjs_kes_pp;
            $total_pendapatan = $honorarium+$honorer+$tarif_grade+$tunjangan_posisi+$p21b+$tunjangan_kemahalan+$tunjangan_perumahan+$tunjangan_transportasi+$bantuan_pulsa+$tunjangan_kompetensi+$tunjangan1+$tunjangan2+$tunjangan3+$tunjangan4;
            $pot_bazis = round(($pot_bazis2*$total_pendapatan)/100,0);
    
            $benefit = $bpjs_tk_pp+$bpjs_tk_kkp+$bpjs_tk_kp+$bpjs_tk_htp+$bpjs_kes_pp+$dplk_persero+$dplk_simponi_pr;
            $pendapatan_benefit = $total_pendapatan+$benefit;            
            $total_potongan = $pot_koperasi+$pot_bazis+$dplk_simponi+$pot_dplk_pribadi+$cop_kendaraan+$iuran_peserta+$brpr+$sewa_mess+$qurban+$arisan+$potongan1+$potongan2+$potongan3+$potongan4+$bpjs_tk_jhtk+$bpjs_tk_pk+$bpjs_kes_pk;
            $upah_bersih = $total_pendapatan-$total_potongan;              

            $sql4 = "insert into gaji(blth,nip,nipblth,npwp,kpp,gaji_dasar,honorarium,honorer,tarif_grade,tunjangan_posisi,p21b,tunjangan_kemahalan,tunjangan_perumahan,";
            $sql4 .= "tunjangan_transportasi,bantuan_pulsa,tunjangan_kompetensi,dplk_simponi_pr,nama_tunjangan1,tunjangan1,nama_tunjangan2,tunjangan2,nama_tunjangan3,tunjangan3,nama_tunjangan4,tunjangan4,";
            $sql4 .= "bpjs_tk_pp,bpjs_tk_kp,bpjs_tk_kkp,bpjs_tk_htp,bpjs_tk_jhtk,bpjs_tk_pk,bpjs_kes_pp,bpjs_kes_pk,total_pendapatan,dplk_persero,dplk_simponi,";
            $sql4 .= "bpjs_pr,benefit,pendapatan_benefit,pot_koperasi,pot_bazis,pot_dplk_pribadi,cop_kendaraan,iuran_peserta,brpr,sewa_mess,qurban,arisan,";
            $sql4 .= "nama_potongan1,potongan1,nama_potongan2,potongan2,nama_potongan3,potongan3,nama_potongan4,potongan4,total_potongan,pph21,upah_bersih)";
            $sql4 .= "values('$blth','$nip','$nipblth','$npwp','$kpp','$gaji_dasar','$honorarium','$honorer','$tarif_grade','$tunjangan_posisi','$p21b','$tunjangan_kemahalan','$tunjangan_perumahan',";
            $sql4 .= "'$tunjangan_transportasi','$bantuan_pulsa','$tunjangan_kompetensi','$dplk_simponi_pr','$nama_tunjangan1','$tunjangan1','$nama_tunjangan2','$tunjangan2','$nama_tunjangan3','$tunjangan3','$nama_tunjangan4','$tunjangan4',";
            $sql4 .= "'$bpjs_tk_pp','$bpjs_tk_kp','$bpjs_tk_kkp','$bpjs_tk_htp','$bpjs_tk_jhtk','$bpjs_tk_pk','$bpjs_kes_pp','$bpjs_kes_pk','$total_pendapatan','$dplk_persero','$dplk_simponi',";
            $sql4 .= "'$bpjs_pr','$benefit','$pendapatan_benefit','$pot_koperasi','$pot_bazis','$pot_dplk_pribadi','$cop_kendaraan','$iuran_peserta','$brpr','$sewa_mess','$qurban','$arisan',";
            $sql4 .= "'$nama_potongan1','$potongan1','$nama_potongan2','$potongan2','$nama_potongan3','$potongan3','$nama_potongan4','$potongan4','$total_potongan','$pph21','$upah_bersih')";
            $result4 = @mysqli_query($koneksi,$sql4);
            if ($result4){
                $sukses = $sukses+1;
            } else {
                $sukses = $sukses;
            }  
        }
        echo json_encode(array('errorMsg'=>'Proses payroll sukses'));
    } else {
        echo json_encode(array('errorMsg'=>'Gaji untuk bulan ini sudah pernah diproses.'));
    }
}
?>