<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if ($userhris){
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

    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $nip2 = isset($_REQUEST['nip']) ? $_REQUEST['nip'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $rs = mysqli_query($koneksi,"select count(*) from r_karya_tulis where nip='$nip2'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from r_karya_tulis where nip='$nip2' order by end_date asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$start_date = stripslashes ($hasil['start_date']);
        $start_date2 = TanggalIndo2($start_date);
    	$end_date = stripslashes ($hasil['end_date']);
        $end_date2 = TanggalIndo2($end_date);
    	$judul = stripslashes ($hasil['judul']);
        $media_publikasi = stripslashes ($hasil['media_publikasi']);
        $tahun = stripslashes ($hasil['tahun']);
    	$kode_jenis = stripslashes ($hasil['kode_jenis']);
            $rs2 = mysqli_query($koneksi,"select * from m_jenis_karya_tulis where kode_jenis='$kode_jenis'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_karya_tulis = stripslashes ($hasil2['label']);
            } else {
                $jenis_karya_tulis = "";
            }            
        
        $datanya = array();
        $datanya["idkaryatulis"] = $id;
        $datanya["nipkaryatulis"] = $nip;
        $datanya["start_datekaryatulis"] = $start_date;
        $datanya["start_date2karyatulis"] = $start_date2;
        $datanya["end_datekaryatulis"] = $end_date;
        $datanya["end_date2karyatulis"] = $end_date2;
        $datanya["judulkaryatulis"] = $judul;
        $datanya["media_publikasikaryatulis"] = $media_publikasi;
        $datanya["tahunkaryatulis"] = $tahun;
        $datanya["kode_jeniskaryatulis"] = $kode_jenis;
        $datanya["jenis_karya_tuliskaryatulis"] = $jenis_karya_tulis;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>