<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    function TanggalIndo($date){
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);
        $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;	
        return($result);
    }
    function TanggalIndo4($date){
        $BulanIndo = array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agt", "Sep", "Okt", "Nop", "Des");
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);
        $result = $tgl . "-" . $BulanIndo[(int)$bulan-1] . "-". $tahun;	
        return($result);
    }
    
    function TanggalIndo3($date){
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $result = $BulanIndo[(int)$bulan-1] . " ". $tahun;	
        return($result);
    }
    
    function TanggalIndo2($date){
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);
        $result = $tgl . "-" . $bulan . "-". $tahun;	
        return($result);
    }
    
    include "koneksi.php";
    include "../fungsi.php";
    require('../force_justify.php');
    
    $nip2 = $_REQUEST['nip'];
    $blth2 = $_REQUEST['blth'];
    $blth3 = TanggalIndo3($blth2);

    $pdf = new PDF('P','mm','A4');
    $pdf->SetMargins(10, 15, 10);
    $pdf->AliasNbPages();
    $pdf->SetAutoPageBreak(false);
    $pdf->SetFillColor( 217, 220, 222 );
    
    $rs = mysqli_query($koneksi,"select a.*,b.nama,b.jabatan,b.jenis,b.nama_bank,b.no_rekening,b.nama_rekening from gaji a left join data_pegawai b on a.nip=b.nip where a.blth='$blth2' and a.nip='$nip2'");
    $hasil = mysqli_fetch_array($rs);
    $id = stripslashesx ($hasil['id']);
    $blth = stripslashesx ($hasil['blth']);
    $nip = stripslashesx ($hasil['nip']);
        // $rs2 = mysqli_query($koneksi,"select jabatan from setting_pegawai where nip='$nip2'");
        // $hasil2 = mysqli_fetch_array($rs2);
        // $jabatan = stripslashesx ($hasil2['jabatan']);
    $jabatan = stripslashesx ($hasil['jabatan']);
    $nama = stripslashesx ($hasil['nama']);
    $npwp = stripslashesx ($hasil['npwp']);
    $kpp = stripslashesx ($hasil['kpp']);
    $jenis = stripslashesx ($hasil['jenis']);
    $gaji_dasar = floatval(stripslashesx ($hasil['gaji_dasar']));
    $honorarium = floatval(stripslashesx ($hasil['honorarium']));
    $honorer = floatval(stripslashesx ($hasil['honorer']));
    $tarif_grade = floatval(stripslashesx ($hasil['tarif_grade']));
    $tunjangan_posisi = floatval(stripslashesx ($hasil['tunjangan_posisi']));
    $p21b = floatval(stripslashesx ($hasil['p21b']));
    $tunjangan_kemahalan = floatval(stripslashesx ($hasil['tunjangan_kemahalan']));
    $tunjangan_perumahan = floatval(stripslashesx ($hasil['tunjangan_perumahan']));
    $tunjangan_transportasi = floatval(stripslashesx ($hasil['tunjangan_transportasi']));
    $bantuan_pulsa = floatval(stripslashesx ($hasil['bantuan_pulsa']));
    $dplk_persero = floatval(stripslashesx ($hasil['dplk_persero']));
    $dplk_simponi_pr = floatval(stripslashesx ($hasil['dplk_simponi_pr']));
    $lembur = floatval(stripslashesx ($hasil['lembur']));
    $nama_tunjangan1 = stripslashesx ($hasil['nama_tunjangan1']);
    $tunjangan1 = floatval(stripslashesx ($hasil['tunjangan1']));
    $nama_tunjangan2 = stripslashesx ($hasil['nama_tunjangan2']);
    $tunjangan2 = floatval(stripslashesx ($hasil['tunjangan2']));
    $nama_tunjangan3 = stripslashesx ($hasil['nama_tunjangan3']);
    $tunjangan3 = floatval(stripslashesx ($hasil['tunjangan3']));
    $nama_tunjangan4 = stripslashesx ($hasil['nama_tunjangan4']);
    $tunjangan4 = floatval(stripslashesx ($hasil['tunjangan4']));
    $bpjs_tk_pp = floatval(stripslashesx ($hasil['bpjs_tk_pp']));
    $bpjs_tk_kp = floatval(stripslashesx ($hasil['bpjs_tk_kp']));
    $bpjs_tk_kkp = floatval(stripslashesx ($hasil['bpjs_tk_kkp']));
    $bpjs_tk_htp = floatval(stripslashesx ($hasil['bpjs_tk_htp']));
    $bpjs_tk_jhtk = floatval(stripslashesx ($hasil['bpjs_tk_jhtk']));
    $bpjs_tk_pk = floatval(stripslashesx ($hasil['bpjs_tk_pk']));
    $bpjs_kes_pp = floatval(stripslashesx ($hasil['bpjs_kes_pp']));
    $bpjs_kes_pk = floatval(stripslashesx ($hasil['bpjs_kes_pk']));
    $total_pendapatan = floatval(stripslashesx ($hasil['total_pendapatan']));
    $bpjs_pr = floatval(stripslashesx ($hasil['bpjs_pr']));
    $benefit = floatval(stripslashesx ($hasil['benefit']));        
    $pendapatan_benefit = floatval(stripslashesx ($hasil['pendapatan_benefit']));        
    $pot_koperasi = floatval(stripslashesx ($hasil['pot_koperasi']));        
    $pot_bazis = floatval(stripslashesx ($hasil['pot_bazis']));        
    $dplk_simponi = floatval(stripslashesx ($hasil['dplk_simponi']));        
    $pot_dplk_pribadi = floatval(stripslashesx ($hasil['pot_dplk_pribadi']));        
    $cop_kendaraan = floatval(stripslashesx ($hasil['cop_kendaraan']));
    $iuran_peserta = floatval(stripslashesx ($hasil['iuran_peserta']));
    $brpr = floatval(stripslashesx ($hasil['brpr']));
    $sewa_mess = floatval(stripslashesx ($hasil['sewa_mess']));
    $qurban = floatval(stripslashesx ($hasil['qurban']));
    $arisan = floatval(stripslashesx ($hasil['arisan']));
    $nama_potongan1 = stripslashesx ($hasil['nama_potongan1']);
    $potongan1 = floatval(stripslashesx ($hasil['potongan1']));
    $nama_potongan2 = stripslashesx ($hasil['nama_potongan2']);
    $potongan2 = floatval(stripslashesx ($hasil['potongan2']));
    $nama_potongan3 = stripslashesx ($hasil['nama_potongan3']);
    $potongan3 = floatval(stripslashesx ($hasil['potongan3']));
    $nama_potongan4 = stripslashesx ($hasil['nama_potongan4']);
    $potongan4 = floatval(stripslashesx ($hasil['potongan4']));
    $total_potongan = floatval(stripslashesx ($hasil['total_potongan']));
    $pph21 = floatval(stripslashesx ($hasil['pph21']));
    $upah_bersih = floatval(stripslashesx ($hasil['upah_bersih']));
    $bank_payroll = stripslashesx ($hasil['nama_bank']);
    $no_rek_payroll = stripslashesx ($hasil['no_rekening']);
    $an_payroll = stripslashesx ($hasil['nama_rekening']);

    $pdf->AddPage();

    $pdf->SetFont('Arial','',8);
    $pdf->Image('../images/plnndwarna.png',10,10,25,0);
    
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(0,6,"",'','C',0);
    
    $pdf->SetFont('Arial','BU',12);
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(0,6,"SLIP GAJI ".strtoupper($blth3),'','C',0);
    
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(0,6,"",'','C',0);

    $pdf->SetFont('Arial','',9);
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(25,5,"Nomor Induk",'','L',0);
    $pdf->SetXY(35,$y);
    $pdf->MultiCell(5,5,":",'','C',0);
    $pdf->SetXY(40,$y);
    $pdf->MultiCell(60,5,$nip,'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(20,5,"Nama",'','L',0);
    $pdf->SetXY(120,$y);
    $pdf->MultiCell(5,5,":",'','C',0);
    $pdf->SetXY(125,$y);
    $pdf->MultiCell(0,5,$nama,'','L',0);
    $h = $y;

    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(25,5,"Jabatan",'','L',0);
    $pdf->SetXY(35,$y);
    $pdf->MultiCell(5,5,":",'','C',0);
    $pdf->SetXY(40,$y);
    $pdf->MultiCell(0,5,$jabatan,'','L',0);

    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(0,4,"",'','C',0);

    $pdf->SetFont('Arial','',10);
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(90,6,"PENDAPATAN",'','C',1);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(10,6,"",'','C',0);
    $pdf->SetXY(110,$y);
    $pdf->MultiCell(0,6,"POTONGAN",'','C',1);
    
    $batas= $pdf->GetY();
    if($honorarium>0){
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(60,6,"Honorarium",'','L',0);
        $pdf->SetXY(70,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(75,$y);
        $pdf->MultiCell(25,6,number_format($honorarium,0,',','.'),'','R',0);
    }    
    if($honorer>0){
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(60,6,"Honorer",'','L',0);    
        $pdf->SetXY(70,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(75,$y);
        $pdf->MultiCell(25,6,number_format($honorer,0,',','.'),'','R',0);
    }
    if($tarif_grade>0){
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(60,6,"Tarif Grade (P1)",'','L',0);    
        $pdf->SetXY(70,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(75,$y);
        $pdf->MultiCell(25,6,number_format($tarif_grade,0,',','.'),'','R',0);
    }
    if($tunjangan_posisi>0){
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(60,6,"P2-1A",'','L',0);    
        $pdf->SetXY(70,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(75,$y);
        $pdf->MultiCell(25,6,number_format($tunjangan_posisi,0,',','.'),'','R',0);
    }
    if($p21b>0){
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(60,6,"P2-1B",'','L',0);    
        $pdf->SetXY(70,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(75,$y);
        $pdf->MultiCell(25,6,number_format($p21b,0,',','.'),'','R',0);
    }
    if($tunjangan_kemahalan>0){
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(60,6,"Tunjangan Lokasi",'','L',0);    
        $pdf->SetXY(70,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(75,$y);
        $pdf->MultiCell(25,6,number_format($tunjangan_kemahalan,0,',','.'),'','R',0);
    }
    if($tunjangan_perumahan>0){
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(60,6,"Tunjangan Perumahan",'','L',0);    
        $pdf->SetXY(70,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(75,$y);
        $pdf->MultiCell(25,6,number_format($tunjangan_perumahan,0,',','.'),'','R',0);
    }
    if($tunjangan_transportasi>0){
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(60,6,"Tunjangan Transportasi",'','L',0);    
        $pdf->SetXY(70,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(75,$y);
        $pdf->MultiCell(25,6,number_format($tunjangan_transportasi,0,',','.'),'','R',0);
    }
    if($bantuan_pulsa>0){
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(60,6,"Bantuan Pulsa",'','L',0);    
        $pdf->SetXY(70,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(75,$y);
        $pdf->MultiCell(25,6,number_format($bantuan_pulsa,0,',','.'),'','R',0);
    }
    if($tunjangan1>0){
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(60,6,$nama_tunjangan1,'','L',0);    
        $pdf->SetXY(70,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(75,$y);
        $pdf->MultiCell(25,6,number_format($tunjangan1,0,',','.'),'','R',0);
    }
    if($tunjangan2>0){
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(60,6,$nama_tunjangan2,'','L',0);    
        $pdf->SetXY(70,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(75,$y);
        $pdf->MultiCell(25,6,number_format($tunjangan2,0,',','.'),'','R',0);
    }
    if($tunjangan3>0){
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(60,6,$nama_tunjangan3,'','L',0);    
        $pdf->SetXY(70,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(75,$y);
        $pdf->MultiCell(25,6,number_format($tunjangan3,0,',','.'),'','R',0);
    }
    if($tunjangan4>0){
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(60,6,$nama_tunjangan4,'','L',0);    
        $pdf->SetXY(70,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(75,$y);
        $pdf->MultiCell(25,6,number_format($tunjangan4,0,',','.'),'','R',0);
    }
    $batas_akhir1= $pdf->GetY();

    $y = $batas;
    if($bpjs_tk_pk>0){
        //$y= $pdf->GetY();
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(60,6,"BPJS Jaminan Pensiun",'','L',0);
        $pdf->SetXY(170,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(175,$y);
        $pdf->MultiCell(25,6,number_format($bpjs_tk_pk,0,',','.'),'','R',0);
    }    
    if($bpjs_tk_jhtk>0){
        $y= $pdf->GetY();
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(60,6,"BPJS Jaminan Hari Tua",'','L',0);
        $pdf->SetXY(170,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(175,$y);
        $pdf->MultiCell(25,6,number_format($bpjs_tk_jhtk,0,',','.'),'','R',0);
    }    
    if($bpjs_kes_pk>0){
        $y= $pdf->GetY();
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(60,6,"BPJS Kesehatan",'','L',0);
        $pdf->SetXY(170,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(175,$y);
        $pdf->MultiCell(25,6,number_format($bpjs_kes_pk,0,',','.'),'','R',0);
    }    
    if($pot_koperasi>0){
        $y= $pdf->GetY();
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(60,6,"Potongan Koperasi",'','L',0);
        $pdf->SetXY(170,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(175,$y);
        $pdf->MultiCell(25,6,number_format($pot_koperasi,0,',','.'),'','R',0);
    }    
    if($pot_bazis>0){
        $y= $pdf->GetY();
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(60,6,"Potongan Bazis",'','L',0);
        $pdf->SetXY(170,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(175,$y);
        $pdf->MultiCell(25,6,number_format($pot_bazis,0,',','.'),'','R',0);
    }    
    if($dplk_simponi>0){
        $y= $pdf->GetY();
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(60,6,"DPLK",'','L',0);
        $pdf->SetXY(170,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(175,$y);
        $pdf->MultiCell(25,6,number_format($dplk_simponi,0,',','.'),'','R',0);
    }    
    if($pot_dplk_pribadi>0){
        $y= $pdf->GetY();
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(60,6,"DPLK Pribadi",'','L',0);
        $pdf->SetXY(170,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(175,$y);
        $pdf->MultiCell(25,6,number_format($pot_dplk_pribadi,0,',','.'),'','R',0);
    }    
    if($cop_kendaraan>0){
        $y= $pdf->GetY();
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(60,6,"COP kendaraan",'','L',0);
        $pdf->SetXY(170,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(175,$y);
        $pdf->MultiCell(25,6,number_format($cop_kendaraan,0,',','.'),'','R',0);
    }    
    if($iuran_peserta>0){
        $y= $pdf->GetY();
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(60,6,"Iuran Peserta",'','L',0);
        $pdf->SetXY(170,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(175,$y);
        $pdf->MultiCell(25,6,number_format($iuran_peserta,0,',','.'),'','R',0);
    }    
    if($brpr>0){
        $y= $pdf->GetY();
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(60,6,"BPRP",'','L',0);
        $pdf->SetXY(170,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(175,$y);
        $pdf->MultiCell(25,6,number_format($brpr,0,',','.'),'','R',0);
    }    
    if($sewa_mess>0){
        $y= $pdf->GetY();
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(60,6,"Sewa Mess",'','L',0);
        $pdf->SetXY(170,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(175,$y);
        $pdf->MultiCell(25,6,number_format($sewa_mess,0,',','.'),'','R',0);
    }    
    if($qurban>0){
        $y= $pdf->GetY();
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(60,6,"Qurban",'','L',0);
        $pdf->SetXY(170,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(175,$y);
        $pdf->MultiCell(25,6,number_format($qurban,0,',','.'),'','R',0);
    }    
    if($arisan>0){
        $y= $pdf->GetY();
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(60,6,"Arisan",'','L',0);
        $pdf->SetXY(170,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(175,$y);
        $pdf->MultiCell(25,6,number_format($arisan,0,',','.'),'','R',0);
    }    
    if($potongan1>0){
        $y= $pdf->GetY();
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(60,6,$nama_potongan1,'','L',0);
        $pdf->SetXY(170,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(175,$y);
        $pdf->MultiCell(25,6,number_format($potongan1,0,',','.'),'','R',0);
    }    
    if($potongan2>0){
        $y= $pdf->GetY();
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(60,6,$nama_potongan2,'','L',0);
        $pdf->SetXY(170,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(175,$y);
        $pdf->MultiCell(25,6,number_format($potongan2,0,',','.'),'','R',0);
    }    
    if($potongan3>0){
        $y= $pdf->GetY();
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(60,6,$nama_potongan3,'','L',0);
        $pdf->SetXY(170,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(175,$y);
        $pdf->MultiCell(25,6,number_format($potongan3,0,',','.'),'','R',0);
    }    
    if($potongan4>0){
        $y= $pdf->GetY();
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(60,6,$nama_potongan4,'','L',0);
        $pdf->SetXY(170,$y);
        $pdf->MultiCell(5,6,":",'','L',0);
        $pdf->SetXY(175,$y);
        $pdf->MultiCell(25,6,number_format($potongan4,0,',','.'),'','R',0);
    }    
    $batas_akhir2= $pdf->GetY();

    $batas_akhir = max($batas_akhir1,$batas_akhir2);
    $y= $batas_akhir;
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(60,6,"Total Pendapatan",'','L',1);    
    $pdf->SetXY(70,$y);
    $pdf->MultiCell(5,6,":",'','L',1);
    $pdf->SetXY(75,$y);
    $pdf->MultiCell(25,6,number_format($total_pendapatan,0,',','.'),'','R',1);

    $pdf->SetXY(110,$y);
    $pdf->MultiCell(60,6,"Total Potongan",'','L',1);
    $pdf->SetXY(170,$y);
    $pdf->MultiCell(5,6,":",'','L',1);
    $pdf->SetXY(175,$y);
    $pdf->MultiCell(25,6,number_format($total_potongan,0,',','.'),'','R',1);

    $pdf->SetFont('Arial','B',10);
    $y= $pdf->GetY();
    $pdf->SetXY(110,$y);
    $pdf->MultiCell(60,6,"Dibayarkan",'','L',0);
    $pdf->SetXY(170,$y);
    $pdf->MultiCell(5,6,":",'','L',0);
    $pdf->SetXY(175,$y);
    $pdf->MultiCell(25,6,number_format($upah_bersih,0,',','.'),'','R',0);

    $pdf->Output();
}
?>
