<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $tahun_ini = date("Y");
    $nip2 = isset($_POST['niptikscari']) ? $_POST['niptikscari'] : "";
    $tahun2 = isset($_POST['tahuntikscari']) ? $_POST['tahuntikscari'] : date("Y");
    $semester2 = isset($_POST['semestertikscari']) ? $_POST['semestertikscari'] : "0";
    
    $offset = ($page-1)*$rows;
    $result = array();
    $perintah = "";    
    if($semester2!="0"){
        $perintah .= " and a.semester='$semester2'";
    }
    if($nip2!=""){
        $perintah .= " and (a.nip='$nip2' or b.nama like '%$nip2%')";
    }
    
    $offset = ($page-1)*$rows;
    $result = array();
    $rs = mysqli_query($koneksi,"select count(*) from iks a left join data_pegawai b on a.nip=b.nip where substr(a.blth,1,4)='$tahun2'".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $items = array();
    $rs = mysqli_query($koneksi,"select a.*,b.nama,b.nama_bank,b.no_rekening,b.nama_rekening from iks a left join data_pegawai b on a.nip=b.nip where substr(a.blth,1,4)='$tahun2'".$perintah." order by id asc limit $offset,$rows");
    // echo "select a.*,b.nama,b.nama_bank,b.no_rekening,b.nama_rekening from iks a left join data_pegawai b on a.nip=b.nip where substr(a.blth,1,4)='$tahun2'".$perintah." order by id asc limit $offset,$rows";
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashesx ($hasil['id']);
    	$blth = stripslashesx ($hasil['blth']);
    	$tahun = stripslashesx ($hasil['tahun']);
    	$semester = stripslashesx ($hasil['semester']);
    	$nip = stripslashesx ($hasil['nip']);
    	$nama_lengkap = stripslashesx ($hasil['nama']);
    	$p31 = floatval(stripslashesx ($hasil['p31']));
        $bank_payroll = stripslashesx ($hasil['nama_bank']);
        $no_rek_payroll = stripslashesx ($hasil['no_rekening']);
        $an_payroll = stripslashesx ($hasil['nama_rekening']);
        if(intval($semester)==1){
            $semester2 = "Semester I";
        } else if(intval($semester)==2){
            $semester2 = "Semester II";
        } else {
            $semester2 = "";
        }

        $datanya = array();
        $datanya["idtiks"] = $id;
        $datanya["blthtiks"] = $blth;
        $datanya["tahuntiks"] = $tahun;
        $datanya["semestertiks"] = $semester;
        $datanya["semester2tiks"] = $semester2;
        $datanya["niptiks"] = $nip;
        $datanya["nama_lengkaptiks"] = $nama_lengkap;
        $datanya["p31tiks"] = $p31;
        $datanya["bank_payrolltiks"] = $bank_payroll;
        $datanya["no_rek_payrolltiks"] = $no_rek_payroll;
        $datanya["an_payrolltiks"] = $an_payroll;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>