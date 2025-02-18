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
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $nip2 = isset($_REQUEST['nip']) ? $_REQUEST['nip'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $rs = mysqli_query($koneksi,"select count(*) from r_keluarga where nip='$nip2'");
    //$rs = mysqli_query($koneksi,"select count(*) from r_keluarga where nip='6890008S'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from r_keluarga where nip='$nip2' order by no_urut asc limit $offset,$rows");
    //$rs = mysqli_query($koneksi,"select * from r_keluarga where nip='6890008S' order by no_urut asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$start_date = stripslashes ($hasil['start_date']);
        $start_date2 = TanggalIndo2($start_date);
    	$end_date = stripslashes ($hasil['end_date']);
        $end_date2 = TanggalIndo2($end_date);
    	$id_jenis_keluarga = stripslashes ($hasil['id_jenis_keluarga']);
            $rs2 = mysqli_query($koneksi,"select label from m_jenis_keluarga where id_jenis_keluarga='$id_jenis_keluarga'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_keluarga = stripslashes ($hasil2['label']);
            } else {
                $jenis_keluarga = "";
            }
    	$no_urut = stripslashes ($hasil['no_urut']);
        $nama = stripslashes ($hasil['nama']);
        $jenis_kelamin = stripslashes ($hasil['jenis_kelamin']);
            $rs2 = mysqli_query($koneksi,"select label from m_jenis_kelamin where kode='$jenis_kelamin'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_kelamin2 = stripslashes ($hasil2['label']);        
            } else {
                $jenis_kelamin2 = "";
            }
        $tempat_lahir = stripslashes ($hasil['tempat_lahir']);
        $tgl_lahir = stripslashes ($hasil['tgl_lahir']);
        $tgl_lahir2 = TanggalIndo2($tgl_lahir);
    	$id_agama = stripslashes ($hasil['id_agama']);
            $rs2 = mysqli_query($koneksi,"select label from m_agama where id_agama='$id_agama'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $agama = stripslashes ($hasil2['label']);
            } else {
                $agama = "";
            }
        $pekerjaan = stripslashes ($hasil['pekerjaan']);
        $pln_group = stripslashes ($hasil['pln_group']);
        $kode_perusahaan = stripslashes ($hasil['kode_perusahaan']);
            $rs2 = mysqli_query($koneksi,"select * from m_pln_group where kode='$kode_perusahaan' and kode<>''");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_perusahaan = $hasil2['label'];
            } else {
                $nama_perusahaan = "";
            }
        $nip_keluarga = stripslashes ($hasil['nip_keluarga']);
        $status_warganegara = stripslashes ($hasil['status_warganegara']);
            $rs2 = mysqli_query($koneksi,"select label from m_status_kewarganegaraan where kode='$status_warganegara'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $status_warganegara2 = stripslashes ($hasil2['label']);
            } else {
                $status_warganegara2 = "";
            }
        $jenis_alamat = stripslashes ($hasil['jenis_alamat']);
            $rs2 = mysqli_query($koneksi,"select label from m_jenis_alamat where kode='$jenis_alamat'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_alamat2 = stripslashes ($hasil2['label']);        
            } else {
                $jenis_alamat2 = "";
            }
        $alamat = stripslashes ($hasil['alamat']);
        $id_provinsi = stripslashes ($hasil['id_provinsi']);
            $rs2 = mysqli_query($koneksi,"select nama_provinsi from m_provinsi where id_provinsi='$id_provinsi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_provinsi = stripslashes ($hasil2['nama_provinsi']);
            } else {
                $nama_provinsi = "";
            }
        $id_kabupaten = stripslashes ($hasil['id_kabupaten']);
            $rs2 = mysqli_query($koneksi,"select nama_kabupaten from m_kabupaten where id_provinsi='$id_provinsi' and id_kabupaten='$id_kabupaten'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_kabupaten = stripslashes ($hasil2['nama_kabupaten']);
            } else {
                $nama_kabupaten = "";
            }
        $kode_pos = stripslashes ($hasil['kode_pos']);
        $no_kk = stripslashes ($hasil['no_kk']);
        $nik = stripslashes ($hasil['nik']);
        $npwp = stripslashes ($hasil['npwp']);
        $telepon = stripslashes ($hasil['telepon']);
        $gol_darah = stripslashes ($hasil['gol_darah']);
            $rs2 = mysqli_query($koneksi,"select label from m_gol_darah where kode='$gol_darah'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $gol_darah2 = stripslashes ($hasil2['label']);
            } else {
                $gol_darah2 = "";
            }
        $no_bpjs_kes = stripslashes ($hasil['no_bpjs_kes']);
        
        $datanya = array();
        $datanya["idkeluarga"] = $id;
        $datanya["nipkeluarga"] = $nip;
        $datanya["start_datekeluarga"] = $start_date;
        $datanya["start_date2keluarga"] = $start_date2;
        $datanya["end_datekeluarga"] = $end_date;
        $datanya["end_date2keluarga"] = $end_date2;
        $datanya["id_jenis_keluargakeluarga"] = $id_jenis_keluarga;
        $datanya["jenis_keluargakeluarga"] = $jenis_keluarga;
        $datanya["no_urutkeluarga"] = $no_urut;
        $datanya["namakeluarga"] = $nama;
        $datanya["jenis_kelaminkeluarga"] = $jenis_kelamin;
        $datanya["jenis_kelamin2keluarga"] = $jenis_kelamin2;
        $datanya["tempat_lahirkeluarga"] = $tempat_lahir;
        $datanya["tgl_lahirkeluarga"] = $tgl_lahir;
        $datanya["tgl_lahir2keluarga"] = $tgl_lahir2;
        $datanya["id_agamakeluarga"] = $id_agama;
        $datanya["agamakeluarga"] = $agama;
        $datanya["pekerjaankeluarga"] = $pekerjaan;
        $datanya["pln_groupkeluarga"] = $pln_group;
        $datanya["kode_perusahaankeluarga"] = $kode_perusahaan;
        $datanya["nama_perusahaankeluarga"] = $nama_perusahaan;
        $datanya["nip_keluargakeluarga"] = $nip_keluarga;
        $datanya["status_warganegarakeluarga"] = $status_warganegara;
        $datanya["status_warganegara2keluarga"] = $status_warganegara2;
        $datanya["jenis_alamatkeluarga"] = $jenis_alamat;
        $datanya["jenis_alamat2keluarga"] = $jenis_alamat2;
        $datanya["alamatkeluarga"] = $alamat;
        $datanya["id_provinsikeluarga"] = $id_provinsi;
        $datanya["nama_provinsikeluarga"] = $nama_provinsi;
        $datanya["id_kabupatenkeluarga"] = $id_kabupaten;
        $datanya["nama_kabupatenkeluarga"] = $nama_kabupaten;
        $datanya["kode_poskeluarga"] = $kode_pos;
        $datanya["no_kkkeluarga"] = $no_kk;
        $datanya["nikkeluarga"] = $nik;
        $datanya["npwpkeluarga"] = $npwp;
        $datanya["teleponkeluarga"] = $telepon;
        $datanya["gol_darahkeluarga"] = $gol_darah;
        $datanya["gol_darah2keluarga"] = $gol_darah2;
        $datanya["no_bpjs_keskeluarga"] = $no_bpjs_kes;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>