<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if ($userhris && $superadminhris=="1"){
    function TanggalIndo2($date){
        if(strtotime($date)){
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $result = $tgl . "-" . $bulan . "-". $tahun;	
            return($result);
        } else {
            return("");
        }
    }

    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $id = intval($_REQUEST['id']);
    $idmenu = intval($_REQUEST['idmenu']);
    $username = $_REQUEST['username'];
    $proses = $_REQUEST['prosessettinguser'];
    $lihat = $_REQUEST['lihatsettinguser'];

    if($id==0){
        $sql = "insert into aksesuser(username,idmenu,proses,lihat) values('$username','$idmenu','$proses','$lihat')";
    } else {
        $sql = "update aksesuser set proses='$proses',lihat='$lihat' where id=$id";
    }
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
        echo json_encode(array(
            'id' => $id
        ));
    } else {
        echo json_encode(array('errorMsg'=>'Gagal simpan data.'));
    }
}    
?>