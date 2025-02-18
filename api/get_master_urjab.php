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

    $nip2 = isset($_REQUEST['nip']) ? $_REQUEST['nip'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $rs = mysqli_query($koneksi,"select count(*) from r_urjab where nip='$nip2'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from r_urjab where nip='$nip2' order by id limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
        $lokasi_file = stripslashes ($hasil['lokasi_file']);
        $nama_file = stripslashes ($hasil['nama_file']);
        $no_dokumen = stripslashes ($hasil['no_dokumen']);
        $keterangan = stripslashes ($hasil['keterangan']);
        
        $datanya = array();
        $datanya["idurjab"] = $id;
        $datanya["nipurjab"] = $nip;
        $datanya["lokasi_fileurjab"] = $lokasi_file;
        $datanya["nama_fileurjab"] = $nama_file;
        $datanya["no_dokumenurjab"] = $no_dokumen;
        $datanya["keteranganurjab"] = $keterangan;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>