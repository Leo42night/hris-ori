<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if ($userhris && $superadminhris=="1"){
    include 'koneksi.php';
    $grup = $_REQUEST['grupdatamenu'];
    $parentId = $_REQUEST['parentIddatamenu'];
    $parentId2 = $_REQUEST['parentId2datamenu'];
    $parentId3 = "";

    $datanya = "nilai1 : ".$parentId.",nilai2 : ".$parentId2.",nilai3 : ".$parentId3;

    $nilai1 = "";
    $nilai2 = "";
    $nilai3 = "";
    if($parentId2!=""){
        $nilai3 = $parentId2;
    } else if($parentId!=""){
        $nilai2 = $parentId;
        $nilai3 = "";
    } else {
        $nilai1 = "0";
    }

    
    $nama = trim($_REQUEST['namadatamenu']);
    $icon = trim($_REQUEST['icondatamenu']);
    $url = trim($_REQUEST['urldatamenu']);
    $state = trim($_REQUEST['statedatamenu']);
    $urut = intval($_REQUEST['urutdatamenu']);
    if($urut==0){
        $urut = 99;
    }

    $sql = "insert into nodes(grup,parentId,parentId2,parentId3,name,icon,url,state,urut) values('$grup','$nilai1','$nilai2','$nilai3','$nama','$icon','$url','$state','$urut')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'datanya' => $datanya
    	));
    } else {
    	echo json_encode(array('errorMsg'=>'Gagal simpan data.'));
    }
}    
?>