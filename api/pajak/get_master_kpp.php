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
    
    $status2 = isset($_POST['statuskppcari']) ? $_POST['statuskppcari'] : "semua";
    // $level_sppd2 = isset($_POST['level_sppdkppcari']) ? $_POST['level_sppdkppcari'] : "semua";

    $offset = ($page-1)*$rows;
    $result = array();
    
    $rs = mysqli_query($koneksi,"select count(*) from setting_pph");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $items = array();
    $rs = mysqli_query($koneksi,"select * from setting_pph order by id desc limit $offset,$rows");
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$kpp = stripslashes ($hasil['kpp']);
    	$npwp_pemotong = stripslashes ($hasil['npwp_pemotong']);
    	$nama_pemotong = stripslashes ($hasil['nama_pemotong']);
    	$npwp_pejabat = stripslashes ($hasil['npwp_pejabat']);
    	$nama_pejabat = stripslashes ($hasil['nama_pejabat']);
    	$alamat = stripslashes ($hasil['alamat']);
    	$alamat2 = stripslashes ($hasil['alamat2']);
    	$telepon = stripslashes ($hasil['telepon']);
    	$email = stripslashes ($hasil['email']);
    	$path_ttd = stripslashes ($hasil['path_ttd']);
        
        $datanya = array();
        $datanya["idkpp"] = $id;
        $datanya["kppkpp"] = $kpp;
        $datanya["npwp_pemotongkpp"] = $npwp_pemotong;
        $datanya["nama_pemotongkpp"] = $nama_pemotong;
        $datanya["npwp_pejabatkpp"] = $npwp_pejabat;
        $datanya["nama_pejabatkpp"] = $nama_pejabat;
        $datanya["alamatkpp"] = $alamat;
        $datanya["alamat2kpp"] = $alamat2;
        $datanya["teleponkpp"] = $telepon;
        $datanya["emailkpp"] = $email;
        $datanya["path_ttdkpp"] = $path_ttd;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>