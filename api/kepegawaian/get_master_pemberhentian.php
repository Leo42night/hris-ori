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

    $nama2 = isset($_POST['namapemberhentiancari']) ? $_POST['namapemberhentiancari'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $perintah = "";
    if($nama2!=""){
        $perintah .= " where (a.nip='$nama2' or b.nama like '%$nama2%')";
    }
    
    $rs = mysqli_query($koneksi,"select count(a.id) from r_pemberhentian a left join data_pegawai b on a.nip=b.nip".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select a.*,b.nama as nama from r_pemberhentian a left join data_pegawai b on a.nip=b.nip".$perintah." order by a.id asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes($hasil['id'] ?? '');
    	$nip = stripslashes($hasil['nip'] ?? '');
        $nama = stripslashes($hasil['nama'] ?? '');
        $tgl_lahir = stripslashes ($hasil['tgl_lahir'] ?? '');
        $tgl_lahir2 = TanggalIndo2($tgl_lahir);
    	$tgl_masuk = strtoupper(stripslashes ($hasil['tgl_masuk']) ?? '');
        $tgl_masuk2 = TanggalIndo2($tgl_masuk);
    	$tgl_capeg = stripslashes ($hasil['tgl_capeg'] ?? '');
        $tgl_capeg2 = TanggalIndo2($tgl_capeg);
        $tgl_tetap = stripslashes ($hasil['tgl_tetap'] ?? '');
        $tgl_tetap2 = TanggalIndo2($tgl_tetap);
        $tgl_berhenti = stripslashes ($hasil['tgl_berhenti'] ?? '');
        $tgl_berhenti2 = TanggalIndo2($tgl_berhenti);
        $alasan_berhenti = stripslashes ($hasil['alasan_berhenti'] ?? '');
            $rs2 = mysqli_query($koneksi,"select * from m_alasan_berhenti where kode='$alasan_berhenti'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $alasan_berhenti2 = stripslashes ($hasil2['name'] ?? '');
            } else {
                $alasan_berhenti2 = "";
            }
        $person_grade = stripslashes ($hasil['person_grade'] ?? '');
            $rs2 = mysqli_query($koneksi,"select label from m_grade where kode_grade='$person_grade'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $person_grade2 = stripslashes ($hasil2['label'] ?? '');
            } else {
                $person_grade2 = "";
            }
        $phdp_terakhir = stripslashes ($hasil['phdp_terakhir'] ?? '');
        $agama = stripslashes ($hasil['agama'] ?? '');
            $rs2 = mysqli_query($koneksi,"select label from m_agama where id_agama='$agama'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $agama2 = stripslashes ($hasil2['label'] ?? '');
            } else {
                $agama2 = "";
            }
        $jenis_kelamin = stripslashes ($hasil['jenis_kelamin'] ?? '');
            $rs2 = mysqli_query($koneksi,"select label from m_jenis_kelamin where kode='$jenis_kelamin'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_kelamin2 = stripslashes ($hasil2['label'] ?? '');
            } else {
                $jenis_kelamin2 = "";
            }
        $nik = stripslashes ($hasil['nik'] ?? '');
    	$npwp = stripslashes ($hasil['npwp'] ?? '');
        $dplk_dapen = stripslashes ($hasil['dplk_dapen'] ?? '');
            $rs2 = mysqli_query($koneksi,"select * from m_jenis_asuransi where kode='$dplk_dapen'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $dplk_dapen2 = stripslashes ($hasil2['name'] ?? '');
            } else {
                $dplk_dapen2 = "";
            }
        $bank_dplk = stripslashes ($hasil['bank_dplk'] ?? '');
        $no_peserta = stripslashes ($hasil['no_peserta'] ?? '');
        $no_bpjs_kes = stripslashes ($hasil['no_bpjs_kes'] ?? '');
        $no_bpjs_tk = stripslashes ($hasil['no_bpjs_tk'] ?? '');
        $tahun_pemberhentian = stripslashes ($hasil['tahun_pemberhentian'] ?? '');
        
        $datanya = array();
        $datanya["idpemberhentian"] = $id;
        $datanya["nippemberhentian"] = $nip;
        $datanya["namapemberhentian"] = $nama;
        $datanya["person_gradepemberhentian"] = $person_grade;
        $datanya["person_grade2pemberhentian"] = $person_grade2;
        $datanya["phdp_terakhirpemberhentian"] = $phdp_terakhir;
        $datanya["agamapemberhentian"] = $agama;
        $datanya["agama2pemberhentian"] = $agama2;
        $datanya["jenis_kelaminpemberhentian"] = $jenis_kelamin;
        $datanya["jenis_kelamin2pemberhentian"] = $jenis_kelamin2;
        $datanya["nikpemberhentian"] = $nik;
        $datanya["npwppemberhentian"] = $npwp;
        $datanya["tgl_lahirpemberhentian"] = $tgl_lahir;
        $datanya["tgl_lahir2pemberhentian"] = $tgl_lahir2;
        $datanya["tgl_masukpemberhentian"] = $tgl_masuk;
        $datanya["tgl_masuk2pemberhentian"] = $tgl_masuk2;
        $datanya["tgl_capegpemberhentian"] = $tgl_capeg;
        $datanya["tgl_capeg2pemberhentian"] = $tgl_capeg2;
        $datanya["tgl_tetappemberhentian"] = $tgl_tetap;
        $datanya["tgl_tetap2pemberhentian"] = $tgl_tetap2;
        $datanya["tgl_berhentipemberhentian"] = $tgl_berhenti;
        $datanya["tgl_berhenti2pemberhentian"] = $tgl_berhenti2;
        $datanya["alasan_berhentipemberhentian"] = $alasan_berhenti;
        $datanya["alasan_berhenti2pemberhentian"] = $alasan_berhenti2;
        $datanya["dplk_dapenpemberhentian"] = $dplk_dapen;
        $datanya["dplk_dapen2pemberhentian"] = $dplk_dapen2;
        $datanya["bank_dplkpemberhentian"] = $bank_dplk;
        $datanya["no_pesertapemberhentian"] = $no_peserta;
        $datanya["no_bpjs_kespemberhentian"] = $no_bpjs_kes;
        $datanya["no_bpjs_tkpemberhentian"] = $no_bpjs_tk;
        $datanya["tahun_pemberhentianpemberhentian"] = $tahun_pemberhentian;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>