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

    $nama2 = isset($_POST['namapegawaicari']) ? $_POST['namapegawaicari'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $perintah = "";
    if($nama2!=""){
        if($perintah==""){
            $perintah .= " where nip like '%$nama2%' or nama_lengkap like '%$nama2%'";
        } else {
            $perintah .= " and nip like '%$nama2%' or nama_lengkap like '%$nama2%'";
        }
    }
    
    $rs = mysqli_query($koneksi,"select count(*) from data_pendukung".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from data_pendukung".$perintah." order by id desc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$nama_lengkap = stripslashes ($hasil['nama']);
        /*
        $know_as = stripslashes ($hasil['know_as']);
        $tempat_lahir = stripslashes ($hasil['tempat_lahir']);
        $tgl_lahir = stripslashes ($hasil['tgl_lahir']);
        $tgl_lahir2 = TanggalIndo2($tgl_lahir);
        $kode_negara = stripslashes ($hasil['kode_negara']);
            $rs2 = mysqli_query($koneksi,"select nama_negara from m_negara where kode_negara='$kode_negara'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_negara = stripslashes ($hasil2['nama_negara']);
            } else {
                $nama_negara = "";
            }
        $jenis_kelamin = stripslashes ($hasil['jenis_kelamin']);
            $rs2 = mysqli_query($koneksi,"select label from m_jenis_kelamin where kode='$jenis_kelamin'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_kelamin2 = stripslashes ($hasil2['label']);
            } else {
                $jenis_kelamin2 = "";
            }
        $id_agama = stripslashes ($hasil['id_agama']);
            $rs2 = mysqli_query($koneksi,"select label from m_agama where id_agama='$id_agama'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $nama_agama = stripslashes ($hasil2['label']);
            } else {
                $nama_agama = "";
            }
        $status_nikah = stripslashes ($hasil['status_nikah']);
            $rs2 = mysqli_query($koneksi,"select label from m_status_nikah where kode='$status_nikah'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $status_nikah2 = stripslashes ($hasil2['label']);
            } else {
                $status_nikah2 = "";
            }
        $tgl_nikah = stripslashes ($hasil['tgl_nikah']);
        $tgl_nikah2 = TanggalIndo2($tgl_nikah);
        $status_warganegara = stripslashes ($hasil['status_warganegara']);
            $rs2 = mysqli_query($koneksi,"select label from m_status_kewarganegaraan where kode='$status_warganegara'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $status_warganegara2 = stripslashes ($hasil2['label']);
            } else {
                $status_warganegara2 = "";
            }
        $gol_darah = stripslashes ($hasil['gol_darah']);
            $rs2 = mysqli_query($koneksi,"select label from m_gol_darah where kode='$gol_darah'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $gol_darah2 = stripslashes ($hasil2['label']);
            } else {
                $gol_darah2 = "";
            }
        $suku = stripslashes ($hasil['suku']);
        $telepon_utama = stripslashes ($hasil['telepon_utama']);
        $telepon_cadangan1 = stripslashes ($hasil['telepon_cadangan1']);
        $telepon_cadangan2 = stripslashes ($hasil['telepon_cadangan2']);
        $telepon_cadangan3 = stripslashes ($hasil['telepon_cadangan3']);
        $telepon_darurat = stripslashes ($hasil['telepon_darurat']);
        $jenis_dplk = stripslashes ($hasil['jenis_dplk']);
            $rs2 = mysqli_query($koneksi,"select jenis_dplk from m_jenis_dplk where kode='$jenis_dplk'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_dplk2 = stripslashes ($hasil2['jenis_dplk']);
            } else {
                $jenis_dplk2 = "";
            }
        $id_dplk = stripslashes ($hasil['id_dplk']);
        $bank_dplk = stripslashes ($hasil['bank_dplk']);
        $no_bpjs_kes = stripslashes ($hasil['no_bpjs_kes']);
        $no_bpjs_tk = stripslashes ($hasil['no_bpjs_tk']);
        $bank_payroll = stripslashes ($hasil['bank_payroll']);
        $an_payroll = stripslashes ($hasil['an_payroll']);
        $no_rek_payroll = stripslashes ($hasil['no_rek_payroll']);        
        $status_integrasi = stripslashes ($hasil['status_integrasi']);
            $rs2 = mysqli_query($koneksi,"select label from m_status_integrasi where kode_integrasi='$status_integrasi'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $status_integrasi2 = stripslashes ($hasil2['label']);
            } else {
                $status_integrasi2 = "";
            }
        */
        
        $datanya = array();
        $datanya["iddatapegawai"] = $id;
        $datanya["nipdatapegawai"] = $nip;
        $datanya["nama_lengkapdatapegawai"] = $nama_lengkap;
        /*
        $datanya["gelar_depandatapegawai"] = $gelar_depan;
        $datanya["gelar_depan2datapegawai"] = $gelar_depan2;
        $datanya["gelar_belakangdatapegawai"] = $gelar_belakang;
        $datanya["gelar_belakang2datapegawai"] = $gelar_belakang2;
        $datanya["know_asdatapegawai"] = $know_as;
        $datanya["tempat_lahirdatapegawai"] = $tempat_lahir;
        $datanya["tgl_lahirdatapegawai"] = $tgl_lahir;
        $datanya["tgl_lahir2datapegawai"] = $tgl_lahir2;
        $datanya["kode_negaradatapegawai"] = $kode_negara;
        $datanya["nama_negaradatapegawai"] = $nama_negara;
        $datanya["jenis_kelamindatapegawai"] = $jenis_kelamin;
        $datanya["jenis_kelamin2datapegawai"] = $jenis_kelamin2;
        $datanya["iddatapegawai"] = $id;
        $datanya["id_agamadatapegawai"] = $id_agama;
        $datanya["nama_agamadatapegawai"] = $nama_agama;
        $datanya["status_nikahdatapegawai"] = $status_nikah;
        $datanya["status_nikah2datapegawai"] = $status_nikah2;
        $datanya["tgl_nikahdatapegawai"] = $tgl_nikah;
        $datanya["tgl_nikah2datapegawai"] = $tgl_nikah2;
        $datanya["status_warganegaradatapegawai"] = $status_warganegara;
        $datanya["status_warganegara2datapegawai"] = $status_warganegara2;
        $datanya["gol_darahdatapegawai"] = $gol_darah;
        $datanya["gol_darah2datapegawai"] = $gol_darah2;
        $datanya["sukudatapegawai"] = $suku;
        $datanya["telepon_utamadatapegawai"] = $telepon_utama;
        $datanya["telepon_cadangan1datapegawai"] = $telepon_cadangan1;
        $datanya["telepon_cadangan2datapegawai"] = $telepon_cadangan2;
        $datanya["telepon_cadangan3datapegawai"] = $telepon_cadangan3;
        $datanya["telepon_daruratdatapegawai"] = $telepon_darurat;
        $datanya["jenis_dplkdatapegawai"] = $jenis_dplk;
        $datanya["jenis_dplk2datapegawai"] = $jenis_dplk2;
        $datanya["id_dplkdatapegawai"] = $id_dplk;
        $datanya["bank_dplkdatapegawai"] = $bank_dplk;
        $datanya["no_bpjs_kesdatapegawai"] = $no_bpjs_kes;
        $datanya["no_bpjs_tkdatapegawai"] = $no_bpjs_tk;
        $datanya["bank_payrolldatapegawai"] = $bank_payroll;
        $datanya["an_payrolldatapegawai"] = $an_payroll;
        $datanya["no_rek_payrolldatapegawai"] = $no_rek_payroll;
        $datanya["status_integrasidatapegawai"] = $status_integrasi;
        $datanya["status_integrasi2datapegawai"] = $status_integrasi2;
        */
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>