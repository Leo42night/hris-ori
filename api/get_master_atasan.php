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

    include "koneksi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $nip2 = isset($_REQUEST['nip']) ? $_REQUEST['nip'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $rs = mysqli_query($koneksi,"select count(*) from r_atasan where nip='$nip2'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from r_atasan where nip='$nip2' order by end_date asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$start_date_jabatan = stripslashes ($hasil['start_date_jabatan']);
        $start_date_jabatan2 = TanggalIndo2($start_date_jabatan);
    	$start_date = stripslashes ($hasil['start_date']);
        $start_date2 = TanggalIndo2($start_date);
    	$end_date = stripslashes ($hasil['end_date']);
        $end_date2 = TanggalIndo2($end_date);
        $jabatan_atasan = stripslashes ($hasil['jabatan_atasan']);
    	$nip_atasan = stripslashes ($hasil['nip_atasan']);
    	$nama_atasan = stripslashes ($hasil['nama_atasan']);
    	$kode_posisi = stripslashes ($hasil['kode_posisi']);
        
        $datanya = array();
        $datanya["idatasan"] = $id;
        $datanya["nipatasan"] = $nip;
        $datanya["start_date_jabatanatasan"] = $start_date_jabatan;
        $datanya["start_date_jabatan2atasan"] = $start_date_jabatan2;
        $datanya["start_dateatasan"] = $start_date;
        $datanya["start_date2atasan"] = $start_date2;
        $datanya["end_dateatasan"] = $end_date;
        $datanya["end_date2atasan"] = $end_date2;
        $datanya["jabatan_atasan"] = $jabatan_atasan;
        $datanya["nip_atasan"] = $nip_atasan;
        $datanya["nama_atasan"] = $nama_atasan;
        $datanya["kode_posisiatasan"] = $kode_posisi;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>