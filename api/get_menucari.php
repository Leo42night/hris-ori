<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include "koneksi.php";
    $grup2 = isset($_GET['grup']) ? $_GET['grup'] : "";
    if($grup2==""){
        $queryjns = "SELECT * FROM nodes where parentId<>'' and parentId2='' and icon='fa' ORDER BY urut,id ASC";
    } else {
        $queryjns = "SELECT * FROM nodes where grup='$grup2' and parentId<>'' and parentId2='' and icon='fa' ORDER BY urut,id ASC";
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