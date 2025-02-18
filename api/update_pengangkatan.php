<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi.php';
    $id = intval($_REQUEST['id']);
    $nip = $_REQUEST['nippengangkatan'];
    $tgl_lahir = $_REQUEST['tgl_lahirpengangkatan'];
    $jenis_kelamin = $_REQUEST['jenis_kelaminpengangkatan'];
    $person_grade = $_REQUEST['person_gradepengangkatan'];
    $agama = $_REQUEST['agamapengangkatan'];
    $nik = $_REQUEST['nikpengangkatan'];
    $npwp = $_REQUEST['npwppengangkatan'];
    $tgl_masuk = $_REQUEST['tgl_masukpengangkatan'];
    $tgl_capeg = $_REQUEST['tgl_capegpengangkatan'];
    $tgl_tetap = $_REQUEST['tgl_tetappengangkatan'];
    $keterangan_mutasi = $_REQUEST['keterangan_mutasipengangkatan'];
    if($tgl_tetap!=""){
        $tahun_pengangkatan = substr($tgl_tetap,0,4);
    } else {
        $tahun_pengangkatan = "";
    }
    //$pln_group = "1006";

    $sql = "update r_pengangkatan set tgl_lahir='$tgl_lahir',jenis_kelamin='$jenis_kelamin',person_grade='$person_grade',agama='$agama',nik='$nik',npwp='$npwp',tgl_masuk='$tgl_masuk',tgl_capeg='$tgl_capeg',tgl_tetap='$tgl_tetap',keterangan_mutasi='$keterangan_mutasi',tahun_pengangkatan='$tahun_pengangkatan' where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        $status_perubahan = mysqli_affected_rows($koneksi);
        if($status_perubahan>0){
            $sql2 = "update r_pengangkatan set status_edit='1',tgl_edit='$hari_ini',user_edit='$userhris' where id=$id";
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