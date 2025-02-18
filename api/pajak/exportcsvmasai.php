<?php
session_start();
$userhris = $_SESSION["userakseshris"];
ini_set('date.timezone', 'Asia/Jakarta');
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    $blth = $_GET['blth'];
    $filename = '1721i_SPT_Masa_'.$blth.'.csv';
    header("Content-Description: File Transfer"); 
    header("Content-Disposition: attachment; filename=$filename"); 
    header("Content-Type: application/csv; ");

    $delimiter = ';';
    $file = fopen('php://output', 'w');
    $header = array("Masa Pajak","Tahun Pajak","Pembetulan","NPWP","Nama","Kode Pajak","Jumlah Bruto","Jumlah PPh","Kode Negara");
    fwrite($file, implode(';', $header) . "\r\n");
    $rs1 = mysqli_query($koneksi,"select substr(a.blth,-2) as bulan,a.tahun,'0' as pembetulan,LPAD(a.npwp, 15, '0') as npwp,b.nama_lengkap,'21-100-01' as kode_pajak,(a.brutob+a.bonus_thr),a.pphb_terutang,'' as kode_negara from organikplnt.pph21masa a left join hrisnew.data_pegawai b on a.nip=b.nip where a.blth='$blth'");
    while($row = mysqli_fetch_assoc($rs1)){
      fwrite($file, implode(';', $row) . "\r\n");
    }
    fclose($file); 
    exit; 
}
?>