<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if ($userhris && $superadminhris=="1"){
    include "koneksi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;

    $nama2 = isset($_POST['namausercari']) ? $_POST['namausercari'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $perintah = "";
    if($nama2!=""){
        if($perintah==""){
            $perintah .= " where (user_name like '%$nama2%' or user_fullname like '%$nama2%')";
        } else {
            $perintah .= " and (user_name like '%$nama2%' or user_fullname like '%$nama2%')";
        }
    }
    if($userhris!="sandy"){
        if($perintah==""){
            $perintah .= " where user_name<>'sandy'";
        } else {
            $perintah .= " and user_name<>'sandy'";
        }
    }
    
    $rs = mysqli_query($koneksi,"select count(*) from masteruser".$perintah);
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    
    $rs = mysqli_query($koneksi,"select * from masteruser".$perintah." order by id desc limit $offset,$rows");
    $items = array();
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
    	$user_name = stripslashes ($hasil['user_name']);
        $user_pass = stripslashes ($hasil['user_pass']);
    	$user_fullname = strtoupper(stripslashes ($hasil['user_fullname']));
    	$user_email = stripslashes ($hasil['user_email']);
        $jabatan = stripslashes ($hasil['jabatan']);
        $nama_jabatan = $user_fullname."<br/>".$jabatan;
    	$aktif = stripslashes ($hasil['aktif']);
        if($aktif=="1"){
            $aktif2 = "Aktif";
        } else {
            $aktif2 = "Non Aktif";
        }
        $superadmin = stripslashes ($hasil['superadmin']);
        $level_akses = "<label style='margin-top:10px;margin-bottom:20px;'>";
        if($superadmin=="1"){
            $level_akses .= 'Super Admin :  <i class="fa fa-check green" style="font-size:10px;"></i><br/>';
        }
        /*
        if($mobile=="1"){
            $level_akses .= 'Mobile :  <i class="fa fa-check green" style="font-size:10px;"></i><br/>';
        }
        */
        $level_akses .= "</label>";
        
        $datanya = array();
        $datanya["iduser"] = $id;
        $datanya["user_nameuser"] = $user_name;
        $datanya["user_passuser"] = $user_pass;
        $datanya["superadmin"] = $superadmin;
        //$datanya["mobile"] = $mobile;
        $datanya["user_emailuser"] = $user_email;
        $datanya["user_fullnameuser"] = $user_fullname;
        $datanya["jabatanuser"] = $jabatan;
        $datanya["nama_jabatanuser"] = $nama_jabatan;
        $datanya["statususer"] = $aktif;
        $datanya["status2user"] = $aktif2;
        $datanya["level_aksesuser"] = $level_akses;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>