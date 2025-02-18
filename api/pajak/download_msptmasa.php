<?php
error_reporting(1);
ini_set('memory_limit', '-1');
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
function TanggalIndo2($date){
    if($date!="" && $date!=null){
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);
        $result = $tgl . "." . $bulan . ".". $tahun;	
        return($result);
    } else {
        return("");
    }
}

$blth2 = $_REQUEST['blth'];
//$blth2 = "2023-03";

$tempdir = "temp/"; 
if (!file_exists($tempdir))
    mkdir($tempdir);

$spreadsheet = new Spreadsheet();
$spreadsheet->setActiveSheetIndex(0);
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Mapping SPT Masa');
// $sheet->getStyle('A1:CD3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFb5b1b1');
$sheet->getStyle('A1:E3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFb5b1b1');
$sheet->getStyle('F1:H3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFabebc6');
$sheet->getStyle('I1:U3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFd4e6f1');
$sheet->getStyle('V1:AJ3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFd7bde2');
$sheet->getStyle('AK1:AS3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFe6b0aa');
$sheet->getStyle('AT1:AY3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFfad7a0');
$sheet->getStyle('AZ1:BX3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFa3e4d7');
$sheet->getStyle('BY1:CD3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFfad7a0');
$sheet->getStyle('CE1:CE3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFb5b1b1');
$sheet->getStyle('A1:CE3')->getAlignment()->setWrapText(true);
$sheet->getStyle("A1:CE3")->applyFromArray([
    "alignment" => [
        "vertical" => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
        "horizontal" => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
    ],
]);

$sheet->getColumnDimension('A')->setWidth(5);
$sheet->getColumnDimension('B')->setWidth(15);
$sheet->getColumnDimension('C')->setWidth(25);
$sheet->getColumnDimension('D')->setWidth(15);
$sheet->getColumnDimension('E')->setWidth(20);
$sheet->getColumnDimension('F')->setWidth(20);
$sheet->getColumnDimension('G')->setWidth(20);
$sheet->getColumnDimension('H')->setWidth(20);
$sheet->getColumnDimension('I')->setWidth(20);
$sheet->getColumnDimension('J')->setWidth(20);
$sheet->getColumnDimension('K')->setWidth(20);
$sheet->getColumnDimension('L')->setWidth(20);
$sheet->getColumnDimension('M')->setWidth(20);
$sheet->getColumnDimension('N')->setWidth(20);
$sheet->getColumnDimension('O')->setWidth(20);
$sheet->getColumnDimension('P')->setWidth(20);
$sheet->getColumnDimension('Q')->setWidth(20);
$sheet->getColumnDimension('R')->setWidth(20);
$sheet->getColumnDimension('S')->setWidth(20);
$sheet->getColumnDimension('T')->setWidth(20);
$sheet->getColumnDimension('U')->setWidth(20);
$sheet->getColumnDimension('V')->setWidth(20);
$sheet->getColumnDimension('W')->setWidth(20);
$sheet->getColumnDimension('x')->setWidth(20);
$sheet->getColumnDimension('Y')->setWidth(20);
$sheet->getColumnDimension('Z')->setWidth(20);
$sheet->getColumnDimension('AA')->setWidth(20);
$sheet->getColumnDimension('AB')->setWidth(20);
$sheet->getColumnDimension('AC')->setWidth(20);
$sheet->getColumnDimension('AD')->setWidth(20);
$sheet->getColumnDimension('AE')->setWidth(20);
$sheet->getColumnDimension('AF')->setWidth(20);
$sheet->getColumnDimension('AG')->setWidth(20);
$sheet->getColumnDimension('AH')->setWidth(20);
$sheet->getColumnDimension('AI')->setWidth(20);
$sheet->getColumnDimension('AJ')->setWidth(20);
$sheet->getColumnDimension('AK')->setWidth(20);
$sheet->getColumnDimension('AL')->setWidth(20);
$sheet->getColumnDimension('AM')->setWidth(20);
$sheet->getColumnDimension('AN')->setWidth(20);
$sheet->getColumnDimension('AO')->setWidth(20);
$sheet->getColumnDimension('AP')->setWidth(20);
$sheet->getColumnDimension('AQ')->setWidth(20);
$sheet->getColumnDimension('AR')->setWidth(20);
$sheet->getColumnDimension('AS')->setWidth(20);
$sheet->getColumnDimension('AT')->setWidth(20);
$sheet->getColumnDimension('AU')->setWidth(20);
$sheet->getColumnDimension('AV')->setWidth(20);
$sheet->getColumnDimension('AW')->setWidth(20);
$sheet->getColumnDimension('AX')->setWidth(20);
$sheet->getColumnDimension('AY')->setWidth(20);
$sheet->getColumnDimension('AZ')->setWidth(20);
$sheet->getColumnDimension('BA')->setWidth(20);
$sheet->getColumnDimension('BB')->setWidth(20);
$sheet->getColumnDimension('BC')->setWidth(20);
$sheet->getColumnDimension('BD')->setWidth(20);
$sheet->getColumnDimension('BE')->setWidth(20);
$sheet->getColumnDimension('BF')->setWidth(20);
$sheet->getColumnDimension('BG')->setWidth(20);
$sheet->getColumnDimension('BH')->setWidth(20);
$sheet->getColumnDimension('BI')->setWidth(20);
$sheet->getColumnDimension('BJ')->setWidth(20);
$sheet->getColumnDimension('BK')->setWidth(20);
$sheet->getColumnDimension('BL')->setWidth(20);
$sheet->getColumnDimension('BM')->setWidth(20);
$sheet->getColumnDimension('BN')->setWidth(20);
$sheet->getColumnDimension('BO')->setWidth(20);
$sheet->getColumnDimension('BP')->setWidth(20);
$sheet->getColumnDimension('BQ')->setWidth(20);
$sheet->getColumnDimension('BR')->setWidth(20);
$sheet->getColumnDimension('BS')->setWidth(20);
$sheet->getColumnDimension('BT')->setWidth(20);
$sheet->getColumnDimension('BU')->setWidth(20);
$sheet->getColumnDimension('BV')->setWidth(20);
$sheet->getColumnDimension('BW')->setWidth(20);
$sheet->getColumnDimension('BX')->setWidth(20);
$sheet->getColumnDimension('BY')->setWidth(20);
$sheet->getColumnDimension('BZ')->setWidth(20);
$sheet->getColumnDimension('CA')->setWidth(20);
$sheet->getColumnDimension('CB')->setWidth(20);
$sheet->getColumnDimension('CC')->setWidth(20);
$sheet->getColumnDimension('CD')->setWidth(20);
$sheet->getColumnDimension('CE')->setWidth(10);

$alignment_center = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
$alignment_center2 = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;

