<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if ($userhris){
    function TanggalIndo2($date){
        if($date!="" && $date!=null){
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $result = $tgl . "." . $bulan . ".". $tahun;	
            return($result);
        } else {
            return("");
        }
    }

    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $offset = ($page-1)*$rows;
    $result = array();
    
    $rs = mysqli_query($koneksi,"select count(*) from m_ee_subgroup");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from m_ee_subgroup order by kode_ee_subgroup asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
        $kode_ee_group = stripslashes ($hasil['kode_ee_group']);
            $rs2 = mysqli_query($koneksi,"select ee_group from m_ee_group where kode_ee_group='$kode_ee_group'");
            $hasil2 = mysqli_fetch_array($rs2);
            $ee_group = stripslashes ($hasil['ee_group']);
        $kode = stripslashes ($hasil['kode_ee_subgroup']);
    	$label = stripslashes ($hasil['ee_subgroup']);
        $keterangan = stripslashes ($hasil['keterangan']);
        
        $datanya = array();
        $datanya["idmeesubgroup"] = $id;
        $datanya["kode_ee_groupmeesubgroup"] = $kode_ee_group;
        $datanya["ee_groupmeesubgroup"] = $ee_group;
        $datanya["kodemeesubgroup"] = $kode;
        $datanya["labelmeesubgroup"] = $label;
        $datanya["keteranganmeesubgroup"] = $keterangan;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>