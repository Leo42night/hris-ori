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
    $id= intval($_REQUEST['id']);
    $nip= $_REQUEST['nipabsensih'];    
    $tgl_masuk = $_REQUEST['tgl_absenabsensih'];
    $jam_masuk = $_REQUEST['jam_masukabsensih'];
    $lat_masuk = $_REQUEST['lat_masukabsensih'];
    $lon_masuk = $_REQUEST['lon_masukabsensih'];
    $jam_pulang = $_REQUEST['jam_pulangabsensih'];
    $lat_pulang = $_REQUEST['lat_pulangabsensih'];
    $lon_pulang = $_REQUEST['lon_pulangabsensih'];
    $status = $_REQUEST['statusabsensih'];
    $nip_tanggal = $nip.".".$tgl_masuk.".".$status;
    
    if($jam_masuk!="" && $jam_pulang!="" && $jam_pulang>=$jam_masuk){
        $durasi = selisih($jam_masuk.":00",$jam_pulang.":00");
    } else {
        $durasi = 0;
    }

    if($id==0){
        // $sql = "insert into absensi(nip,tgl_absen,lat_masuk,lon_masuk,jarak_masuk,jam_pulang,lat_pulang,lon_pulang,jarak_pulang,nip_tanggal,status,durasi)";
        // $sql .= " values('$nip','$tgl_masuk','$jam_masuk','$lat_masuk','$lon_masuk','$jarak_masuk','$jam_pulang','$lat_pulang','$lon_pulang','$jarak_pulang','$nip_tanggal','$status','$durasi')";
        $sql = "insert into absensi(nip,tgl_absen,lat_masuk,lon_masuk,jam_pulang,lat_pulang,lon_pulang,nip_tanggal,durasi)";
        $sql .= " values('$nip','$tgl_masuk','$jam_masuk','$lat_masuk','$lon_masuk','$jam_pulang','$lat_pulang','$lon_pulang','$nip_tanggal','$durasi')";
    } else {
        $sql = "update absensi set tgl_absen='$tgl_masuk',jam_masuk='$jam_masuk',lat_masuk='$lat_masuk',lon_masuk='$lon_masuk',jam_pulang='$jam_pulang',lat_pulang='$lat_pulang',lon_pulang='$lon_pulang',durasi='$durasi' where id=$id";
    }
    $result = @mysqli_query($koneksi,$sql);    
    if ($result){
        echo json_encode(array('nip' => $nip));
    } else {
        echo json_encode(array('errorMsg'=>'Gagal menyimpan data.'));
    }
}
?>