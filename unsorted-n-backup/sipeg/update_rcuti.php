<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
$userhris = $_SESSION["userakseshris"];
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

    include 'koneksi.php';
    $id = intval($_REQUEST['id']);
    $nip = $_REQUEST['niprcuti'];
    $jenis_cuti = $_REQUEST['jenis_cutircuti'];
    $tgl_awal = $_REQUEST['tgl_awalrcuti'];
    $tgl_akhir = $_REQUEST['tgl_akhirrcuti'];
    $hari = $_REQUEST['harircuti'];
    $keperluan_cuti = $_REQUEST['keperluan_cutircuti'];
    $alamat = $_REQUEST['alamatrcuti'];
    $telepon = $_REQUEST['teleponrcuti'];

    // $rs2 = mysqli_query($koneksi,"SELECT kd_region,kd_cabang,kd_unit,no_spk FROM data_pegawai where nip='$nip'");
    // $hasil2 = mysqli_fetch_array($rs2);
    // if($hasil2){
    //     $kd_region= $hasil2['kd_region'];
    //     $kd_cabang= $hasil2['kd_cabang'];
    //     $kd_unit= $hasil2['kd_unit'];
    //     $no_spk= $hasil2['no_spk'];
    // } else {
    //     $kd_region= "";
    //     $kd_cabang= "";
    //     $kd_unit= "";
    //     $no_spk= "";
    // }

    $rs98 = mysqli_query($koneksi,"SELECT id,tgl_awal,tgl_akhir FROM cuti where nip='$nip' and id<>'$id' and ('".$tgl_awal."' BETWEEN tgl_awal and tgl_akhir or '".$tgl_akhir."' BETWEEN tgl_awal and tgl_akhir)");
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
        $sql = "update cuti set jenis_cuti='$jenis_cuti',tgl_awal='$tgl_awal',tgl_akhir='$tgl_akhir',hari='$hari',keperluan_cuti='$keperluan_cuti',alamat='$alamat',telepon='$telepon' where id=$id";
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