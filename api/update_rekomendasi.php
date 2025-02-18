<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $id = intval($_REQUEST['id']);
    $nip = $_REQUEST['nipdiklat'];
    $start_date = $_REQUEST['start_daterekomendasi'];
    $end_date = $_REQUEST['end_daterekomendasi'];
    $assesment = $_REQUEST['assesmentrekomendasi'];
    $tipe = $_REQUEST['tiperekomendasi'];
    $stream = $_REQUEST['streamrekomendasi'];
    $rekomendasi_kompetensi = $_REQUEST['rekomendasi_kompetensirekomendasi'];
    $rekomendasi_psikolog = $_REQUEST['rekomendasi_psikologrekomendasi'];
    $rekomendasi_gabungan = $_REQUEST['rekomendasi_gabunganrekomendasi'];

    $sql = "update r_rekomendasi set start_date='$start_date',end_date='$end_date',assesment='$assesment',tipe='$tipe',stream='$stream',rekomendasi_kompetensi='$rekomendasi_kompetensi',rekomendasi_psikolog='$rekomendasi_psikolog',rekomendasi_gabungan='$rekomendasi_gabungan' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'id' => $id
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>