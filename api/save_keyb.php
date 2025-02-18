<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    $nip = $_REQUEST['nipkeyb'];
    $start_date = $_REQUEST['start_datekeyb'];
    $end_date = $_REQUEST['end_datekeyb'];
    $kompetensi = $_REQUEST['kompetensikeyb'];
    $detail_keyb = $_REQUEST['detail_keyb'];
    $nilai = $_REQUEST['nilaikeyb'];
    $assignment = $_REQUEST['assignmentkeyb'];
    $self = $_REQUEST['selfkeyb'];
    $training = $_REQUEST['trainingkeyb'];

    $sql = "insert into r_keyb";
    $sql .= "(nip,start_date,end_date,kompetensi,detail_keyb,nilai,assingment,self,training,status_edit,tgl_edit,user_edit)";    
    $sql .= " values('$nip','$start_date','$end_date','$kompetensi','$detail_keyb','$nilai','$assingment','$self','$training','1','$hari_ini','$userhris')";
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