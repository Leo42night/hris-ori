<?php
error_reporting(0);
ini_set('memory_limit', '-1');

require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/vendor/autoload.php";
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

$tempdir = "temp/"; 
if (!file_exists($tempdir))
    mkdir($tempdir);

//PLNT    
$spreadsheet = new Spreadsheet();
$spreadsheet->setActiveSheetIndex(0);
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Nusa Daya');
$sheet->getStyle('A5:R5')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFb5b1b1');
$sheet->getStyle('A5:R5')->getAlignment()->setWrapText(true);
$sheet->getStyle("A5:R5")->applyFromArray([
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

$alignment_center = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
$alignment_center2 = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;

$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setName('PLN ND');
$drawing->setDescription('PLN Nusa Daya');
$drawing->setPath(__DIR__ . "/../../assets/plnndwarna.png");
$drawing->setCoordinates('A1');
$drawing->setHeight(36);
$drawing->setOffsetX(10);
// $drawing->setRotation(25);
$drawing->getShadow()->setVisible(true);
$drawing->getShadow()->setDirection(0);
$drawing->setWorksheet($spreadsheet->getActiveSheet());

$sheet->mergeCells('A4:R4');
$sheet->setCellValue('A4', 'DAFTAR POTONGAN PEGAWAI BULAN '.strtoupper(TanggalIndo3($blth2)));

$sheet->setCellValue('A5', 'No');
$sheet->setCellValue('B5', 'NIP');
$sheet->setCellValue('C5', 'Nama');
$sheet->setCellValue('D5', 'Pot.Koperasi');
$sheet->setCellValue('E5', 'Pot.Bazis');
$sheet->setCellValue('F5', 'DPLK Pegawai');
$sheet->setCellValue('G5', 'DPLK Pribadi');
$sheet->setCellValue('H5', 'COP Kendaraan');
$sheet->setCellValue('I5', 'Iuran Peserta');
$sheet->setCellValue('J5', 'BRPR');
$sheet->setCellValue('K5', 'Sewa Mess');
$sheet->setCellValue('L5', 'Qurban');
$sheet->setCellValue('M5', 'Pot Arisan');
$sheet->setCellValue('N5', 'BPJS Kes (1%)');
$sheet->setCellValue('O5', 'BPJS JHT (1%)');
$sheet->setCellValue('P5', 'BPJS JP (2%)');
$sheet->setCellValue('Q5', 'Pot.Lain2');
$sheet->setCellValue('R5', 'Total Potongan');

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
$bpjs_kes2 = 0;
$bpjs_jht2 = 0;
$bpjs_jp2 = 0;
$potongan_lain2 = 0;
$total_potongan2 = 0;

$i = 6;
$no = 1;
$rs = mysqli_query($koneksi,"select a.*,b.nama,b.jabatan,b.jenis from gaji a left join data_pegawai b on a.nip=b.nip where a.blth='$blth2' and (b.jenis='ORGANIK' or b.jenis='TUGAS KARYA') order by a.id asc");
while ($hasil = mysqli_fetch_array($rs)){
    $id = stripslashesx ($hasil['id']);
    $blth = stripslashesx ($hasil['blth']);
    $nip = stripslashesx ($hasil['nip']);
    $nama_lengkap = stripslashesx ($hasil['nama']);
    $npwp = stripslashesx ($hasil['npwp']);
    $kpp = stripslashesx ($hasil['kpp']);
    $jenis = stripslashesx ($hasil['jenis']);
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
    $bpjs_kes = floatval(stripslashesx ($hasil['bpjs_kes_pk']));
    $bpjs_jht = floatval(stripslashesx ($hasil['bpjs_tk_jhtk']));
    $bpjs_jp = floatval(stripslashesx ($hasil['bpjs_tk_pk']));
    $potongan1 = floatval(stripslashesx ($hasil['potongan1']));
    $potongan2 = floatval(stripslashesx ($hasil['potongan2']));
    $potongan3 = floatval(stripslashesx ($hasil['potongan3']));
    $potongan4 = floatval(stripslashesx ($hasil['potongan4']));
    $potongan_lain = $potongan1+$potongan2+$potongan3+$potongan4;
    $total_potongan = floatval(stripslashesx ($hasil['total_potongan']));

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
    $bpjs_kes2 = $bpjs_kes2+$bpjs_kes;
    $bpjs_jht2 = $bpjs_jht2+$bpjs_jht;
    $bpjs_jp2 = $bpjs_jp2+$bpjs_jp;
    $potongan_lain2 = $potongan_lain2+$potongan_lain;
    $total_potongan2 = $total_potongan2+$total_potongan;

    $spreadsheet->getActiveSheet()->getStyle('D'.$i.':R'.$i)->getNumberFormat()->setFormatCode('#,##0');
    $sheet->getStyle('A'.$i.':D'.$i)->applyFromArray([
        "alignment" => [
            "vertical" => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP
        ],
    ]);

    $sheet->setCellValue('A'.$i, $no);
    $sheet->setCellValue('B'.$i, $nip);
    $sheet->setCellValue('C'.$i, $nama_lengkap);
    $sheet->setCellValue('D'.$i, $pot_koperasi);
    $sheet->setCellValue('E'.$i, $pot_bazis);
    $sheet->setCellValue('F'.$i, $dplk_simponi);
    $sheet->setCellValue('G'.$i, $pot_dplk_pribadi);
    $sheet->setCellValue('H'.$i, $cop_kendaraan);
    $sheet->setCellValue('I'.$i, $iuran_peserta);
    $sheet->setCellValue('J'.$i, $brpr);
    $sheet->setCellValue('K'.$i, $sewa_mess);
    $sheet->setCellValue('L'.$i, $qurban);
    $sheet->setCellValue('M'.$i, $arisan);
    $sheet->setCellValue('N'.$i, $bpjs_kes);
    $sheet->setCellValue('O'.$i, $bpjs_jht);
    $sheet->setCellValue('P'.$i, $bpjs_jp);
    $sheet->setCellValue('Q'.$i, $potongan_lain);
    $sheet->setCellValue('R'.$i, $total_potongan);
    
    $i++;
    $no = $no+1;
}
$sheet->getStyle('A'.$i.':R'.$i)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFb5b1b1');
$spreadsheet->getActiveSheet()->getStyle('D'.$i.':R'.$i)->getNumberFormat()->setFormatCode('#,##0');
$sheet->setCellValue('A'.$i, "");
$sheet->setCellValue('B'.$i, "");
$sheet->setCellValue('C'.$i, "TOTAL");
$sheet->setCellValue('D'.$i, $pot_koperasi2);
$sheet->setCellValue('E'.$i, $pot_bazis2);
$sheet->setCellValue('F'.$i, $dplk_simponi2);
$sheet->setCellValue('G'.$i, $pot_dplk_pribadi2);
$sheet->setCellValue('H'.$i, $cop_kendaraan2);
$sheet->setCellValue('I'.$i, $iuran_peserta2);
$sheet->setCellValue('J'.$i, $brpr2);
$sheet->setCellValue('K'.$i, $sewa_mess2);
$sheet->setCellValue('L'.$i, $qurban2);
$sheet->setCellValue('M'.$i, $arisan2);
$sheet->setCellValue('N'.$i, $bpjs_kes2);
$sheet->setCellValue('O'.$i, $bpjs_jht2);
$sheet->setCellValue('P'.$i, $bpjs_jp2);
$sheet->setCellValue('Q'.$i, $potongan_lain2);
$sheet->setCellValue('R'.$i, $total_potongan2);

//PCN
$spreadsheet->createSheet(1);
$spreadsheet->setActiveSheetIndex(1);
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('PCN');
$sheet->getStyle('A5:R5')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFb5b1b1');
$sheet->getStyle('A5:R5')->getAlignment()->setWrapText(true);
$sheet->getStyle("A5:R5")->applyFromArray([
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

$alignment_center = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
$alignment_center2 = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;

$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setName('PLN ND');
$drawing->setDescription('PLN Nusa Daya');
$drawing->setPath(__DIR__ . "/../../assets/plnndwarna.png");
$drawing->setCoordinates('A1');
$drawing->setHeight(36);
$drawing->setOffsetX(10);
// $drawing->setRotation(25);
$drawing->getShadow()->setVisible(true);
$drawing->getShadow()->setDirection(0);
$drawing->setWorksheet($spreadsheet->getActiveSheet());

$sheet->mergeCells('A4:R4');
$sheet->setCellValue('A4', 'DAFTAR POTONGAN TUGAS KARYA BULAN '.strtoupper(TanggalIndo3($blth2)));

$sheet->setCellValue('A5', 'No');
$sheet->setCellValue('B5', 'NIP');
$sheet->setCellValue('C5', 'Nama');
$sheet->setCellValue('D5', 'Pot.Koperasi');
$sheet->setCellValue('E5', 'Pot.Bazis');
$sheet->setCellValue('F5', 'DPLK Pegawai');
$sheet->setCellValue('G5', 'DPLK Pribadi');
$sheet->setCellValue('H5', 'COP Kendaraan');
$sheet->setCellValue('I5', 'Iuran Peserta');
$sheet->setCellValue('J5', 'BRPR');
$sheet->setCellValue('K5', 'Sewa Mess');
$sheet->setCellValue('L5', 'Qurban');
$sheet->setCellValue('M5', 'Pot Arisan');
$sheet->setCellValue('N5', 'BPJS Kes (1%)');
$sheet->setCellValue('O5', 'BPJS JHT (1%)');
$sheet->setCellValue('P5', 'BPJS JP (2%)');
$sheet->setCellValue('Q5', 'Pot.Lain2');
$sheet->setCellValue('R5', 'Total Potongan');

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
$bpjs_kes2 = 0;
$bpjs_jht2 = 0;
$bpjs_jp2 = 0;
$potongan_lain2 = 0;
$total_potongan2 = 0;

$i = 6;
$no = 1;
$rs = mysqli_query($koneksi,"select a.*,b.nama,b.jabatan,b.jenis,b.nama_bank,b.no_rekening,b.nama_rekening from gaji a left join data_pegawai b on a.nip=b.nip where a.blth='$blth2' and b.jenis='TUGAS KERJA' order by a.id asc");
while ($hasil = mysqli_fetch_array($rs)){
    $id = stripslashesx ($hasil['id']);
    $blth = stripslashesx ($hasil['blth']);
    $nip = stripslashesx ($hasil['nip']);
    $nama_lengkap = stripslashesx ($hasil['nama']);
    $npwp = stripslashesx ($hasil['npwp']);
    $kpp = stripslashesx ($hasil['kpp']);
    $jenis = stripslashesx ($hasil['jenis']);
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
    $bpjs_kes = floatval(stripslashesx ($hasil['bpjs_kes_pk']));
    $bpjs_jht = floatval(stripslashesx ($hasil['bpjs_tk_jhtk']));
    $bpjs_jp = floatval(stripslashesx ($hasil['bpjs_tk_pk']));
    $potongan1 = floatval(stripslashesx ($hasil['potongan1']));
    $potongan2 = floatval(stripslashesx ($hasil['potongan2']));
    $potongan3 = floatval(stripslashesx ($hasil['potongan3']));
    $potongan4 = floatval(stripslashesx ($hasil['potongan4']));
    $potongan_lain = $potongan1+$potongan2+$potongan3+$potongan4;
    $total_potongan = floatval(stripslashesx ($hasil['total_potongan']));

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
    $bpjs_kes2 = $bpjs_kes2+$bpjs_kes;
    $bpjs_jht2 = $bpjs_jht2+$bpjs_jht;
    $bpjs_jp2 = $bpjs_jp2+$bpjs_jp;
    $potongan_lain2 = $potongan_lain2+$potongan_lain;
    $total_potongan2 = $total_potongan2+$total_potongan;

    $spreadsheet->getActiveSheet()->getStyle('D'.$i.':AQ'.$i)->getNumberFormat()->setFormatCode('#,##0');
    $spreadsheet->getActiveSheet()->getStyle('AP'.$i.':AT'.$i)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
    $sheet->getStyle('A'.$i.':AT'.$i)->applyFromArray([
        "alignment" => [
            "vertical" => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP
        ],
    ]);

    $sheet->setCellValue('A'.$i, $no);
    $sheet->setCellValue('B'.$i, $nip);
    $sheet->setCellValue('C'.$i, $nama_lengkap);
    $sheet->setCellValue('D'.$i, $pot_koperasi);
    $sheet->setCellValue('E'.$i, $pot_bazis);
    $sheet->setCellValue('F'.$i, $dplk_simponi);
    $sheet->setCellValue('G'.$i, $pot_dplk_pribadi);
    $sheet->setCellValue('H'.$i, $cop_kendaraan);
    $sheet->setCellValue('I'.$i, $iuran_peserta);
    $sheet->setCellValue('J'.$i, $brpr);
    $sheet->setCellValue('K'.$i, $sewa_mess);
    $sheet->setCellValue('L'.$i, $qurban);
    $sheet->setCellValue('M'.$i, $arisan);
    $sheet->setCellValue('N'.$i, $bpjs_kes);
    $sheet->setCellValue('O'.$i, $bpjs_jht);
    $sheet->setCellValue('P'.$i, $bpjs_jp);
    $sheet->setCellValue('Q'.$i, $potongan_lain);
    $sheet->setCellValue('R'.$i, $total_potongan);
    $i++;
    $no = $no+1;
}
$sheet->getStyle('A'.$i.':R'.$i)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFb5b1b1');
$spreadsheet->getActiveSheet()->getStyle('D'.$i.':R'.$i)->getNumberFormat()->setFormatCode('#,##0');
$sheet->setCellValue('A'.$i, "");
$sheet->setCellValue('B'.$i, "");
$sheet->setCellValue('C'.$i, "TOTAL");
$sheet->setCellValue('D'.$i, $pot_koperasi2);
$sheet->setCellValue('E'.$i, $pot_bazis2);
$sheet->setCellValue('F'.$i, $dplk_simponi2);
$sheet->setCellValue('G'.$i, $pot_dplk_pribadi2);
$sheet->setCellValue('H'.$i, $cop_kendaraan2);
$sheet->setCellValue('I'.$i, $iuran_peserta2);
$sheet->setCellValue('J'.$i, $brpr2);
$sheet->setCellValue('K'.$i, $sewa_mess2);
$sheet->setCellValue('L'.$i, $qurban2);
$sheet->setCellValue('M'.$i, $arisan2);
$sheet->setCellValue('N'.$i, $bpjs_kes2);
$sheet->setCellValue('O'.$i, $bpjs_jht2);
$sheet->setCellValue('P'.$i, $bpjs_jp2);
$sheet->setCellValue('Q'.$i, $potongan_lain2);
$sheet->setCellValue('R'.$i, $total_potongan2);


$spreadsheet->setActiveSheetIndex(0);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Potongan Pegawai.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

?>