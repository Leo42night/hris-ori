<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    date_default_timezone_set("Asia/Jakarta");
    $hari_ini = date("Y-m-d H:i:s", strtotime("+1 hour"));
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";

    $sukses = 0;
    $gagal = 0;
    $rs = mysqli_query($koneksi,"select * from data_pegawai order by id asc");
    while ($hasil = mysqli_fetch_array($rs)) {
        $id = stripslashes ($hasil['id']);
        $nip = stripslashes ($hasil['nip']);
        $tgl_lahir = stripslashes ($hasil['tgl_lahir']);
        $id_agama = stripslashes ($hasil['id_agama']);
        $tgl_masuk = strtoupper(stripslashes ($hasil['tgl_masuk']));
        $tgl_capeg = stripslashes ($hasil['tgl_capeg']);
        $tgl_tetap = stripslashes ($hasil['tgl_tetap']);
        if($tgl_tetap!=""){
            $tahun_pengangkatan = substr($tgl_tetap,0,4);
        } else {
            $tahun_pengangkatan = "";
        }
        $kode_pln_group = "1006";

        $person_grade = "";
        $rs3 = mysqli_query($koneksi,"select * from r_grade where nip='$nip' order by start_date asc limit 1");
        $hasil3 = mysqli_fetch_array($rs3);
        if($hasil3){
            $person_grade = stripslashes ($hasil3['grade']);
        }

        $nik = "";
        $npwp = "";
        $rs3 = mysqli_query($koneksi,"select * from r_identitas where nip='$nip' order by kode_identitas asc");
        while($hasil3 = mysqli_fetch_array($rs3)){
            $kode_identitas = stripslashes ($hasil3['kode_identitas']);
            $id_number = stripslashes ($hasil3['id_number']);
            if($kode_identitas=="1"){
                $nik = $id_number;
            } else if($kode_identitas=="11"){
                $npwp = $id_number;
            }
        }
        $keterangan_mutasi = "";
        $sql2 = "insert into r_pengangkatan";
        $sql2 .= "(nip,tgl_lahir,person_grade,agama,nik,npwp,tgl_masuk,tgl_capeg,tgl_tetap,keterangan_mutasi,tahun_pengangkatan,kode_pln_group,status_edit,tgl_edit,user_edit)";
        $sql2 .= " values('$nip','$tgl_lahir','$person_grade','$id_agama','$nik','$npwp','$tgl_masuk','$tgl_capeg','$tgl_tetap','$keterangan_mutasi','$tahun_pengangkatan','$kode_pln_group','0','$hari_ini','$userhris')";    
        $result2 = @mysqli_query($koneksi,$sql2);
        if($result2){
            $sukses++;
            //echo "Sukses";
        } else {
            $gagal++;
            //echo mysqli_error($koneksi);
        }        
    }
    echo "Sukses : $sukses, Gagal : $gagal";
}
?>