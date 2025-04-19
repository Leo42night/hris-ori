<?php
use setasign\Fpdi\Fpdi;
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

function TanggalIndo3($date){
    if(strtotime($date)){
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        //$tgl   = substr($date, 8, 2);
        
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
        $result = $tgl . "." . $bulan . ".". $tahun;	
        return($result);
    } else {
        return("");
    }
}

require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fpdf.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fpdi2/src/autoload.php";

$nip2 = $_GET['nip'];
// $nip2 = "9219004ZTY";
$pdf = new FPDI();
$pdf->SetMargins(15, 15, 15);
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(false);
$pdf->SetFillColor(183,183,183);
$pdf->SetX(-27);
$x= $pdf->GetX();

//$pdf->Image('images/logok3.png',$x,10,16,0);
//$pdf = new FPDI();

$rs = mysqli_query($koneksi,"select * from data_pegawai where nip='$nip2'");
$hasil = mysqli_fetch_array($rs);
if($hasil){
    $id = stripslashesx ($hasil['id']);
    $nip = stripslashesx ($hasil['nip']);
    $start_date = stripslashesx ($hasil['start_date']);
    $start_date2 = TanggalIndo2($start_date);
    $end_date = stripslashesx ($hasil['end_date']);
    $end_date2 = TanggalIndo2($end_date);
    $tgl_masuk = strtoupper(stripslashesx ($hasil['tgl_masuk']));
    $tgl_masuk2 = TanggalIndo2($tgl_masuk);
    $tgl_capeg = stripslashesx ($hasil['tgl_capeg']);
    $tgl_capeg2 = TanggalIndo2($tgl_capeg);
    $tgl_tetap = stripslashesx ($hasil['tgl_tetap']);
    $tgl_tetap2 = TanggalIndo2($tgl_tetap);
    $title = stripslashesx ($hasil['title']);
        $rs2 = mysqli_query($koneksi,"select label from m_title where kode='$title'");            
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $title2 = stripslashesx ($hasil2['label']);
        } else {
            $title2 = "";
        }
    $nama_lengkap = stripslashesx ($hasil['nama']);
    $gelar_depan = stripslashesx ($hasil['gelar_depan']);
        $rs2 = mysqli_query($koneksi,"select label from m_gelar_depan where kode='$gelar_depan'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $gelar_depan2 = stripslashesx ($hasil2['label']);
        } else {
            $gelar_depan2 = "";
        }
    $gelar_belakang = stripslashesx ($hasil['gelar_belakang']);
        $rs2 = mysqli_query($koneksi,"select label from m_gelar_belakang where kode='$gelar_belakang'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $gelar_belakang2 = stripslashesx ($hasil2['label']);
        } else {
            $gelar_belakang2 = "";
        }
    $know_as = stripslashesx ($hasil['know_as']);
    $tempat_lahir = stripslashesx ($hasil['tempat_lahir']);
    $tgl_lahir = stripslashesx ($hasil['tgl_lahir']);
    $tgl_lahir2 = TanggalIndo2($tgl_lahir);
    $kode_negara = stripslashesx ($hasil['kode_negara']);
        $rs2 = mysqli_query($koneksi,"select nama_negara from m_negara where kode_negara='$kode_negara'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $nama_negara = stripslashesx ($hasil2['nama_negara']);
        } else {
            $nama_negara = "";
        }
    $jenis_kelamin = stripslashesx ($hasil['jenis_kelamin']);
        $rs2 = mysqli_query($koneksi,"select label from m_jenis_kelamin where kode='$jenis_kelamin'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $jenis_kelamin2 = stripslashesx ($hasil2['label']);
        } else {
            $jenis_kelamin2 = "";
        }
    $id_agama = stripslashesx ($hasil['id_agama']);
        $rs2 = mysqli_query($koneksi,"select label from m_agama where id_agama='$id_agama'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $nama_agama = stripslashesx ($hasil2['label']);
        } else {
            $nama_agama = "";
        }
    $status_nikah = stripslashesx ($hasil['status_nikah']);
        $rs2 = mysqli_query($koneksi,"select label from m_status_nikah where kode='$status_nikah'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $status_nikah2 = stripslashesx ($hasil2['label']);
        } else {
            $status_nikah2 = "";
        }
    $tgl_nikah = stripslashesx ($hasil['tgl_nikah']);
    $tgl_nikah2 = TanggalIndo2($tgl_nikah);
    $status_warganegara = stripslashesx ($hasil['status_warganegara']);
        $rs2 = mysqli_query($koneksi,"select label from m_status_kewarganegaraan where kode='$status_warganegara'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $status_warganegara2 = stripslashesx ($hasil2['label']);
        } else {
            $status_warganegara2 = "";
        }
    $gol_darah = stripslashesx ($hasil['gol_darah']);
        $rs2 = mysqli_query($koneksi,"select label from m_gol_darah where kode='$gol_darah'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $gol_darah2 = stripslashesx ($hasil2['label']);
        } else {
            $gol_darah2 = "";
        }
    $suku = stripslashesx ($hasil['suku']);
    $telepon_utama = stripslashesx ($hasil['telepon_utama']);
    $telepon_cadangan1 = stripslashesx ($hasil['telepon_cadangan1']);
    $telepon_cadangan2 = stripslashesx ($hasil['telepon_cadangan2']);
    $telepon_cadangan3 = stripslashesx ($hasil['telepon_cadangan3']);
    $telepon_darurat = stripslashesx ($hasil['telepon_darurat']);
    $jenis_dplk = stripslashesx ($hasil['jenis_dplk']);
        $rs2 = mysqli_query($koneksi,"select jenis_dplk from m_jenis_dplk where kode='$jenis_dplk'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $jenis_dplk2 = stripslashesx ($hasil2['jenis_dplk']);
        } else {
            $jenis_dplk2 = "";
        }
    $id_dplk = stripslashesx ($hasil['id_dplk']);
    $bank_dplk = stripslashesx ($hasil['bank_dplk']);
    $no_bpjs_kes = stripslashesx ($hasil['no_bpjs_kes']);
    $no_bpjs_tk = stripslashesx ($hasil['no_bpjs_tk']);
    $bank_payroll = stripslashesx ($hasil['bank_payroll']);
    $an_payroll = stripslashesx ($hasil['an_payroll']);
    $no_rek_payroll = stripslashesx ($hasil['no_rek_payroll']);        
    $status_integrasi = stripslashesx ($hasil['status_integrasi']);
        $rs2 = mysqli_query($koneksi,"select label from m_status_integrasi where kode_integrasi='$status_integrasi'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $status_integrasi2 = stripslashesx ($hasil2['label']);
        } else {
            $status_integrasi2 = "";
        }

    $rs3 = mysqli_query($koneksi,"select * from r_pengangkatan where nip='$nip' order by tgl_masuk desc limit 1");
    $hasil3 = mysqli_fetch_array($rs3);
    if($hasil3){
        $person_grade = stripslashesx ($hasil3['person_grade']);
        $nik = stripslashesx ($hasil3['nik']);
        $npwp = stripslashesx ($hasil3['npwp']);
        $keterangan_mutasi = stripslashesx ($hasil3['keterangan_mutasi']);
        $person_grade = stripslashesx ($hasil3['person_grade']);
    } else {
        $person_grade = "-";
        $nik = "";
        $npwp = "";
        $keterangan_mutasi = "";
        $person_grade = "";
    }

    $no_ktp = "";
    $no_npwp = "";
    $rs3 = mysqli_query($koneksi,"select * from r_identitas where nip='$nip'");
    while($hasil3 = mysqli_fetch_array($rs3)){
        $kode_identitas = stripslashesx ($hasil3['kode_identitas']);
        $id_number = stripslashesx ($hasil3['id_number']);
        if($kode_identitas=="1"){
            $no_ktp = $id_number;
        } else if($kode_identitas=="11"){
            $no_npwp = $id_number;
        }
    }
    $rs3 = mysqli_query($koneksi,"select a.*,b.nama_provinsi,c.nama_kabupaten from r_alamat a left join m_provinsi b on a.id_provinsi=b.id_provinsi left join m_kabupaten c on a.id_kabupaten=c.id_kabupaten where a.nip='$nip' and a.jenis_alamat='JA2'");
    $hasil3 = mysqli_fetch_array($rs3);
    if($hasil3){
        $alamat_ktp = stripslashesx ($hasil3['alamat_lengkap']);
        $nama_provinsi = stripslashesx ($hasil3['nama_provinsi']);
        $nama_kabupaten = stripslashesx ($hasil3['nama_kabupaten']);
        $kode_pos = stripslashesx ($hasil3['kode_pos']);
    } else {
        $alamat_ktp = "";
        $nama_provinsi = "";
        $nama_kabupaten = "";
        $kode_pos = "";
    }
    $rs3 = mysqli_query($koneksi,"select * from r_jabatan where nip='$nip' order by end_date desc limit 1");
    $hasil3 = mysqli_fetch_array($rs3);
    if($hasil3){
        $jabatan_terakhir = stripslashesx ($hasil3['jabatan']);
        $level_organisasi1 = stripslashesx ($hasil3['level_organisasi1']);
    } else {
        $jabatan_terakhir = "";
        $level_organisasi1 = "";
    }
    $rs3 = mysqli_query($koneksi,"select a.grade,b.label as nama_grade from r_grade a left join m_grade b on a.grade=b.kode_grade where a.nip='$nip' order by a.end_date desc limit 1");
    $hasil3 = mysqli_fetch_array($rs3);
    if($hasil3){
        $grade = stripslashesx ($hasil3['grade']);
        $nama_grade = stripslashesx ($hasil3['nama_grade']);
    } else {
        $grade = "";
        $nama_grade = "";
    }
    
    $pdf->setSourceFile($_SERVER['DOCUMENT_ROOT'] . '/hris-ori/template/cover_cv2.pdf');
    $tplIdx = $pdf->importPage(1);
    $size = $pdf->getTemplateSize($tplIdx);
    $orientation = $size['width'] <= $size['height'] ? 'P' : 'L';
    $pdf->AddPage($orientation, array($size['width'], $size['height']));
    $pdf->useTemplate($tplIdx);
    $batas_atas = 40;
    $y=$batas_atas;
    $pdf->SetFont('Arial','B',16);
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"PT PLN NUSA DAYA",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,16,"",'','L',0);

    $pdf->SetFont('Arial','B',14);
    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"Ringkasan",'','C',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,6,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"Riwayat Hidup / Pekerjaan",'','C',0);

    $pdf->SetFont('Arial','',11);
    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,12,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"1.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Nama",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,$nama_lengkap,'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"NIPEG",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,$nip,'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"2.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Tempat, Tanggal Lahir",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,$tempat_lahir.", ".TanggalIndo($tgl_lahir),'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"3.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Jenis Kelamin dan Agama",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,$jenis_kelamin2.", ".$nama_agama,'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"4.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Status Perkawinan",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,$status_nikah2,'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"5.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"No. KTP",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,$no_ktp,'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"6.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"No. NPWP",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,$no_npwp,'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"7.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Alamat Rumah KTP",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,$alamat_ktp,'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Kota",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,$nama_kabupaten,'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Provinsi",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,$nama_provinsi,'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Kode Pos",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,$kode_pos,'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"8.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"No Handphone",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,$telepon_utama,'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"9.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Tanggal Masuk",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,TanggalIndo($tgl_masuk),'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"10.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Tanggal Calon Pegawai",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,TanggalIndo($tgl_capeg),'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"11.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Tanggal Pegawai Tetap",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,TanggalIndo($tgl_tetap),'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"12.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Jabatan Terakhir",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,$jabatan_terakhir,'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"13.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Unit Saat Ini",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,$level_organisasi1,'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"14.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Person Grade Terakhir",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,$nama_grade,'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"15.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Suku",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,$suku,'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"16.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Interest",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,"-",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"17.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Personal Summary",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,"-",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"18.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Aspirasi Karir",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,"-",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"19.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Komitmen Pengembangan Diri",'','L',0);
    $pdf->SetXY(100,$y);
    $pdf->MultiCell(7,5,":",'','L',0);
    $pdf->SetXY(107,$y);
    $pdf->MultiCell(0,5,"-",'','L',0);

    $pdf->SetFont('Arial','',10);
    $pdf->AddPage($orientation, array($size['width'], $size['height']));
    $pdf->useTemplate($tplIdx);
    $batas_atas = 40;
    $y=$batas_atas;

    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"20.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Pendidikan Formal",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(10,8,"No",'LRTB','C',0);
    $pdf->SetXY(35,$y);
    $pdf->MultiCell(50,8,"Tingkat/Jurusan Pendidikan",'RTB','C',0);
    $pdf->SetXY(85,$y);
    $pdf->MultiCell(25,8,"Sejak",'RTB','C',0);
    $pdf->SetXY(110,$y);
    $pdf->MultiCell(25,8,"Hingga",'RTB','C',0);
    $pdf->SetXY(135,$y);
    $pdf->MultiCell(0,8,"Lembaga Pendidikan",'RTB','C',0);

    $no = 1;
    $rs3 = mysqli_query($koneksi,"select a.*,b.label as keterangan_pendidikan from r_pendidikan a left join m_keterangan_pendidikan b on a.keterangan_pendidikan=b.kode where a.nip='$nip' order by a.start_date asc");
    while($hasil3 = mysqli_fetch_array($rs3)){
        $jurusan = stripslashesx ($hasil3['jurusan']);
        $start_date = stripslashesx ($hasil3['start_date']);
        $end_date = stripslashesx ($hasil3['end_date']);
        $nama_institusi = stripslashesx ($hasil3['nama_institusi']);
        $keterangan_pendidikan = stripslashesx ($hasil3['keterangan_pendidikan']);

        $y=$pdf->GetY();
        $pdf->SetXY(25,$y);
        $pdf->MultiCell(10,1,"",'LR','C',0);
        $pdf->SetXY(35,$y);
        $pdf->MultiCell(50,1,"",'R','L',0);
        $pdf->SetXY(85,$y);
        $pdf->MultiCell(25,1,"",'R','C',0);
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(25,1,"",'R','C',0);
        $pdf->SetXY(135,$y);
        $pdf->MultiCell(0,1,"",'R','L',0);

        $y=$pdf->GetY();
        $pdf->SetXY(25,$y);
        $pdf->MultiCell(10,5,$no,'LR','C',0);
        $x1 = $pdf->GetY();
        $tinggi1 = $x1-$y;
        $pdf->SetXY(35,$y);
        $pdf->MultiCell(50,5,$jurusan,'R','L',0);
        $x2 = $pdf->GetY();
        $tinggi2 = $x2-$y;
        $pdf->SetXY(85,$y);
        $pdf->MultiCell(25,5,TanggalIndo2($start_date),'R','C',0);
        $x3 = $pdf->GetY();
        $tinggi3 = $x3-$y;
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(25,5,TanggalIndo2($end_date),'R','C',0);
        $x4 = $pdf->GetY();
        $tinggi4 = $x4-$y;
        $pdf->SetXY(135,$y);
        $pdf->MultiCell(0,5,$nama_institusi,'R','L',0);
        if($keterangan_pendidikan!=""){
            // $y2=$pdf->GetY();
            // $pdf->SetXY(135,$y2);
            // $pdf->MultiCell(0,2,"",'R','L',0);                
            $y2=$pdf->GetY();
            $pdf->SetXY(135,$y2);
            $pdf->MultiCell(0,3,"",'R','L',0);                
            $y2=$pdf->GetY();
            $pdf->SetXY(135,$y2);
            $pdf->MultiCell(0,5,"Keterangan : ".$keterangan_pendidikan,'R','L',0);                
        }
        $x5 = $pdf->GetY();
        $tinggi5 = $x5-$y;
        $tinggi = max($tinggi1,$tinggi2,$tinggi3,$tinggi4,$tinggi5);
        $selisih1 = $tinggi-$tinggi1;
        $selisih2 = $tinggi-$tinggi2;
        $selisih3 = $tinggi-$tinggi3;
        $selisih4 = $tinggi-$tinggi4;
        $selisih5 = $tinggi-$tinggi5;
        $pdf->SetXY(25,$x1);
        $pdf->MultiCell(10,$selisih1,"",'LRB','C',0);
        $pdf->SetXY(35,$x2);
        $pdf->MultiCell(50,$selisih2,"",'RB','L',0);
        $pdf->SetXY(85,$x3);
        $pdf->MultiCell(25,$selisih3,"",'RB','C',0);
        $pdf->SetXY(110,$x4);
        $pdf->MultiCell(25,$selisih4,"",'RB','C',0);
        $pdf->SetXY(135,$x5);
        $pdf->MultiCell(0,$selisih5,"",'RB','L',0);
        $no++;
    }

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"21.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Sertifikasi Kompetensi",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(10,8,"No",'LRTB','C',0);
    $pdf->SetXY(35,$y);
    $pdf->MultiCell(50,8,"Judul",'RTB','C',0);
    $pdf->SetXY(85,$y);
    $pdf->MultiCell(25,8,"Sejak",'RTB','C',0);
    $pdf->SetXY(110,$y);
    $pdf->MultiCell(25,8,"Hingga",'RTB','C',0);
    $pdf->SetXY(135,$y);
    $pdf->MultiCell(0,8,"Lembaga Sertifikasi",'RTB','C',0);

    $no = 1;
    $rs3 = mysqli_query($koneksi,"select * from r_sertifikat where nip='$nip' order by start_date asc");
    while($hasil3 = mysqli_fetch_array($rs3)){
        $judul_sertifikasi = stripslashesx ($hasil3['judul_sertifikasi']);
        $start_date = stripslashesx ($hasil3['start_date']);
        $end_date = stripslashesx ($hasil3['end_date']);
        $nama_institusi = stripslashesx ($hasil3['nama_institusi']);

        $y=$pdf->GetY();
        $pdf->SetXY(25,$y);
        $pdf->MultiCell(10,1,"",'LR','C',0);
        $pdf->SetXY(35,$y);
        $pdf->MultiCell(50,1,"",'R','L',0);
        $pdf->SetXY(85,$y);
        $pdf->MultiCell(25,1,"",'R','C',0);
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(25,1,"",'R','C',0);
        $pdf->SetXY(135,$y);
        $pdf->MultiCell(0,1,"",'R','L',0);

        $y=$pdf->GetY();
        $pdf->SetXY(25,$y);
        $pdf->MultiCell(10,5,$no,'LR','C',0);
        $x1 = $pdf->GetY();
        $tinggi1 = $x1-$y;
        $pdf->SetXY(35,$y);
        $pdf->MultiCell(50,5,$judul_sertifikasi,'R','L',0);
        $x2 = $pdf->GetY();
        $tinggi2 = $x2-$y;
        $pdf->SetXY(85,$y);
        $pdf->MultiCell(25,5,TanggalIndo2($start_date),'R','C',0);
        $x3 = $pdf->GetY();
        $tinggi3 = $x3-$y;
        $pdf->SetXY(110,$y);
        $pdf->MultiCell(25,5,TanggalIndo2($end_date),'R','C',0);
        $x4 = $pdf->GetY();
        $tinggi4 = $x4-$y;
        $pdf->SetXY(135,$y);
        $pdf->MultiCell(0,5,$nama_institusi,'R','L',0);
        $x5 = $pdf->GetY();
        $tinggi5 = $x5-$y;
        $tinggi = max($tinggi1,$tinggi2,$tinggi3,$tinggi4,$tinggi5);
        $selisih1 = $tinggi-$tinggi1;
        $selisih2 = $tinggi-$tinggi2;
        $selisih3 = $tinggi-$tinggi3;
        $selisih4 = $tinggi-$tinggi4;
        $selisih5 = $tinggi-$tinggi5;
        $pdf->SetXY(25,$x1);
        $pdf->MultiCell(10,$selisih1,"",'LRB','C',0);
        $pdf->SetXY(35,$x2);
        $pdf->MultiCell(50,$selisih2,"",'RB','L',0);
        $pdf->SetXY(85,$x3);
        $pdf->MultiCell(25,$selisih3,"",'RB','C',0);
        $pdf->SetXY(110,$x4);
        $pdf->MultiCell(25,$selisih4,"",'RB','C',0);
        $pdf->SetXY(135,$x5);
        $pdf->MultiCell(0,$selisih5,"",'RB','L',0);
        $no++;
    }

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"22.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Diklat Penjenjangan",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(10,8,"No",'LRTB','C',0);
    $pdf->SetXY(35,$y);
    $pdf->MultiCell(50,8,"Judul",'RTB','C',0);
    $pdf->SetXY(85,$y);
    $pdf->MultiCell(25,8,"Sejak",'RTB','C',0);
    $pdf->SetXY(110,$y);
    $pdf->MultiCell(25,8,"Hingga",'RTB','C',0);
    $pdf->SetXY(135,$y);
    $pdf->MultiCell(0,8,"Lembaga",'RTB','C',0);

    $pdf->AddPage($orientation, array($size['width'], $size['height']));
    $pdf->useTemplate($tplIdx);
    $batas_atas = 40;
    $y=$batas_atas;

    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"23.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Pendidikan dan Pelatihan",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(10,8,"No",'LRTB','C',0);
    $pdf->SetXY(35,$y);
    $pdf->MultiCell(30,8,"Jenis",'RTB','C',0);
    $pdf->SetXY(65,$y);
    $pdf->MultiCell(40,8,"Jenis/Judul",'RTB','C',0);
    $pdf->SetXY(105,$y);
    $pdf->MultiCell(25,8,"Sejak",'RTB','C',0);
    $pdf->SetXY(130,$y);
    $pdf->MultiCell(25,8,"Hingga",'RTB','C',0);
    $pdf->SetXY(155,$y);
    $pdf->MultiCell(0,8,"Lembaga",'RTB','C',0);

    $no = 1;
    $rs3 = mysqli_query($koneksi,"select a.*,b.label as jenis_diklat2 from r_diklat a left join m_jenis_diklat b on a.jenis_diklat=b.kode where a.nip='$nip' order by a.start_date desc");
    while($hasil3 = mysqli_fetch_array($rs3)){
        $judul_diklat = stripslashesx ($hasil3['judul_diklat']);
        $start_date = stripslashesx ($hasil3['start_date']);
        $end_date = stripslashesx ($hasil3['end_date']);
        $nama_institusi = stripslashesx ($hasil3['nama_institusi']);
        $jenis_diklat2 = stripslashesx ($hasil3['jenis_diklat2']);

        $batasnya=$pdf->GetY();
        if($batasnya>270){
            $pdf->AddPage($orientation, array($size['width'], $size['height']));
            $pdf->useTemplate($tplIdx);
            $batas_atas = 40;
            $y=$batas_atas;
                
            // $y=$pdf->GetY();
            $pdf->SetXY(25,$y);
            $pdf->MultiCell(10,8,"No",'LRTB','C',0);
            $pdf->SetXY(35,$y);
            $pdf->MultiCell(30,8,"Jenis",'RTB','C',0);
            $pdf->SetXY(65,$y);
            $pdf->MultiCell(40,8,"Jenis/Judul",'RTB','C',0);
            $pdf->SetXY(105,$y);
            $pdf->MultiCell(25,8,"Sejak",'RTB','C',0);
            $pdf->SetXY(130,$y);
            $pdf->MultiCell(25,8,"Hingga",'RTB','C',0);
            $pdf->SetXY(155,$y);
            $pdf->MultiCell(0,8,"Lembaga",'RTB','C',0);        
        }

        $y=$pdf->GetY();
        $pdf->SetXY(25,$y);
        $pdf->MultiCell(10,1,"",'LR','C',0);
        $pdf->SetXY(35,$y);
        $pdf->MultiCell(30,1,"",'R','L',0);
        $pdf->SetXY(65,$y);
        $pdf->MultiCell(40,1,"",'R','L',0);
        $pdf->SetXY(105,$y);
        $pdf->MultiCell(25,1,"",'R','C',0);
        $pdf->SetXY(130,$y);
        $pdf->MultiCell(25,1,"",'R','C',0);
        $pdf->SetXY(155,$y);
        $pdf->MultiCell(0,1,"",'R','L',0);

        $y=$pdf->GetY();
        $pdf->SetXY(25,$y);
        $pdf->MultiCell(10,5,$no,'LR','C',0);
        $x1 = $pdf->GetY();
        $tinggi1 = $x1-$y;
        $pdf->SetXY(35,$y);
        $pdf->MultiCell(30,5,$jenis_diklat2,'R','L',0);
        $x2 = $pdf->GetY();
        $tinggi2 = $x2-$y;
        $pdf->SetXY(65,$y);
        $pdf->MultiCell(40,5,$judul_diklat,'R','L',0);
        $x3 = $pdf->GetY();
        $tinggi3 = $x3-$y;
        $pdf->SetXY(105,$y);
        $pdf->MultiCell(25,5,TanggalIndo2($start_date),'R','C',0);
        $x4 = $pdf->GetY();
        $tinggi4 = $x4-$y;
        $pdf->SetXY(130,$y);
        $pdf->MultiCell(25,5,TanggalIndo2($end_date),'R','C',0);
        $x5 = $pdf->GetY();
        $tinggi5 = $x5-$y;
        $pdf->SetXY(155,$y);
        $pdf->MultiCell(0,5,$nama_institusi,'R','L',0);
        $x6 = $pdf->GetY();
        $tinggi6 = $x6-$y;
        $tinggi = max($tinggi1,$tinggi2,$tinggi3,$tinggi4,$tinggi5,$tinggi6);
        $selisih1 = $tinggi-$tinggi1;
        $selisih2 = $tinggi-$tinggi2;
        $selisih3 = $tinggi-$tinggi3;
        $selisih4 = $tinggi-$tinggi4;
        $selisih5 = $tinggi-$tinggi5;
        $selisih6 = $tinggi-$tinggi6;
        $pdf->SetXY(25,$x1);
        $pdf->MultiCell(10,$selisih1,"",'LRB','C',0);
        $pdf->SetXY(35,$x2);
        $pdf->MultiCell(30,$selisih2,"",'RB','L',0);
        $pdf->SetXY(65,$x3);
        $pdf->MultiCell(40,$selisih3,"",'RB','L',0);
        $pdf->SetXY(105,$x4);
        $pdf->MultiCell(25,$selisih4,"",'RB','C',0);
        $pdf->SetXY(130,$x5);
        $pdf->MultiCell(25,$selisih5,"",'RB','C',0);
        $pdf->SetXY(155,$x6);
        $pdf->MultiCell(0,$selisih6,"",'RB','L',0);
        $no++;
    }

    $pdf->AddPage($orientation, array($size['width'], $size['height']));
    $pdf->useTemplate($tplIdx);
    $batas_atas = 40;
    $y=$batas_atas;

    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"24.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Riwayat Jabatan",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(10,8,"No",'LRTB','C',0);
    $pdf->SetXY(35,$y);
    $pdf->MultiCell(40,8,"Sebutan Jabatan",'RTB','C',0);
    $pdf->SetXY(75,$y);
    $pdf->MultiCell(40,8,"Organisasi",'RTB','C',0);
    $pdf->SetXY(115,$y);
    $pdf->MultiCell(25,8,"Sejak",'RTB','C',0);
    $pdf->SetXY(140,$y);
    $pdf->MultiCell(25,8,"Hingga",'RTB','C',0);
    $pdf->SetXY(165,$y);
    $pdf->MultiCell(0,8,"Jenis Jabatan",'RTB','C',0);

    $no = 1;
    $rs3 = mysqli_query($koneksi,"select a.*,b.label as jenis_jabatan2,c.label as jenjang_jabatan2 from r_jabatan a left join m_jenis_jabatan b on a.jenis_jabatan=b.kode left join m_jenjang_jabatan c on a.jenjang_jabatan=c.kode where a.nip='$nip' order by a.start_date desc");
    while($hasil3 = mysqli_fetch_array($rs3)){
        $jabatan = stripslashesx ($hasil3['jabatan']);
        $jenis_jabatan2 = stripslashesx ($hasil3['jenis_jabatan2']);
        $jenjang_jabatan2 = stripslashesx ($hasil3['jenjang_jabatan2']);
        $start_date = stripslashesx ($hasil3['start_date']);
        $end_date = stripslashesx ($hasil3['end_date']);

        $batasnya=$pdf->GetY();
        if($batasnya>270){
            $pdf->AddPage($orientation, array($size['width'], $size['height']));
            $pdf->useTemplate($tplIdx);
            $batas_atas = 40;
            $y=$batas_atas;
                
            // $y=$pdf->GetY();
            $pdf->SetXY(25,$y);
            $pdf->MultiCell(10,8,"No",'LRTB','C',0);
            $pdf->SetXY(35,$y);
            $pdf->MultiCell(40,8,"Sebutan Jabatan",'RTB','C',0);
            $pdf->SetXY(75,$y);
            $pdf->MultiCell(40,8,"Organisasi",'RTB','C',0);
            $pdf->SetXY(115,$y);
            $pdf->MultiCell(25,8,"Sejak",'RTB','C',0);
            $pdf->SetXY(140,$y);
            $pdf->MultiCell(25,8,"Hingga",'RTB','C',0);
            $pdf->SetXY(165,$y);
            $pdf->MultiCell(0,8,"Jenis Jabatan",'RTB','C',0);
        }

        $y=$pdf->GetY();
        $pdf->SetXY(25,$y);
        $pdf->MultiCell(10,1,"",'LR','C',0);
        $pdf->SetXY(35,$y);
        $pdf->MultiCell(40,1,"",'R','L',0);
        $pdf->SetXY(75,$y);
        $pdf->MultiCell(40,1,"",'R','L',0);
        $pdf->SetXY(115,$y);
        $pdf->MultiCell(25,1,"",'R','C',0);
        $pdf->SetXY(140,$y);
        $pdf->MultiCell(25,1,"",'R','C',0);
        $pdf->SetXY(165,$y);
        $pdf->MultiCell(0,1,"",'R','L',0);

        $y=$pdf->GetY();
        $pdf->SetXY(25,$y);
        $pdf->MultiCell(10,5,$no,'LR','C',0);
        $x1 = $pdf->GetY();
        $tinggi1 = $x1-$y;
        $pdf->SetXY(35,$y);
        $pdf->MultiCell(40,5,$jabatan,'R','L',0);
        $x2 = $pdf->GetY();
        $tinggi2 = $x2-$y;
        $pdf->SetXY(75,$y);
        $pdf->MultiCell(40,5,"",'R','L',0);
        $x3 = $pdf->GetY();
        $tinggi3 = $x3-$y;
        $pdf->SetXY(115,$y);
        $pdf->MultiCell(25,5,TanggalIndo2($start_date),'R','C',0);
        $x4 = $pdf->GetY();
        $tinggi4 = $x4-$y;
        $pdf->SetXY(140,$y);
        $pdf->MultiCell(25,5,TanggalIndo2($end_date),'R','C',0);
        $x5 = $pdf->GetY();
        $tinggi5 = $x5-$y;
        $pdf->SetXY(165,$y);
        $pdf->MultiCell(0,5,$jenis_jabatan2,'R','L',0);
        $pdf->SetXY(165,$y+4);
        $pdf->MultiCell(0,5,$jenjang_jabatan2,'R','L',0);
        $x6 = $pdf->GetY();
        $tinggi6 = $x6-$y;
        $tinggi = max($tinggi1,$tinggi2,$tinggi3,$tinggi4,$tinggi5,$tinggi6);
        $selisih1 = $tinggi-$tinggi1;
        $selisih2 = $tinggi-$tinggi2;
        $selisih3 = $tinggi-$tinggi3;
        $selisih4 = $tinggi-$tinggi4;
        $selisih5 = $tinggi-$tinggi5;
        $selisih6 = $tinggi-$tinggi6;
        $pdf->SetXY(25,$x1);
        $pdf->MultiCell(10,$selisih1,"",'LRB','C',0);
        $pdf->SetXY(35,$x2);
        $pdf->MultiCell(40,$selisih2,"",'RB','L',0);
        $pdf->SetXY(75,$x3);
        $pdf->MultiCell(40,$selisih3,"",'RB','L',0);
        $pdf->SetXY(115,$x4);
        $pdf->MultiCell(25,$selisih4,"",'RB','C',0);
        $pdf->SetXY(140,$x5);
        $pdf->MultiCell(25,$selisih5,"",'RB','C',0);
        $pdf->SetXY(165,$x6);
        $pdf->MultiCell(0,$selisih6,"",'RB','L',0);
        $no++;
    }

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"25.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Data Keluarga",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(10,8,"No",'LRTB','C',0);
    $pdf->SetXY(35,$y);
    $pdf->MultiCell(50,8,"Nama",'RTB','C',0);
    $pdf->SetXY(85,$y);
    $pdf->MultiCell(30,8,"Hub. Keluarga",'RTB','C',0);
    $pdf->SetXY(115,$y);
    $pdf->MultiCell(25,8,"Jenis kelamin",'RTB','C',0);
    $pdf->SetXY(140,$y);
    $pdf->MultiCell(40,8,"Tempat Lahir",'RTB','C',0);
    $pdf->SetXY(180,$y);
    $pdf->MultiCell(0,8,"Tgl Lahir",'RTB','C',0);

    $no = 1;
    $rs3 = mysqli_query($koneksi,"select a.*,b.label as jenis_kelamin2,c.label as jenis_keluarga2 from r_keluarga a left join m_jenis_kelamin b on a.jenis_kelamin=b.kode left join m_jenis_keluarga c on a.id_jenis_keluarga=c.id_jenis_keluarga where a.nip='$nip' order by a.id_jenis_keluarga,a.tgl_lahir asc");
    $jumlah3 = mysqli_num_rows($rs3);
    if($jumlah3){
        while($hasil3 = mysqli_fetch_array($rs3)){
            $nama = stripslashesx ($hasil3['nama']);
            $jenis_kelamin2 = stripslashesx ($hasil3['jenis_kelamin2']);
            $jenis_keluarga2 = stripslashesx ($hasil3['jenis_keluarga2']);
            $tempat_lahir = stripslashesx ($hasil3['tempat_lahir']);
            $tgl_lahir = stripslashesx ($hasil3['tgl_lahir']);

            $batasnya=$pdf->GetY();
            if($batasnya>270){
                $pdf->AddPage($orientation, array($size['width'], $size['height']));
                $pdf->useTemplate($tplIdx);
                $batas_atas = 40;
                $y=$batas_atas;
                    
                // $y=$pdf->GetY();
                $pdf->SetXY(25,$y);
                $pdf->SetXY(25,$y);
                $pdf->MultiCell(10,8,"No",'LRTB','C',0);
                $pdf->SetXY(35,$y);
                $pdf->MultiCell(50,8,"Nama",'RTB','C',0);
                $pdf->SetXY(85,$y);
                $pdf->MultiCell(30,8,"Hub. Keluarga",'RTB','C',0);
                $pdf->SetXY(115,$y);
                $pdf->MultiCell(25,8,"Jenis kelamin",'RTB','C',0);
                $pdf->SetXY(140,$y);
                $pdf->MultiCell(40,8,"Tempat Lahir",'RTB','C',0);
                $pdf->SetXY(180,$y);
                $pdf->MultiCell(0,8,"Tgl Lahir",'RTB','C',0);
            }

            $y=$pdf->GetY();
            $pdf->SetXY(25,$y);
            $pdf->MultiCell(10,1,"",'LR','C',0);
            $pdf->SetXY(35,$y);
            $pdf->MultiCell(50,1,"",'R','L',0);
            $pdf->SetXY(85,$y);
            $pdf->MultiCell(30,1,"",'R','L',0);
            $pdf->SetXY(115,$y);
            $pdf->MultiCell(25,1,"",'R','C',0);
            $pdf->SetXY(140,$y);
            $pdf->MultiCell(40,1,"",'R','C',0);
            $pdf->SetXY(180,$y);
            $pdf->MultiCell(0,1,"",'R','L',0);

            $y=$pdf->GetY();
            $pdf->SetXY(25,$y);
            $pdf->MultiCell(10,5,$no,'LR','C',0);
            $x1 = $pdf->GetY();
            $tinggi1 = $x1-$y;
            $pdf->SetXY(35,$y);
            $pdf->MultiCell(50,5,$nama,'R','L',0);
            $x2 = $pdf->GetY();
            $tinggi2 = $x2-$y;
            $pdf->SetXY(85,$y);
            $pdf->MultiCell(30,5,$jenis_keluarga2,'R','L',0);
            $x3 = $pdf->GetY();
            $tinggi3 = $x3-$y;
            $pdf->SetXY(115,$y);
            $pdf->MultiCell(25,5,$jenis_kelamin2,'R','C',0);
            $x4 = $pdf->GetY();
            $tinggi4 = $x4-$y;
            $pdf->SetXY(140,$y);
            $pdf->MultiCell(40,5,$tempat_lahir,'R','C',0);
            $x5 = $pdf->GetY();
            $tinggi5 = $x5-$y;
            $pdf->SetXY(180,$y);
            $pdf->MultiCell(0,5,TanggalIndo2($tgl_lahir),'R','L',0);
            $x6 = $pdf->GetY();
            $tinggi6 = $x6-$y;
            $tinggi = max($tinggi1,$tinggi2,$tinggi3,$tinggi4,$tinggi5,$tinggi6);
            $selisih1 = $tinggi-$tinggi1;
            $selisih2 = $tinggi-$tinggi2;
            $selisih3 = $tinggi-$tinggi3;
            $selisih4 = $tinggi-$tinggi4;
            $selisih5 = $tinggi-$tinggi5;
            $selisih6 = $tinggi-$tinggi6;
            $pdf->SetXY(25,$x1);
            $pdf->MultiCell(10,$selisih1,"",'LRB','C',0);
            $pdf->SetXY(35,$x2);
            $pdf->MultiCell(50,$selisih2,"",'RB','L',0);
            $pdf->SetXY(85,$x3);
            $pdf->MultiCell(30,$selisih3,"",'RB','L',0);
            $pdf->SetXY(115,$x4);
            $pdf->MultiCell(25,$selisih4,"",'RB','C',0);
            $pdf->SetXY(140,$x5);
            $pdf->MultiCell(40,$selisih5,"",'RB','C',0);
            $pdf->SetXY(180,$x6);
            $pdf->MultiCell(0,$selisih6,"",'RB','L',0);
            $no++;
        }
    }

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"26.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Riwayat Grade",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(25,8,"Sejak",'LRTB','C',0);
    $pdf->SetXY(50,$y);
    $pdf->MultiCell(25,8,"Hingga",'RTB','C',0);
    $pdf->SetXY(75,$y);
    $pdf->MultiCell(30,8,"Person Grade",'RTB','C',0);

    $no = 1;
    $rs3 = mysqli_query($koneksi,"select a.*,b.label as nama_grade from r_grade a left join m_grade b on a.grade=b.kode_grade where a.nip='$nip' order by a.start_date desc");
    $jumlah3 = mysqli_num_rows($rs3);
    if($jumlah3){
        while($hasil3 = mysqli_fetch_array($rs3)){
            $nama_grade = stripslashesx ($hasil3['nama_grade']);
            $start_date = stripslashesx ($hasil3['start_date']);
            $end_date = stripslashesx ($hasil3['end_date']);

            $batasnya=$pdf->GetY();
            if($batasnya>270){
                $pdf->AddPage($orientation, array($size['width'], $size['height']));
                $pdf->useTemplate($tplIdx);
                $batas_atas = 40;
                $y=$batas_atas;
                    
                // $y=$pdf->GetY();
                $pdf->SetXY(25,$y);
                $pdf->MultiCell(25,8,"Sejak",'LRTB','C',0);
                $pdf->SetXY(50,$y);
                $pdf->MultiCell(25,8,"Hingga",'RTB','C',0);
                $pdf->SetXY(75,$y);
                $pdf->MultiCell(30,8,"Person Grade",'RTB','C',0);
            }

            $y=$pdf->GetY();
            $pdf->SetXY(25,$y);
            $pdf->MultiCell(25,1,"",'LR','C',0);
            $pdf->SetXY(50,$y);
            $pdf->MultiCell(25,1,"",'R','L',0);
            $pdf->SetXY(75,$y);
            $pdf->MultiCell(30,1,"",'R','L',0);

            $y=$pdf->GetY();
            $pdf->SetXY(25,$y);
            $pdf->MultiCell(25,5,TanggalIndo2($start_date),'LR','C',0);
            $x1 = $pdf->GetY();
            $tinggi1 = $x1-$y;
            $pdf->SetXY(50,$y);
            $pdf->MultiCell(25,5,TanggalIndo2($end_date),'R','C',0);
            $x2 = $pdf->GetY();
            $tinggi2 = $x2-$y;
            $pdf->SetXY(75,$y);
            $pdf->MultiCell(30,5,$nama_grade,'R','C',0);
            $x3 = $pdf->GetY();
            $tinggi3 = $x3-$y;
            $tinggi = max($tinggi1,$tinggi2,$tinggi3);
            $selisih1 = $tinggi-$tinggi1;
            $selisih2 = $tinggi-$tinggi2;
            $selisih3 = $tinggi-$tinggi3;
            $pdf->SetXY(25,$x1);
            $pdf->MultiCell(25,$selisih1,"",'LRB','C',0);
            $pdf->SetXY(50,$x2);
            $pdf->MultiCell(25,$selisih2,"",'RB','L',0);
            $pdf->SetXY(75,$x3);
            $pdf->MultiCell(30,$selisih3,"",'RB','L',0);
            $no++;
        }
    }

    $batasnya=$pdf->GetY();
    if($batasnya>250){
        $pdf->AddPage($orientation, array($size['width'], $size['height']));
        $pdf->useTemplate($tplIdx);
        $batas_atas = 40;
        $y=$batas_atas;
        $pdf->SetXY(17,$y);
        $pdf->MultiCell(0,4,"",'','L',0);
    } else {
        $y=$pdf->GetY();
        $pdf->SetXY(17,$y);
        $pdf->MultiCell(0,4,"",'','L',0);
    }

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"27.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Riwayat Talenta",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(25,8,"Sejak",'LRTB','C',0);
    $pdf->SetXY(50,$y);
    $pdf->MultiCell(25,8,"Hingga",'RTB','C',0);
    $pdf->SetXY(75,$y);
    $pdf->MultiCell(30,8,"Nilai Talenta",'RTB','C',0);

    $no = 1;
    $rs3 = mysqli_query($koneksi,"select a.*,b.label as nama_talenta from r_talenta a left join m_nilai_talenta b on a.nilai_talenta=b.kode where a.nip='$nip' order by a.start_date desc");
    $jumlah3 = mysqli_num_rows($rs3);
    if($jumlah3){
        while($hasil3 = mysqli_fetch_array($rs3)){
            $nama_talenta = stripslashesx ($hasil3['nama_talenta']);
            $arraynya = explode("-",$nama_talenta);
            if(count($arraynya)>1){
                $nama_talenta = $arraynya[1];
            }
            $start_date = stripslashesx ($hasil3['start_date']);
            $end_date = stripslashesx ($hasil3['end_date']);

            $batasnya=$pdf->GetY();
            if($batasnya>270){
                $pdf->AddPage($orientation, array($size['width'], $size['height']));
                $pdf->useTemplate($tplIdx);
                $batas_atas = 40;
                $y=$batas_atas;
                    
                // $y=$pdf->GetY();
                $pdf->SetXY(25,$y);
                $pdf->MultiCell(25,8,"Sejak",'LRTB','C',0);
                $pdf->SetXY(50,$y);
                $pdf->MultiCell(25,8,"Hingga",'RTB','C',0);
                $pdf->SetXY(75,$y);
                $pdf->MultiCell(30,8,"Nilai Talenta",'RTB','C',0);
            }

            $y=$pdf->GetY();
            $pdf->SetXY(25,$y);
            $pdf->MultiCell(25,1,"",'LR','C',0);
            $pdf->SetXY(50,$y);
            $pdf->MultiCell(25,1,"",'R','C',0);
            $pdf->SetXY(75,$y);
            $pdf->MultiCell(30,1,"",'R','C',0);

            $y=$pdf->GetY();
            $pdf->SetXY(25,$y);
            $pdf->MultiCell(25,5,TanggalIndo2($start_date),'LR','C',0);
            $x1 = $pdf->GetY();
            $tinggi1 = $x1-$y;
            $pdf->SetXY(50,$y);
            $pdf->MultiCell(25,5,TanggalIndo2($end_date),'R','C',0);
            $x2 = $pdf->GetY();
            $tinggi2 = $x2-$y;
            $pdf->SetXY(75,$y);
            $pdf->MultiCell(30,5,$nama_talenta,'R','C',0);
            $x3 = $pdf->GetY();
            $tinggi3 = $x3-$y;
            $tinggi = max($tinggi1,$tinggi2,$tinggi3);
            $selisih1 = $tinggi-$tinggi1;
            $selisih2 = $tinggi-$tinggi2;
            $selisih3 = $tinggi-$tinggi3;
            $pdf->SetXY(25,$x1);
            $pdf->MultiCell(25,$selisih1,"",'LRB','C',0);
            $pdf->SetXY(50,$x2);
            $pdf->MultiCell(25,$selisih2,"",'RB','L',0);
            $pdf->SetXY(75,$x3);
            $pdf->MultiCell(30,$selisih3,"",'RB','L',0);
            $no++;
        }
    }

    $batasnya=$pdf->GetY();
    if($batasnya>250){
        $pdf->AddPage($orientation, array($size['width'], $size['height']));
        $pdf->useTemplate($tplIdx);
        $batas_atas = 40;
        $y=$batas_atas;
        $pdf->SetXY(17,$y);
        $pdf->MultiCell(0,4,"",'','L',0);
    } else {
        $y=$pdf->GetY();
        $pdf->SetXY(17,$y);
        $pdf->MultiCell(0,4,"",'','L',0);
    }

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"28.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Riwayat Penghargaan",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(10,8,"No",'LRTB','C',0);
    $pdf->SetXY(35,$y);
    $pdf->MultiCell(80,8,"Riwayat Penghargaan",'RTB','C',0);
    $pdf->SetXY(115,$y);
    $pdf->MultiCell(25,4,"Tanggal Penghargaan",'RTB','C',0);

    $no = 1;
    $rs3 = mysqli_query($koneksi,"select * from r_award where nip='$nip' order by start_date desc");
    $jumlah3 = mysqli_num_rows($rs3);
    if($jumlah3){
        while($hasil3 = mysqli_fetch_array($rs3)){
            $uraian_award = stripslashesx ($hasil3['uraian_award']);
            $tgl_sk_penghargaan = stripslashesx ($hasil3['tgl_sk_penghargaan']);

            $batasnya=$pdf->GetY();
            if($batasnya>270){
                $pdf->AddPage($orientation, array($size['width'], $size['height']));
                $pdf->useTemplate($tplIdx);
                $batas_atas = 40;
                $y=$batas_atas;
                    
                // $y=$pdf->GetY();
                $pdf->SetXY(25,$y);
                $pdf->MultiCell(10,8,"No",'LRTB','C',0);
                $pdf->SetXY(35,$y);
                $pdf->MultiCell(80,8,"Riwayat Penghargaan",'RTB','C',0);
                $pdf->SetXY(115,$y);
                $pdf->MultiCell(25,4,"Tanggal Penghargaan",'RTB','C',0);
            }

            $y=$pdf->GetY();
            $pdf->SetXY(25,$y);
            $pdf->MultiCell(10,1,"",'LR','C',0);
            $pdf->SetXY(35,$y);
            $pdf->MultiCell(80,1,"",'R','C',0);
            $pdf->SetXY(115,$y);
            $pdf->MultiCell(25,1,"",'R','C',0);

            $y=$pdf->GetY();
            $pdf->SetXY(25,$y);
            $pdf->MultiCell(10,5,$no,'LR','C',0);
            $x1 = $pdf->GetY();
            $tinggi1 = $x1-$y;
            $pdf->SetXY(35,$y);
            $pdf->MultiCell(80,5,$uraian_award,'R','C',0);
            $x2 = $pdf->GetY();
            $tinggi2 = $x2-$y;
            $pdf->SetXY(115,$y);
            $pdf->MultiCell(25,5,TanggalIndo2($tgl_sk_penghargaan),'R','C',0);
            $x3 = $pdf->GetY();
            $tinggi3 = $x3-$y;
            $tinggi = max($tinggi1,$tinggi2,$tinggi3);
            $selisih1 = $tinggi-$tinggi1;
            $selisih2 = $tinggi-$tinggi2;
            $selisih3 = $tinggi-$tinggi3;
            $pdf->SetXY(25,$x1);
            $pdf->MultiCell(10,$selisih1,"",'LRB','C',0);
            $pdf->SetXY(35,$x2);
            $pdf->MultiCell(80,$selisih2,"",'RB','L',0);
            $pdf->SetXY(115,$x3);
            $pdf->MultiCell(25,$selisih3,"",'RB','L',0);
            $no++;
        }
    }

    $batasnya=$pdf->GetY();
    if($batasnya>250){
        $pdf->AddPage($orientation, array($size['width'], $size['height']));
        $pdf->useTemplate($tplIdx);
        $batas_atas = 40;
        $y=$batas_atas;
        $pdf->SetXY(17,$y);
        $pdf->MultiCell(0,4,"",'','L',0);
    } else {
        $y=$pdf->GetY();
        $pdf->SetXY(17,$y);
        $pdf->MultiCell(0,4,"",'','L',0);
    }

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"29.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Riwayat Hukuman Disiplin",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(10,8,"No",'LRTB','C',0);
    $pdf->SetXY(35,$y);
    $pdf->MultiCell(40,8,"No & Tanggal SK",'RTB','C',0);
    $pdf->SetXY(75,$y);
    $pdf->MultiCell(40,8,"Hukuman",'RTB','C',0);
    $pdf->SetXY(115,$y);
    $pdf->MultiCell(30,4,"Pasal yang Dilanggar",'RTB','C',0);
    $pdf->SetXY(145,$y);
    $pdf->MultiCell(25,8,"Tanggal Mulai",'RTB','C',0);
    $pdf->SetXY(170,$y);
    $pdf->MultiCell(25,8,"Tanggal Akhir",'RTB','C',0);

    $no = 1;
    $rs3 = mysqli_query($koneksi,"select * from r_hukuman where nip='$nip' order by start_date desc");
    $jumlah3 = mysqli_num_rows($rs3);
    if($jumlah3){
        while($hasil3 = mysqli_fetch_array($rs3)){
            $no_sk_hukuman = stripslashesx ($hasil3['no_sk_hukuman']);
            $tgl_sk_hukuman = stripslashesx ($hasil3['tgl_sk_hukuman']);
            $pasal_pelanggaran = stripslashesx ($hasil3['pasal_pelanggaran']);
            $hukuman = stripslashesx ($hasil3['hukuman']);
            $start_date = stripslashesx ($hasil3['start_date']);
            $end_date = stripslashesx ($hasil3['end_date']);

            $batasnya=$pdf->GetY();
            if($batasnya>270){
                $pdf->AddPage($orientation, array($size['width'], $size['height']));
                $pdf->useTemplate($tplIdx);
                $batas_atas = 40;
                $y=$batas_atas;
                    
                // $y=$pdf->GetY();
                $pdf->SetXY(25,$y);
                $pdf->MultiCell(10,8,"No",'LRTB','C',0);
                $pdf->SetXY(35,$y);
                $pdf->MultiCell(40,8,"No & Tanggal SK",'RTB','C',0);
                $pdf->SetXY(75,$y);
                $pdf->MultiCell(40,8,"Hukuman",'RTB','C',0);
                $pdf->SetXY(115,$y);
                $pdf->MultiCell(30,4,"Pasal yang Dilanggar",'RTB','C',0);
                $pdf->SetXY(145,$y);
                $pdf->MultiCell(25,8,"Tanggal Mulai",'RTB','C',0);
                $pdf->SetXY(170,$y);
                $pdf->MultiCell(25,8,"Tanggal Akhir",'RTB','C',0);
            }

            $y=$pdf->GetY();
            $pdf->SetXY(25,$y);
            $pdf->MultiCell(10,1,"",'LR','C',0);
            $pdf->SetXY(35,$y);
            $pdf->MultiCell(40,1,"",'R','C',0);
            $pdf->SetXY(75,$y);
            $pdf->MultiCell(40,1,"",'R','C',0);
            $pdf->SetXY(115,$y);
            $pdf->MultiCell(30,1,"",'R','C',0);
            $pdf->SetXY(145,$y);
            $pdf->MultiCell(25,1,"",'R','C',0);
            $pdf->SetXY(170,$y);
            $pdf->MultiCell(25,1,"",'R','C',0);

            $y=$pdf->GetY();
            $pdf->SetXY(25,$y);
            $pdf->MultiCell(10,5,$no,'LR','C',0);
            $x1 = $pdf->GetY();
            $tinggi1 = $x1-$y;
            $pdf->SetXY(35,$y);
            $pdf->MultiCell(40,5,$no_sk_hukuman,'R','C',0);
            $x2 = $pdf->GetY();
            $tinggi2 = $x2-$y;
            $pdf->SetXY(75,$y);
            $pdf->MultiCell(40,5,$hukuman,'R','C',0);
            $x3 = $pdf->GetY();
            $tinggi3 = $x3-$y;
            $pdf->SetXY(115,$y);
            $pdf->MultiCell(30,5,$pasal_pelanggaran,'R','C',0);
            $x4 = $pdf->GetY();
            $tinggi4 = $x4-$y;
            $pdf->SetXY(145,$y);
            $pdf->MultiCell(25,5,TanggalIndo2($start_date),'R','C',0);
            $x5 = $pdf->GetY();
            $tinggi5 = $x5-$y;
            $pdf->SetXY(170,$y);
            $pdf->MultiCell(25,5,TanggalIndo2($end_date),'R','C',0);
            $x6 = $pdf->GetY();
            $tinggi6 = $x6-$y;
            $tinggi = max($tinggi1,$tinggi2,$tinggi3,$tinggi4,$tinggi5,$tinggi6);
            $selisih1 = $tinggi-$tinggi1;
            $selisih2 = $tinggi-$tinggi2;
            $selisih3 = $tinggi-$tinggi3;
            $selisih4 = $tinggi-$tinggi4;
            $selisih5 = $tinggi-$tinggi5;
            $selisih6 = $tinggi-$tinggi6;
            $pdf->SetXY(25,$x1);
            $pdf->MultiCell(10,$selisih1,"",'LRB','C',0);
            $pdf->SetXY(35,$x2);
            $pdf->MultiCell(40,$selisih2,"",'RB','L',0);
            $pdf->SetXY(75,$x3);
            $pdf->MultiCell(40,$selisih3,"",'RB','L',0);
            $pdf->SetXY(115,$x4);
            $pdf->MultiCell(30,$selisih4,"",'RB','L',0);
            $pdf->SetXY(145,$x5);
            $pdf->MultiCell(25,$selisih5,"",'RB','L',0);
            $pdf->SetXY(170,$x6);
            $pdf->MultiCell(25,$selisih6,"",'RB','L',0);
            $no++;
        }
    }

    $batasnya=$pdf->GetY();
    if($batasnya>250){
        $pdf->AddPage($orientation, array($size['width'], $size['height']));
        $pdf->useTemplate($tplIdx);
        $batas_atas = 40;
        $y=$batas_atas;
        $pdf->SetXY(17,$y);
        $pdf->MultiCell(0,4,"",'','L',0);
    } else {
        $y=$pdf->GetY();
        $pdf->SetXY(17,$y);
        $pdf->MultiCell(0,6,"",'','L',0);
    }

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"30.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Riwayat Penugasan Lain",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(10,8,"No",'LRTB','C',0);
    $pdf->SetXY(35,$y);
    $pdf->MultiCell(60,8,"Penugasan",'RTB','C',0);
    $pdf->SetXY(95,$y);
    $pdf->MultiCell(50,8,"Jabatan/Peran",'RTB','C',0);
    $pdf->SetXY(145,$y);
    $pdf->MultiCell(25,8,"Sejak",'RTB','C',0);
    $pdf->SetXY(170,$y);
    $pdf->MultiCell(25,8,"Hingga",'RTB','C',0);

    $no = 1;
    $rs3 = mysqli_query($koneksi,"select * from r_penugasan where nip='$nip' order by start_date desc");
    $jumlah3 = mysqli_num_rows($rs3);
    if($jumlah3){
        while($hasil3 = mysqli_fetch_array($rs3)){
            $tupoksi = stripslashesx ($hasil3['tupoksi']);
            $peran = stripslashesx ($hasil3['peran']);
            $penugasan = stripslashesx ($hasil3['penugasan']);
            $start_date = stripslashesx ($hasil3['start_date']);
            $end_date = stripslashesx ($hasil3['end_date']);

            $batasnya=$pdf->GetY();
            if($batasnya>270){
                $pdf->AddPage($orientation, array($size['width'], $size['height']));
                $pdf->useTemplate($tplIdx);
                $batas_atas = 40;
                $y=$batas_atas;
                    
                // $y=$pdf->GetY();
                $pdf->SetXY(25,$y);
                $pdf->MultiCell(10,8,"No",'LRTB','C',0);
                $pdf->SetXY(35,$y);
                $pdf->MultiCell(60,8,"Penugasan",'RTB','C',0);
                $pdf->SetXY(95,$y);
                $pdf->MultiCell(50,8,"Jabatan/Peran",'RTB','C',0);
                $pdf->SetXY(145,$y);
                $pdf->MultiCell(25,8,"Sejak",'RTB','C',0);
                $pdf->SetXY(170,$y);
                $pdf->MultiCell(25,8,"Hingga",'RTB','C',0);
            }

            $y=$pdf->GetY();
            $pdf->SetXY(25,$y);
            $pdf->MultiCell(10,1,"",'LR','C',0);
            $pdf->SetXY(35,$y);
            $pdf->MultiCell(60,1,"",'R','C',0);
            $pdf->SetXY(95,$y);
            $pdf->MultiCell(50,1,"",'R','C',0);
            $pdf->SetXY(145,$y);
            $pdf->MultiCell(25,1,"",'R','C',0);
            $pdf->SetXY(170,$y);
            $pdf->MultiCell(25,1,"",'R','C',0);

            $y=$pdf->GetY();
            $pdf->SetXY(25,$y);
            $pdf->MultiCell(10,5,$no,'LR','C',0);
            $x1 = $pdf->GetY();
            $tinggi1 = $x1-$y;
            $pdf->SetXY(35,$y);
            $pdf->MultiCell(60,5,$tupoksi,'R','C',0);
            $x2 = $pdf->GetY();
            $tinggi2 = $x2-$y;
            $pdf->SetXY(95,$y);
            $pdf->MultiCell(50,5,$penugasan,'R','C',0);
            $pdf->SetXY(95,$y+4);
            $pdf->MultiCell(50,5,$pesan,'R','C',0);
            $x3 = $pdf->GetY();
            $tinggi3 = $x3-$y;
            $pdf->SetXY(145,$y);
            $pdf->MultiCell(25,5,TanggalIndo2($start_date),'R','C',0);
            $x4 = $pdf->GetY();
            $tinggi4 = $x4-$y;
            $pdf->SetXY(170,$y);
            $pdf->MultiCell(25,5,TanggalIndo2($end_date),'R','C',0);
            $x5 = $pdf->GetY();
            $tinggi5 = $x5-$y;
            $tinggi = max($tinggi1,$tinggi2,$tinggi3,$tinggi4,$tinggi5);
            $selisih1 = $tinggi-$tinggi1;
            $selisih2 = $tinggi-$tinggi2;
            $selisih3 = $tinggi-$tinggi3;
            $selisih4 = $tinggi-$tinggi4;
            $selisih5 = $tinggi-$tinggi5;
            $pdf->SetXY(25,$x1);
            $pdf->MultiCell(10,$selisih1,"",'LRB','C',0);
            $pdf->SetXY(35,$x2);
            $pdf->MultiCell(60,$selisih2,"",'RB','L',0);
            $pdf->SetXY(95,$x3);
            $pdf->MultiCell(50,$selisih3,"",'RB','L',0);
            $pdf->SetXY(145,$x4);
            $pdf->MultiCell(25,$selisih4,"",'RB','L',0);
            $pdf->SetXY(170,$x5);
            $pdf->MultiCell(25,$selisih5,"",'RB','L',0);
            $no++;
        }
    }

    $batasnya=$pdf->GetY();
    if($batasnya>250){
        $pdf->AddPage($orientation, array($size['width'], $size['height']));
        $pdf->useTemplate($tplIdx);
        $batas_atas = 40;
        $y=$batas_atas;
        $pdf->SetXY(17,$y);
        $pdf->MultiCell(0,4,"",'','L',0);
    } else {
        $y=$pdf->GetY();
        $pdf->SetXY(17,$y);
        $pdf->MultiCell(0,6,"",'','L',0);
    }

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"31.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(75,5,"Riwayat Pembicara",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(10,8,"No",'LRTB','C',0);
    $pdf->SetXY(35,$y);
    $pdf->MultiCell(60,8,"Judul Acara",'RTB','C',0);
    $pdf->SetXY(95,$y);
    $pdf->MultiCell(50,8,"Tingkat Acara",'RTB','C',0);
    $pdf->SetXY(145,$y);
    $pdf->MultiCell(25,8,"Sejak",'RTB','C',0);
    $pdf->SetXY(170,$y);
    $pdf->MultiCell(25,8,"Hingga",'RTB','C',0);

    $no = 1;
    $rs3 = mysqli_query($koneksi,"select a.*,b.label as tingkat_acara2 from r_pembicara a left join m_tingkat_acara b on a.tingkat_acara=b.kode where a.nip='$nip' order by a.start_date desc");
    $jumlah3 = mysqli_num_rows($rs3);
    if($jumlah3){
        while($hasil3 = mysqli_fetch_array($rs3)){
            $judul_acara = stripslashesx ($hasil3['judul_acara']);
            $tingkat_acara2 = stripslashesx ($hasil3['tingkat_acara2']);
            $start_date = stripslashesx ($hasil3['start_date']);
            $end_date = stripslashesx ($hasil3['end_date']);

            $batasnya=$pdf->GetY();
            if($batasnya>270){
                $pdf->AddPage($orientation, array($size['width'], $size['height']));
                $pdf->useTemplate($tplIdx);
                $batas_atas = 40;
                $y=$batas_atas;
                    
                // $y=$pdf->GetY();
                $pdf->SetXY(25,$y);
                $pdf->MultiCell(10,8,"No",'LRTB','C',0);
                $pdf->SetXY(35,$y);
                $pdf->MultiCell(60,8,"Judul Acara",'RTB','C',0);
                $pdf->SetXY(95,$y);
                $pdf->MultiCell(50,8,"Tingkat Acara",'RTB','C',0);
                $pdf->SetXY(145,$y);
                $pdf->MultiCell(25,8,"Sejak",'RTB','C',0);
                $pdf->SetXY(170,$y);
                $pdf->MultiCell(25,8,"Hingga",'RTB','C',0);
            }

            $y=$pdf->GetY();
            $pdf->SetXY(25,$y);
            $pdf->MultiCell(10,1,"",'LR','C',0);
            $pdf->SetXY(35,$y);
            $pdf->MultiCell(60,1,"",'R','C',0);
            $pdf->SetXY(95,$y);
            $pdf->MultiCell(50,1,"",'R','C',0);
            $pdf->SetXY(145,$y);
            $pdf->MultiCell(25,1,"",'R','C',0);
            $pdf->SetXY(170,$y);
            $pdf->MultiCell(25,1,"",'R','C',0);

            $y=$pdf->GetY();
            $pdf->SetXY(25,$y);
            $pdf->MultiCell(10,5,$no,'LR','C',0);
            $x1 = $pdf->GetY();
            $tinggi1 = $x1-$y;
            $pdf->SetXY(35,$y);
            $pdf->MultiCell(60,5,$judul_acara,'R','C',0);
            $x2 = $pdf->GetY();
            $tinggi2 = $x2-$y;
            $pdf->SetXY(95,$y);
            $pdf->MultiCell(50,5,$tingkat_acara2,'R','C',0);
            $x3 = $pdf->GetY();
            $tinggi3 = $x3-$y;
            $pdf->SetXY(145,$y);
            $pdf->MultiCell(25,5,TanggalIndo2($start_date),'R','C',0);
            $x4 = $pdf->GetY();
            $tinggi4 = $x4-$y;
            $pdf->SetXY(170,$y);
            $pdf->MultiCell(25,5,TanggalIndo2($end_date),'R','C',0);
            $x5 = $pdf->GetY();
            $tinggi5 = $x5-$y;
            $tinggi = max($tinggi1,$tinggi2,$tinggi3,$tinggi4,$tinggi5);
            $selisih1 = $tinggi-$tinggi1;
            $selisih2 = $tinggi-$tinggi2;
            $selisih3 = $tinggi-$tinggi3;
            $selisih4 = $tinggi-$tinggi4;
            $selisih5 = $tinggi-$tinggi5;
            $pdf->SetXY(25,$x1);
            $pdf->MultiCell(10,$selisih1,"",'LRB','C',0);
            $pdf->SetXY(35,$x2);
            $pdf->MultiCell(60,$selisih2,"",'RB','L',0);
            $pdf->SetXY(95,$x3);
            $pdf->MultiCell(50,$selisih3,"",'RB','L',0);
            $pdf->SetXY(145,$x4);
            $pdf->MultiCell(25,$selisih4,"",'RB','L',0);
            $pdf->SetXY(170,$x5);
            $pdf->MultiCell(25,$selisih5,"",'RB','L',0);
            $no++;
        }
    }

    $batasnya=$pdf->GetY();
    if($batasnya>250){
        $pdf->AddPage($orientation, array($size['width'], $size['height']));
        $pdf->useTemplate($tplIdx);
        $batas_atas = 40;
        $y=$batas_atas;
        $pdf->SetXY(17,$y);
        $pdf->MultiCell(0,4,"",'','L',0);
    } else {
        $y=$pdf->GetY();
        $pdf->SetXY(17,$y);
        $pdf->MultiCell(0,6,"",'','L',0);
    }

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"32.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(0,5,"Riwayat Pengajan di PLN Corporate University",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(10,8,"No",'LRTB','C',0);
    $pdf->SetXY(35,$y);
    $pdf->MultiCell(60,8,"Judul Diklat",'RTB','C',0);
    $pdf->SetXY(95,$y);
    $pdf->MultiCell(50,8,"Lembaga",'RTB','C',0);
    $pdf->SetXY(145,$y);
    $pdf->MultiCell(25,8,"Sejak",'RTB','C',0);
    $pdf->SetXY(170,$y);
    $pdf->MultiCell(25,8,"Hingga",'RTB','C',0);

    $no = 1;
    $rs3 = mysqli_query($koneksi,"select * from r_pengajar where nip='$nip' order by start_date desc");
    $jumlah3 = mysqli_num_rows($rs3);
    if($jumlah3){
        while($hasil3 = mysqli_fetch_array($rs3)){
            $judul_diklat = stripslashesx ($hasil3['judul_diklat']);
            $penyelenggaraan = stripslashesx ($hasil3['penyelenggaraan']);
            $start_date = stripslashesx ($hasil3['start_date']);
            $end_date = stripslashesx ($hasil3['end_date']);

            $batasnya=$pdf->GetY();
            if($batasnya>270){
                $pdf->AddPage($orientation, array($size['width'], $size['height']));
                $pdf->useTemplate($tplIdx);
                $batas_atas = 40;
                $y=$batas_atas;
                    
                // $y=$pdf->GetY();
                $pdf->SetXY(25,$y);
                $pdf->MultiCell(10,8,"No",'LRTB','C',0);
                $pdf->SetXY(35,$y);
                $pdf->MultiCell(60,8,"Judul Diklat",'RTB','C',0);
                $pdf->SetXY(95,$y);
                $pdf->MultiCell(50,8,"Lembaga",'RTB','C',0);
                $pdf->SetXY(145,$y);
                $pdf->MultiCell(25,8,"Sejak",'RTB','C',0);
                $pdf->SetXY(170,$y);
                $pdf->MultiCell(25,8,"Hingga",'RTB','C',0);
            }

            $y=$pdf->GetY();
            $pdf->SetXY(25,$y);
            $pdf->MultiCell(10,1,"",'LR','C',0);
            $pdf->SetXY(35,$y);
            $pdf->MultiCell(60,1,"",'R','C',0);
            $pdf->SetXY(95,$y);
            $pdf->MultiCell(50,1,"",'R','C',0);
            $pdf->SetXY(145,$y);
            $pdf->MultiCell(25,1,"",'R','C',0);
            $pdf->SetXY(170,$y);
            $pdf->MultiCell(25,1,"",'R','C',0);

            $y=$pdf->GetY();
            $pdf->SetXY(25,$y);
            $pdf->MultiCell(10,5,$no,'LR','C',0);
            $x1 = $pdf->GetY();
            $tinggi1 = $x1-$y;
            $pdf->SetXY(35,$y);
            $pdf->MultiCell(60,5,$judul_diklat,'R','C',0);
            $x2 = $pdf->GetY();
            $tinggi2 = $x2-$y;
            $pdf->SetXY(95,$y);
            $pdf->MultiCell(50,5,$penyelenggaraan,'R','C',0);
            $x3 = $pdf->GetY();
            $tinggi3 = $x3-$y;
            $pdf->SetXY(145,$y);
            $pdf->MultiCell(25,5,TanggalIndo2($start_date),'R','C',0);
            $x4 = $pdf->GetY();
            $tinggi4 = $x4-$y;
            $pdf->SetXY(170,$y);
            $pdf->MultiCell(25,5,TanggalIndo2($end_date),'R','C',0);
            $x5 = $pdf->GetY();
            $tinggi5 = $x5-$y;
            $tinggi = max($tinggi1,$tinggi2,$tinggi3,$tinggi4,$tinggi5);
            $selisih1 = $tinggi-$tinggi1;
            $selisih2 = $tinggi-$tinggi2;
            $selisih3 = $tinggi-$tinggi3;
            $selisih4 = $tinggi-$tinggi4;
            $selisih5 = $tinggi-$tinggi5;
            $pdf->SetXY(25,$x1);
            $pdf->MultiCell(10,$selisih1,"",'LRB','C',0);
            $pdf->SetXY(35,$x2);
            $pdf->MultiCell(60,$selisih2,"",'RB','L',0);
            $pdf->SetXY(95,$x3);
            $pdf->MultiCell(50,$selisih3,"",'RB','L',0);
            $pdf->SetXY(145,$x4);
            $pdf->MultiCell(25,$selisih4,"",'RB','L',0);
            $pdf->SetXY(170,$x5);
            $pdf->MultiCell(25,$selisih5,"",'RB','L',0);
            $no++;
        }
    }

    $batasnya=$pdf->GetY();
    if($batasnya>250){
        $pdf->AddPage($orientation, array($size['width'], $size['height']));
        $pdf->useTemplate($tplIdx);
        $batas_atas = 40;
        $y=$batas_atas;
        $pdf->SetXY(17,$y);
        $pdf->MultiCell(0,4,"",'','L',0);
    } else {
        $y=$pdf->GetY();
        $pdf->SetXY(17,$y);
        $pdf->MultiCell(0,6,"",'','L',0);
    }

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"33.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(0,5,"Riwayat Pengajan di Luar PLN Group",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(10,8,"No",'LRTB','C',0);
    $pdf->SetXY(35,$y);
    $pdf->MultiCell(60,8,"Judul Diklat",'RTB','C',0);
    $pdf->SetXY(95,$y);
    $pdf->MultiCell(50,8,"Lembaga",'RTB','C',0);
    $pdf->SetXY(145,$y);
    $pdf->MultiCell(25,8,"Sejak",'RTB','C',0);
    $pdf->SetXY(170,$y);
    $pdf->MultiCell(25,8,"Hingga",'RTB','C',0);

    $batasnya=$pdf->GetY();
    if($batasnya>250){
        $pdf->AddPage($orientation, array($size['width'], $size['height']));
        $pdf->useTemplate($tplIdx);
        $batas_atas = 40;
        $y=$batas_atas;
        $pdf->SetXY(17,$y);
        $pdf->MultiCell(0,4,"",'','L',0);
    } else {
        $y=$pdf->GetY();
        $pdf->SetXY(17,$y);
        $pdf->MultiCell(0,6,"",'','L',0);
    }

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(8,5,"34.",'','L',0);
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(0,5,"Karya Tulis",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(17,$y);
    $pdf->MultiCell(0,4,"",'','L',0);

    $y=$pdf->GetY();
    $pdf->SetXY(25,$y);
    $pdf->MultiCell(10,8,"No",'LRTB','C',0);
    $pdf->SetXY(35,$y);
    $pdf->MultiCell(60,8,"Judul",'RTB','C',0);
    $pdf->SetXY(95,$y);
    $pdf->MultiCell(50,8,"Media Publikasi",'RTB','C',0);
    $pdf->SetXY(145,$y);
    $pdf->MultiCell(25,8,"Sejak",'RTB','C',0);
    $pdf->SetXY(170,$y);
    $pdf->MultiCell(25,8,"Hingga",'RTB','C',0);

    $no = 1;
    $rs3 = mysqli_query($koneksi,"select * from r_karya_tulis where nip='$nip' order by start_date desc");
    $jumlah3 = mysqli_num_rows($rs3);
    if($jumlah3){
        while($hasil3 = mysqli_fetch_array($rs3)){
            $judul = stripslashesx ($hasil3['judul']);
            $media_publikasi = stripslashesx ($hasil3['media_publikasi']);
            $start_date = stripslashesx ($hasil3['start_date']);
            $end_date = stripslashesx ($hasil3['end_date']);

            $batasnya=$pdf->GetY();
            if($batasnya>270){
                $pdf->AddPage($orientation, array($size['width'], $size['height']));
                $pdf->useTemplate($tplIdx);
                $batas_atas = 40;
                $y=$batas_atas;
                    
                // $y=$pdf->GetY();
                $pdf->SetXY(25,$y);
                $pdf->MultiCell(10,8,"No",'LRTB','C',0);
                $pdf->SetXY(35,$y);
                $pdf->MultiCell(60,8,"Judul",'RTB','C',0);
                $pdf->SetXY(95,$y);
                $pdf->MultiCell(50,8,"Media Publikasi",'RTB','C',0);
                $pdf->SetXY(145,$y);
                $pdf->MultiCell(25,8,"Sejak",'RTB','C',0);
                $pdf->SetXY(170,$y);
                $pdf->MultiCell(25,8,"Hingga",'RTB','C',0);
            }

            $y=$pdf->GetY();
            $pdf->SetXY(25,$y);
            $pdf->MultiCell(10,1,"",'LR','C',0);
            $pdf->SetXY(35,$y);
            $pdf->MultiCell(60,1,"",'R','C',0);
            $pdf->SetXY(95,$y);
            $pdf->MultiCell(50,1,"",'R','C',0);
            $pdf->SetXY(145,$y);
            $pdf->MultiCell(25,1,"",'R','C',0);
            $pdf->SetXY(170,$y);
            $pdf->MultiCell(25,1,"",'R','C',0);

            $y=$pdf->GetY();
            $pdf->SetXY(25,$y);
            $pdf->MultiCell(10,5,$no,'LR','C',0);
            $x1 = $pdf->GetY();
            $tinggi1 = $x1-$y;
            $pdf->SetXY(35,$y);
            $pdf->MultiCell(60,5,$judul,'R','C',0);
            $x2 = $pdf->GetY();
            $tinggi2 = $x2-$y;
            $pdf->SetXY(95,$y);
            $pdf->MultiCell(50,5,$media_publikasi,'R','C',0);
            $x3 = $pdf->GetY();
            $tinggi3 = $x3-$y;
            $pdf->SetXY(145,$y);
            $pdf->MultiCell(25,5,TanggalIndo2($start_date),'R','C',0);
            $x4 = $pdf->GetY();
            $tinggi4 = $x4-$y;
            $pdf->SetXY(170,$y);
            $pdf->MultiCell(25,5,TanggalIndo2($end_date),'R','C',0);
            $x5 = $pdf->GetY();
            $tinggi5 = $x5-$y;
            $tinggi = max($tinggi1,$tinggi2,$tinggi3,$tinggi4,$tinggi5);
            $selisih1 = $tinggi-$tinggi1;
            $selisih2 = $tinggi-$tinggi2;
            $selisih3 = $tinggi-$tinggi3;
            $selisih4 = $tinggi-$tinggi4;
            $selisih5 = $tinggi-$tinggi5;
            $pdf->SetXY(25,$x1);
            $pdf->MultiCell(10,$selisih1,"",'LRB','C',0);
            $pdf->SetXY(35,$x2);
            $pdf->MultiCell(60,$selisih2,"",'RB','L',0);
            $pdf->SetXY(95,$x3);
            $pdf->MultiCell(50,$selisih3,"",'RB','L',0);
            $pdf->SetXY(145,$x4);
            $pdf->MultiCell(25,$selisih4,"",'RB','L',0);
            $pdf->SetXY(170,$x5);
            $pdf->MultiCell(25,$selisih5,"",'RB','L',0);
            $no++;
        }
    }


    $pdf->Output();
    
    // $fileiknya = $id.'-ik.pdf';
    // $pdf->Output('', $fileiknya, false);
} else {
    echo "Nomor induk tidak ditemukan";
}
?>
