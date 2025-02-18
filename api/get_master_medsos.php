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
    
    $rs = mysqli_query($koneksi,"select count(*) from r_medsos where nip='$nip2'");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from r_medsos where nip='$nip2' order by end_date asc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$nip = stripslashes ($hasil['nip']);
    	$start_date = stripslashes ($hasil['start_date']);
        $start_date2 = TanggalIndo2($start_date);
    	$end_date = stripslashes ($hasil['end_date']);
        $end_date2 = TanggalIndo2($end_date);
    	$jenis_medsos = stripslashes ($hasil['jenis_medsos']);
            $rs2 = mysqli_query($koneksi,"select * from m_jenis_medsos where kode='$jenis_medsos'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $jenis_medsos2 = stripslashes ($hasil2['label']);
            } else {
                $jenis_medsos2 = "";
            }                                                                        
        $id_medsos = stripslashes ($hasil['id_medsos']);
        
        $datanya = array();
        $datanya["idmedsos"] = $id;
        $datanya["nipmedsos"] = $nip;
        $datanya["start_datemedsos"] = $start_date;
        $datanya["start_date2medsos"] = $start_date2;
        $datanya["end_datemedsos"] = $end_date;
        $datanya["end_date2medsos"] = $end_date2;
        $datanya["jenis_medsos"] = $jenis_medsos;
        $datanya["jenis_medsos2"] = $jenis_medsos2;
        $datanya["id_medsos"] = $id_medsos;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>