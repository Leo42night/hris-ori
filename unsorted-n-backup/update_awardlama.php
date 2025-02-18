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
        $request -> setUrl("http://10.1.85.207:7071/api/awards/save-batch");
        $request -> setMethod(HTTP_Request2::METHOD_POST);
        $request -> setConfig(array(
            'follow_redirects' => TRUE
        ));

        $request->setHeader(array(
            'Authorization' => $tokennya,
            'content-Type' => 'application/json'
        ));

        $datanya = "[";
        $idnya = "";
        $tgl_editnya = "";
        $user_editnya = "";
        $i=1;
        $rs32 = mysqli_query($koneksi,"select * from r_award where status_edit='1' order by id asc limit 1");
        while($row = mysqli_fetch_array($rs32)){
            //$row = mysqli_fetch_array($rs32);
            $id = intval($row['id']);
            $tgl_edit = $row['tgl_edit'];
            $user_edit = $row['user_edit'];
            $nip = $row['nip'];
            $start_date = TanggalIndo2($row["start_date"]);
            $end_date = TanggalIndo2($row["end_date"]);
            $kode_award = $row["kode_award"];
                $rs2 = mysqli_query($koneksi,"select * from m_jenis_award where kode_award='$kode_award'");
                $hasil2 = mysqli_fetch_array($rs2);
                $jenis_award = stripslashes ($hasil2['label']);
            $uraian_award = $row["uraian_award"];
            $no_sk_penghargaan = $row["no_sk_penghargaan"];
            $tgl_sk_penghargaan = TanggalIndo2($row["tgl_sk_penghargaan"]);
            $tingkat_acara = $row["tingkat_acara"];
            $diberikan_oleh = $row["diberikan_oleh"];
            $identity_pln_group = "1006";
            /*
            if($i>1){
                $datanya .= ',';   
                $idnya .= ','.$id;
                //$tgl_editnya .= ','.$tgl_edit;
                //$user_editnya .= ','.$user_edit;
            } else {
                $datanya .= '';   
                $idnya .= $id;
                //$tgl_edit .= $tgl_edit;
                //$user_editnya .= $user_edit;
            }
            */
            $datanya .= '
            {
                "startDate": "'.$start_date.'",
                "endDate": "'.$end_date.'",
                "nip": "'.$nip.'",
                "kodeJenisAwards": "'.$kode_award.'",
                "awardsText": "'.$uraian_award.'",
                "noSkPenghargaan": "'.$no_sk_penghargaan.'",
                "tglSkPenghargaan": "'.$tgl_sk_penghargaan.'",
                "kodeTingkatAcara": "'.$tingkat_acara.'",
                "diberikanOleh": "'.$diberikan_oleh.'",
                "kodePlnGroup": "'.$identity_pln_group.'"
            }';
            $i++; 
        }  
        $datanya .= "]";  
        $request->setBody($datanya);
        try {
            $response = $request->send();
            if (200 === $response->getStatus()) {
            //if ($response->getStatus()===200) {
                //echo $response->getBody();
                $str=str_replace("\r\n","",$response->getBody());
                $array_response = json_decode($str, true);
                $statusnya = $array_response['status'];
                if(intval($statusnya)!=500){
                    $idnya2 = explode(",", $idnya);
                    foreach($idnya2 as $idnya3){                        
                        //$sql2 = "update r_award set status_edit='0',tgl_edit='',user_edit='' where id=$idnya3";
                        //$result2 = @mysqli_query($koneksi,$sql2);    
                    }
                }
                
                //$pesan = $response->getBody().' Statusnya : '.$response->getStatus();
                $pesan = $response->getBody();
                //$pesan = 'Sukses update data';
                /*
                $str=str_replace("\r\n","",$response->getBody());
                $array_response = json_decode($str, true);
                $array_response2 = $array_response['data'];
                $pesan = "";
                foreach($array_response2 as $item) {
                    $pesan .= $item['nip']."<br/>";
                }
                */
                $status = $response->getStatus();
                //$keterangan = "Sukses";
                $keterangan = $pesan;
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
        $sql1 .= " values('r_award','$idsnya2','$tgl_edit','$user_edit','$hari_ini','$userhris','$status','$keterangan')";
        $result1 = @mysqli_query($koneksi,$sql1);
        */
        //echo json_encode(array('resultMsg'=>$pesan));
    } else {
        //echo json_encode(array('resultMsg'=>'Token belum ada atau kadaluarsa!'));
        $pesan = 'Token belum ada atau kadaluarsa!';
    }
    echo json_encode(array('resultMsg'=>$pesan));
}
?>