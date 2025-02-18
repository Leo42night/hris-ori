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

    if($jwtToken!=""){
        $tokennya = "Bearer ".$jwtToken;
        $request = new HTTP_Request2();
        $request -> setUrl($baseurl."/api/sertifikasi-kompetensi/save-batch");
        $request -> setMethod(HTTP_Request2::METHOD_POST);
        $request -> setConfig(array(
            'follow_redirects' => TRUE
        ));

        $request->setHeader(array(
            'Authorization' => $tokennya,
            'content-Type' => 'application/json'
        ));

        $rs31 = mysqli_query($koneksi,"select nip from r_sertifikat where status_edit='1' group by nip order by nip asc");
        while($row1 = mysqli_fetch_array($rs31)){
            $nip = $row1['nip'];

            $datanya = "[";
            $i=1;
            $rs32 = mysqli_query($koneksi,"select * from r_sertifikat where nip='$nip' order by id asc");
            while($row = mysqli_fetch_array($rs32)){
                $id = intval($row['id']);
                $tgl_edit = $row['tgl_edit'];
                $user_edit = $row['user_edit'];
                $nip = $row['nip'];
                $start_date = TanggalIndo2($row["start_date"]);
                $end_date = TanggalIndo2($row["end_date"]);
                $jenis_lembaga = $row["jenis_lembaga"];
                $judul_sertifikasi = $row["judul_sertifikasi"];
                $no_sertifikasi = $row["no_sertifikasi"];
                $kode_profesi_sertifikasi = $row["kode_profesi_sertifikasi"];
                $profesi_sertifikasi = $row["profesi_sertifikasi"];
                $level_profesiensi = $row["level_profesiensi"];
                $nama_institusi = $row["nama_institusi"];
                $kota_institusi = $row["kota_institusi"];
                $kota_institusi_sertifikasi = $row["kota_institusi_sertifikasi"];
                $negara_institusi = $row["negara_institusi"];
                $tgl_mulai = TanggalIndo2($row["tgl_mulai"]);
                $tgl_selesai = TanggalIndo2($row["tgl_selesai"]);
                $nilai_sertifikasi = $row["nilai_sertifikasi"];
                $level_sertifikasi = $row["level_sertifikasi"];
                $lama_sertifikasi = $row["lama_sertifikasi"];
                $satuan_sertifikasi = $row["satuan_sertifikasi"];
                $tgl_expire = TanggalIndo2($row["tgl_expire"]);
                $identity_pln_group = "1006";
                $kode_transaksi = $row["kode_transaksi"];
                if($i>1){
                    $datanya .= ',';    
                }
                $datanya .= '
                {
                    "startDate": "'.$start_date.'",
                    "endDate": "'.$end_date.'",
                    "nip": "'.$nip.'",
                    "kodeJenisLembagaSertifikasi": "'.$jenis_lembaga.'",
                    "kodeLevelProfesiensi": "'.$level_profesiensi.'",
                    "kodeNegara": "'.$negara_institusi.'",
                    "kodeSatuanLama": "'.$satuan_sertifikasi.'",
                    "judulSertifikasi": "'.$judul_sertifikasi.'",
                    "nomorSertifikasi": "'.$no_sertifikasi.'",
                    "kodeProfesiJudulSertifikasi": "'.$kode_profesi_sertifikasi.'",
                    "profesiJudulSertifikasi": "'.$profesi_sertifikasi.'",
                    "namaInstitusiSertifikasi": "'.$nama_institusi.'",
                    "kodeKotaKabupaten": "'.$kota_institusi.'",
                    "kotaInstitusiPendidikanLain": "'.$kota_institusi_sertifikasi.'",
                    "tglMulaiSertifikasi": "'.$tgl_mulai.'",
                    "tglSelesaiSertifikasi": "'.$tgl_selesai.'",
                    "angkaLamaSertifikasi": "'.$lama_sertifikasi.'",
                    "nilaiSertifikasi": "'.$nilai_sertifikasi.'",
                    "kodeLevelSertifikasi": "'.$level_sertifikasi.'",
                    "tanggalExpiredSertifikat": "'.$tgl_expire.'",
                    "kodeTransaksi": "'.$kode_transaksi.'",
                    "kodePlnGroup": "'.$identity_pln_group.'"
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
                        $sql2 = "update r_sertifikat set status_edit='0',tgl_edit='',user_edit='' where nip='$nip'";
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
            $sql1 .= " values('r_sertifikat','$nip','','','$hari_ini','$userhris','$status','$keterangan')";
            $result1 = @mysqli_query($koneksi,$sql1);
        }
    } else {
        $pesan = 'Token belum ada atau kadaluarsa!';
    }
    echo json_encode(array('resultMsg'=>$pesan));
}
?>