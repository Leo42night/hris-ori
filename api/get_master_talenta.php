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
    
    $rs = mysqli_query($koneksi,"select count(*) from r_talenta where nip='$nip2'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from r_talenta where nip='$nip2' order by end_date desc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$start_date = stripslashes ($hasil['start_date']);
        $start_date2 = TanggalIndo2($start_date);
    	$end_date = stripslashes ($hasil['end_date']);
        $end_date2 = TanggalIndo2($end_date);
    	$nilai_talenta = stripslashes ($hasil['nilai_talenta']);
            $rs2 = mysqli_query($koneksi,"select * from m_nilai_talenta where kode='$nilai_talenta'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nilai_talenta2 = stripslashes ($hasil2['label']);
            } else {
                $nilai_talenta2 = "";
            }
    	$nki = stripslashes ($hasil['nki']);
    	$kode_nki = stripslashes ($hasil['kode_nki']);
    	$nsk = stripslashes ($hasil['nsk']);
    	$kode_nsk = stripslashes ($hasil['kode_nsk']);
        
        $datanya = array();
        $datanya["idtalenta"] = $id;
        $datanya["niptalenta"] = $nip;
        $datanya["start_datetalenta"] = $start_date;
        $datanya["start_date2talenta"] = $start_date2;
        $datanya["end_datetalenta"] = $end_date;
        $datanya["end_date2talenta"] = $end_date2;
        $datanya["nilai_talenta"] = $nilai_talenta;
        $datanya["nilai_talenta2"] = $nilai_talenta2;
        $datanya["nkitalenta"] = $nki;
        $datanya["kode_nkitalenta"] = $kode_nki;
        $datanya["nsktalenta"] = $nsk;
        $datanya["kode_nsktalenta"] = $kode_nsk;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>