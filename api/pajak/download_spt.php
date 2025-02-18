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
$sheet->setTitle('Daftar SPT');
$sheet->getStyle('A1:AK1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFb5b1b1');
$sheet->getStyle('A1:AK1')->getAlignment()->setWrapText(true);
$sheet->getStyle("A1:AK1")->applyFromArray([
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

$alignment_center = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
$alignment_center2 = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;

$sheet->setCellValue('A1', "No");
$sheet->setCellValue('B1', "No Induk");
$sheet->setCellValue('C1', "Jenis");
$sheet->setCellValue('D1', "Nama Pegawai");
$sheet->setCellValue('E1', "Jabatan");
$sheet->setCellValue('F1', "KPP");
$sheet->setCellValue('G1', "NPWP");
$sheet->setCellValue('H1', "Bulan Pajak");
$sheet->setCellValue('I1', "Gaji");
$sheet->setCellValue('J1', "Honorarium");
$sheet->setCellValue('K1', "Tunjangan");
$sheet->setCellValue('L1', "Benefit");
$sheet->setCellValue('M1', "Natura");
$sheet->setCellValue('N1', "Beban PPh21");
$sheet->setCellValue('O1', "Non Rutin");
$sheet->setCellValue('P1', "Bruto/Bulan");
$sheet->setCellValue('Q1', "By.Jabatan/Bulan");
$sheet->setCellValue('R1', "Iuran Pensiun/Bulan");
$sheet->setCellValue('S1', "Bruto Total/Bulan");
$sheet->setCellValue('T1', "Bruto/Tahun");
$sheet->setCellValue('U1', "By.Jabatan/Tahun");
$sheet->setCellValue('V1', "Iuran Pensiun/Tahun");
$sheet->setCellValue('W1', "By.Pengurang/Tahun");
$sheet->setCellValue('X1', "Netto Setahun");
$sheet->setCellValue('Y1', "Bruto/Total");
$sheet->setCellValue('Z1', "By.Jabatan/Total");
$sheet->setCellValue('AA1', "Iuran Pensiun/Total");
$sheet->setCellValue('AB1', "By.Pengurang/Total");
$sheet->setCellValue('AC1', "Netto Total");
$sheet->setCellValue('AD1', "Netto Sebelumnya");
$sheet->setCellValue('AE1', "Netto Untuk PPh21");
$sheet->setCellValue('AF1', "PTKP");
$sheet->setCellValue('AG1', "PKP");
$sheet->setCellValue('AH1', "PPh Terutang/Tahun");
$sheet->setCellValue('AI1', "PPh Terutang Rutin");
$sheet->setCellValue('AJ1', "PPh Terutang Non Rutin");
$sheet->setCellValue('AK1', "PPh Terutang/Bulan");

$i = 2;
$no = 1;
$rs = mysqli_query($koneksi,"select a.*,b.jenis,b.nama,b.jabatan from pph a left join data_pegawai b on a.nip=b.nip where a.blth='$blth2' order by (a.no_urut*1) asc");
while ($hasil = mysqli_fetch_array($rs)){
    $id = stripslashes ($hasil['id']);
    $kpp = stripslashes ($hasil['kpp']);
    $npwp = stripslashes ($hasil['npwp']);
    $no_urut = stripslashes ($hasil['no_urut']);
    $nip = stripslashes ($hasil['nip']);
    $jenis = stripslashes ($hasil['jenis']);
    $nama = stripslashes ($hasil['nama']);
    $jabatan = stripslashes ($hasil['jabatan']);
    $status = stripslashes ($hasil['status']);
    $tahun = stripslashes ($hasil['tahun']);
    $blth = stripslashes ($hasil['blth']);
    $blth_awal = stripslashes ($hasil['blth_awal']);
    $blth_akhir = stripslashes ($hasil['blth_akhir']);
    $masa_kerja = stripslashes ($hasil['masa_kerja']);
    $gaji = floatval ($hasil['gaji']);
    $tunjangan_pph = floatval ($hasil['tunjangan_pph']);
    $tunjangan_variable = floatval ($hasil['tunjangan_variable']);
    $honorarium = floatval ($hasil['honorarium']);
    $benefit = floatval ($hasil['benefit']);
    $natuna = floatval ($hasil['natuna']);
    $beban_pph21 = floatval ($hasil['beban_pph21']);
    $bonus_thr = floatval ($hasil['bonus_thr']);
    $brutob = floatval ($hasil['brutob']);
    $biaya_jabatanb = floatval ($hasil['biaya_jabatanb']);
    $iuran_pensiunb = floatval ($hasil['iuran_pensiunb']);
    $brutot = floatval ($hasil['brutot']);
    $biaya_jabatant = floatval ($hasil['biaya_jabatant']);
    $iuran_pensiunt = floatval ($hasil['iuran_pensiunt']);
    $biaya_pengurangt = floatval ($hasil['biaya_pengurangt']);
    $nettot = floatval ($hasil['nettot']);
    $brutot_total = floatval ($hasil['brutot_total']);
    $biaya_jabatant_total = floatval ($hasil['biaya_jabatant_total']);
    $iuran_pensiunt_total = floatval ($hasil['iuran_pensiunt_total']);
    $biaya_pengurangt_total = floatval ($hasil['biaya_pengurangt_total']);
    $nettot_total = floatval ($hasil['nettot_total']);
    $nettot_sebelumnya = floatval ($hasil['nettot_sebelumnya']);
    $nettot_akhir = floatval ($hasil['nettot_akhir']);
    $ptkp = floatval ($hasil['ptkp']);
    $pkp = floatval ($hasil['pkp']);
    $ppht = floatval ($hasil['ppht']);
    $ppht_sebelumnya = floatval ($hasil['ppht_sebelumnya']);
    $ppht_terutang = floatval ($hasil['ppht_terutang']);
    $pphb1_terutang = floatval ($hasil['pphb1_terutang']);
    $pphb2_terutang = floatval ($hasil['pphb2_terutang']);
    $pph_sistem = floatval ($hasil['pph_sistem']);
    $pph_koreksi = floatval ($hasil['pph_koreksi']);
    $pphb_terutang = floatval ($hasil['pphb_terutang']);
    $tgl_proses = stripslashes ($hasil['tgl_proses']);
    $petugas = stripslashes ($hasil['petugas']);


    $spreadsheet->getActiveSheet()->getStyle('I'.$i.':AK'.$i)->getNumberFormat()->setFormatCode('#,##0');
    $sheet->getStyle('A'.$i.':AK'.$i)->applyFromArray([
        "alignment" => [
            "vertical" => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
        ],
    ]);    

    $sheet->setCellValue('A'.$i, $no); 
    $sheet->setCellValueExplicit('B'.$i,$nip,\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $sheet->setCellValue('C'.$i, $jenis); 
    $sheet->setCellValue('D'.$i, $nama); 
    $sheet->setCellValue('E'.$i, $jabatan); 
    $sheet->setCellValue('F'.$i, $kpp); 
    $sheet->setCellValueExplicit('G'.$i,$npwp,\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $sheet->setCellValue('H'.$i, $blth); 
    $sheet->setCellValue('I'.$i, $gaji); 
    $sheet->setCellValue('J'.$i, $honorarium); 
    $sheet->setCellValue('K'.$i, $tunjangan_variable); 
    $sheet->setCellValue('L'.$i, $benefit); 
    $sheet->setCellValue('M'.$i, $natuna); 
    $sheet->setCellValue('N'.$i, $beban_pph21); 
    $sheet->setCellValue('O'.$i, $bonus_thr); 
    $sheet->setCellValue('P'.$i, $brutob); 
    $sheet->setCellValue('Q'.$i, $biaya_jabatanb); 
    $sheet->setCellValue('R'.$i, $iuran_pensiunb); 
    $sheet->setCellValue('S'.$i, ($brutob+$bonus_thr)); 
    $sheet->setCellValue('T'.$i, $brutot); 
    $sheet->setCellValue('U'.$i, $biaya_jabatant); 
    $sheet->setCellValue('V'.$i, $iuran_pensiunt); 
    $sheet->setCellValue('W'.$i, $biaya_pengurangt); 
    $sheet->setCellValue('X'.$i, $nettot); 
    $sheet->setCellValue('Y'.$i, $brutot_total); 
    $sheet->setCellValue('Z'.$i, $biaya_jabatant_total); 
    $sheet->setCellValue('AA'.$i, $iuran_pensiunt_total); 
    $sheet->setCellValue('AB'.$i, $biaya_pengurangt_total); 
    $sheet->setCellValue('AC'.$i, $nettot_total); 
    $sheet->setCellValue('AD'.$i, $nettot_sebelumnya); 
    $sheet->setCellValue('AE'.$i, $nettot_akhir); 
    $sheet->setCellValue('AF'.$i, $ptkp); 
    $sheet->setCellValue('AG'.$i, $pkp); 
    $sheet->setCellValue('AH'.$i, $ppht_terutang); 
    $sheet->setCellValue('AI'.$i, $pphb1_terutang); 
    $sheet->setCellValue('AJ'.$i, $pphb2_terutang); 
    $sheet->setCellValue('AK'.$i, $pphb_terutang); 
    
    $i++;
    $no = $no+1;
}

//$spreadsheet->setActiveSheetIndex(0);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Rincian SPT.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

?>