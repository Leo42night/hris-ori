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

    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $blth_ini = date("Y-m"); 
    $today = date("Y-m-d");
    $nip2 = isset($_POST['niprcuticari']) ? $_POST['niprcuticari'] : "ulil";
    $perintah = "";
    if($nip2!=""){
        $perintah .= " and (b.nip='$nip2' or b.nama like '%$nip2%')";
    }
    
    $offset = ($page-1)*$rows;
    $result = array();
    $rs = mysqli_query($koneksi,"select count(*) from cuti a inner join data_pegawai b on a.nip=b.nip where b.aktif='1'".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    


    $items = array();
    $no=1;
    $rs2 = mysqli_query($koneksi,"select a.*,b.nama,b.aktif from cuti a inner join data_pegawai b on a.nip=b.nip where b.aktif='1'".$perintah." order by a.tgl_awal desc limit $offset,$rows");
    while ($hasil2 = mysqli_fetch_array($rs2)) {
    	$id = $hasil2['id'];
        $nip = $hasil2['nip'];
    	$nama = $hasil2['nama'];
        $jenis_cuti = $hasil2['jenis_cuti'];
            // $rs4 = mysqli_query($koneksi,"select nama_cuti from jenis_cuti where kd_cuti='$jenis_cuti'");
            // $hasil4 = mysqli_fetch_array($rs4);
            // if($hasil4){
            //     $nama_cuti = $hasil4['nama_cuti'];
            // } else {
            //     $nama_cuti = "";
            // }
        $tgl_pengajuan = $hasil2['tgl_pengajuan'];
        $tgl_pengajuan2 = TanggalIndo2($tgl_pengajuan);
        $tgl_awal = $hasil2['tgl_awal'];
        $tgl_awal2 = TanggalIndo2($tgl_awal);
        $tgl_akhir = $hasil2['tgl_akhir'];
        $tgl_akhir2 = TanggalIndo2($tgl_akhir);
        $hari = $hasil2['hari'];
        $keperluan_cuti = $hasil2['keperluan_cuti'];
        $alamat = $hasil2['alamat'];
        $telepon = $hasil2['telepon'];

        $rs3 = mysqli_query($koneksi,"select * from data_pegawai where nip='$nip'");
        $hasil3 = mysqli_fetch_array($rs3);
        if($hasil3){
            $tgl_tetap = stripslashesx($hasil3['tgl_pegawai']);
        } else {
            $tgl_tetap = "";
        }
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
        $rs31 = mysqli_query($koneksi,"select sum(hari) as jumlah_cuti from cuti where nip='$nip' and tgl_awal>='$batas_awal' and tgl_akhir<='$batas_akhir'");
        $hasil31 = mysqli_fetch_array($rs31);
        if($hasil31){
            $jumlah_cuti = intval($hasil31['jumlah_cuti']);
        } else {
            $jumlah_cuti = 0;
        }
        $sisa_cuti = $hak_cuti-$jumlah_cuti;    
    
        $approve1 = $hasil2['approve1'];
        $tgl_approve1 = $hasil2['tgl_approve1'];
        $tgl_approve12 = TanggalIndo2($tgl_approve1);
        $approval1 = $hasil2['approval1'];
        $alasan_reject1 = $hasil2['alasan_reject1'];
        if($approval1!=""){
            $rs31 = mysqli_query($koneksi,"select nama_lengkap from data_pegawai where nip='$approval1'");
            $hasil31 = mysqli_fetch_array($rs31);
            if($hasil31){
                $nama_approval1 = $hasil31['nama_lengkap'];
            } else {
                $nama_approval1 = "";
            }
        } else {
            $nama_approval1 = "";
        }
    
        $approve2 = $hasil2['approve2'];
        $tgl_approve2 = $hasil2['tgl_approve2'];
        $tgl_approve22 = TanggalIndo2($tgl_approve2);
        $approval2 = $hasil2['approval2'];
        $alasan_reject2 = $hasil2['alasan_reject2'];
        if($approval2!=""){
            $rs32 = mysqli_query($koneksi,"select nama_lengkap from data_pegawai where nip='$approval2'");
            $hasil32 = mysqli_fetch_array($rs32);
            if($hasil32){
                $nama_approval2 = $hasil32['nama_lengkap'];
            } else {
                $nama_approval2 = "";
            }
        } else {
            $nama_approval2 = "";
        }
    
        $datanya = array();
        $datanya["idrcuti"] = $id;
        $datanya["tgl_pengajuanrcuti"] = $tgl_pengajuan;
        $datanya["tgl_pengajuan2rcuti"] = $tgl_pengajuan2;
        $datanya["niprcuti"] = $nip;
        $datanya["namarcuti"] = $nama;
        $datanya["jenis_cutircuti"] = $jenis_cuti;
        // $datanya["nama_cutircuti"] = $nama_cuti;
        $datanya["tgl_awalrcuti"] = $tgl_awal;
        $datanya["tgl_awal2rcuti"] = $tgl_awal2;
        $datanya["tgl_akhirrcuti"] = $tgl_akhir;
        $datanya["tgl_akhir2rcuti"] = $tgl_akhir2;
        $datanya["harircuti"] = $hari;
        $datanya["keperluan_cutircuti"] = $keperluan_cuti;
        $datanya["alamatrcuti"] = $alamat;
        $datanya["teleponrcuti"] = $telepon;
    
        $datanya["approve1rcuti"] = $approve1;
        $datanya["tgl_approve1rcuti"] = $tgl_approve1;
        $datanya["tgl_approve12rcuti"] = $tgl_approve12;
        $datanya["approval1rcuti"] = $approval1;
        $datanya["alasan_reject1rcuti"] = $alasan_reject1;
        $datanya["nama_approval1rcuti"] = $nama_approval1;
    
        $datanya["approve2rcuti"] = $approve2;
        $datanya["tgl_approve2rcuti"] = $tgl_approve2;
        $datanya["tgl_approve22rcuti"] = $tgl_approve22;
        $datanya["approval2rcuti"] = $approval2;
        $datanya["alasan_reject2rcuti"] = $alasan_reject2;
        $datanya["nama_approval2rcuti"] = $nama_approval2;


        $datanya["batas_awalrcuti"] = $batas_awal;
        $datanya["batas_awal2rcuti"] = $batas_awal2;
        $datanya["batas_akhirrcuti"] = $batas_akhir;
        $datanya["batas_akhir2rcuti"] = $batas_akhir2;

        array_push($items, $datanya);
        $no=$no+1;
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>