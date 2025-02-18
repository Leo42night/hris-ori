<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
$regionvsipeg = $_SESSION["kd_regionvsipeg"];
$cabangvsipeg = $_SESSION["kd_cabangvsipeg"];
$idspkvsipeg = $_SESSION["idspkvsipeg"];
$wilayahvsipeg = $_SESSION["kd_wilayahvsipeg"];
$up3vsipeg = $_SESSION["kd_up3vsipeg"];
$uservsipeg = $_SESSION["uservsipeg"];
$namavsipeg = $_SESSION["namavsipeg"];
$idspkvsipeg = $_SESSION["idspkvsipeg"];
$unitvsipeg = $_SESSION["kd_unitvsipeg"];
$approval1vsipeg = $_SESSION["approval1vsipeg"];
if ($up3vsipeg){
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
    function selisih($jam_masuk,$jam_keluar) { 
        list($h,$m,$s) = explode(":",$jam_masuk); 
        $dtAwal = mktime($h,$m,$s,"1","1","1"); 
        list($h,$m,$s) = explode(":",$jam_keluar); 
        $dtAkhir = mktime($h,$m,$s,"1","1","1"); 
        $dtSelisih = $dtAkhir-$dtAwal; 
        $totalmenit=$dtSelisih/60; 
        $jam =explode(".",$totalmenit/60); 
        $sisamenit=($totalmenit/60)-$jam[0]; 
        $sisamenit2=round($sisamenit*60,0);
        $jml_jam=$jam[0]; 
        $jam2 = str_pad($jml_jam,2,"0",STR_PAD_LEFT); 
        $menit2 = str_pad($sisamenit2,2,"0",STR_PAD_LEFT); 
        return $jam2.":".$menit2; 
    }
    
    include 'koneksi.php';
    $nip= $_REQUEST['nipabsensih'];    
    $tgl_masuk = $_REQUEST['tgl_absenabsensih'];
    $jam_masuk = $_REQUEST['jam_masukabsensih'];
    $tgl_pulang = $_REQUEST['tgl_pulangabsensih'];
    $jam_pulang = $_REQUEST['jam_pulangabsensih'];
    $status = $_REQUEST['statusabsensih'];
    $nip_tanggal = $nip.".".$tgl_masuk.".".$status;
    
    if($tgl_pulang!="" && $jam_pulang!=""){
        if($tgl_pulang>$tgl_masuk){
            $jam_masuk1 = $jam_masuk.":00";
            $jam_pulang1 = "24:00:00";
            $jam_masuk2 = "00:00:00";
            $jam_pulang2 = $jam_pulang.":00";
            $durasi1 = selisih($jam_masuk1,$jam_pulang1);
            $durasi2 = selisih($jam_masuk2,$jam_pulang2);
            $data1 = explode(":",$durasi1);
            $jam1 = intval($data1[0]);
            $menit1 = intval($data1[1]);
            $data2 = explode(":",$durasi2);
            $jam2 = intval($data2[0]);
            $menit2 = intval($data2[1]);
            $total_jam = $jam1+$jam2;
            $total_menit = $menit1+$menit2;
            if($total_menit>=60){
                $tambahan_jam = floor($total_menit/60);
                $total_jam = $total_jam+$tambahan_jam;
                $sisa_menit = round($total_menit-($tambahan_jam*60));
            }
            $jam3 = str_pad($total_jam,2,"0",STR_PAD_LEFT); 
            $menit3 = str_pad($sisa_menit,2,"0",STR_PAD_LEFT); 
            $durasi = $jam3.":".$menit3;
        } else {
            $durasi = selisih($jam_masuk.":00",$jam_pulang.":00");
        }
    } else {
        $durasi = 0;
    }

    $rs2 = mysqli_query($koneksi,"SELECT kelompok,kd_region,kd_cabang,kd_unit,no_spk FROM data_pegawai where nip='$nip'");
    $hasil2 = mysqli_fetch_array($rs2);
    if($hasil2){
        $kelompok= $hasil2['kelompok'];
        $kd_region= $hasil2['kd_region'];
        $kd_cabang= $hasil2['kd_cabang'];
        $kd_unit= $hasil2['kd_unit'];
        $no_spk= $hasil2['no_spk'];
    } else {
        $kelompok= "";
        $kd_region= "";
        $kd_cabang= "";
        $kd_unit= "";
        $no_spk= "";
    }

    $sql = "insert into absensi(nip,kelompok,kd_region,kd_cabang,kd_unit,no_spk,tgl_absen,jam_masuk,tgl_pulang,jam_pulang,nip_tanggal,status,durasi)";
    $sql .= " values('$nip','$kelompok','$kd_region','$kd_cabang','$kd_unit','$no_spk','$tgl_masuk','$jam_masuk','$tgl_pulang','$jam_pulang','$nip_tanggal','$status','$durasi')";
    $result = @mysqli_query($koneksi,$sql);    
    if ($result){
        echo json_encode(array('nip' => $nip));
    } else {
        echo json_encode(array('errorMsg'=>'Gagal menyimpan data.'));
    }
}
?>