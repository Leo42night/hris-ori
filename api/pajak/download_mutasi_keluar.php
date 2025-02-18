<?php
error_reporting(1);
ini_set('memory_limit', '-1');

require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/stringvalidasi.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/vendor/autoload.php";
$kunci = "cipher.hris@s7o";
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

$tahun2 = $_REQUEST['tahun'];
$blth_awalcari = $tahun2."-01";
$blth_akhircari = $tahun2."-11";

$tempdir = "temp/"; 
if (!file_exists($tempdir))
    mkdir($tempdir);

$spreadsheet = new Spreadsheet();
$spreadsheet->setActiveSheetIndex(0);
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('List Data');
$sheet->getStyle('A1:H1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFb5b1b1');
$sheet->getStyle('A1:H1')->getAlignment()->setWrapText(true);
$sheet->getStyle("A1:H1")->applyFromArray([
    "alignment" => [
        "vertical" => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
        "horizontal" => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
    ],
]);

$sheet->getColumnDimension('A')->setWidth(5);
$sheet->getColumnDimension('B')->setWidth(15);
$sheet->getColumnDimension('C')->setWidth(15);
$sheet->getColumnDimension('D')->setWidth(25);
$sheet->getColumnDimension('E')->setWidth(15);
$sheet->getColumnDimension('F')->setWidth(25);
$sheet->getColumnDimension('G')->setWidth(15);
$sheet->getColumnDimension('H')->setWidth(15);

$alignment_center = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
$alignment_center2 = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;

$sheet->setCellValue('A1', "No");
$sheet->setCellValue('B1', "NIP");
$sheet->setCellValue('C1', "Nama");
$sheet->setCellValue('D1', "BLTH Awal");
$sheet->setCellValue('E1', "BLTH Akhir");
$sheet->setCellValue('F1', "Bruto");
$sheet->setCellValue('G1', "netto");
$sheet->setCellValue('H1', "PPh 21");

$i = 2;
$no = 1;
$rs = mysqli_query($koneksi,"select a.nip, min(a.blth) as blth_awal,max(a.blth) as blth_akhir from v_list_pajak a inner join data_pegawai b on a.nip=b.nip where a.blth>='$blth_awalcari' and a.blth<='$blth_akhircari' and b.aktif<>'1' group by a.nip order by blth_awal asc,blth_akhir asc,a.nip asc");
while ($hasil = mysqli_fetch_array($rs)) {
    $nip = stripslashes ($hasil['nip']);
    $blth_awal = stripslashes ($hasil['blth_awal']);
    $blth_akhir = stripslashes ($hasil['blth_akhir']);

    $rs1 = mysqli_query($koneksi,"select nama,jabatan from data_pegawai where nip='$nip'");
    $hasil1 = mysqli_fetch_array($rs1);
    if($hasil1){
        $nama = stripslashes ($hasil1['nama']);
        $jabatan = stripslashes ($hasil1['jabatan']);    
    } else {
        $nama = "";
        $jabatan = "";    
    }

    $rs2 = mysqli_query($koneksi,"select sum(brutot) as brutot,sum(nettot_akhir) as nettot_akhir,sum(pphb_terutang) as pphb_terutang from pph21masa where nip='$nip' and blth>='$blth_awal' and blth<='$blth_akhir'");
    $hasil2 = mysqli_fetch_array($rs2);
    if($hasil2){
        $brutot = floatval($hasil2['brutot']);
        $nettot_akhir = floatval($hasil2['nettot_akhir']);
        $pphb_terutang = floatval($hasil2['pphb_terutang']);
    } else {
        $brutot = 0;
        $nettot_akhir = 0;
        $pphb_terutang = 0;
    }

    $spreadsheet->getActiveSheet()->getStyle('F'.$i.':H'.$i)->getNumberFormat()->setFormatCode('#,##0');
    $sheet->getStyle('A'.$i.':H'.$i)->applyFromArray([
        "alignment" => [
            "vertical" => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
        ],
    ]);    

    if(strpos($nip, "PRO") === false && strpos($nip, "HONOR") === false && $nama!=""){        
        $sheet->setCellValue('A'.$i, $no); 
        $sheet->setCellValueExplicit('B'.$i,$nip,\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
        $sheet->setCellValue('C'.$i, $nama); 
        $sheet->setCellValue('D'.$i, $blth_awal); 
        $sheet->setCellValue('E'.$i, $blth_akhir); 
        $sheet->setCellValue('F'.$i, $brutot); 
        $sheet->setCellValue('G'.$i, $brutot); 
        $sheet->setCellValue('H'.$i, $pphb_terutang); 
        
        $i++;
        $no = $no+1;
    }
}

//$spreadsheet->setActiveSheetIndex(0);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Rincian Data Mutasi Keluar.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

?>