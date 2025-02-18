<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    function TanggalIndo($date){
        if(strtotime($date)){
            $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;	
            return($result);
        } else {
            return("");
        }
    }
    function TanggalIndo4($date){
        if(strtotime($date)){
            $BulanIndo = array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agt", "Sep", "Okt", "Nop", "Des");
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $result = $tgl . "-" . $BulanIndo[(int)$bulan-1] . "-". $tahun;	
            return($result);
        } else {
            return("");
        }
    }
    
    function TanggalIndo3($date){
        if(strtotime($date)){
            $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $result = $BulanIndo[(int)$bulan-1] . " ". $tahun;	
            return($result);
        } else {
            return("");
        }
    }
    
    function TanggalIndo2($date){
        if(strtotime($date)){
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $result = $tgl . "-" . $bulan . "-". $tahun;	
            return($result);
        } else {
            return("");
        }
    }
    function terbilang($x){
        $x = (int)$x;
        $abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");        
        if ($x < 12)
          return " " . $abil[$x];
        elseif ($x < 20)
          return Terbilang($x - 10) . " Belas";
        elseif ($x < 100)
          return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);
        elseif ($x < 200)
          return " Seratus" . Terbilang($x - 100);
        elseif ($x < 1000)
          return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);
        elseif ($x < 2000)
          return " Seribu" . Terbilang($x - 1000);
        elseif ($x < 1000000)
          return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);
        elseif ($x < 1000000000)
          return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);
    }        
    $tempdir = "temp/"; 
    if (!file_exists($tempdir))
        mkdir($tempdir);

    include "koneksi.php";
    include "koneksi_sipeg.php";
    include "../fungsi.php";
    include "../phpqrcode/qrlib.php";
    require('../force_justify.php');
    $idsppd = $_REQUEST['idsppd'];

    $hari_ini = date("Y-m-d");
    $hari_ini2 = TanggalIndo($hari_ini);

    $pdf = new FPDF('p','mm','A4');
    $pdf->SetMargins(10, 15, 10);
    $pdf->AliasNbPages();
    $pdf->SetAutoPageBreak(false);
    $pdf->SetFillColor(183,183,183);

    $rs = mysqli_query($koneksi,"select * from sppd1 where idsppd='$idsppd'");
    $hasil = mysqli_fetch_array($rs);
    $tanggal = stripslashesx ($hasil['tanggal']);
    $nip = stripslashesx ($hasil['nip']);
    $nama = stripslashesx ($hasil['nama']);
    $grade = stripslashesx ($hasil['grade']);
    $jabatan = stripslashesx ($hasil['jabatan']);
    $jenis_sppd = stripslashesx ($hasil['jenis_sppd']);
    $level_sppd = stripslashesx ($hasil['level_sppd']);
    $no_sppd = stripslashesx ($hasil['no_sppd']);
    $kedudukan = stripslashesx ($hasil['kedudukan']);
    $tujuan = stripslashesx ($hasil['tujuan']);
    $transportasi = stripslashesx ($hasil['transportasi']);
    $tgl_awal = stripslashesx ($hasil['tgl_awal']);
    $tgl_awal2 = TanggalIndo($tgl_awal);
    $tgl_akhir = stripslashesx ($hasil['tgl_akhir']);
    $tgl_akhir2 = TanggalIndo($tgl_akhir);
    $hari = intval($hasil['hari']);
    $hari1 = $hari;
    $hari2 = $hari-1;

    // $rs2 = mysqli_query($koneksi,"select * from data_pegawai where nip='$nip'");
    // $hasil2 = mysqli_fetch_array($rs2);
    // $tanggal = stripslashesx ($hasil['tanggal']);

    //$nama_pejabat = $row2->nama2;
    //$jabatan_pejabat = $row2->jabatan2;
    $total_hari = $hari;
    $total_hari2 = $hari-1;
    $tgl_berangkat = TanggalIndo($tgl_awal);
    $tgl_kembali = TanggalIndo($tgl_akhir);

    $maksud = stripslashesx ($hasil['maksud']);
    $agenda = stripslashesx ($hasil['agenda']);
    $kedudukan = stripslashesx ($hasil['kedudukan']);
    $tujuan = stripslashesx ($hasil['tujuan']);
    $tujuannya = explode(",",$tujuan);
    $jumlah_tujuan = count($tujuannya);
    $tujuan1 = $tujuannya[0];
    $tujuan2 = "";
    $tujuan3 = "";
    $tujuan4 = "";
    if($jumlah_tujuan==2){
        $tujuan2 = $tujuannya[1];    
    }
    if($jumlah_tujuan==3){
        $tujuan3 = $tujuannya[2];    
    }
    if($jumlah_tujuan==4){
        $tujuan4 = $tujuannya[3];    
    }
    $kota_tiba1 = $tujuan1;
    $tgl_tiba1 = TanggalIndo($tgl_awal);
    if($tujuan2!=""){
        $kota_berangkat1 = $tujuan1;
        $kota_tujuan1 = $tujuan2;
        $tgl_berangkat1 = "";
    } else {
        $kota_berangkat1 = $tujuan1;
        $kota_tujuan1 = $kedudukan;
        $tgl_berangkat1 = TanggalIndo($tgl_akhir);
    }
    if($tujuan3!=""){
        $kota_tiba2 = $tujuan2;
        $tgl_tiba2 = "";
        $kota_berangkat2 = $tujuan2;
        $kota_tujuan2 = $tujuan3;
        $tgl_berangkat2 = "";
    } else {
        $kota_tiba2 = "";
        $tgl_tiba2 = "";
        $kota_berangkat2 = "";
        $kota_tujuan2 = "";
        $tgl_berangkat2 = "";
    }
    if($tujuan4!=""){
        $kota_tiba3 = $tujuan3;
        $tgl_tiba3 = "";
        $kota_berangkat3 = $tujuan3;
        $kota_tujuan3 = $kedudukan;
        $tgl_berangkat3 = "";
    } else {
        $kota_tiba3 = "";
        $tgl_tiba3 = "";
        $kota_berangkat3 = "";
        $kota_tujuan3 = "";
        $tgl_berangkat3 = "";
    }

    $rs3 = mysqli_query($koneksi,"select * from biaya_sppd1 where idsppd='$idsppd'");
    $hasil3 = mysqli_fetch_array($rs3);
    $biaya_transporta = stripslashesx ($hasil3['transporta']);
    $biaya_transportb = stripslashesx ($hasil3['transportb']);
    $biaya_transportc = stripslashesx ($hasil3['transportc']);
    $biaya_transportd = stripslashesx ($hasil3['transportd']);
    $total_transport = stripslashesx ($hasil3['total_transport']);
    $transportasi_lokal = stripslashesx ($hasil3['transportasi_lokal']);
    $airport_tax = stripslashesx ($hasil3['airport_tax']);

    $hari_konsumsi1 = stripslashesx ($hasil3['hari_konsumsi1']);
    $persen_konsumsi1 = stripslashesx ($hasil3['persen_konsumsi1']);
    $nilai_konsumsi1 = stripslashesx ($hasil3['nilai_konsumsi1']);
    $total_konsumsi1 = stripslashesx ($hasil3['total_konsumsi1']);
    $hari_laundry1 = stripslashesx ($hasil3['hari_laundry1']);
    $persen_laundry1 = stripslashesx ($hasil3['persen_laundry1']);
    $nilai_laundry1 = stripslashesx ($hasil3['nilai_laundry1']);
    $total_laundry1 = stripslashesx ($hasil3['total_laundry1']);
    $hari_penginapan1 = stripslashesx ($hasil3['hari_penginapan1']);
    $persen_penginapan1 = stripslashesx ($hasil3['persen_penginapan1']);
    $nilai_penginapan1 = stripslashesx ($hasil3['nilai_penginapan1']);
    $total_penginapan1 = stripslashesx ($hasil3['total_penginapan1']);

    $hari_konsumsi2 = stripslashesx ($hasil3['hari_konsumsi2']);
    $persen_konsumsi2 = stripslashesx ($hasil3['persen_konsumsi2']);
    $nilai_konsumsi2 = stripslashesx ($hasil3['nilai_konsumsi2']);
    $total_konsumsi2 = stripslashesx ($hasil3['total_konsumsi2']);
    $hari_laundry2 = stripslashesx ($hasil3['hari_laundry2']);
    $persen_laundry2 = stripslashesx ($hasil3['persen_laundry2']);
    $nilai_laundry2 = stripslashesx ($hasil3['nilai_laundry2']);
    $total_laundry2 = stripslashesx ($hasil3['total_laundry2']);
    $hari_penginapan2 = stripslashesx ($hasil3['hari_penginapan2']);
    $persen_penginapan2 = stripslashesx ($hasil3['persen_penginapan2']);
    $nilai_penginapan2 = stripslashesx ($hasil3['nilai_penginapan2']);
    $total_penginapan2 = stripslashesx ($hasil3['total_penginapan2']);

    $hari_pegawai = stripslashesx ($hasil3['hari_pegawai']);
    $persen_pegawai = stripslashesx ($hasil3['persen_pegawai']);
    $nilai_pegawai = stripslashesx ($hasil3['nilai_pegawai']);
    $total_pegawai = stripslashesx ($hasil3['total_pegawai']);

    $keluarga = stripslashesx ($hasil3['keluarga']);
    $hari_keluarga = stripslashesx ($hasil3['hari_keluarga']);
    $persen_keluarga = stripslashesx ($hasil3['persen_keluarga']);
    $nilai_keluarga = stripslashesx ($hasil3['nilai_keluarga']);
    $total_keluarga = stripslashesx ($hasil3['total_keluarga']);

    $pengantar = stripslashesx ($hasil3['pengantar']);
    $hari_pengantar = stripslashesx ($hasil3['hari_pengantar']);
    $persen_pengantar = stripslashesx ($hasil3['persen_pengantar']);
    $nilai_pengantar = stripslashesx ($hasil3['nilai_pengantar']);
    $total_pengantar = stripslashesx ($hasil3['total_pengantar']);

    $hari_suamiistri = stripslashesx ($hasil3['hari_suamiistri']);
    $persen_suamiistri = stripslashesx ($hasil3['persen_suamiistri']);
    $nilai_suamiistri = stripslashesx ($hasil3['nilai_suamiistri']);
    $total_suamiistri = stripslashesx ($hasil3['total_suamiistri']);

    $anak = stripslashesx ($hasil3['anak']);
    $hari_anak = stripslashesx ($hasil3['hari_anak']);
    $persen_anak = stripslashesx ($hasil3['persen_anak']);
    $nilai_anak = stripslashesx ($hasil3['nilai_anak']);
    $total_anak = stripslashesx ($hasil3['total_anak']);

    $berat_pengepakan = stripslashesx ($hasil3['berat_pengepakan']);
    $nilai_pengepakan = stripslashesx ($hasil3['nilai_pengepakan']);
    $total_pengepakan = stripslashesx ($hasil3['total_pengepakan']);
    $total1 = stripslashesx ($hasil3['total']);
    $total2 = 0;
    $total = $total1+$total2;

    //$ttd = "";

    $approval1 = stripslashesx ($hasil['approval1']);
    $rs4 = mysqli_query($koneksi,"select * from data_pegawai where nip='$approval1'");
    $hasil4 = mysqli_fetch_array($rs4);
    if($hasil4){
        $nip_pejabat = $approval1;
        $nama_pejabat = stripslashesx ($hasil4['nama']);
        $jabatan_pejabat = stripslashesx ($hasil4['jabatan']);
    } else {
        $nip2 = "";
        $nama_pejabat = "";
        $jabatan_pejabat = "";
    }

    // $approvalsdm = stripslashesx ($hasil['approvalsdm']);
    // $rs4 = mysqli_query($koneksi,"select * from data_pegawai where nip='$approvalsdm'");
    // $hasil4 = mysqli_fetch_array($rs4);
    // if($hasil4){
    //     $nip_sdm = $approvalsdm;
    //     $nama_sdm = stripslashesx ($hasil4['nama']);
    //     $jabatan_sdm = stripslashesx ($hasil4['jabatan']);
    //     $ttd_sdm = "";
    // } else {
    //     $nip_sdm = "";
    //     $nama_sdm = "";
    //     $jabatan_sdm = "";
    //     $ttd_sdm = "";
    // }

    // $approvalbayar = stripslashesx ($hasil['approvalbayar']);
    // $rs4 = mysqli_query($koneksi,"select * from data_pegawai where nip='$approvalbayar'");
    // $hasil4 = mysqli_fetch_array($rs4);
    // if($hasil4){
    //     $nip_keuangan = $approvalsdm;
    //     $nama_keuangan = stripslashesx ($hasil4['nama']);
    //     $jabatan_keuangan = stripslashesx ($hasil4['jabatan']);
    //     $ttd_keuangan = "";
    // } else {
    //     $nip_keuangan = "";
    //     $nama_keuangan = "";
    //     $jabatan_keuangan = "";
    //     $ttd_keuangan = "";
    // }

    $no = 1;
    $nama_pengikut1 = "";
    $nama_pengikut2 = "";
    $nama_pengikut3 = "";
    $nama_pengikut4 = "";
    $nama_pengikut5 = "";
    $hubungan_pengikut1 = "";
    $hubungan_pengikut2 = "";
    $hubungan_pengikut3 = "";
    $hubungan_pengikut4 = "";
    $hubungan_pengikut5 = "";
    $rs2 = mysqli_query($koneksi,"select * from pengikut_sppd where idsppd='$idsppd'");
    while($hasil2 = mysqli_fetch_array($rs2)){
        if($no==1){
            $nama_pengikut1 = stripslashesx ($hasil2['nama']);
            $hubungan_pengikut1 = stripslashesx ($hasil2['hubungan']);
        } else if($no==2){
            $nama_pengikut2 = stripslashesx ($hasil2['nama']);
            $hubungan_pengikut2 = stripslashesx ($hasil2['hubungan']);
        } else if($no==3){
            $nama_pengikut3 = stripslashesx ($hasil2['nama']);
            $hubungan_pengikut3 = stripslashesx ($hasil2['hubungan']);
        } else if($no==4){
            $nama_pengikut4 = stripslashesx ($hasil2['nama']);
            $hubungan_pengikut4 = stripslashesx ($hasil2['hubungan']);
        } else if($no==5){
            $nama_pengikut5 = stripslashesx ($hasil2['nama']);
            $hubungan_pengikut4 = stripslashesx ($hasil2['hubungan']);
        }
        $no=$no+1;
    }

    $kode_barcode = "PLN NUSA DAYA\nSPPD\n".$tanggal."\n".$no_sppd."\n".$nip."\n".$nama; 
    $namafile = $no_sppd."-".$nip.".png";
    $namafile = str_replace('/','_',$namafile);
    $level=QR_ECLEVEL_H;
    //$UkuranPixel=10;
    $UkuranPixel=6;
    $UkuranFrame=4;
    QRcode::png($kode_barcode, $tempdir.$namafile, $level, $UkuranPixel, $UkuranFrame); 
    $QR = imagecreatefrompng($tempdir.$namafile);
    $logopath="../images/plnndwarna.png";
    $logo = @imagecreatefromstring(file_get_contents($logopath));    
    imagecolortransparent($logo , imagecolorallocatealpha($logo , 0, 0, 0, 127));
    imagealphablending($logo , false);
    imagesavealpha($logo , true);
    $QR_width = imagesx($QR);
    $QR_height = imagesy($QR);   
    $logo_width = imagesx($logo);
    $logo_height = imagesy($logo);   
    $logo_qr_width = $QR_width/1.5;
    $scale = $logo_width/$logo_qr_width;
    $logo_qr_height = $logo_height/$scale;   
    @imagecopyresampled($QR, $logo, $QR_width/6, $QR_height/2.5, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
    imagepng($QR,$tempdir.$namafile);   
    $ttd = $tempdir.$namafile;

    $kode_barcode = "PLN NUSA DAYA\nSPPD\n".$tanggal."\n".$no_sppd."\n".$nama."\nAPPROVAL ATASAN : \n".$nip_pejabat."\n".$nama_pejabat; 
    $namafile = $no_sppd."-".$nip_pejabat.".png";
    $namafile = str_replace('/','_',$namafile);
    $level=QR_ECLEVEL_H;
    //$UkuranPixel=10;
    $UkuranPixel=6;
    $UkuranFrame=4;
    QRcode::png($kode_barcode, $tempdir.$namafile, $level, $UkuranPixel, $UkuranFrame); 
    $QR = imagecreatefrompng($tempdir.$namafile);
    $logopath="../images/plnndwarna.png";
    $logo = @imagecreatefromstring(file_get_contents($logopath));    
    imagecolortransparent($logo , imagecolorallocatealpha($logo , 0, 0, 0, 127));
    imagealphablending($logo , false);
    imagesavealpha($logo , true);
    $QR_width = imagesx($QR);
    $QR_height = imagesy($QR);   
    $logo_width = imagesx($logo);
    $logo_height = imagesy($logo);   
    $logo_qr_width = $QR_width/1.5;
    $scale = $logo_width/$logo_qr_width;
    $logo_qr_height = $logo_height/$scale;   
    @imagecopyresampled($QR, $logo, $QR_width/6, $QR_height/2.5, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
    imagepng($QR,$tempdir.$namafile);   
    $ttd_pejabat = $tempdir.$namafile;    

    //Halaman 1
    $pdf->AddPage();

    $pdf->SetFont('Arial','',8);
    $pdf->Image('../images/plnndwarna.png',10,10,30,0);

    $pdf->SetFont('Arial','B',12);
    $y= $pdf->GetY()+10;
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(0,5,"LAPORAN PERJALANAN DINAS DAN PERMOHONAN RESTITUSI",'','C',0);
    
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(0,4,"",'','C',0);

    $pdf->SetFont('Arial','B',9);
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(10,5,"I.",'','L',0);
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,5,"Data Pegawai",'','L',0);

    $pdf->SetFont('Arial','',9);
    $y= $pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(5,5,"a.",'','L',0);
    $pdf->SetXY(22,$y);
    $pdf->MultiCell(48,5,"Nama",'','L',0);
    $pdf->SetXY(70,$y);
    $pdf->MultiCell(5,5,":",'','L',0);
    $pdf->SetXY(75,$y);
    $pdf->MultiCell(0,5,$nama,'','L',0);

    $y= $pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(5,5,"b.",'','L',0);
    $pdf->SetXY(22,$y);
    $pdf->MultiCell(48,5,"Nomor Induk",'','L',0);
    $pdf->SetXY(70,$y);
    $pdf->MultiCell(5,5,":",'','L',0);
    $pdf->SetXY(75,$y);
    $pdf->MultiCell(0,5,$nip,'','L',0);

    $y= $pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(5,5,"c.",'','L',0);
    $pdf->SetXY(22,$y);
    $pdf->MultiCell(48,5,"Jabatan",'','L',0);
    $pdf->SetXY(70,$y);
    $pdf->MultiCell(5,5,":",'','L',0);
    $pdf->SetXY(75,$y);
    $pdf->MultiCell(0,5,$jabatan,'','L',0);

    $y= $pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(5,5,"d.",'','L',0);
    $pdf->SetXY(22,$y);
    $pdf->MultiCell(48,5,"Unit Organisasi",'','L',0);
    $pdf->SetXY(70,$y);
    $pdf->MultiCell(5,5,":",'','L',0);
    $pdf->SetXY(75,$y);
    $pdf->MultiCell(0,5,'','','L',0);
    
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(0,2,"",'','C',0);

    $pdf->SetFont('Arial','B',9);
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(10,5,"II.",'','L',0);
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,5,"Surat Perintah Perjalanan Dinas",'','L',0);

    $pdf->SetFont('Arial','',9);
    $y= $pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(5,5,"a.",'','L',0);
    $pdf->SetXY(22,$y);
    $pdf->MultiCell(48,5,"Nomor Agenda *) di isi admin",'','L',0);
    $pdf->SetXY(70,$y);
    $pdf->MultiCell(5,5,":",'','L',0);
    $pdf->SetXY(75,$y);
    $pdf->MultiCell(0,5,'','','L',0);

    $y= $pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(5,5,"b.",'','L',0);
    $pdf->SetXY(22,$y);
    $pdf->MultiCell(48,5,"Tempat Berangkat",'','L',0);
    $pdf->SetXY(70,$y);
    $pdf->MultiCell(5,5,":",'','L',0);
    $pdf->SetXY(75,$y);
    $pdf->MultiCell(0,5,$kedudukan,'','L',0);

    $y= $pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(5,5,"b.",'','L',0);
    $pdf->SetXY(22,$y);
    $pdf->MultiCell(48,5,"Tempat Tujuan",'','L',0);
    $pdf->SetXY(70,$y);
    $pdf->MultiCell(5,5,":",'','L',0);
    $pdf->SetXY(75,$y);
    $pdf->MultiCell(0,5,$tujuan,'','L',0);

    $y= $pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(5,5,"c.",'','L',0);
    $pdf->SetXY(22,$y);
    $pdf->MultiCell(48,5,"Tanggal Berangkat",'','L',0);
    $pdf->SetXY(70,$y);
    $pdf->MultiCell(5,5,":",'','L',0);
    $pdf->SetXY(75,$y);
    $pdf->MultiCell(0,5,$tgl_awal2,'','L',0);

    $y= $pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(5,5,"d.",'','L',0);
    $pdf->SetXY(22,$y);
    $pdf->MultiCell(48,5,"Tanggal Kembali",'','L',0);
    $pdf->SetXY(70,$y);
    $pdf->MultiCell(5,5,":",'','L',0);
    $pdf->SetXY(75,$y);
    $pdf->MultiCell(0,5,$tgl_akhir2,'','L',0);

    $y= $pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(5,5,"e.",'','L',0);
    $pdf->SetXY(22,$y);
    $pdf->MultiCell(48,5,"Maksud Perjalanan Dinas",'','L',0);
    $pdf->SetXY(70,$y);
    $pdf->MultiCell(5,5,":",'','L',0);
    $pdf->SetXY(75,$y);
    $pdf->MultiCell(0,5,$maksud,'','L',0);
    
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(0,2,"",'','C',0);

    $pdf->SetFont('Arial','B',9);
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(10,5,"III.",'','L',0);
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,5,"Laporan Singkat Pelaksanaan Perjalanan Dinas",'','L',0);

    $pdf->SetFont('Arial','',9);
    $y= $pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(3,5,'-','','L',0);
    $pdf->SetXY(20,$y);
    $pdf->MultiCell(0,5,$maksud,'','L',0);
    if($agenda!=""){
        $y= $pdf->GetY();
        $pdf->SetXY(17,$y);
        $pdf->MultiCell(3,5,'-','','L',0);
        $pdf->SetXY(20,$y);
        $pdf->MultiCell(0,5,$agenda,'','L',0);    
    }
    
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(0,2,"",'','C',0);

    $pdf->SetFont('Arial','B',9);
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(10,5,"IV.",'','L',0);
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,5,"Biaya",'','L',0);

    $pdf->SetFont('Arial','',9);
    $y= $pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(13,6,"No",'LRTB','C',0);
    $pdf->SetXY(30,$y);
    $pdf->MultiCell(30,6,"Uraian",'RTB','C',0);
    $pdf->SetXY(60,$y);
    $pdf->MultiCell(30,6,"Jumlah (Rp)",'RTB','C',0);
    $pdf->SetXY(90,$y);
    $pdf->MultiCell(60,6,"Keterangan",'RTB','C',0);
    $pdf->SetXY(150,$y);
    $pdf->MultiCell(0,6,"Lampiran",'RTB','C',0);

    $batas= $pdf->GetY();    
    $total = 0;
    $no = 1;
    $rs2 = mysqli_query($koneksi,"select * from biaya_restitusi where idsppd='$idsppd' and nilai>0 order by id asc");
    while($hasil2 = mysqli_fetch_array($rs2)){
        $idrestitusi = $hasil2['id'];
        $jenis_restitusi = $hasil2['jenis_restitusi'];
        $nilai = floatval($hasil2['nilai']);
        $keterangan = $hasil2['keterangan'];
        $total = $total+$nilai;

        $lampirannya = "";
        $rs3 = mysqli_query($koneksi,"select * from eviden_restitusi where idsppd='$idsppd' and idrestitusi='$idrestitusi' order by id asc");
        while($hasil3 = mysqli_fetch_array($rs3)){
            $lampiran = $hasil3['lampiran'];
            if($lampiran!=""){
                $namafile = basename(str_replace("./","",$lampiran));
            } else {
                $namafile = "";
            }
            if($lampirannya==""){
                $lampirannya .= $namafile;
            } else {
                $lampirannya .= "\n".$namafile;
            }
        }

        $y= $pdf->GetY();
        $pdf->SetXY(17,$y);
        $pdf->MultiCell(13,1,'','LR','C',0);
        $pdf->SetXY(30,$y);
        $pdf->MultiCell(30,1,'','R','L',0);
        $pdf->SetXY(60,$y);
        $pdf->MultiCell(30,1,'','R','R',0);
        $pdf->SetXY(90,$y);
        $pdf->MultiCell(60,1,'','R','L',0);
        $pdf->SetXY(150,$y);
        $pdf->MultiCell(0,1,'','R','L',0);
        $y= $pdf->GetY();
        $pdf->SetXY(17,$y);
        $pdf->MultiCell(13,4,$no,'LR','C',0);
        $x1 = $pdf->GetY();
        $tinggi1 = $x1-$y;
        $pdf->SetXY(30,$y);
        $pdf->MultiCell(30,4,$jenis_restitusi,'R','L',0);
        $x2 = $pdf->GetY();
        $tinggi2 = $x2-$y;
        $pdf->SetXY(60,$y);
        $pdf->MultiCell(30,4,number_format($nilai,0,',','.'),'R','R',0);
        $x3 = $pdf->GetY();
        $tinggi3 = $x3-$y;
        $pdf->SetXY(90,$y);
        $pdf->MultiCell(60,4,$keterangan,'R','L',0);
        $x4 = $pdf->GetY();
        $tinggi4 = $x4-$y;
        $pdf->SetXY(150,$y);
        $pdf->MultiCell(0,4,$lampirannya,'R','L',0);
        $x5 = $pdf->GetY();
        $tinggi5 = $x5-$y;
        $tinggi = max($tinggi1,$tinggi2,$tinggi3,$tinggi4,$tinggi5);
        $selisih1 = $tinggi-$tinggi1+1;
        $selisih2 = $tinggi-$tinggi2+1;
        $selisih3 = $tinggi-$tinggi3+1;
        $selisih4 = $tinggi-$tinggi4+1;
        $selisih5 = $tinggi-$tinggi5+1;
        $pdf->SetXY(17,$x1);
        $pdf->MultiCell(13,$selisih1,'','LRB','C',0);
        $pdf->SetXY(30,$x2);
        $pdf->MultiCell(30,$selisih2,'','RB','L',0);
        $pdf->SetXY(60,$x3);
        $pdf->MultiCell(30,$selisih3,'','RB','R',0);
        $pdf->SetXY(90,$x4);
        $pdf->MultiCell(60,$selisih4,'','RB','L',0);
        $pdf->SetXY(150,$x5);
        $pdf->MultiCell(0,$selisih5,'','RB','L',0);
        $no++;
    }
    $pdf->SetFont('Arial','B',9);
    $y= $pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(43,6,"Jumlah Total",'LRB','C',0);
    $pdf->SetXY(60,$y);
    $pdf->MultiCell(30,6,number_format($total,0,',','.'),'RB','R',0);
    $pdf->SetXY(90,$y);
    $pdf->MultiCell(60,6,"",'RB','C',0);
    $pdf->SetXY(150,$y);
    $pdf->MultiCell(0,6,"",'RB','C',0);
    
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(0,2,"",'','C',0);

    $pdf->SetFont('Arial','B',9);
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(10,5,"V.",'','L',0);
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,5,"Pakta Integritas",'','L',0);

    $pdf->SetFont('Arial','',9);
    $y= $pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(3,5,'-','','L',0);
    $pdf->SetXY(20,$y);
    $pdf->MultiCell(0,5,'Segala hal yang kami sampaikan dan lampirkan dalam laporan ini adalah benar adanya dan kami sepenuhnya memahami bahwa segala bentuk pemalsuan yang berakibat merugikan perusahaan adalah merupakan jenis pelanggaran berat sebagaimana tertuang dalam peraturan disiplin pegawai yang berlaku di PT PLN Nusa Daya.','','J',0);
    
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(0,2,"",'','C',0);

    $pdf->SetFont('Arial','B',9);
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(10,5,"VI.",'','L',0);
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,5,"Keterangan",'','L',0);

    $pdf->SetFont('Arial','',9);
    $y= $pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(3,5,'-','','L',0);
    $pdf->SetXY(20,$y);
    $pdf->MultiCell(0,5,'','','J',0);
    
    $y= $pdf->GetY();
    $pdf->SetXY(10,$y);
    $pdf->MultiCell(0,12,"",'','C',0);

    $y= $pdf->GetY();
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(60,4,"Mengetahui",'','C',0);
    $pdf->SetXY(115,$y);
    $pdf->MultiCell(60,4,'Balikpapan, '.TanggalIndo(date('Y-m-d')),'','C',0);

    $y= $pdf->GetY();
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(60,4,"Atasan Langsung",'','C',0);
    $pdf->SetXY(115,$y);
    $pdf->MultiCell(60,4,'Pelaksana Perjalanan Dinas','','C',0);

    $pdf->SetFont('Arial','',9);
    $y= $pdf->GetY();
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(60,4,ucwords(strtolower($jabatan_pejabat)),'','C',0);
    $pdf->SetXY(115,$y);
    $pdf->MultiCell(60,4,ucwords(strtolower($jabatan)),'','C',0);

    $y= $pdf->GetY();
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(60,20,"",'','C',0);
    if($ttd_pejabat!=""){
        $pdf->Image($ttd_pejabat,45,$y,20,0);
    }
    $pdf->SetXY(115,$y);
    $pdf->MultiCell(60,20,"",'','C',0);
    if($ttd!=""){
        $pdf->Image($ttd,135,$y,20,0);
    }

    $pdf->SetFont('Arial','B',8.5);
    $y= $pdf->GetY();
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(60,4,strtoupper($nama_pejabat),'','C',0);
    $pdf->SetXY(115,$y);
    $pdf->MultiCell(60,4,strtoupper($nama),'','C',0);


    $pdf->Output();

}
?>
