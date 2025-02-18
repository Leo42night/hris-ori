<?php 
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: access");
// header("Access-Control-Allow-Methods: POST");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

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

    if($jwtToken!=""){
        $tokennya = "Bearer ".$jwtToken;
        $request = new HTTP_Request2();
        $request -> setUrl($baseurl."/api/keluarga/save");
        $request -> setMethod(HTTP_Request2::METHOD_POST);
        $request -> setConfig(array(
            'follow_redirects' => TRUE
        ));

        $request->setHeader(array(
            //'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJwbG50YXJha2FuIiwiaWRfcGxuX2dyb3VwIjoiZjdhY2JiMTUtMzMzYS00ZTU5LWE4YWUtZjUzMmJkZGUxMWZlIiwicm9sZSI6W3siaWQiOiJmZDBkOGZhNC0yMjI3LTQ0ZTItYjdlZi0wYTM1ZDkwMjI0ZjgiLCJuYW1lIjoiQWRtaW4gQVAiLCJrZXRlcmFuZ2FuIjoiQW5hayBQZXJ1c2FoYWFuIiwiaXNBY3RpdmUiOnRydWV9XSwia29kZV9wbG5fZ3JvdXAiOiIxMDA2IiwiaWRfdXNlciI6ImEwMTE0ZjRkLWMxMzAtNGU5Yy05ZGIxLTBiMGQ5MmExOTIwZSIsInR5cGUiOiJhY2Nlc3MiLCJuaXAiOiIxMjM0NSIsImZ1bGxuYW1lIjoiUExOIFRBUkFLQU4iLCJleHAiOjE2NjkwNTE1MjYsImlhdCI6MTY2OTAyMjcyNiwiZW1haWwiOiJwbG50YXJha2FuQGdtYWlpbC5jb20iLCJ1c2VybmFtZSI6InBsbnRhcmFrYW4iLCJzdGF0dXMiOiJBRE1JTl9BUCJ9.d40wle_pvtdz7r7uDucO3Mk5jeJ6jP8T1sF_yEql2E0',
            'Expect:',
            'Authorization' => $tokennya,
            'content-Type' => 'application/json'
        ));

        
        $i=1;
        $rs32 = mysqli_query($koneksi,"select * from r_keluarga where status_edit='1' order by id asc");
        while($row = mysqli_fetch_array($rs32)){
            //$row = mysqli_fetch_array($rs32);
            $id = intval($row['id']);
            $tgl_edit = $row['tgl_edit'];
            $user_edit = $row['user_edit'];
            $nip = $row['nip'];
            $start_date = TanggalIndo2($row["start_date"]);
            $end_date = TanggalIndo2($row["end_date"]);
            $id_jenis_keluarga = $row["id_jenis_keluarga"];
            $no_urut = $row["no_urut"];
            $nama = $row["nama"];
            $jenis_kelamin = $row["jenis_kelamin"];
            $tempat_lahir = $row["tempat_lahir"];
            $tgl_lahir = TanggalIndo2($row["tgl_lahir"]);
            $id_agama = $row["id_agama"];
            $pekerjaan = $row["pekerjaan"];
            $pln_group = $row["pln_group"];
            if($pln_group=="TIDAK"){
                $workInPlnGroup = "false";
            } else {
                $workInPlnGroup = "true";
            }
            $kode_perusahaan = $row["kode_perusahaan"];
            $nip_keluarga = $row["nip_keluarga"];
            $status_warganegara = $row["status_warganegara"];
            $jenis_alamat = $row["jenis_alamat"];
            $alamat = $row["alamat"];
            $id_provinsi = $row["id_provinsi"];
            $id_kabupaten = $row["id_kabupaten"];
            $kode_pos = $row["kode_pos"];
            $no_kk = $row["no_kk"];
            $nik = $row["nik"];
            $npwp = $row["npwp"];
            $telepon = $row["telepon"];
            $gol_darah = $row["gol_darah"];
            $no_bpjs_kes = $row["no_bpjs_kes"];
            $status_fasilitas_kesehatan = $row["status_fasilitas_kesehatan"];
            $no_akta = $row["no_akta"];
            $identity_pln_group = "1006";
            // $datanya = "";
            $datanya = '
            {
                "startDate": "'.$start_date.'",
                "endDate": "'.$end_date.'",
                "nip": "'.$nip.'",
                "kodeJenisKeluarga": "'.$id_jenis_keluarga.'",
                "noUrutKeluarga": "'.$no_urut.'",
                "namaKeluarga": "'.$nama.'",
                "kodeJenisKelamin": "'.$jenis_kelamin.'",
                "tempatLahir": "'.$tempat_lahir.'",
                "tanggalLahir": "'.$tgl_lahir.'",
                "kodeAgama": "'.$id_agama.'",
                "pekerjaan": "'.$pekerjaan.'",
                "kodePlnGroup": "'.$identity_pln_group.'",
                "nipKeluarga": "'.$nip_keluarga.'",
                "kodeStatusKewarganegaraan": "'.$status_warganegara.'",
                "kodeJenisAlamat": "'.$jenis_alamat.'",
                "alamat": "'.$alamat.'",
                "kodeProvinsi": "'.$id_provinsi.'",
                "kodeKotaKabupaten": "'.$id_kabupaten.'",
                "kodePos": "'.$kode_pos.'",
                "noKk": "'.$no_kk.'",
                "noNikKeluarga": "'.$nik.'",
                "noNpwpKeluarga": "'.$npwp.'",
                "noTelpKeluarga": "'.$telepon.'",
                "kodeGolonganDarah": "'.$gol_darah.'",
                "noBpjsKesehatanKeluarga": "'.$no_bpjs_kes.'",
                "kodeStatusFasilitasKesehatan": "'.$status_fasilitas_kesehatan.'",
                "noAkta": "'.$no_akta.'",
                "kodePerusahaan": "'.$kode_perusahaan.'",
                "workInPlnGroup": false
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
                        $sql2 = "update r_keluarga set status_edit='0',tgl_edit='',user_edit='' where id=$id";
                        $result2 = @mysqli_query($koneksi,$sql2);
                    }
                    $pesan = $response->getBody();
                    $status = "200";
                    $keterangan = "Sukses";
                } else {
                    $pesan = 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .$response->getReasonPhrase();
                    if($userhris=="sandy"){
                        $pesan .= '<br/>' . $response->getBody();
                        $pesan .= '<br/>' . $datanya;
                    }    
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
            $sql1 .= " values('r_keluarga','$id','$tgl_edit','$user_edit','$hari_ini','$userhris','$status','$keterangan')";
            $result1 = @mysqli_query($koneksi,$sql1);
        }
    } else {
        $pesan = 'Token belum ada atau kadaluarsa!';
    }
    echo json_encode(array('resultMsg'=>$pesan));
}
?>