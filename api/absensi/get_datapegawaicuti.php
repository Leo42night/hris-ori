<?php
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

    include "koneksi.php"; 
    include "koneksi_sipeg.php"; 
    $nip2 = $_REQUEST['nip'];
    $id2 = $_REQUEST['id'];
    //$nip2 = "7719002PCN";
    //$id2 = 0;
    $today = date("Y-m-d");
    if($nip2!=""){
        $rs = mysqli_query($koneksi,"select a.nama_lengkap,a.tgl_tetap,b.aktif FROM hrisnew.data_pegawai a inner join organikplnt.setting_pegawai b on a.nip=b.nip WHERE b.aktif='1' and a.nip='$nip2'");
        $hasil = mysqli_fetch_array($rs);
        if($hasil){
            $nama = stripslashes ($hasil['nama_lengkap']);
            $tgl_tetap = $hasil['tgl_tetap'];
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
            $rs31 = mysqli_query($koneksi,"select sum(hari) as jumlah_cuti from cuti where nip='$nip2' and id<>'$id2' and tgl_awal>='$batas_awal' and tgl_akhir<='$batas_akhir'");
            $hasil31 = mysqli_fetch_array($rs31);
            if($hasil31){
                $jumlah_cuti = intval($hasil31['jumlah_cuti']);
            } else {
                $jumlah_cuti = 0;
            }
            $sisa_cuti = $hak_cuti-$jumlah_cuti;    
        } else {
            $nama = "";
            $batas_awal = "";
            $batas_akhir = "";
            $batas_awal2 = "";
            $batas_akhir2 = "";
            $hak_cuti = 0;        
            $jumlah_cuti = 0;
            $sisa_cuti = 0;    
        }
            
        echo json_encode(array(
            'nama' => $nama,
            'batas_awal' => $batas_awal,
            'batas_awal2' => $batas_awal2,
            'batas_akhir' => $batas_akhir,
            'batas_akhir2' => $batas_akhir2,
            'jumlah_cuti' => $jumlah_cuti,
            'sisa_cuti' => $sisa_cuti
        ));
    } else {
        echo json_encode(array());
    }
}
?>