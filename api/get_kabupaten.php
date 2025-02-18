<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include "koneksi.php";
    $id_provinsi2 = isset($_GET['id_provinsi']) ? $_GET['id_provinsi'] : "";

    if($id_provinsi2==""){
        $queryjns = "SELECT * FROM m_kabupaten ORDER BY id_kabupaten ASC";
    } else {
        $queryjns = "SELECT * FROM m_kabupaten where id_provinsi='$id_provinsi2' ORDER BY id_kabupaten ASC";
    }
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$id_kabupaten = stripslashes ($hasiljns['id_kabupaten']);
        $nama_kabupaten = stripslashes ($hasiljns['nama_kabupaten']);
        $datanya["value"] = $id_kabupaten;
        $datanya["text"] = $nama_kabupaten;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>