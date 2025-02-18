<?php 
date_default_timezone_set("Asia/Jakarta");
include '../koneksi.php';
$hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
$tgl_expire = date('Y-m-d H:i:s', strtotime($hari_ini. ' + 8 hours'));

$url = 'http://10.1.85.223:7071/api/auth/login';
//$url = 'http://10.1.85.221:7071/api/auth/login';
//$url = 'http://10.1.88.221/api/auth/login';
$data = array(
    'username' => 'plntarakan',
    'password' => 'ftp@hrd2022!'
);
$payload = json_encode($data);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json'
));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$response = curl_exec($ch);
curl_close($ch);
$array = json_decode($response);
$jwtToken = $array->jwtToken;
$refreshToken = $array->refreshToken;
if($jwtToken!=""){
    $sql2 = "delete from akses_token";
    $result = @mysqli_query($koneksi,$sql2);

    $sql = "insert into akses_token(jwtToken,refreshToken,last_generated,tgl_expire) values('$jwtToken','$refreshToken','$hari_ini','$tgl_expire')";
    $result = @mysqli_query($koneksi,$sql);
}
echo $response;
?>