<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/phpqrcode/qrlib.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fpdf.php";

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(190, 10, 'RINCIAN BIAYA PERJALANAN DINAS', 0, 1, 'C');
$pdf->Ln(5);

// Data Dummy
$nama = 'Budi Santoso';
$nip = '19830501 200501 1 002';
$pangkat = 'Pembina';
$jabatan = 'Kepala Subbagian Umum';
$instansi = 'Dinas Perhubungan Kota Bandung';
$tingkat_biaya = 'C';
$lama = 4;
$tempat_tujuan = 'Yogyakarta';
$kendaraan = 'Pesawat';
$tanggal_pergi = '2025-04-01';
$tanggal_pulang = '2025-04-04';

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(190, 10, "Nama: $nama", 0, 1);
$pdf->Cell(190, 10, "NIP: $nip", 0, 1);
$pdf->Cell(190, 10, "Pangkat/Golongan: $pangkat", 0, 1);
$pdf->Cell(190, 10, "Jabatan: $jabatan", 0, 1);
$pdf->Cell(190, 10, "Instansi: $instansi", 0, 1);
$pdf->Cell(190, 10, "Tingkat Biaya Perjalanan Dinas: $tingkat_biaya", 0, 1);
$pdf->Cell(190, 10, "Lama Perjalanan: $lama hari", 0, 1);
$pdf->Cell(190, 10, "Tempat Tujuan: $tempat_tujuan", 0, 1);
$pdf->Cell(190, 10, "Alat Angkut: $kendaraan", 0, 1);
$pdf->Cell(190, 10, "Tanggal Berangkat: $tanggal_pergi", 0, 1);
$pdf->Cell(190, 10, "Tanggal Kembali: $tanggal_pulang", 0, 1);

$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 10, 'RINCIAN BIAYA', 0, 1, 'L');

// Data Dummy Biaya
$uang_harian = 200000;
$uang_penginapan = 450000;
$jumlah_hari = 4;

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(10, 10, '1.', 0, 0);
$pdf->Cell(100, 10, 'Uang Harian', 0, 0);
$pdf->Cell(30, 10, "$jumlah_hari hari", 0, 0);
$pdf->Cell(50, 10, 'Rp ' . number_format($uang_harian * $jumlah_hari, 0, ',', '.'), 0, 1);

$pdf->Cell(10, 10, '2.', 0, 0);
$pdf->Cell(100, 10, 'Uang Penginapan', 0, 0);
$pdf->Cell(30, 10, "$jumlah_hari malam", 0, 0);
$pdf->Cell(50, 10, 'Rp ' . number_format($uang_penginapan * $jumlah_hari, 0, ',', '.'), 0, 1);

// Biaya tambahan dummy
$akomodasi = 150000;
$perpanjangan = 100000;

$pdf->Cell(10, 10, '3.', 0, 0);
$pdf->Cell(100, 10, 'Akomodasi Perawatan Kesehatan', 0, 0);
$pdf->Cell(30, 10, '-', 0, 0);
$pdf->Cell(50, 10, 'Rp ' . number_format($akomodasi, 0, ',', '.'), 0, 1);

$pdf->Cell(10, 10, '4.', 0, 0);
$pdf->Cell(100, 10, 'Biaya Perpanjangan', 0, 0);
$pdf->Cell(30, 10, '-', 0, 0);
$pdf->Cell(50, 10, 'Rp ' . number_format($perpanjangan, 0, ',', '.'), 0, 1);

$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 10, 'BANTUAN PINDAH DAN PENGEMASAN', 0, 1, 'L');

// Dummy data
$bantuan_pindah = 1000000;
$bantuan_pengepakan = 500000;

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(10, 10, '5.', 0, 0);
$pdf->Cell(100, 10, 'Bantuan Pindah', 0, 0);
$pdf->Cell(30, 10, '-', 0, 0);
$pdf->Cell(50, 10, 'Rp ' . number_format($bantuan_pindah, 0, ',', '.'), 0, 1);

$pdf->Cell(10, 10, '6.', 0, 0);
$pdf->Cell(100, 10, 'Bantuan Pengepakan', 0, 0);
$pdf->Cell(30, 10, '-', 0, 0);
$pdf->Cell(50, 10, 'Rp ' . number_format($bantuan_pengepakan, 0, ',', '.'), 0, 1);

$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 10, 'BIAYA PERJALANAN LUAR NEGERI', 0, 1, 'L');

// Dummy data luar negeri
$transport_luar = 2500000;
$harian_luar = 300000 * $jumlah_hari;

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(10, 10, '7.', 0, 0);
$pdf->Cell(100, 10, 'Transportasi Luar Negeri', 0, 0);
$pdf->Cell(30, 10, '-', 0, 0);
$pdf->Cell(50, 10, 'Rp ' . number_format($transport_luar, 0, ',', '.'), 0, 1);

$pdf->Cell(10, 10, '8.', 0, 0);
$pdf->Cell(100, 10, 'Uang Harian Luar Negeri', 0, 0);
$pdf->Cell(30, 10, "$jumlah_hari hari", 0, 0);
$pdf->Cell(50, 10, 'Rp ' . number_format($harian_luar, 0, ',', '.'), 0, 1);

// Total
$total = ($uang_harian * $jumlah_hari) + ($uang_penginapan * $jumlah_hari) + $akomodasi + $perpanjangan + $bantuan_pindah + $bantuan_pengepakan + $transport_luar + $harian_luar;

$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(140, 10, 'TOTAL BIAYA', 0, 0, 'R');
$pdf->Cell(50, 10, 'Rp ' . number_format($total, 0, ',', '.'), 0, 1);

$pdf->Output();



