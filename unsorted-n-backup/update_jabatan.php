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
    $rs31 = mysqli_query($koneksi,"select * from akses_token where tgl_expire>'$hari_ini' order by id desc");
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
        $request -> setUrl($baseurl."/api/riwayat-jabatan/save");
        $request -> setMethod(HTTP_Request2::METHOD_POST);
        $request -> setConfig(array(
            'follow_redirects' => TRUE
        ));

        $request->setHeader(array(
            'Authorization' => $tokennya,
            'content-Type' => 'application/json'
        ));
        
        $i=1;
        $rs32 = mysqli_query($koneksi,"select * from r_jabatan where status_edit='1' order by id asc");
        while($row = mysqli_fetch_array($rs32)){
            //$row = mysqli_fetch_array($rs32);
            $id = intval($row['id']);
            $tgl_edit = $row['tgl_edit'];
            $user_edit = $row['user_edit'];
            $nip = $row['nip'];
            $start_date = TanggalIndo2($row["start_date"]);
            $end_date = TanggalIndo2($row["end_date"]);
            $ee_group = $row["ee_group"];
            $ee_subgroup = $row["ee_subgroup"];
            $job_key = $row["job_key"];
            $jabatan = $row["jabatan"];
            $kota_organisasi = $row["kota_organisasi"];
            //$id_kabupaten = $row["id_kabupaten"];
            $jenis_jabatan = $row["jenis_jabatan"];
            $jenjang_jabatan = $row["jenjang_jabatan"];
            $kode_profesi = $row["kode_profesi"];
            $nama_profesi = $row["nama_profesi"];
            $jenis_unit = $row["jenis_unit"];
            $kelas_unit = $row["kelas_unit"];
            $kode_daerah = $row["kode_daerah"];
            $stream_business = $row["stream_business"];
            $achievements = $row["achievements"];
            $tupoksi = $row["tupoksi"];
            $company_code = $row["company_code"];
            $business_area = $row["business_area"];
            $personal_area = $row["personal_area"];
            $personal_sub_area = $row["personal_sub_area"];
            $level_organisasi1 = $row["level_organisasi1"];
            $level_organisasi2 = $row["level_organisasi2"];
            $level_organisasi3 = $row["level_organisasi3"];
            $level_organisasi4 = $row["level_organisasi4"];
            $level_organisasi5 = $row["level_organisasi5"];
            $level_organisasi6 = $row["level_organisasi6"];
            $level_organisasi7 = $row["level_organisasi7"];
            $level_organisasi8 = $row["level_organisasi8"];
            $level_organisasi9 = $row["level_organisasi9"];
            $level_organisasi10 = $row["level_organisasi10"];
            $level_organisasi11 = $row["level_organisasi11"];
            $level_organisasi12 = $row["level_organisasi12"];
            $level_organisasi13 = $row["level_organisasi13"];
            $level_organisasi14 = $row["level_organisasi14"];
            $level_organisasi15 = $row["level_organisasi15"];
            $tingkat_pengalaman = $row["tingkat_pengalaman"];
            $jenis_jabatan_ap = $row["jenis_jabatan_ap"];
            $jenjang_jabatan_ap = $row["jenjang_jabatan_ap"];
            $kode_posisi = $row["kode_posisi"];
            $identity_pln_group = "1006";
            /*
            if($i>1){
                $datanya .= ',';    
            }
            */
            $datanya = "";
            $datanya .= '
            {
                "startDate": "'.$start_date.'",
                "endDate": "'.$end_date.'",
                "nip": "'.$nip.'",
                "kodeEeGroup": "'.$ee_group.'",
                "kodeEeSubGroup": "'.$ee_subgroup.'",
                "jobKey": "'.$job_key.'",
                "jabatan": "'.$jabatan.'",
                "kodeKotaKabupaten": "'.$kota_organisasi.'",
                "kodeJenisJabatan": "'.$jenis_jabatan.'",
                "kodeJenjangJabatan": "'.$jenjang_jabatan.'",
                "kodeProfesi": "'.$kode_profesi.'",
                "jenisUnit": "'.$jenis_unit.'",
                "kelasUnit": "'.$kelas_unit.'",
                "kodeDaerah": "'.$kode_daerah.'",
                "kodeStreamBusiness": "'.$stream_business.'",
                "achievements": "'.$achievements.'",
                "tupoksi": "'.$tupoksi.'",
                "kodeCompany": "'.$company_code.'",
                "kodeBusinessArea": "'.$business_area.'",
                "kodePersonalArea": "'.$personal_area.'",
                "kodePersonalSubArea": "'.$personal_sub_area.'",
                "levelOrg1": "'.$level_organisasi1.'",
                "levelOrg2": "'.$level_organisasi2.'",
                "levelOrg3": "'.$level_organisasi3.'",
                "levelOrg4": "'.$level_organisasi4.'",
                "levelOrg5": "'.$level_organisasi5.'",
                "levelOrg6": "'.$level_organisasi6.'",
                "levelOrg7": "'.$level_organisasi7.'",
                "levelOrg8": "'.$level_organisasi8.'",
                "levelOrg9": "'.$level_organisasi9.'",
                "levelOrg10": "'.$level_organisasi10.'",
                "levelOrg11": "'.$level_organisasi11.'",
                "levelOrg12": "'.$level_organisasi12.'",
                "levelOrg13": "'.$level_organisasi13.'",
                "levelOrg14": "'.$level_organisasi14.'",
                "levelOrg15": "'.$level_organisasi15.'",
                "kodePosisi": "'.$kode_posisi.'",
                "kodeTingkatPengalaman": "'.$tingkat_pengalaman.'",
                "kodeJenisJabatanAp": "'.$jenis_jabatan_ap.'",
                "kodeJenjangJabatanAp": "'.$jenjang_jabatan_ap.'",
                "organisasi": "",
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
                        $sql2 = "update r_jabatan set status_edit='0',tgl_edit='',user_edit='' where id=$id";
                        $result2 = @mysqli_query($koneksi,$sql2);
                    }
                    $pesan = $response->getBody();
                    //$status = "200";
                    $status = $response->getBody();
                    $keterangan = "Sukses";
                } else {
                    $pesan = 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .$response->getReasonPhrase();
                    $status = $response->getBody();
                    $keterangan = $response->getReasonPhrase();

                }
            } catch (HTTP_Request2_Exception $e) {
                $pesan = 'Error: ' . $e->getMessage();
                //$status = "Undefined";
                $status = $response->getBody();
                $keterangan = 'Error: ' . $e->getMessage();
            }
            
            $sql1 = "insert into history_update";
            $sql1 .= "(nama_tabel,id_data,tgl_perubahan,user_perubahan,tgl_update_sap,user_update_sap,status,keterangan)";
            $sql1 .= " values('r_jabatan','$id','$tgl_edit','$user_edit','$hari_ini','$userhris','$status','$keterangan')";
            $result1 = @mysqli_query($koneksi,$sql1);
        }
    } else {
        //echo json_encode(array('resultMsg'=>'Token belum ada atau kadaluarsa!'));
        $pesan = 'Token belum ada atau kadaluarsa!';
    }
    echo json_encode(array('resultMsg'=>$pesan));
}
?>