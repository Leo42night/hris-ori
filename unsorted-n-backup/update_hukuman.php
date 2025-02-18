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
    $rs31 = mysqli_query($koneksi,"select * from akses_token where tgl_expire>'$hari_ini' order by id desc limit 1");
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
        $request -> setUrl($baseurl."/api/grievances/save-batch");
        $request -> setMethod(HTTP_Request2::METHOD_POST);
        $request -> setConfig(array(
            'follow_redirects' => TRUE
        ));

        $request->setHeader(array(
            'Authorization' => $tokennya,
            'content-Type' => 'application/json'
        ));

        $rs31 = mysqli_query($koneksi,"select nip from r_hukuman where status_edit='1' group by nip order by nip asc");
        while($row1 = mysqli_fetch_array($rs31)){
            $nip = $row1['nip'];

            $datanya = "[";
            $i=1;
            $rs32 = mysqli_query($koneksi,"select * from r_hukuman where nip='$nip' order by id asc");
            while($row = mysqli_fetch_array($rs32)){
                $id = intval($row['id']);
                $tgl_edit = $row['tgl_edit'];
                $user_edit = $row['user_edit'];
                $nip = $row['nip'];
                $start_date = TanggalIndo2($row["start_date"]);
                $end_date = TanggalIndo2($row["end_date"]);
                $jenis_grievances = $row["jenis_grievances"];
                $reason_grievances = $row["reason_grievances"];
                $nip_atasan = $row["nip_atasan"];
                $nama_atasan = $row["nama_atasan"];
                $status_grievances = $row["status_grievances"];
                $stage_grievances = $row["stage_grievances"];
                $result_grievances = $row["result_grievances"];
                $rupiah = $row["rupiah"];
                $no_sk_hukuman = $row["no_sk_hukuman"];
                $tgl_sk_hukuman = TanggalIndo2($row["tgl_sk_hukuman"]);
                $pasal_pelanggaran = $row["pasal_pelanggaran"];
                $hukuman = $row["hukuman"];
                $keterangan = $row["keterangan"];
                $no_sk_terkait = $row["no_sk_terkait"];
                $identity_pln_group = "1006";
                if($i>1){
                    $datanya .= ',';    
                }
                $datanya .= '
                {
                    "startDate": "'.$start_date.'",
                    "endDate": "'.$end_date.'",
                    "nip": "'.$nip.'",
                    "kodeJenisGrievances": "'.$jenis_grievances.'",
                    "kodeReasonGrievances": "'.$reason_grievances.'",
                    "kodeStatusGrievances": "'.$status_grievances.'",
                    "kodeStage": "'.$stage_grievances.'",
                    "kodeResult": "'.$result_grievances.'",
                    "nipAtasan": "'.$nip_atasan.'",
                    "namaAtasan": "'.$nama_atasan.'",
                    "noSkHukuman": "'.$no_sk_hukuman.'",
                    "tglSkHukuman": "'.$tgl_sk_hukuman.'",
                    "pasalYgDilanggar": "'.$pasal_pelanggaran.'",
                    "hukuman": "'.$hukuman.'",
                    "keterangan": "'.$keterangan.'",
                    "noSkTerkait": "'.$no_sk_terkait.'",
                    "kodePlnGroup": "'.$identity_pln_group.'",
                    "rupiah": "'.$rupiah.'"
                }';
                $i++; 
            }  
            $datanya .= "]";  
            $request->setBody($datanya);
            try {
                $response = $request->send();
                if (200 === $response->getStatus()) {
                    //echo $response->getBody();
                    $str=str_replace("\r\n","",$response->getBody());
                    $array_response = json_decode($str, true);
                    $statusnya = $array_response['success'];
                    if($statusnya==true){
                        $sql2 = "update r_hukuman set status_edit='0',tgl_edit='',user_edit='' where nip='$nip'";
                        $result2 = @mysqli_query($koneksi,$sql2);
                    }
                    $pesan = $response->getBody();
                    $status = $response->getStatus();
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
            $sql1 .= " values('r_hukuman','$nip','','','$hari_ini','$userhris','$status','$keterangan')";
            $result1 = @mysqli_query($koneksi,$sql1);
        }
    } else {
        //echo json_encode(array('resultMsg'=>'Token belum ada atau kadaluarsa!'));
        $pesan = 'Token belum ada atau kadaluarsa!';
    }
    echo json_encode(array('resultMsg'=>$pesan));
}
?>