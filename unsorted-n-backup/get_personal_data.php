<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/vendor/autoload.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/vendor/pear/http_request2/HTTP/Request2.php"; // Only when installed with PEAR
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");   
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";

    $rs30 = mysqli_query($koneksi,"select * from baseurl_api order by id desc limit 1");
    $hasil30 = mysqli_fetch_array($rs30);
    if($hasil30){
        $baseurl = $hasil30['baseurl'];
    } else {
        $baseurl = "";
    }    

    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    $rs31 = mysqli_query($koneksi,"select * from akses_token order by id desc limit 1");
    $hasil31 = mysqli_fetch_array($rs31);
    if($hasil31){
        $jwtToken = $hasil31['jwtToken'];
    } else {
        $$jwtToken = "";
    }    
    $nip = "9219008ZTY";

    if($jwtToken!=""){
        $tokennya = "Bearer ".$jwtToken;
        $request = new HTTP_Request2();
        $request -> setUrl($baseurl."/api/personal-data/list-by-user?q=id=='$nip'");
        $request -> setMethod(HTTP_Request2::METHOD_GET);
        $request -> setConfig(array(
            'follow_redirects' => TRUE
        ));

        $request->setHeader(array(
            //'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJwbG50YXJha2FuIiwiaWRfcGxuX2dyb3VwIjoiZjdhY2JiMTUtMzMzYS00ZTU5LWE4YWUtZjUzMmJkZGUxMWZlIiwicm9sZSI6W3siaWQiOiJmZDBkOGZhNC0yMjI3LTQ0ZTItYjdlZi0wYTM1ZDkwMjI0ZjgiLCJuYW1lIjoiQWRtaW4gQVAiLCJrZXRlcmFuZ2FuIjoiQW5hayBQZXJ1c2FoYWFuIiwiaXNBY3RpdmUiOnRydWV9XSwia29kZV9wbG5fZ3JvdXAiOiIxMDA2IiwiaWRfdXNlciI6ImEwMTE0ZjRkLWMxMzAtNGU5Yy05ZGIxLTBiMGQ5MmExOTIwZSIsInR5cGUiOiJhY2Nlc3MiLCJuaXAiOiIxMjM0NSIsImZ1bGxuYW1lIjoiUExOIFRBUkFLQU4iLCJleHAiOjE2NjkwNTE1MjYsImlhdCI6MTY2OTAyMjcyNiwiZW1haWwiOiJwbG50YXJha2FuQGdtYWlpbC5jb20iLCJ1c2VybmFtZSI6InBsbnRhcmFrYW4iLCJzdGF0dXMiOiJBRE1JTl9BUCJ9.d40wle_pvtdz7r7uDucO3Mk5jeJ6jP8T1sF_yEql2E0',
            'Authorization' => $tokennya,
            'content-Type' => 'application/json'
        ));
        /*
        $request->setBody('{
        \n "username": "plntarakan",
        \n "password": "ftp@hrd2022!"
        \n }');
        */
        //$request = new HTTP_Request2('http://pear.php.net/', HTTP_Request2::METHOD_GET);
        try {
            $response = $request->send();
            if (200 == $response->getStatus()) {
                //echo $response->getBody();
                $pesan = $response->getBody();
                /*
                $str=str_replace("\r\n","",$response->getBody());
                $array_response = json_decode($str, true);
                $array_response2 = $array_response['data'];
                $pesan = "";
                foreach($array_response2 as $item) {
                    $pesan .= $item['nip']."<br/>";
                }
                */
            } else {
                $pesan = 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .$response->getReasonPhrase();
            }
        } catch (HTTP_Request2_Exception $e) {
            $pesan = 'Error: ' . $e->getMessage();
        }
        echo json_encode(array('resultMsg'=>$pesan));
    } else {
        echo json_encode(array('resultMsg'=>'Token belum ada atau kadaluarsa!'));
    }
}
?>