<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if ($userhris){
    $id = intval($_REQUEST['id']);
    include 'koneksi.php';
    $sql = "delete from m_ee_group where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array('success'=>true));
    } else {
    	echo json_encode(array('errorMsg'=>'Gagal hapus data.'));
    }
}    
?>