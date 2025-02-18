<?php
error_reporting(1);
ini_set('memory_limit', '-1');

include('koneksi.php');
include('koneksi_sipeg.php');
include "../stringvalidasi.php";
$kunci = "cipher.hris@s7o";
require '../vendor/autoload.php';
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
$sheet->getStyle('A1:AQ1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFb5b1b1');
$sheet->getStyle('A1:AQ1')->getAlignment()->setWrapText(true);
$sheet->getStyle("A1:AQ1")->applyFromArray([
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
$sheet->getColumnDimension('F')->setWidth(25);
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

$alignment_center = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
$alignment_center2 = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;

$sheet->setCellValue('A1', "No");
$sheet->setCellValue('B1', "No Induk");
$sheet->setCellValue('C1', "BLTH Awal");
$sheet->setCellValue('D1', "BLTH Akhir");
$sheet->setCellValue('E1', "Jumlah Bulan");
$sheet->setCellValue('F1', "Jenis");
$sheet->setCellValue('G1', "Nama Pegawai");
$sheet->setCellValue('H1', "Jabatan");
$sheet->setCellValue('I1', "KPP");
$sheet->setCellValue('J1', "NPWP");
$sheet->setCellValue('K1', "Bulan Pajak");
$sheet->setCellValue('L1', "Gaji");
$sheet->setCellValue('M1', "Honorarium");
$sheet->setCellValue('N1', "Tunjangan");
$sheet->setCellValue('O1', "Benefit");
$sheet->setCellValue('P1', "Natura");
$sheet->setCellValue('Q1', "Beban PPh21");
$sheet->setCellValue('R1', "Non Rutin");
$sheet->setCellValue('S1', "Non Rutin Penyesuaian");
$sheet->setCellValue('T1', "Bruto/Bulan");
$sheet->setCellValue('U1', "By.Jabatan/Bulan");
$sheet->setCellValue('V1', "Iuran Pensiun/Bulan");
$sheet->setCellValue('W1', "Bruto Total/Bulan");
$sheet->setCellValue('X1', "Bruto/Tahun");
$sheet->setCellValue('Y1', "By.Jabatan/Tahun");
$sheet->setCellValue('Z1', "Iuran Pensiun/Tahun");
$sheet->setCellValue('AA1', "By.Pengurang/Tahun");
$sheet->setCellValue('AB1', "Netto Setahun");
$sheet->setCellValue('AC1', "Bruto/Total");
$sheet->setCellValue('AD1', "By.Jabatan/Total");
$sheet->setCellValue('AE1', "Iuran Pensiun/Total");
$sheet->setCellValue('AF1', "By.Pengurang/Total");
$sheet->setCellValue('AG1', "Netto Total");
$sheet->setCellValue('AH1', "Netto Sebelumnya");
$sheet->setCellValue('AI1', "Netto Untuk PPh21");
$sheet->setCellValue('AJ1', "PTKP");
$sheet->setCellValue('AK1', "PKP");
$sheet->setCellValue('AL1', "PPh Terutang/Tahun");
$sheet->setCellValue('AM1', "PPh Terutang Rutin");
$sheet->setCellValue('AN1', "PPh Terutang Non Rutin");
$sheet->setCellValue('AO1', "PPh Terutang/Bulan");
$sheet->setCellValue('AP1', "PPh Rampung");
$sheet->setCellValue('AQ1', "PPh Sudah Terbayar");

$i = 2;
$no = 1;
$rs = mysqli_query($koneksi,"select a.*,b.jenis,b.nama,b.jabatan from pph21masa a left join data_pegawai b on a.nip=b.nip where a.blth='$blth2' order by (a.no_urut*1) asc");
while ($hasil = mysqli_fetch_array($rs)){
    $id = stripslashes ($hasil['id']);
    $kpp = stripslashes ($hasil['kpp']);
    $npwp = stripslashes ($hasil['npwp']);
    if($npwp!="" && strlen($npwp)>20){
        $npwp = decryptText($npwp, $kunci);
    }
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

    $rs2 = mysqli_query($koneksi,"select * from kelebihan_bayar_rampung where nip='$nip' and blth='$blth2'");
    $hasil2 = mysqli_fetch_array($rs2);
    if($hasil2){
        $pph_rampung = floatval($hasil2['ppht']);
        $ppht_sebelumnya = floatval($hasil2['ppht_sebelumnya']);
        $ppht_mutasi = floatval($hasil2['ppht_mutasi']);
        $ppht_tantiem = floatval($hasil2['ppht_tantiem']);        
    } else {
        $pph_rampung = 0;
        $ppht_sebelumnya = 0;
        $ppht_mutasi = 0;
        $ppht_tantiem = 0;        
    }
    $pph_terbayar = $ppht_sebelumnya+$ppht_mutasi+$ppht_tantiem;
    

    $spreadsheet->getActiveSheet()->getStyle('L'.$i.':AQ'.$i)->getNumberFormat()->setFormatCode('#,##0');
    $sheet->getStyle('A'.$i.':AQ'.$i)->applyFromArray([
        "alignment" => [
            "vertical" => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
        ],
    ]);    

    $sheet->setCellValue('A'.$i, $no); 
    $sheet->setCellValueExplicit('B'.$i,$nip,\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $sheet->setCellValue('C'.$i, $blth_awal); 
    $sheet->setCellValue('D'.$i, $blth_akhir); 
    $sheet->setCellValue('E'.$i, $masa_kerja); 
    $sheet->setCellValue('F'.$i, $jenis); 
    $sheet->setCellValue('G'.$i, $nama); 
    $sheet->setCellValue('H'.$i, $jabatan); 
    $sheet->setCellValue('I'.$i, $kpp); 
    $sheet->setCellValueExplicit('J'.$i,$npwp,\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $sheet->setCellValue('K'.$i, $blth); 
    $sheet->setCellValue('L'.$i, $gaji); 
    $sheet->setCellValue('M'.$i, $honorarium); 
    $sheet->setCellValue('N'.$i, $tunjangan_variable); 
    $sheet->setCellValue('O'.$i, $benefit); 
    $sheet->setCellValue('P'.$i, $natuna); 
    $sheet->setCellValue('Q'.$i, $beban_pph21); 
    $sheet->setCellValue('R'.$i, $bonus_thr); 
    $sheet->setCellValue('S'.$i, 0); 
    $sheet->setCellValue('T'.$i, $brutob); 
    $sheet->setCellValue('U'.$i, $biaya_jabatanb); 
    $sheet->setCellValue('V'.$i, $iuran_pensiunb); 
    $sheet->setCellValue('W'.$i, ($brutot)); 
    $sheet->setCellValue('X'.$i, $brutot); 
    $sheet->setCellValue('Y'.$i, $biaya_jabatant); 
    $sheet->setCellValue('Z'.$i, $iuran_pensiunt); 
    $sheet->setCellValue('AA'.$i, $biaya_pengurangt); 
    $sheet->setCellValue('AB'.$i, $nettot); 
    $sheet->setCellValue('AC'.$i, $brutot_total); 
    $sheet->setCellValue('AD'.$i, $biaya_jabatant_total); 
    $sheet->setCellValue('AE'.$i, $iuran_pensiunt_total); 
    $sheet->setCellValue('AF'.$i, $biaya_pengurangt_total); 
    $sheet->setCellValue('AG'.$i, $nettot_total); 
    $sheet->setCellValue('AH'.$i, $nettot_sebelumnya); 
    $sheet->setCellValue('AI'.$i, $nettot_akhir); 
    $sheet->setCellValue('AJ'.$i, $ptkp); 
    $sheet->setCellValue('AK'.$i, $pkp); 
    $sheet->setCellValue('AL'.$i, $ppht_terutang); 
    $sheet->setCellValue('AM'.$i, $pphb1_terutang); 
    $sheet->setCellValue('AN'.$i, $pphb2_terutang); 
    $sheet->setCellValue('AO'.$i, $pphb_terutang); 
    $sheet->setCellValue('AP'.$i, $pph_rampung); 
    $sheet->setCellValue('AQ'.$i, $pph_terbayar); 
    
    $i++;
    $no = $no+1;
}

//$spreadsheet->setActiveSheetIndex(0);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Rincian SPT Masa.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

?>