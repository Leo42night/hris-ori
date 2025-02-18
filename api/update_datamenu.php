<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if ($userhris && $superadminhris=="1"){
    include 'koneksi.php';
    $id = intval($_REQUEST['id']);
    
    //$parentId = trim($_REQUEST['parentIddatamenu']);
    $nama = trim($_REQUEST['namadatamenu']);
    $icon = trim($_REQUEST['icondatamenu']);
    $url = trim($_REQUEST['urldatamenu']);
    $state = trim($_REQUEST['statedatamenu']);
    $urut = intval($_REQUEST['urutdatamenu']);

    $sql = "update nodes set name='$nama',icon='$icon',url='$url',state='$state',urut='$urut' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'id' => $id
    	));
    } else {
    	echo json_encode(array('errorMsg'=>'Gagal simpan data.'));
    }
}    
?>