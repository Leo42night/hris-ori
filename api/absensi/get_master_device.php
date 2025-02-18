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

    $nama2 = isset($_POST['namadevicecari']) ? $_POST['namadevicecari'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $perintah = "";
    if($nama2!=""){
        $perintah .= " and (nip='$nama2' or nama like '%$nama2%')";
        //$perintah .= " where nip like '%$nama2%'";
    }
    
    //$rs = mysqli_query($koneksi,"select count(*) from data_pegawai a left join master_gaji b on a.nip=b.nip where a.aktif='1'".$perintah);
    $rs = mysqli_query($koneksi,"select count(*) from data_pegawai where aktif='1'".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $items = array();
    //$rs2 = mysqli_query($koneksi,"select a.nip,a.nama_lengkap,b.* from data_pegawai a left join master_gaji b on a.nip=b.nip where a.aktif='1'".$perintah." order by a.nip asc limit $offset,$rows");
    $rs = mysqli_query($koneksi,"select * from data_pegawai where aktif='1'".$perintah." order by nip asc limit $offset,$rows");
    while ($hasil = mysqli_fetch_array($rs)) {    	
        $nip = stripslashes ($hasil['nip']);
        $nama = stripslashes ($hasil['nama']);
        $akses = stripslashes ($hasil['akses']);
        $kode_device = stripslashes ($hasil['kode_device']);
        
        $datanya = array();
        $datanya["nipdevice"] = $nip;
        $datanya["namadevice"] = $nama;
        $datanya["aksesdevice"] = $akses;
        $datanya["akses2device"] = strtoupper($akses);
        $datanya["kode_devicedevice"] = $kode_device;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>