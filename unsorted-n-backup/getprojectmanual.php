<?php 
date_default_timezone_set("Asia/Jakarta");
include 'koneksi.php';
include 'koneksi_sipeg.php';

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://arunika.pln-t.net/teams/v1/ProjectSap',
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
    )
));

$response = curl_exec($curl);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
$pesan = "";
if((int)$httpCode===200 || (int)$httpCode===201) {
    $array_response = json_decode($response);
    $data1 = $array_response->data;
    foreach($data1 as $data2){
        $kd_project = $data2->kd_project;
        $nama_project = $data2->nama_project;
        $status = $data2->status;

        $sql3 = "insert into data_project(kd_project_sap,nama_project,status) values('$kd_project','$nama_project','$status')";
        $sql3 .= " on duplicate key update nama_project='$nama_project',status='$status'";
        $result3 = @mysqli_query($koneksi_sipeg,$sql3);
    }
    $pesan .= "Sukses Load Project";
} else {
    $pesan .= $response;
}
//echo $response;
echo json_encode(array('resultMsg'=>$pesan));
?>