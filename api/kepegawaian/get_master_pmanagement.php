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

    $nama_posisi2 = isset($_POST['nama_posisipmanagementcari']) ? $_POST['nama_posisipmanagementcari'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $perintah = "";
    if($nama_posisi2!=""){
        $perintah .= " where kode_posisi like '%$nama_posisi2%' or nama_posisi like '%$nama_posisi2%'";
    }
    
    $rs = mysqli_query($koneksi,"select count(*) from r_position_management".$perintah);
    //$rs = mysqli_query($koneksi,"select count(*) from r_position_management where nip='6890008S'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from r_position_management".$perintah." order by id asc limit $offset,$rows");
    //$rs = mysqli_query($koneksi,"select * from r_position_management where nip='6890008S' order by no_urut asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$kode_posisi = stripslashes ($hasil['kode_posisi']);
        $nama_posisi = stripslashes ($hasil['nama_posisi']);
        $status = stripslashes ($hasil['status']);
    	$start_date = stripslashes ($hasil['start_date']);
        $start_date2 = TanggalIndo2($start_date);
    	$end_date = stripslashes ($hasil['end_date']);
        $end_date2 = TanggalIndo2($end_date);
    	$nip = stripslashes ($hasil['nip']);
        $job_key = stripslashes ($hasil['job_key']);
        $job_level = stripslashes ($hasil['job_level']);
        $ftk = stripslashes ($hasil['ftk']);
    	$posisi_kunci = stripslashes ($hasil['posisi_kunci']);
            $rs2 = mysqli_query($koneksi,"select label from m_posisi_kunci where kode='$posisi_kunci'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $posisi_kunci2 = stripslashes ($hasil2['label']);
            } else {
                $posisi_kunci2 = "";
            }
        $kode_posisi_atasan = stripslashes ($hasil['kode_posisi_atasan']);
        $nama_posisi_atasan = stripslashes ($hasil['nama_posisi_atasan']);
        
        $datanya = array();
        $datanya["idpmanagement"] = $id;
        $datanya["kode_posisipmanagement"] = $kode_posisi;
        $datanya["nama_posisipmanagement"] = $nama_posisi;
        $datanya["statuspmanagement"] = $status;
        $datanya["start_datepmanagement"] = $start_date;
        $datanya["start_date2pmanagement"] = $start_date2;
        $datanya["end_datepmanagement"] = $end_date;
        $datanya["end_date2pmanagement"] = $end_date2;
        $datanya["nippmanagement"] = $nip;
        $datanya["job_keypmanagement"] = $job_key;
        $datanya["job_levelpmanagement"] = $job_level;
        $datanya["ftkpmanagement"] = $ftk;
        $datanya["posisi_kuncipmanagement"] = $posisi_kunci;
        $datanya["posisi_kunci2pmanagement"] = $posisi_kunci2;
        $datanya["kode_posisi_atasanpmanagement"] = $kode_posisi_atasan;
        $datanya["nama_posisi_atasanpmanagement"] = $nama_posisi_atasan;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>