$sheet->mergeCells('A1:A3');
$sheet->setCellValue('A1', "No");
$sheet->mergeCells('B1:B3');
$sheet->setCellValue('B1', "No Induk");
$sheet->mergeCells('C1:C3');
$sheet->setCellValue('C1', "Nama");
$sheet->mergeCells('D1:D3');
$sheet->setCellValue('D1', "Departemen");
$sheet->mergeCells('E1:E3');
$sheet->setCellValue('E1', "Kode Project");

$sheet->mergeCells('F1:H1');
$sheet->setCellValue('F1', "GAJI");
$sheet->setCellValue('F2', "6201100000");
$sheet->setCellValue('F3', "Pay For Person (P1) - Usaha");
$sheet->setCellValue('G2', "5104200110");
$sheet->setCellValue('G3', "Pay For Person (P1) - BPP");
$sheet->setCellValue('H2', "1107109000");
$sheet->setCellValue('H3', "AMC_GAJI");

$sheet->mergeCells('I1:U1');
$sheet->setCellValue('I1', "TUNJANGAN");
$sheet->setCellValue('I2', "6401012000");
$sheet->setCellValue('I3', "Gaji Direksi & Komisaris");
$sheet->setCellValue('J2', "6401019000");
$sheet->setCellValue('J3', "Honorarium Organ Dewan Komisaris");
$sheet->setCellValue('K2', "6401021000");
$sheet->setCellValue('K3', "Honorarium Peg. PKWT Ktr Pst");
$sheet->setCellValue('L2', "5109111000");
$sheet->setCellValue('L3', "HONOR_BPP");
$sheet->setCellValue('M2', "6201200000");
$sheet->setCellValue('M3', "Pay For Position (P2) - Usaha");
$sheet->setCellValue('N2', "5104200120");
$sheet->setCellValue('N3', "Pay For Position (P2) - BPP");
$sheet->setCellValue('O2', "1107109000");
$sheet->setCellValue('O3', "AMC_TUNJANGAN");
$sheet->setCellValue('P2', "6202370000");
$sheet->setCellValue('P3', "Fasilitas Kendaraan - Usaha");
$sheet->setCellValue('Q2', "5104200410");
$sheet->setCellValue('Q3', "Fasilitas Kendaraan - BPP");
$sheet->setCellValue('R2', "6401013000");
$sheet->setCellValue('R3', "PO_Tunjangan DirDekom");
$sheet->setCellValue('S2', "6401022000");
$sheet->setCellValue('S3', "PO_Tunjangan PKWT KanPus");
$sheet->setCellValue('T2', "6401052000");
$sheet->setCellValue('T3', "POS_USAHA");
$sheet->setCellValue('U2', "5109117000");
$sheet->setCellValue('U3', "POS_BPP");

$sheet->mergeCells('V1:AJ1');
$sheet->setCellValue('V1', "BENEFIT");
$sheet->setCellValue('V2', "6202190000");
$sheet->setCellValue('V3', "Iuran Pemberi Kerja - Usaha");
$sheet->setCellValue('W2', "6202200000");
$sheet->setCellValue('W3', "Iuran Pemberi Kerja BPJS JHT - Usaha");
$sheet->setCellValue('X2', "6202210000");
$sheet->setCellValue('X3', "Iuran Pemberi Kerja BPJS Kesehatan - Usaha");
$sheet->setCellValue('Y2', "6202220000");
$sheet->setCellValue('Y3', "IPK BPJS Jaminan Kecelakaan Kerja - Usaha");
$sheet->setCellValue('Z2', "6202230000");
$sheet->setCellValue('Z3', "IPK BPJS Jaminan Kematian - Usaha");
$sheet->setCellValue('AA2', "6202240000");
$sheet->setCellValue('AA3', "Iuran Pemberi Kerja BPJS Jaminan Pensiun - Usaha");
$sheet->setCellValue('AB2', "6202250000");
$sheet->setCellValue('AB3', "Asuransi_Kes");
$sheet->setCellValue('AC2', "5104200240");
$sheet->setCellValue('AC3', "Iuran Pemberi Kerja BPJS JHT - BPP");
$sheet->setCellValue('AD2', "5104200250");
$sheet->setCellValue('AD3', "Iuran Pemberi Kerja BPJS Kesehatan - BPP");
$sheet->setCellValue('AE2', "5104200260");
$sheet->setCellValue('AE3', "IPK BPJS Jaminan Kecelakaan Kerja - BPP");
$sheet->setCellValue('AF2', "5104200270");
$sheet->setCellValue('AF3', "IPK BPJS Jaminan Kematian - BPP");
$sheet->setCellValue('AG2', "5104200280");
$sheet->setCellValue('AG3', "Iuran Pemberi Kerja BPJS Jaminan Pensiun - BPP");
$sheet->setCellValue('AH2', "5104200290");
$sheet->setCellValue('AH3', "PO_ASURANSI_PEG_BPP");
$sheet->setCellValue('AI2', "6401013000");
$sheet->setCellValue('AI3', "PO_Tunjangan DirDekom");
$sheet->setCellValue('AJ2', "1107109000");
$sheet->setCellValue('AJ3', "AMC_BENEFIT");

$sheet->mergeCells('AK1:AS1');
$sheet->setCellValue('AK1', "NATURA");
$sheet->setCellValue('AK2', "6401052000");
$sheet->setCellValue('AK3', "POS_USAHA");
$sheet->setCellValue('AL2', "6401018000");
$sheet->setCellValue('AL3', "Pembayaran Lainnya ke Direksi dan Dekom");
$sheet->setCellValue('AM2', "6202300000");
$sheet->setCellValue('AM3', "Kesehatan_Usaha");
$sheet->setCellValue('AN2', "5104200340");
$sheet->setCellValue('AN3', "Kesehatan_BPP");
$sheet->setCellValue('AO2', "5104200290");
$sheet->setCellValue('AO3', "PO_ASURANSI_PEG_BPP");
$sheet->setCellValue('AP2', "6401031000");
$sheet->setCellValue('AP3', "SPPD_NonDiklat_Usaha");
$sheet->setCellValue('AQ2', "5109114000");
$sheet->setCellValue('AQ3', "SPPD_NonDiklat_BPP");
$sheet->setCellValue('AR2', "6202340000");
$sheet->setCellValue('AR3', "SPPD_Mutasi_Usaha");
$sheet->setCellValue('AS2', "5104200380");
$sheet->setCellValue('AS3', "SPPD_Mutasi_BPP");

