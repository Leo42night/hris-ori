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

    include "koneksi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    //$nip2 = isset($_REQUEST['nip']) ? $_REQUEST['nip'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $rs = mysqli_query($koneksi,"select count(*) from master_penempatan");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from master_penempatan order by kd_penempatan asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$kd_penempatan = stripslashes ($hasil['kd_penempatan']);
        $kd_penempatan2 = explode("-",$kd_penempatan);
        $kd_region = $kd_penempatan2[0];
        if(count($kd_penempatan2)>1){
            $kd_area = $kd_penempatan2[1];
        } else {
            $kd_area = "";
        }
    	$penempatan = stripslashes ($hasil['penempatan']);
    	$lat = stripslashes ($hasil['lat']);
    	$lon = stripslashes ($hasil['lon']);
    	$waktu = stripslashes ($hasil['waktu']);
        
        $datanya = array();
        $datanya["idmpenempatan"] = $id;
        $datanya["kd_penempatanmpenempatan"] = $kd_penempatan;
        $datanya["kd_regionmpenempatan"] = $kd_region;
        $datanya["kd_areampenempatan"] = $kd_area;
        $datanya["penempatanmpenempatan"] = $penempatan;
        $datanya["latmpenempatan"] = $lat;
        $datanya["lonmpenempatan"] = $lon;
        $datanya["waktumpenempatan"] = $waktu;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>