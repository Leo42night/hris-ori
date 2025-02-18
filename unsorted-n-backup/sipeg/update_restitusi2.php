<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    include 'koneksi_sipeg.php';
    $id = intval($_REQUEST['id']);
    $idrestitusi = $_REQUEST['idrestitusirestitusi2'];
    $idsppd = $_REQUEST['idsppdrestitusi2'];
    $jenis_restitusi = $_REQUEST['jenis_restitusirestitusi2'];
    $keterangan = $_REQUEST['keteranganrestitusi2'];
    $nilai = $_REQUEST['nilairestitusi2'];

    $directoryName = "../sipeg/assets/restitusi/$idsppd";
    // $directoryName2 = "sipeg/assets/restitusi/$idsppd";
    if(!is_dir($directoryName)){
      mkdir($directoryName, 0755, true);
    }    
    $uploadDir1 = $directoryName."/";
    // $uploadDir2 = $directoryName2."/";
    $source = '../assets/index.html';
    $destination = $uploadDir1.'/index.html';
    if (!file_exists($destination)){
      copy($source, $destination);
    }
    // if(isset($_FILES['lampiran2restitusi2'])){
    //     if(is_uploaded_file($_FILES['lampiran2restitusi2']['tmp_name'])){
    //         $uploadFile = $_FILES['lampiran2restitusi2'];                 
    //         $ambilExt = explode(".", $uploadFile['name']);
    //         $fileExt = end($ambilExt);
    //         $nama_file = reset($ambilExt);            
    //         if(strtolower($fileExt)!="pdf" && strtolower($fileExt)!="jpg" && strtolower($fileExt)!="jpeg" && strtolower($fileExt)!="png"){
    //             echo 'Format file yang di izinkan hanya pdf dan image';
    //             exit;
    //         }
    //         $lampiran2 = $uploadDir1."restitusi-".$idsppd."-".time().".$fileExt";
    //         $lampiran = $uploadDir2."restitusi-".$idsppd."-".time().".$fileExt";
    //         move_uploaded_file($uploadFile['tmp_name'],$lampiran2);
    //     } else {
    //         $lampiran = "";
    //     }
    // } else {
    //     $lampiran = "";
    // }

    $sql = "update biaya_restitusi set jenis_restitusi='$jenis_restitusi',nilai='$nilai',keterangan='$keterangan'";
    // if($lampiran!=""){
    //     $sql .= ",lampiran='$lampiran'";
    // }
    $sql .= " where id=$id";
    $result = @mysqli_query($koneksi,$sql);
    if ($result){    
        $allowTypes = array('pdf');
        $allowed_types = array('pdf');
        $maxsize = 10 * 1024 * 1024; 
        $hasil = "";
        $sukses = 0;
        $gagal = 0;
        if(!empty(array_filter($_FILES['lampiran2restitusi2']['name']))) {
            $sql1 = "delete from eviden_restitusi where idsppd='$idsppd' and idrestitusi='$idrestitusi'";
            $result1 = @mysqli_query($koneksi,$sql1);
    
            foreach ($_FILES['lampiran2restitusi2']['tmp_name'] as $key => $value) {             
                $file_tmpname = $_FILES['lampiran2restitusi2']['tmp_name'][$key];
                $file_name = $_FILES['lampiran2restitusi2']['name'][$key];
                $file_size = $_FILES['lampiran2restitusi2']['size'][$key];
                $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
                $eviden = $uploadDir1.$idsppd."-".$idrestitusi."(".($key+1).")-".time().".$file_ext";
                // $hasil .= $eviden.", ";
                // $filepath = $uploadDir1.$eviden;
                if(in_array(strtolower($file_ext), $allowed_types)) {
                    if ($file_size > $maxsize)         
                        $eviden = "";
                    if( move_uploaded_file($file_tmpname, $eviden)) {
                        $eviden = $eviden;
                    } else {                     
                        $eviden = "";
                    }
                    if($eviden!="") {
                        $sql2 = "insert into eviden_restitusi(idsppd,idrestitusi,lampiran)";
                        $sql2 .= " values('$idsppd','$idrestitusi','$eviden')";
                        $result2 = @mysqli_query($koneksi, $sql2);
                        if($result2){
                            $sukses++;
                        } else {
                            $gagal++;
                        }
                    }        
                }
            }
        } 
    
    	echo json_encode(array(
    		'id' => $id
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>