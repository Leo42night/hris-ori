<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    $nip = $_REQUEST['niprekomendasi'];
    $start_date = $_REQUEST['start_daterekomendasi'];
    $end_date = $_REQUEST['end_daterekomendasi'];
    $assesment = $_REQUEST['assesmentrekomendasi'];
    $tipe = $_REQUEST['tiperekomendasi'];
    $stream = $_REQUEST['streamrekomendasi'];
    $rekomendasi_kompetensi = $_REQUEST['rekomendasi_kompetensirekomendasi'];
    $rekomendasi_psikolog = $_REQUEST['rekomendasi_psikologrekomendasi'];
    $rekomendasi_gabungan = $_REQUEST['rekomendasi_gabunganrekomendasi'];

    $sql = "insert into r_rekomendasi";
    $sql .= "(nip,start_date,end_date,assesment,tipe,stream,rekomendasi_kompetensi,rekomendasi_psikolog,rekomendasi_gabungan,status_edit,tgl_edit,user_edit)";    
    $sql .= " values('$nip','$start_date','$end_date','$assesment','$tipe','$stream','$rekomendasi_kompetensi','$rekomendasi_psikolog','$rekomendasi_gabungan','1','$hari_ini','$userhris')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'nip' => $nip
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>