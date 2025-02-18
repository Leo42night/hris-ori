<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    include 'koneksi_sipeg.php';
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    $tanggal = date("Y-m-d", strtotime("+1 hour"));
    $tahun = date("Y", strtotime("+1 hour"));

    // $idsppd = $_REQUEST['idsppd'];
    $idsppd = "2024000865";

    $rs32 = mysqli_query($koneksi,"select * from biaya_sppd1 where idsppd='$idsppd'");
    $hasil32 = mysqli_fetch_array($rs32);
    if($hasil32){
        $jumlah_biaya = 1;
    } else {
        $jumlah_biaya = 0;
    }


    $rs2 = mysqli_query($koneksi,"select * from sppd1 where idsppd='$idsppd'");
    $hasil2 = mysqli_fetch_array($rs2);
    $nip = stripslashes ($hasil2['nip']);
    $tingkat_sppd = stripslashes ($hasil2['tingkat_sppd']);
    $jenis_sppd = stripslashes ($hasil2['jenis_sppd']);
    $level_sppd = stripslashes ($hasil2['level_sppd']);
    $tgl_awal = stripslashes ($hasil2['tgl_awal']);
    $kedudukan = stripslashes ($hasil2['kedudukan']);
    $tujuan = stripslashes ($hasil2['tujuan']);
    $jarak = stripslashes ($hasil2['jarak']);
    $hari = stripslashes ($hasil2['hari']);
    $hari1 = $hari;
    $hari2 = $hari-1;
    $transportasi = stripslashes ($hasil2['transportasi']);
    $kota1a = stripslashes ($hasil2['kota1a']);
    $kota2a = stripslashes ($hasil2['kota2a']);
    $transporta = stripslashes ($hasil2['transporta']);
    $kota1b = stripslashes ($hasil2['kota1b']);
    $kota2b = stripslashes ($hasil2['kota2b']);
    $transportb = stripslashes ($hasil2['transportb']);
    $kota1c = stripslashes ($hasil2['kota1c']);
    $kota2c = stripslashes ($hasil2['kota2c']);
    $transportc = stripslashes ($hasil2['transportc']);
    $kota1d = stripslashes ($hasil2['kota1d']);
    $kota2d = stripslashes ($hasil2['kota2d']);
    $transportd = stripslashes ($hasil2['transportd']);

    $rs3 = mysqli_query($koneksi,"select status from data_pegawai where nip='$nip'");
    $hasil3 = mysqli_fetch_array($rs3);
    if($hasil3){
        $status = stripslashes ($hasil3['status']);
    } else {
        $status = "";
    }

    $suami_istri = 0;
    $anak = 0;
    $keluarga = 0;
    $pengantar = 0;
    $rs3 = mysqli_query($koneksi,"select * from pengikut_sppd where idsppd='$idsppd'");
    $hasil3 = mysqli_fetch_array($rs3);
    if($hasil3){
        $hubungan = stripslashes ($hasil3['hubungan']);
    } else {
        $hubungan = "";
    }
    if($jenis_sppd=="2"){
        if($hubungan=="keluarga"){
            $keluarga = $keluarga+1;
        } else if($hubungan=="pengantar"){
            $pengantar = $pengantar+1;
        }
    } else if($jenis_sppd=="3"){
        if($status!="TK0"){
        if($hubungan=="suami" || $hubungan=="istri"){
            $suami_istri = $suami_istri+1;
        } else if($hubungan=="anak"){
            $anak = $anak+1;
        }
        } else {
        $suami_istri = 0;
        $anak = 0;
        }
    } else {
        $keluarga = 0;
        $pengantar = 0;
        $suami_istri = 0;
        $anak = 0;
    }

    $transportasi_lokal = 0;
    $airport_tax = 0;
    $hari_konsumsi1 = 0;
    $persen_konsumsi1 = 0;
    $nilai_konsumsi1 = 0;
    $hari_laundry1 = 0;
    $persen_laundry1 = 0;
    $nilai_laundry1 = 0;
    $hari_penginapan1 = 0;
    $persen_penginapan1 = 0;
    $nilai_penginapan1 = 0;
    $hari_konsumsi2 = 0;
    $persen_konsumsi2 = 0;
    $nilai_konsumsi2 = 0;
    $hari_laundry2 = 0;
    $persen_laundry2 = 0;
    $nilai_laundry2 = 0;
    $hari_penginapan2 = 0;
    $persen_penginapan2 = 0;
    $nilai_penginapan2 = 0;
    $hari_pegawai = 0;
    $persen_pegawai = 0;
    $nilai_pegawai = 0;
    $hari_keluarga = 0;
    $persen_keluarga = 0;
    $nilai_keluarga = 0;
    $hari_pengantar = 0;
    $persen_pengantar = 0;
    $nilai_pengantar = 0;
    $hari_suamiistri = 0;
    $persen_suamiistri = 0;
    $nilai_suamiistri = 0;
    $hari_anak = 0;
    $persen_anak = 0;
    $nilai_anak = 0;
    $berat_pengepakan = 0;
    $nilai_pengepakan = 0;
    $kurs_ln = 0;
    $transporta_ln = 0;
    $transportb_ln = 0;
    $transportc_ln = 0;
    $transportd_ln = 0;
    $transportasi_lokal_ln = 0;
    $airport_tax_ln = 0;
    $hari_lumpsum = 0;
    $nilai_lumpsum = 0;
    $hari_pegawai_ln = 0;
    $persen_pegawai_ln = 0;
    $nilai_pegawai_ln = 0;
    $hari_keluarga_ln = 0;
    $persen_keluarga_ln = 0;
    $nilai_keluarga_ln = 0;
    $hari_pengantar_ln = 0;
    $persen_pengantar_ln = 0;
    $nilai_pengantar_ln = 0;
    $baju_hangat_ln = 0;
    $total = 0;
    $cuci_pakaian = 0; 
    $nilai_variable = 0;

    //$rs4 = mysqli_query($koneksi,"select * from master_biaya_sppd where level_sppd='$level_sppd'");
    $rs4 = mysqli_query($koneksi,"select * from master_biaya_sppd where batas_awal<='$tgl_awal' and batas_akhir>='$tgl_awal' and level_sppd='$level_sppd'");
    $hasil4 = mysqli_fetch_array($rs4);
    if($hasil4){
        $nilai_transportasi_lokal = floatval($hasil4['transportasi_lokal']);
        $nilai_konsumsi = floatval($hasil4['konsumsi']);
        $nilai_cuci_pakaian = floatval($hasil4['cuci_pakaian']);
        $nilai_penginapan = floatval($hasil4['penginapan']);
    } else {
        $nilai_transportasi_lokal = 0;
        $nilai_konsumsi = 0;
        $nilai_cuci_pakaian = 0;
        $nilai_penginapan = 0;

    }
    // $cuci_pakaian = $cuci_pakaian+floatval($hasil4['cuci_pakaian']);
    // $transportasi_lokal = $transportasi_lokal+floatval($hasil4['transportasi_lokal']);
    // if($jenis_sppd=="1"){
    //     $hari_konsumsi1 = $hari1;
    //     $persen_konsumsi1 = 100;
    //     $nilai_konsumsi1 = $nilai_konsumsi1+floatval($hasil4['konsumsi']);
    //     $hari_laundry1 = $hari2;
    //     $persen_laundry1 = 100;
    //     $nilai_laundry1 = $nilai_laundry1+floatval($hasil4['cuci_pakaian']);
    //     $hari_penginapan1 = $hari2;
    //     $persen_penginapan1 = 100;                
    //     $nilai_penginapan1 = $nilai_penginapan1+floatval($hasil4['penginapan']);
    //     $nilai_variable = 0;
    // } else if($jenis_sppd=="2"){
    //     $hari_pegawai = $hari1;
    //     $persen_pegawai = 100;
    //     $nilai_pegawai = $nilai_pegawai+floatval($hasil4['konsumsi']);
    //     $hari_keluarga = $hari1;
    //     $persen_keluarga = 100;
    //     $nilai_keluarga = $nilai_keluarga+floatval($hasil4['konsumsi']);
    //     $hari_pengantar = $hari1;
    //     $persen_pengantar = 100;
    //     $nilai_pengantar = $nilai_pengantar+floatval($hasil4['konsumsi']);
    //     $nilai_variable = 0;
    // } else if($jenis_sppd=="3"){
    //     $hari_konsumsi1 = $hari1;
    //     $persen_konsumsi1 = 100;
    //     $nilai_konsumsi1 = $nilai_konsumsi1+floatval($hasil4['konsumsi']);
    //     $hari_laundry1 = $hari2;
    //     $persen_laundry1 = 100;
    //     $nilai_laundry1 = $nilai_laundry1+floatval($hasil4['cuci_pakaian']);
    //     $hari_penginapan1 = $hari2;
    //     $persen_penginapan1 = 100;
    //     $nilai_penginapan1 = $nilai_penginapan1+floatval($hasil4['penginapan']);
    //     $nilai_variable = round($cuci_pakaian+$nilai_konsumsi1);
    //     $hari_suamiistri = $hari1;
    //     $persen_suamiistri = 75;
    //     $nilai_suamiistri = $nilai_suamiistri+$nilai_variable;
    //     $hari_anak = $hari1;
    //     $persen_anak = 50;
    //     $nilai_anak = $nilai_anak+$nilai_variable;
    // }

    // if($hari>0){
    //     $rs1 = mysqli_query($koneksi,"select biaya from master_biaya_transportasi where kota_asal='$kedudukan' and kota_tujuan='$tujuan' and jenis_transportasi='$transportasi'");
    //     $hasil1 = mysqli_fetch_array($rs1);
    //     if($hasil1){
    //         $biaya_transportasi = floatval($hasil1['biaya']);
    //     } else {
    //         $biaya_transportasi = 0;
    //     }
    // } else {
    //     $biaya_transportasi = 0;
    // }
    // if($jenis_sppd=="3"){
    //     $rs8 = mysqli_query($koneksi,"select * from master_bantuan_mutasi where status='$status' and jarak_awal<='$jarak' and jarak_akhir>='$jarak'");
    //     $hasil8 = mysqli_fetch_array($rs8);
    //     if($hasil8){
    //         $level1 = floatval($hasil8['level1']); 
    //         $level2 = floatval($hasil8['level2']); 
    //         $level3 = floatval($hasil8['level3']); 
    //         $level4 = floatval($hasil8['level4']); 
    //         $level5 = floatval($hasil8['level5']); 
    //         $level6 = floatval($hasil8['level6']); 
    //         $level7 = floatval($hasil8['level7']); 
    //     } else {
    //         $level1 = 0;
    //         $level2 = 0;
    //         $level3 = 0;
    //         $level4 = 0;
    //         $level5 = 0;
    //         $level6 = 0;
    //         $level7 = 0;
    //     }
    // } else {
    //     $level1 = 0;
    //     $level2 = 0;
    //     $level3 = 0;
    //     $level4 = 0;
    //     $level5 = 0;
    //     $level6 = 0;
    //     $level7 = 0;
    //  }
    // if($level_sppd==1){
    //     $total_pengepakan = $level1;
    // } else if($level_sppd==2){
    //     $total_pengepakan = $level2;
    // } else if($level_sppd==3){
    //     $total_pengepakan = $level3;
    // } else if($level_sppd==4){
    //     $total_pengepakan = $level4;
    // } else if($level_sppd==5){
    //     $total_pengepakan = $level5;
    // } else if($level_sppd==6){
    //     $total_pengepakan = $level6;
    // } else if($level_sppd==7){
    //     $total_pengepakan = $level7;
    // } else {
    //     $total_pengepakan = 0;
    // }

    // $total_transport = $biaya_transportasi;
    // $total_konsumsi1 = round($hari_konsumsi1*($persen_konsumsi1/100)*$nilai_konsumsi1,0);
    // $total_laundry1 = round($hari_laundry1*($persen_laundry1/100)*$nilai_laundry1,0);
    // $total_penginapan1 = round($hari_penginapan1*($persen_penginapan1/100)*$nilai_penginapan1,0);
    // $total_konsumsi2 = round($hari_konsumsi2*($persen_konsumsi2/100)*$nilai_konsumsi2,0);
    // $total_laundry2 = round($hari_laundry2*($persen_laundry2/100)*$nilai_laundry2,0);
    // $total_penginapan2 = round($hari_penginapan2*($persen_penginapan2/100)*$nilai_penginapan2,0);
    // $total_pegawai = round($hari_pegawai*($persen_pegawai/100)*$nilai_pegawai,0);
    // $total_keluarga = round($hari_keluarga*($persen_keluarga/100)*$nilai_keluarga,0);
    // $total_keluarga = round($keluarga*$hari_keluarga*($persen_keluarga/100)*$nilai_keluarga,0);
    // $total_pengantar = round($pengantar*$hari_pengantar*($persen_pengantar/100)*$nilai_pengantar,0);
    // $total_suamiistri = round($suami_istri*$hari_suamiistri*($persen_suamiistri/100)*$nilai_suamiistri,0);
    // $total_anak = round($anak*$hari_anak*($persen_anak/100)*$nilai_anak,0);
    // $total = $total_transport+$transportasi_lokal+$total_konsumsi1+$total_laundry1+$total_penginapan1+$total_konsumsi2+$total_laundry2+$total_penginapan2;   
    // $total = $total+$total_pegawai+$total_keluarga+$total_pengantar+$total_suamiistri+$total_anak+$total_pengepakan;
    
    // if($jumlah_biaya==1){
    //     $sql = "update biaya_sppd1 set ";
    //     $sql .= "transportasi='$biaya_transportasi',total_transport='$total_transport',transportasi_lokal='$transportasi_lokal',airport_tax='$airport_tax',hari_konsumsi1='$hari_konsumsi1',persen_konsumsi1='$persen_konsumsi1',";
    //     $sql .= "nilai_konsumsi1='$nilai_konsumsi1',total_konsumsi1='$total_konsumsi1',hari_laundry1='$hari_laundry1',persen_laundry1='$persen_laundry1',";
    //     $sql .= "nilai_laundry1='$nilai_laundry1',total_laundry1='$total_laundry1',hari_penginapan1='$hari_penginapan1',persen_penginapan1='$persen_penginapan1',";
    //     $sql .= "nilai_penginapan1='$nilai_penginapan1',total_penginapan1='$total_penginapan1',hari_konsumsi2='$hari_konsumsi2',persen_konsumsi2='$persen_konsumsi2',";
    //     $sql .= "nilai_konsumsi2='$nilai_konsumsi2',total_konsumsi2='$total_konsumsi2',hari_laundry2='$hari_laundry2',persen_laundry2='$persen_laundry2',";
    //     $sql .= "nilai_laundry2='$nilai_laundry2',total_laundry2='$total_laundry2',hari_penginapan2='$hari_penginapan2',persen_penginapan2='$persen_penginapan2',";
    //     $sql .= "nilai_penginapan2='$nilai_penginapan2',total_penginapan2='$total_penginapan2',hari_pegawai='$hari_pegawai',persen_pegawai='$persen_pegawai',";
    //     $sql .= "nilai_pegawai='$nilai_pegawai',total_pegawai='$total_pegawai',hari_keluarga='$hari_keluarga',persen_keluarga='$persen_keluarga',";
    //     $sql .= "nilai_keluarga='$nilai_keluarga',total_keluarga='$total_keluarga',hari_pengantar='$hari_pengantar',persen_pengantar='$persen_pengantar',";
    //     $sql .= "nilai_pengantar='$nilai_pengantar',total_pengantar='$total_pengantar',hari_suamiistri='$hari_suamiistri',persen_suamiistri='$persen_suamiistri',";
    //     $sql .= "nilai_suamiistri='$nilai_suamiistri',total_suamiistri='$total_suamiistri',hari_anak='$hari_anak',persen_anak='$persen_anak',";
    //     $sql .= "nilai_anak='$nilai_anak',total_anak='$total_anak',berat_pengepakan='0',nilai_pengepakan='0',total_pengepakan='$total_pengepakan',";
    //     $sql .= "kurs_ln='0',transporta_ln='0',transportb_ln='0',transportc_ln='0',transportd_ln='0',transportasi_lokal_ln='0',airport_tax_ln='0',hari_lumpsum='0',";
    //     $sql .= "nilai_lumpsum='0',hari_pegawai_ln='0',persen_pegawai_ln='0',nilai_pegawai_ln='0',hari_keluarga_ln='0',persen_keluarga_ln='0',";
    //     $sql .= "nilai_keluarga_ln='0',hari_pengantar_ln='0',persen_pengantar_ln='0',nilai_pengantar_ln='0',baju_hangat_ln='0',total='$total'";
    //     $sql .= " where idsppd='$idsppd'";
    // } else {
    //     $sql = "insert into biaya_sppd1";
    //     $sql .= "(idsppd,transportasi,total_transport,transportasi_lokal,airport_tax,hari_konsumsi1,persen_konsumsi1,";
    //     $sql .= "nilai_konsumsi1,total_konsumsi1,hari_laundry1,persen_laundry1,";
    //     $sql .= "nilai_laundry1,total_laundry1,hari_penginapan1,persen_penginapan1,";
    //     $sql .= "nilai_penginapan1,total_penginapan1,hari_konsumsi2,persen_konsumsi2,";
    //     $sql .= "nilai_konsumsi2,total_konsumsi2,hari_laundry2,persen_laundry2,";
    //     $sql .= "nilai_laundry2,total_laundry2,hari_penginapan2,persen_penginapan2,";
    //     $sql .= "nilai_penginapan2,total_penginapan2,hari_pegawai,persen_pegawai,";
    //     $sql .= "nilai_pegawai,total_pegawai,hari_keluarga,persen_keluarga,";
    //     $sql .= "nilai_keluarga,total_keluarga,hari_pengantar,persen_pengantar,";
    //     $sql .= "nilai_pengantar,total_pengantar,hari_suamiistri,persen_suamiistri,";
    //     $sql .= "nilai_suamiistri,total_suamiistri,hari_anak,persen_anak,";
    //     $sql .= "nilai_anak,total_anak,berat_pengepakan,nilai_pengepakan,total_pengepakan,total)";
    //     $sql .= " values('$idsppd','$biaya_transportasi','$total_transport','$transportasi_lokal','$airport_tax','$hari_konsumsi1','$persen_konsumsi1',";
    //     $sql .= "'$nilai_konsumsi1','$total_konsumsi1','$hari_laundry1','$persen_laundry1',";
    //     $sql .= "'$nilai_laundry1','$total_laundry1','$hari_penginapan1','$persen_penginapan1',";
    //     $sql .= "'$nilai_penginapan1','$total_penginapan1','$hari_konsumsi2','$persen_konsumsi2',";
    //     $sql .= "'$nilai_konsumsi2','$total_konsumsi2','$hari_laundry2','$persen_laundry2',";
    //     $sql .= "'$nilai_laundry2','$total_laundry2','$hari_penginapan2','$persen_penginapan2',";
    //     $sql .= "'$nilai_penginapan2','$total_penginapan2','$hari_pegawai','$persen_pegawai',";
    //     $sql .= "'$nilai_pegawai','$total_pegawai','$hari_keluarga','$persen_keluarga',";
    //     $sql .= "'$nilai_keluarga','$total_keluarga','$hari_pengantar','$persen_pengantar',";
    //     $sql .= "'$nilai_pengantar','$total_pengantar','$hari_suamiistri','$persen_suamiistri',";
    //     $sql .= "'$nilai_suamiistri','$total_suamiistri','$hari_anak','$persen_anak',";
    //     $sql .= "'$nilai_anak','$total_anak','0','0','$total_pengepakan','$total')";
    // }
    // $result = @mysqli_query($koneksi,$sql);
    // if ($result){
    //     echo json_encode(array('success'=>true));
    // } else {
    // 	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    // }
    
    echo $jumlah_biaya." ".$nilai_transportasi_lokal;  
}    
?>