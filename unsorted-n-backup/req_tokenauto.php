<?php 
require '../vendor/autoload.php';
require_once '../vendor/pear/http_request2/HTTP/Request2.php'; // Only when installed with PEAR
date_default_timezone_set("Asia/Jakarta");   
include '../koneksi.php';
$hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
$tgl_expire = date('Y-m-d H:i:s', strtotime($hari_ini. ' + 8 hours'));

$rs30 = mysqli_query($koneksi,"select * from baseurl_api order by id desc limit 1");
$hasil30 = mysqli_fetch_array($rs30);
if($hasil30){
    $baseurl = $hasil30['baseurl'];
} else {
    $baseurl = "";
}    

$request = new HTTP_Request2();
//$request -> setUrl('http://10.1.85.207:7071/api/auth/login');
// $request -> setUrl('http://10.1.85.223:7071/api/auth/login');
$request -> setUrl($baseurl.'/api/auth/login');
$request -> setMethod(HTTP_Request2::METHOD_POST);
$request -> setConfig(array(
    'ssl_verify_peer'   => FALSE,
    'ssl_verify_host'   => FALSE,
    'follow_redirects' => TRUE
));
$request -> setHeader(array(
    'content-Type' => 'application/json'
));

$request->setBody('{"username": "plntarakan","password": "ftp@hrd2022!"}');
//$request->setBody('{"username": "plnt.gerry.pratama","password": "Kadal@2022#"}');
try {
    $response = $request->send();
    if (200 == $response->getStatus()) {
        //echo $response->getBody();
        $str=str_replace("\r\n","",$response->getBody());
        $array_response = json_decode($str, true);
        $jwtToken = $array_response['jwtToken'];  
        $refreshToken = $array_response['refreshToken'];  
        $sql2 = "delete from akses_token";
        $result = @mysqli_query($koneksi,$sql2);

        $sql = "insert into akses_token(jwtToken,refreshToken,last_generated,tgl_expire) values('$jwtToken','$refreshToken','$hari_ini','$tgl_expire')";
        $result = @mysqli_query($koneksi,$sql);
        if($result){
            $pesan = "jwtToken : ".$jwtToken."<br/> refreshToken : ".$refreshToken;
        } else {
            $pesan = 'Gagal update token';
            //echo json_encode(array('errorMsg'=>$pesan));
        }

    } else {
        $pesan = 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .$response->getReasonPhrase();
        //echo json_encode(array('errorMsg'=>$pesan));
    }
} catch (HTTP_Request2_Exception $e) {
    $pesan = 'Error: ' . $e->getMessage();
    //echo json_encode(array('errorMsg'=>$pesan));
}
// echo json_encode(array('resultMsg'=>$pesan));
// echo json_encode(array('resultMsg'=>'sukses'));
?>