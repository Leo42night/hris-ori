<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/vendor/autoload.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/vendor/pear/http_request2/HTTP/Request2.php"; // Only when installed with PEAR
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if ($userhris){    
    date_default_timezone_set("Asia/Jakarta");   
    function TanggalIndo2($date){
        if($date!="" && $date!=null){
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $result = $tgl . "." . $bulan . ".". $tahun;	
            return($result);
        } else {
            //return("01.01.1970");
            return("");
        }
    }

    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";

    $rs30 = mysqli_query($koneksi,"select * from baseurl_api order by id desc limit 1");
    $hasil30 = mysqli_fetch_array($rs30);
    if($hasil30){
        $baseurl = $hasil30['baseurl'];
    } else {
        $baseurl = "";
    }    

    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    $rs31 = mysqli_query($koneksi,"select * from akses_token order by id desc limit 1");
    $hasil31 = mysqli_fetch_array($rs31);
    if($hasil31){
        $jwtToken = $hasil31['jwtToken'];
    } else {
        $jwtToken = "";
    }    


    if($jwtToken!=""){
        $tokennya = "Bearer ".$jwtToken;
    
        $request = new HTTP_Request2();
        $request -> setUrl($baseurl."/api/position-management/save");
        $request -> setMethod(HTTP_Request2::METHOD_POST);
        $request -> setConfig(array(
            'follow_redirects' => TRUE
        ));
        
        $request->setHeader(array(
            'Authorization' => $tokennya,
            'content-Type' => 'application/json'
        ));

        $datanya = "";
        $datanya .= '
            {
                "file": "D:/xampp/htdocs/hris/fileupload/strukturorganisasi/Region Kalimantan 3_Perubahan Pertama0017.P.DIR.2022 - Perubahan atas Perdir No. 0010.2021 Reg Kal 3.pdf",
                "kodePlnGroup": "1006",
                "noDokumen": "0017.P.DIR.2022",
                "fileName": "Region Kalimantan 3_Perubahan Pertama0017.P.DIR.2022 - Perubahan atas Perdir No. 0010.2021 Reg Kal 3.pdf",
                "keterangan": ""
            }';
        $request->setBody($datanya);

        try {
            $response = $request->send();
            if (200 == $response->getStatus()) {
                //echo $response->getBody();
                $str=str_replace("\r\n","",$response->getBody());
                $array_response = json_decode($str, true);
                $statusnya = $array_response['success'];
                /*
                if($statusnya==true){
                    $sql2 = "update r_position_management set status_edit='0',tgl_edit='',user_edit='' where id=$id";
                    $result2 = @mysqli_query($koneksi,$sql2);
                }
                */
                $pesan = $response->getBody();
                $status = "200";
                $keterangan = "Sukses";
            } else {
                $pesan = 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .$response->getReasonPhrase();
                $status = $response->getStatus();
                $keterangan = $response->getReasonPhrase();
            }
        } catch (HTTP_Request2_Exception $e) {
            $pesan = 'Error: ' . $e->getMessage();
            $status = "Undefined";
            $keterangan = 'Error: ' . $e->getMessage();
        }
        /*
        $sql1 = "insert into history_update";
        $sql1 .= "(nama_tabel,id_data,tgl_perubahan,user_perubahan,tgl_update_sap,user_update_sap,status,keterangan)";
        $sql1 .= " values('r_position_management','$id','$tgl_edit','$user_edit','$hari_ini','$userhris','$status','$keterangan')";
        $result1 = @mysqli_query($koneksi,$sql1);
        */
    } else {
        //echo json_encode(array('resultMsg'=>'Token belum ada atau kadaluarsa!'));
        $pesan = 'Token belum ada atau kadaluarsa!';
    }
    echo json_encode(array('resultMsg'=>$pesan));
}
?>