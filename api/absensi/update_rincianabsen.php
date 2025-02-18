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
    
    $id= intval($_REQUEST['id']);
    $nip= $_REQUEST['niprincianabsen'];    
    $tgl_absen = $_REQUEST['tgl_absenrincianabsen'];
    $jam_masuk = $_REQUEST['jam_masukrincianabsen'];
    $jam_pulang = $_REQUEST['jam_pulangrincianabsen'];
    $status = "WFO";
    $nip_tanggal = $nip.".".$tgl_absen.".".$status;

    $rs = mysqli_query($koneksi,"select * from absensi where nip='$nip' and tgl_absen>='2024-01-01' and tgl_absen<>'$tgl_absen' and tgl_absen<>'' and lat_masuk<>'' and lon_masuk<>'' and jarak_masuk<=200 order by rand() limit 1");
    $hasil = mysqli_fetch_array($rs);
    if($hasil){
        $lat_masuk = stripslashes ($hasil['lat_masuk']);
        $lon_masuk = stripslashes ($hasil['lon_masuk']);
        $jarak_masuk = stripslashes ($hasil['jarak_masuk']);
        if($jarak_masuk>=1000){
            $jarak_masuk2 = number_format(($jarak_masuk/1000),2,',','.')." Km";
        } else {
            $jarak_masuk2 = number_format($jarak_masuk,0,',','.'). "Mtr";
        }
        $keterangan_masuk = "";
    } else {
        $lat_masuk = "";
        $lon_masuk = "";
        $jarak_masuk = 0;
        $jarak_masuk2 = "0 Mtr";
        $keterangan_masuk = "";
    }

    $rs = mysqli_query($koneksi,"select * from absensi where nip='$nip' and tgl_absen>='2024-01-01' and tgl_absen<>'$tgl_absen' and tgl_absen<>'' and lat_pulang<>'' and lon_pulang<>'' and jarak_pulang<=200 order by rand() limit 1");
    $hasil = mysqli_fetch_array($rs);
    if($hasil){
        $lat_pulang = stripslashes ($hasil['lat_pulang']);
        $lon_pulang = stripslashes ($hasil['lon_pulang']);
        $jarak_pulang = stripslashes ($hasil['jarak_pulang']);
        if($jarak_pulang>=1000){
            $jarak_pulang2 = number_format(($jarak_pulang/1000),2,',','.')." Km";
        } else {
            $jarak_pulang2 = number_format($jarak_pulang,0,',','.'). "Mtr";
        }
        $keterangan_pulang = "";
    } else {
        $lat_pulang = "";
        $lon_pulang = "";
        $jarak_pulang = 0;
        $jarak_pulang2 = "0 Mtr";
        $keterangan_pulang = "";
    }
    
    if($jam_masuk!="" && $jam_pulang!="" && $jam_pulang>=$jam_masuk){
        $durasi = selisih($jam_masuk.":00",$jam_pulang.":00");
    } else {
        $durasi = 0;
    }

    if($id==0){
        $sql = "insert into absensi(nip,tgl_absen,jam_masuk,lat_masuk,lon_masuk,jarak_masuk,jam_pulang,lat_pulang,lon_pulang,jarak_pulang,nip_tanggal,status,durasi)";
        $sql .= " values('$nip','$tgl_absen','$jam_masuk','$lat_masuk','$lon_masuk','$jarak_masuk','$jam_pulang','$lat_pulang','$lon_pulang','$jarak_pulang','$nip_tanggal','$status','$durasi')";
    } else {
        $sql = "update absensi set tgl_absen='$tgl_absen',jam_masuk='$jam_masuk',lat_masuk='$lat_masuk',lon_masuk='$lon_masuk',jarak_masuk='$jarak_masuk',jam_pulang='$jam_pulang',lat_pulang='$lat_pulang',lon_pulang='$lon_pulang',jarak_pulang='$jarak_pulang',status='$status',durasi='$durasi' where id=$id";
    }
    $result = @mysqli_query($koneksi,$sql);    
    if ($result){
        echo json_encode(array('nip' => $nip));
    } else {
        echo json_encode(array('errorMsg'=>'Gagal menyimpan data.'));
    }
}
?>