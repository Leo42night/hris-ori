<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    $kode_grade = $_REQUEST['kode_grademgrade'];
    //$label = $_REQUEST['labelmgrade'];
    $label = mysqli_real_escape_string($koneksi, $_REQUEST["labelmgrade"]);

    $sql = "insert into m_grade(kode_grade,label) values('$kode_grade','$label')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'label' => $label
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>