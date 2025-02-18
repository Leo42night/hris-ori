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
    
    $rs = mysqli_query($koneksi,"select count(*) from r_jabatan where nip='$nip2'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from r_jabatan where nip='$nip2' order by end_date asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$start_date = stripslashes ($hasil['start_date']);
        $start_date2 = TanggalIndo2($start_date);
    	$end_date = stripslashes ($hasil['end_date']);
        $end_date2 = TanggalIndo2($end_date);
    	$ee_group = stripslashes ($hasil['ee_group']);
            $rs2 = mysqli_query($koneksi,"select * from m_ee_group where kode_ee_group='$ee_group'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $ee_group2 = stripslashes ($hasil2['ee_group']);
            } else {
                $ee_group2 = "";
            }
    	$ee_subgroup = stripslashes ($hasil['ee_subgroup']);
            $rs2 = mysqli_query($koneksi,"select * from m_ee_subgroup where kode_ee_subgroup='$ee_subgroup'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $ee_subgroup2 = stripslashes ($hasil2['ee_subgroup']);
            } else {
                $ee_subgroup2 = "";
            }
    	$job_key = stripslashes ($hasil['job_key']);
    	$jabatan = stripslashes ($hasil['jabatan']);
    	//$organisasi = stripslashes ($hasil['organisasi']);
    	$kota_organisasi = stripslashes ($hasil['kota_organisasi']);
            $rs2 = mysqli_query($koneksi,"select nama_kabupaten from m_kabupaten where id_kabupaten='$kota_organisasi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $kota_organisasi2 = stripslashes ($hasil2['nama_kabupaten']);
            } else {
                $kota_organisasi2 = "";
            }
    	$jenis_jabatan = stripslashes ($hasil['jenis_jabatan']);
            $rs2 = mysqli_query($koneksi,"select * from m_jenis_jabatan where kode='$jenis_jabatan'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_jabatan2 = stripslashes ($hasil2['label']);
            } else {
                $jenis_jabatan2 = "";
            }
    	$jenjang_jabatan = stripslashes ($hasil['jenjang_jabatan']);
            $rs2 = mysqli_query($koneksi,"select * from m_jenjang_jabatan where kode='$jenjang_jabatan'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenjang_jabatan2 = stripslashes ($hasil2['label']);
            } else {
                $jenjang_jabatan2 = "";
            }
    	$kode_profesi = stripslashes ($hasil['kode_profesi']);
            $rs2 = mysqli_query($koneksi,"select * from m_profesi where kode_profesi='$kode_profesi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_profesi = stripslashes ($hasil2['nama_profesi']);
            } else {
                $nama_profesi = "";
            }        
    	//$nama_profesi = stripslashes ($hasil['nama_profesi']);
    	$jenis_unit = stripslashes ($hasil['jenis_unit']);
    	$kelas_unit = stripslashes ($hasil['kelas_unit']);
    	$kode_daerah = stripslashes ($hasil['kode_daerah']);
    	$stream_business = stripslashes ($hasil['stream_business']);
    	$achievements = stripslashes ($hasil['achievements']);
    	$tupoksi = stripslashes ($hasil['tupoksi']);
    	$company_code = stripslashes ($hasil['company_code']);
            $rs2 = mysqli_query($koneksi,"select label from m_company_code where kode='$company_code'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $company_code2 = stripslashes ($hasil2['label']);
            } else {
                $company_code2 = "";
            }
    	$business_area = stripslashes ($hasil['business_area']);
            $rs2 = mysqli_query($koneksi,"select label from m_business_area where kode='$business_area'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $business_area2 = stripslashes ($hasil2['label']);
            } else {
                $business_area2 = "";
            }
    	$personal_area = stripslashes ($hasil['personal_area']);
    	$personal_sub_area = stripslashes ($hasil['personal_sub_area']);
    	$level_organisasi1 = stripslashes ($hasil['level_organisasi1']);
    	$level_organisasi2 = stripslashes ($hasil['level_organisasi2']);
    	$level_organisasi3 = stripslashes ($hasil['level_organisasi3']);
    	$level_organisasi4 = stripslashes ($hasil['level_organisasi4']);
    	$level_organisasi5 = stripslashes ($hasil['level_organisasi5']);
    	$level_organisasi6 = stripslashes ($hasil['level_organisasi6']);
    	$level_organisasi7 = stripslashes ($hasil['level_organisasi7']);
    	$level_organisasi8 = stripslashes ($hasil['level_organisasi8']);
    	$level_organisasi9 = stripslashes ($hasil['level_organisasi9']);
    	$level_organisasi10 = stripslashes ($hasil['level_organisasi10']);
    	$level_organisasi11 = stripslashes ($hasil['level_organisasi11']);
    	$level_organisasi12 = stripslashes ($hasil['level_organisasi12']);
    	$level_organisasi13 = stripslashes ($hasil['level_organisasi13']);
    	$level_organisasi14 = stripslashes ($hasil['level_organisasi14']);
    	$level_organisasi15 = stripslashes ($hasil['level_organisasi15']);
    	$tingkat_pengalaman = stripslashes ($hasil['tingkat_pengalaman']);
    	//$jenis_jabatan_ap = stripslashes ($hasil['jenis_jabatan_ap']);
    	//$jenjang_jabatan_ap = stripslashes ($hasil['jenjang_jabatan_ap']);
    	$jenis_jabatan_ap = stripslashes ($hasil['jenis_jabatan_ap']);
            $rs2 = mysqli_query($koneksi,"select * from m_jenis_jabatan where kode='$jenis_jabatan_ap'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_jabatan_ap2 = stripslashes ($hasil2['label']);
            } else {
                $jenis_jabatan_ap2 = "";
            }
    	$jenjang_jabatan_ap = stripslashes ($hasil['jenjang_jabatan_ap']);
            $rs2 = mysqli_query($koneksi,"select * from m_jenjang_jabatan where kode='$jenjang_jabatan_ap'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenjang_jabatan_ap2 = stripslashes ($hasil2['label']);
            } else {
                $jenjang_jabatan_ap2 = "";
            }

    	$kode_posisi = stripslashes ($hasil['kode_posisi']);
        
        $datanya = array();
        $datanya["idjabatan"] = $id;
        $datanya["nipjabatan"] = $nip;
        $datanya["start_datejabatan"] = $start_date;
        $datanya["start_date2jabatan"] = $start_date2;
        $datanya["end_datejabatan"] = $end_date;
        $datanya["end_date2jabatan"] = $end_date2;
        $datanya["ee_groupjabatan"] = $ee_group;
        $datanya["ee_group2jabatan"] = $ee_group2;
        $datanya["ee_subgroupjabatan"] = $ee_subgroup;
        $datanya["ee_subgroup2jabatan"] = $ee_subgroup2;
        $datanya["job_keyjabatan"] = $job_key;
        $datanya["jabatanjabatan"] = $jabatan;
        //$datanya["organisasijabatan"] = $organisasi;
        $datanya["kota_organisasijabatan"] = $kota_organisasi;
        $datanya["kota_organisasi2jabatan"] = $kota_organisasi2;
        $datanya["jenis_jabatan"] = $jenis_jabatan;
        $datanya["jenis_jabatan2"] = $jenis_jabatan2;
        $datanya["jenjang_jabatan"] = $jenjang_jabatan;
        $datanya["jenjang_jabatan2"] = $jenjang_jabatan2;
        $datanya["kode_profesijabatan"] = $kode_profesi;
        $datanya["nama_profesijabatan"] = $nama_profesi;
        $datanya["jenis_unitjabatan"] = $jenis_unit;
        $datanya["kelas_unitjabatan"] = $kelas_unit;
        $datanya["kode_daerahjabatan"] = $kode_daerah;
        $datanya["stream_businessjabatan"] = $stream_business;
        $datanya["achievementsjabatan"] = $achievements;
        $datanya["tupoksijabatan"] = $tupoksi;
        $datanya["company_codejabatan"] = $company_code;
        $datanya["company_code2jabatan"] = $company_code2;
        $datanya["business_areajabatan"] = $business_area;
        $datanya["business_area2jabatan"] = $business_area2;
        $datanya["personal_areajabatan"] = $personal_area;
        $datanya["personal_sub_areajabatan"] = $personal_sub_area;
        $datanya["level_organisasi1jabatan"] = $level_organisasi1;
        $datanya["level_organisasi2jabatan"] = $level_organisasi2;
        $datanya["level_organisasi3jabatan"] = $level_organisasi3;
        $datanya["level_organisasi4jabatan"] = $level_organisasi4;
        $datanya["level_organisasi5jabatan"] = $level_organisasi5;
        $datanya["level_organisasi6jabatan"] = $level_organisasi6;
        $datanya["level_organisasi7jabatan"] = $level_organisasi7;
        $datanya["level_organisasi8jabatan"] = $level_organisasi8;
        $datanya["level_organisasi9jabatan"] = $level_organisasi9;
        $datanya["level_organisasi10jabatan"] = $level_organisasi10;
        $datanya["level_organisasi11jabatan"] = $level_organisasi11;
        $datanya["level_organisasi12jabatan"] = $level_organisasi12;
        $datanya["level_organisasi13jabatan"] = $level_organisasi13;
        $datanya["level_organisasi14jabatan"] = $level_organisasi14;
        $datanya["level_organisasi15jabatan"] = $level_organisasi15;
        $datanya["tingkat_pengalamanjabatan"] = $tingkat_pengalaman;
        $datanya["jenis_jabatan_apjabatan"] = $jenis_jabatan_ap;
        $datanya["jenis_jabatan_ap2jabatan"] = $jenis_jabatan_ap2;
        $datanya["jenjang_jabatan_apjabatan"] = $jenjang_jabatan_ap;
        $datanya["jenjang_jabatan_ap2jabatan"] = $jenjang_jabatan_ap2;
        $datanya["kode_posisijabatan"] = $kode_posisi;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>