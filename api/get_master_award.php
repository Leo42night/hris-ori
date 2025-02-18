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

    $nip2 = isset($_REQUEST['nip']) ? $_REQUEST['nip'] : "93151064ZY";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $rs = mysqli_query($koneksi,"select count(*) from r_award where nip='$nip2'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from r_award where nip='$nip2' order by end_date asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$start_date = stripslashes ($hasil['start_date']);
        $start_date2 = TanggalIndo2($start_date);
    	$end_date = stripslashes ($hasil['end_date']);
        $end_date2 = TanggalIndo2($end_date);
    	$kode_award = stripslashes ($hasil['kode_award']);
            $rs2 = mysqli_query($koneksi,"select * from m_jenis_award where kode_award='$kode_award'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_award = stripslashes ($hasil2['label']);
            } else {
                $jenis_award = "";
            }
        $uraian_award = stripslashes ($hasil['uraian_award']);
        $no_sk_penghargaan = stripslashes ($hasil['no_sk_penghargaan']);
        $tgl_sk_penghargaan = stripslashes ($hasil['tgl_sk_penghargaan']);
        $tgl_sk_penghargaan2 = TanggalIndo2($tgl_sk_penghargaan);
        $tingkat_acara = stripslashes ($hasil['tingkat_acara']);
        $diberikan_oleh = stripslashes ($hasil['diberikan_oleh']);
        
        $datanya = array();
        $datanya["idaward"] = $id;
        $datanya["nipaward"] = $nip;
        $datanya["start_dateaward"] = $start_date;
        $datanya["start_date2award"] = $start_date2;
        $datanya["end_dateaward"] = $end_date;
        $datanya["end_date2award"] = $end_date2;
        $datanya["kode_award"] = $kode_award;
        $datanya["jenis_award"] = $jenis_award;
        $datanya["uraian_award"] = $uraian_award;
        $datanya["no_sk_penghargaanaward"] = $no_sk_penghargaan;
        $datanya["tgl_sk_penghargaanaward"] = $tgl_sk_penghargaan;
        $datanya["tgl_sk_penghargaan2award"] = $tgl_sk_penghargaan2;
        $datanya["tingkat_acaraaward"] = $tingkat_acara;
        $datanya["diberikan_olehaward"] = $diberikan_oleh;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>