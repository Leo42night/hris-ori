<?php
error_reporting(0);
ini_set('memory_limit', '-1');

include('koneksi.php');
include('../fungsi.php');
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
// $blth2 = "2024-01";
$tgl_awal = $blth2."-01";
$tgl_akhir = date("Y-m-t",strtotime($tgl_awal));
$start_date = date_create($tgl_awal);
$end_date = date_create($tgl_akhir);

$tempdir = "temp/"; 
if (!file_exists($tempdir))
    mkdir($tempdir);

//PLNT    
$spreadsheet = new Spreadsheet();
$spreadsheet->setActiveSheetIndex(0);
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('REKAP');
$sheet->getStyle('A2:H2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFb5b1b1');
$sheet->getStyle('A2:H2')->getAlignment()->setWrapText(true);
$sheet->getStyle("A2:H2")->applyFromArray([
    "alignment" => [
        "vertical" => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
        "horizontal" => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
    ],
]);

$sheet->getColumnDimension('A')->setWidth(5);
$sheet->getColumnDimension('B')->setWidth(15);
$sheet->getColumnDimension('C')->setWidth(30);
$sheet->getColumnDimension('D')->setWidth(40);
$sheet->getColumnDimension('E')->setWidth(15);
$sheet->getColumnDimension('F')->setWidth(15);
$sheet->getColumnDimension('G')->setWidth(15);
$sheet->getColumnDimension('H')->setWidth(15);

$alignment_center = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
$alignment_center2 = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;

$sheet->mergeCells('A1:H1');
$sheet->setCellValue('A1', 'REKAPITULASI ABSENSI BULAN '.strtoupper(TanggalIndo3($blth2)));

$sheet->setCellValue('A2', 'No');
$sheet->setCellValue('B2', 'NIP');
$sheet->setCellValue('C2', 'Nama');
$sheet->setCellValue('D2', 'Jabatan');
$sheet->setCellValue('E2', 'Absen Masuk');
$sheet->setCellValue('F2', 'Absen Pulang');
$sheet->setCellValue('G2', 'Dinas');
$sheet->setCellValue('H2', 'Cuti');

$i = 3;
$no = 1;
$sql = "select a.nip,a.nama,a.jabatan,b.jumlah_masuk,c.jumlah_pulang from data_pegawai a";
$sql .= " LEFT JOIN (SELECT nip,count(nip) as jumlah_masuk FROM absensi where tgl_absen>='$tgl_awal' and tgl_absen<='$tgl_akhir' and jam_masuk<>'' and DayOfWeek(tgl_absen)<>1 and DayOfWeek(tgl_absen)<>7 GROUP BY nip) b ON a.nip = b.nip";
$sql .= " LEFT JOIN (SELECT nip,count(nip) as jumlah_pulang FROM absensi where tgl_absen>='$tgl_awal' and tgl_absen<='$tgl_akhir' and jam_masuk<>'' and jam_pulang<>'' and DayOfWeek(tgl_absen)<>1 and DayOfWeek(tgl_absen)<>7 GROUP BY nip) c ON a.nip = c.nip";
$sql .= " where a.aktif='1'";
$sql .= $perintah." order by a.id asc";
$rs2 = mysqli_query($koneksi,$sql);
while ($hasil2 = mysqli_fetch_array($rs2)) {
    $nip = stripslashes ($hasil2['nip']);
    $nama = stripslashes ($hasil2['nama']);
    $jabatan = stripslashes ($hasil2['jabatan']);
    $jumlah_masuk = floatval ($hasil2['jumlah_masuk']);
    $jumlah_pulang = floatval ($hasil2['jumlah_pulang']);

    $jumlah_sppd = 0;
    $rs41 = mysqli_query($koneksi,"select tgl_awal,tgl_akhir from sppd1 where nip='$nip' and ((tgl_awal>='$tgl_awal' and tgl_awal<='$tgl_akhir') or (tgl_akhir>='$tgl_awal' and tgl_akhir<='$tgl_akhir'))");
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
        $jumlah_sppd = $jumlah_sppd+$d;
    }
    
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
        $jumlah_cuti = $jumlah_cuti+$d;
    }

    $spreadsheet->getActiveSheet()->getStyle('E'.$i.':H'.$i)->getNumberFormat()->setFormatCode('#,##0');
    $sheet->setCellValue('A'.$i, $no);
    $sheet->setCellValue('B'.$i, $nip);
    $sheet->setCellValue('C'.$i, $nama);
    $sheet->setCellValue('D'.$i, $jabatan);
    $sheet->setCellValue('E'.$i, $jumlah_masuk);
    $sheet->setCellValue('F'.$i, $jumlah_pulang);
    $sheet->setCellValue('G'.$i, $jumlah_sppd);
    $sheet->setCellValue('H'.$i, $jumlah_cuti);
    $no++;
    $i++;
}
//$spreadsheet->setActiveSheetIndex(0);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Rekapitulasi Gaji.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

?>