$sheet->mergeCells('AT1:AY1');
$sheet->setCellValue('AT1', "BEBAN PPH 21");
$sheet->setCellValue('AT2', "6202260000");
$sheet->setCellValue('AT3', "PPh 21_USAHA");
$sheet->setCellValue('AU2', "6401017000");
$sheet->setCellValue('AU3', "PPh 21_DIRKOM");
$sheet->setCellValue('AV2', "6401024000");
$sheet->setCellValue('AV3', "Beban PPh Psl 21 Peg. PKWT Ktr Pst");
$sheet->setCellValue('AW2', "5104200300");
$sheet->setCellValue('AW3', "PPh 21_BPP");
$sheet->setCellValue('AX2', "5109111000");
$sheet->setCellValue('AX3', "HONOR_BPP");
$sheet->setCellValue('AY2', "1107109000");
$sheet->setCellValue('AY3', "AMC_PPH 21");

$sheet->mergeCells('AZ1:BX1');
$sheet->setCellValue('AZ1', "NON RUTIN");
$sheet->setCellValue('AZ2', "6202180000");
$sheet->setCellValue('AZ3', "THR_USAHA");
$sheet->setCellValue('BA2', "6401014000");
$sheet->setCellValue('BA3', "THR_DIRKOM");
$sheet->setCellValue('BB2', "6401023000");
$sheet->setCellValue('BB3', "THR_PKWT PST");
$sheet->setCellValue('BC2', "5104200220");
$sheet->setCellValue('BC3', "THR_BPP");
$sheet->setCellValue('BD2', "5109111000");
$sheet->setCellValue('BD3', "HONOR_BPP");
$sheet->setCellValue('BE2', "1107109000");
$sheet->setCellValue('BE3', "AMC_NON RUTIN");
$sheet->setCellValue('BF2', "6202110000");
$sheet->setCellValue('BF3', "CUTI_TAHUNAN_USAHA");
$sheet->setCellValue('BG2', "5104200150");
$sheet->setCellValue('BG3', "CUTI_TAHUNAN_BPP");
$sheet->setCellValue('BH2', "1107109000");
$sheet->setCellValue('BH3', "AMC_NON RUTIN");
$sheet->setCellValue('BI2', "6401013000");
$sheet->setCellValue('BI3', "PO_Tunjangan DirDekom");
$sheet->setCellValue('BJ2', "6202120000");
$sheet->setCellValue('BJ3', "CUTI_BESAR_USAHA");
$sheet->setCellValue('BK2', "5104200160");
$sheet->setCellValue('BK3', "CUTI_BESAR_BPP");
$sheet->setCellValue('BL2', "6401013000");
$sheet->setCellValue('BL3', "PO_Tunjangan DirDekom");
$sheet->setCellValue('BM2', "1107109000");
$sheet->setCellValue('BM3', "AMC_NON RUTIN");
$sheet->setCellValue('BN2', "6202130000");
$sheet->setCellValue('BN3', "WINDUAN_USAHA");
$sheet->setCellValue('BO2', "5104200170");
$sheet->setCellValue('BO3', "WINDUAN_BPP");
$sheet->setCellValue('BP2', "1107109000");
$sheet->setCellValue('BP3', "AMC_NON RUTIN");
$sheet->setCellValue('BQ2', "6201300000");
$sheet->setCellValue('BQ3', "IKI_USAHA");
$sheet->setCellValue('BR2', "6201400000");
$sheet->setCellValue('BR3', "IKP_USAHA");
$sheet->setCellValue('BS2', "5104200130");
$sheet->setCellValue('BS3', "IKI_BPP");
$sheet->setCellValue('BT2', "5104200140");
$sheet->setCellValue('BT3', "IKP_BPP");
$sheet->setCellValue('BU2', "1107109000");
$sheet->setCellValue('BU3', "AMC_NON RUTIN");
$sheet->setCellValue('BV2', "1107109000");
$sheet->setCellValue('BV3', "AMC_NON RUTIN");
$sheet->setCellValue('BW2', "6202330000");
$sheet->setCellValue('BW3', "BFSR_USAHA");
$sheet->setCellValue('BX2', "5104200370");
$sheet->setCellValue('BX3', "BFSR_BPP");

$sheet->mergeCells('BY1:CD1');
$sheet->setCellValue('BY1', "PPH 21");
$sheet->setCellValue('BY2', "6202260000");
$sheet->setCellValue('BY3', "PPh 21_USAHA");
$sheet->setCellValue('BZ2', "6401017000");
$sheet->setCellValue('BZ3', "PPh 21_DIRKOM");
$sheet->setCellValue('CA2', "6401024000");
$sheet->setCellValue('CA3', "Beban PPh Psl 21 Peg. PKWT Ktr Pst");
$sheet->setCellValue('CB2', "5104200300");
$sheet->setCellValue('CB3', "PPh 21_BPP");
$sheet->setCellValue('CC2', "5109111000");
$sheet->setCellValue('CC3', "HONOR_BPP");
$sheet->setCellValue('CD2', "1107109000");
$sheet->setCellValue('CD3', "AMC_PPH 21");

$sheet->setCellValue('CE1', "BLTH");

