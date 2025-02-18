<?php
error_reporting(0);
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

$blth2 = $_REQUEST['blth'];
//$blth2 = "2023-03";

$tempdir = "temp/"; 
if (!file_exists($tempdir))
    mkdir($tempdir);

$spreadsheet = new Spreadsheet();
$spreadsheet->setActiveSheetIndex(0);
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Shhet1');
$sheet->getStyle('A1:I1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFb5b1b1');
$sheet->getStyle('A1:I1')->getAlignment()->setWrapText(true);
$sheet->getStyle("A1:I1")->applyFromArray([
    "alignment" => [
        "vertical" => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
        "horizontal" => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
    ],
]);

$sheet->getColumnDimension('A')->setWidth(5);
$sheet->getColumnDimension('B')->setWidth(15);
$sheet->getColumnDimension('C')->setWidth(20);
$sheet->getColumnDimension('D')->setWidth(15);
$sheet->getColumnDimension('E')->setWidth(15);
$sheet->getColumnDimension('F')->setWidth(15);
$sheet->getColumnDimension('G')->setWidth(15);
$sheet->getColumnDimension('H')->setWidth(40);
$sheet->getColumnDimension('I')->setWidth(20);

$alignment_center = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
$alignment_center2 = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;

$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Nip');
$sheet->setCellValue('C1', 'Nama');
$sheet->setCellValue('D1', 'Pengajuan');
$sheet->setCellValue('E1', 'Tgl Awal');
$sheet->setCellValue('F1', 'Tgl Akhir');
$sheet->setCellValue('G1', 'Hari');
$sheet->setCellValue('H1', 'Keperluan Cuti');
$sheet->setCellValue('I1', 'Status');

$i = 2;
$no = 1;
$rs2 = mysqli_query($koneksi,"select a.*,b.nama,b.aktif from cuti a inner join data_pegawai b on a.nip=b.nip where b.aktif='1' order by a.tgl_awal asc");
while ($hasil2 = mysqli_fetch_array($rs2)){
    $id = $hasil2['id'];
    $nip = $hasil2['nip'];
    $nama = $hasil2['nama'];
    $jenis_cuti = $hasil2['jenis_cuti'];
        // $rs4 = mysqli_query($koneksi,"select nama_cuti from jenis_cuti where kd_cuti='$jenis_cuti'");
        // $hasil4 = mysqli_fetch_array($rs4);
        // if($hasil4){
        //     $nama_cuti = $hasil4['nama_cuti'];
        // } else {
        //     $nama_cuti = "";
        // }
    $tgl_pengajuan = $hasil2['tgl_pengajuan'];
    $tgl_pengajuan2 = TanggalIndo2($tgl_pengajuan);
    $tgl_awal = $hasil2['tgl_awal'];
    $tgl_awal2 = TanggalIndo2($tgl_awal);
    $tgl_akhir = $hasil2['tgl_akhir'];
    $tgl_akhir2 = TanggalIndo2($tgl_akhir);
    $hari = $hasil2['hari'];
    $keperluan_cuti = $hasil2['keperluan_cuti'];
    $alamat = $hasil2['alamat'];
    $telepon = $hasil2['telepon'];

    $rs3 = mysqli_query($koneksi,"select * from data_pegawai where nip='$nip'");
    $hasil3 = mysqli_fetch_array($rs3);
    if($hasil3){
        $tgl_tetap = stripslashesx($hasil3['tgl_pegawai']);
    } else {
        $tgl_tetap = "";
    }
    $tgl_tetap2 = TanggalIndo2($tgl_tetap);
    
    if(!is_null($tgl_tetap) && strtotime($tgl_tetap)){
        $awalnya = date("Y-m-01",strtotime($tgl_tetap));
        $batas_awalnya = date("Y")."-".substr($awalnya,-5);
        if($batas_awalnya<=$today){
            $batas_awal = $batas_awalnya;
        } else {
            $batas_awal = (intval(date("Y"))-1)."-".substr($awalnya,-5);                
        }
        $batas_akhir = date('Y-m-01', strtotime($batas_awal. ' + 12 months'));
        $batas_akhir = date('Y-m-d', strtotime($batas_akhir. ' - 1 days'));
    } else {
        $batas_awal = "";
        $batas_akhir = "";
    }
    $batas_awal2 = TanggalIndo2($batas_awal);
    $batas_akhir2 = TanggalIndo2($batas_akhir);

    $hak_cuti = 12;        
    $rs31 = mysqli_query($koneksi,"select sum(hari) as jumlah_cuti from cuti where nip='$nip' and tgl_awal>='$batas_awal' and tgl_akhir<='$batas_akhir'");
    $hasil31 = mysqli_fetch_array($rs31);
    if($hasil31){
        $jumlah_cuti = intval($hasil31['jumlah_cuti']);
    } else {
        $jumlah_cuti = 0;
    }
    $sisa_cuti = $hak_cuti-$jumlah_cuti;    

    $approve1 = $hasil2['approve1'];
    $tgl_approve1 = $hasil2['tgl_approve1'];
    $tgl_approve12 = TanggalIndo2($tgl_approve1);
    $approval1 = $hasil2['approval1'];
    $alasan_reject1 = $hasil2['alasan_reject1'];
    if($approve1=="2"){
        $status = "Approved";
    } else if($approve1=="1"){
        $status = "Rejected";
    } else {
        $status = "Menunggu Approval";
    }

    // $spreadsheet->getActiveSheet()->getStyle('F'.$i.':M'.$i)->getNumberFormat()->setFormatCode('#,##0');
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
    $sheet->setCellValue('B'.$i, $nip);
    $sheet->setCellValue('C'.$i, $nama);
    $sheet->setCellValue('D'.$i, $tgl_pengajuan2);
    $sheet->setCellValue('E'.$i, $tgl_awal2);
    $sheet->setCellValue('F'.$i, $tgl_akhir2);
    $sheet->setCellValue('G'.$i, $hari);
    $sheet->setCellValue('H'.$i, $keperluan_cuti);
    $sheet->setCellValue('I'.$i, $status);
    
    $i++;
    $no = $no+1;
}
// $sheet->getStyle('A'.$i.':I'.$i)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFb5b1b1');
// // $spreadsheet->getActiveSheet()->getStyle('F'.$i.':M'.$i)->getNumberFormat()->setFormatCode('#,##0');
// // $spreadsheet->getActiveSheet()->getStyle('A'.$i.':K'.$i)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
// $sheet->getStyle('A'.$i.':I'.$i)->applyFromArray([
//     "alignment" => [
//         "vertical" => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
//     ],
// ]);    
// $sheet->getStyle('A'.$i.':I'.$i)->applyFromArray([
//     "alignment" => [
//         "horizontal" => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
//     ],
// ]);

$spreadsheet->setActiveSheetIndex(0);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Rincian Cuti.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

?>