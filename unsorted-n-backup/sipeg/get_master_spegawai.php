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
    include "koneksi_sipeg.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $nama2 = isset($_REQUEST['namaspegawaicari']) ? $_REQUEST['namaspegawaicari'] : "";
    $perintah = "";
    if($nama2!=""){
        $perintah .= " and (a.nip='$nama2' or a.nama_lengkap like '%$nama2%')";
    }
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $rs = mysqli_query($koneksi,"select count(*) from data_pegawai where aktif='1'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $items = array();
    $rs = mysqli_query($koneksi,"select a.nama_lengkap,b.* from hrisnew.data_pegawai a left join organikplnt.setting_pegawai b on a.nip=b.nip where a.aktif='1' order by a.id asc limit $offset,$rows");
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$kd_region = stripslashes ($hasil['kd_region']);
    	$kd_area = stripslashes ($hasil['kd_area']);
    	$lat = stripslashes ($hasil['lat']);
    	$lon = stripslashes ($hasil['lon']);
    	//$waktu = stripslashes ($hasil['waktu']);
        
        $datanya = array();
        $datanya["idspegawai"] = $id;
        $datanya["kd_regionspegawai"] = $kd_region;
        $datanya["kd_areaspegawai"] = $kd_area;
        $datanya["latspegawai"] = $lat;
        $datanya["lonspegawai"] = $lon;
        //$datanya["waktuspegawai"] = $waktu;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>