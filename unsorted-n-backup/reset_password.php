<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    $id = intval($_REQUEST['id']);
    $usernya = $_REQUEST['usernya'];
    //$newpass = md5("siska1234");
    $newpass = md5("Hris@123");
    $sql = "update masteruser set user_pass='$newpass' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array('success' => true));
    } else {
    	//echo json_encode(array('errorMsg'=>'Gagal hapus data.'));
        echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>