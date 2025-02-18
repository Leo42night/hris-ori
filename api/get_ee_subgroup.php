<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    //$kode_ee_group = isset($_POST['namapegawaicari']) ? $_POST['namapegawaicari'] : "";

    $queryjns = "SELECT * FROM m_ee_subgroup ORDER BY kode_ee_subgroup ASC";
    $sqljns = mysqli_query ($koneksi,$queryjns);
    $items = array();
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
    	$kode_ee_subgroup = stripslashes ($hasiljns['kode_ee_subgroup']);
        $ee_subgroup = stripslashes ($hasiljns['ee_subgroup']);
        $datanya["value"] = $kode_ee_subgroup;
        $datanya["text"] = $ee_subgroup;
        array_push($items, $datanya);
    }
    echo json_encode($items);
}    
?>