<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $nip = $_REQUEST['nipjabatan'];
    $start_date = $_REQUEST['start_datejabatan'];
    $end_date = $_REQUEST['end_datejabatan'];
    $ee_group = $_REQUEST['ee_groupjabatan'];
    $ee_subgroup = $_REQUEST['ee_subgroupjabatan'];
    $job_key = $_REQUEST['job_keyjabatan'];
    $jabatan = $_REQUEST['jabatanjabatan'];
    //$organisasi = $_REQUEST['organisasijabatan'];
    $kota_organisasi = $_REQUEST['kota_organisasijabatan'];
    $jenis_jabatan = $_REQUEST['jenis_jabatan'];
    $jenjang_jabatan = $_REQUEST['jenjang_jabatan'];
    $kode_profesi = $_REQUEST['kode_profesijabatan'];
        $rs2 = mysqli_query($koneksi,"select * from m_profesi where kode_profesi='$kode_profesi'");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $nama_profesi = stripslashes ($hasil2['nama_profesi']);
        } else {
            $nama_profesi = "";
        }

    //$nama_profesi = $_REQUEST['nama_profesijabatan'];
    $jenis_unit = $_REQUEST['jenis_unitjabatan'];
    $kelas_unit = $_REQUEST['kelas_unitjabatan'];
    $kode_daerah = $_REQUEST['kode_daerahjabatan'];
    $stream_business = $_REQUEST['stream_businessjabatan'];
    $achievements = $_REQUEST['achievementsjabatan'];
    $tupoksi = $_REQUEST['tupoksijabatan'];
    $company_code = $_REQUEST['company_codejabatan'];
    $business_area = $_REQUEST['business_areajabatan'];
    $personal_area = $_REQUEST['personal_areajabatan'];
    $personal_sub_area = $_REQUEST['personal_sub_areajabatan'];
    $level_organisasi1 = $_REQUEST['level_organisasi1jabatan'];
    $level_organisasi2 = $_REQUEST['level_organisasi2jabatan'];
    $level_organisasi3 = $_REQUEST['level_organisasi3jabatan'];
    $level_organisasi4 = $_REQUEST['level_organisasi4jabatan'];
    $level_organisasi5 = $_REQUEST['level_organisasi5jabatan'];
    $level_organisasi6 = $_REQUEST['level_organisasi6jabatan'];
    $level_organisasi7 = $_REQUEST['level_organisasi7jabatan'];
    $level_organisasi8 = $_REQUEST['level_organisasi8jabatan'];
    $level_organisasi9 = $_REQUEST['level_organisasi9jabatan'];
    $level_organisasi10 = $_REQUEST['level_organisasi10jabatan'];
    $level_organisasi11 = $_REQUEST['level_organisasi11jabatan'];
    $level_organisasi12 = $_REQUEST['level_organisasi12jabatan'];
    $level_organisasi13 = $_REQUEST['level_organisasi13jabatan'];
    $level_organisasi14 = $_REQUEST['level_organisasi14jabatan'];
    $level_organisasi15 = $_REQUEST['level_organisasi15jabatan'];
    $tingkat_pengalaman = $_REQUEST['tingkat_pengalamanjabatan'];
    $jenis_jabatan_ap = $_REQUEST['jenis_jabatan_apjabatan'];
    $jenjang_jabatan_ap = $_REQUEST['jenjang_jabatan_apjabatan'];
    $kode_posisi = $_REQUEST['kode_posisijabatan'];

    $sql = "insert into r_jabatan";
    $sql .= "(nip,start_date,end_date,ee_group,ee_subgroup,job_key,jabatan,kota_organisasi,jenis_jabatan,jenjang_jabatan,kode_profesi,nama_profesi,jenis_unit,kelas_unit,kode_daerah,stream_business,achievements,tupoksi,company_code,business_area,personal_area,personal_sub_area,level_organisasi1,level_organisasi2,level_organisasi3,level_organisasi4,level_organisasi5,level_organisasi6,level_organisasi7,level_organisasi8,level_organisasi9,level_organisasi10,level_organisasi11,level_organisasi12,level_organisasi13,level_organisasi14,level_organisasi15,tingkat_pengalaman,jenis_jabatan_ap,jenjang_jabatan_ap,kode_posisi,status_edit,tgl_edit,user_edit)";    
    $sql .= " values('$nip','$start_date','$end_date','$ee_group','$ee_subgroup','$job_key','$jabatan','$kota_organisasi','$jenis_jabatan','$jenjang_jabatan','$kode_profesi','$nama_profesi','$jenis_unit','$kelas_unit','$kode_daerah','$stream_business','$achievements','$tupoksi','$company_code','$business_area','$personal_area','$personal_sub_area','$level_organisasi1','$level_organisasi2','$level_organisasi3','$level_organisasi4','$level_organisasi5','$level_organisasi6','$level_organisasi7','$level_organisasi8','$level_organisasi9','$level_organisasi10','$level_organisasi11','$level_organisasi12','$level_organisasi13','$level_organisasi14','$level_organisasi15','$tingkat_pengalaman','$jenis_jabatan_ap','$jenjang_jabatan_ap','$kode_posisi','1','$hari_ini','$userhris')";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'nip' => $nip
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>