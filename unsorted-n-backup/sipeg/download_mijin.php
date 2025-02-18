<?php
error_reporting(0);
ini_set('memory_limit', '-1');

include('koneksi.php');
include('../fungsi.php');
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function TanggalIndo2($date){
    if(!is_null($date) && strtotime($date)){
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);
        $result = $tgl . "-" . $bulan . "-". $tahun;	
        return($result);
    } else {
        return("");
    }
}
function TanggalIndo3($date){
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
      
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
      
    $result = $BulanIndo[(int)$bulan-1] . " ". $tahun;	
    return($result);
}

$tgl_awal = $_REQUEST['tgl_awal'];
$tgl_akhir = $_REQUEST['tgl_akhir'];
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
$sheet->getStyle('A2:I2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFb5b1b1');
$sheet->getStyle('A2:I2')->getAlignment()->setWrapText(true);
$sheet->getStyle("A2:I2")->applyFromArray([
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
$sheet->getColumnDimension('I')->setWidth(15);

$alignment_center = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
$alignment_center2 = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;

$sheet->mergeCells('A1:H1');
$sheet->setCellValue('A1', 'REKAPITULASI IZIN PERIODE : '.TanggalIndo2($tgl_awal).' s/d '.TanggalIndo2($tgl_akhir));

$sheet->setCellValue('A2', 'No');
$sheet->setCellValue('B2', 'NIP');
$sheet->setCellValue('C2', 'Nama');
$sheet->setCellValue('D2', 'Jabatan');
$sheet->setCellValue('E2', 'Tgl.Awal');
$sheet->setCellValue('F2', 'Tgl.Akhir');
$sheet->setCellValue('G2', 'Pengajuan');
$sheet->setCellValue('H2', 'Realisasi');
$sheet->setCellValue('I2', 'Total');

$i = 3;
$no = 1;
$rs2 = mysqli_query($koneksi,"select a.nip,b.nama,b.jabatan from ijin a inner join data_pegawai b on a.nip=b.nip where (a.tgl_awal>='$tgl_awal' or a.tgl_awal<='$tgl_akhir') and (a.tgl_akhir>='$tgl_awal' or a.tgl_akhir<='$tgl_akhir') and b.aktif='1'".$perintah." group by a.nip order by a.nip asc");
while ($hasil2 = mysqli_fetch_array($rs2)) {
    $nip = $hasil2['nip'];
    $nama = $hasil2['nama'];
    $jabatan = $hasil2['jabatan'];
    
    $jumlah_pengajuan = 0;
    $jumlah_realisasi = 0;
    $rs3 = mysqli_query($koneksi,"select * from ijin where nip='$nip' and (tgl_awal>='$tgl_awal' or tgl_awal<='$tgl_akhir') and (tgl_akhir>='$tgl_awal' or tgl_akhir<='$tgl_akhir')");
    while($hasil3 = mysqli_fetch_array($rs3)){
        $approve1 = intval($hasil3['approve1']);
        if($approve1==2)   {
            $jumlah_realisasi++;
        } else {
            $jumlah_pengajuan++;
        }
    }
    $jumlah_total = $jumlah_pengajuan+$jumlah_realisasi;        

    $spreadsheet->getActiveSheet()->getStyle('G'.$i.':I'.$i)->getNumberFormat()->setFormatCode('#,##0');
    $sheet->setCellValue('A'.$i, $no);
    $sheet->setCellValue('B'.$i, $nip);
    $sheet->setCellValue('C'.$i, $nama);
    $sheet->setCellValue('D'.$i, $jabatan);
    $sheet->setCellValue('E'.$i, TanggalIndo2($tgl_awal));
    $sheet->setCellValue('F'.$i, TanggalIndo2($tgl_akhir));
    $sheet->setCellValue('G'.$i, $jumlah_pengajuan);
    $sheet->setCellValue('H'.$i, $jumlah_realisasi);
    $sheet->setCellValue('I'.$i, $jumlah_total);
    $no++;
    $i++;
}
//$spreadsheet->setActiveSheetIndex(0);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Rekapitulasi Izin.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

?>