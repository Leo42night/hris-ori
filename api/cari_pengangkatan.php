<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if ($userhris){
    include 'koneksi.php';
    $nip2 = $_REQUEST['nip'];
    //$nip2 = "7193096D";
    $rs = mysqli_query($koneksi,"select * from data_pegawai where nip='$nip2'");
    $hasil = mysqli_fetch_array($rs);
    if($hasil){
    	$nip = stripslashes ($hasil['nip']);
    	$nama = stripslashes ($hasil['nama_lengkap']);
        $tgl_lahir = stripslashes ($hasil['tgl_lahir']);        
        $tgl_masuk = stripslashes ($hasil['tgl_masuk']);
        $tgl_capeg = stripslashes ($hasil['tgl_capeg']);
        $tgl_tetap = stripslashes ($hasil['tgl_tetap']);
        $agama = stripslashes ($hasil['id_agama']);
        $jenis_kelamin = stripslashes ($hasil['jenis_kelamin']);
        $no_peserta = stripslashes ($hasil['id_dplk']);
        $bank_dplk = stripslashes ($hasil['bank_dplk']);
        $no_bpjs_kes = stripslashes ($hasil['no_bpjs_kes']);
        $no_bpjs_tk = stripslashes ($hasil['no_bpjs_tk']);
        
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

        $person_grade = "";
        $rs3 = mysqli_query($koneksi,"select * from r_grade where nip='$nip' order by start_date desc limit 1");
        $hasil3 = mysqli_fetch_array($rs3);
        if($hasil3){
            $person_grade = stripslashes ($hasil3['grade']);
        }

    	echo json_encode(array(
            'success'=>true,
            'message'=>'',
            'nip'=>$nip,
            'nama'=>$nama,
            'tgl_lahir'=>$tgl_lahir,
            'tgl_masuk'=>$tgl_masuk,
            'tgl_capeg'=>$tgl_capeg,
            'tgl_tetap'=>$tgl_tetap,
            'agama'=>$agama,
            'jenis_kelamin'=>$jenis_kelamin,
            'no_peserta'=>$no_peserta,
            'bank_dplk'=>$bank_dplk,
            'no_bpjs_kes'=>$no_bpjs_kes,
            'no_bpjs_tk'=>$no_bpjs_tk,
            'nik'=>$nik,
            'npwp'=>$npwp,
            'person_grade'=>$person_grade
        ));
    } else {
    	echo json_encode(array(
            'success'=>false,
            'message'=>'Data pegawai tidak ditemukan!',
        ));
    }
}    
?>