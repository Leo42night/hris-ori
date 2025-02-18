<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    $id = intval($_REQUEST['id']);
    $kode_ee_group = $_REQUEST['kode_ee_groupmeesubgroup'];
        $rs2 = mysqli_query($koneksi,"select ee_group from m_ee_group where kode_ee_group='$kode_ee_group'");
        $hasil2 = mysqli_fetch_array($rs2);
        $ee_group = stripslashes ($hasil2['ee_group']);
    $kode_ee_subgroup = $_REQUEST['kodemeesubgroup'];
    $ee_subgroup = $_REQUEST['labelmeesubgroup'];
    $keterangan = $_REQUEST['keteranganmeesubgroup'];

    $sql = "update m_ee_subgroup set kode_ee_subgroup='$kode_ee_subgroup',ee_subgroup='$ee_subgroup',keterangan='$keterangan',kode_ee_group='$kode_ee_group',ee_group='$ee_group' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'id' => $id
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>