<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $id = intval($_REQUEST['id']);
    $start_date = $_REQUEST['start_datekeluarga'];
    $end_date = $_REQUEST['end_datekeluarga'];
    $id_jenis_keluarga = $_REQUEST['id_jenis_keluargakeluarga'];
    $no_urut = $_REQUEST['no_urutkeluarga'];
    $nama = $_REQUEST['namakeluarga'];
    $jenis_kelamin = $_REQUEST['jenis_kelaminkeluarga'];
    $tempat_lahir = $_REQUEST['tempat_lahirkeluarga'];
    $tgl_lahir = $_REQUEST['tgl_lahirkeluarga'];
    $id_agama = $_REQUEST['id_agamakeluarga'];
    $pekerjaan = $_REQUEST['pekerjaankeluarga'];
    $pln_group = $_REQUEST['pln_groupkeluarga'];
    $kode_perusahaan = $_REQUEST['kode_perusahaankeluarga'];
    $nip_keluarga = $_REQUEST['nip_keluargakeluarga'];
    $status_warganegara = $_REQUEST['status_warganegarakeluarga'];
    $jenis_alamat = $_REQUEST['jenis_alamatkeluarga'];
    $alamat = $_REQUEST['alamatkeluarga'];
    $id_provinsi = $_REQUEST['id_provinsikeluarga'];
    $id_kabupaten = $_REQUEST['id_kabupatenkeluarga'];
    $kode_pos = $_REQUEST['kode_poskeluarga'];
    $no_kk = $_REQUEST['no_kkkeluarga'];
    $nik = $_REQUEST['nikkeluarga'];
    $npwp = $_REQUEST['npwpkeluarga'];
    $telepon = $_REQUEST['teleponkeluarga'];
    $gol_darah = $_REQUEST['gol_darahkeluarga'];
    $no_bpjs_kes = $_REQUEST['no_bpjs_keskeluarga'];

    $sql = "update r_keluarga set start_date='$start_date',end_date='$end_date',id_jenis_keluarga='$id_jenis_keluarga',no_urut='$no_urut',nama='$nama',jenis_kelamin='$jenis_kelamin',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',id_agama='$id_agama',pekerjaan='$pekerjaan',pln_group='$pln_group',kode_perusahaan='$kode_perusahaan',nip_keluarga='$nip_keluarga',status_warganegara='$status_warganegara',jenis_alamat='$jenis_alamat',alamat='$alamat',id_provinsi='$id_provinsi',id_kabupaten='$id_kabupaten',kode_pos='$kode_pos',no_kk='$no_kk',nik='$nik',npwp='$npwp',telepon='$telepon',gol_darah='$gol_darah',no_bpjs_kes='$no_bpjs_kes' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $status_perubahan = mysqli_affected_rows($koneksi);
        if($status_perubahan>0){
            $sql2 = "update r_keluarga set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
            $result2 = @mysqli_query($koneksi,$sql2);
        }

    	echo json_encode(array(
    		'id' => $id
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>