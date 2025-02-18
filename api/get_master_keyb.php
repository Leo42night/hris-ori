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
    
    $rs = mysqli_query($koneksi,"select count(*) from r_keyb where nip='$nip2'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from r_keyb where nip='$nip2' order by end_date asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$start_date = stripslashes ($hasil['start_date']);
        $start_date2 = TanggalIndo2($start_date);
    	$end_date = stripslashes ($hasil['end_date']);
        $end_date2 = TanggalIndo2($end_date);
    	$kompetensi = stripslashes ($hasil['kompetensi']);
            $rs2 = mysqli_query($koneksi,"select * from m_kompetensi where kode_kompetensi='$kompetensi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $kompetensi2 = stripslashes ($hasil2['kompetensi']);
            } else {
                $kompetensi2 = "";
            }                                    
    	$detail_keyb = stripslashes ($hasil['detail_keyb']);
            $rs2 = mysqli_query($koneksi,"select * from m_keyb where kode='$detail_keyb'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $detail_keyb2 = stripslashes ($hasil2['label']);
            } else {
                $detail_keyb2 = "";
            }                                    
        $nilai = stripslashes ($hasil['nilai']);
        $assignment = stripslashes ($hasil['assignment']);
        $self = stripslashes ($hasil['self']);
        $training = stripslashes ($hasil['training']);
        
        $datanya = array();
        $datanya["idkeyb"] = $id;
        $datanya["nipkeyb"] = $nip;
        $datanya["start_datekeyb"] = $start_date;
        $datanya["start_date2keyb"] = $start_date2;
        $datanya["end_datekeyb"] = $end_date;
        $datanya["end_date2keyb"] = $end_date2;
        $datanya["kompetensikeyb"] = $kompetensi;
        $datanya["kompetensi2keyb"] = $kompetensi2;
        $datanya["detail_keyb"] = $detail_keyb;
        $datanya["detail_keyb2"] = $detail_keyb2;
        $datanya["nilaikeyb"] = $nilai;
        $datanya["assignmentkeyb"] = $assignment;
        $datanya["selfkeyb"] = $self;
        $datanya["trainingkeyb"] = $training;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>