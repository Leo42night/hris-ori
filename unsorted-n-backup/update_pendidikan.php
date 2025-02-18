<?php 
require '../vendor/autoload.php';
require_once '../vendor/pear/http_request2/HTTP/Request2.php'; // Only when installed with PEAR
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

    include '../koneksi.php';

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
        $request -> setUrl($baseurl."/api/pendidikan/save");
        $request -> setMethod(HTTP_Request2::METHOD_POST);
        $request -> setConfig(array(
            'follow_redirects' => TRUE
        ));

        $request->setHeader(array(
            'Authorization' => $tokennya,
            'content-Type' => 'application/json'
        ));

        
        $i=1;
        $rs32 = mysqli_query($koneksi,"select * from r_pendidikan where status_edit='1' order by id asc");
        while($row = mysqli_fetch_array($rs32)){
            //$row = mysqli_fetch_array($rs32);
            $id = intval($row['id']);
            $tgl_edit = $row['tgl_edit'];
            $user_edit = $row['user_edit'];
            $nip = $row['nip'];
            $start_date = TanggalIndo2($row["start_date"]);
            $end_date = TanggalIndo2($row["end_date"]);
            $keterangan_pendidikan = $row["keterangan_pendidikan"];
            $jenis_pendidikan = $row["jenis_pendidikan"];
            //$judul_kursus = $row["judul_kursus"];
            $jurusan = $row["jurusan"];        
            $nama_institusi = $row["nama_institusi"];
            $kota_institusi = $row["kota_institusi"];
            $kota_institusi_lainnya = $row["kota_institusi_lainnya"];
            $negara_institusi = $row["negara_institusi"];
            $lama_pendidikan = $row["lama_pendidikan"];
            $satuan_lama_pendidikan = $row["satuan_lama_pendidikan"];
            $nilai = $row["nilai"];
            $identity_pln_group = "1006";
            $kode_transaksi = $row["kode_transaksi"];
            $datanya = "";
            $datanya .= '
            {
                "startDate": "'.$start_date.'",
                "endDate": "'.$end_date.'",
                "nip": "'.$nip.'",
                "kodeKetPendidikan": "'.$keterangan_pendidikan.'",
                "kodeJenisPendidikan": "'.$jenis_pendidikan.'",
                "jurusan": "'.$jurusan.'",
                "namaInstitusiPendidikan": "'.$nama_institusi.'",
                "kodeKotaKabupaten": "'.$kota_institusi.'",
                "kotaInstitusiPendidikanLain": "'.$kota_institusi_lainnya.'",
                "kodeNegara": "'.$negara_institusi.'",
                "angkaLamaPendidikan": 0,
                "kodeSatuanLama": "'.$satuan_lama_pendidikan.'",
                "nilai": "'.$nilai.'",
                "kodeTransaksi": "'.$kode_transaksi.'",
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
                        $sql2 = "update r_pendidikan set status_edit='0',tgl_edit='',user_edit='' where id=$id";
                        $result2 = @mysqli_query($koneksi,$sql2);
                    }
                    $pesan = $response->getBody();
                    $status = "200";
                    $keterangan = "Sukses";
                } else {
                    $pesan = 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .$response->getReasonPhrase();
                    $status = $response->getStatus();
                    //$keterangan = $response->getReasonPhrase();
                    $keterangan = $response->getBody();

                }
            } catch (HTTP_Request2_Exception $e) {
                $pesan = 'Error: ' . $e->getMessage();
                $status = "Undefined";
                $keterangan = 'Error: ' . $e->getMessage();
            }
            
            $sql1 = "insert into history_update";
            $sql1 .= "(nama_tabel,id_data,tgl_perubahan,user_perubahan,tgl_update_sap,user_update_sap,status,keterangan)";
            $sql1 .= " values('r_pendidikan','$id','$tgl_edit','$user_edit','$hari_ini','$userhris','$status','$keterangan')";
            $result1 = @mysqli_query($koneksi,$sql1);
        }
    } else {
        //echo json_encode(array('resultMsg'=>'Token belum ada atau kadaluarsa!'));
        $pesan = 'Token belum ada atau kadaluarsa!';
    }
    echo json_encode(array('resultMsg'=>$pesan));
}
?>