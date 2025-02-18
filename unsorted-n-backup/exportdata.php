<?php
session_start();
$regionloginsipeg = $_SESSION["regionaksessipeg"];
$cabangloginsipeg = $_SESSION["cabangaksessipeg"];
$userloginsipeg = $_SESSION["useraksessipeg"];
$namaloginsipeg = $_SESSION["userfullnamesipeg"];
$adminpajak = $_SESSION["adminpajak"];
ini_set('date.timezone', 'Asia/Jakarta');
if ($userloginsipeg){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $blth = $_GET['blth'];
    $kelompok2 = $_GET['kelompok'];
    $kelompok = str_replace("_"," ",$kelompok2);
    $perintah = "";
    if($kelompok!="SEMUA"){
      $perintah = $perintah." and a.kelompok='$kelompok'";
    }
    $filename = '1721a1_SPT_Tahunan_'.$blth.'_'.$kelompok2.'.csv'; 

    $f = fopen('myCsv.csv', 'a'); 
    fputcsv($f, ["MyCell1", "MyCell2", "MyCell3"]);
    fclose($f);   
     
    /*
    header("Content-Description: File Transfer"); 
    header("Content-Disposition: attachment; filename=$filename"); 
    header("Content-Type: application/csv; ");
    $rs9 = mysqli_query($koneksi,"select * from setting_pph order by id desc limit 1");
    $hasil9 = mysqli_fetch_array($rs9);
    $npwp_pemotong = stripslashes ($hasil9['npwp_pemotong']);
    $nama_pemotong = stripslashes ($hasil9['nama_pemotong']);
    $npwp_pejabat = stripslashes ($hasil9['npwp_pejabat']);
    $nama_pejabat = stripslashes ($hasil9['nama_pejabat']);

    $delimiter = ';';
    $file = fopen('php://output', 'w');
    $header = array("Masa Pajak","Tahun Pajak","Pembetulan","Nomor Bukti Potong","Masa Perolehan Awal","Masa Perolehan Akhir","NPWP","NIK","Nama","Alamat","Jenis Kelamin","Status PTKP","Jumlah Tanggungan","Nama Jabatan","WP Luar Negeri","Kode Negara","Kode Pajak","Jumlah 1","Jumlah 2","Jumlah 3","Jumlah 4","Jumlah 5","Jumlah 6","Jumlah 7","Jumlah 8","Jumlah 9","Jumlah 10","Jumlah 11","Jumlah 12","Jumlah 13","Jumlah 14","Jumlah 15","Jumlah 16","Jumlah 17","Jumlah 18","Jumlah 19","Jumlah 20","Status Pindah","NPWP Pemotong","Nama Pemotong","Tanggal Bukti Potong"); 
    fwrite($file, implode(';', $header) . "\r\n");
    $rs1 = mysqli_query($koneksi,"select substr(a.blth,-2) as bulan,tahun,'0' as pembetulan,concat('1.1-',substr(a.blth,-2),substr(a.tahun,-2),no_urut) as urut,(substr(a.blth_awal,-2)*1) as bulan_awal,(substr(a.blth_akhir,-2)*1) as bulan_akhir,LPAD(b.npwp, 15, '0') as npwp,replace(b.nik,'.',''),b.nama,b.alamat,if(b.jenis_kelamin='L','M','F') as jenis_kelamin2,if(left(b.status,1)='K','K','TK') as jenis_ptkp,if((substr(b.status,-1)*1)>0,substr(b.status,-1),0) as jumlah_tanggungan,b.jabatan,'N' as wpln,'' as kode_negara,'21-100-01' as kode_pajak,a.gaji as jumlah1,a.tunjangan_pph as jumlah2,a.tunjangan_variable as jumlah3,a.honorarium as jumlah4,a.benefit as jumlah5,a.natuna as jumlah6,a.bonus_thr as jumlah7,a.brutot as jumlah8,a.biaya_jabatant as jumlah9,a.iuran_pensiunt as jumlah10,a.biaya_pengurangt as jumlah11,a.nettot as jumlah12,a.nettot_sebelumnya as jumlah13,a.nettot_akhir as jumlah14,a.ptkp as jumlah15,a.pkp as jumlah16,a.ppht as jumlah17,a.ppht_sebelumnya as jumlah18,a.ppht_terutang as jumlah19,a.pphb_terutang as jumlah20,'' as status_pindah,LPAD('".$npwp_pejabat."', 15, '0') as npwp_pemotong,'".$nama_pejabat."' as nama_pemotong,concat(substr(a.tgl_proses,-2),'/',substr(a.tgl_proses,6,2),'/',substr(a.tgl_proses,1,4)) as tgl_potong from pph a, data_pegawai b where a.nip=b.nip".$perintah);
    while($row = mysqli_fetch_assoc($rs1)){
      fwrite($file, implode(';', $row) . "\r\n");
    }
    fclose($file); 
    exit; 
    */
}
?>