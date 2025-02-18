<?php
session_start();
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
$nip = $_REQUEST['nip'];
$token = $_REQUEST['token'];
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
    $rs = mysqli_query($koneksi,"select * from masteruser where user_name='$nip' and aktif='1'");
    $hasil = mysqli_fetch_array($rs);
    if($hasil){
      $_SESSION["isLoggedInhris"]=1;
      $_SESSION["userakseshris"]=$hasil['user_name'];
      $_SESSION["superadminhris"]=$hasil['superadmin'];
      $_SESSION["namahris"]=$hasil['user_fullname'];
      $_SESSION["jabatanhris"]=$hasil['jabatan'];
      $_SESSION["emailhris"]=$hasil['user_email'];
      header('Location: index.php');
    } else {
      $_SESSION["isLoggedInhris"]=0;
      header('Location: login.php');
    }  
  } else {
    $_SESSION["isLoggedInhris"]=0;
    header('Location: login.php');
  }
} else {
  $_SESSION["isLoggedInhris"]=0;
  header('Location: login.php');
}
// echo json_encode($returnData);
?>