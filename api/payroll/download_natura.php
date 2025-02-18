<?php
error_reporting(0);
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
$sheet->setTitle('Shhet1');
$sheet->getStyle('A1:M2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFb5b1b1');
$sheet->getStyle('A1:M2')->getAlignment()->setWrapText(true);
$sheet->getStyle("A1:M2")->applyFromArray([
    "alignment" => [
        "vertical" => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
        "horizontal" => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
    ],
]);

$sheet->getColumnDimension('A')->setWidth(5);
$sheet->getColumnDimension('B')->setWidth(15);
$sheet->getColumnDimension('C')->setWidth(20);
$sheet->getColumnDimension('D')->setWidth(25);
$sheet->getColumnDimension('E')->setWidth(30);
$sheet->getColumnDimension('F')->setWidth(15);
$sheet->getColumnDimension('G')->setWidth(15);
$sheet->getColumnDimension('H')->setWidth(15);
$sheet->getColumnDimension('I')->setWidth(15);
$sheet->getColumnDimension('J')->setWidth(15);
$sheet->getColumnDimension('K')->setWidth(15);
$sheet->getColumnDimension('L')->setWidth(15);
$sheet->getColumnDimension('M')->setWidth(15);

$alignment_center = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
$alignment_center2 = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;

$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Bulan');
$sheet->setCellValue('C1', 'NIP');
$sheet->setCellValue('D1', 'Nama');
$sheet->setCellValue('E1', 'Jabatan');
$sheet->setCellValue('F1', 'COP Kendaraan');
$sheet->setCellValue('G1', 'Fasilitas HP');
$sheet->setCellValue('H1', 'Reimburse Kesehatan');
$sheet->setCellValue('I1', 'Asuransi Kesehatan');
$sheet->setCellValue('J1', 'Sarana Kerja');
$sheet->setCellValue('K1', 'SPPD Manual');
$sheet->setCellValue('L1', 'Asuransi Purna Jabatan');
$sheet->setCellValue('M1', 'Medical Checkup');

$i = 3;
$no = 1;
$rs = mysqli_query($koneksi,"select a.nip,a.nama,a.jabatan,b.* from data_pegawai a left join natura b on a.nip=b.nip where b.blth='$blth2' order by a.id asc");
while ($hasil = mysqli_fetch_array($rs)){
    $nip = stripslashes ($hasil['nip']);
    $nama = stripslashes ($hasil['nama']);
    $jabatan = stripslashes ($hasil['jabatan']);
    $blth = stripslashes ($hasil['no_urut']);
    $blthnip = stripslashes ($hasil['blthnip']);
    $cop = stripslashes ($hasil['cop']);
    $fasilitas_hp = stripslashes ($hasil['fasilitas_hp']);
    $reimburse_kesehatan = stripslashes ($hasil['reimburse_kesehatan']);
    $asuransi_kesehatan = stripslashes ($hasil['asuransi_kesehatan']);
    $sarana_kerja = stripslashes ($hasil['sarana_kerja']);
    $sppd_manual = stripslashes ($hasil['sppd_manual']);    
    $asuransi_purna_jabatan = stripslashes ($hasil['asuransi_purna_jabatan']);    
    $medical_checkup = stripslashes ($hasil['medical_checkup']);    

    $spreadsheet->getActiveSheet()->getStyle('F'.$i.':M'.$i)->getNumberFormat()->setFormatCode('#,##0');
    // $spreadsheet->getActiveSheet()->getStyle('D'.$i.':K'.$i)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
    // $spreadsheet->getActiveSheet()->getStyle('C'.$i)->getNumberFormat()->setFormatCode('#');
    // $sheet->getStyle('A'.$i.':K'.$i)->applyFromArray([
    //     "alignment" => [
    //         "vertical" => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
    //     ],
    // ]);    
    // $sheet->getStyle('A'.$i.':K'.$i)->applyFromArray([
    //     "alignment" => [
    //         "horizontal" => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
    //     ],
    // ]);

    $sheet->setCellValue('A'.$i, $no);
    $sheet->setCellValue('B'.$i, $blth2);
    $sheet->setCellValue('C'.$i, $nip);
    $sheet->setCellValue('D'.$i, $nama);
    $sheet->setCellValue('E'.$i, $jabatan);
    $sheet->setCellValue('F'.$i, $cop);
    $sheet->setCellValue('G'.$i, $fasilitas_hp);
    $sheet->setCellValue('H'.$i, $reimburse_kesehatan);
    $sheet->setCellValue('I'.$i, $asuransi_kesehatan);
    $sheet->setCellValue('J'.$i, $sarana_kerja);
    $sheet->setCellValue('K'.$i, $sppd_manual);
    $sheet->setCellValue('L'.$i, $asuransi_purna_jabatan);
    $sheet->setCellValue('M'.$i, $medical_checkup);
    
    $i++;
    $no = $no+1;
}
$sheet->getStyle('A'.$i.':M'.$i)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFb5b1b1');
$spreadsheet->getActiveSheet()->getStyle('F'.$i.':M'.$i)->getNumberFormat()->setFormatCode('#,##0');
// $spreadsheet->getActiveSheet()->getStyle('A'.$i.':K'.$i)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
$sheet->getStyle('A'.$i.':K'.$i)->applyFromArray([
    "alignment" => [
        "vertical" => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
    ],
]);    
$sheet->getStyle('A'.$i.':M'.$i)->applyFromArray([
    "alignment" => [
        "horizontal" => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
    ],
]);

//$spreadsheet->setActiveSheetIndex(0);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Rincian Natura.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

?>