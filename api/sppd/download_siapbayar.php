<?php
error_reporting(0);
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
ini_set('memory_limit', '-1');

require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";
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

function TanggalIndo3($date){
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
      
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
      
    $result = $BulanIndo[(int)$bulan-1] . " ". $tahun;	
    return($result);
}

$tanggal1 = $_REQUEST['tanggal1'];
$tanggal2 = $_REQUEST['tanggal2'];
$perintah = "";    
if($tanggal1!="" && $tanggal2!="" && $tanggal2>=$tanggal1){
    $perintah .= " and a.tgl_approvebayar>='$tanggal1' and a.tgl_approvebayar<='$tanggal2'";
}

$tempdir = "temp/"; 
if (!file_exists($tempdir))
    mkdir($tempdir);

//PLNT    
$spreadsheet = new Spreadsheet();
$spreadsheet->setActiveSheetIndex(0);
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Sheet1');

$sheet->getStyle('A1:Q1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFb5b1b1');
$sheet->getStyle('A1:Q1')->getAlignment()->setWrapText(true);
$sheet->getStyle("A1:Q1")->applyFromArray([
    "alignment" => [
        "vertical" => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
        "horizontal" => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
    ],
]);


$sheet->getColumnDimension('A')->setWidth(5);
$sheet->getColumnDimension('B')->setWidth(15);
$sheet->getColumnDimension('C')->setWidth(15);
$sheet->getColumnDimension('D')->setWidth(15);
$sheet->getColumnDimension('E')->setWidth(15);
$sheet->getColumnDimension('F')->setWidth(15);
$sheet->getColumnDimension('G')->setWidth(40);
$sheet->getColumnDimension('H')->setWidth(20);
$sheet->getColumnDimension('I')->setWidth(35);
$sheet->getColumnDimension('J')->setWidth(15);
$sheet->getColumnDimension('K')->setWidth(20);
$sheet->getColumnDimension('L')->setWidth(15);
$sheet->getColumnDimension('M')->setWidth(15);
$sheet->getColumnDimension('N')->setWidth(25);
$sheet->getColumnDimension('O')->setWidth(15);
$sheet->getColumnDimension('P')->setWidth(15);
$sheet->getColumnDimension('Q')->setWidth(60);


$alignment_center = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
$alignment_center2 = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;

$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Tanggal Approve');
$sheet->setCellValue('C1', 'Nilai');
$sheet->setCellValue('D1', 'Tanggal Pengajuan');
$sheet->setCellValue('E1', 'Tingkat');
$sheet->setCellValue('F1', 'Jenis');
$sheet->setCellValue('G1', 'Jabatan');
$sheet->setCellValue('H1', 'ID SPPD');
$sheet->setCellValue('I1', 'Nomor SPPD');
$sheet->setCellValue('J1', 'NIP');
$sheet->setCellValue('K1', 'Nama Pegawai');
$sheet->setCellValue('L1', 'Kedudukan');
$sheet->setCellValue('M1', 'Tujuan');
$sheet->setCellValue('N1', 'Transportasi');
$sheet->setCellValue('O1', 'Berangkat');
$sheet->setCellValue('P1', 'Kembali');
$sheet->setCellValue('Q1', 'Maksud');

