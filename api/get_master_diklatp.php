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
    
    $rs = mysqli_query($koneksi,"select count(*) from r_diklat_penjenjangan where nip='$nip2'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from r_diklat_penjenjangan where nip='$nip2' order by end_date asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$start_date = stripslashes ($hasil['start_date']);
        $start_date2 = TanggalIndo2($start_date);
    	$end_date = stripslashes ($hasil['end_date']);
        $end_date2 = TanggalIndo2($end_date);
    	$jenis_diklat = stripslashes ($hasil['jenis_diklat']);
            $rs2 = mysqli_query($koneksi,"select * from m_jenis_diklat where kode='$jenis_diklat'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_diklat2 = stripslashes ($hasil2['label']);
            } else {
                $jenis_diklat2 = "";
            }
        $kode_diklat = stripslashes ($hasil['kode_diklat']);
            $rs2 = mysqli_query($koneksi,"select * from m_kode_diklat where kode='$kode_diklat'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $kode_diklat2 = stripslashes ($hasil2['label']);
            } else {
                $kode_diklat2 = "";
            }
        $judul_diklat = stripslashes ($hasil['judul_diklat']);
        /*
    	$tingkat_acara = stripslashes ($hasil['tingkat_acara']);
            $rs2 = mysqli_query($koneksi,"select * from m_tingkat_acara where kode='$tingkat_acara'");
            $hasil2 = mysqli_fetch_array($rs2);
            $tingkat_acara2 = stripslashes ($hasil2['label']);
    	$kode_dahan_profesi = stripslashes ($hasil['kode_dahan_profesi']);
            $rs2 = mysqli_query($koneksi,"select * from m_dahan_profesi where kode='$kode_dahan_profesi'");
            $hasil2 = mysqli_fetch_array($rs2);
            $dahan_profesi = stripslashes ($hasil2['label']);
    	$kode_diklat = stripslashes ($hasil['kode_diklat']);
    	$judul_diklat = stripslashes ($hasil['judul_diklat']);
    	$udiklat = stripslashes ($hasil['udiklat']);
            $rs2 = mysqli_query($koneksi,"select * from m_udiklat where kode='$udiklat'");
            $hasil2 = mysqli_fetch_array($rs2);
            $udiklat2 = stripslashes ($hasil2['label']);
    	$jenis_pelaksanaan = stripslashes ($hasil['jenis_pelaksanaan']);
            $rs2 = mysqli_query($koneksi,"select * from m_jenis_pelaksanaan where kode='$jenis_pelaksanaan'");
            $hasil2 = mysqli_fetch_array($rs2);
            $jenis_pelaksanaan2 = stripslashes ($hasil2['label']);
    	$jenis_sertifikasi = stripslashes ($hasil['jenis_sertifikasi']);
            $rs2 = mysqli_query($koneksi,"select * from m_jenis_sertifikat where kode='$jenis_sertifikasi'");
            $hasil2 = mysqli_fetch_array($rs2);
            $jenis_sertifikasi2 = stripslashes ($hasil2['label']);
    	$sifat_diklat = stripslashes ($hasil['sifat_diklat']);
            $rs2 = mysqli_query($koneksi,"select * from m_sifat_diklat where kode='$sifat_diklat'");
            $hasil2 = mysqli_fetch_array($rs2);
            $sifat_diklat2 = stripslashes ($hasil2['label']);
        */
        
        $datanya = array();
        $datanya["iddiklatp"] = $id;
        $datanya["nipdiklatp"] = $nip;
        $datanya["start_datediklatp"] = $start_date;
        $datanya["start_date2diklatp"] = $start_date2;
        $datanya["end_datediklatp"] = $end_date;
        $datanya["end_date2diklatp"] = $end_date2;
        $datanya["jenis_diklatdiklatp"] = $jenis_diklat;
        $datanya["jenis_diklat2diklatp"] = $jenis_diklat2;
        $datanya["kode_diklatdiklatp"] = $kode_diklat;
        $datanya["kode_diklat2diklatp"] = $kode_diklat2;
        $datanya["judul_diklatdiklatp"] = $judul_diklat;
        /*
        $datanya["tingkat_acaradiklat"] = $tingkat_acara;
        $datanya["tingkat_acara2diklat"] = $tingkat_acara2;
        $datanya["kode_dahan_profesidiklat"] = $kode_dahan_profesi;
        $datanya["dahan_profesidiklat"] = $dahan_profesi;
        $datanya["kode_diklatdiklat"] = $kode_diklat;
        $datanya["judul_diklatdiklat"] = $judul_diklat;
        $datanya["udiklatdiklat"] = $udiklat;
        $datanya["udiklat2diklat"] = $udiklat2;
        $datanya["jenis_pelaksanaandiklat"] = $jenis_pelaksanaan;
        $datanya["jenis_pelaksanaan2diklat"] = $jenis_pelaksanaan2;
        $datanya["jenis_sertifikasidiklat"] = $jenis_sertifikasi;
        $datanya["jenis_sertifikasi2diklat"] = $jenis_sertifikasi2;
        $datanya["sifat_diklatdiklat"] = $sifat_diklat;
        $datanya["sifat_diklat2diklat"] = $sifat_diklat2;
        */
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>