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
    //$nip = "9219008ZTY";


    if($jwtToken!=""){
        $tokennya = "Bearer ".$jwtToken;
        $request = new HTTP_Request2();
        $request -> setUrl($baseurl."/api/pembicara/save-batch");
        $request -> setMethod(HTTP_Request2::METHOD_POST);
        $request -> setConfig(array(
            'follow_redirects' => TRUE
        ));

        $request->setHeader(array(
            //'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJwbG50YXJha2FuIiwiaWRfcGxuX2dyb3VwIjoiZjdhY2JiMTUtMzMzYS00ZTU5LWE4YWUtZjUzMmJkZGUxMWZlIiwicm9sZSI6W3siaWQiOiJmZDBkOGZhNC0yMjI3LTQ0ZTItYjdlZi0wYTM1ZDkwMjI0ZjgiLCJuYW1lIjoiQWRtaW4gQVAiLCJrZXRlcmFuZ2FuIjoiQW5hayBQZXJ1c2FoYWFuIiwiaXNBY3RpdmUiOnRydWV9XSwia29kZV9wbG5fZ3JvdXAiOiIxMDA2IiwiaWRfdXNlciI6ImEwMTE0ZjRkLWMxMzAtNGU5Yy05ZGIxLTBiMGQ5MmExOTIwZSIsInR5cGUiOiJhY2Nlc3MiLCJuaXAiOiIxMjM0NSIsImZ1bGxuYW1lIjoiUExOIFRBUkFLQU4iLCJleHAiOjE2NjkwNTE1MjYsImlhdCI6MTY2OTAyMjcyNiwiZW1haWwiOiJwbG50YXJha2FuQGdtYWlpbC5jb20iLCJ1c2VybmFtZSI6InBsbnRhcmFrYW4iLCJzdGF0dXMiOiJBRE1JTl9BUCJ9.d40wle_pvtdz7r7uDucO3Mk5jeJ6jP8T1sF_yEql2E0',
            'Authorization' => $tokennya,
            'content-Type' => 'application/json'
        ));
        
        $rs31 = mysqli_query($koneksi,"select nip from r_pembicara where status_edit='1' group by nip order by nip asc");
        while($row1 = mysqli_fetch_array($rs31)){
            $nip = $row1['nip'];

            $pesan = "";
            $datanya = "[";
            //$datanya = "";
            $i=1;
            $rs32 = mysqli_query($koneksi,"select * from r_pembicara where nip='$nip' order by id asc");
            while($row = mysqli_fetch_array($rs32)){
                //$row = mysqli_fetch_array($rs32);
                $id = intval($row['id']);
                $tgl_edit = $row['tgl_edit'];
                $user_edit = $row['user_edit'];
                $nip = $row['nip'];
                $start_date = TanggalIndo2($row["start_date"]);
                $end_date = TanggalIndo2($row["end_date"]);
                $judul_acara = $row["judul_acara"];
                $kode_penyelenggaraan = $row["kode_penyelenggaraan"];
                $lokasi = $row["lokasi"];
                $peserta = $row["peserta"];
                $tingkat_acara = $row["tingkat_acara"];
                $kode_dahan_profesi = $row["kode_dahan_profesi"];
                $dahan_profesi = $row["dahan_profesi"];
                $kode_diklat = $row["kode_diklat"];
                $judul_diklat = $row["judul_diklat"];
                $udiklat = $row["udiklat"];
                $jenis_pelaksanaan = $row["jenis_pelaksanaan"];
                $jenis_sertifikasi = $row["jenis_sertifikasi"];
                $sifat_diklat = $row["sifat_diklat"];
                $identity_pln_group = "1006";
                if($i>1){
                    $datanya .= ',';    
                }
                $datanya .= '
                    {
                        "startDate": "'.$start_date.'",
                        "endDate": "'.$end_date.'",
                        "nip": "'.$nip.'",
                        "judulAcara": "'.$judul_acara.'",
                        "kodePenyelenggaraan": "'.$kode_penyelenggaraan.'",
                        "lokasi": "'.$lokasi.'",
                        "peserta": "'.$peserta.'",
                        "kodeTingkatAcara": "'.$tingkat_acara.'",
                        "kodeDahanProfesi": "'.$kode_dahan_profesi.'",
                        "kodeDiklat": "'.$kode_diklat.'",
                        "judulDiklat": "'.$judul_diklat.'",
                        "udiklat": "'.$udiklat.'",
                        "kodeJenisPelaksanaan": "'.$jenis_pelaksanaan.'",
                        "kodeJenisSertifikat": "'.$jenis_sertifikasi.'",
                        "kodeSifatDiklat": "'.$sifat_diklat.'",
                        "kodePlnGroup": "'.$identity_pln_group.'"
                    }';
                $i++; 
            } 
            $datanya .= "]";   
            $request->setBody($datanya);
            try {
                $response = $request->send();
                if (200 == $response->getStatus()) {
                    //echo $response->getBody();
                    $str=str_replace("\r\n","",$response->getBody());
                    $array_response = json_decode($str, true);
                    $statusnya = $array_response['success'];
                    if($statusnya==true){
                        $sql2 = "update r_pembicara set status_edit='0',tgl_edit='',user_edit='' where nip='$nip'";
                        $result2 = @mysqli_query($koneksi,$sql2);
                    }
                    $pesan .= $response->getBody();
                    $status = $response->getStatus();
                    $keterangan = "Sukses";
                } else {
                    $pesan .= 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .$response->getReasonPhrase();
                    $status = $response->getStatus();
                    $keterangan = $response->getReasonPhrase();

                }
            } catch (HTTP_Request2_Exception $e) {
                $pesan .= 'Error: ' . $e->getMessage();
                $status = "Undefined";
                $keterangan = 'Error: ' . $e->getMessage();
            }        
            $sql1 = "insert into history_update";
            $sql1 .= "(nama_tabel,id_data,tgl_perubahan,user_perubahan,tgl_update_sap,user_update_sap,status,keterangan)";
            $sql1 .= " values('r_pembicara','$nip','','','$hari_ini','$userhris','$status','$keterangan')";
            $result1 = @mysqli_query($koneksi,$sql1);
        }
    } else {
        //echo json_encode(array('resultMsg'=>'Token belum ada atau kadaluarsa!'));
        $pesan = 'Token belum ada atau kadaluarsa!';
    }
    echo json_encode(array('resultMsg'=>$pesan));
}
?>