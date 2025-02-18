<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include "koneksi.php";
    $queryjns = "SELECT * FROM m_jenis_keluarga ORDER BY id_jenis_keluarga ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$id_jenis_keluarga = stripslashes ($hasiljns['id_jenis_keluarga']);
    	$label = stripslashes ($hasiljns['label']);
        $datanya["value"] = $id_jenis_keluarga;
        $datanya["text"] = $label;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>