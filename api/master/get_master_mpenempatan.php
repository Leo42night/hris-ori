<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
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

    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $rs = mysqli_query($koneksi,"select count(*) from master_penempatan");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $items = array();
    $rs = mysqli_query($koneksi,"select * from master_penempatan order by id asc limit $offset,$rows");
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$penempatan = stripslashes ($hasil['penempatan']);
    	$lat = stripslashes ($hasil['lat']);
    	$lon = stripslashes ($hasil['lon']);
    	$waktu = stripslashes ($hasil['waktu']);
        
        $datanya = array();
        $datanya["idmpenempatan"] = $id;
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