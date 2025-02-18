<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include "koneksi.php";
    include "../fungsi.php";
    include "../stringvalidasi.php";
    $kunci = "cipher.hris@s7o";

    require('../rotation.php');
    class PDF extends PDF_Rotate{
        function RotatedText($x,$y,$txt,$angle){
            //Text rotated around its origin
            $this->Rotate($angle,$x,$y);
            $this->Text($x,$y,$txt);
            $this->Rotate(0);
        }
        
        function RotatedImage($file,$x,$y,$w,$h,$angle){
            //Image rotated around its upper-left corner
            $this->Rotate($angle,$x,$y);
            $this->Image($file,$x,$y,$w,$h);
            $this->Rotate(0);
        }
    }

    function TanggalIndo($date){
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
         
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);
         
        $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;	
        return($result);
    }

    function TanggalIndo2($date){
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);
        $result = $tgl . "/" . $bulan . "/". $tahun;	
        return($result);
    }
    
    function TanggalIndo3($date){
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
         
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);
         
        $result = $BulanIndo[(int)$bulan-1] . " ". $tahun;	
        return($result);
    }
        
    $pdf = new FPDF('p','mm','A4');
    $pdf->SetMargins(10, 7, 10);
    $pdf->AliasNbPages();
    $pdf->SetAutoPageBreak(false);
    $pdf->SetFillColor(183,183,183);

    $hari_ini = date("Y-m-d");
    $hari_ini2 = TanggalIndo($hari_ini);
    /*        
    $rs9 = mysqli_query("select * from setting_pph order by id desc limit 1");
    $hasil9 = mysqli_fetch_array($rs9);
    $npwp_pemotong = stripslashesx ($hasil9['npwp_pemotong']);
    $nama_pemotong = stripslashesx ($hasil9['nama_pemotong']);
    $npwp_pejabat = stripslashesx ($hasil9['npwp_pejabat']);
    $nama_pejabat = stripslashesx ($hasil9['nama_pejabat']);
    $path_ttd = stripslashesx ($hasil9['path_ttd']);
    */
      
    $pdf = new FPDF('p','mm','A4');
    $pdf->SetMargins(10, 7, 10);
    $pdf->AliasNbPages();
    $pdf->SetAutoPageBreak(false);
    $pdf->SetFillColor(183,183,183);

    // $blth2 = $_REQUEST['blth'];
    $ids2 = $_REQUEST['ids2'];        
    $idsnya = explode("|", $ids2);
    //$sukses = 0;
    foreach($idsnya as $idsnya2){     
        $rs2 = mysqli_query($koneksi,"select * from pph21masa where id='$idsnya2'");
        $hasil2 = mysqli_fetch_array($rs2);
        $nip = stripslashesx ($hasil2['nip']);
        $blth = stripslashesx ($hasil2['blth']);
        $no_urut = stripslashesx ($hasil2['no_urut']);
        $tgl_buat = stripslashesx ($hasil2['tgl_proses']);
        $tahun = stripslashesx ($hasil2['tahun']);
        $status = stripslashesx ($hasil2['status']);
        $blth_awal = stripslashesx ($hasil2['blth_awal']);
        $blth_akhir = stripslashesx ($hasil2['blth_akhir']);
        $masa_kerja = stripslashesx ($hasil2['masa_kerja']);
        $gaji = floatval(stripslashesx ($hasil2['gaji']));
        $tunjangan_pph = floatval(stripslashesx ($hasil2['tunjangan_pph']));
        $tunjangan_variable = floatval(stripslashesx ($hasil2['tunjangan_variable']));
        $honorarium = floatval(stripslashesx ($hasil2['honorarium']));
        $benefit = floatval(stripslashesx ($hasil2['benefit']));
        $natuna = floatval(stripslashesx ($hasil2['natuna']));
        $bonus_thr = floatval(stripslashesx ($hasil2['bonus_thr']));
        $brutob = floatval(stripslashesx ($hasil2['brutob']));
        $biaya_jabatanb = floatval(stripslashesx ($hasil2['biaya_jabatanb']));
        $iuran_pensiunb = floatval(stripslashesx ($hasil2['iuran_pensiunb']));
        $brutot = floatval(stripslashesx ($hasil2['brutot']));
        $biaya_jabatant = floatval(stripslashesx ($hasil2['biaya_jabatant']));
        $iuran_pensiunt = floatval(stripslashesx ($hasil2['iuran_pensiunt']));
        $biaya_pengurangt = floatval(stripslashesx ($hasil2['biaya_pengurangt']));
        $pot_zakat = 0;
        $nettot = floatval(stripslashesx ($hasil2['nettot']));
        $nettot_sebelumnya = floatval(stripslashesx ($hasil2['nettot_sebelumnya']));
        $nettot_akhir = floatval(stripslashesx ($hasil2['nettot_akhir']));
        $ptkp = floatval(stripslashesx ($hasil2['ptkp']));
        $pkp = floatval(stripslashesx ($hasil2['pkp']));
        $ppht = floatval(stripslashesx ($hasil2['ppht']));
        $ppht_sebelumnya = floatval(stripslashesx ($hasil2['ppht_sebelumnya']));
        $ppht_dtp = 0;
        $ppht_terutang = floatval(stripslashesx ($hasil2['ppht_terutang']));
        // $pphb_terutang = floatval(stripslashesx ($hasil2['pphb_terutang']));
        $selisih = $ppht-$ppht_sebelumnya;
        if($selisih<0){
            $pphb_terutang = 0;
            $selisih_bayar = "(".number_format(abs($ppht_terutang),0,',','.').")";
        } else {
            $pphb_terutang = $ppht_terutang;
            $selisih_bayar = 0;
        }
        
        $status1 = "";
        $status2 = "";
        if($status!="TK0"){
            $status1 = "X";
            $status2 = "";
            $tanggungan = intval(substr($status,-1));
        } else {
            $status1 = "";
            $status2 = "X";
            $tanggungan = "";
        }

        $rs1 = mysqli_query($koneksi,"select * from data_pegawai where nip='$nip'");
        $hasil1 = mysqli_fetch_array($rs1);
        $nama = stripslashesx ($hasil1['nama']);    
        $kpp = stripslashesx ($hasil1['kpp']);    
            $rs9 = mysqli_query($koneksi,"select * from setting_pph where kpp='$kpp' order by id desc limit 1");
            $hasil9 = mysqli_fetch_array($rs9);
            $npwp_pemotong15 = stripslashesx ($hasil9['npwp_pemotong15']);
            $npwp_pemotong16 = stripslashesx ($hasil9['npwp_pemotong16']);
            $nitku_pemotong = stripslashesx ($hasil9['nitku_pemotong']);
            $nama_pemotong = stripslashesx ($hasil9['nama_pemotong']);
            $npwp_pejabat = stripslashesx ($hasil9['npwp_pejabat']);
            $nama_pejabat = stripslashesx ($hasil9['nama_pejabat']);
            $path_ttd = stripslashesx ($hasil9['path_ttd']);
    
        $nik = stripslashesx ($hasil1['nik']);
        $alamat = stripslashesx ($hasil1['alamat']);
        $alamat1 = substr($alamat,0,40);
        $alamat2 = substr($alamat,40,40);
        $jenis_kelamin = stripslashesx ($hasil1['jenis_kelamin']);
        $jabatan = stripslashesx ($hasil1['jabatan']);
        $jabatan2 = substr($jabatan,0,25);    
        $npwp = stripslashesx ($hasil1['npwp']);
        // $jenis_kelamin = "P";
        if($jenis_kelamin=="L"){
            $jenis_kelamin1 = "X";
            $jenis_kelamin2 = "";
        } else {
            $jenis_kelamin1 = "";
            $jenis_kelamin2 = "X";
        }
        
        if($nik!="" && strlen($nik)>20){
            $nik = decryptText($nik, $kunci);
        }
        if($npwp!="" && strlen($npwp)>20){
            $npwp = decryptText($npwp, $kunci);
        }
        $nitku = $nik."000000";    
    
        /*
        if($tgl_buat!=""){
            $tgl_buat2 = TanggalIndo($hari_ini);
        } else {
            $tgl_buat2 = "";
        }
        */
        $tgl_buat2 = TanggalIndo($hari_ini);
        /*
        $efektif = str_pad(($masa_kerja*1),2,"0",STR_PAD_LEFT);
        $efektif1 = substr($efektif,0,1);
        $efektif2 = substr($efektif,-1);
        */
        $bulan_awal = substr($blth_awal,-2);
        $bulan_awal1 = substr($bulan_awal,0,1);
        $bulan_awal2 = substr($bulan_awal,-1);
        $bulan_akhir = substr($blth_akhir,-2);
        $bulan_akhir1 = substr($bulan_akhir,0,1);
        $bulan_akhir2 = substr($bulan_akhir,-1);
    
        //$gaji = $gaji2*$masa_kerja;
        //$tunjangan_variable = $tunjangan_variable2*$masa_kerja;
        //$honorarium = $honorarium2*$masa_kerja;
        //$benefit = $benefit2*$masa_kerja;
        //$natuna = $natuna2*$masa_kerja;
    
        $pdf->AddPage();
    
        $pdf->SetFont('Arial','',8);
        $y=$pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(0,0,"-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------",'','C',0);
        $pdf->SetFillColor(0,0,0);
        $y=$pdf->GetY();
        $pdf->SetXY(15,$y);
        $pdf->MultiCell(5,2,"",'','C',1);
        $pdf->SetXY(190,$y);
        $pdf->MultiCell(5,2,"",'','C',1);
    
        //$pdf->SetFont('Arial','B',12);
        $pdf->SetLineWidth(0.6);
        $dasar= $pdf->GetY();
    
        $y=$pdf->GetY();
        $pdf->Image('../images/logopajak2.png',27,10,18,0);
        $pdf->SetFont('Arial','B',7);
        //$pdf->SetFont('Arial','',6);
        //$y= $pdf->GetY();
        $y= $dasar+22;
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(50,3,"KEMENTERIAN KEUANGAN RI",'R','C',0);
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(50,3,"DIREKTORAT JENDERAL PAJAK",'R','C',0);
    
        $pdf->SetDrawColor(0,0,0);
        $y= $dasar;
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(50,4,"",'R','C',0);
        $pdf->SetFont('Arial','B',7);
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(50,23,"",'R','C',0);
        $pdf->SetXY(60,$y);
        $pdf->MultiCell(80,4,"BUKTI PEMOTONGAN PAJAK PENGHASILAN PASAL 21",'R','C',0);
        $y= $pdf->GetY();
        $pdf->SetXY(60,$y);
        $pdf->MultiCell(80,4,"BAGI PEGAWAI TETAP ATAU PENERIMA PENSIUN",'R','C',0);
        $y= $pdf->GetY();
        $pdf->SetXY(60,$y);
        $pdf->MultiCell(80,4,"MENERIMA UANG TERKAIT PENSIUN SECARA BERKALA",'R','C',0);
        // $y= $pdf->GetY();
        // $pdf->SetXY(70,$y);
        // $pdf->MultiCell(70,4,"TUA/JAMINAN HARI TUA BERKALA",'R','C',0);
        $y= $pdf->GetY();
        $pdf->SetXY(60,$y);
        $pdf->MultiCell(80,6,"",'R','C',0);
        $y= $pdf->GetY();
        $pdf->SetXY(60,$y);
        $pdf->MultiCell(85,1,"",'T','L',0);
        $pdf->SetXY(60,$y);
        $pdf->MultiCell(85,2,"",'R','L',0);
        $y= $pdf->GetY();
        $pdf->SetXY(60,$y);
        $pdf->MultiCell(5,3,"",'','L',0);
        $pdf->SetXY(65,$y);
        $pdf->MultiCell(20,3,"NOMOR :",'','L',0);
        $pdf->SetFont('Arial','',7);
        $pdf->SetLineWidth(0.1);
        $pdf->SetXY(85,$y);
        $pdf->MultiCell(50,3,"11".substr($blth,-2).substr($blth,2,2).$no_urut,'B','L',0);
        $pdf->SetLineWidth(0.1);
        $pdf->SetFont('Arial','B',7);
        $pdf->SetFont('Arial','',7);
        $pdf->SetXY(157,$y+1);
        $pdf->MultiCell(40,3,substr($blth_awal,-2)."-".substr($blth_akhir,-2)."/".substr($blth_akhir,0,4),'B','L',0);    
        // $pdf->SetXY(170,$y);
        // $pdf->MultiCell(10,3,substr($blth_awal,-2),'B','C',0);
        // $pdf->SetXY(180,$y);
        // $pdf->MultiCell(5,3,"-",'','C',0);
        // $pdf->SetXY(185,$y);
        // $pdf->MultiCell(10,3,substr($blth_akhir,-2),'B','C',0);
    
        $pdf->SetLineWidth(0.6);
        $pdf->SetXY(120,$y);
        $pdf->MultiCell(25,3,"",'R','C',0);
    
        $pdf->SetTextColor(0,0,0);
        $y=$dasar;
        $pdf->SetXY(150,$y);
        $pdf->MultiCell(5,2,"",'','C',0);
    
        $pdf->SetLineWidth(0.2);
        $y= $pdf->GetY();
        $pdf->SetXY(175,$y);
        $pdf->MultiCell(4,2,"",'LRTB','C',0);
        $pdf->SetXY(180,$y);
        $pdf->MultiCell(4,2,"",'LRTB','C',1);
        $pdf->SetXY(185,$y);
        $pdf->MultiCell(4,2,"",'LRTB','C',0);
        $pdf->SetXY(190,$y);
        $pdf->MultiCell(4,2,"",'LRTB','C',1);
        $pdf->SetFont('Arial','B',8);
        $y= $pdf->GetY();
        $pdf->SetXY(155,$y);
        $pdf->MultiCell(0,6,"FORMULIR 1721 - A1",'','L',0);
        $pdf->SetFont('Arial','',6);
        $y= $pdf->GetY();
        $pdf->SetXY(140,$y);
        $pdf->MultiCell(0,3,"Lembar ke-1 : Untuk Penerima Penghasilan",'','C',0);
        $y= $pdf->GetY();
        $pdf->SetXY(140,$y);
        // $pdf->MultiCell(0,3,"Lembar ke-2 : Untuk Pemotong",'','L',0);
        $pdf->MultiCell(0,3,"",'','L',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(140,$y);
        $pdf->MultiCell(0,2,"",'','L',0);
    
        $pdf->SetFont('Arial','B',6);
        $y= $pdf->GetY();
        $pdf->SetXY(140,$y);
        $pdf->MultiCell(0,3,"MASA PEROLEHAN PENGHASILAN",'','C',0);
        $y= $pdf->GetY();
        $pdf->SetXY(140,$y);
        $pdf->MultiCell(0,3,"[mm-mm]",'','C',0);
    
        $pdf->SetLineWidth(0.6);
        $y= $pdf->GetY()+3;
        $pdf->SetXY(60,$y);
        $pdf->MultiCell(85,2,"",'LR','C',0);
        $pdf->SetFont('Arial','',7);
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(0,24,"",'LRTB','C',0);
    
        $pdf->SetLineWidth(0.2);
        $pdf->SetFont('Arial','B',7);
        $pdf->SetXY(12,$y+2);
        $pdf->MultiCell(20,3,"NPWP",'','L',0);
        $y= $pdf->GetY();
        $pdf->SetXY(12,$y);
        $pdf->MultiCell(20,3,"PEMOTONG",'','L',0);
        $pdf->SetXY(32,$y);
        $pdf->MultiCell(3,3,":",'','C',0);
        //$pdf->SetFont('Arial','',7);
        $pdf->SetFont('Arial','',7);
        $pdf->SetXY(42,$y);
        $pdf->MultiCell(90,3,$npwp_pemotong15." / ".$npwp_pemotong16,'B','L',0);
        $pdf->SetFont('Arial','B',7);
        $pdf->SetTextColor(0,0,0);
        $y= $pdf->GetY();
        $pdf->SetXY(12,$y+1);
        $pdf->MultiCell(20,3,"NITKU",'','L',0);
        $y= $pdf->GetY();
        $pdf->SetXY(12,$y);
        $pdf->MultiCell(20,3,"PEMOTONG",'','L',0);
        $pdf->SetXY(32,$y);
        $pdf->MultiCell(3,3,":",'','C',0);
        $pdf->SetFont('Arial','',7);
        $pdf->SetXY(42,$y);
        $pdf->MultiCell(90,3,$nitku_pemotong,'B','L',0);
    
        $pdf->SetFont('Arial','B',7);
        $y= $pdf->GetY();
        $pdf->SetXY(12,$y+1);
        $pdf->MultiCell(20,3,"NAMA",'','L',0);
        $y= $pdf->GetY();
        $pdf->SetXY(12,$y);
        $pdf->MultiCell(20,3,"PEMOTONG",'','L',0);
        $pdf->SetXY(32,$y);
        $pdf->MultiCell(3,3,":",'','C',0);
        $pdf->SetFont('Arial','',7);
        $pdf->SetXY(42,$y);
        $pdf->MultiCell(90,3,$nama_pemotong,'B','L',0);
    
        $pdf->SetFont('Arial','B',8);
        $pdf->SetTextColor(0,0,0);
        $y= $pdf->GetY()+4;
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(0,5,"A. IDENTITAS PENERIMA PENGHASILAN",'','L',0);
    
        $pdf->SetLineWidth(0.6);
        $batas_penerima= $pdf->GetY();
        $y= $pdf->GetY();    
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(0,39,"",'LRTB','C',0);
    
        $pdf->SetLineWidth(0.2);
        $pdf->SetFont('Arial','B',7);
        $pdf->SetXY(12,$y+2);
        $pdf->MultiCell(5,3,"1",'','L',0);
        $pdf->SetXY(16,$y+2);
        $pdf->MultiCell(15,3,"NPWP",'','L',0);
        $pdf->SetXY(38,$y+2);
        $pdf->MultiCell(3,3,":",'','C',0);
        $pdf->SetFont('Arial','',7);
        $pdf->SetXY(47,$y+2);
        $pdf->MultiCell(60,3,$npwp." / ".$nik,'B','L',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(0,2,"",'','L',0);
    
        $pdf->SetFont('Arial','B',7);
        $y= $pdf->GetY();
        $pdf->SetXY(12,$y);
        $pdf->MultiCell(5,3,"2",'','L',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(15,3,"NITKU",'','L',0);
        $pdf->SetXY(38,$y);
        $pdf->MultiCell(3,3,":",'','C',0);
        $pdf->SetFont('Arial','',7);
        $pdf->SetXY(47,$y);
        $pdf->MultiCell(60,3,$nitku,'B','L',0);
        $pdf->SetXY(125,$y);
        $pdf->MultiCell(5,3,"",'','L',0);
    
        $pdf->SetFont('Arial','B',7);
        $y= $pdf->GetY()+3;
        $pdf->SetXY(12,$y);
        $pdf->MultiCell(5,3,"3",'','L',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(15,3,"NIK",'','L',0);
        $pdf->SetXY(38,$y);
        $pdf->MultiCell(3,3,":",'','C',0);
        $pdf->SetFont('Arial','',7);
        $pdf->SetXY(47,$y);
        $pdf->MultiCell(60,3,$nik,'B','L',0);
        $pdf->SetXY(125,$y);
        $pdf->MultiCell(5,3,"",'','L',0);
    
        $pdf->SetFont('Arial','B',7);
        $y= $pdf->GetY()+3;
        $pdf->SetXY(12,$y);
        $pdf->MultiCell(5,3,"4",'','L',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(15,3,"NAMA",'','L',0);
        $pdf->SetXY(38,$y);
        $pdf->MultiCell(3,3,":",'','C',0);
        $pdf->SetFont('Arial','',7);
        $pdf->SetXY(47,$y);
        $pdf->MultiCell(60,3,$nama,'B','L',0);
        $pdf->SetXY(125,$y);
        $pdf->MultiCell(5,3,"",'','L',0);
    
        $pdf->SetFont('Arial','B',7);
        $y= $pdf->GetY()+3;
        $pdf->SetXY(12,$y);
        $pdf->MultiCell(5,3,"5",'','L',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(15,3,"ALAMAT",'','L',0);
        $pdf->SetXY(38,$y);
        $pdf->MultiCell(3,3,":",'','C',0);
        $pdf->SetFont('Arial','',7);
        $pdf->SetXY(47,$y);
        $pdf->MultiCell(60,3,$alamat1,'','L',0);
        $y= $pdf->GetY()+3;
        $pdf->SetXY(47,$y);
        $pdf->MultiCell(60,0,"",'B','L',0);
        $pdf->SetXY(125,$y);
        $pdf->MultiCell(5,3,"",'','L',0);
    
        $pdf->SetFont('Arial','B',7);
        $y= $pdf->GetY();
        $pdf->SetXY(12,$y);
        $pdf->MultiCell(5,3,"6",'','L',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(25,3,"JENIS KELAMIN",'','L',0);
        $pdf->SetXY(38,$y);
        $pdf->MultiCell(3,3,":",'','C',0);
        $pdf->SetFont('Arial','',7);
        $pdf->SetXY(47,$y-1.5);
        if($jenis_kelamin=="L"){
            $pdf->MultiCell(6,5,"X",'LRTB','C',0);
        } else {
            $pdf->MultiCell(6,5,"",'LRTB','C',0);
        }
        $pdf->SetXY(53,$y);
        $pdf->MultiCell(20,3,"LAKI-LAKI",'','L',0);
        $pdf->SetXY(80,$y-1.5);
        if($jenis_kelamin=="P"){
            $pdf->MultiCell(6,5,"X",'LRTB','C',0);
        } else {
            $pdf->MultiCell(6,5,"",'LRTB','C',0);
        }
        $pdf->SetXY(86,$y);
        $pdf->MultiCell(20,3,"PEREMPUAN",'','L',0);
    
        $y = $batas_penerima;
        $pdf->SetFont('Arial','B',7);
        $pdf->SetXY(110,$y+2);
        $pdf->MultiCell(5,3,"7",'','L',0);
        $pdf->SetXY(115,$y+2);
        $pdf->MultiCell(0,3,"STATUS / JUMLAH TANGGUNGAN KELUARGA UNTUK PTKP",'','L',0);
        $pdf->SetFont('Arial','',7);
    
        $y= $pdf->GetY()+1;
        $pdf->SetXY(115,$y);
        $pdf->MultiCell(5,3,"K/",'','L',0);
        $pdf->SetXY(120,$y);
        if(substr($status,0,1)=="K"){
            $pdf->MultiCell(8,3,substr($status,-1),'B','C',0);
        } else {
            $pdf->MultiCell(8,3,"",'B','C',0);
        }
        $pdf->SetXY(145,$y);
        $pdf->MultiCell(7,3,"TK/",'','L',0);
        $pdf->SetXY(151,$y);
        if(substr($status,0,1)=="T"){
            $pdf->MultiCell(8,3,substr($status,-1),'B','C',0);
        } else {
            $pdf->MultiCell(8,3,"",'B','C',0);
        }
        $pdf->SetXY(174,$y);
        $pdf->MultiCell(7,3,"HB/",'','L',0);
        $pdf->SetXY(180,$y);
        $pdf->MultiCell(8,3,"",'B','C',0);
    
        $pdf->SetFont('Arial','B',7);
        $y= $pdf->GetY()+2;
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(5,3,"8",'','L',0);
        $pdf->SetXY(115,$y);
        $pdf->MultiCell(33,3,"NAMA JABATAN",'','L',0);
        $pdf->SetFont('Arial','',6);
        $pdf->SetXY(148,$y);
        $pdf->MultiCell(3,3,":",'','L',0);
        $pdf->SetXY(155,$y);
        $pdf->MultiCell(0,3,$jabatan,'','L',0);
        $pdf->SetFont('Arial','',7);
        $y= $pdf->GetY();
        $pdf->SetXY(155,$y);
        $pdf->MultiCell(43,0,"",'B','L',0);
    
        $pdf->SetFont('Arial','B',7);
        $y= $pdf->GetY()+3;
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(5,3,"9",'','L',0);
        $pdf->SetXY(115,$y);
        $pdf->MultiCell(33,3,"KARYAWAN ASING",'','L',0);
        $pdf->SetFont('Arial','',7);
        $pdf->SetXY(148,$y);
        $pdf->MultiCell(3,3,":",'','L',0);
        $pdf->SetXY(156,$y-1);
        $pdf->MultiCell(6,5,"",'LRTB','L',0);
        $pdf->SetFont('Arial','',7);
        $pdf->SetXY(163,$y+0.5);
        $pdf->MultiCell(7,3,"YA",'','L',0);
    
        $pdf->SetFont('Arial','B',7);
        $y= $pdf->GetY()+3;
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(5,3,"10",'','L',0);
        $pdf->SetXY(115,$y);
        $pdf->MultiCell(33,3,"KODE NEGARA DOMISILI",'','L',0);
        $pdf->SetFont('Arial','',7);
        $pdf->SetXY(148,$y);
        $pdf->MultiCell(3,3,":",'','L',0);
        $pdf->SetXY(155,$y);
        $pdf->MultiCell(43,3,"",'B','L',0);
        
        
        $pdf->SetFont('Arial','B',8);
        $pdf->SetTextColor(0,0,0);
        $y= $pdf->GetY()+12;
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(0,5,"B. RINCIAN PENGHASILAN DAN PENGHITUNGAN PPh PASAL 21",'','L',0);
    
        $pdf->SetLineWidth(0.2);
        $pdf->SetFont('Arial','B',7);
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(142,5,"URAIAN",'LRTB','C',0);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,5,"JUMLAH (Rp)",'RTB','C',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(10,7,"",'L','L',0);
        $pdf->SetXY(20,$y);
        $pdf->MultiCell(142,7,"KODE OBJEK PAJAK :",'RTB','L',0);
        // $pdf->SetXY(60,$y);
        // $pdf->MultiCell(5,7,":",'','L',0);
        $pdf->SetXY(68,$y+1);
        $pdf->MultiCell(6,5,"X",'LRTB','C',0);
        $pdf->SetXY(75,$y);
        $pdf->MultiCell(20,7,"21-100-01",'','L',0);
        $pdf->SetXY(107,$y+1);
        $pdf->MultiCell(6,5,"",'LRTB','L',0);
        $pdf->SetXY(114,$y);
        $pdf->MultiCell(20,7,"21-100-02",'','L',0);
        $pdf->SetFillColor(100,100,100);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,7,"",'LRTB','C',1);
        
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(142,5,"PENGHASILAN BRUTO :",'LRTB','L',0);
        $pdf->SetFillColor(100,100,100);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,5,"",'LRTB','C',1);
    
        $pdf->SetFont('Arial','',6.5);
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4,"1.",'LRTB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4,"GAJI ATAU UANG PENSIUNAN BERKALA",'RTB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4,number_format($gaji,0,',','.'),'RTB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"2.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"TUNJANGAN PPh",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($tunjangan_pph,0,',','.'),'RB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"3.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"TUNJANGAN LAINNYA, UANG LEMBUR DAN SEGALANYA",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($tunjangan_variable,0,',','.'),'RB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"4.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"HONORARIUM DAN IMBALAN LAIN SEJENISNYA",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($honorarium,0,',','.'),'RB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"5.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($benefit,0,',','.'),'RB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"6.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"PENERIMAAN DALAM BENTUK NATURA DAN KENIKMATAN LAINNYA YANG DIKENAKAN PEMOTONGAN PPh PASAL 21",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($natuna,0,',','.'),'RB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"7.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI DAN THR",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($bonus_thr,0,',','.'),'RB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"8.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"JUMLAH PENGHASILAN BRUTO (1 S.D 7)",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($brutot,0,',','.'),'R','R',0);
    
        $pdf->SetFont('Arial','B',7);
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(142,5,"PENGURANGAN :",'LRB','L',0);
        $pdf->SetFillColor(100,100,100);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,5,"",'LRTB','C',1);
    
        $pdf->SetFont('Arial','',6.5);
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"9.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"BIAYA JABATAN / BIAYA PENSIUN",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($biaya_jabatant,0,',','.'),'RB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"10.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"IURAN PENSIUN ATAU IURAN THT/JHT",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($iuran_pensiunt,0,',','.'),'RB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"11.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"ZAKAT/SUMBANGAN KEAGAMAAN YANG BERSIFAT WAJIB YANG DIBAYARKAN MELALUI PEMBERI KERJA",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($pot_zakat,0,',','.'),'RB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"12.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"JUMLAH PENGURANGAN (9 S.D 11)",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($biaya_pengurangt,0,',','.'),'R','R',0);
    
        $pdf->SetFont('Arial','B',7);
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(142,5,"PENGHITUNGAN PPh PASAL 21 :",'LRB','L',0);
        $pdf->SetFillColor(100,100,100);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,5,"",'LRTB','C',1);
    
        $pdf->SetFont('Arial','',6.5);
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"13.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"JUMLAH PENGHASILAN NETTO (8-12)",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($nettot,0,',','.'),'RB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"14.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"PENGHASILAN NETTO MASA SEBELUMNYA",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($nettot_sebelumnya,0,',','.'),'RB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"15.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"JUMLAH PENGHASILAN NETTO UNTUK PENGHITUNGAN PPh PASAL 21 (SETAHUN/DISETAHUNKAN)",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($nettot_akhir,0,',','.'),'RB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"16.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"PENGHASILAN TIDAK KENA PAJAK (PTKP)",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($ptkp,0,',','.'),'RB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"17.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"PENGHASILAN KENA PAJAK SETAHUN/DISETAHUNKAN (15 - 16)",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($pkp,0,',','.'),'RB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"18.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"PPh PASAL 21 ATAS PENGHASILAN KENA PAJAK SETAHUN/DISETAHUNKAN",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($ppht,0,',','.'),'RB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"19.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"PPh PASAL 21 YANG TELAH DIPOTONG MASA SEBELUMNYA",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($ppht_sebelumnya,0,',','.'),'RB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"20.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"PPh PASAL 21 DITANGGUNG PEMERINTAH (DTP) YANG TELAH DIPOTONG MASA PAJAK SEBELUMNYA",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($ppht_dtp,0,',','.'),'RB','R',0);
    
        $pdf->SetFillColor(100,100,100);
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"21.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"PPh PASAL 21 TERUTANG (18-19-20)",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($pphb_terutang,0,',','.'),'RB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"22.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"PPh PASAL 21 DAN PPh PASAL 26 YANG TELAH DIPOTONG DAN DILUNASI PADA SELAIN MASA PAJAK TERAKHIR",'RB','L',0);
        $pdf->SetFillColor(100,100,100);
        $pdf->SetXY(152,$y);    
        $pdf->MultiCell(0,4.5,"",'RB','R',1);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"22a. PPh PASAL 21 DIPOTONG",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($pphb_terutang,0,',','.'),'RB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"22b. PPh PASAL 21 DITANGGUNG PEMERINTAH (DTP)",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,number_format($ppht_dtp,0,',','.'),'RB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"23.",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"PPh PASAL 21 KURANG BAYAR/LEBIH BAYAR MASA PAJAK TERAKHIR",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,$selisih_bayar,'RB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"23a. PPh PASAL 21 DIPOTONG",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,$selisih_bayar,'RB','R',0);
    
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(6,4.5,"",'LRB','C',0);
        $pdf->SetXY(16,$y);
        $pdf->MultiCell(136,4.5,"23b. PPh PASAL 21 DITANGGUNG PEMERINTAH (DTP)",'RB','L',0);
        $pdf->SetFillColor(230,230,230);
        $pdf->SetXY(152,$y);
        $pdf->MultiCell(0,4.5,0,'RB','R',0);
    
        $pdf->SetFont('Arial','B',7);
        $pdf->SetTextColor(0,0,0);
        $y= $pdf->GetY()+2;
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(0,5,"C. IDENTITAS PEMOTONG",'','L',0);
    
        $pdf->SetLineWidth(0.6);
        $y= $pdf->GetY();
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(0,21,"",'LRTB','C',0);
    
        $y= $y+2;
        $pdf->SetLineWidth(0.2);
        $pdf->SetFont('Arial','',7);
        $pdf->SetTextColor(0,0,0);
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(5,5,"1.",'','L',0);
        $pdf->SetXY(14,$y);
        $pdf->MultiCell(20,5,"NPWP/NIK",'','L',0);
        $pdf->SetXY(28,$y);
        $pdf->MultiCell(3,5,":",'','L',0);
        $pdf->SetXY(37,$y);
        $pdf->MultiCell(60,5,$npwp_pejabat,'B','L',0);
        // $pdf->SetXY(78,$y);
        // $pdf->MultiCell(4,5,"-",'','L',0);
        // $pdf->SetXY(82,$y);
        // $pdf->MultiCell(8,5,substr($npwp_pejabat,9,3),'B','C',0);
        // $pdf->SetXY(91,$y);
        // $pdf->MultiCell(4,5,".",'','L',0);
        // $pdf->SetXY(93,$y);
        // $pdf->MultiCell(8,5,substr($npwp_pejabat,-3),'B','C',0);
        $pdf->SetXY(107,$y);
        $pdf->MultiCell(0,5,"3. TANGGAL & TANDA TANGAN",'','L',0);
    
        $y= $pdf->GetY()+4;
        $pdf->SetXY(10,$y);
        $pdf->MultiCell(5,5,"2.",'','L',0);
        $pdf->SetXY(14,$y);
        $pdf->MultiCell(10,5,"NAMA",'','L',0);
        $pdf->SetXY(28,$y);
        $pdf->MultiCell(3,5,":",'','L',0);
        $pdf->SetXY(37,$y);
        $pdf->MultiCell(60,5,$nama_pejabat,'B','L',0);
        $pdf->SetXY(107,$y);
        $pdf->MultiCell(30,5,TanggalIndo2($tgl_buat),'B','L',0);
        // $pdf->MultiCell(13,5,substr($tgl_buat,8,2),'B','C',0);
        // $pdf->SetXY(120,$y);
        // $pdf->MultiCell(3,5,"-",'','L',0);
        // $pdf->SetXY(122,$y);
        // $pdf->MultiCell(13,5,substr($tgl_buat,5,2),'B','C',0);
        // $pdf->SetXY(135,$y);
        // $pdf->MultiCell(3,5,"-",'','L',0);
        // $pdf->SetXY(137,$y);
        // $pdf->MultiCell(20,5,substr($tgl_buat,0,4),'B','C',0);
        
        $y= $pdf->GetY();
        $pdf->SetXY(112,$y);
        // $pdf->MultiCell(0,5,"[dd-mm-yyyy]",'','L',0);
        // $pdf->Image($path_ttd,168,267,0,16);
        if($path_ttd=="" || $path_ttd==null){
            $pdf->Image('../assets/ttd/ttdbaru.jpeg',168,272,0,17);
        } else {
            $pdf->Image("../".$path_ttd,168,272,0,17);
        }
        $pdf->SetLineWidth(0.2);
        $pdf->SetXY(160,273);
        $pdf->MultiCell(38,16,"",'LRTB','C',0);
    
        //$pdf->SetTextColor(161,161,120);
        // $pdf->SetTextColor(0,139,139);
        $pdf->SetFont('Arial','',6);
        $pdf->SetXY(78,33);
        $pdf->MultiCell(7,3,"H.01",'','C',0);
        $pdf->SetXY(149,34);
        $pdf->MultiCell(7,3,"H.02",'','C',0);
    
        $pdf->SetFont('Arial','',6);
        $pdf->SetXY(35,43);
        $pdf->MultiCell(7,3,"H.03",'','C',0);
        $pdf->SetXY(35,50);
        $pdf->MultiCell(7,3,"H.03",'','C',0);
        $pdf->SetXY(35,57);
        $pdf->MultiCell(7,3,"H.04",'','C',0);
    
        $pdf->SetXY(40,71);
        $pdf->MultiCell(7,3,"A.01",'','C',0);
        $pdf->SetXY(40,81.7);
        $pdf->MultiCell(7,3,"A.02",'','C',0);
        $pdf->SetXY(127,76.5);
        $pdf->MultiCell(7,3,"A.07",'','C',0);
        $pdf->SetXY(158,76.5);
        $pdf->MultiCell(7,3,"A.08",'','C',0);
        $pdf->SetXY(187,76.5);
        $pdf->MultiCell(7,3,"A.09",'','C',0);
    
        $pdf->SetXY(40,87.8);
        $pdf->MultiCell(7,3,"A.03",'','C',0);
        $pdf->SetXY(149,80);
        $pdf->MultiCell(7,3,"A.10",'','C',0);
    
        $pdf->SetXY(40,94);
        $pdf->MultiCell(7,3,"A.04",'','C',0);
        $pdf->SetXY(149,86);
        $pdf->MultiCell(7,3,"A.11",'','C',0);
    
        $pdf->SetXY(149,93);
        $pdf->MultiCell(7,3,"A.12",'','C',0);
    
        $pdf->SetXY(40,103);
        $pdf->MultiCell(7,3,"A.05",'','C',0);
        $pdf->SetXY(73,103);
        $pdf->MultiCell(7,3,"A.06",'','C',0);
    
        $pdf->SetXY(29,273.5);
        $pdf->MultiCell(7,3,"C.01",'','C',0);
        $pdf->SetXY(29,282.5);
        $pdf->MultiCell(7,3,"C.02",'','C',0);
        $pdf->SetXY(107,276);
        $pdf->MultiCell(7,3,"C.03",'','C',0);            
    }
    $pdf->Output();
}
?>
