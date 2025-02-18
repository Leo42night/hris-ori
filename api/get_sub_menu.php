<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $id2 = isset($_GET['id']) ? $_GET['id'] : "";
    if($id2==""){
        $queryjns = "SELECT * FROM nodes where parentId2<>'' and parentId3='' and icon='fa' ORDER BY id ASC";
    } else {
        $queryjns = "SELECT * FROM nodes where parentId2='$id2' and parentId2<>'' and parentId3='' and icon='fa' ORDER BY id ASC";
    }
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    $datanya["value"] = "";
    $datanya["text"] = "";
    array_push($items, $datanya);
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$id = stripslashes ($hasiljns['id']);
    	$name = stripslashes ($hasiljns['name']);
        $datanya["value"] = $id;
        $datanya["text"] = $name;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>