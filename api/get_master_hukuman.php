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

    $nip2 = isset($_REQUEST['nip']) ? $_REQUEST['nip'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $rs = mysqli_query($koneksi,"select count(*) from r_hukuman where nip='$nip2'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from r_hukuman where nip='$nip2' order by end_date asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$start_date = stripslashes ($hasil['start_date']);
        $start_date2 = TanggalIndo2($start_date);
    	$end_date = stripslashes ($hasil['end_date']);
        $end_date2 = TanggalIndo2($end_date);
    	$jenis_grievances = stripslashes ($hasil['jenis_grievances']);
            $rs2 = mysqli_query($koneksi,"select * from m_jenis_hukuman where kode='$jenis_grievances'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_grievances2 = stripslashes ($hasil2['label']);
            } else {
                $jenis_grievances2 = "";
            }
    	$reason_grievances = stripslashes ($hasil['reason_grievances']);
            $rs2 = mysqli_query($koneksi,"select * from m_reason_hukuman where kode_reason='$reason_grievances'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $reason_grievances2 = stripslashes ($hasil2['label']);
            } else {
                $reason_grievances2 = "";
            }
        $nip_atasan = stripslashes ($hasil['nip_atasan']);
        $nama_atasan = stripslashes ($hasil['nama_atasan']);
        $status_grievances = stripslashes ($hasil['status_grievances']);
            $rs2 = mysqli_query($koneksi,"select * from m_status_hukuman where kode_status='$status_grievances'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $status_grievances2 = stripslashes ($hasil2['label']);
            } else {
                $status_grievances2 = "";
            }
        $stage_grievances = stripslashes ($hasil['stage_grievances']);
            $rs2 = mysqli_query($koneksi,"select * from m_stage_hukuman where kode_stage='$stage_grievances'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $stage_grievances2 = stripslashes ($hasil2['label']);
            } else {
                $stage_grievances2 = "";
            }
        $result_grievances = stripslashes ($hasil['result_grievances']);
            $rs2 = mysqli_query($koneksi,"select * from m_result_hukuman where kode_result='$result_grievances'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $result_grievances2 = stripslashes ($hasil2['label']);
            } else {
                $result_grievances2 = "";
            }
        $rupiah = stripslashes ($hasil['rupiah']);
    	$no_sk_hukuman = stripslashes ($hasil['no_sk_hukuman']);
    	$tgl_sk_hukuman = stripslashes ($hasil['tgl_sk_hukuman']);
        $tgl_sk_hukuman2 = TanggalIndo2($tgl_sk_hukuman);
        $pasal_pelanggaran = stripslashes ($hasil['pasal_pelanggaran']);
        $hukuman = stripslashes ($hasil['hukuman']);
        $keterangan = stripslashes ($hasil['keterangan']);
        $no_sk_terkait = stripslashes ($hasil['no_sk_terkait']);
        
        $datanya = array();
        $datanya["idhukuman"] = $id;
        $datanya["niphukuman"] = $nip;
        $datanya["start_datehukuman"] = $start_date;
        $datanya["start_date2hukuman"] = $start_date2;
        $datanya["end_datehukuman"] = $end_date;
        $datanya["end_date2hukuman"] = $end_date2;
        $datanya["jenis_grievanceshukuman"] = $jenis_grievances;
        $datanya["jenis_grievances2hukuman"] = $jenis_grievances2;
        $datanya["reason_grievanceshukuman"] = $reason_grievances;
        $datanya["reason_grievances2hukuman"] = $reason_grievances2;
        $datanya["nip_atasanhukuman"] = $nip_atasan;
        $datanya["nama_atasanhukuman"] = $nama_atasan;
        $datanya["status_grievanceshukuman"] = $status_grievances;
        $datanya["status_grievances2hukuman"] = $status_grievances2;
        $datanya["stage_grievanceshukuman"] = $stage_grievances;
        $datanya["stage_grievances2hukuman"] = $stage_grievances2;
        $datanya["result_grievanceshukuman"] = $result_grievances;
        $datanya["result_grievances2hukuman"] = $result_grievances2;
        $datanya["rupiahhukuman"] = $rupiah;
        $datanya["rupiah2hukuman"] = number_format(floatval($rupiah),0,',','.');
        $datanya["no_sk_hukuman"] = $no_sk_hukuman;
        $datanya["tgl_sk_hukuman"] = $tgl_sk_hukuman;
        $datanya["tgl_sk_hukuman2"] = $tgl_sk_hukuman2;
        $datanya["pasal_pelanggaranhukuman"] = $pasal_pelanggaran;
        $datanya["hukumanhukuman"] = $hukuman;
        $datanya["keteranganhukuman"] = $keterangan;
        $datanya["no_sk_terkaithukuman"] = $no_sk_terkait;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>