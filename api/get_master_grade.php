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
    
    $rs = mysqli_query($koneksi,"select count(*) from r_grade where nip='$nip2'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from r_grade where nip='$nip2' order by end_date asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$start_date = stripslashes ($hasil['start_date']);
        $start_date2 = TanggalIndo2($start_date);
    	$end_date = stripslashes ($hasil['end_date']);
        $end_date2 = TanggalIndo2($end_date);
    	$grade = stripslashes ($hasil['grade']);
            $rs2 = mysqli_query($koneksi,"select * from m_grade where kode_grade='$grade'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_grade = stripslashes ($hasil2['label']);
            } else {
                $nama_grade = "";
            }
    	$level_phdp = stripslashes ($hasil['level_phdp']);
    	$kode_reason = stripslashes ($hasil['kode_reason']);
            $rs2 = mysqli_query($koneksi,"select * from m_reason where kode='$kode_reason'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $reason = stripslashes ($hasil2['label']);
            } else {
                $reason = "";
            }
    	$kode_subtype = stripslashes ($hasil['kode_subtype']);
            $rs2 = mysqli_query($koneksi,"select * from m_subtype where kode='$kode_subtype'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $subtype = stripslashes ($hasil2['label']);
            } else {
                $subtype = "";
            }
        
        $datanya = array();
        $datanya["idgrade"] = $id;
        $datanya["nipgrade"] = $nip;
        $datanya["start_dategrade"] = $start_date;
        $datanya["start_date2grade"] = $start_date2;
        $datanya["end_dategrade"] = $end_date;
        $datanya["end_date2grade"] = $end_date2;
        $datanya["grade"] = $grade;
        $datanya["nama_grade"] = $nama_grade;
        $datanya["level_phdpgrade"] = $level_phdp;
        $datanya["kode_reasongrade"] = $kode_reason;
        $datanya["reasongrade"] = $reason;
        $datanya["kode_subtypegrade"] = $kode_subtype;
        $datanya["subtypegrade"] = $subtype;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>