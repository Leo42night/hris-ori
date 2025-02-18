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
    
    $rs = mysqli_query($koneksi,"select count(*) from r_keahlian where nip='$nip2'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from r_keahlian where nip='$nip2' order by end_date asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$start_date = stripslashes ($hasil['start_date']);
        $start_date2 = TanggalIndo2($start_date);
    	$end_date = stripslashes ($hasil['end_date']);
        $end_date2 = TanggalIndo2($end_date);
    	$kode_profesi = stripslashes ($hasil['kode_profesi']);
            $rs2 = mysqli_query($koneksi,"select * from m_pohon_profesinew where kode_nama_profesi='$kode_profesi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_profesi = stripslashes ($hasil2['nama_profesi']);
            } else {
                $nama_profesi = "";
            }                        
        $tingkat_keahlian = stripslashes ($hasil['tingkat_keahlian']);
            $rs2 = mysqli_query($koneksi,"select * from m_tingkat_keahlian where kode='$tingkat_keahlian'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $tingkat_keahlian2 = stripslashes ($hasil2['label']);
            } else {
                $tingkat_keahlian2 = "";
            }                        
        
        $datanya = array();
        $datanya["idkeahlian"] = $id;
        $datanya["nipkeahlian"] = $nip;
        $datanya["start_datekeahlian"] = $start_date;
        $datanya["start_date2keahlian"] = $start_date2;
        $datanya["end_datekeahlian"] = $end_date;
        $datanya["end_date2keahlian"] = $end_date2;
        $datanya["kode_profesikeahlian"] = $kode_profesi;
        $datanya["nama_profesikeahlian"] = $nama_profesi;
        $datanya["tingkat_keahlian"] = $tingkat_keahlian;
        $datanya["tingkat_keahlian2"] = $tingkat_keahlian2;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>