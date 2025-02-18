<?php
// error_reporting(0);
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: access");
// header("Access-Control-Allow-Methods: POST");
// header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
//require __DIR__.'/classes/Database.php';
date_default_timezone_set('Asia/Bangkok');
require 'koneksi.php';
$website_id = "9b5dc610-623f-4222-9fc6-f309183724db";
$nip = $_POST['nip'];
$token = $_POST['token'];
$rs1 = mysqli_query($koneksi,"select * from masteruser where user_name='$nip' and aktif='1'");
$hasil1 = mysqli_fetch_array($rs1);
if($hasil1){
    $hasilcek = 1;
    $response = [
        'id' => $hasil1['id'],
        'name' => $hasil1['user_fullname'],
        'nip' => null,
        'username' => $hasil1['user_name'],
        'md5_password' => $hasil1['user_pass'],
        'email' => $hasil1['user_email'],
        'email_verified_at' => null,
        'phone' => null,
        'address' => null,
        'photo' => null,
        'birthplace' => null,
        'birthdate' => null,
        'gender' => null,
        'position' => null,
        'kelompok' => null,
        'admin' => null,
        'superadmin' => $hasil1['superadmin'],
        'kd_akses' => null,
        'kd_region' => null,
        'kd_area' => null,
        'kd_unit' => null,
        'aktif' => $hasil1['aktif'],
        'created_at' => null,
        'updated_at' => null,
        'deleted_at' => null
    ];                
} else {
    $hasilcek = 0;
    $response = [];
}

if($hasilcek==1){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://next.plnnusadaya.co.id/api/sso/check-token",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "website_id" : "'.$website_id.'",
            "token" : "'.$token.'"
        }',
        CURLOPT_HTTPHEADER => array(
            // 'Expect:',
            'Content-Type: application/json'
            // 'Content-Type: text/plain'
        )
    ));

    $response4 = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);                

    if(intval($httpCode)==200 || intval($httpCode)==201){
        $data2 = json_decode($response4);
        $status = $data2->status;
        $pesan = $data2->message;
        $data = $data2->data;
        $datanya[] = $response;
        if(intval($data==1)){        
            http_response_code(200); 
            $returnData=array(
                'status' => true,
                'message' => 'Hasil pencarian user.',
                'data' => $response
            );
            header('Content-Type: application/json'); 
        } else {
            http_response_code(401); 
            $returnData=array(
                'status' => false,
                'message' => $pesan,
                'data' => null
            );
            header('Content-Type: application/json'); 
        }
    } else {
        http_response_code(500); 
        $returnData=array(
            'status' => false,
            'message' => 'User tidak ditemukan.',
            'data' => null
        );
        header('Content-Type: application/json'); 
    }
    // echo "sukses ".intval($data)." ".$response4;   
} else {
    // echo "gagal ".$response4; 
    http_response_code(500); 
    $returnData=array(
        'status' => false,
        'message' => 'User tidak ditemukan.',
        'data' => null
    );
    header('Content-Type: application/json'); 
}
// echo json_encode($returnData);
// echo $httpCode." ".json_decode($response4);
// header('Content-Type: application/json');    
// $data2 = $response4;
// $message = $data2->message;
// echo (json_validator($response4) ? "JSON is Valid\n" : "JSON is Not Valid\n"); 
// echo $response4;
echo json_encode($returnData);
?>