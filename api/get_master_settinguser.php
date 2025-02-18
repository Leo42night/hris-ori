<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if ($userhris && $superadminhris=="1"){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    function TanggalIndo2($date){
        if(strtotime($date)){
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $result = $tgl . "-" . $bulan . "-". $tahun;	
            return($result);
        } else {
            return("");
        }
    }
    function TanggalIndo($date){
        if(strtotime($date)){
            $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;	
            return($result);
        } else {
            return("");
        }
    }

    $username2 = $_REQUEST['username'];
    //$username2 = "sandy";

    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
    
    $offset = ($page-1)*$rows;
    $result = array();

    /*
    $rs = mysqli_query($koneksi,"select count(*) from pengadaan_splo".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    */
    $result["total"] = 1;
    
    //$rs = mysqli_query($koneksi,"select * from nodes where url<>'' order by parentId,parentId2,parentId3,urut,id asc");

    $items = array();
    $rs0 = mysqli_query($koneksi,"select grup from nodes group by grup order by id asc");
    while ($hasil0 = mysqli_fetch_array($rs0)) {
        $grup = stripslashes ($hasil0['grup']);

        //$rs = mysqli_query($koneksi,"select * from nodes where parentId2='$idmenu1' and url<>'' order by parentId2 IS NULL DESC,parentId2 asc,urut asc,id asc");
        $rs = mysqli_query($koneksi,"select * from nodes where grup='$grup' and url<>'' order by parentId2 IS NULL DESC,parentId2 asc,urut asc,id asc");
        while ($hasil = mysqli_fetch_array($rs)) {
            $idmenu = stripslashes ($hasil['id']);
            $nama_menu = stripslashes ($hasil['name']);

            $id = 0;
            $proses = 0;
            $lihat = 0;
            $rs2 = mysqli_query($koneksi,"select * from aksesuser where username='$username2' and idmenu='$idmenu'");
            $hasil2 = mysqli_fetch_array($rs2);
            if($hasil2){
                $id = stripslashes ($hasil2['id']);
                $proses = stripslashes ($hasil2['proses']);
                $lihat = stripslashes ($hasil2['lihat']);
            }

            $datanya = array();
            $datanya["idsettinguser"] = $id;
            $datanya["grupsettinguser"] = $grup;
            $datanya["idmenusettinguser"] = $idmenu;
            $datanya["nama_menusettinguser"] = $nama_menu;
            $datanya["usernamesettinguser"] = $username2;
            $datanya["prosessettinguser"] = $proses;
            $datanya["lihatsettinguser"] = $lihat;
            array_push($items, $datanya);
        }
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>