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

        $rs32 = mysqli_query($koneksi,"select * from r_position_management where status_edit='1' order by id asc limit 20");
        while($hasil32 = mysqli_fetch_array($rs32)){
        //$hasil32 = mysqli_fetch_array($rs32);
            $id = intval($hasil32['id']);
            $tgl_edit = $hasil32['tgl_edit'];
            $user_edit = $hasil32['user_edit'];
            $kode_posisi = $hasil32['kode_posisi'];
            $nama_posisi = $hasil32['nama_posisi'];
            $status = $hasil32['status'];
            $start_date = TanggalIndo2($hasil32['start_date']);
            $end_date = TanggalIndo2($hasil32['end_date']);
            $nip = $hasil32['nip'];
            $job_key = $hasil32['job_key'];
            $job_level = $hasil32['job_level'];
            $ftk = $hasil32['ftk'];
            $posisi_kunci = $hasil32['posisi_kunci'];
            $kode_posisi_atasan = $hasil32['kode_posisi_atasan'];
            $nama_posisi_atasan = $hasil32['nama_posisi_atasan'];
            $identity_pln_group = "1006";
    
            $request = new HTTP_Request2();
            $request -> setUrl($baseurl."/api/position-management/save");
            $request -> setMethod(HTTP_Request2::METHOD_POST);
            $request -> setConfig(array(
                'follow_redirects' => TRUE
            ));

            $request->setHeader(array(
                //'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJwbG50YXJha2FuIiwiaWRfcGxuX2dyb3VwIjoiZjdhY2JiMTUtMzMzYS00ZTU5LWE4YWUtZjUzMmJkZGUxMWZlIiwicm9sZSI6W3siaWQiOiJmZDBkOGZhNC0yMjI3LTQ0ZTItYjdlZi0wYTM1ZDkwMjI0ZjgiLCJuYW1lIjoiQWRtaW4gQVAiLCJrZXRlcmFuZ2FuIjoiQW5hayBQZXJ1c2FoYWFuIiwiaXNBY3RpdmUiOnRydWV9XSwia29kZV9wbG5fZ3JvdXAiOiIxMDA2IiwiaWRfdXNlciI6ImEwMTE0ZjRkLWMxMzAtNGU5Yy05ZGIxLTBiMGQ5MmExOTIwZSIsInR5cGUiOiJhY2Nlc3MiLCJuaXAiOiIxMjM0NSIsImZ1bGxuYW1lIjoiUExOIFRBUkFLQU4iLCJleHAiOjE2NjkwNTE1MjYsImlhdCI6MTY2OTAyMjcyNiwiZW1haWwiOiJwbG50YXJha2FuQGdtYWlpbC5jb20iLCJ1c2VybmFtZSI6InBsbnRhcmFrYW4iLCJzdGF0dXMiOiJBRE1JTl9BUCJ9.d40wle_pvtdz7r7uDucO3Mk5jeJ6jP8T1sF_yEql2E0',
                'Authorization' => $tokennya,
                'content-Type' => 'application/json'
            ));

            $datanya = "";
            $datanya .= '
                {
                    "kodePosisi": "'.$kode_posisi.'",
                    "namaPosisi": "'.$nama_posisi.'",
                    "status": "'.$status.'",
                    "startDate": "'.$start_date.'",
                    "endDate": "'.$end_date.'",
                    "nip": "'.$nip.'",
                    "jobKey": "'.$job_key.'",
                    "jobLevel": "'.$job_level.'",
                    "ftk": '.$ftk.',
                    "kodePosisiKunci": "'.$posisi_kunci.'",
                    "kodePosisiAtasanLangsung": "'.$kode_posisi_atasan.'",
                    "namaPosisiAtasanLangsung": "'.$nama_posisi_atasan.'",
                    "kodePlnGroup": "'.$identity_pln_group.'"
                }';
            $request->setBody($datanya);
            try {
                $response = $request->send();
                if (200 == $response->getStatus()) {
                    //echo $response->getBody();
                    $str=str_replace("\r\n","",$response->getBody());
                    $array_response = json_decode($str, true);
                    $statusnya = $array_response['success'];
                    if($statusnya==true){
                        $sql2 = "update r_position_management set status_edit='0',tgl_edit='',user_edit='' where id=$id";
                        $result2 = @mysqli_query($koneksi,$sql2);
                    }
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
            $sql1 = "insert into history_update";
            $sql1 .= "(nama_tabel,id_data,tgl_perubahan,user_perubahan,tgl_update_sap,user_update_sap,status,keterangan)";
            $sql1 .= " values('r_position_management','$id','$tgl_edit','$user_edit','$hari_ini','$userhris','$status','$keterangan')";
            $result1 = @mysqli_query($koneksi,$sql1);
            //echo json_encode(array('resultMsg'=>$pesan));
        }
    } else {
        //echo json_encode(array('resultMsg'=>'Token belum ada atau kadaluarsa!'));
        $pesan = 'Token belum ada atau kadaluarsa!';
    }
    echo json_encode(array('resultMsg'=>$pesan));
}
?>