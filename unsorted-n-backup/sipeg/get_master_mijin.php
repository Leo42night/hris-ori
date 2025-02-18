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

require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $today = date("Y-m-d");

    $blth_ini = date("Y-m");    
    $tgl_awal2 = isset($_POST['tgl_awalmijincari']) ? $_POST['tgl_awalmijincari'] : date("Y-m-01");
    $tgl_akhir2 = isset($_POST['tgl_akhirmijincari']) ? $_POST['tgl_akhirmijincari'] : date("Y-m-d");
    $nip2 = isset($_POST['nipmijincari']) ? $_POST['nipmijincari'] : "";
    $tgl_awalnya = TanggalIndo2($tgl_awal2);
    $tgl_akhirnya = TanggalIndo2($tgl_akhir2);

    $perintah = "";
    if($nip2!=""){
        $perintah .= " and (a.nip='$nip2' or b.nama like '%$nip2%')";
    }
    
    $offset = ($page-1)*$rows;
    $result = array();
    $rs = mysqli_query($koneksi,"select a.nip from ijin a inner join data_pegawai b on a.nip=b.nip where (a.tgl_awal>='$tgl_awal2' or a.tgl_awal<='$tgl_akhir2') and (a.tgl_akhir>='$tgl_awal2' or a.tgl_akhir<='$tgl_akhir2') and b.aktif='1'".$perintah." group by a.nip");
    //$row = mysqli_fetch_row($rs);
    //$result["total"] = $row[0];    
    $result["total"] = mysqli_num_rows($rs);


    $items = array();
    $no=1;
    $rs2 = mysqli_query($koneksi,"select a.nip,b.nama,b.jabatan from ijin a inner join data_pegawai b on a.nip=b.nip where (a.tgl_awal>='$tgl_awal2' or a.tgl_awal<='$tgl_akhir2') and (a.tgl_akhir>='$tgl_awal2' or a.tgl_akhir<='$tgl_akhir2') and b.aktif='1'".$perintah." group by a.nip order by a.nip asc limit $offset,$rows");
    while ($hasil2 = mysqli_fetch_array($rs2)) {
        $nip = $hasil2['nip'];
    	$nama = $hasil2['nama'];
        $jabatan = $hasil2['jabatan'];
        
        $jumlah_pengajuan = 0;
        $jumlah_realisasi = 0;
        $rs3 = mysqli_query($koneksi,"select * from ijin where nip='$nip' and (tgl_awal>='$tgl_awal2' or tgl_awal<='$tgl_akhir2') and (tgl_akhir>='$tgl_awal2' or tgl_akhir<='$tgl_akhir2')");
        while($hasil3 = mysqli_fetch_array($rs3)){
            $approve1 = intval($hasil3['approve1']);
            if($approve1==2)   {
                $jumlah_realisasi++;
            } else {
                $jumlah_pengajuan++;
            }
        }
        $jumlah_total = $jumlah_pengajuan+$jumlah_realisasi;        
    
        $datanya = array();
        //$datanya["idmijin"] = $id;
        $datanya["nipmijin"] = $nip;
        $datanya["namamijin"] = $nama;
        $datanya["jabatanmijin"] = $jabatan;
        
        $datanya["tgl_awalnyamijin"] = $tgl_awalnya;
        $datanya["tgl_akhirnyamijin"] = $tgl_akhirnya;
        $datanya["jumlah_pengajuanmijin"] = $jumlah_pengajuan;
        $datanya["jumlah_realisasimijin"] = $jumlah_realisasi;
        $datanya["jumlah_totalmijin"] = $jumlah_total;
        
        array_push($items, $datanya);
        $no=$no+1;
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>