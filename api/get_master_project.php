<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include "koneksi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $nama2 = isset($_POST['namaprojectcari']) ? $_POST['namaprojectcari'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $perintah = "";
    if($nama2!=""){
        if($perintah==""){
            $perintah .= " where nama_project like '%$nama2%'";
        } else {
            $perintah .= " and nama_project like '%$nama2%'";
        }
    }
    
    $rs = mysqli_query($koneksi,"select count(*) from data_project".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from data_project".$perintah." order by id asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
        $kd_project_sap = stripslashes ($hasil['kd_project_sap']);
        $nama_project = stripslashes ($hasil['nama_project']);
        $status = stripslashes ($hasil['status']);
        
        $datanya = array();
        $datanya["idproject"] = $id;
        $datanya["kd_project_sapproject"] = $kd_project_sap;
        $datanya["nama_projectproject"] = $nama_project;
        $datanya["statusproject"] = $status;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>