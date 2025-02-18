<?php
error_reporting(0);
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
ini_set('memory_limit', '-1');

include('koneksi.php');
include('../fungsi.php');
include "../stringvalidasi.php";
$kunci = "cipher.hris@s7o";
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function TanggalIndo3($date){
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
      
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
      
    $result = $BulanIndo[(int)$bulan-1] . " ". $tahun;	
    return($result);
}

$blth2 = $_REQUEST['blth'];
//$blth2 = "2023-03";

$tempdir = "temp/"; 
if (!file_exists($tempdir))
    mkdir($tempdir);

//PLNT    
$spreadsheet = new Spreadsheet();
$spreadsheet->setActiveSheetIndex(0);
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Honorarium');

$sheet->getStyle('A5:AU5')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFb5b1b1');
$sheet->getStyle('A5:AU5')->getAlignment()->setWrapText(true);
$sheet->getStyle("A5:AU5")->applyFromArray([
    "alignment" => [
        "vertical" => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
        "horizontal" => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
    ],
]);


$sheet->getColumnDimension('A')->setWidth(5);
$sheet->getColumnDimension('B')->setWidth(15);
$sheet->getColumnDimension('C')->setWidth(25);
$sheet->getColumnDimension('D')->setWidth(15);
$sheet->getColumnDimension('E')->setWidth(15);
$sheet->getColumnDimension('F')->setWidth(15);
$sheet->getColumnDimension('G')->setWidth(15);
$sheet->getColumnDimension('H')->setWidth(15);
$sheet->getColumnDimension('I')->setWidth(15);
$sheet->getColumnDimension('J')->setWidth(15);
$sheet->getColumnDimension('K')->setWidth(15);
$sheet->getColumnDimension('L')->setWidth(15);
$sheet->getColumnDimension('M')->setWidth(15);
$sheet->getColumnDimension('N')->setWidth(15);
$sheet->getColumnDimension('O')->setWidth(15);
$sheet->getColumnDimension('P')->setWidth(15);
$sheet->getColumnDimension('Q')->setWidth(15);
$sheet->getColumnDimension('R')->setWidth(15);
$sheet->getColumnDimension('S')->setWidth(15);
$sheet->getColumnDimension('T')->setWidth(15);
$sheet->getColumnDimension('U')->setWidth(15);
$sheet->getColumnDimension('V')->setWidth(15);
$sheet->getColumnDimension('W')->setWidth(15);
$sheet->getColumnDimension('X')->setWidth(15);
$sheet->getColumnDimension('Y')->setWidth(15);
$sheet->getColumnDimension('Z')->setWidth(15);
$sheet->getColumnDimension('AA')->setWidth(15);
$sheet->getColumnDimension('AB')->setWidth(15);
$sheet->getColumnDimension('AC')->setWidth(15);
$sheet->getColumnDimension('AD')->setWidth(15);
$sheet->getColumnDimension('AE')->setWidth(15);
$sheet->getColumnDimension('AF')->setWidth(15);
$sheet->getColumnDimension('AG')->setWidth(15);
$sheet->getColumnDimension('AH')->setWidth(15);
$sheet->getColumnDimension('AI')->setWidth(15);
$sheet->getColumnDimension('AJ')->setWidth(15);
$sheet->getColumnDimension('AK')->setWidth(15);
$sheet->getColumnDimension('AL')->setWidth(15);
$sheet->getColumnDimension('AM')->setWidth(15);
$sheet->getColumnDimension('AN')->setWidth(15);
$sheet->getColumnDimension('AO')->setWidth(15);
$sheet->getColumnDimension('AP')->setWidth(15);
$sheet->getColumnDimension('AQ')->setWidth(15);
$sheet->getColumnDimension('AR')->setWidth(15);
$sheet->getColumnDimension('AS')->setWidth(15);
$sheet->getColumnDimension('AT')->setWidth(15);
$sheet->getColumnDimension('AU')->setWidth(25);


$alignment_center = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
$alignment_center2 = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;

$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setName('PLN ND');
$drawing->setDescription('PLN Nusa Daya');
$drawing->setPath('../images/plnndwarna.png');
$drawing->setCoordinates('A1');
$drawing->setHeight(36);
$drawing->setOffsetX(10);
// $drawing->setRotation(25);
$drawing->getShadow()->setVisible(true);
$drawing->getShadow()->setDirection(0);
$drawing->setWorksheet($spreadsheet->getActiveSheet());

