<?php
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    function TanggalIndo2($date){
        if(!is_null($date) && strtotime($date)){
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $result = $tgl . "-" . $bulan . "-". $tahun;	
            return($result);
        } else {
            return("");
        }
    }
    function hitTahun($lahir) {
        if(strtotime($lahir)){
            $pecah = explode("-", $lahir);
            $thn = $pecah['0'];
            $bln = intval($pecah['1']);
            $tgl = intval($pecah['2']);
            $utahun = date("Y") - $thn;
            $ubulan = date("m") - $bln;
            $uhari = date("j") - $tgl;
            if($uhari < 0){
                $uhari = date("t",mktime(0,0,0,$bln-1,date("m"),date("Y"))) - abs($uhari); $ubulan = $ubulan - 1;
            }
            if($ubulan < 0){
                $ubulan = 12 - abs($ubulan); $utahun = $utahun - 1;
            }
            $tahunnya = $utahun;
            return $tahunnya;
        } else {
            return 0;
        }
    }

    //$nip2 = $_REQUEST['nip'];
    //$id2 = $_REQUEST['id'];
    $nip2 = "9215907ZY";
    $id2 = 0;
    $today = date("Y-m-d");
    if($nip2!=""){
        $rs = mysqli_query($koneksi,"select nama FROM setting_pegawai WHERE aktif='1' and nip='$nip2'");
        $hasil = mysqli_fetch_array($rs);
        if($hasil){
            $nama = stripslashes ($hasil['nama']);
        } else {
            $nama = "";
        }
            
        echo json_encode(array(
            'nama' => $nama
        ));
    } else {
        echo json_encode(array());
    }
}
?>