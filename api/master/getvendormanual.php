<?php 
date_default_timezone_set("Asia/Jakarta");
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
// include 'koneksi_teams.php'; ??? database : team

$rs30 = mysqli_query($koneksi_teams,"select * from baseurl_api where jenis_api='sap' order by id desc limit 1");
$hasil30 = mysqli_fetch_array($rs30);
if($hasil30){
    $baseurl = $hasil30['baseurl'];
    $SessionId = $hasil30['SessionId'];
} else {
    $baseurl = "";
    $SessionId = "";
}    
$tokennya = "B1SESSION=".$SessionId;
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $baseurl.'/BusinessPartners?$filter=startswith(CardCode,\'VE00000001\')&$orderby=CardName',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Cookie: '.$tokennya
    ),
));

$response = curl_exec($curl);
$responseInfo = curl_getinfo($curl);
$httpCode = $responseInfo['http_code'];
curl_close($curl);
$pesan = "";
if((int)$httpCode===200 || (int)$httpCode===201) {          
    $array_response = json_decode($response);
    $data1 = $array_response->value;
    foreach($data1 as $data2){
        $CardCode = $data2->CardCode;
        $CardName = $data2->CardName;
        $valid = $data2->Valid;
        if($CardCode!="" && $CardCode!=null && $CardName!="" && $CardName!=null){
            $sql9 = "insert into data_vendor(kd_vendor,nama_vendor,valid) values('$CardCode','$CardName','$valid')";
            $sql9 .= " on duplicate key update nama_vendor='$CardName',valid='$valid'";
            $result9 = @mysqli_query($koneksi,$sql9);
            if($result9){
                $pesan .= "Sukses Load Vendor";                
            }
        }                
    }
} else {
    $pesan .= $response;
}
echo json_encode(array('resultMsg'=>$pesan));
?>