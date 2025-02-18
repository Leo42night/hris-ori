<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    $id = intval($_REQUEST['id']);
    $nip = $_REQUEST['nipdiklat'];
    $start_date = $_REQUEST['start_datekeyb'];
    $end_date = $_REQUEST['end_datekeyb'];
    $kompetensi = $_REQUEST['kompetensikeyb'];
    $detail_keyb = $_REQUEST['detail_keyb'];
    $nilai = $_REQUEST['nilaikeyb'];
    $assignment = $_REQUEST['assignmentkeyb'];
    $self = $_REQUEST['selfkeyb'];
    $training = $_REQUEST['trainingkeyb'];

    $sql = "update r_keyb set start_date='$start_date',end_date='$end_date',kompetensi='$kompetensi',detail_keyb='$detail_keyb',nilai='$nilai',assignment='$assignment',self='$self',training='$training' where id=$id";
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