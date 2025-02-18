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

$blth_awal = $_REQUEST['blth_awal'];
$blth_akhir = $_REQUEST['blth_akhir'];
//$blth2 = "2023-03";
$tgl_awal = $blth_awal."-01";
$tgl_akhir = date("Y-m-t",strtotime($blth_akhir."-01"));

$tempdir = "temp/"; 
if (!file_exists($tempdir))
    mkdir($tempdir);

$spreadsheet = new Spreadsheet();
$spreadsheet->setActiveSheetIndex(0);
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Daftar SPT');
$sheet->getStyle('A1:G1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFb5b1b1');
$sheet->getStyle('A1:G1')->getAlignment()->setWrapText(true);
$sheet->getStyle("A1:G1")->applyFromArray([
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

$alignment_center = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
$alignment_center2 = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;

$sheet->setCellValue('A1', "No");
$sheet->setCellValue('B1', "No Induk");
$sheet->setCellValue('C1', "Nama Pegawai");
$sheet->setCellValue('D1', "Jabatan");
$sheet->setCellValue('E1', "Absensi");
$sheet->setCellValue('F1', "Cuti");
$sheet->setCellValue('G1', "Izin");

$i = 2;
$no = 1;
$sql = "select a.nip,a.nama,a.jabatan,b.jumlah_absen from data_pegawai a";
$sql .= " LEFT JOIN (SELECT nip,count(nip) as jumlah_absen FROM absensi where tgl_absen>='$tgl_awal' and tgl_absen<='$tgl_akhir' and jam_masuk<>'' and DayOfWeek(tgl_absen)<>1 and DayOfWeek(tgl_absen)<>7 GROUP BY nip) b ON a.nip = b.nip";
$sql .= " where a.aktif='1'";
$sql .= $perintah." order by a.id asc";
$rs = mysqli_query($koneksi,$sql);
while ($hasil = mysqli_fetch_array($rs)){
    $nip = stripslashes ($hasil['nip']);
    $nama = stripslashes ($hasil['nama']);
    $jabatan = stripslashes ($hasil['jabatan']);
    $jumlah_absen = floatval ($hasil['jumlah_absen']);

    $jumlah_cuti = 0;
    $rs41 = mysqli_query($koneksi,"select tgl_awal,tgl_akhir from cuti where nip='$nip' and ((tgl_awal>='$tgl_awal' and tgl_awal<='$tgl_akhir') or (tgl_akhir>='$tgl_awal' and tgl_akhir<='$tgl_akhir'))");
    while ($hasil41 = mysqli_fetch_array($rs41)) {
        $tgl_awalnya = stripslashes ($hasil41['tgl_awal']);
        $tgl_akhirnya = stripslashes ($hasil41['tgl_akhir']);
        if($tgl_awalnya<$tgl_awal){
            $tgl_awalnya = $tgl_awal;
        }
        if($tgl_akhirnya>$tgl_akhir){
            $tgl_akhirnya = $tgl_akhir;
        }
        $tgl1 = new DateTime($tgl_awalnya);
        $tgl2 = new DateTime($tgl_akhirnya);
        $d = $tgl2->diff($tgl1)->days + 1;
        //echo $d." hari";            
        $jumlah_cuti = $jumlah_cuti+$d;

        //$rs42 = mysqli_query($koneksi,"select count(id) from sppd1 where nip='$nip' and ((tgl_awal>='$tgl_awal' and tgl_awal<='$tgl_akhir') or (tgl_akhir>='$tgl_awal' and tgl_akhir<='$tgl_akhir'))");
    }
    
    $jumlah_ijin = 0;
    $rs41 = mysqli_query($koneksi,"select tgl_awal,tgl_akhir from ijin where nip='$nip' and ((tgl_awal>='$tgl_awal' and tgl_awal<='$tgl_akhir') or (tgl_akhir>='$tgl_awal' and tgl_akhir<='$tgl_akhir'))");
    while ($hasil41 = mysqli_fetch_array($rs41)) {
        $tgl_awalnya = stripslashes ($hasil41['tgl_awal']);
        $tgl_akhirnya = stripslashes ($hasil41['tgl_akhir']);
        if($tgl_awalnya<$tgl_awal){
            $tgl_awalnya = $tgl_awal;
        }
        if($tgl_akhirnya>$tgl_akhir){
            $tgl_akhirnya = $tgl_akhir;
        }
        $tgl1 = new DateTime($tgl_awalnya);
        $tgl2 = new DateTime($tgl_akhirnya);
        $d = $tgl2->diff($tgl1)->days + 1;
        //echo $d." hari";            
        $jumlah_ijin = $jumlah_ijin+$d;

        //$rs42 = mysqli_query($koneksi,"select count(id) from sppd1 where nip='$nip' and ((tgl_awal>='$tgl_awal' and tgl_awal<='$tgl_akhir') or (tgl_akhir>='$tgl_awal' and tgl_akhir<='$tgl_akhir'))");
    }

    $spreadsheet->getActiveSheet()->getStyle('E'.$i.':G'.$i)->getNumberFormat()->setFormatCode('#,##0');
    $sheet->getStyle('A'.$i.':G'.$i)->applyFromArray([
        "alignment" => [
            "vertical" => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
        ],
    ]);    

    $sheet->setCellValue('A'.$i, $no); 
    $sheet->setCellValueExplicit('B'.$i,$nip,\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $sheet->setCellValue('C'.$i, $nama); 
    $sheet->setCellValue('D'.$i, $jabatan); 
    $sheet->setCellValue('E'.$i, $jumlah_absen); 
    $sheet->setCellValue('F'.$i, $jumlah_cuti); 
    $sheet->setCellValue('G'.$i, $jumlah_ijin); 
    
    $i++;
    $no = $no+1;
}

$spreadsheet->setActiveSheetIndex(0);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Rekap Kehadiran.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

?>