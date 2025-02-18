<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://10.1.85.223:7071/api/keluarga/save",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{
    'startDate': '02.05.2023',
    'endDate': '31.12.9999',
    'nip': '92161372ZY',
    'kodeJenisKeluarga': '2',
    'noUrutKeluarga': '3',
    'namaKeluarga': 'MUHAMMAD ZAYDEN ALVARO',
    'kodeJenisKelamin': 'JK1',
    'tempatLahir': 'PONTIANAK',
    'tanggalLahir': '02.05.2023',
    'kodeAgama': 'ISL',
    'pekerjaan': 'BELUM BEKERJA',
    'kodePlnGroup': '1006',
    'nipKeluarga': '',
    'kodeStatusKewarganegaraan': 'SK1',
    'kodeJenisAlamat': 'JA1',
    'alamat': 'Jl. Nuri V Blok J2 No.32 Perum BDS 2',
    'kodeProvinsi': '64',
    'kodeKotaKabupaten': '6471',
    'kodePos': '76114',
    'noKk': '3173011207220043',
    'noNikKeluarga': '3173010205230006',
    'noNpwpKeluarga': '',
    'noTelpKeluarga': '0',
    'kodeGolonganDarah': '',
    'noBpjsKesehatanKeluarga': '',
    'kodeStatusFasilitasKesehatan': '',
    'noAkta': '',
    'kodePerusahaan': '',
    'workInPlnGroup': false
    }",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJwbG50YXJha2FuIiwiaWRfcGxuX2dyb3VwIjoiZjdhY2JiMTUtMzMzYS00ZTU5LWE4YWUtZjUzMmJkZGUxMWZlIiwicm9sZSI6W3siaWQiOiJmZDBkOGZhNC0yMjI3LTQ0ZTItYjdlZi0wYTM1ZDkwMjI0ZjgiLCJuYW1lIjoiQWRtaW4gQVAiLCJrZXRlcmFuZ2FuIjoiQW5hayBQZXJ1c2FoYWFuIiwiaXNBY3RpdmUiOnRydWV9XSwia29kZV9wbG5fZ3JvdXAiOiIxMDA2IiwiaWRfdXNlciI6ImEwMTE0ZjRkLWMxMzAtNGU5Yy05ZGIxLTBiMGQ5MmExOTIwZSIsInR5cGUiOiJhY2Nlc3MiLCJuaXAiOiIiLCJmdWxsbmFtZSI6IiIsImV4cCI6MTczMTQyMzAwOSwiaWF0IjoxNzMxMzk0MjA5LCJlbWFpbCI6InBsbnRhcmFrYW5AZ21haWlsLmNvbSIsInVzZXJuYW1lIjoicGxudGFyYWthbiIsInN0YXR1cyI6IkFETUlOX0FQIn0.R4mXER6EahUKqGI_DQgsRmb8ju1Tp-L_52xChiFTjRA",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
// $err = curl_error($curl);

curl_close($curl);
echo $response;
// if ($err) {
//   echo "cURL Error :".$err;
// } else {
//   echo $response;
// }
?>