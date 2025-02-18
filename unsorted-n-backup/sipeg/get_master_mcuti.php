<?php
//error_reporting(0);
session_start();
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

    function hitBulan($lahir) {
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
            $bulannya = $ubulan;
            return $bulannya;
        } else {
            return 0;
        }
    }

    include "koneksi.php";
    include "koneksi_sipeg.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $today = date("Y-m-d");

    $blth_ini = date("Y-m");    
    $nip2 = isset($_POST['nipmcuticari']) ? $_POST['nipmcuticari'] : "";
    $perintah = "";
    if($nip2!=""){
        $perintah .= " and (nip='$nip2' or nama like '%$nip2%')";
    }
    
    $offset = ($page-1)*$rows;
    $result = array();
    $rs = mysqli_query($koneksi,"select count(*) from data_pegawai where aktif='1'".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    


    $items = array();
    $no=1;
    $rs2 = mysqli_query($koneksi,"select * from data_pegawai where aktif='1'".$perintah." order by id asc limit $offset,$rows");
    while ($hasil2 = mysqli_fetch_array($rs2)) {
        $nip = $hasil2['nip'];
    	$nama = $hasil2['nama'];
        $jabatan = $hasil2['jabatan'];
        $tgl_tetap = $hasil2['tgl_pegawai'];
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
        $batas_awal2 = TanggalIndo2($batas_awal);
        $batas_akhir2 = TanggalIndo2($batas_akhir);

        $hak_cuti = 12;        
        $rs31 = mysqli_query($koneksi,"select sum(hari) as jumlah_cuti from cuti where nip='$nip' and jenis_cuti='01' and tgl_awal>='$batas_awal' and tgl_akhir<='$batas_akhir'");
        $hasil31 = mysqli_fetch_array($rs31);
        if($hasil31){
            $jumlah_cuti = intval($hasil31['jumlah_cuti']);
        } else {
            $jumlah_cuti = 0;
        }
        $sisa_cuti = $hak_cuti-$jumlah_cuti;    
        
    
        $datanya = array();
        //$datanya["idmcuti"] = $id;
        $datanya["nipmcuti"] = $nip;
        $datanya["namamcuti"] = $nama;
        $datanya["jabatanmcuti"] = $jabatan;
        $datanya["batas_awalmcuti"] = $batas_awal;
        $datanya["batas_awal2mcuti"] = $batas_awal2;
        $datanya["batas_akhirmcuti"] = $batas_akhir;
        $datanya["batas_akhir2mcuti"] = $batas_akhir2;
        $datanya["hak_cutimcuti"] = $hak_cuti;
        $datanya["jumlah_cutimcuti"] = $jumlah_cuti;
        $datanya["sisa_cutimcuti"] = $sisa_cuti;
        array_push($items, $datanya);
        $no=$no+1;
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>