$sheet->mergeCells('A4:AU4');
$sheet->setCellValue('A4', 'DAFTAR PEMBAYARAN GAJI HONORARIUM BULAN '.strtoupper(TanggalIndo3($blth2)));

$sheet->setCellValue('A5', 'No');
$sheet->setCellValue('B5', 'NIP');
$sheet->setCellValue('C5', 'Nama');
$sheet->setCellValue('D5', 'Gaji Dasar');
$sheet->setCellValue('E5', 'Honorarium');
$sheet->setCellValue('F5', 'Honorer');
$sheet->setCellValue('G5', 'Tarif Grade (P1)');
$sheet->setCellValue('H5', 'P2-1A');
$sheet->setCellValue('I5', 'P2-1B');
$sheet->setCellValue('J5', 'Tunj.Lokasi');
$sheet->setCellValue('K5', 'Tunj.Perumahan');
$sheet->setCellValue('L5', 'Tunj.Transportasi');
$sheet->setCellValue('M5', 'Bantuan Pulsa');
$sheet->setCellValue('N5', 'Tunj.Kompetensi');
$sheet->setCellValue('O5', 'Lembur');
$sheet->setCellValue('P5', 'Tunjangan Lain');
$sheet->setCellValue('Q5', 'Total Pendapatan');
$sheet->setCellValue('R5', 'DPLK Persero');
$sheet->setCellValue('S5', 'DPLK Simponi Perusahaan');
$sheet->setCellValue('T5', 'JP');
$sheet->setCellValue('U5', 'JKM');
$sheet->setCellValue('V5', 'JKK');
$sheet->setCellValue('W5', 'JHT');
$sheet->setCellValue('X5', 'Kes');
$sheet->setCellValue('Y5', 'Benefit');
$sheet->setCellValue('Z5', 'Pendapatan+Benefit');
$sheet->setCellValue('AA5', 'Pot.Koperasi');
$sheet->setCellValue('AB5', 'Pot.Bazis');
$sheet->setCellValue('AC5', 'Pot DPLK Simponi');
$sheet->setCellValue('AD5', 'Pot DPLK Pribadi');
$sheet->setCellValue('AE5', 'COP Kendaraan');
$sheet->setCellValue('AF5', 'Iuran Peserta');
$sheet->setCellValue('AG5', 'BRPR');
$sheet->setCellValue('AH5', 'Sewa Mess');
$sheet->setCellValue('AI5', 'Pot.Qurban');
$sheet->setCellValue('AJ5', 'Pot.Arisan');
$sheet->setCellValue('AK5', 'Pot.JP');
$sheet->setCellValue('AL5', 'Pot.JHT');
$sheet->setCellValue('AM5', 'Pot.Kes');
$sheet->setCellValue('AN5', 'Potongan Lain');
$sheet->setCellValue('AO5', 'Total Potongan');
$sheet->setCellValue('AP5', 'Dibayarkan');
$sheet->setCellValue('AQ5', 'NPWP');
$sheet->setCellValue('AR5', 'KPP');
$sheet->setCellValue('AS5', 'Bank');
$sheet->setCellValue('AT5', 'Rekening');
$sheet->setCellValue('AU5', 'Atas Nama');

$gaji_dasar2 = 0;
$honorarium2 = 0;
$honorer2 = 0;
$tarif_grade2 = 0;
$tunjangan_posisi2 = 0;
$p21b2 = 0;
$tunjangan_kemahalan2 = 0;
$tunjangan_perumahan2 = 0;
$tunjangan_transportasi2 = 0;
$bantuan_pulsa2 = 0;
$tunjangan_kompetensi2 = 0;
$dplk_persero2 = 0;
$dplk_simponi_pr2 = 0;
$lembur2 = 0;
$tunjangan_lain2 = 0;
$bpjs_tk_pp2 = 0;
$bpjs_tk_kp2 = 0;
$bpjs_tk_kkp2 = 0;
$bpjs_tk_htp2 = 0;
$bpjs_tk_jhtk2 = 0;
$bpjs_tk_pk2 = 0;
$bpjs_kes_pp2 = 0;
$bpjs_kes_pk2 = 0;
$total_pendapatan2 = 0;
$bpjs_pr2 = 0;
$benefit2 = 0;
$pendapatan_benefit2 = 0;
$pot_koperasi2 = 0;
$pot_bazis2 = 0;
$dplk_simponi2 = 0;
$pot_dplk_pribadi2 = 0;
$cop_kendaraan2 = 0;
$iuran_peserta2 = 0;
$brpr2 = 0;
$sewa_mess2 = 0;
$qurban2 = 0;
$arisan2 = 0;
$potongan_lain2 = 0;
$total_potongan2 = 0;
$pph212 = 0;
$upah_bersih2 = 0;

