<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
    $id = intval($_REQUEST['id']);
    $nip = $_REQUEST['nipdiklat'];
    $start_date = $_REQUEST['start_datemedsos'];
    $end_date = $_REQUEST['end_datemedsos'];
    $jenis_medsos = $_REQUEST['jenis_medsos'];
    $id_medsos = $_REQUEST['id_medsos'];

    $sql = "update r_medsos set start_date='$start_date',end_date='$end_date',jenis_medsos='$jenis_medsos',id_medsos='$id_medsos' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $status_perubahan = mysqli_affected_rows($koneksi);
        if($status_perubahan>0){
            $sql2 = "update r_medsos set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
            $result2 = @mysqli_query($koneksi,$sql2);
        }
    	echo json_encode(array(
    		'id' => $id
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>