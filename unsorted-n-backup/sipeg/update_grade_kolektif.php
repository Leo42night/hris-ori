<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";
    date_default_timezone_set("Asia/Jakarta");
    $sukses = 0;
    $gagal = 0;
    $sqljns = mysqli_query ($koneksi,"SELECT nip,grade FROM data_pegawai ORDER BY id ASC");
    while ($hasiljns = mysqli_fetch_array ($sqljns)) {
        $nip = stripslashesx ($hasiljns['nip']);
        // $grade = stripslashesx ($hasiljns['grade']);

        $rs2 = mysqli_query($koneksi,"select * from r_grade where nip='$nip' order by start_date desc limit 1");
        $hasil2 = mysqli_fetch_array($rs2);
        if($hasil2){
            $grade = stripslashesx($hasil2['grade']);

            $sql = "update data_pegawai set grade='$grade' where nip='$nip'";
            $result = @mysqli_query($koneksi,$sql);  
            if($result){
                $sukses++;
            } else {
                $gagal++;
            }
        }
    }
    echo "Sukses : $sukses, Gagal : $gagal";
}    
?>