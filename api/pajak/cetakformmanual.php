<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include "koneksi.php";
    include "../fungsi.php";
    require('../rotation.php');
    include "../stringvalidasi.php";
    $kunci = "cipher.hris@s7o";
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
  
    // $blth2 = $_REQUEST['blth'];
    $id2 = $_REQUEST['id'];        
    
    $rs2 = mysqli_query($koneksi,"select * from pphmanual where id='$id2'");
    $hasil2 = mysqli_fetch_array($rs2);
    $blth = stripslashesx ($hasil2['blth']);
        $tgl_pajak = date('t', strtotime($blth));
        $bln_pajak = date('m', strtotime($blth));
        $thn_pajak = date('Y', strtotime($blth));
        $blth2 = TanggalIndo3($blth);

        $blth4 = "$blth-01";
        $tahun4 = substr($blth4, 0, 4);
        $bulan4 = substr($blth4, 5, 2);
        $tgl4   = substr($blth4, 8, 2);
    $nip = stripslashesx ($hasil2['nip']);
        $rs1 = mysqli_query($koneksi,"select * from data_pegawai where nip='$nip'");
        $hasil1 = mysqli_fetch_array($rs1);
        $kpp = stripslashesx ($hasil1['kpp']);
            $rs9 = mysqli_query($koneksi,"select * from setting_pph where kpp='$kpp' order by id desc limit 1");
            $hasil9 = mysqli_fetch_array($rs9);
            $npwp_pemotong = stripslashesx ($hasil9['npwp_pemotong']);
            $nama_pemotong = stripslashesx ($hasil9['nama_pemotong']);
            $npwp_pejabat = stripslashesx ($hasil9['npwp_pejabat']);
            $nama_pejabat = stripslashesx ($hasil9['nama_pejabat']);
            $path_ttd = stripslashesx ($hasil9['path_ttd']);

        $nama = stripslashesx ($hasil1['nama']);
        $nik = stripslashesx ($hasil1['nik']);
        $alamat = stripslashesx ($hasil1['alamat']);
        $alamat1 = substr($alamat,0,40);
        $alamat2 = substr($alamat,40,40);
        $jenis_kelamin = stripslashesx ($hasil1['jenis_kelamin']);
        $jabatan = stripslashesx ($hasil1['jabatan']);
        $jabatan2 = substr($jabatan,0,25);    
        $npwp = stripslashesx ($hasil1['npwp']);
        if($jenis_kelamin=="L"){
            $jenis_kelamin1 = "X";
            $jenis_kelamin2 = "";
        } else {
            $jenis_kelamin1 = "";
            $jenis_kelamin2 = "X";
        }
    if($nik!="" && strlen($nik)>25){
        $nik = decryptText($nik, $kunci);
    }
    if($npwp!="" && strlen($npwp)>25){
        $npwp = decryptText($npwp, $kunci);
    }

    $no_urut = stripslashesx ($hasil2['no_urut']);
    $tgl_buat = stripslashesx ($hasil2['tgl_proses']);
    $tahun = stripslashesx ($hasil2['tahun']);
    $status = stripslashesx ($hasil2['status']);
    $blth_awal = stripslashesx ($hasil2['blth_awal']);
    $blth_akhir = stripslashesx ($hasil2['blth_akhir']);
    $masa_kerja = stripslashesx ($hasil2['masa_kerja']);
    $gaji = (stripslashesx ($hasil2['gaji']))*1;
    $tunjangan_pph = (stripslashesx ($hasil2['tunjangan_pph']))*1;
    $tunjangan_variable = (stripslashesx ($hasil2['tunjangan_variable']))*1;
    $honorarium = (stripslashesx ($hasil2['honorarium']))*1;
    $benefit = (stripslashesx ($hasil2['benefit']))*1;
    $natuna = (stripslashesx ($hasil2['natuna']))*1;
    $bonus_thr = (stripslashesx ($hasil2['bonus_thr']))*1;
    $brutob = (stripslashesx ($hasil2['brutob']))*1;
    $biaya_jabatanb = (stripslashesx ($hasil2['biaya_jabatanb']))*1;
    $iuran_pensiunb = (stripslashesx ($hasil2['iuran_pensiunb']))*1;
    $brutot = (stripslashesx ($hasil2['brutot']))*1;
    $biaya_jabatant = (stripslashesx ($hasil2['biaya_jabatant']))*1;
    $iuran_pensiunt = (stripslashesx ($hasil2['iuran_pensiunt']))*1;
    $biaya_pengurangt = (stripslashesx ($hasil2['biaya_pengurangt']))*1;
    $nettot = (stripslashesx ($hasil2['nettot']))*1;
    $nettot_sebelumnya = (stripslashesx ($hasil2['nettot_sebelumnya']))*1;
    $nettot_akhir = (stripslashesx ($hasil2['nettot_akhir']))*1;
    $ptkp = (stripslashesx ($hasil2['ptkp']))*1;
    $pkp = (stripslashesx ($hasil2['pkp']))*1;
    $ppht = (stripslashesx ($hasil2['ppht']))*1;
    $ppht_sebelumnya = (stripslashesx ($hasil2['ppht_sebelumnya']))*1;
    $ppht_terutang = (stripslashesx ($hasil2['ppht_terutang']))*1;
    $pphb_terutang = (stripslashesx ($hasil2['pphb_terutang']))*1;
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
    $pdf->Image('../images/logopajak.png',30,10,20,0);
    $pdf->SetFont('Arial','B',8);
    //$pdf->SetFont('Arial','',6);
    //$y= $pdf->GetY();
    $y= $dasar+22;
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(60,3,"KEMENTERIAN KEUANGAN RI",'R','C',0);
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(60,3,"DIREKTORAT JENDERAL PAJAK",'R','C',0);

    $pdf->SetDrawColor(0,0,0);
    $y= $dasar;
    $pdf->SetFont('Arial','B',7);
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(60,23,"",'R','C',0);
    $pdf->SetXY(70,$y);
    $pdf->MultiCell(70,4,"BUKTI PEMOTONGAN PAJAK PENGHASILAN",'R','C',0);
    $y= $pdf->GetY();
    $pdf->SetXY(70,$y);
    $pdf->MultiCell(70,4,"PASAL 21 BAGI PEGAWAI TETAP ATAU",'R','C',0);
    $y= $pdf->GetY();
    $pdf->SetXY(70,$y);
    $pdf->MultiCell(70,4,"PENERIMA PENSIUN ATAU TUNJANGAN HARI",'R','C',0);
    $y= $pdf->GetY();
    $pdf->SetXY(70,$y);
    $pdf->MultiCell(70,4,"TUA/JAMINAN HARI TUA BERKALA",'R','C',0);
    $y= $pdf->GetY();
    $pdf->SetXY(70,$y);
    $pdf->MultiCell(70,6,"",'R','C',0);
    $y= $pdf->GetY();
    $pdf->SetXY(70,$y);
    $pdf->MultiCell(90,1,"",'T','L',0);
    $pdf->SetXY(70,$y);
    $pdf->MultiCell(90,2,"",'R','L',0);
    $y= $pdf->GetY();
    $pdf->SetXY(70,$y);
    $pdf->MultiCell(5,3,"",'','L',0);
    $pdf->SetXY(75,$y);
    $pdf->MultiCell(20,3,"NOMOR :",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(4,3,"1",'','L',0);
    $pdf->SetXY(104,$y);
    $pdf->MultiCell(2,3,".",'','L',0);
    $pdf->SetXY(106,$y);
    $pdf->MultiCell(4,3,"1",'','L',0);
    $pdf->SetXY(110,$y);
    $pdf->MultiCell(2,3,".",'','L',0);
    $pdf->SetLineWidth(0.2);
    $pdf->SetXY(112,$y);
    $pdf->MultiCell(7,3,substr($blth,-2),'B','C',0);
    $pdf->SetXY(119,$y);
    $pdf->MultiCell(2,3,".",'','C',0);
    $pdf->SetXY(121,$y);
    $pdf->MultiCell(7,3,substr($blth,2,2),'B','C',0);
    $pdf->SetXY(128,$y);
    $pdf->MultiCell(2,3,"-",'','C',0);
    $pdf->SetXY(130,$y);
    $pdf->MultiCell(25,3,$no_urut,'B','C',0);
    $pdf->SetXY(170,$y);
    $pdf->MultiCell(10,3,substr($blth_awal,-2),'B','C',0);
    $pdf->SetXY(180,$y);
    $pdf->MultiCell(5,3,"-",'','C',0);
    $pdf->SetXY(185,$y);
    $pdf->MultiCell(10,3,substr($blth_akhir,-2),'B','C',0);

    $pdf->SetLineWidth(0.6);
    $pdf->SetXY(120,$y);
    $pdf->MultiCell(40,3,"",'R','C',0);

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
    $pdf->SetFont('Arial','B',10);
    $y= $pdf->GetY();
    $pdf->SetXY(155,$y);
    $pdf->MultiCell(0,6,"FORMULIR 1721 - A1",'','L',0);
    $pdf->SetFont('Arial','',6);
    $y= $pdf->GetY();
    $pdf->SetXY(140,$y);
    $pdf->MultiCell(0,3,"Lembar ke-1 : Untuk Penerima Penghasilan",'','L',0);
    $y= $pdf->GetY();
    $pdf->SetXY(140,$y);
    $pdf->MultiCell(0,3,"Lembar ke-2 : Untuk Pemotong",'','L',0);

    $y= $pdf->GetY();
    $pdf->SetXY(140,$y);
    $pdf->MultiCell(0,2,"",'','L',0);

    $pdf->SetFont('Arial','B',7);
    $y= $pdf->GetY();
    $pdf->SetXY(160,$y);
    $pdf->MultiCell(0,3,"MASA PEROLEHAN",'','C',0);
    $y= $pdf->GetY();
    $pdf->SetXY(160,$y);
    $pdf->MultiCell(0,3,"PENGHASILAN [mm-mm]",'','C',0);

    $pdf->SetLineWidth(0.6);
    $y= $pdf->GetY()+3;
    $pdf->SetXY(70,$y);
    $pdf->MultiCell(90,2,"",'LR','C',0);
    $pdf->SetFont('Arial','',7);
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(0,18,"",'LRTB','C',0);

    $pdf->SetLineWidth(0.2);
    $pdf->SetXY(12,$y+2);
    $pdf->MultiCell(20,3,"NPWP",'','L',0);
    $y= $pdf->GetY();
    $pdf->SetXY(12,$y);
    $pdf->MultiCell(20,3,"PEMOTONG",'','L',0);
    $pdf->SetXY(32,$y);
    $pdf->MultiCell(3,3,":",'','C',0);
    //$pdf->SetFont('Arial','',7);
    $pdf->SetXY(42,$y);
    $pdf->MultiCell(60,3,substr($npwp_pemotong,0,9),'B','C',0);
    $pdf->SetXY(102,$y);
    $pdf->MultiCell(3,3,"-",'','C',0);
    $pdf->SetXY(105,$y);
    $pdf->MultiCell(10,3,substr($npwp_pemotong,9,3),'B','C',0);
    $pdf->SetXY(115,$y);
    $pdf->MultiCell(3,3,".",'','C',0);
    $pdf->SetXY(118,$y);
    $pdf->MultiCell(10,3,substr($npwp_pemotong,12,3),'B','C',0);
    $pdf->SetFont('Arial','',7);
    $pdf->SetTextColor(0,0,0);
    $y= $pdf->GetY();
    $pdf->SetXY(12,$y+1);
    $pdf->MultiCell(20,3,"NAMA",'','L',0);
    $y= $pdf->GetY();
    $pdf->SetXY(12,$y);
    $pdf->MultiCell(20,3,"PEMOTONG",'','L',0);
    $pdf->SetXY(32,$y);
    $pdf->MultiCell(3,3,":",'','C',0);
    //$pdf->SetFont('Arial','',7);
    $pdf->SetXY(42,$y);
    $pdf->MultiCell(155,3,$nama_pemotong,'B','L',0);

    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(0,0,0);
    $y= $pdf->GetY()+4;
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(0,5,"A. IDENTITAS PENERIMA PENGHASILAN YANG DIPOTONG",'','L',0);

    $pdf->SetLineWidth(0.6);
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(0,39,"",'LRTB','C',0);

    $pdf->SetLineWidth(0.2);
    $pdf->SetFont('Arial','',6);
    $pdf->SetXY(12,$y+2);
    $pdf->MultiCell(5,3,"1.",'','L',0);
    $pdf->SetXY(17,$y+2);
    $pdf->MultiCell(15,3,"NPWP",'','L',0);
    $pdf->SetXY(32,$y+2);
    $pdf->MultiCell(3,3,":",'','C',0);
    $pdf->SetXY(41.5,$y+2);
    $pdf->MultiCell(47.5,3,substr($npwp,0,9),'B','L',0);
    $pdf->SetXY(89,$y+2);
    $pdf->MultiCell(3,3,"-",'','C',0);
    $pdf->SetXY(92,$y+2);
    $pdf->MultiCell(10,3,substr($npwp,9,3),'B','C',0);
    $pdf->SetXY(102,$y+2);
    $pdf->MultiCell(3,3,".",'','C',0);
    $pdf->SetXY(104,$y+2);
    $pdf->MultiCell(10,3,substr($npwp,-3),'B','C',0);
    $pdf->SetXY(121,$y+2);
    $pdf->MultiCell(5,3,"6.",'','L',0);
    $pdf->SetXY(126,$y+2);
    $pdf->MultiCell(0,3,"STATUS/JUMLAH TANGGUNGAN KELUARGA UNTUK PTKP",'','L',0);

    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(0,2,"",'','L',0);

    $y= $pdf->GetY();
    $pdf->SetXY(12,$y);
    $pdf->MultiCell(5,3,"2.",'','L',0);
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(15,3,"NIK/NO",'','L',0);
    $pdf->SetXY(125,$y);
    $pdf->MultiCell(5,3,"",'','L',0);
    $pdf->SetXY(126,$y);
    $pdf->MultiCell(5,3,"K /",'','L',0);
    $pdf->SetXY(147,$y);
    $pdf->MultiCell(7,3,"TK /",'','L',0);
    $pdf->SetXY(170,$y);
    $pdf->MultiCell(7,3,"HB /",'','L',0);

    $y= $pdf->GetY();
    $pdf->SetXY(12,$y);
    $pdf->MultiCell(5,3,"",'','L',0);
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(15,3,"PASPOR",'','L',0);
    $pdf->SetXY(32,$y);
    $pdf->MultiCell(3,3,":",'','C',0);
    $pdf->SetXY(41.5,$y);
    $pdf->MultiCell(72.5,3,$nik,'B','L',0);
    $pdf->SetXY(125,$y);
    $pdf->MultiCell(5,3,"",'','L',0);
    $pdf->SetFont('Arial','',10);
    $pdf->SetXY(131,$y);
    if(substr($status,0,1)=="K"){
        $pdf->MultiCell(8,3,substr($status,-1),'B','C',0);
    } else {
        $pdf->MultiCell(8,3,"",'B','C',0);
    }
    $pdf->SetXY(153,$y);
    if(substr($status,0,1)=="T"){
        $pdf->MultiCell(8,3,substr($status,-1),'B','C',0);
    } else {
        $pdf->MultiCell(8,3,"",'B','C',0);
    }
    $pdf->SetXY(176,$y);
    $pdf->MultiCell(8,3,"",'B','L',0);
    $pdf->SetFont('Arial','',6);

    $y= $pdf->GetY()+3;
    $pdf->SetXY(12,$y);
    $pdf->MultiCell(5,3,"3.",'','L',0);
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(15,3,"NAMA",'','L',0);
    $pdf->SetXY(32,$y);
    $pdf->MultiCell(3,3,":",'','C',0);
    $pdf->SetXY(41.5,$y);
    $pdf->MultiCell(72.5,3,$nama,'B','L',0);
    $pdf->SetXY(125,$y);
    $pdf->MultiCell(5,3,"",'','L',0);
    $pdf->SetXY(121,$y);
    $pdf->MultiCell(5,3,"7.",'','L',0);
    $pdf->SetXY(126,$y);
    $pdf->MultiCell(20,3,"NAMA JABATAN :",'','L',0);
    $pdf->SetXY(153,$y);
    $pdf->MultiCell(43,3,$jabatan2,'B','L',0);

    $y= $pdf->GetY()+3;
    $pdf->SetXY(12,$y);
    $pdf->MultiCell(5,3,"4.",'','L',0);
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(15,3,"ALAMAT",'','L',0);
    $pdf->SetXY(32,$y);
    $pdf->MultiCell(3,3,":",'','C',0);
    $pdf->SetXY(41.5,$y);
    $pdf->MultiCell(72.5,3,$alamat1,'B','L',0);
    $pdf->SetXY(125,$y);
    $pdf->MultiCell(5,3,"",'','L',0);
    $pdf->SetXY(121,$y);
    $pdf->MultiCell(5,3,"8.",'','L',0);
    $pdf->SetXY(126,$y);
    $pdf->MultiCell(25,3,"KARYAWAN ASING :",'','L',0);
    $pdf->SetXY(164,$y-1.5);
    $pdf->MultiCell(6,5,"",'LRTB','L',0);
    $pdf->SetFont('Arial','B',7);
    $pdf->SetXY(171,$y);
    $pdf->MultiCell(7,3,"YA",'','L',0);

    $pdf->SetFont('Arial','',6);
    $y= $pdf->GetY()+3;
    $pdf->SetXY(12,$y);
    $pdf->MultiCell(5,3,"",'','L',0);
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(15,3,"",'','L',0);
    $pdf->SetXY(32,$y);
    $pdf->MultiCell(3,3,"",'','C',0);
    $pdf->SetXY(41.5,$y);
    $pdf->MultiCell(72.5,3,$alamat2,'B','L',0);
    $pdf->SetXY(125,$y);
    $pdf->MultiCell(5,3,"",'','L',0);
    $pdf->SetXY(121,$y);
    $pdf->MultiCell(5,3,"9.",'','L',0);
    $pdf->SetXY(126,$y);
    $pdf->MultiCell(30,3,"KODE NEGARA DOMISILI :",'','L',0);
    $pdf->SetXY(164,$y);
    $pdf->MultiCell(8,3,"",'B','L',0);

    $y= $pdf->GetY()+3;
    $pdf->SetXY(12,$y);
    $pdf->MultiCell(5,3,"5.",'','L',0);
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(20,3,"JENIS KELAMIN :",'','L',0);
    $pdf->SetXY(52,$y-1.5);
    if($jenis_kelamin=="L"){
        $pdf->MultiCell(6,5,"X",'LRTB','C',0);
    } else {
        $pdf->MultiCell(6,5,"",'LRTB','C',0);
    }
    $pdf->SetXY(59,$y);
    $pdf->MultiCell(20,3,"LAKI-LAKI",'','L',0);
    $pdf->SetXY(86,$y-1.5);
    if($jenis_kelamin=="P"){
        $pdf->MultiCell(6,5,"X",'LRTB','C',0);
    } else {
        $pdf->MultiCell(6,5,"",'LRTB','C',0);
    }
    $pdf->SetXY(93,$y);
    $pdf->MultiCell(20,3,"PEREMPUAN",'','L',0);

    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(0,0,0);
    $y= $pdf->GetY()+4;
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
    $pdf->MultiCell(142,7,"KODE OBJEK PAJAK",'LRTB','L',0);
    $pdf->SetXY(40,$y);
    $pdf->MultiCell(5,7,":",'','L',0);
    $pdf->SetXY(43,$y+1);
    $pdf->MultiCell(6,5,"X",'LRTB','C',0);
    $pdf->SetXY(50,$y);
    $pdf->MultiCell(20,7,"21-100-01",'','L',0);
    $pdf->SetXY(67,$y+1);
    $pdf->MultiCell(6,5,"",'LRTB','L',0);
    $pdf->SetXY(74,$y);
    $pdf->MultiCell(20,7,"21-100-02",'','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,7,"",'LRTB','C',1);
    
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(142,6,"PENGHASILAN BRUTO :",'LRTB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,"",'LRTB','C',1);

    $pdf->SetFont('Arial','',6.3);
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(6,6,"1.",'LRTB','C',0);
    $pdf->SetXY(16,$y);
    $pdf->MultiCell(136,6,"GAJI/PENSIUN ATAU THT/JHT",'RTB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,number_format($gaji,0,',','.'),'RTB','R',0);

    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(6,6,"2.",'LRB','C',0);
    $pdf->SetXY(16,$y);
    $pdf->MultiCell(136,6,"TUNJANGAN PPh",'RB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,number_format($tunjangan_pph,0,',','.'),'RB','R',0);

    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(6,6,"3.",'LRB','C',0);
    $pdf->SetXY(16,$y);
    $pdf->MultiCell(136,6,"TUNJANGAN LAINNYA, UANG LEMBUR DAN SEBAGAINYA",'RB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,number_format($tunjangan_variable,0,',','.'),'RB','R',0);

    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(6,6,"4.",'LRB','C',0);
    $pdf->SetXY(16,$y);
    $pdf->MultiCell(136,6,"HONORARIUM DAN IMBALAN LAIN SEJENISNYA",'RB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,number_format($honorarium,0,',','.'),'RB','R',0);

    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(6,6,"5.",'LRB','C',0);
    $pdf->SetXY(16,$y);
    $pdf->MultiCell(136,6,"PREMI ASURANSI YANG DIBAYAR PEMBERI KERJA",'RB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,number_format($benefit,0,',','.'),'RB','R',0);

    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(6,6,"6.",'LRB','C',0);
    $pdf->SetXY(16,$y);
    $pdf->MultiCell(136,6,"PENERIMAAN DALAM BENTUK NATUNA DAN KENIKMATAN LAINNYA YANG DIKENAKAN PEMOTONGAN PPh PASAL 21",'RB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,number_format($natuna,0,',','.'),'RB','R',0);

    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(6,6,"7.",'LRB','C',0);
    $pdf->SetXY(16,$y);
    $pdf->MultiCell(136,6,"TANTIEM, BONUS, GRATIFIKASI, JASA PRODUKSI DAN THR",'RB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,number_format($bonus_thr,0,',','.'),'RB','R',0);

    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(6,6,"8.",'LRB','C',0);
    $pdf->SetXY(16,$y);
    $pdf->MultiCell(136,6,"JUMLAH PENGHASILAN BRUTO (1 S.D 7)",'RB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,number_format($brutot,0,',','.'),'R','R',0);

    $pdf->SetFont('Arial','B',7);
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(142,6,"PENGURANGAN :",'LRB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,"",'LRTB','C',1);

    $pdf->SetFont('Arial','',6.3);
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(6,6,"9.",'LRB','C',0);
    $pdf->SetXY(16,$y);
    $pdf->MultiCell(136,6,"BIAYA JABATAN / BIAYA PENSIUN",'RB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,number_format($biaya_jabatant,0,',','.'),'RB','R',0);

    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(6,6,"10.",'LRB','C',0);
    $pdf->SetXY(16,$y);
    $pdf->MultiCell(136,6,"IURAN PENSIUN ATAU IURAN THT/JHT",'RB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,number_format($iuran_pensiunt,0,',','.'),'RB','R',0);

    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(6,6,"11.",'LRB','C',0);
    $pdf->SetXY(16,$y);
    $pdf->MultiCell(136,6,"JUMLAH PENGURANGAN (9 S.D 10)",'RB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,number_format($biaya_pengurangt,0,',','.'),'R','R',0);

    $pdf->SetFont('Arial','B',7);
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(142,6,"PENGHITUNGAN PPh PASAL 21 :",'LRB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,"",'LRTB','C',1);

    $pdf->SetFont('Arial','',6.3);
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(6,6,"12.",'LRB','C',0);
    $pdf->SetXY(16,$y);
    $pdf->MultiCell(136,6,"JUMLAH PENGHASILAN NETTO (8-11)",'RB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,number_format($nettot,0,',','.'),'RB','R',0);

    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(6,6,"13.",'LRB','C',0);
    $pdf->SetXY(16,$y);
    $pdf->MultiCell(136,6,"PENGHASILAN NETTO MASA SEBELUMNYA",'RB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,number_format($nettot_sebelumnya,0,',','.'),'RB','R',0);

    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(6,6,"14.",'LRB','C',0);
    $pdf->SetXY(16,$y);
    $pdf->MultiCell(136,6,"JUMLAH PENGHASILAN NETTO UNTUK PENGHITUNGAN PPh PASAL 21 (SETAHUN/DISETAHUNKAN)",'RB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,number_format($nettot_akhir,0,',','.'),'RB','R',0);

    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(6,6,"15.",'LRB','C',0);
    $pdf->SetXY(16,$y);
    $pdf->MultiCell(136,6,"PENGHASILAN TIDAK KENA PAJAK (PTKP)",'RB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,number_format($ptkp,0,',','.'),'RB','R',0);

    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(6,6,"16.",'LRB','C',0);
    $pdf->SetXY(16,$y);
    $pdf->MultiCell(136,6,"PENGHASILAN KENA PAJAK SETAHUN/DISETAHUNKAN (14 - 15)",'RB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,number_format($pkp,0,',','.'),'RB','R',0);

    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(6,6,"17.",'LRB','C',0);
    $pdf->SetXY(16,$y);
    $pdf->MultiCell(136,6,"PPh PASAL 21 ATAS PENGHASILAN KENA PAJAK SETAHUN/DISETAHUNKAN",'RB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,number_format($ppht,0,',','.'),'RB','R',0);

    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(6,6,"18.",'LRB','C',0);
    $pdf->SetXY(16,$y);
    $pdf->MultiCell(136,6,"PPh PASAL 21 YANG TELAH DIPOTONG MASA SEBELUMNYA",'RB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,number_format($ppht_sebelumnya,0,',','.'),'RB','R',0);

    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(6,6,"19.",'LRB','C',0);
    $pdf->SetXY(16,$y);
    $pdf->MultiCell(136,6,"PPh PASAL 21 TERUTANG",'RB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,number_format($ppht_terutang,0,',','.'),'RB','R',0);

    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(6,6,"20.",'LRB','C',0);
    $pdf->SetXY(16,$y);
    $pdf->MultiCell(136,6,"PPh PASAL 21 DAN PPh PASAL 26 YANG TELAH DIPOTONG DAN DILUNASI",'RB','L',0);
    $pdf->SetFillColor(230,230,230);
    $pdf->SetXY(152,$y);
    $pdf->MultiCell(0,6,number_format($ppht_terutang,0,',','.'),'RB','R',0);

    $pdf->SetFont('Arial','B',7);
    $pdf->SetTextColor(0,0,0);
    $y= $pdf->GetY()+2;
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(0,5,"C. IDENTITAS PEMOTONG",'','L',0);

    $pdf->SetLineWidth(0.6);
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(0,20,"",'LRTB','C',0);

    $pdf->SetLineWidth(0.2);
    $pdf->SetFont('Arial','B',6.5);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetXY(10,266);
    $pdf->MultiCell(5,5,"1.",'','L',0);
    $pdf->SetXY(14,266);
    $pdf->MultiCell(10,5,"NPWP",'','L',0);
    $pdf->SetXY(24,266);
    $pdf->MultiCell(3,5,":",'','L',0);
    $pdf->SetXY(36,266);
    $pdf->MultiCell(42,5,substr($npwp_pejabat,0,9),'B','C',0);
    $pdf->SetXY(78,266);
    $pdf->MultiCell(4,5,"-",'','L',0);
    $pdf->SetXY(82,266);
    $pdf->MultiCell(8,5,substr($npwp_pejabat,9,3),'B','C',0);
    $pdf->SetXY(91,266);
    $pdf->MultiCell(4,5,".",'','L',0);
    $pdf->SetXY(93,266);
    $pdf->MultiCell(8,5,substr($npwp_pejabat,-3),'B','C',0);
    $pdf->SetXY(107,266);
    $pdf->MultiCell(0,5,"3. TANGGAL & TANDA TANGAN",'','L',0);

    $y= $pdf->GetY()+3;
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(5,5,"2.",'','L',0);
    $pdf->SetXY(14,$y);
    $pdf->MultiCell(10,5,"NAMA",'','L',0);
    $pdf->SetXY(24,$y);
    $pdf->MultiCell(3,5,":",'','L',0);
    $pdf->SetXY(36,$y);
    $pdf->MultiCell(65,5,$nama_pejabat,'B','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(13,5,substr($tgl_buat,8,2),'B','C',0);
    $pdf->SetXY(120,$y);
    $pdf->MultiCell(3,5,"-",'','L',0);
    $pdf->SetXY(122,$y);
    $pdf->MultiCell(13,5,substr($tgl_buat,5,2),'B','C',0);
    $pdf->SetXY(135,$y);
    $pdf->MultiCell(3,5,"-",'','L',0);
    $pdf->SetXY(137,$y);
    $pdf->MultiCell(20,5,substr($tgl_buat,0,4),'B','C',0);
    
    $y= $pdf->GetY();
    $pdf->SetXY(112,$y);
    $pdf->MultiCell(0,5,"[dd-mm-yyyy]",'','L',0);

    /*
    if($kelompok=="TEKNIK"){
        $pdf->Image('images/ttdpajakplnt.jpg',168,267,0,16);
    } else {
        $pdf->Image('images/ttdpajak.jpg',168,267,0,16);
    }
    */
    // $pdf->Image($path_ttd,168,267,0,16);
    if($path_ttd=="" || $path_ttd==null){
        $pdf->Image('../assets/ttd/ttdbaru.jpeg',168,266.5,0,17);
    } else {
        $pdf->Image("../".$path_ttd,168,266.5,0,17);
    }    
    $pdf->SetLineWidth(0.2);
    $pdf->SetXY(160,267);
    $pdf->MultiCell(38,16,"",'LRTB','C',0);

    //$pdf->SetTextColor(161,161,120);
    $pdf->SetTextColor(0,139,139);
    $pdf->SetFont('Arial','',6);
    $pdf->SetXY(90,33);
    $pdf->MultiCell(7,3,"H.01",'','C',0);
    $pdf->SetXY(160,33);
    $pdf->MultiCell(7,3,"H.02",'','C',0);

    $pdf->SetFont('Arial','',6);
    $pdf->SetXY(35,43);
    $pdf->MultiCell(7,3,"H.03",'','C',0);
    $pdf->SetXY(35,51);
    $pdf->MultiCell(7,3,"H.04",'','C',0);

    $pdf->SetXY(35,64);
    $pdf->MultiCell(7,3,"A.01",'','C',0);

    $pdf->SetXY(35,72);
    $pdf->MultiCell(7,3,"A.02",'','C',0);
    $pdf->SetXY(138,72);
    $pdf->MultiCell(7,3,"A.07",'','C',0);
    $pdf->SetXY(160,72);
    $pdf->MultiCell(7,3,"A.08",'','C',0);
    $pdf->SetXY(183,72);
    $pdf->MultiCell(7,3,"A.09",'','C',0);

    $pdf->SetXY(35,78);
    $pdf->MultiCell(7,3,"A.03",'','C',0);
    $pdf->SetXY(147,78);
    $pdf->MultiCell(7,3,"A.10",'','C',0);

    $pdf->SetXY(35,84.5);
    $pdf->MultiCell(7,3,"A.04",'','C',0);
    $pdf->SetXY(156,84);
    $pdf->MultiCell(7,3,"A.11",'','C',0);

    $pdf->SetXY(157,90);
    $pdf->MultiCell(7,3,"A.12",'','C',0);

    $pdf->SetXY(45,96);
    $pdf->MultiCell(7,3,"A.05",'','C',0);
    $pdf->SetXY(79,96);
    $pdf->MultiCell(7,3,"A.06",'','C',0);

    $pdf->SetXY(27,267.5);
    $pdf->MultiCell(7,3,"C.01",'','C',0);
    $pdf->SetXY(27,276);
    $pdf->MultiCell(7,3,"C.02",'','C',0);
    $pdf->SetXY(101,276);
    $pdf->MultiCell(7,3,"C.03",'','C',0);

    $pdf->SetFillColor(0,0,0);
    $pdf->SetXY(10,289);
    $pdf->MultiCell(5.8,2.5,"",'','C',1);
    $pdf->SetXY(194.5,289);
    $pdf->MultiCell(5.8,2.5,"",'','C',1);
    
    $pdf->Output();
}
?>