$i = 6;
$no = 1;
$rs = mysqli_query($koneksi,"select a.*,b.nama,b.jabatan,b.jenis,b.nama_bank,b.no_rekening,b.nama_rekening from gaji a left join data_pegawai b on a.nip=b.nip where a.blth='$blth2' and b.jenis<>'ORGANIK' and b.jenis<>'TUGAS KARYA' and b.jenis<>'TUGAS KERJA' order by a.id asc");
while ($hasil = mysqli_fetch_array($rs)){
    $id = stripslashes ($hasil['id']);
    $blth = stripslashes ($hasil['blth']);
    $nip = stripslashes ($hasil['nip']);
    $nama_lengkap = stripslashes ($hasil['nama']);
    $npwp = stripslashes ($hasil['npwp']);
    if($npwp!="" && strlen($npwp)>20){
        $npwp = decryptText($npwp, $kunci);
    }
    $kpp = stripslashes ($hasil['kpp']);
    $jenis = stripslashes ($hasil['jenis']);
    $gaji_dasar = floatval(stripslashes ($hasil['gaji_dasar']));
    $honorarium = floatval(stripslashes ($hasil['honorarium']));
    $honorer = floatval(stripslashes ($hasil['honorer']));
    $tarif_grade = floatval(stripslashes ($hasil['tarif_grade']));
    $tunjangan_posisi = floatval(stripslashes ($hasil['tunjangan_posisi']));
    $p21b = floatval(stripslashes ($hasil['p21b']));
    $tunjangan_kemahalan = floatval(stripslashes ($hasil['tunjangan_kemahalan']));
    $tunjangan_perumahan = floatval(stripslashes ($hasil['tunjangan_perumahan']));
    $tunjangan_transportasi = floatval(stripslashes ($hasil['tunjangan_transportasi']));
    $bantuan_pulsa = floatval(stripslashes ($hasil['bantuan_pulsa']));
    $tunjangan_kompetensi = floatval(stripslashes ($hasil['tunjangan_kompetensi']));
    $dplk_persero = floatval(stripslashes ($hasil['dplk_persero']));
    $dplk_simponi_pr = floatval(stripslashes ($hasil['dplk_simponi_pr']));
    $lembur = floatval(stripslashes ($hasil['lembur']));
    $nama_tunjangan1 = stripslashes ($hasil['nama_tunjangan1']);
    $tunjangan1 = floatval(stripslashes ($hasil['tunjangan1']));
    $nama_tunjangan2 = stripslashes ($hasil['nama_tunjangan2']);
    $tunjangan2 = floatval(stripslashes ($hasil['tunjangan2']));
    $nama_tunjangan3 = stripslashes ($hasil['nama_tunjangan3']);
    $tunjangan3 = floatval(stripslashes ($hasil['tunjangan3']));
    $nama_tunjangan4 = stripslashes ($hasil['nama_tunjangan4']);
    $tunjangan4 = floatval(stripslashes ($hasil['tunjangan4']));
    $tunjangan_lain = $tunjangan1+$tunjangan2+$tunjangan3+$tunjangan4;
    $bpjs_tk_pp = floatval(stripslashes ($hasil['bpjs_tk_pp']));
    $bpjs_tk_kp = floatval(stripslashes ($hasil['bpjs_tk_kp']));
    $bpjs_tk_kkp = floatval(stripslashes ($hasil['bpjs_tk_kkp']));
    $bpjs_tk_htp = floatval(stripslashes ($hasil['bpjs_tk_htp']));
    $bpjs_tk_jhtk = floatval(stripslashes ($hasil['bpjs_tk_jhtk']));
    $bpjs_tk_pk = floatval(stripslashes ($hasil['bpjs_tk_pk']));
    $bpjs_kes_pp = floatval(stripslashes ($hasil['bpjs_kes_pp']));
    $bpjs_kes_pk = floatval(stripslashes ($hasil['bpjs_kes_pk']));
    $total_pendapatan = floatval(stripslashes ($hasil['total_pendapatan']));
    $bpjs_pr = floatval(stripslashes ($hasil['bpjs_pr']));
    $benefit = floatval(stripslashes ($hasil['benefit']));        
    $pendapatan_benefit = floatval(stripslashes ($hasil['pendapatan_benefit']));        
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
    $nama_potongan1 = stripslashes ($hasil['nama_potongan1']);
    $potongan1 = floatval(stripslashes ($hasil['potongan1']));
    $nama_potongan2 = stripslashes ($hasil['nama_potongan2']);
    $potongan2 = floatval(stripslashes ($hasil['potongan2']));
    $nama_potongan3 = stripslashes ($hasil['nama_potongan3']);
    $potongan3 = floatval(stripslashes ($hasil['potongan3']));
    $nama_potongan4 = stripslashes ($hasil['nama_potongan4']);
    $potongan4 = floatval(stripslashes ($hasil['potongan4']));
    $potongan_lain = $potongan1+$potongan2+$potongan3+$potongan4;
    $total_potongan = floatval(stripslashes ($hasil['total_potongan']));
    $pph21 = floatval(stripslashes ($hasil['pph21']));
    $upah_bersih = floatval(stripslashes ($hasil['upah_bersih']));
    $bank_payroll = stripslashes ($hasil['nama_bank']);
    $no_rek_payroll = stripslashes ($hasil['no_rekening']);
    $an_payroll = stripslashes ($hasil['nama_rekening']);
    
    $gaji_dasar2 = $gaji_dasar2+$gaji_dasar;
    $honorarium2 = $honorarium2+$honorarium;
    $honorer2 = $honorer2+$honorer;
    $tarif_grade2 = $tarif_grade2+$tarif_grade;
    $tunjangan_posisi2 = $tunjangan_posisi2+$tunjangan_posisi;
    $p21b2 = $p21b2+$p21b;
    $tunjangan_kemahalan2 = $tunjangan_kemahalan2+$tunjangan_kemahalan;
    $tunjangan_perumahan2 = $tunjangan_perumahan2+$tunjangan_perumahan;
    $tunjangan_transportasi2 = $tunjangan_transportasi2+$tunjangan_transportasi;
    $bantuan_pulsa2 = $bantuan_pulsa2+$bantuan_pulsa;
    $tunjangan_kompetensi2 = $tunjangan_kompetensi2+$tunjangan_kompetensi;
    $dplk_persero2 = $dplk_persero2+$dplk_persero;
    $dplk_simponi_pr2 = $dplk_simponi_pr2+$dplk_simponi_pr;
    $lembur2 = $lembur2+$lembur;
    $tunjangan_lain2 = $tunjangan_lain2+$tunjangan_lain;
    $bpjs_tk_pp2 = $bpjs_tk_pp2+$bpjs_tk_pp;
    $bpjs_tk_kp2 = $bpjs_tk_kp2+$bpjs_tk_kp;
    $bpjs_tk_kkp2 = $bpjs_tk_kkp2+$bpjs_tk_kkp;
    $bpjs_tk_htp2 = $bpjs_tk_htp2+$bpjs_tk_htp;
    $bpjs_tk_jhtk2 = $bpjs_tk_jhtk2+$bpjs_tk_jhtk;
    $bpjs_tk_pk2 = $bpjs_tk_pk2+$bpjs_tk_pk;
    $bpjs_kes_pp2 = $bpjs_kes_pp2+$bpjs_kes_pp;
    $bpjs_kes_pk2 = $bpjs_kes_pk2+$bpjs_kes_pk;
    $total_pendapatan2 = $total_pendapatan2+$total_pendapatan;
    $bpjs_pr2 = $bpjs_pr2+$bpjs_pr;
    $benefit2 = $benefit2+$benefit;
    $pendapatan_benefit2 = $pendapatan_benefit2+$pendapatan_benefit;
    $pot_koperasi2 = $pot_koperasi2+$pot_koperasi;
    $pot_bazis2 = $pot_bazis2+$pot_bazis;
    $dplk_simponi2 = $dplk_simponi2+$dplk_simponi;
    $pot_dplk_pribadi2 = $pot_dplk_pribadi2+$pot_dplk_pribadi;
    $cop_kendaraan2 = $cop_kendaraan2+$cop_kendaraan;
    $iuran_peserta2 = $iuran_peserta2+$iuran_peserta;
    $brpr2 = $brpr2+$brpr;
    $sewa_mess2 = $sewa_mess2+$sewa_mess;
    $qurban2 = $qurban2+$qurban;
    $arisan2 = $arisan2+$arisan;
    $potongan_lain2 = $potongan_lain2+$potongan_lain;
    $total_potongan2 = $total_potongan2+$total_potongan;
    $pph212 = $pph212+$pph21;
    $upah_bersih2 = $upah_bersih2+$upah_bersih;

    $spreadsheet->getActiveSheet()->getStyle('D'.$i.':AR'.$i)->getNumberFormat()->setFormatCode('#,##0');
    $spreadsheet->getActiveSheet()->getStyle('AS'.$i.':AU'.$i)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
    $sheet->getStyle('A'.$i.':AU'.$i)->applyFromArray([
        "alignment" => [
            "vertical" => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP
        ],
    ]);

    $sheet->setCellValue('A'.$i, $no);
    $sheet->setCellValue('B'.$i, $nip);
    $sheet->setCellValue('C'.$i, $nama_lengkap);
    $sheet->setCellValue('D'.$i, $gaji_dasar);
    $sheet->setCellValue('E'.$i, $honorarium);
    $sheet->setCellValue('F'.$i, $honorer);
    $sheet->setCellValue('G'.$i, $tarif_grade);
    $sheet->setCellValue('H'.$i, $tunjangan_posisi);
    $sheet->setCellValue('I'.$i, $p21b);
    $sheet->setCellValue('J'.$i, $tunjangan_kemahalan);
    $sheet->setCellValue('K'.$i, $tunjangan_perumahan);
    $sheet->setCellValue('L'.$i, $tunjangan_transportasi);
    $sheet->setCellValue('M'.$i, $bantuan_pulsa);
    $sheet->setCellValue('N'.$i, $tunjangan_kompetensi);
    $sheet->setCellValue('O'.$i, $lembur);
    $sheet->setCellValue('P'.$i, $tunjangan_lain);
    $sheet->setCellValue('Q'.$i, $total_pendapatan);
    $sheet->setCellValue('R'.$i, $dplk_persero);
    $sheet->setCellValue('S'.$i, $dplk_simponi_pr);
    $sheet->setCellValue('T'.$i, $bpjs_tk_pp);
    $sheet->setCellValue('U'.$i, $bpjs_tk_kp);
    $sheet->setCellValue('V'.$i, $bpjs_tk_kkp);
    $sheet->setCellValue('W'.$i, $bpjs_tk_htp);
    $sheet->setCellValue('X'.$i, $bpjs_kes_pp);
    $sheet->setCellValue('Y'.$i, $benefit);
    $sheet->setCellValue('Z'.$i, $pendapatan_benefit);
    $sheet->setCellValue('AA'.$i, $pot_koperasi);
    $sheet->setCellValue('AB'.$i, $pot_bazis);
    $sheet->setCellValue('AC'.$i, $dplk_simponi);
    $sheet->setCellValue('AD'.$i, $pot_dplk_pribadi);
    $sheet->setCellValue('AE'.$i, $cop_kendaraan);
    $sheet->setCellValue('AF'.$i, $iuran_peserta);
    $sheet->setCellValue('AG'.$i, $brpr);
    $sheet->setCellValue('AH'.$i, $sewa_mess);
    $sheet->setCellValue('AI'.$i, $qurban);
    $sheet->setCellValue('AJ'.$i, $arisan);
    $sheet->setCellValue('AK'.$i, $bpjs_tk_pk);
    $sheet->setCellValue('AL'.$i, $bpjs_tk_jhtk);
    $sheet->setCellValue('AM'.$i, $bpjs_kes_pk);
    $sheet->setCellValue('AN'.$i, $potongan_lain);
    $sheet->setCellValue('AO'.$i, $total_potongan);
    $sheet->setCellValue('AP'.$i, $upah_bersih);
    $sheet->setCellValue('AQ'.$i, $npwp);
    $sheet->setCellValue('AR'.$i, $kpp);
    $sheet->setCellValue('AS'.$i, $bank_payroll);
    $sheet->setCellValue('AT'.$i, $no_rek_payroll);
    $sheet->setCellValue('AU'.$i, $an_payroll);
    $i++;
    $no = $no+1;
}
$sheet->getStyle('A'.$i.':AU'.$i)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFb5b1b1');
$spreadsheet->getActiveSheet()->getStyle('D'.$i.':AR'.$i)->getNumberFormat()->setFormatCode('#,##0');
$spreadsheet->getActiveSheet()->getStyle('AS'.$i.':AU'.$i)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
$sheet->setCellValue('A'.$i, "");
$sheet->setCellValue('B'.$i, "");
$sheet->setCellValue('C'.$i, "TOTAL");
$sheet->setCellValue('D'.$i, $gaji_dasar2);
$sheet->setCellValue('E'.$i, $honorarium2);
$sheet->setCellValue('F'.$i, $honorer2);
$sheet->setCellValue('G'.$i, $tarif_grade2);
$sheet->setCellValue('H'.$i, $tunjangan_posisi2);
$sheet->setCellValue('I'.$i, $p21b2);
$sheet->setCellValue('J'.$i, $tunjangan_kemahalan2);
$sheet->setCellValue('K'.$i, $tunjangan_perumahan2);
$sheet->setCellValue('L'.$i, $tunjangan_transportasi2);
$sheet->setCellValue('M'.$i, $bantuan_pulsa2);
$sheet->setCellValue('N'.$i, $tunjangan_kompetensi2);
$sheet->setCellValue('O'.$i, $lembur2);
$sheet->setCellValue('P'.$i, $tunjangan_lain2);
$sheet->setCellValue('Q'.$i, $total_pendapatan2);
$sheet->setCellValue('R'.$i, $dplk_persero2);
$sheet->setCellValue('S'.$i, $dplk_simponi_pr2);
$sheet->setCellValue('T'.$i, $bpjs_tk_pp2);
$sheet->setCellValue('U'.$i, $bpjs_tk_kp2);
$sheet->setCellValue('V'.$i, $bpjs_tk_kkp2);
$sheet->setCellValue('W'.$i, $bpjs_tk_htp2);
$sheet->setCellValue('X'.$i, $bpjs_kes_pp2);
$sheet->setCellValue('Y'.$i, $benefit2);
$sheet->setCellValue('Z'.$i, $pendapatan_benefit2);
$sheet->setCellValue('AA'.$i, $pot_koperasi2);
$sheet->setCellValue('AB'.$i, $pot_bazis2);
$sheet->setCellValue('AC'.$i, $dplk_simponi2);
$sheet->setCellValue('AD'.$i, $pot_dplk_pribadi2);
$sheet->setCellValue('AE'.$i, $cop_kendaraan2);
$sheet->setCellValue('AF'.$i, $iuran_peserta2);
$sheet->setCellValue('AG'.$i, $brpr2);
$sheet->setCellValue('AH'.$i, $sewa_mess2);
$sheet->setCellValue('AI'.$i, $qurban2);
$sheet->setCellValue('AJ'.$i, $arisan2);
$sheet->setCellValue('AK'.$i, $bpjs_tk_pk2);
$sheet->setCellValue('AL'.$i, $bpjs_tk_jhtk2);
$sheet->setCellValue('AM'.$i, $bpjs_kes_pk2);
$sheet->setCellValue('AN'.$i, $potongan_lain2);
$sheet->setCellValue('AO'.$i, $total_potongan2);
$sheet->setCellValue('AP'.$i, $upah_bersih2);
$sheet->setCellValue('AQ'.$i, "");
$sheet->setCellValue('AR'.$i, "");
$sheet->setCellValue('AS'.$i, "");
$sheet->setCellValue('AT'.$i, "");
$sheet->setCellValue('AU'.$i, "");

$spreadsheet->setActiveSheetIndex(0);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Gaji Honor.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
//$writer->save('hello world.xlsx');

?>