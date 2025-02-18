<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $tahun_ini = date("Y");
    $nip2 = isset($_POST['niptpesangoncari']) ? $_POST['niptpesangoncari'] : "";
    $blth2 = isset($_POST['blthtpesangoncari']) ? $_POST['blthtpesangoncari'] : date("Y-m");
    
    $offset = ($page-1)*$rows;
    $result = array();
    $perintah = "";    
    if($nip2!=""){
        $perintah .= " and (a.nip='$nip2' or b.nama like '%$nip2%')";
    }
    
    $offset = ($page-1)*$rows;
    $result = array();
    $rs = mysqli_query($koneksi,"select count(*) from pesangon a left join data_pegawai b on a.nip=b.nip where a.blth='$blth2'".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $items = array();
    $rs = mysqli_query($koneksi,"select a.*,b.nama,b.nama_bank,b.no_rekening,b.nama_rekening from pesangon a left join data_pegawai b on a.nip=b.nip where a.blth='$blth2'".$perintah." order by id asc limit $offset,$rows");
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashesx ($hasil['id']);
    	$blth = stripslashesx ($hasil['blth']);
    	$nip = stripslashesx ($hasil['nip']);
    	$nama_lengkap = stripslashesx ($hasil['nama']);
    	$uang_pesangon = floatval(stripslashesx ($hasil['uang_pesangon']));
        $bank_payroll = stripslashesx ($hasil['nama_bank']);
        $no_rek_payroll = stripslashesx ($hasil['no_rekening']);
        $an_payroll = stripslashesx ($hasil['nama_rekening']);

        $datanya = array();
        $datanya["idtpesangon"] = $id;
        $datanya["blthtpesangon"] = $blth;
        $datanya["niptpesangon"] = $nip;
        $datanya["nama_lengkaptpesangon"] = $nama_lengkap;
        $datanya["uang_pesangontpesangon"] = $uang_pesangon;
        $datanya["bank_payrolltpesangon"] = $bank_payroll;
        $datanya["no_rek_payrolltpesangon"] = $no_rek_payroll;
        $datanya["an_payrolltpesangon"] = $an_payroll;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>