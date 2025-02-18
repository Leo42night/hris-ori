<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if ($userhris){
    function TanggalIndo2($date){
        if($date!="" && $date!=null){
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $result = $tgl . "." . $bulan . ".". $tahun;	
            return($result);
        } else {
            return("");
        }
    }

    include "koneksi.php";
    include "koneksi_sipeg.php";
    $tahuncari = isset($_POST['tahundatamutasi2cari']) ? $_POST['tahundatamutasi2cari'] : "2024";
    $blth_awalcari = $tahuncari."-01";
    $blth_akhircari = $tahuncari."-11";
    $blth_gaji = $tahuncari."-12";

    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $rs = mysqli_query($koneksi,"select count(distinct a.nip) from v_list_pajak a inner join data_pegawai b on a.nip=b.nip where a.blth>='$blth_awalcari' and a.blth<='$blth_akhircari' and b.aktif<>'1'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    // $result["total"] = 1;    
    
    $items = array();
    $rs = mysqli_query($koneksi,"select a.nip, min(a.blth) as blth_awal,max(a.blth) as blth_akhir from v_list_pajak a inner join data_pegawai b on a.nip=b.nip where a.blth>='$blth_awalcari' and a.blth<='$blth_akhircari' and b.aktif<>'1' group by a.nip order by blth_awal asc,blth_akhir asc,nip asc");
    while ($hasil = mysqli_fetch_array($rs)) {
    	$nip = stripslashes ($hasil['nip']);
    	$blth_awal = stripslashes ($hasil['blth_awal']);
    	$blth_akhir = stripslashes ($hasil['blth_akhir']);

        $rs1 = mysqli_query($koneksi,"select nama,jabatan from data_pegawai where nip='$nip'");
        $hasil1 = mysqli_fetch_array($rs1);
        if($hasil1){
            $nama = stripslashes ($hasil1['nama']);
            $jabatan = stripslashes ($hasil1['jabatan']);    
        } else {
            $nama = "";
            $jabatan = "";    
        }
        echo $blth_akhir;
        // if($blth_akhir<=$blth_akhircari && strpos($nip, "PRO") === false && strpos($nip, "HONOR") === false && $nama!=""){
        if(strpos($nip, "PRO") === false && strpos($nip, "HONOR") === false && $nama!=""){
            $rs2 = mysqli_query($koneksi,"select sum(brutot) as brutob,sum(brutot) as brutot,sum(nettot_akhir) as nettot_akhir,sum(pphb_terutang) as pphb_terutang from pph21masa where nip='$nip' and blth>='2024-01' and blth<='2024-11'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $brutob = floatval($hasil2['brutob']);
                $brutot = floatval($hasil2['brutot']);
                $nettot_akhir = floatval($hasil2['nettot_akhir']);
                $pphb_terutang = floatval($hasil2['pphb_terutang']);
                if($brutot==0){
                    $brutot = $brutob;
                }
                if($nettot_akhir==0){
                    if($brutot>0){
                        $nettot_akhir = $brutot;
                    } else {
                        $nettot_akhir = $brutob;
                    }
                }
            } else {
                $brutob = 0;
                $brutot = 0;
                $nettot_akhir = 0;
                $pphb_terutang = 0;
            }
        
            
            $datanya = array();
            $datanya["nipdatamutasi2"] = $nip;
            $datanya["namadatamutasi2"] = $nama;
            $datanya["jabatandatamutasi2"] = $jabatan;
            $datanya["blth_awaldatamutasi2"] = $blth_awal;
            $datanya["blth_akhirdatamutasi2"] = $blth_akhir;
            $datanya["brutotdatamutasi2"] = $brutot;
            $datanya["nettot_akhirdatamutasi2"] = $brutot;
            $datanya["pphb_terutangdatamutasi2"] = $pphb_terutang;
            array_push($items, $datanya);
        }
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>