$i = 4;
$no = 1;
$rs = mysqli_query($koneksi,"select a.*,b.jenis,b.nama,b.jabatan from mapping_sptmasa a left join data_pegawai b on a.nip=b.nip where a.blth='$blth2' order by id asc");
while ($hasil = mysqli_fetch_array($rs)){
    $id = stripslashes ($hasil['id']);
    $nip = stripslashes ($hasil['nip']);
    $jenis = stripslashes ($hasil['jenis']);
    $nama = stripslashes ($hasil['nama']);
    $jabatan = stripslashes ($hasil['jabatan']);
    $blth = stripslashes ($hasil['blth']);
    $kode_departemen = stripslashes ($hasil['kode_departemen']);
    $kode_project = stripslashes ($hasil['kode_project']);
    $tarif_grade = floatval ($hasil['tarif_grade']);
    $honorarium = floatval ($hasil['honorarium']);
    $honorer = floatval ($hasil['honorer']);
    $tunjangan_posisi = floatval ($hasil['tunjangan_posisi']);
    $p21b = floatval ($hasil['p21b']);
    $p22b = floatval ($hasil['p22b']);
    $tunjangan_kemahalan = floatval ($hasil['tunjangan_kemahalan']);
    $tunjangan_perumahan = floatval ($hasil['tunjangan_perumahan']);
    $tunjangan_transportasi = floatval ($hasil['tunjangan_transportasi']);
    $bantuan_pulsa = floatval ($hasil['bantuan_pulsa']);
    $tunjangan_kompetensi = floatval ($hasil['tunjangan_kompetensi']);
    $dplk_persero = floatval ($hasil['dplk_persero']);
    $dplk_simponi_pr = floatval ($hasil['dplk_simponi_pr']);
    $bpjs_tk_pp = floatval ($hasil['bpjs_tk_pp']);
    $bpjs_tk_kp = floatval ($hasil['bpjs_tk_kp']);
    $bpjs_tk_kkp = floatval ($hasil['bpjs_tk_kkp']);
    $bpjs_tk_htp = floatval ($hasil['bpjs_tk_htp']);
    $bpjs_kes_pp = floatval ($hasil['bpjs_kes_pp']);
    $cop = floatval ($hasil['cop']);
    $fasilitas_hp = floatval ($hasil['fasilitas_hp']);
    $reimburse_kesehatan = floatval ($hasil['reimburse_kesehatan']);
    $asuransi_kesehatan = floatval ($hasil['asuransi_kesehatan']);
    $sarana_kerja = floatval ($hasil['sarana_kerja']);
    $sppd_manual = floatval ($hasil['sppd_manual']);
    $asuransi_purna_jabatan = floatval ($hasil['asuransi_purna_jabatan']);
    $medical_checkup = floatval ($hasil['medical_checkup']);
    $beban_pph21 = floatval ($hasil['beban_pph21']);
    $thr = floatval ($hasil['thr']);
    $cuti = floatval ($hasil['cuti']);
    $cuti_besar = floatval ($hasil['cuti_besar']);
    $winduan = floatval ($hasil['winduan']);
    $iks = floatval ($hasil['iks']);
    $ikp = floatval ($hasil['ikp']);
    $sppd_pusat = floatval ($hasil['sppd_pusat']);
    $sppd_region = floatval ($hasil['sppd_region']);
    $sppd_mutasi = floatval ($hasil['sppd_mutasi']);
    $bruto = floatval ($hasil['bruto']);
    $pph21 = floatval ($hasil['pph21']);

    $akun_tarif_grade = floatval ($hasil['akun_tarif_grade']);
    $akun_honorarium = stripslashes ($hasil['akun_honorarium']);
    $akun_honorer = stripslashes ($hasil['akun_honorer']);
    $akun_tunjangan_posisi = stripslashes ($hasil['akun_tunjangan_posisi']);
    $akun_p21b = stripslashes ($hasil['akun_p21b']);
    $akun_p22b = stripslashes ($hasil['akun_p22b']);
    $akun_tunjangan_kemahalan = stripslashes ($hasil['akun_tunjangan_kemahalan']);
    $akun_tunjangan_perumahan = stripslashes ($hasil['akun_tunjangan_perumahan']);
    $akun_tunjangan_transportasi = stripslashes ($hasil['akun_tunjangan_transportasi']);
    $akun_bantuan_pulsa = stripslashes ($hasil['akun_bantuan_pulsa']);
    $akun_tunjangan_kompetensi = stripslashes ($hasil['akun_tunjangan_kompetensi']);
    $akun_dplk_persero = stripslashes ($hasil['akun_dplk_persero']);
    $akun_dplk_simponi_pr = stripslashes ($hasil['akun_dplk_simponi_pr']);
    $akun_bpjs_tk_pp = stripslashes ($hasil['akun_bpjs_tk_pp']);
    $akun_bpjs_tk_kp = stripslashes ($hasil['akun_bpjs_tk_kp']);
    $akun_bpjs_tk_kkp = stripslashes ($hasil['akun_bpjs_tk_kkp']);
    $akun_bpjs_tk_htp = stripslashes ($hasil['akun_bpjs_tk_htp']);
    $akun_bpjs_kes_pp = stripslashes ($hasil['akun_bpjs_kes_pp']);
    $akun_cop = stripslashes ($hasil['akun_cop']);
    $akun_fasilitas_hp = stripslashes ($hasil['akun_fasilitas_hp']);
    $akun_reimburse_kesehatan = stripslashes ($hasil['akun_reimburse_kesehatan']);
    $akun_asuransi_kesehatan = stripslashes ($hasil['akun_asuransi_kesehatan']);
    $akun_sarana_kerja = stripslashes ($hasil['akun_sarana_kerja']);
    $akun_sppd_manual = stripslashes ($hasil['akun_sppd_manual']);
    $akun_asuransi_purna_jabatan = stripslashes ($hasil['akun_asuransi_purna_jabatan']);
    $akun_medical_checkup = stripslashes ($hasil['akun_medical_checkup']);
    $akun_beban_pph21 = stripslashes ($hasil['akun_beban_pph21']);
    $akun_thr = stripslashes ($hasil['akun_thr']);
    $akun_cuti = stripslashes ($hasil['akun_cuti']);
    $akun_cuti_besar = stripslashes ($hasil['akun_cuti_besar']);
    $akun_winduan = stripslashes ($hasil['akun_winduan']);
    $akun_iks = stripslashes ($hasil['akun_iks']);
    $akun_ikp = stripslashes ($hasil['akun_ikp']);
    $akun_sppd_pusat = stripslashes ($hasil['akun_sppd_pusat']);
    $akun_sppd_region = stripslashes ($hasil['akun_sppd_region']);
    $akun_sppd_mutasi = stripslashes ($hasil['akun_sppd_mutasi']);


    $spreadsheet->getActiveSheet()->getStyle('F'.$i.':CD'.$i)->getNumberFormat()->setFormatCode('#,##0');
    $sheet->getStyle('A'.$i.':CD'.$i)->applyFromArray([
        "alignment" => [
            "vertical" => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
        ],
    ]);    

    $sheet->setCellValue('A'.$i, $no); 
    $sheet->setCellValueExplicit('B'.$i,$nip,\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $sheet->setCellValue('C'.$i, $nama); 
    $sheet->setCellValue('D'.$i, $kode_departemen); 
    $sheet->setCellValue('E'.$i, $kode_project); 
    if($akun_tarif_grade=='6201100000'){
        $sheet->setCellValue('F'.$i, $tarif_grade); 
        $sheet->setCellValue('G'.$i, 0); 
        $sheet->setCellValue('H'.$i, 0); 
    } else if($akun_tarif_grade=='5104200110'){
        $sheet->setCellValue('F'.$i, 0); 
        $sheet->setCellValue('G'.$i, $tarif_grade); 
        $sheet->setCellValue('H'.$i, 0); 
    } else if($akun_tarif_grade=='1107109000'){
        $sheet->setCellValue('F'.$i, 0); 
        $sheet->setCellValue('G'.$i, 0); 
        $sheet->setCellValue('H'.$i, $tarif_grade); 
    } else {
        $sheet->setCellValue('F'.$i, 0); 
        $sheet->setCellValue('G'.$i, 0); 
        $sheet->setCellValue('H'.$i, 0); 
    }
    if($akun_honorarium=='6401012000'){
        $sheet->setCellValue('I'.$i, $honorarium); 
        $sheet->setCellValue('J'.$i, 0); 
    } else if($akun_honorarium=='6401019000'){
        $sheet->setCellValue('I'.$i, 0); 
        $sheet->setCellValue('J'.$i, $honorer); 
    // } else if($akun_honorer=='6401019000'){
    //     $sheet->setCellValue('I'.$i, 0); 
    //     $sheet->setCellValue('J'.$i, $honorer); 
    } else {
        $sheet->setCellValue('I'.$i, 0); 
        $sheet->setCellValue('J'.$i, 0); 
    }

    if($akun_honorer=='6401021000'){
        $sheet->setCellValue('K'.$i, $honorer); 
        $sheet->setCellValue('L'.$i, 0); 
    } else if($akun_honorer=='5109111000'){
        $sheet->setCellValue('K'.$i, 0); 
        $sheet->setCellValue('L'.$i, $honorer); 
    } else {
        $sheet->setCellValue('K'.$i, 0); 
        $sheet->setCellValue('L'.$i, 0); 
    }

    if($akun_tunjangan_posisi=='6201200000' || $akun_p21b=='6201200000' || $akun_tunjangan_kemahalan=='6201200000'){
        $sheet->setCellValue('M'.$i, $tunjangan_posisi+$p21b+$tunjangan_kemahalan); 
        $sheet->setCellValue('N'.$i, 0); 
        $sheet->setCellValue('O'.$i, 0); 
    } else if($akun_tunjangan_posisi=='5104200120' || $akun_p21b=='5104200120' || $akun_tunjangan_kemahalan=='5104200120'){
        $sheet->setCellValue('M'.$i, 0); 
        $sheet->setCellValue('N'.$i, $tunjangan_posisi+$p21b+$tunjangan_kemahalan); 
        $sheet->setCellValue('O'.$i, 0); 
    } else if($akun_tunjangan_posisi=='1107109000' || $akun_p21b=='1107109000' || $akun_tunjangan_kemahalan=='1107109000'){
        $sheet->setCellValue('M'.$i, 0); 
        $sheet->setCellValue('N'.$i, 0); 
        $sheet->setCellValue('O'.$i, $tunjangan_posisi+$p21b+$tunjangan_kemahalan); 
    } else {
        $sheet->setCellValue('M'.$i, 0); 
        $sheet->setCellValue('N'.$i, 0); 
        $sheet->setCellValue('O'.$i, 0); 
    }
    
    if($akun_tunjangan_transportasi=='6202370000'){
        $sheet->setCellValue('P'.$i, $tunjangan_transportasi); 
        $sheet->setCellValue('Q'.$i, 0); 
    } else if($akun_tunjangan_transportasi=='5104200410'){
        $sheet->setCellValue('P'.$i, 0); 
        $sheet->setCellValue('Q'.$i, $tunjangan_transportasi); 
    } else {
        $sheet->setCellValue('P'.$i, 0); 
        $sheet->setCellValue('Q'.$i, 0); 
    }
    
    if($akun_tunjangan_perumahan=='6401013000' || $akun_bantuan_pulsa=='6401013000'){
        $sheet->setCellValue('R'.$i, $tunjangan_perumahan+$bantuan_pulsa); 
    } else {
        $sheet->setCellValue('R'.$i, 0); 
    }
    
    if($akun_tunjangan_perumahan=='6401022000' || $akun_bantuan_pulsa=='6401022000' || $akun_tunjangan_kompetensi=='6401022000'){
        $sheet->setCellValue('S'.$i, $tunjangan_perumahan+$bantuan_pulsa+$tunjangan_kompetensi); 
    } else {
        $sheet->setCellValue('S'.$i, 0); 
    }
    
    if($akun_bantuan_pulsa=='6401052000'){
        $sheet->setCellValue('T'.$i, $bantuan_pulsa); 
        $sheet->setCellValue('U'.$i, 0); 
    } else if($akun_bantuan_pulsa=='5109117000'){
        $sheet->setCellValue('T'.$i, 0); 
        $sheet->setCellValue('U'.$i, $bantuan_pulsa); 
    } else {
        $sheet->setCellValue('T'.$i, 0); 
        $sheet->setCellValue('U'.$i, 0); 
    }
    
    if($akun_dplk_persero=='6202190000'){
        $sheet->setCellValue('V'.$i, $dplk_persero); 
    } else {
        $sheet->setCellValue('V'.$i, 0); 
    }
    
    if($akun_bpjs_tk_htp=='6202200000'){
        $sheet->setCellValue('W'.$i, $bpjs_tk_htp); 
    } else {
        $sheet->setCellValue('W'.$i, 0); 
    }
    
    if($akun_bpjs_kes_pp=='6202210000'){
        $sheet->setCellValue('X'.$i, $bpjs_kes_pp); 
    } else {
        $sheet->setCellValue('X'.$i, 0); 
    }
    
    if($akun_bpjs_tk_kkp=='6202220000'){
        $sheet->setCellValue('Y'.$i, $bpjs_tk_kkp); 
    } else {
        $sheet->setCellValue('Y'.$i, 0); 
    }
    
    if($akun_bpjs_tk_kp=='6202230000'){
        $sheet->setCellValue('Z'.$i, $bpjs_tk_kp); 
    } else {
        $sheet->setCellValue('Z'.$i, 0); 
    }
    
    if($akun_bpjs_tk_pp=='6202240000'){
        $sheet->setCellValue('AA'.$i, $bpjs_tk_pp); 
    } else {
        $sheet->setCellValue('AA'.$i, 0); 
    }
    
    if($akun_dplk_simponi_pr=='6202250000'){
        $sheet->setCellValue('AB'.$i, $dplk_simponi_pr); 
    } else {
        $sheet->setCellValue('AB'.$i, 0); 
    }
    
    if($akun_bpjs_tk_htp=='5104200240'){
        $sheet->setCellValue('AC'.$i, $bpjs_tk_htp); 
    } else {
        $sheet->setCellValue('AC'.$i, 0); 
    }
    
    if($akun_bpjs_kes_pp=='5104200250'){
        $sheet->setCellValue('AD'.$i, $bpjs_kes_pp); 
    } else {
        $sheet->setCellValue('AD'.$i, 0); 
    }
    
    if($akun_bpjs_tk_kkp=='5104200260'){
        $sheet->setCellValue('AE'.$i, $bpjs_tk_kkp); 
    } else {
        $sheet->setCellValue('AE'.$i, 0); 
    }
    
    if($akun_bpjs_tk_kp=='5104200270'){
        $sheet->setCellValue('AF'.$i, $bpjs_tk_kp); 
    } else {
        $sheet->setCellValue('AF'.$i, 0); 
    }
    
    if($akun_bpjs_tk_pp=='5104200280'){
        $sheet->setCellValue('AG'.$i, $bpjs_tk_pp); 
    } else {
        $sheet->setCellValue('AG'.$i, 0); 
    }
    
    if($akun_dplk_simponi_pr=='5104200290'){
        $sheet->setCellValue('AH'.$i, $dplk_simponi_pr); 
    } else {
        $sheet->setCellValue('AH'.$i, 0); 
    }
    
    if($akun_dplk_persero=='6401013000'){
        $sheet->setCellValue('AI'.$i, $dplk_persero); 
    } else {
        $sheet->setCellValue('AI'.$i, 0); 
    }

    if($akun_bpjs_tk_htp=='1107109000' || $akun_bpjs_tk_kkp=='1107109000' || $akun_bpjs_tk_kp=='1107109000' || $akun_bpjs_tk_pp=='1107109000' || $akun_bpjs_kes_pp=='1107109000'){
        $sheet->setCellValue('AJ'.$i, $bpjs_tk_htp+$bpjs_tk_kkp+$bpjs_tk_kp+$bpjs_tk_pp+$bpjs_kes_pp); 
    } else {
        $sheet->setCellValue('AJ'.$i, 0); 
    }
    
    if($akun_fasilitas_hp=='6401052000'){
        $sheet->setCellValue('AK'.$i, $fasilitas_hp); 
    } else {
        $sheet->setCellValue('AK'.$i, 0); 
    }
    
    if($akun_cop=='6401018000' || $akun_fasilitas_hp=='6401018000' || $akun_reimburse_kesehatan=='6401018000' || $akun_asuransi_kesehatan=='6401018000' || $akun_sarana_kerja=='6401018000' || $akun_sppd_manual=='6401018000' || $akun_asuransi_purna_jabatan=='6401018000' || $akun_medical_checkup=='6401018000'){
        $sheet->setCellValue('AL'.$i, $cop+$fasilitas_hp+$reimburse_kesehatan+$asuransi_kesehatan+$sarana_kerja+$sppd_manual+$asuransi_purna_jabatan+$medical_checkup); 
    } else {
        $sheet->setCellValue('AL'.$i, 0); 
    }
    
    if($akun_reimburse_kesehatan=='6202300000'){
        $sheet->setCellValue('AM'.$i, $reimburse_kesehatan); 
        $sheet->setCellValue('AN'.$i, 0); 
    } else if($akun_reimburse_kesehatan=='5104200340'){
        $sheet->setCellValue('AM'.$i, 0); 
        $sheet->setCellValue('AN'.$i, $reimburse_kesehatan); 
    } else {
        $sheet->setCellValue('AM'.$i, 0); 
        $sheet->setCellValue('AN'.$i, 0); 
    }
    
    if($akun_asuransi_kesehatan=='5104200290'){
        $sheet->setCellValue('AO'.$i, $asuransi_kesehatan); 
    } else {
        $sheet->setCellValue('AO'.$i, 0); 
    }
    
    if($akun_sppd_pusat=='6401031000'){
        $sheet->setCellValue('AP'.$i, $sppd_pusat); 
    } else {
        $sheet->setCellValue('AP'.$i, 0); 
    }
    
    if($akun_sppd_region=='5109114000'){
        $sheet->setCellValue('AQ'.$i, $sppd_region); 
    } else {
        $sheet->setCellValue('AQ'.$i, 0); 
    }
    
    if($akun_sppd_mutasi=='6202340000'){
        $sheet->setCellValue('AR'.$i, $sppd_mutasi); 
    } else {
        $sheet->setCellValue('AR'.$i, 0); 
    }
    
    if($akun_sppd_mutasi=='5104200380'){
        $sheet->setCellValue('AS'.$i, $sppd_mutasi); 
    } else {
        $sheet->setCellValue('AS'.$i, 0); 
    }
    
    if($akun_beban_pph21=='6202260000'){
        $sheet->setCellValue('AT'.$i, $beban_pph21); 
        $sheet->setCellValue('AU'.$i, 0); 
        $sheet->setCellValue('AV'.$i, 0); 
        $sheet->setCellValue('AW'.$i, 0); 
        $sheet->setCellValue('AX'.$i, 0); 
        $sheet->setCellValue('AY'.$i, 0); 

        $sheet->setCellValue('BY'.$i, $pph21); 
        $sheet->setCellValue('BZ'.$i, 0); 
        $sheet->setCellValue('CA'.$i, 0); 
        $sheet->setCellValue('CB'.$i, 0); 
        $sheet->setCellValue('CC'.$i, 0); 
        $sheet->setCellValue('CD'.$i, 0); 
    } else if($akun_beban_pph21=='6401017000'){
        $sheet->setCellValue('AT'.$i, 0); 
        $sheet->setCellValue('AU'.$i, $beban_pph21); 
        $sheet->setCellValue('AV'.$i, 0); 
        $sheet->setCellValue('AW'.$i, 0); 
        $sheet->setCellValue('AX'.$i, 0); 
        $sheet->setCellValue('AY'.$i, 0); 

        $sheet->setCellValue('BY'.$i, 0); 
        $sheet->setCellValue('BZ'.$i, $pph21); 
        $sheet->setCellValue('CA'.$i, 0); 
        $sheet->setCellValue('CB'.$i, 0); 
        $sheet->setCellValue('CC'.$i, 0); 
        $sheet->setCellValue('CD'.$i, 0); 
    } else if($akun_beban_pph21=='6401024000'){
        $sheet->setCellValue('AT'.$i, 0); 
        $sheet->setCellValue('AU'.$i, 0); 
        $sheet->setCellValue('AV'.$i, $beban_pph21); 
        $sheet->setCellValue('AW'.$i, 0); 
        $sheet->setCellValue('AX'.$i, 0); 
        $sheet->setCellValue('AY'.$i, 0); 

        $sheet->setCellValue('BY'.$i, 0); 
        $sheet->setCellValue('BZ'.$i, 0); 
        $sheet->setCellValue('CA'.$i, $pph21); 
        $sheet->setCellValue('CB'.$i, 0); 
        $sheet->setCellValue('CC'.$i, 0); 
        $sheet->setCellValue('CD'.$i, 0); 
    } else if($akun_beban_pph21=='5104200300'){
        $sheet->setCellValue('AT'.$i, 0); 
        $sheet->setCellValue('AU'.$i, 0); 
        $sheet->setCellValue('AV'.$i, 0); 
        $sheet->setCellValue('AW'.$i, $beban_pph21); 
        $sheet->setCellValue('AX'.$i, 0); 
        $sheet->setCellValue('AY'.$i, 0); 

        $sheet->setCellValue('BY'.$i, 0); 
        $sheet->setCellValue('BZ'.$i, 0); 
        $sheet->setCellValue('CA'.$i, 0); 
        $sheet->setCellValue('CB'.$i, $pph21); 
        $sheet->setCellValue('CC'.$i, 0); 
        $sheet->setCellValue('CD'.$i, 0); 
    } else if($akun_beban_pph21=='5109111000'){
        $sheet->setCellValue('AT'.$i, 0); 
        $sheet->setCellValue('AU'.$i, 0); 
        $sheet->setCellValue('AV'.$i, 0); 
        $sheet->setCellValue('AW'.$i, 0); 
        $sheet->setCellValue('AX'.$i, $beban_pph21); 
        $sheet->setCellValue('AY'.$i, 0); 

        $sheet->setCellValue('BY'.$i, 0); 
        $sheet->setCellValue('BZ'.$i, 0); 
        $sheet->setCellValue('CA'.$i, 0); 
        $sheet->setCellValue('CB'.$i, 0); 
        $sheet->setCellValue('CC'.$i, $pph21); 
        $sheet->setCellValue('CD'.$i, 0); 
    } else if($akun_beban_pph21=='1107109000'){
        $sheet->setCellValue('AT'.$i, 0); 
        $sheet->setCellValue('AU'.$i, 0); 
        $sheet->setCellValue('AV'.$i, 0); 
        $sheet->setCellValue('AW'.$i, 0); 
        $sheet->setCellValue('AX'.$i, 0); 
        $sheet->setCellValue('AY'.$i, $beban_pph21); 

        $sheet->setCellValue('BY'.$i, 0); 
        $sheet->setCellValue('BZ'.$i, 0); 
        $sheet->setCellValue('CA'.$i, 0); 
        $sheet->setCellValue('CB'.$i, 0); 
        $sheet->setCellValue('CC'.$i, 0); 
        $sheet->setCellValue('CD'.$i, $pph21); 
    } else {
        $sheet->setCellValue('AT'.$i, 0); 
        $sheet->setCellValue('AU'.$i, 0); 
        $sheet->setCellValue('AV'.$i, 0); 
        $sheet->setCellValue('AW'.$i, 0); 
        $sheet->setCellValue('AX'.$i, 0); 
        $sheet->setCellValue('AY'.$i, 0); 

        $sheet->setCellValue('BY'.$i, $pph21); 
        $sheet->setCellValue('BZ'.$i, 0); 
        $sheet->setCellValue('CA'.$i, 0); 
        $sheet->setCellValue('CB'.$i, 0); 
        $sheet->setCellValue('CC'.$i, 0); 
        $sheet->setCellValue('CD'.$i, 0); 
    }
    
    if($akun_thr=='6202180000'){
        $sheet->setCellValue('AZ'.$i, $thr); 
        $sheet->setCellValue('BA'.$i, 0); 
        $sheet->setCellValue('BB'.$i, 0); 
        $sheet->setCellValue('BC'.$i, 0); 
        $sheet->setCellValue('BD'.$i, 0); 
        $sheet->setCellValue('BE'.$i, 0); 
    } else if($akun_thr=='6401014000'){
        $sheet->setCellValue('AZ'.$i, 0); 
        $sheet->setCellValue('BA'.$i, $thr); 
        $sheet->setCellValue('BB'.$i, 0); 
        $sheet->setCellValue('BC'.$i, 0); 
        $sheet->setCellValue('BD'.$i, 0); 
        $sheet->setCellValue('BE'.$i, 0); 
    } else if($akun_thr=='6401023000'){
        $sheet->setCellValue('AZ'.$i, 0); 
        $sheet->setCellValue('BA'.$i, 0); 
        $sheet->setCellValue('BB'.$i, $thr); 
        $sheet->setCellValue('BC'.$i, 0); 
        $sheet->setCellValue('BD'.$i, 0); 
        $sheet->setCellValue('BE'.$i, 0); 
    } else if($akun_thr=='5104200220'){
        $sheet->setCellValue('AZ'.$i, 0); 
        $sheet->setCellValue('BA'.$i, 0); 
        $sheet->setCellValue('BB'.$i, 0); 
        $sheet->setCellValue('BC'.$i, $thr); 
        $sheet->setCellValue('BD'.$i, 0); 
        $sheet->setCellValue('BE'.$i, 0); 
    } else if($akun_thr=='5109111000'){
        $sheet->setCellValue('AZ'.$i, 0); 
        $sheet->setCellValue('BA'.$i, 0); 
        $sheet->setCellValue('BB'.$i, 0); 
        $sheet->setCellValue('BC'.$i, 0); 
        $sheet->setCellValue('BD'.$i, $bethrban_pph21); 
        $sheet->setCellValue('BE'.$i, 0); 
    } else if($akun_thr=='1107109000'){
        $sheet->setCellValue('AZ'.$i, 0); 
        $sheet->setCellValue('BA'.$i, 0); 
        $sheet->setCellValue('BB'.$i, 0); 
        $sheet->setCellValue('BC'.$i, 0); 
        $sheet->setCellValue('BD'.$i, 0); 
        $sheet->setCellValue('BE'.$i, $thr); 
    } else {
        $sheet->setCellValue('AZ'.$i, 0); 
        $sheet->setCellValue('BA'.$i, 0); 
        $sheet->setCellValue('BB'.$i, 0); 
        $sheet->setCellValue('BC'.$i, 0); 
        $sheet->setCellValue('BD'.$i, 0); 
        $sheet->setCellValue('BE'.$i, 0); 
    }
    
    if($akun_cuti=='6202110000'){
        $sheet->setCellValue('BF'.$i, $cuti); 
        $sheet->setCellValue('BG'.$i, 0); 
        $sheet->setCellValue('BH'.$i, 0); 
        $sheet->setCellValue('BI'.$i, 0); 
    } else if($akun_cuti=='5104200150'){
        $sheet->setCellValue('BF'.$i, 0); 
        $sheet->setCellValue('BG'.$i, $cuti); 
        $sheet->setCellValue('BH'.$i, 0); 
        $sheet->setCellValue('BI'.$i, 0); 
    } else if($akun_cuti=='1107109000'){
        $sheet->setCellValue('BF'.$i, 0); 
        $sheet->setCellValue('BG'.$i, 0); 
        $sheet->setCellValue('BH'.$i, $cuti); 
        $sheet->setCellValue('BI'.$i, 0); 
    } else if($akun_cuti=='6401013000'){
        $sheet->setCellValue('BF'.$i, 0); 
        $sheet->setCellValue('BG'.$i, 0); 
        $sheet->setCellValue('BH'.$i, 0); 
        $sheet->setCellValue('BI'.$i, $cuti); 
    } else {
        $sheet->setCellValue('BF'.$i, 0); 
        $sheet->setCellValue('BG'.$i, 0); 
        $sheet->setCellValue('BH'.$i, 0); 
        $sheet->setCellValue('BI'.$i, 0); 
    }
    
    if($akun_cuti_besar=='6202120000'){
        $sheet->setCellValue('BJ'.$i, $cuti_besar); 
        $sheet->setCellValue('BK'.$i, 0); 
        $sheet->setCellValue('BL'.$i, 0); 
        $sheet->setCellValue('BM'.$i, 0); 
    } else if($akun_cuti_besar=='5104200160'){
        $sheet->setCellValue('BJ'.$i, 0); 
        $sheet->setCellValue('BK'.$i, $cuti_besar); 
        $sheet->setCellValue('BL'.$i, 0); 
        $sheet->setCellValue('BM'.$i, 0); 
    } else if($akun_cuti_besar=='6401013000'){
        $sheet->setCellValue('BJ'.$i, 0); 
        $sheet->setCellValue('BK'.$i, 0); 
        $sheet->setCellValue('BL'.$i, $cuti_besar); 
        $sheet->setCellValue('BM'.$i, 0); 
    } else if($akun_cuti_besar=='1107109000'){
        $sheet->setCellValue('BJ'.$i, 0); 
        $sheet->setCellValue('BK'.$i, 0); 
        $sheet->setCellValue('BL'.$i, 0); 
        $sheet->setCellValue('BM'.$i, $cuti_besar); 
    } else {
        $sheet->setCellValue('BJ'.$i, 0); 
        $sheet->setCellValue('BK'.$i, 0); 
        $sheet->setCellValue('BL'.$i, 0); 
        $sheet->setCellValue('BM'.$i, 0); 
    }
    
    if($akun_winduan=='6202130000'){
        $sheet->setCellValue('BN'.$i, $winduan); 
        $sheet->setCellValue('BO'.$i, 0); 
        $sheet->setCellValue('BP'.$i, 0); 
    } else if($akun_winduan=='5104200170'){
        $sheet->setCellValue('BN'.$i, 0); 
        $sheet->setCellValue('BO'.$i, $winduan); 
        $sheet->setCellValue('BP'.$i, 0); 
    } else if($akun_winduan=='1107109000'){
        $sheet->setCellValue('BN'.$i, 0); 
        $sheet->setCellValue('BO'.$i, 0); 
        $sheet->setCellValue('BP'.$i, $winduan); 
    } else {
        $sheet->setCellValue('BN'.$i, 0); 
        $sheet->setCellValue('BO'.$i, 0); 
        $sheet->setCellValue('BP'.$i, 0); 
    }
    
    if($akun_iks=='6201300000'){
        $sheet->setCellValue('BQ'.$i, $iks); 
    } else {
        $sheet->setCellValue('BQ'.$i, 0); 
    }
    
    if($akun_ikp=='6201400000'){
        $sheet->setCellValue('BR'.$i, $ikp); 
    } else {
        $sheet->setCellValue('BR'.$i, 0); 
    }
    
    if($akun_iks=='5104200130'){
        $sheet->setCellValue('BS'.$i, $iks); 
    } else {
        $sheet->setCellValue('BS'.$i, 0); 
    }
    
    if($akun_ikp=='5104200140'){
        $sheet->setCellValue('BT'.$i, $ikp); 
    } else {
        $sheet->setCellValue('BT'.$i, 0); 
    }
    
    if($akun_iks=='1107109000'){
        $sheet->setCellValue('BU'.$i, $iks); 
    } else {
        $sheet->setCellValue('BU'.$i, 0); 
    }
    
    if($akun_ikp=='1107109000'){
        $sheet->setCellValue('BV'.$i, $ikp); 
    } else {
        $sheet->setCellValue('BV'.$i, 0); 
    }
    
    if($akun_p22b=='6202330000'){
        $sheet->setCellValue('BW'.$i, $p22b); 
        $sheet->setCellValue('BX'.$i, 0); 
    } else if($akun_p22b=='5104200370'){
        $sheet->setCellValue('BW'.$i, 0); 
        $sheet->setCellValue('BX'.$i, $p22b); 
    } else {
        $sheet->setCellValue('BW'.$i, 0); 
        $sheet->setCellValue('BX'.$i, 0); 
    }
    
    // if($akun_beban_pph21=='6202260000'){
    //     $sheet->setCellValue('BY'.$i, $pph21); 
    //     $sheet->setCellValue('BZ'.$i, 0); 
    //     $sheet->setCellValue('CA'.$i, 0); 
    //     $sheet->setCellValue('CB'.$i, 0); 
    //     $sheet->setCellValue('CC'.$i, 0); 
    //     $sheet->setCellValue('CD'.$i, 0); 
    // } else if($akun_beban_pph21=='6401017000'){
    //     $sheet->setCellValue('BY'.$i, 0); 
    //     $sheet->setCellValue('BZ'.$i, $pph21); 
    //     $sheet->setCellValue('CA'.$i, 0); 
    //     $sheet->setCellValue('CB'.$i, 0); 
    //     $sheet->setCellValue('CC'.$i, 0); 
    //     $sheet->setCellValue('CD'.$i, 0); 
    // } else if($akun_beban_pph21=='6401024000'){
    //     $sheet->setCellValue('BY'.$i, 0); 
    //     $sheet->setCellValue('BZ'.$i, 0); 
    //     $sheet->setCellValue('CA'.$i, $pph21); 
    //     $sheet->setCellValue('CB'.$i, 0); 
    //     $sheet->setCellValue('CC'.$i, 0); 
    //     $sheet->setCellValue('CD'.$i, 0); 
    // } else if($akun_beban_pph21=='5104200300'){
    //     $sheet->setCellValue('BY'.$i, 0); 
    //     $sheet->setCellValue('BZ'.$i, 0); 
    //     $sheet->setCellValue('CA'.$i, 0); 
    //     $sheet->setCellValue('CB'.$i, $pph21); 
    //     $sheet->setCellValue('CC'.$i, 0); 
    //     $sheet->setCellValue('CD'.$i, 0); 
    // } else if($akun_beban_pph21=='5109111000'){
    //     $sheet->setCellValue('BY'.$i, 0); 
    //     $sheet->setCellValue('BZ'.$i, 0); 
    //     $sheet->setCellValue('CA'.$i, 0); 
    //     $sheet->setCellValue('CB'.$i, 0); 
    //     $sheet->setCellValue('CC'.$i, $pph21); 
    //     $sheet->setCellValue('CD'.$i, 0); 
    // } else if($akun_beban_pph21=='1107109000'){
    //     $sheet->setCellValue('BY'.$i, 0); 
    //     $sheet->setCellValue('BZ'.$i, 0); 
    //     $sheet->setCellValue('CA'.$i, 0); 
    //     $sheet->setCellValue('CB'.$i, 0); 
    //     $sheet->setCellValue('CC'.$i, 0); 
    //     $sheet->setCellValue('CD'.$i, $pph21); 
    // } else {
    //     $sheet->setCellValue('BY'.$i, $pph21); 
    //     $sheet->setCellValue('BZ'.$i, 0); 
    //     $sheet->setCellValue('CA'.$i, 0); 
    //     $sheet->setCellValue('CB'.$i, 0); 
    //     $sheet->setCellValue('CC'.$i, 0); 
    //     $sheet->setCellValue('CD'.$i, 0); 
    // }
    $sheet->setCellValue('CE'.$i, $blth2); 
    
    $i++;
    $no = $no+1;
}

//$spreadsheet->setActiveSheetIndex(0);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Mapping SPT Masa.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

?>