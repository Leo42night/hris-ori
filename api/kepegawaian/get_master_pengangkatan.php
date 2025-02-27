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

    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $nama2 = isset($_POST['namapengangkatancari']) ? $_POST['namapengangkatancari'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $perintah = "";
    if($nama2!=""){
        $perintah .= " where (a.nip='$nama2' or b.nama like '%$nama2%')";
    }
    
    $rs = mysqli_query($koneksi,"select count(a.id) from r_pengangkatan a left join data_pegawai b on a.nip=b.nip".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select a.*,b.nama as nama from r_pengangkatan a left join data_pegawai b on a.nip=b.nip".$perintah." order by a.id asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
        $nama = stripslashes ($hasil['nama']);
        $tgl_lahir = stripslashes ($hasil['tgl_lahir']);
        $tgl_lahir2 = TanggalIndo2($tgl_lahir);
    	$tgl_masuk = strtoupper(stripslashes ($hasil['tgl_masuk']));
        $tgl_masuk2 = TanggalIndo2($tgl_masuk);
    	$tgl_capeg = stripslashes ($hasil['tgl_capeg']);
        $tgl_capeg2 = TanggalIndo2($tgl_capeg);
        $tgl_tetap = stripslashes ($hasil['tgl_tetap']);
        $tgl_tetap2 = TanggalIndo2($tgl_tetap);
        $agama = stripslashes ($hasil['agama']);
            $rs2 = mysqli_query($koneksi,"select label from m_agama where id_agama='$agama'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $agama2 = stripslashes ($hasil2['label']);
            } else {
                $agama2 = "";
            }
        $jenis_kelamin = stripslashes ($hasil['jenis_kelamin']);
            $rs2 = mysqli_query($koneksi,"select label from m_jenis_kelamin where kode='$jenis_kelamin'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_kelamin2 = stripslashes ($hasil2['label']);
            } else {
                $jenis_kelamin2 = "";
            }
        $person_grade = stripslashes ($hasil['person_grade']);
            $rs2 = mysqli_query($koneksi,"select label from m_grade where kode_grade='$person_grade'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $person_grade2 = stripslashes ($hasil2['label']);
            } else {
                $person_grade2 = "";
            }
        $nik = stripslashes ($hasil['nik']);
    	$npwp = stripslashes ($hasil['npwp']);
    	$keterangan_mutasi = stripslashes ($hasil['keterangan_mutasi']);
            $rs2 = mysqli_query($koneksi,"select * from m_keterangan_mutasi where kode='$keterangan_mutasi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $keterangan_mutasi2 = stripslashes ($hasil2['name']);
            } else {
                $keterangan_mutasi2 = "";
            }
        $tahun_pengangkatan = stripslashes ($hasil['tahun_pengangkatan']);
        
        $datanya = array();
        $datanya["idpengangkatan"] = $id;
        $datanya["nippengangkatan"] = $nip;
        $datanya["namapengangkatan"] = $nama;
        $datanya["person_gradepengangkatan"] = $person_grade;
        $datanya["person_grade2pengangkatan"] = $person_grade2;
        $datanya["agamapengangkatan"] = $agama;
        $datanya["agama2pengangkatan"] = $agama2;
        $datanya["jenis_kelaminpengangkatan"] = $jenis_kelamin;
        $datanya["jenis_kelamin2pengangkatan"] = $jenis_kelamin2;
        $datanya["nikpengangkatan"] = $nik;
        $datanya["npwppengangkatan"] = $npwp;
        $datanya["tgl_lahirpengangkatan"] = $tgl_lahir;
        $datanya["tgl_lahir2pengangkatan"] = $tgl_lahir2;
        $datanya["tgl_masukpengangkatan"] = $tgl_masuk;
        $datanya["tgl_masuk2pengangkatan"] = $tgl_masuk2;
        $datanya["tgl_capegpengangkatan"] = $tgl_capeg;
        $datanya["tgl_capeg2pengangkatan"] = $tgl_capeg2;
        $datanya["tgl_tetappengangkatan"] = $tgl_tetap;
        $datanya["tgl_tetap2pengangkatan"] = $tgl_tetap2;
        $datanya["keterangan_mutasipengangkatan"] = $keterangan_mutasi;
        $datanya["keterangan_mutasi2pengangkatan"] = $keterangan_mutasi2;
        $datanya["tahun_pengangkatanpengangkatan"] = $tahun_pengangkatan;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>