<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
    $nip = $_REQUEST['nipidentitas'];
    $start_date = $_REQUEST['start_dateidentitas'];
    $end_date = $_REQUEST['end_dateidentitas'];
    $kode_identitas = $_REQUEST['kode_identitas'];
    $id_number = $_REQUEST['id_numberidentitas'];

    $sql = "insert into r_identitas";
    $sql .= "(nip,start_date,end_date,kode_identitas,id_number,status_edit,tgl_edit,user_edit)";    
    $sql .= " values('$nip','$start_date','$end_date','$kode_identitas','$id_number','1','$hari_ini','$userhris')";
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