$total2 = 0;
$i = 2;
$no = 1;
// $rs = mysqli_query($koneksi,"select * from sppd1 where approvebayar='2' and bayar='0' order by tgl_approvebayar asc");
$rs = mysqli_query($koneksi,"select a.*,b.total from sppd1 a left join biaya_sppd1 b on a.idsppd=b.idsppd where a.approvebayar='2' and a.bayar='0'".$perintah."  order by a.tgl_approvebayar asc");
while ($hasil = mysqli_fetch_array($rs)){
    $idsppd = $hasil['idsppd'];
    $tanggal = $hasil['tanggal'];
    $tanggal2 = TanggalIndo2($tanggal);
    $tingkat_sppd = $hasil['tingkat_sppd'];
        $rs2 = mysqli_query($koneksi,"select nama_tingkat from tingkat_sppd where kd_tingkat='$tingkat_sppd'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $tingkat_sppd2 = $hasil2['nama_tingkat'];
        } else {
            $tingkat_sppd2 = "";
        }
    $jenis_sppd = $hasil['jenis_sppd'];
        $rs2 = mysqli_query($koneksi,"select nama_sppd from jenis_sppd where kd_sppd='$jenis_sppd'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $jenis_sppd2 = $hasil2['nama_sppd'];
        } else {
            $jenis_sppd2 = "";
        }
    $level_sppd = $hasil['level_sppd'];
        $rs2 = mysqli_query($koneksi,"select uraian from master_level where level='$level_sppd'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $level_sppd2 = $hasil2['uraian'];
        } else {
            $level_sppd2 = "";
        }
    $no_sppd = $hasil['no_sppd'];
    $idsppd = $hasil['idsppd'];
    $nip = $hasil['nip'];
    $nama = $hasil['nama'];
    $grade = $hasil['grade'];
    $jabatan = $hasil['jabatan'];
    $maksud = $hasil['maksud'];
    $agenda = $hasil['agenda'];
    $kedudukan = $hasil['kedudukan'];
    $tujuan = $hasil['tujuan'];
    $jarak = $hasil['jarak'];
    $transportasi = $hasil['transportasi'];
    $tgl_awal = $hasil['tgl_awal'];
    $tgl_awal2 = TanggalIndo2($tgl_awal);
    $tgl_akhir = $hasil['tgl_akhir'];
    $tgl_akhir2 = TanggalIndo2($tgl_akhir);
    $hari = $hasil['hari'];
    $jenis_tujuan = $hasil['jenis_tujuan'];
    $approve1 = $hasil['approve1'];
    $approval1 = $hasil['approval1'];
        $rs2 = mysqli_query($koneksi,"select jabatan from data_pegawai where nip='$approval1'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $jabatan_approval1 = $hasil2['jabatan'];
        } else {
            $jabatan_approval1 = "";
        }
    $tgl_approve1 = $hasil['tgl_approve1'];
    $tgl_approve12 = TanggalIndo2($tgl_approve1);
    $alasan_reject1 = $hasil['alasan_reject1'];
    $approve2 = $hasil['approve2'];
    $approval2 = $hasil['approval2'];
        $rs2 = mysqli_query($koneksi,"select jabatan from data_pegawai where nip='$approval2'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $jabatan_approval2 = $hasil2['jabatan'];
        } else {
            $jabatan_approval2 = "";
        }
    $tgl_approve2 = $hasil['tgl_approve2'];
    $tgl_approve22 = TanggalIndo2($tgl_approve2);
    $alasan_reject2 = $hasil['alasan_reject2'];
    $validasi_biaya = $hasil['validasi_biaya'];
    $tgl_validasi = $hasil['tgl_validasi'];
    $tgl_validasi2 = TanggalIndo2($tgl_validasi);
    $approvesdm = $hasil['approvesdm'];
    $approvalsdm = $hasil['approvalsdm'];
        $rs2 = mysqli_query($koneksi,"select jabatan from data_pegawai where nip='$approvalsdm'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $jabatan_approvalsdm = $hasil2['jabatan'];
        } else {
            $jabatan_approvalsdm = "DIVISI SDM";
        }
    $tgl_approvesdm = $hasil['tgl_approvesdm'];
    $tgl_approvesdm2 = TanggalIndo2($tgl_approvesdm);
    $alasan_rejectsdm = $hasil['alasan_rejectsdm'];
    $approvebayar = $hasil['approvebayar'];
    $approvalbayar = $hasil['approvalbayar'];
        $rs2 = mysqli_query($koneksi,"select jabatan from data_pegawai where nip='$approvalbayar'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $jabatan_approvalbayar = $hasil2['jabatan'];
        } else {
            $jabatan_approvalbayar = "DIVISI KEUANGAN";
        }
    $tgl_approvebayar = $hasil['tgl_approvebayar'];
    $tgl_approvebayar2 = TanggalIndo2($tgl_approvebayar);
    $alasan_rejectbayar = $hasil['alasan_rejectbayar'];
    $total = floatval($hasil['total']);
    // $total = 0;
    $total2 = $total2+$total;

    $spreadsheet->getActiveSheet()->getStyle('C'.$i)->getNumberFormat()->setFormatCode('#,##0');
    $sheet->getStyle('Q'.$i)->getAlignment()->setWrapText(true);
    $sheet->getStyle('A'.$i.':Q'.$i)->applyFromArray([
        "alignment" => [
            "vertical" => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP
        ],
    ]);    

    $sheet->setCellValue('A'.$i, $no);
    $sheet->setCellValue('B'.$i, $tgl_approvebayar);
    $sheet->setCellValue('C'.$i, $total);
    $sheet->setCellValue('D'.$i, $tanggal);
    $sheet->setCellValue('E'.$i, $tingkat_sppd2);
    $sheet->setCellValue('F'.$i, $jenis_sppd2);
    $sheet->setCellValue('G'.$i, $jabatan);
    $sheet->setCellValue('H'.$i, $idsppd);
    $sheet->setCellValue('I'.$i, $no_sppd);
    $sheet->setCellValue('J'.$i, $nip);
    $sheet->setCellValue('K'.$i, $nama);
    $sheet->setCellValue('L'.$i, $kedudukan);
    $sheet->setCellValue('M'.$i, $tujuan);
    $sheet->setCellValue('N'.$i, $transportasi);
    $sheet->setCellValue('O'.$i, $tgl_awal);
    $sheet->setCellValue('P'.$i, $tgl_akhir);
    $sheet->setCellValue('Q'.$i, $maksud);
    $i++;
    $no = $no+1;
}
$sheet->getStyle('A'.$i.':Q'.$i)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFb5b1b1');
$spreadsheet->getActiveSheet()->getStyle('C'.$i)->getNumberFormat()->setFormatCode('#,##0');
$sheet->setCellValue('A'.$i, "");
$sheet->setCellValue('B'.$i, "TOTAL");
$sheet->setCellValue('C'.$i, $total2);
$sheet->setCellValue('D'.$i, "");
$sheet->setCellValue('E'.$i, "");
$sheet->setCellValue('F'.$i, "");
$sheet->setCellValue('G'.$i, "");
$sheet->setCellValue('H'.$i, "");
$sheet->setCellValue('I'.$i, "");
$sheet->setCellValue('J'.$i, "");
$sheet->setCellValue('K'.$i, "");
$sheet->setCellValue('L'.$i, "");
$sheet->setCellValue('M'.$i, "");
$sheet->setCellValue('N'.$i, "");
$sheet->setCellValue('O'.$i, "");
$sheet->setCellValue('P'.$i, "");
$sheet->setCellValue('Q'.$i, "");

$spreadsheet->setActiveSheetIndex(0);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="SPPD Siap Bayar.xlsx"');
header('Cache-Control: max-age=0');
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

?>