<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
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

    $tgl_pengajuan = date("Y-m-d");
    $nip = $_REQUEST['niprcuti'];
    $jenis_cuti = $_REQUEST['jenis_cutircuti'];
    $tgl_awal = $_REQUEST['tgl_awalrcuti'];
    $tgl_akhir = $_REQUEST['tgl_akhirrcuti'];
    $hari = $_REQUEST['harircuti'];
    $keperluan_cuti = $_REQUEST['keperluan_cutircuti'];
    $alamat = $_REQUEST['alamatrcuti'];
    $telepon = $_REQUEST['teleponrcuti'];

    $rs3 = mysqli_query($koneksi,"select * from data_pegawai where nip='$nip'");
    $hasil3 = mysqli_fetch_array($rs3);
    $tgl_tetap = $hasil3['tgl_tetap'];
    $tgl_tetap2 = TanggalIndo2($tgl_tetap);
    
    if(!is_null($tgl_tetap) && strtotime($tgl_tetap)){
        $awalnya = date("Y-m-01",strtotime($tgl_tetap));
        $batas_awalnya = date("Y")."-".substr($awalnya,-5);
        if($batas_awalnya<=$today){
            $batas_awal = $batas_awalnya;
        } else {
            $batas_awal = (intval(date("Y"))-1)."-".substr($awalnya,-5);                
        }
        $batas_akhir = date('Y-m-01', strtotime($batas_awal. ' + 12 months'));
        $batas_akhir = date('Y-m-d', strtotime($batas_akhir. ' - 1 days'));
    } else {
        $batas_awal = "";
        $batas_akhir = "";
    }

    $rs98 = mysqli_query($koneksi,"SELECT id,tgl_awal,tgl_akhir FROM cuti where nip='$nip' and ('".$tgl_awal."' BETWEEN tgl_awal and tgl_akhir or '".$tgl_akhir."' BETWEEN tgl_awal and tgl_akhir)");
    $hasil98 = mysqli_fetch_array($rs98);
    if($hasil98){
        $id_cuti= intval($hasil98['id']);
        $tgl_awal98= $hasil98['tgl_awal'];
        $tgl_akhir98= $hasil98['tgl_akhir'];
        $ket_cuti = "Konflik data!! sistem mendeteksi adanya pengajuan cuti sebelumnya dari tanggal : ".TanggalIndo2($tgl_awal98)." s.d ".TanggalIndo2($tgl_akhir98);
    } else {
        $id_cuti= 0;
        $ket_cuti = "";
    }
    
    $rs99 = mysqli_query($koneksi,"SELECT id,tgl_awal,tgl_akhir FROM ijin where nip='$nip' and ('".$tgl_awal."' BETWEEN tgl_awal and tgl_akhir or '".$tgl_akhir."' BETWEEN tgl_awal and tgl_akhir)");
    $hasil99 = mysqli_fetch_array($rs99);
    if($hasil99){
        $id_ijin= intval($hasil99['id']);
        $tgl_awal99= $hasil99['tgl_awal'];
        $tgl_akhir99= $hasil99['tgl_akhir'];
        $ket_ijin = "Konflik data!! sistem mendeteksi adanya pengajuan ijin sebelumnya dari tanggal : ".TanggalIndo2($tgl_awal99)." s.d ".TanggalIndo2($tgl_akhir99);
    } else {
        $id_ijin= 0;
        $ket_ijin = "";
    }
    
    $rs97 = mysqli_query($koneksi,"SELECT id,tgl_awal,tgl_akhir FROM sppd1 where nip='$nip' and ('".$tgl_awal."' BETWEEN tgl_awal and tgl_akhir or '".$tgl_akhir."' BETWEEN tgl_awal and tgl_akhir)");
    $hasil97 = mysqli_fetch_array($rs97);
    if($hasil97){
        $id_sppd= intval($hasil97['id']);
        $tgl_awal97= $hasil97['tgl_awal'];
        $tgl_akhir97= $hasil97['tgl_akhir'];
        $ket_sppd = "Konflik data!! sistem mendeteksi adanya pengajuan perjalanan dinas sebelumnya dari tanggal : ".TanggalIndo2($tgl_awal97)." s.d ".TanggalIndo2($tgl_akhir97);
    } else {
        $id_sppd= 0;
        $ket_sppd = "";
    }
    
    if($id_cuti==0 && $id_ijin==0 && $id_sppd==0){  
        $sql = "insert into cuti(periode_awal,periode_akhir,nip,tgl_pengajuan,jenis_cuti,tgl_awal,tgl_akhir,hari,keperluan_cuti,alamat,telepon) values('$batas_awal','$batas_akhir','$nip','$tgl_pengajuan','$jenis_cuti','$tgl_awal','$tgl_akhir','$hari','$keperluan_cuti','$alamat','$telepon')";
        $result = @mysqli_query($koneksi,$sql);
        if ($result){
            echo json_encode(array(
                'nip' => $nip
            ));
        } else {
            echo json_encode(array('errorMsg'=>'Gagal menyimpan data.'));
        }
    } else {
        if($id_cuti>0){
            echo json_encode(array('errorMsg' => $ket_cuti));
        } else if($id_ijin>0){
            echo json_encode(array('errorMsg' => $ket_ijin));
        } else if($id_sppd>0){
            echo json_encode(array('errorMsg' => $ket_sppd));
        } else {
            echo json_encode(array('errorMsg'=>'Gagal menyimpan data.'));
        }    
    }
}
?>