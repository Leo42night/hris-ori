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
    
    $rs = mysqli_query($koneksi,"select count(*) from r_rekomendasi where nip='$nip2'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from r_rekomendasi where nip='$nip2' order by end_date asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$start_date = stripslashes ($hasil['start_date']);
        $start_date2 = TanggalIndo2($start_date);
    	$end_date = stripslashes ($hasil['end_date']);
        $end_date2 = TanggalIndo2($end_date);
        $assesment = stripslashes ($hasil['assesment']);
    	$tipe = stripslashes ($hasil['tipe']);
            $rs2 = mysqli_query($koneksi,"select * from m_tipe where kode='$tipe'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $tipe2 = stripslashes ($hasil2['label']);
            } else {
                $tipe2 = "";
            }                                                                                                
    	$stream = stripslashes ($hasil['stream']);
            $rs2 = mysqli_query($koneksi,"select * from m_stream where kode='$stream'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $stream2 = stripslashes ($hasil2['label']);
            } else {
                $stream2 = "";
            }                                                                                                
        $rekomendasi_kompetensi = stripslashes ($hasil['rekomendasi_kompetensi']);
        $rekomendasi_psikolog = stripslashes ($hasil['rekomendasi_psikolog']);
        $rekomendasi_gabungan = stripslashes ($hasil['rekomendasi_gabungan']);
        
        $datanya = array();
        $datanya["idrekomendasi"] = $id;
        $datanya["niprekomendasi"] = $nip;
        $datanya["start_daterekomendasi"] = $start_date;
        $datanya["start_date2rekomendasi"] = $start_date2;
        $datanya["end_daterekomendasi"] = $end_date;
        $datanya["end_date2rekomendasi"] = $end_date2;
        $datanya["assesmentrekomendasi"] = $assesment;
        $datanya["tiperekomendasi"] = $tipe;
        $datanya["tipe2rekomendasi"] = $tipe2;
        $datanya["streamrekomendasi"] = $stream;
        $datanya["stream2rekomendasi"] = $stream2;
        $datanya["rekomendasi_kompetensirekomendasi"] = $rekomendasi_kompetensi;
        $datanya["rekomendasi_psikologrekomendasi"] = $rekomendasi_psikolog;
        $datanya["rekomendasi_gabunganrekomendasi"] = $rekomendasi_gabungan;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>