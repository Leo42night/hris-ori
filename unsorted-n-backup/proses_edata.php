<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if ($userhris){
    function TanggalIndo2($date){
        if($date!="" && $date!=null){
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $result = $tgl . "." . $bulan . ".". $tahun;	
            return($result);
        } else {
            //return("01.01.1970");
            return("");
        }
    }

    function encodeFunc($value) {
        $value = str_replace('\\"','',$value);
        //$value = str_replace('"','\"',$value);
        //return '"'.$value.'"';
        return $value;
    }
    include 'koneksi.php';
    ini_set('date.timezone', 'Asia/Jakarta');
    $hari_ini3 = date("YmdHis",strtotime("+1 hour"));
    $hari_ini2 = date("Ymd",strtotime("+1 hour"));
    $hari_ini = date("Y-m-d",strtotime("+1 hour"));
    $jam_ini = date("H:i:s",strtotime("+1 hour"));
    $tgl_export = $hari_ini." ".$jam_ini;

    $blth2 = $_POST['blth'];
    $ids2 = $_POST['ids2'];
    //$blth2 = date("Y-m");
    //$ids2 = 27;

    $directoryName = "datacsv/".$blth2;
    if(!is_dir($directoryName)){
      mkdir($directoryName, 0755, true);
    }    
    $uploadDir1 = $directoryName."/";
    $source = 'assets/index.html';
    $destination = $uploadDir1.'/index.html';
    if (!file_exists($destination)){
      copy($source, $destination);
    }

    $pesan = "";
    
    if($ids2!==""){
        $idsnya = explode(";", $ids2);
        $sukses = 0;
        $i = 1;
        foreach($idsnya as $idsnya2){  
            $rs31 = mysqli_query($koneksi,"select * from edata where id_edata='$idsnya2' and blth='$blth2'");          
            $hasil31 = mysqli_fetch_array($rs31);
            if($hasil31){
                $id = intval($hasil31['id']);
                $namafilelama = $hasil31['file_export'];
            } else {
                $id = 0;
                $namafilelama = "";
            }

            // if(file_exists($namafilelama)){
            //     unlink($namafilelama);
            // }

            $rs26 = mysqli_query($koneksi,"select * from m_edata where id='$idsnya2'");
            $hasil26 = mysqli_fetch_array($rs26);
            $nama_data = stripslashes ($hasil26['nama_data']);
            $nama_tabel = stripslashes ($hasil26['nama_tabel']);
            $nama_file = stripslashes ($hasil26['nama_file']);

            $filename = $nama_file.'_'.$hari_ini3.'.csv'; 
            $namafile = $uploadDir1.$filename;
            $file = fopen($uploadDir1.$filename, 'w');
            if($nama_tabel=="data_pegawai"){
                $header = array("`NIP`","`Start Date (Tgl Lahir)`","`End Date`","`Tgl Masuk`","`Tgl Capeg`","`Tgl Tetap`","`Title`","`Nama Lengkap`","`Gelar Depan`","`Gelar Belakang`","`Know As`","`Tempat Lahir`","`Tanggal Lahir`","`Negara Lahir`","`Jenis Kelamin`","`Agama`","`Status Nikah`","`Tanggal Nikah`","`Status Kewarganegaraan`","`Golongan Darah`","`Suku`","`No Telp Utama`","`No Telp Cadangan 1`","`No Telp Cadangan 2`","`No Telp Cadangan 3`","`No Telp Darurat`","`Jenis Dplk`","`ID Dplk`","`Bank Dplk`","`No BPJS Kesehatan`","`No BPJS TK`","`Bank Payroll`","`Bank Atas Nama Payroll`","`No Rekening Payroll`","`Summary Pribadi`","`Interest`","`Identity PLN Group`"); 
            } else if($nama_tabel=="r_alamat"){
                $header = array("`NIP`","`Start Date`","`End Date`","`Jenis Alamat`","`Rumah Atas Nama`","`Alamat Lengkap`","`Provinsi`","`Kota/Kabupaten`","`Kode Pos`","`Negara`","`Jarak dari kantor`");
            } else if($nama_tabel=="r_keluarga"){
                $header = array("`NIP`","`Start Date`","`End Date`","`Jenis Keluarga`","`No Urut Keluarga`","`Nama Keluarga`","`JenisKelamin`","`Tempat lahir`","`Tanggal Lahir`","`Agama`","`Pekerjaan`","`PLN Group`","`Nama Perusahaan`","`NIP Keluarga`","`Status KWN`","`Jenis Alamat`","`Alamat`","`Provinsi`","`Kota Kabupaten`","`Kode Pos`","`No KK`","`NIK Keluarga`","`No NPWP Keluarga`","`No Telp Keluarga`","`Golongan Darah`","`No BPJS Keluarga`","`Status Fasilitas Kesehatan`","`No Akta`","`PLN Group`");
            } else if($nama_tabel=="r_pendidikan"){
                $header = array("`NIP`","`Start Date`","`End Date`","`Keterangan Pendidikan`","`Jenis Pendidikan`","`Jurusan`","`Nama Institusi Pendidikan`","`Kota Institusi Pendidikan`","`Kota Institusi Pendidikan Lainnya`","`Negara Institusi Pendidikan`","`Angka Lama Pendidikan`","`Satuan Lama Pendidikan`","`Nilai`","`PLN Group`","`Kode Transaksi`");
            } else if($nama_tabel=="r_grade"){
                $header = array("`NIP`","`Start Date`","`End Date`","`Grade`","`Level PHDP`","`Reason`","`Subtype`");
            } else if($nama_tabel=="r_jabatan"){
                $header = array("`NIP`","`Start Date`","`End Date`","`ee group`","`ee sub group`","`job key`","`jabatan`","`kota organisasi`","`jenis jabatan`","`jenjang jabatan`","`kode profesi`","`nama profesi`","`jenis unit`","`kelas unit`","`kode daerah`","`stream business`","`achievements`","`tupoksi`","`company code`","`business area`","`personal area`","`personal sub area`","`level organisasi 1`","`level organisasi 2`","`level organisasi 3`","`level organisasi 4`","`level organisasi 5`","`level organisasi 6`","`level organisasi 7`","`level organisasi 8`","`level organisasi 9`","`level organisasi 10`","`level organisasi 11`","`level organisasi 12`","`level organisasi 13`","`level organisasi 14`","`level organisasi 15`","`tingkat pengalaman`","`jenis jabatan AP`","`jenjang jabatan AP`","`Kode Posisi`","`PLN Group`");
            } else if($nama_tabel=="r_talenta"){
                $header = array("`NIP`","`Start Date`","`End Date`","`Nilai Talenta`","`NKI`","`Kode NKI`","`NSK`","`Kode NSK`","`PLN Group`");
            } else if($nama_tabel=="r_sertifikat"){
                $header = array("`NIP`","`Start Date`","`End Date`","`Jenis Lembaga Sertifikasi`","`Judul Sertifikasi`","`Nomor Sertifikasi`","`Kode Profesi Judul Sertifikasi`","`Profesi Judul Sertifikasi`","`Level Profesiensi`","`Nama Institusi Sertifikasi`","`Kota Institusi Pendidikan`","`Kota Institusi Sertifikasi Lainnya`","`Negara Institusi Pendidikan`","`Tgl Mulai Pelaksanaan Sertifikasi`","`Tgl Selesai Pelaksanaan Sertifikasi`","`Nilai Sertifikasi`","`Level Sertifikasi`","`Angka Lama Sertifikasi`","`Satuan Lama Sertifikasi`","`Tanggal Expired Sertifikat`","`PLN Group`","`Kode Transaksi`");
            } else if($nama_tabel=="r_hukuman"){
                $header = array("`NIP`","`Start Date`","`End Date`","`Jenis Grievances`","`Reason Grievances`","`Nip Atasan`","`Nama Atasan`","`Status Grievances`","`Stage`","`Result`","`Rupiah`","`No Sk Hukuman`","`Tgl Sk Hukuman`","`Pasal yang dilanggar`","`Hukuman`","`Keterangan`","`No SK Terkait`","`PLN Group`");
            } else if($nama_tabel=="r_award"){
                $header = array("`NIP`","`Start Date`","`End Date`","`Kode Jenis Awards`","`Jenis Awards`","`Award Text`","`No SK Penghargaan`","`Tgl SK Penghargaan`","`Tingkat`","`Diberikan Oleh`","`PLN Group`");
            } else if($nama_tabel=="r_identitas"){
                $header = array("`NIP`","`Start Date`","`End Date`","`Jenis Identitas`","`ID Number`","`PLN Group`");
            } else if($nama_tabel=="r_karya_tulis"){
                $header = array("`NIP`","`Start Date`","`End Date`","`Judul`","`Media Publikasi`","`Tahun`","`Jenis Karya Tulis`","`PLN Group`");
            } else if($nama_tabel=="r_keahlian"){
                $header = array("`NIP`","`Start Date`","`End Date`","`Kode Profesi`","`Tingkat Keahlian`","`PLN Group`");
            } else if($nama_tabel=="r_lembaga"){
                $header = array("`NIP`","`Start Date`","`End Date`","`Nama Organisasi`","`Jabatan`","`Uraian Singkat Kegiatan`","`Jenis Organisasi`","`PLN Group`");
            } else if($nama_tabel=="r_medsos"){
                $header = array("`NIP`","`Start Date`","`End Date`","`Jenis Media Sosial`","`ID Media Sosial`","`PLN Group`");
            } else if($nama_tabel=="r_pembicara"){
                $header = array("`NIP`","`Start Date`","`End Date`","`Judul Acara`","`Penyelenggaraan`","`Lokasi`","`Peserta`","`Tingkat Acara`","`Kode Dahan Profesi`","`Dahan Profesi`","`Kode Diklat`","`Judul Diklat`","`Udiklat`","`Jenis Pelaksanaan`","`Jenis Sertifikasi`","`Sifat Diklat`","`PLN Group`");
            } else if($nama_tabel=="r_atasan"){
                $header = array("`NIP`","`Start Date Jabatan`","`Start Date`","`End Date`","`Jabatan Atasan Langsung`","`NIP Atasan Langsung`","`Nama Atasan Langsung`","`Kode Posisi Atasan Langsung`","`PLN Group`");
            } else if($nama_tabel=="r_urjab"){
                $header = array("`Kode PLN Group`","`Lokasi File`","`Nama File`","`No Dokumen`","`Keterangan`");
            } else if($nama_tabel=="r_struktur"){
                $header = array("`Kode PLN Group`","`Lokasi File`","`Nama File`","`Keterangan`","`Nomor Dokumen`");
            } else if($nama_tabel=="r_foto"){
                $header = array("`NIP`","`Lokasi Foto`","`Nama File`","`PLN Group`");
            } else if($nama_tabel=="r_penugasan"){
                $header = array("`NIP`","`Start Date`","`End Date`","`Tupoksi`","`Peran`","`Penugasan`","`PLN Group`");
            } else if($nama_tabel=="r_pengajar"){
                $header = array("`NIP`","`Start Date`","`End Date`","`Kode Dahan Profesi`","`Dahan Profesi`","`Kode Diklat`","`Judul Diklat`","`Udiklat`","`Jenis Pelaksanaan`","`Jenis Sertifikat`","`Sifat Diklat`","`Penyelenggaraan`","`Keterangan Pengajar`","`PLN Group`");
            } else if($nama_tabel=="r_diklat_penjenjangan"){
                $header = array("`NIP`","`Start Date`","`End Date`","`Jenis Diklat`","`Kode Diklat`","`Judul Diklat`","`Udiklat`","`Kode Profesi`","`Level Profesiensi`","`Grade Nilai`","`Nilai`","`Keterangan Lulus`","`Keterangan Penyelesaian`","`Kode Sertifikat`","`Tanggal Terbit`","`Tanggal Selesai Sertifikat`","`PLN Group`","`Kode Transaksi`");
            } else if($nama_tabel=="r_diklat"){
                $header = array("`NIP`","`Start Date`","`End Date`","`Jenis Diklat`","`Kode Diklat`","`Judul Diklat`","`Penyelenggaran`","`Kode Profesi`","`Level Profesiensi`","`Nama Institusi Diklat`","`Kota Institusi Diklat`","`Kota Lainnya`","`Negara Institusi Diklat`","`Angka Lama Diklat`","`Satuan Lama Diklat`","`Nilai`","`Grade Nilai`","`Jenis Pelaksanaan`","`Jenis Sertifikat`","`Sifat Diklat`","`Konfirmasi Kehadiran`","`Keterangan Lulus`","`Kode Sertifikat`","`Tanggal Terbit Sertifikat`","`Tanggal Selesai Sertifikat`","`Udiklat`","`Keterangan Realisasi`","`Keterangan Penyelesaian`","`Kode Dahan Profesi`","`Dahan Profesi`","`PLN Group`","`Kode Transaksi`");
            } else if($nama_tabel=="r_pengangkatan"){
                $header = array("`NIP`","`Nama Pegawai`","`Tanggal Lahir`","`Jenis Kelamin`","`Person Grade`","`Agama`","`NIK`","`No NPWP`","`Tanggal Masuk`","`Tanggal Capeg`","`Tanggal Tetap`","`Keterangan Mutasi`","`Tahun Pengangkatan`","`Kode PLN Group`");
            } else if($nama_tabel=="r_pemberhentian"){
                $header = array("`NIP`","`Nama Pegawai`","`Tanggal Lahir`","`Jenis Kelamin`","`Person Grade`","`Phdp Terakhir`","`Agama`","`NIK`","`No NPWP`","`Tanggal Masuk`","`Tanggal Capeg`","`Tanggal Tetap`","`Tanggal Berhenti`","`Alasan Berhenti`","`DPLK/DAPEN`","`Bank DPLK`","`No Peserta DPLK/DAPEN`","`No BPJS Kesehatan`","`No BPJS Ketenagakerjaan`","`Tahun Pemberhentian`","`Kode PLN Group`");
            }
            fwrite($file, implode('|', $header) . "\r\n");
            $datanya = array();
            if($nama_tabel=="data_pegawai"){
                $rs1 = mysqli_query($koneksi,"select * from ".$nama_tabel." order by id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip"];
                    //$start_date_jabatan = TanggalIndo2($row["start_date_jabatan"]);
                    $start_date = TanggalIndo2($row["start_date"]);
                    $end_date = TanggalIndo2($row["end_date"]);
                    $tgl_masuk = TanggalIndo2($row["tgl_masuk"]);
                    $tgl_capeg = TanggalIndo2($row["tgl_capeg"]);
                    $tgl_tetap = TanggalIndo2($row["tgl_tetap"]);
                    $title = $row["title"];
                    $nama_lengkap = $row["nama_lengkap"];
                    $nama_lengkap = str_replace("'", "", $nama_lengkap);
                    $nama_lengkap = str_replace('"', '', $nama_lengkap);
                    $gelar_depan = $row["gelar_depan"];
                    $gelar_belakang = $row["gelar_belakang"];
                    $know_as = $row["know_as"];
                    $tempat_lahir = $row["tempat_lahir"];
                    $tgl_lahir = TanggalIndo2($row["tgl_lahir"]);
                    $kode_negara = $row["kode_negara"];
                    $jenis_kelamin = $row["jenis_kelamin"];
                    $id_agama = $row["id_agama"];
                    $status_nikah = $row["status_nikah"];
                    $tgl_nikah = TanggalIndo2($row["tgl_nikah"]);
                    $status_warganegara = $row["status_warganegara"];
                    $gol_darah = $row["gol_darah"];
                    $suku = $row["suku"];
                    $telepon_utama = $row["telepon_utama"];
                    $telepon_cadangan1 = $row["telepon_cadangan1"];
                    $telepon_cadangan2 = $row["telepon_cadangan2"];
                    $telepon_cadangan3 = $row["telepon_cadangan3"];
                    $telepon_darurat = $row["telepon_darurat"];
                    $jenis_dplk = $row["jenis_dplk"];
                    $id_dplk = $row["id_dplk"];
                    $bank_dplk = $row["bank_dplk"];
                    $no_bpjs_kes = $row["no_bpjs_kes"];
                    $no_bpjs_tk = $row["no_bpjs_tk"];
                    $bank_payroll = $row["bank_payroll"];
                    $an_payroll = $row["an_payroll"];
                    $no_rek_payroll = $row["no_rek_payroll"];

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    //$start_date_jabatan = strlen(trim($start_date_jabatan))>0 ? "`".$start_date_jabatan."`" : "";
                    $start_date = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $end_date = strlen(trim($end_date))>0 ? "`".$end_date."`" : "";
                    $tgl_masuk = strlen(trim($tgl_masuk))>0 ? "`".$tgl_masuk."`" : "";
                    $tgl_capeg = strlen(trim($tgl_capeg))>0 ? "`".$tgl_capeg."`" : "";
                    $tgl_tetap = strlen(trim($tgl_tetap))>0 ? "`".$tgl_tetap."`" : "";
                    $title = strlen(trim($title))>0 ? "`".$title."`" : "";
                    $nama_lengkap = strlen(trim($nama_lengkap))>0 ? "`".$nama_lengkap."`" : "";
                    $gelar_depan = strlen(trim($gelar_depan))>0 ? "`".$gelar_depan."`" : "";
                    $gelar_belakang = strlen(trim($gelar_belakang))>0 ? "`".$gelar_belakang."`" : "";
                    $know_as = strlen(trim($know_as))>0 ? "`".$know_as."`" : "";
                    $tempat_lahir = strlen(trim($tempat_lahir))>0 ? "`".$tempat_lahir."`" : "";
                    $tgl_lahir = strlen(trim($tgl_lahir))>0 ? "`".$tgl_lahir."`" : "";
                    $kode_negara = strlen(trim($kode_negara))>0 ? "`".$kode_negara."`" : "";
                    $jenis_kelamin = strlen(trim($jenis_kelamin))>0 ? "`".$jenis_kelamin."`" : "";
                    $id_agama = strlen(trim($id_agama))>0 ? "`".$id_agama."`" : "";
                    $status_nikah = strlen(trim($status_nikah))>0 ? "`".$status_nikah."`" : "";
                    $tgl_nikah = strlen(trim($tgl_nikah))>0 ? "`".$tgl_nikah."`" : "";
                    $status_warganegara = strlen(trim($status_warganegara))>0 ? "`".$status_warganegara."`" : "";
                    $gol_darah = strlen(trim($gol_darah))>0 ? "`".$gol_darah."`" : "";
                    $suku = strlen(trim($suku))>0 ? "`".$suku."`" : "";
                    $telepon_utama = strlen(trim($telepon_utama))>0 ? "`".$telepon_utama."`" : "";
                    $telepon_cadangan1 = strlen(trim($telepon_cadangan1))>0 ? "`".$telepon_cadangan1."`" : "";
                    $telepon_cadangan2 = strlen(trim($telepon_cadangan2))>0 ? "`".$telepon_cadangan2."`" : "";
                    $telepon_cadangan3 = strlen(trim($telepon_cadangan3))>0 ? "`".$telepon_cadangan3."`" : "";
                    $telepon_darurat = strlen(trim($telepon_darurat))>0 ? "`".$telepon_darurat."`" : "";
                    $jenis_dplk = strlen(trim($jenis_dplk))>0 ? "`".$jenis_dplk."`" : "";
                    $id_dplk = strlen(trim($id_dplk))>0 ? "`".$id_dplk."`" : "";
                    $bank_dplk = strlen(trim($bank_dplk))>0 ? "`".$bank_dplk."`" : "";
                    $no_bpjs_kes = strlen(trim($no_bpjs_kes))>0 ? "`".$no_bpjs_kes."`" : "";
                    $no_bpjs_tk = strlen(trim($no_bpjs_tk))>0 ? "`".$no_bpjs_tk."`" : "";
                    $bank_payroll = strlen(trim($bank_payroll))>0 ? "`".$bank_payroll."`" : "";
                    $an_payroll = strlen(trim($an_payroll))>0 ? "`".$an_payroll."`" : "";
                    $no_rek_payroll = strlen(trim($no_rek_payroll))>0 ? "`".$no_rek_payroll."`" : "";

                    $summary = "";
                    $interest = "";
                    $identity_pln_group = "`1006`";
                    $datanya[] = array($nip,$start_date,$end_date,$tgl_masuk,$tgl_capeg,$tgl_tetap,$title,$nama_lengkap,$gelar_depan,$gelar_belakang,$know_as,$tempat_lahir,$tgl_lahir,$kode_negara,$jenis_kelamin,$id_agama,$status_nikah,$tgl_nikah,$status_warganegara,$gol_darah,$suku,$telepon_utama,$telepon_cadangan1,$telepon_cadangan2,$telepon_cadangan3,$telepon_darurat,$jenis_dplk,$id_dplk,$bank_dplk,$no_bpjs_kes,$no_bpjs_tk,$bank_payroll,$an_payroll,$no_rek_payroll,$summary,$interest,$identity_pln_group);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
                    
            } else if($nama_tabel=="r_alamat"){
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $start_date = TanggalIndo2($row["start_date"]);
                    $end_date = TanggalIndo2($row["end_date"]);
                    $jenis_alamat = $row["jenis_alamat"];
                    $rumah_atas_nama = $row["rumah_atas_nama"];
                    $alamat_lengkap = $row["alamat_lengkap"];
                    $id_provinsi = $row["id_provinsi"];
                    $id_kabupaten = $row["id_kabupaten"];
                    $kode_pos = $row["kode_pos"];
                    $negara = $row["negara"];
                    $jarak = $row["jarak"]." km";
                    $identity_pln_group = "`1006`";

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $start_date = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $end_date = strlen(trim($end_date))>0 ? "`".$end_date."`" : "";
                    $jenis_alamat = strlen(trim($jenis_alamat))>0 ? "`".$jenis_alamat."`" : "";
                    $rumah_atas_nama = strlen(trim($rumah_atas_nama))>0 ? "`".$rumah_atas_nama."`" : "";
                    $alamat_lengkap = strlen(trim($alamat_lengkap))>0 ? "`".$alamat_lengkap."`" : "";
                    $id_provinsi = strlen(trim($id_provinsi))>0 ? "`".$id_provinsi."`" : "";
                    $id_kabupaten = strlen(trim($id_kabupaten))>0 ? "`".$id_kabupaten."`" : "";
                    $kode_pos = strlen(trim($kode_pos))>0 ? "`".$kode_pos."`" : "";
                    $negara = strlen(trim($negara))>0 ? "`".$negara."`" : "";
                    $jarak = strlen(trim($jarak))>0 ? "`".$jarak."`" : "";
                    $datanya[] = array($nip,$start_date,$end_date,$jenis_alamat,$rumah_atas_nama,$alamat_lengkap,$id_provinsi,$id_kabupaten,$kode_pos,$negara,$jarak,$identity_pln_group);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
                    
            } else if($nama_tabel=="r_keluarga"){
                //$rs1 = mysqli_query($koneksi,"select * from ".$nama_tabel." order by id asc");
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $start_date = TanggalIndo2($row["start_date"]);
                    $end_date = TanggalIndo2($row["end_date"]);
                    $id_jenis_keluarga = $row["id_jenis_keluarga"];
                    $no_urut = $row["no_urut"];
                    $nama = $row["nama"];
                    $jenis_kelamin = $row["jenis_kelamin"];
                    $tempat_lahir = $row["tempat_lahir"];
                    $tgl_lahir = TanggalIndo2($row["tgl_lahir"]);
                    $id_agama = $row["id_agama"];
                    $pekerjaan = $row["pekerjaan"];
                    $pln_group = $row["pln_group"];
                    $kode_perusahaan = $row["kode_perusahaan"];
                    $nip_keluarga = $row["nip_keluarga"];
                    $status_warganegara = $row["status_warganegara"];
                    $jenis_alamat = $row["jenis_alamat"];
                    $alamat = $row["alamat"];
                    $id_provinsi = $row["id_provinsi"];
                    $id_kabupaten = $row["id_kabupaten"];
                    $kode_pos = $row["kode_pos"];
                    $no_kk = $row["no_kk"];
                    $nik = $row["nik"];
                    $npwp = $row["npwp"];
                    $telepon = $row["telepon"];
                    $gol_darah = $row["gol_darah"];
                    $no_bpjs_kes = $row["no_bpjs_kes"];
                    $status_fasilitas_kesehatan = $row["status_fasilitas_kesehatan"];
                    $no_akta = $row["no_akta"];
                    $identity_pln_group = "`1006`";

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $start_date = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $end_date = strlen(trim($end_date))>0 ? "`".$end_date."`" : "";
                    $id_jenis_keluarga = strlen(trim($id_jenis_keluarga))>0 ? "`".$id_jenis_keluarga."`" : "";
                    $no_urut = strlen(trim($no_urut))>0 ? "`".$no_urut."`" : "";
                    $nama = strlen(trim($nama))>0 ? "`".$nama."`" : "";
                    $jenis_kelamin = strlen(trim($jenis_kelamin))>0 ? "`".$jenis_kelamin."`" : "";
                    $tempat_lahir = strlen(trim($tempat_lahir))>0 ? "`".$tempat_lahir."`" : "";
                    $tgl_lahir = strlen(trim($tgl_lahir))>0 ? "`".$tgl_lahir."`" : "";
                    $id_agama = strlen(trim($id_agama))>0 ? "`".$id_agama."`" : "";
                    $pekerjaan = strlen(trim($pekerjaan))>0 ? "`".$pekerjaan."`" : "";
                    $pln_group = strlen(trim($pln_group))>0 ? "`".$pln_group."`" : "";
                    $kode_perusahaan = strlen(trim($kode_perusahaan))>0 ? "`".$kode_perusahaan."`" : "";
                    $nip_keluarga = strlen(trim($nip_keluarga))>0 ? "`".$nip_keluarga."`" : "";
                    $status_warganegara = strlen(trim($status_warganegara))>0 ? "`".$status_warganegara."`" : "";
                    $jenis_alamat = strlen(trim($jenis_alamat))>0 ? "`".$jenis_alamat."`" : "";
                    $alamat = strlen(trim($alamat))>0 ? "`".$alamat."`" : "";
                    $id_provinsi = strlen(trim($id_provinsi))>0 ? "`".$id_provinsi."`" : "";
                    $id_kabupaten = strlen(trim($id_kabupaten))>0 ? "`".$id_kabupaten."`" : "";
                    $kode_pos = strlen(trim($kode_pos))>0 ? "`".$kode_pos."`" : "";
                    $no_kk = strlen(trim($no_kk))>0 ? "`".$no_kk."`" : "";
                    $nik = strlen(trim($nik))>0 ? "`".$nik."`" : "";
                    $npwp = strlen(trim($npwp))>0 ? "`".$npwp."`" : "";
                    $telepon = strlen(trim($telepon))>0 ? "`".$telepon."`" : "";
                    $gol_darah = strlen(trim($gol_darah))>0 ? "`".$gol_darah."`" : "";
                    $no_bpjs_kes = strlen(trim($no_bpjs_kes))>0 ? "`".$no_bpjs_kes."`" : "";
                    $status_fasilitas_kesehatan = strlen(trim($status_fasilitas_kesehatan))>0 ? "`".$status_fasilitas_kesehatan."`" : "";
                    $no_akta = strlen(trim($no_akta))>0 ? "`".$no_akta."`" : "";
                    $datanya[] = array($nip,$start_date,$end_date,$id_jenis_keluarga,$no_urut,$nama,$jenis_kelamin,$tempat_lahir,$tgl_lahir,$id_agama,$pekerjaan,$pln_group,$kode_perusahaan,$nip_keluarga,$status_warganegara,$jenis_alamat,$alamat,$id_provinsi,$id_kabupaten,$kode_pos,$no_kk,$nik,$npwp,$telepon,$gol_darah,$no_bpjs_kes,$status_fasilitas_kesehatan,$no_akta,$identity_pln_group);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
                    
            } else if($nama_tabel=="r_pendidikan"){
                //$rs1 = mysqli_query($koneksi,"select * from ".$nama_tabel." order by id asc");
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $start_date = TanggalIndo2($row["start_date"]);
                    $end_date = TanggalIndo2($row["end_date"]);
                    $keterangan_pendidikan = $row["keterangan_pendidikan"];
                    $jenis_pendidikan = $row["jenis_pendidikan"];
                    //$judul_kursus = $row["judul_kursus"];
                    $jurusan = $row["jurusan"];
                    $nama_institusi = $row["nama_institusi"];
                    $kota_institusi = $row["kota_institusi"];
                    $kota_institusi_lainnya = $row["kota_institusi_lainnya"];
                    $negara_institusi = $row["negara_institusi"];
                    $lama_pendidikan = $row["lama_pendidikan"];
                    $satuan_lama_pendidikan = $row["satuan_lama_pendidikan"];
                    $nilai = $row["nilai"];
                    $identity_pln_group = "`1006`";
                    $kode_transaksi = $row["kode_transaksi"];

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $start_date = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $end_date = strlen(trim($end_date))>0 ? "`".$end_date."`" : "";
                    $keterangan_pendidikan = strlen(trim($keterangan_pendidikan))>0 ? "`".$keterangan_pendidikan."`" : "";
                    $jenis_pendidikan = strlen(trim($jenis_pendidikan))>0 ? "`".$jenis_pendidikan."`" : "";
                    //$judul_kursus = strlen(trim($judul_kursus))>0 ? "`".$judul_kursus."`" : "";
                    $jurusan = strlen(trim($jurusan))>0 ? "`".$jurusan."`" : "";
                    $nama_institusi = strlen(trim($nama_institusi))>0 ? "`".$nama_institusi."`" : "";
                    $kota_institusi = strlen(trim($kota_institusi))>0 ? "`".$kota_institusi."`" : "";
                    $kota_institusi_lainnya = strlen(trim($kota_institusi_lainnya))>0 ? "`".$kota_institusi_lainnya."`" : "";
                    $negara_institusi = strlen(trim($negara_institusi))>0 ? "`".$negara_institusi."`" : "";
                    $lama_pendidikan = strlen(trim($lama_pendidikan))>0 ? "`".$lama_pendidikan."`" : "";
                    $satuan_lama_pendidikan = strlen(trim($satuan_lama_pendidikan))>0 ? "`".$satuan_lama_pendidikan."`" : "";
                    $nilai = strlen(trim($nilai))>0 ? "`".$nilai."`" : "";
                    $kode_transaksi = strlen(trim($kode_transaksi))>0 ? "`".$kode_transaksi."`" : "";
                    $datanya[] = array($nip,$start_date,$end_date,$keterangan_pendidikan,$jenis_pendidikan,$jurusan,$nama_institusi,$kota_institusi,$kota_institusi_lainnya,$negara_institusi,$lama_pendidikan,$satuan_lama_pendidikan,$nilai,$identity_pln_group,$kode_transaksi);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }                    
            } else if($nama_tabel=="r_grade"){
                //$rs1 = mysqli_query($koneksi,"select * from ".$nama_tabel." order by id asc");
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $start_date = TanggalIndo2($row["start_date"]);
                    $end_date = TanggalIndo2($row["end_date"]);
                    $grade = $row["grade"];
                    $level_phdp = $row["level_phdp"];
                    $kode_reason = $row["kode_reason"];
                    $kode_subtype = $row["kode_subtype"];
                    $identity_pln_group = "`1006`";

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $start_date = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $end_date = strlen(trim($end_date))>0 ? "`".$end_date."`" : "";
                    $grade = strlen(trim($grade))>0 ? "`".$grade."`" : "";
                    $level_phdp = strlen(trim($level_phdp))>0 ? "`".$level_phdp."`" : "";
                    $kode_reason = strlen(trim($kode_reason))>0 ? "`".$kode_reason."`" : "";
                    $kode_subtype = strlen(trim($kode_subtype))>0 ? "`".$kode_subtype."`" : "";
                    $datanya[] = array($nip,$start_date,$end_date,$grade,$level_phdp,$kode_reason,$kode_subtype,$identity_pln_group);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
            } else if($nama_tabel=="r_jabatan"){
                //$rs1 = mysqli_query($koneksi,"select * from ".$nama_tabel." order by id asc");
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $start_date = TanggalIndo2($row["start_date"]);
                    $end_date = TanggalIndo2($row["end_date"]);
                    $ee_group = $row["ee_group"];
                    $ee_subgroup = $row["ee_subgroup"];
                    $job_key = $row["job_key"];
                    $jabatan = $row["jabatan"];
                    $kota_organisasi = $row["kota_organisasi"];
                    //$id_kabupaten = $row["id_kabupaten"];
                    $jenis_jabatan = $row["jenis_jabatan"];
                    $jenjang_jabatan = $row["jenjang_jabatan"];
                    $kode_profesi = $row["kode_profesi"];
                    $nama_profesi = $row["nama_profesi"];
                    $jenis_unit = $row["jenis_unit"];
                    $kelas_unit = $row["kelas_unit"];
                    $kode_daerah = $row["kode_daerah"];
                    $stream_business = $row["stream_business"];
                    $achievements = $row["achievements"];
                    $tupoksi = $row["tupoksi"];
                    $company_code = $row["company_code"];
                    $business_area = $row["business_area"];
                    $personal_area = $row["personal_area"];
                    $personal_sub_area = $row["personal_sub_area"];
                    $level_organisasi1 = $row["level_organisasi1"];
                    $level_organisasi2 = $row["level_organisasi2"];
                    $level_organisasi3 = $row["level_organisasi3"];
                    $level_organisasi4 = $row["level_organisasi4"];
                    $level_organisasi5 = $row["level_organisasi5"];
                    $level_organisasi6 = $row["level_organisasi6"];
                    $level_organisasi7 = $row["level_organisasi7"];
                    $level_organisasi8 = $row["level_organisasi8"];
                    $level_organisasi9 = $row["level_organisasi9"];
                    $level_organisasi10 = $row["level_organisasi10"];
                    $level_organisasi11 = $row["level_organisasi11"];
                    $level_organisasi12 = $row["level_organisasi12"];
                    $level_organisasi13 = $row["level_organisasi13"];
                    $level_organisasi14 = $row["level_organisasi14"];
                    $level_organisasi15 = $row["level_organisasi15"];
                    $tingkat_pengalaman = $row["tingkat_pengalaman"];
                    $jenis_jabatan_ap = $row["jenis_jabatan_ap"];
                    $jenjang_jabatan_ap = $row["jenjang_jabatan_ap"];
                    $kode_posisi = $row["kode_posisi"];
                    $identity_pln_group = "`1006`";

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $start_date = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $end_date = strlen(trim($end_date))>0 ? "`".$end_date."`" : "";
                    $ee_group = strlen(trim($ee_group))>0 ? "`".$ee_group."`" : "";
                    $ee_subgroup = strlen(trim($ee_subgroup))>0 ? "`".$ee_subgroup."`" : "";
                    $job_key = strlen(trim($job_key))>0 ? "`".$job_key."`" : "";
                    $jabatan = strlen(trim($jabatan))>0 ? "`".$jabatan."`" : "";
                    //$organisasi = strlen(trim($organisasi))>0 ? "`".$organisasi."`" : "";
                    $kota_organisasi = strlen(trim($kota_organisasi))>0 ? "`".$kota_organisasi."`" : "";
                    $jenis_jabatan = strlen(trim($jenis_jabatan))>0 ? "`".$jenis_jabatan."`" : "";
                    $jenjang_jabatan = strlen(trim($jenjang_jabatan))>0 ? "`".$jenjang_jabatan."`" : "";
                    $kode_profesi = strlen(trim($kode_profesi))>0 ? "`".$kode_profesi."`" : "";
                    $nama_profesi = strlen(trim($nama_profesi))>0 ? "`".$nama_profesi."`" : "";
                    $jenis_unit = strlen(trim($jenis_unit))>0 ? "`".$jenis_unit."`" : "";
                    $kelas_unit = strlen(trim($kelas_unit))>0 ? "`".$kelas_unit."`" : "";
                    $kode_daerah = strlen(trim($kode_daerah))>0 ? "`".$kode_daerah."`" : "";
                    $stream_business = strlen(trim($stream_business))>0 ? "`".$stream_business."`" : "";
                    $achievements = strlen(trim($achievements))>0 ? "`".$achievements."`" : "";
                    $tupoksi = strlen(trim($tupoksi))>0 ? "`".$tupoksi."`" : "";
                    $company_code = strlen(trim($company_code))>0 ? "`".$company_code."`" : "";
                    $business_area = strlen(trim($business_area))>0 ? "`".$business_area."`" : "";
                    $personal_area = strlen(trim($personal_area))>0 ? "`".$personal_area."`" : "";
                    $personal_sub_area = strlen(trim($personal_sub_area))>0 ? "`".$personal_sub_area."`" : "";
                    $level_organisasi1 = strlen(trim($level_organisasi1))>0 ? "`".$level_organisasi1."`" : "";
                    $level_organisasi2 = strlen(trim($level_organisasi2))>0 ? "`".$level_organisasi2."`" : "";
                    $level_organisasi3 = strlen(trim($level_organisasi3))>0 ? "`".$level_organisasi3."`" : "";
                    $level_organisasi4 = strlen(trim($level_organisasi4))>0 ? "`".$level_organisasi4."`" : "";
                    $level_organisasi5 = strlen(trim($level_organisasi5))>0 ? "`".$level_organisasi5."`" : "";
                    $level_organisasi6 = strlen(trim($level_organisasi6))>0 ? "`".$level_organisasi6."`" : "";
                    $level_organisasi7 = strlen(trim($level_organisasi7))>0 ? "`".$level_organisasi7."`" : "";
                    $level_organisasi8 = strlen(trim($level_organisasi8))>0 ? "`".$level_organisasi8."`" : "";
                    $level_organisasi9 = strlen(trim($level_organisasi9))>0 ? "`".$level_organisasi9."`" : "";
                    $level_organisasi10 = strlen(trim($level_organisasi10))>0 ? "`".$level_organisasi10."`" : "";
                    $level_organisasi11 = strlen(trim($level_organisasi11))>0 ? "`".$level_organisasi11."`" : "";
                    $level_organisasi12 = strlen(trim($level_organisasi12))>0 ? "`".$level_organisasi12."`" : "";
                    $level_organisasi13 = strlen(trim($level_organisasi13))>0 ? "`".$level_organisasi13."`" : "";
                    $level_organisasi14 = strlen(trim($level_organisasi14))>0 ? "`".$level_organisasi14."`" : "";
                    $level_organisasi15 = strlen(trim($level_organisasi15))>0 ? "`".$level_organisasi15."`" : "";
                    $tingkat_pengalaman = strlen(trim($tingkat_pengalaman))>0 ? "`".$tingkat_pengalaman."`" : "";
                    $jenis_jabatan_ap = strlen(trim($jenis_jabatan_ap))>0 ? "`".$jenis_jabatan_ap."`" : "";
                    $jenjang_jabatan_ap = strlen(trim($jenjang_jabatan_ap))>0 ? "`".$jenjang_jabatan_ap."`" : "";
                    $kode_posisi = strlen(trim($kode_posisi))>0 ? "`".$kode_posisi."`" : "";
                    $datanya[] = array($nip,$start_date,$end_date,$ee_group,$ee_subgroup,$job_key,$jabatan,$kota_organisasi,$jenis_jabatan,$jenjang_jabatan,$kode_profesi,$nama_profesi,$jenis_unit,$kelas_unit,$kode_daerah,$stream_business,$achievements,$tupoksi,$company_code,$business_area,$personal_area,$personal_sub_area,$level_organisasi1,$level_organisasi2,$level_organisasi3,$level_organisasi4,$level_organisasi5,$level_organisasi6,$level_organisasi7,$level_organisasi8,$level_organisasi9,$level_organisasi10,$level_organisasi11,$level_organisasi12,$level_organisasi13,$level_organisasi14,$level_organisasi15,$tingkat_pengalaman,$jenis_jabatan_ap,$jenjang_jabatan_ap,$kode_posisi,$identity_pln_group);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
            } else if($nama_tabel=="r_talenta"){
                //$rs1 = mysqli_query($koneksi,"select * from ".$nama_tabel." order by id asc");
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $start_date = TanggalIndo2($row["start_date"]);
                    $end_date = TanggalIndo2($row["end_date"]);
                    $nilai_talenta = $row["nilai_talenta"];
                    $nki = $row["nki"];
                    $kode_nki = $row["kode_nki"];
                    $nsk = $row["nsk"];
                    $kode_nsk = $row["kode_nsk"];
                    $identity_pln_group = "`1006`";

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $start_date = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $end_date = strlen(trim($end_date))>0 ? "`".$end_date."`" : "";
                    $nilai_talenta = strlen(trim($nilai_talenta))>0 ? "`".$nilai_talenta."`" : "";
                    $nki = strlen(trim($nki))>0 ? "`".$nki."`" : "";
                    $kode_nki = strlen(trim($kode_nki))>0 ? "`".$kode_nki."`" : "";
                    $nsk = strlen(trim($nsk))>0 ? "`".$nsk."`" : "";
                    $kode_nsk = strlen(trim($kode_nsk))>0 ? "`".$kode_nsk."`" : "";
                    $datanya[] = array($nip,$start_date,$end_date,$nilai_talenta,$nki,$kode_nki,$nsk,$kode_nsk,$identity_pln_group);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
            } else if($nama_tabel=="r_sertifikat"){
                //$rs1 = mysqli_query($koneksi,"select * from ".$nama_tabel." order by id asc");
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $start_date = TanggalIndo2($row["start_date"]);
                    $end_date = TanggalIndo2($row["end_date"]);
                    $jenis_lembaga = $row["jenis_lembaga"];
                    $judul_sertifikasi = $row["judul_sertifikasi"];
                    $no_sertifikasi = $row["no_sertifikasi"];
                    $kode_profesi_sertifikasi = $row["kode_profesi_sertifikasi"];
                    $profesi_sertifikasi = $row["profesi_sertifikasi"];
                    $level_profesiensi = $row["level_profesiensi"];
                    $nama_institusi = $row["nama_institusi"];
                    $kota_institusi = $row["kota_institusi"];
                    $kota_institusi_sertifikasi = $row["kota_institusi_sertifikasi"];
                    $negara_institusi = $row["negara_institusi"];
                    $tgl_mulai = TanggalIndo2($row["tgl_mulai"]);
                    $tgl_selesai = TanggalIndo2($row["tgl_selesai"]);
                    $nilai_sertifikasi = $row["nilai_sertifikasi"];
                    $level_sertifikasi = $row["level_sertifikasi"];
                    $lama_sertifikasi = $row["lama_sertifikasi"];
                    $satuan_sertifikasi = $row["satuan_sertifikasi"];
                    $tgl_expire = TanggalIndo2($row["tgl_expire"]);
                    $identity_pln_group = "`1006`";
                    $kode_transaksi = $row["kode_transaksi"];

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $start_date = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $end_date = strlen(trim($end_date))>0 ? "`".$end_date."`" : "";
                    $jenis_lembaga = strlen(trim($jenis_lembaga))>0 ? "`".$jenis_lembaga."`" : "";
                    $judul_sertifikasi = strlen(trim($judul_sertifikasi))>0 ? "`".$judul_sertifikasi."`" : "";
                    $no_sertifikasi = strlen(trim($no_sertifikasi))>0 ? "`".$no_sertifikasi."`" : "";
                    $kode_profesi_sertifikasi = strlen(trim($kode_profesi_sertifikasi))>0 ? "`".$kode_profesi_sertifikasi."`" : "";
                    $profesi_sertifikasi = strlen(trim($profesi_sertifikasi))>0 ? "`".$profesi_sertifikasi."`" : "";
                    $level_profesiensi = strlen(trim($level_profesiensi))>0 ? "`".$level_profesiensi."`" : "";
                    $nama_institusi = strlen(trim($nama_institusi))>0 ? "`".$nama_institusi."`" : "";
                    $kota_institusi = strlen(trim($kota_institusi))>0 ? "`".$kota_institusi."`" : "";
                    $kota_institusi_sertifikasi = strlen(trim($kota_institusi_sertifikasi))>0 ? "`".$kota_institusi_sertifikasi."`" : "";
                    $negara_institusi = strlen(trim($negara_institusi))>0 ? "`".$negara_institusi."`" : "";
                    $tgl_mulai = strlen(trim($tgl_mulai))>0 ? "`".$tgl_mulai."`" : "";
                    $tgl_selesai = strlen(trim($tgl_selesai))>0 ? "`".$tgl_selesai."`" : "";
                    $nilai_sertifikasi = strlen(trim($nilai_sertifikasi))>0 ? "`".$nilai_sertifikasi."`" : "";
                    $level_sertifikasi = strlen(trim($level_sertifikasi))>0 ? "`".$level_sertifikasi."`" : "";
                    $lama_sertifikasi = strlen(trim($lama_sertifikasi))>0 ? "`".$lama_sertifikasi."`" : "";
                    $satuan_sertifikasi = strlen(trim($satuan_sertifikasi))>0 ? "`".$satuan_sertifikasi."`" : "";
                    $tgl_expire = strlen(trim($tgl_expire))>0 ? "`".$tgl_expire."`" : "";
                    $kode_transaksi = strlen(trim($kode_transaksi))>0 ? "`".$kode_transaksi."`" : "";
                    $datanya[] = array($nip,$start_date,$end_date,$jenis_lembaga,$judul_sertifikasi,$no_sertifikasi,$kode_profesi_sertifikasi,$profesi_sertifikasi,$level_profesiensi,$nama_institusi,$kota_institusi,$kota_institusi_sertifikasi,$negara_institusi,$tgl_mulai,$tgl_selesai,$nilai_sertifikasi,$level_sertifikasi,$lama_sertifikasi,$satuan_sertifikasi,$tgl_expire,$identity_pln_group,$kode_transaksi);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
            } else if($nama_tabel=="r_hukuman"){
                //$rs1 = mysqli_query($koneksi,"select * from ".$nama_tabel." order by id asc");
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $start_date = TanggalIndo2($row["start_date"]);
                    $end_date = TanggalIndo2($row["end_date"]);
                    $jenis_grievances = $row["jenis_grievances"];
                    $reason_grievances = $row["reason_grievances"];
                    $nip_atasan = $row["nip_atasan"];
                    $nama_atasan = $row["nama_atasan"];
                    $status_grievances = $row["status_grievances"];
                    $stage_grievances = $row["stage_grievances"];
                    $result_grievances = $row["result_grievances"];
                    $rupiah = $row["rupiah"];
                    $no_sk_hukuman = $row["no_sk_hukuman"];
                    $tgl_sk_hukuman = TanggalIndo2($row["tgl_sk_hukuman"]);
                    $pasal_pelanggaran = $row["pasal_pelanggaran"];
                    $hukuman = $row["hukuman"];
                    $keterangan = $row["keterangan"];
                    $no_sk_terkait = $row["no_sk_terkait"];
                    $identity_pln_group = "`1006`";

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $start_date = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $end_date = strlen(trim($end_date))>0 ? "`".$end_date."`" : "";
                    $jenis_grievances = strlen(trim($jenis_grievances))>0 ? "`".$jenis_grievances."`" : "";
                    $reason_grievances = strlen(trim($reason_grievances))>0 ? "`".$reason_grievances."`" : "";
                    $nip_atasan = strlen(trim($nip_atasan))>0 ? "`".$nip_atasan."`" : "";
                    $nama_atasan = strlen(trim($nama_atasan))>0 ? "`".$nama_atasan."`" : "";
                    $status_grievances = strlen(trim($status_grievances))>0 ? "`".$status_grievances."`" : "";
                    $stage_grievances = strlen(trim($stage_grievances))>0 ? "`".$stage_grievances."`" : "";
                    $result_grievances = strlen(trim($result_grievances))>0 ? "`".$result_grievances."`" : "";
                    $rupiah = strlen(trim($rupiah))>0 ? "`".$rupiah."`" : "";
                    $no_sk_hukuman = strlen(trim($no_sk_hukuman))>0 ? "`".$no_sk_hukuman."`" : "";
                    $tgl_sk_hukuman = strlen(trim($tgl_sk_hukuman))>0 ? "`".$tgl_sk_hukuman."`" : "";
                    $pasal_pelanggaran = strlen(trim($pasal_pelanggaran))>0 ? "`".$pasal_pelanggaran."`" : "";
                    $hukuman = strlen(trim($hukuman))>0 ? "`".$hukuman."`" : "";
                    $keterangan = strlen(trim($keterangan))>0 ? "`".$keterangan."`" : "";
                    $no_sk_terkait = strlen(trim($no_sk_terkait))>0 ? "`".$no_sk_terkait."`" : "";
                    $datanya[] = array($nip,$start_date,$end_date,$jenis_grievances,$reason_grievances,$nip_atasan,$nama_atasan,$status_grievances,$stage_grievances,$result_grievances,$rupiah,$no_sk_hukuman,$tgl_sk_hukuman,$pasal_pelanggaran,$hukuman,$keterangan,$no_sk_terkait,$identity_pln_group);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
            } else if($nama_tabel=="r_award"){
                //$rs1 = mysqli_query($koneksi,"select * from ".$nama_tabel." order by id asc");
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $start_date = TanggalIndo2($row["start_date"]);
                    $end_date = TanggalIndo2($row["end_date"]);
                    $kode_award = $row["kode_award"];
                        $rs2 = mysqli_query($koneksi,"select * from m_jenis_award where kode_award='$kode_award'");
                        $hasil2 = mysqli_fetch_array($rs2);
                        $jenis_award = stripslashes ($hasil2['label']);
                    $uraian_award = $row["uraian_award"];
                    $no_sk_penghargaan = $row["no_sk_penghargaan"];
                    $tgl_sk_penghargaan = TanggalIndo2($row["tgl_sk_penghargaan"]);
                    $tingkat_acara = $row["tingkat_acara"];
                    $diberikan_oleh = $row["diberikan_oleh"];
                    $identity_pln_group = "`1006`";

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $start_date = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $end_date = strlen(trim($end_date))>0 ? "`".$end_date."`" : "";
                    $kode_award = strlen(trim($kode_award))>0 ? "`".$kode_award."`" : "";
                    $jenis_award = strlen(trim($jenis_award))>0 ? "`".$jenis_award."`" : "";
                    $uraian_award = strlen(trim($uraian_award))>0 ? "`".$uraian_award."`" : "";
                    $no_sk_penghargaan = strlen(trim($no_sk_penghargaan))>0 ? "`".$no_sk_penghargaan."`" : "";
                    $tgl_sk_penghargaan = strlen(trim($tgl_sk_penghargaan))>0 ? "`".$tgl_sk_penghargaan."`" : "";
                    $tingkat_acara = strlen(trim($tingkat_acara))>0 ? "`".$tingkat_acara."`" : "";
                    $diberikan_oleh = strlen(trim($diberikan_oleh))>0 ? "`".$diberikan_oleh."`" : "";
                    $datanya[] = array($nip,$start_date,$end_date,$kode_award,$jenis_award,$uraian_award,$no_sk_penghargaan,$tgl_sk_penghargaan,$tingkat_acara,$diberikan_oleh,$identity_pln_group);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
            } else if($nama_tabel=="r_identitas"){
                //$rs1 = mysqli_query($koneksi,"select * from ".$nama_tabel." order by id asc");
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $start_date = TanggalIndo2($row["start_date"]);
                    $end_date = TanggalIndo2($row["end_date"]);
                    $kode_identitas = $row["kode_identitas"];
                    $id_number = $row["id_number"];
                    $identity_pln_group = "`1006`";

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $start_date = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $end_date = strlen(trim($end_date))>0 ? "`".$end_date."`" : "";
                    $kode_identitas = strlen(trim($kode_identitas))>0 ? "`".$kode_identitas."`" : "";
                    $id_number = strlen(trim($id_number))>0 ? "`".$id_number."`" : "";
                    $datanya[] = array($nip,$start_date,$end_date,$kode_identitas,$id_number,$identity_pln_group);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
            } else if($nama_tabel=="r_karya_tulis"){
                //$rs1 = mysqli_query($koneksi,"select * from ".$nama_tabel." order by id asc");
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $start_date = TanggalIndo2($row["start_date"]);
                    $end_date = TanggalIndo2($row["end_date"]);
                    $judul = $row["judul"];
                    $media_publikasi = $row["media_publikasi"];
                    $tahun = $row["tahun"];
                    $kode_jenis = $row["kode_jenis"];
                    $identity_pln_group = "`1006`";

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $start_date = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $end_date = strlen(trim($end_date))>0 ? "`".$end_date."`" : "";
                    $judul = strlen(trim($judul))>0 ? "`".$judul."`" : "";
                    $media_publikasi = strlen(trim($media_publikasi))>0 ? "`".$media_publikasi."`" : "";
                    $tahun = strlen(trim($tahun))>0 ? "`".$tahun."`" : "";
                    $kode_jenis = strlen(trim($kode_jenis))>0 ? "`".$kode_jenis."`" : "";
                    $datanya[] = array($nip,$start_date,$end_date,$judul,$media_publikasi,$tahun,$kode_jenis,$identity_pln_group);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
            } else if($nama_tabel=="r_keahlian"){
                //$rs1 = mysqli_query($koneksi,"select * from ".$nama_tabel." order by id asc");
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $start_date = TanggalIndo2($row["start_date"]);
                    $end_date = TanggalIndo2($row["end_date"]);
                    $kode_profesi = $row["kode_profesi"];
                    $tingkat_keahlian = $row["tingkat_keahlian"];
                    $identity_pln_group = "`1006`";

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $start_date = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $end_date = strlen(trim($end_date))>0 ? "`".$end_date."`" : "";
                    $kode_profesi = strlen(trim($kode_profesi))>0 ? "`".$kode_profesi."`" : "";
                    $tingkat_keahlian = strlen(trim($tingkat_keahlian))>0 ? "`".$tingkat_keahlian."`" : "";
                    $datanya[] = array($nip,$start_date,$end_date,$kode_profesi,$tingkat_keahlian,$identity_pln_group);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
            } else if($nama_tabel=="r_lembaga"){
                //$rs1 = mysqli_query($koneksi,"select * from ".$nama_tabel." order by id asc");
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $start_date = TanggalIndo2($row["start_date"]);
                    $end_date = TanggalIndo2($row["end_date"]);
                    $nama_organisasi = $row["nama_organisasi"];
                    $jabatan = $row["jabatan"];
                    $uraian_kegiatan = $row["uraian_kegiatan"];
                    $kode_organisasi = $row["kode_organisasi"];
                    $identity_pln_group = "`1006`";

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $start_date = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $end_date = strlen(trim($end_date))>0 ? "`".$end_date."`" : "";
                    $nama_organisasi = strlen(trim($nama_organisasi))>0 ? "`".$nama_organisasi."`" : "";
                    $jabatan = strlen(trim($jabatan))>0 ? "`".$jabatan."`" : "";
                    $uraian_kegiatan = strlen(trim($uraian_kegiatan))>0 ? "`".$uraian_kegiatan."`" : "";
                    $kode_organisasi = strlen(trim($kode_organisasi))>0 ? "`".$kode_organisasi."`" : "";
                    $datanya[] = array($nip,$start_date,$end_date,$nama_organisasi,$jabatan,$uraian_kegiatan,$kode_organisasi,$identity_pln_group);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
            } else if($nama_tabel=="r_medsos"){
                //$rs1 = mysqli_query($koneksi,"select * from ".$nama_tabel." order by id asc");
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $start_date = TanggalIndo2($row["start_date"]);
                    $end_date = TanggalIndo2($row["end_date"]);
                    $jenis_medsos = $row["jenis_medsos"];
                    $id_medsos = $row["id_medsos"];
                    $identity_pln_group = "`1006`";

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $start_date = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $end_date = strlen(trim($end_date))>0 ? "`".$end_date."`" : "";
                    $jenis_medsos = strlen(trim($jenis_medsos))>0 ? "`".$jenis_medsos."`" : "";
                    $id_medsos = strlen(trim($id_medsos))>0 ? "`".$id_medsos."`" : "";
                    $datanya[] = array($nip,$start_date,$end_date,$jenis_medsos,$id_medsos,$identity_pln_group);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
            } else if($nama_tabel=="r_pembicara"){
                //$rs1 = mysqli_query($koneksi,"select * from ".$nama_tabel." order by id asc");
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $start_date = TanggalIndo2($row["start_date"]);
                    $end_date = TanggalIndo2($row["end_date"]);
                    $judul_acara = $row["judul_acara"];
                    $kode_penyelenggaraan = $row["kode_penyelenggaraan"];
                    $lokasi = $row["lokasi"];
                    $peserta = $row["peserta"];
                    $tingkat_acara = $row["tingkat_acara"];
                    $kode_dahan_profesi = $row["kode_dahan_profesi"];
                    $dahan_profesi = $row["dahan_profesi"];
                    $kode_diklat = $row["kode_diklat"];
                    $judul_diklat = $row["judul_diklat"];
                    $udiklat = $row["udiklat"];
                    $jenis_pelaksanaan = $row["jenis_pelaksanaan"];
                    $jenis_sertifikasi = $row["jenis_sertifikasi"];
                    $sifat_diklat = $row["sifat_diklat"];
                    $identity_pln_group = "`1006`";

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $start_date = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $end_date = strlen(trim($end_date))>0 ? "`".$end_date."`" : "";
                    $judul_acara = strlen(trim($judul_acara))>0 ? "`".$judul_acara."`" : "";
                    $kode_penyelenggaraan = strlen(trim($kode_penyelenggaraan))>0 ? "`".$kode_penyelenggaraan."`" : "";
                    $lokasi = strlen(trim($lokasi))>0 ? "`".$lokasi."`" : "";
                    $peserta = strlen(trim($peserta))>0 ? "`".$peserta."`" : "";
                    $tingkat_acara = strlen(trim($tingkat_acara))>0 ? "`".$tingkat_acara."`" : "";
                    $kode_dahan_profesi = strlen(trim($kode_dahan_profesi))>0 ? "`".$kode_dahan_profesi."`" : "";
                    $dahan_profesi = strlen(trim($dahan_profesi))>0 ? "`".$dahan_profesi."`" : "";
                    $kode_diklat = strlen(trim($kode_diklat))>0 ? "`".$kode_diklat."`" : "";
                    $judul_diklat = strlen(trim($judul_diklat))>0 ? "`".$judul_diklat."`" : "";
                    $udiklat = strlen(trim($udiklat))>0 ? "`".$udiklat."`" : "";
                    $jenis_pelaksanaan = strlen(trim($jenis_pelaksanaan))>0 ? "`".$jenis_pelaksanaan."`" : "";
                    $jenis_sertifikasi = strlen(trim($jenis_sertifikasi))>0 ? "`".$jenis_sertifikasi."`" : "";
                    $sifat_diklat = strlen(trim($sifat_diklat))>0 ? "`".$sifat_diklat."`" : "";
                    $datanya[] = array($nip,$start_date,$end_date,$judul_acara,$kode_penyelenggaraan,$lokasi,$peserta,$tingkat_acara,$kode_dahan_profesi,$dahan_profesi,$kode_diklat,$judul_diklat,$udiklat,$jenis_pelaksanaan,$jenis_sertifikasi,$sifat_diklat,$identity_pln_group);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
            } else if($nama_tabel=="r_atasan"){
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $start_date_jabatan = TanggalIndo2($row["start_date_jabatan"]);
                    $start_date = TanggalIndo2($row["start_date"]);
                    $end_date = TanggalIndo2($row["end_date"]);
                    $jabatan_atasan = $row["jabatan_atasan"];
                    $nip_atasan = $row["nip_atasan"];
                    $nama_atasan = $row["nama_atasan"];
                    $kode_posisi = $row["kode_posisi"];
                    $identity_pln_group = "`1006`";

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $start_date_jabatan = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $start_date = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $end_date = strlen(trim($end_date))>0 ? "`".$end_date."`" : "";
                    $jabatan_atasan = strlen(trim($jabatan_atasan))>0 ? "`".$jabatan_atasan."`" : "";
                    $nip_atasan = strlen(trim($nip_atasan))>0 ? "`".$nip_atasan."`" : "";
                    $nama_atasan = strlen(trim($nama_atasan))>0 ? "`".$nama_atasan."`" : "";
                    $kode_posisi = strlen(trim($kode_posisi))>0 ? "`".$kode_posisi."`" : "";
                    $datanya[] = array($nip,$start_date_jabatan,$start_date,$end_date,$jabatan_atasan,$nip_atasan,$nama_atasan,$kode_posisi,$identity_pln_group);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
            } else if($nama_tabel=="r_urjab"){
                $rs1 = mysqli_query($koneksi,"select * from ".$nama_tabel." order by id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $lokasi_file = $row["lokasi_file"];
                    $nama_file = $row["nama_file"];
                    $no_dokumen = $row["no_dokumen"];
                    $keterangan = $row["keterangan"];
                    $identity_pln_group = "`1006`";

                    $lokasi_file = strlen(trim($lokasi_file))>0 ? "`".$lokasi_file."`" : "";
                    $nama_file = strlen(trim($nama_file))>0 ? "`".$nama_file."`" : "";
                    $no_dokumen = strlen(trim($no_dokumen))>0 ? "`".$no_dokumen."`" : "";
                    $keterangan = strlen(trim($keterangan))>0 ? "`".$keterangan."`" : "";
                    $datanya[] = array($identity_pln_group,$lokasi_file,$nama_file,$no_dokumen,$keterangan);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
            } else if($nama_tabel=="r_struktur"){
                $rs1 = mysqli_query($koneksi,"select * from ".$nama_tabel." order by id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $lokasi_file = $row["lokasi_file"];
                    $nama_file = $row["nama_file"];
                    $keterangan = $row["keterangan"];
                    $no_dokumen = $row["no_dokumen"];
                    $identity_pln_group = "`1006`";

                    $lokasi_file = strlen(trim($lokasi_file))>0 ? "`".$lokasi_file."`" : "";
                    $nama_file = strlen(trim($nama_file))>0 ? "`".$nama_file."`" : "";
                    $keterangan = strlen(trim($keterangan))>0 ? "`".$keterangan."`" : "";
                    $no_dokumen = strlen(trim($no_dokumen))>0 ? "`".$no_dokumen."`" : "";
                    $datanya[] = array($identity_pln_group,$lokasi_file,$nama_file,$keterangan,$no_dokumen);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
            } else if($nama_tabel=="r_foto"){
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $lokasi_foto = $row["lokasi_foto"];
                    $nama_file = $row["nama_file"];
                    $identity_pln_group = "`1006`";

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $lokasi_foto = strlen(trim($lokasi_foto))>0 ? "`".$lokasi_foto."`" : "";
                    $nama_file = strlen(trim($nama_file))>0 ? "`".$nama_file."`" : "";
                    $datanya[] = array($nip,$lokasi_foto,$nama_file,$identity_pln_group);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
            } else if($nama_tabel=="r_penugasan"){
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $start_date = TanggalIndo2($row["start_date"]);
                    $end_date = TanggalIndo2($row["end_date"]);
                    $tupoksi = $row["tupoksi"];
                    $peran = $row["peran"];
                    $penugasan = $row["penugasan"];
                    $identity_pln_group = "`1006`";

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $start_date = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $end_date = strlen(trim($end_date))>0 ? "`".$end_date."`" : "";
                    $tupoksi = strlen(trim($tupoksi))>0 ? "`".$tupoksi."`" : "";
                    $peran = strlen(trim($peran))>0 ? "`".$peran."`" : "";
                    $penugasan = strlen(trim($penugasan))>0 ? "`".$penugasan."`" : "";
                    $datanya[] = array($nip,$start_date,$end_date,$tupoksi,$peran,$penugasan,$identity_pln_group);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
            } else if($nama_tabel=="r_pengajar"){
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $start_date = TanggalIndo2($row["start_date"]);
                    $end_date = TanggalIndo2($row["end_date"]);
                    $kode_dahan_profesi = $row["kode_dahan_profesi"];
                    $dahan_profesi = $row["dahan_profesi"];
                    $kode_diklat = $row["kode_diklat"];
                    $judul_diklat = $row["judul_diklat"];
                    $udiklat = $row["udiklat"];
                    $jenis_pelaksanaan = $row["jenis_pelaksanaan"];
                    $jenis_sertifikasi = $row["jenis_sertifikasi"];
                    $sifat_diklat = $row["sifat_diklat"];
                    $penyelenggaraan = $row["penyelenggaraan"];
                    $keterangan_pengajar = $row["keterangan_pengajar"];
                    $identity_pln_group = "`1006`";

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $start_date = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $end_date = strlen(trim($end_date))>0 ? "`".$end_date."`" : "";
                    $kode_dahan_profesi = strlen(trim($kode_dahan_profesi))>0 ? "`".$kode_dahan_profesi."`" : "";
                    $dahan_profesi = strlen(trim($dahan_profesi))>0 ? "`".$dahan_profesi."`" : "";
                    $kode_diklat = strlen(trim($kode_diklat))>0 ? "`".$kode_diklat."`" : "";
                    $judul_diklat = strlen(trim($judul_diklat))>0 ? "`".$judul_diklat."`" : "";
                    $udiklat = strlen(trim($udiklat))>0 ? "`".$udiklat."`" : "";
                    $jenis_pelaksanaan = strlen(trim($jenis_pelaksanaan))>0 ? "`".$jenis_pelaksanaan."`" : "";
                    $jenis_sertifikasi = strlen(trim($jenis_sertifikasi))>0 ? "`".$jenis_sertifikasi."`" : "";
                    $sifat_diklat = strlen(trim($sifat_diklat))>0 ? "`".$sifat_diklat."`" : "";
                    $penyelenggaraan = strlen(trim($penyelenggaraan))>0 ? "`".$penyelenggaraan."`" : "";
                    $keterangan_pengajar = strlen(trim($keterangan_pengajar))>0 ? "`".$keterangan_pengajar."`" : "";
                    $datanya[] = array($nip,$start_date,$end_date,$kode_dahan_profesi,$dahan_profesi,$kode_diklat,$judul_diklat,$udiklat,$jenis_pelaksanaan,$jenis_sertifikasi,$sifat_diklat,$penyelenggaraan,$keterangan_pengajar,$identity_pln_group);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
            } else if($nama_tabel=="r_diklat_penjenjangan"){
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $start_date = TanggalIndo2($row["start_date"]);
                    $end_date = TanggalIndo2($row["end_date"]);
                    $jenis_diklat = $row["jenis_diklat"];
                    $kode_diklat = $row["kode_diklat"];
                    $judul_diklat = $row["judul_diklat"];
                    $udiklat = $row["udiklat"];
                    $kode_profesi = $row["kode_profesi"];
                    $level_profesiensi = $row["level_profesiensi"];
                    $grade_nilai = $row["grade_nilai"];
                    $nilai = $row["nilai"];
                    $keterangan_lulus = $row["keterangan_lulus"];
                    $keterangan_penyelesaian = $row["keterangan_penyelesaian"];
                    $kode_sertifikat = $row["kode_sertifikat"];
                    $tgl_terbit = TanggalIndo2($row["tgl_terbit"]);
                    $tgl_selesai = TanggalIndo2($row["tgl_selesai"]);
                    $identity_pln_group = "`1006`";
                    $kode_transaksi = $row["kode_transaksi"];

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $start_date = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $end_date = strlen(trim($end_date))>0 ? "`".$end_date."`" : "";
                    $jenis_diklat = strlen(trim($jenis_diklat))>0 ? "`".$jenis_diklat."`" : "";
                    $kode_diklat = strlen(trim($kode_diklat))>0 ? "`".$kode_diklat."`" : "";
                    $judul_diklat = strlen(trim($judul_diklat))>0 ? "`".$judul_diklat."`" : "";
                    $udiklat = strlen(trim($udiklat))>0 ? "`".$udiklat."`" : "";
                    $kode_profesi = strlen(trim($kode_profesi))>0 ? "`".$kode_profesi."`" : "";
                    $level_profesiensi = strlen(trim($level_profesiensi))>0 ? "`".$level_profesiensi."`" : "";
                    $grade_nilai = strlen(trim($grade_nilai))>0 ? "`".$grade_nilai."`" : "";
                    $nilai = strlen(trim($nilai))>0 ? "`".$nilai."`" : "";
                    $keterangan_lulus = strlen(trim($keterangan_lulus))>0 ? "`".$keterangan_lulus."`" : "";
                    $keterangan_penyelesaian = strlen(trim($keterangan_penyelesaian))>0 ? "`".$keterangan_penyelesaian."`" : "";
                    $kode_sertifikat = strlen(trim($kode_sertifikat))>0 ? "`".$kode_sertifikat."`" : "";
                    $tgl_terbit = strlen(trim($tgl_terbit))>0 ? "`".$tgl_terbit."`" : "";
                    $tgl_selesai = strlen(trim($tgl_selesai))>0 ? "`".$tgl_selesais."`" : "";
                    $kode_transaksi = strlen(trim($kode_transaksi))>0 ? "`".$kode_transaksi."`" : "";
                    $datanya[] = array($nip,$start_date,$end_date,$jenis_diklat,$kode_diklat,$judul_diklat,$udiklat,$kode_profesi,$level_profesiensi,$grade_nilai,$nilai,$keterangan_lulus,$keterangan_penyelesaian,$kode_sertifikat,$tgl_terbit,$tgl_selesai,$identity_pln_group,$kode_transaksi);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
            } else if($nama_tabel=="r_diklat"){
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $start_date = TanggalIndo2($row["start_date"]);
                    $end_date = TanggalIndo2($row["end_date"]);
                    $jenis_diklat = $row["jenis_diklat"];
                    $kode_diklat = $row["kode_diklat"];
                    $judul_diklat = $row["judul_diklat"];
                    $penyelenggaraan = $row["penyelenggaraan"];
                    $kode_profesi = $row["kode_profesi"];
                    $level_profesiensi = $row["level_profesiensi"];
                    $nama_institusi = $row["nama_institusi"];
                    $kota_institusi = $row["kota_institusi"];
                    $kota_lainnya = $row["kota_lainnya"];
                    $negara_institusi = $row["negara_institusi"];
                    $lama_diklat = $row["lama_diklat"];
                    $satuan_diklat = $row["satuan_diklat"];
                    $nilai = $row["nilai"];
                    $grade_nilai = $row["grade_nilai"];
                    $jenis_pelaksanaan = $row["jenis_pelaksanaan"];
                    $jenis_sertifikasi = $row["jenis_sertifikasi"];
                    $sifat_diklat = $row["sifat_diklat"];
                    $konfirmasi_kehadiran = $row["konfirmasi_kehadiran"];
                    $keterangan_lulus = $row["keterangan_lulus"];
                    $kode_sertifikat = $row["kode_sertifikat"];
                    $tgl_terbit = TanggalIndo2($row["tgl_terbit"]);
                    $tgl_selesai = TanggalIndo2($row["tgl_selesai"]);
                    $udiklat = $row["udiklat"];
                    $keterangan_realisasi = $row["keterangan_realisasi"];
                    $keterangan_penyelesaian = $row["keterangan_penyelesaian"];
                    $kode_dahan_profesi = $row["kode_dahan_profesi"];
                    $dahan_profesi = $row["dahan_profesi"];
                    $identity_pln_group = "`1006`";
                    $kode_transaksi = $row["kode_transaksi"];

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $start_date = strlen(trim($start_date))>0 ? "`".$start_date."`" : "";
                    $end_date = strlen(trim($end_date))>0 ? "`".$end_date."`" : "";
                    $jenis_diklat = strlen(trim($jenis_diklat))>0 ? "`".$jenis_diklat."`" : "";
                    $kode_diklat = strlen(trim($kode_diklat))>0 ? "`".$kode_diklat."`" : "";
                    $judul_diklat = strlen(trim($judul_diklat))>0 ? "`".$judul_diklat."`" : "";
                    $penyelenggaraan = strlen(trim($penyelenggaraan))>0 ? "`".$penyelenggaraan."`" : "";
                    $kode_profesi = strlen(trim($kode_profesi))>0 ? "`".$kode_profesi."`" : "";
                    $level_profesiensi = strlen(trim($level_profesiensi))>0 ? "`".$level_profesiensi."`" : "";
                    $nama_institusi = strlen(trim($nama_institusi))>0 ? "`".$nama_institusi."`" : "";
                    $kota_institusi = strlen(trim($kota_institusi))>0 ? "`".$kota_institusi."`" : "";
                    $kota_lainnya = strlen(trim($kota_lainnya))>0 ? "`".$kota_lainnya."`" : "";
                    $negara_institusi = strlen(trim($negara_institusi))>0 ? "`".$negara_institusi."`" : "";
                    $lama_diklat = strlen(trim($lama_diklat))>0 ? "`".$lama_diklat."`" : "";
                    $satuan_diklat = strlen(trim($satuan_diklat))>0 ? "`".$satuan_diklat."`" : "";
                    $nilai = strlen(trim($nilai))>0 ? "`".$nilai."`" : "";
                    $grade_nilai = strlen(trim($grade_nilai))>0 ? "`".$grade_nilai."`" : "";
                    $jenis_pelaksanaan = strlen(trim($jenis_pelaksanaan))>0 ? "`".$jenis_pelaksanaan."`" : "";
                    $jenis_sertifikasi = strlen(trim($jenis_sertifikasi))>0 ? "`".$jenis_sertifikasi."`" : "";
                    $sifat_diklat = strlen(trim($sifat_diklat))>0 ? "`".$sifat_diklat."`" : "";
                    $konfirmasi_kehadiran = strlen(trim($konfirmasi_kehadiran))>0 ? "`".$konfirmasi_kehadiran."`" : "";
                    $keterangan_lulus = strlen(trim($keterangan_lulus))>0 ? "`".$keterangan_lulus."`" : "";
                    $kode_sertifikat = strlen(trim($kode_sertifikat))>0 ? "`".$kode_sertifikat."`" : "";
                    $tgl_terbit = strlen(trim($tgl_terbit))>0 ? "`".$tgl_terbit."`" : "";
                    $tgl_selesai = strlen(trim($tgl_selesai))>0 ? "`".$tgl_selesai."`" : "";
                    $udiklat = strlen(trim($udiklat))>0 ? "`".$udiklat."`" : "";
                    $keterangan_realisasi = strlen(trim($keterangan_realisasi))>0 ? "`".$keterangan_realisasi."`" : "";
                    $keterangan_penyelesaian = strlen(trim($keterangan_penyelesaian))>0 ? "`".$keterangan_penyelesaian."`" : "";
                    $kode_dahan_profesi = strlen(trim($kode_dahan_profesi))>0 ? "`".$kode_dahan_profesi."`" : "";
                    $dahan_profesi = strlen(trim($dahan_profesi))>0 ? "`".$dahan_profesi."`" : "";
                    $kode_transaksi = strlen(trim($kode_transaksi))>0 ? "`".$kode_transaksi."`" : "";
                    
                    $datanya[] = array($nip,$start_date,$end_date,$jenis_diklat,$kode_diklat,$judul_diklat,$penyelenggaraan,$kode_profesi,$level_profesiensi,$nama_institusi,$kota_institusi,$kota_lainnya,$negara_institusi,$lama_diklat,$satuan_diklat,$nilai,$grade_nilai,$jenis_pelaksanaan,$jenis_sertifikasi,$sifat_diklat,$konfirmasi_kehadiran,$keterangan_lulus,$kode_sertifikat,$tgl_terbit,$tgl_selesai,$udiklat,$keterangan_realisasi,$keterangan_penyelesaian,$kode_dahan_profesi,$dahan_profesi,$identity_pln_group,$kode_transaksi);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
            } else if($nama_tabel=="r_pengangkatan"){
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,a.nama_lengkap,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip where b.keterangan_mutasi<>'' order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $nama_lengkap = $row["nama_lengkap"];
                    $tgl_lahir = TanggalIndo2($row["tgl_lahir"]);
                    $jenis_kelamin = $row["jenis_kelamin"];
                    $person_grade = $row["person_grade"];
                    $agama = $row["agama"];
                    $nik = $row["nik"];
                    $npwp = $row["npwp"];
                    $tgl_masuk = TanggalIndo2($row["tgl_masuk"]);
                    $tgl_capeg = TanggalIndo2($row["tgl_capeg"]);
                    $tgl_tetap = TanggalIndo2($row["tgl_tetap"]);
                    $keterangan_mutasi = $row["keterangan_mutasi"];
                    $tahun_pengangkatan = $row["tahun_pengangkatan"];
                    $kode_pln_group = $row["kode_pln_group"];

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $nama_lengkap = strlen(trim($nama_lengkap))>0 ? "`".$nama_lengkap."`" : "";
                    $tgl_lahir = strlen(trim($tgl_lahir))>0 ? "`".$tgl_lahir."`" : "";
                    $jenis_kelamin = strlen(trim($jenis_kelamin))>0 ? "`".$jenis_kelamin."`" : "";
                    $person_grade = strlen(trim($person_grade))>0 ? "`".$person_grade."`" : "";
                    $agama = strlen(trim($agama))>0 ? "`".$agama."`" : "";
                    $nik = strlen(trim($nik))>0 ? "`".$nik."`" : "";
                    $npwp = strlen(trim($npwp))>0 ? "`".$npwp."`" : "";
                    $tgl_masuk = strlen(trim($tgl_masuk))>0 ? "`".$tgl_masuk."`" : "";
                    $tgl_capeg = strlen(trim($tgl_capeg))>0 ? "`".$tgl_capeg."`" : "";
                    $tgl_tetap = strlen(trim($tgl_tetap))>0 ? "`".$tgl_tetap."`" : "";
                    $keterangan_mutasi = strlen(trim($keterangan_mutasi))>0 ? "`".$keterangan_mutasi."`" : "";
                    $tahun_pengangkatan = strlen(trim($tahun_pengangkatan))>0 ? "`".$tahun_pengangkatan."`" : "";
                    $kode_pln_group = strlen(trim($kode_pln_group))>0 ? "`".$kode_pln_group."`" : "";
                    
                    $datanya[] = array($nip,$nama_lengkap,$tgl_lahir,$jenis_kelamin,$person_grade,$agama,$nik,$npwp,$tgl_masuk,$tgl_capeg,$tgl_tetap,$keterangan_mutasi,$tahun_pengangkatan,$kode_pln_group);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                    }
                }
            } else if($nama_tabel=="r_pemberhentian"){
                $rs1 = mysqli_query($koneksi,"select a.nip as nip2,a.nama_lengkap,b.* from data_pegawai a inner join ".$nama_tabel." b ON a.nip=b.nip order by a.nip,b.id asc");
                while($row = mysqli_fetch_array($rs1)){                
                    $nip = $row["nip2"];
                    $nama_lengkap = $row["nama_lengkap"];
                    $tgl_lahir = TanggalIndo2($row["tgl_lahir"]);
                    $jenis_kelamin = $row["jenis_kelamin"];
                    $person_grade = $row["person_grade"];
                    $phdp_terakhir = $row["phdp_terakhir"];
                    $agama = $row["agama"];
                    $nik = $row["nik"];
                    $npwp = $row["npwp"];
                    $tgl_masuk = TanggalIndo2($row["tgl_masuk"]);
                    $tgl_capeg = TanggalIndo2($row["tgl_capeg"]);
                    $tgl_tetap = TanggalIndo2($row["tgl_tetap"]);
                    $tgl_berhenti = TanggalIndo2($row["tgl_berhenti"]);
                    $alasan_berhenti = $row["alasan_berhenti"];
                    $dplk_dapen = $row["dplk_dapen"];
                    $bank_dplk = $row["bank_dplk"];
                    $no_peserta = $row["no_peserta"];
                    $no_bpjs_kes = $row["no_bpjs_kes"];
                    $no_bpjs_tk = $row["no_bpjs_tk"];
                    $tahun_pemberhentian = $row["tahun_pemberhentian"];
                    $kode_pln_group = $row["kode_pln_group"];

                    $nip = strlen(trim($nip))>0 ? "`".$nip."`" : "";
                    $nama_lengkap = strlen(trim($nama_lengkap))>0 ? "`".$nama_lengkap."`" : "";
                    $tgl_lahir = strlen(trim($tgl_lahir))>0 ? "`".$tgl_lahir."`" : "";
                    $jenis_kelamin = strlen(trim($jenis_kelamin))>0 ? "`".$jenis_kelamin."`" : "";
                    $person_grade = strlen(trim($person_grade))>0 ? "`".$person_grade."`" : "";
                    $phdp_terakhir = strlen(trim($phdp_terakhir))>0 ? "`".$phdp_terakhir."`" : "";
                    $agama = strlen(trim($agama))>0 ? "`".$agama."`" : "";
                    $nik = strlen(trim($nik))>0 ? "`".$nik."`" : "";
                    $npwp = strlen(trim($npwp))>0 ? "`".$npwp."`" : "";
                    $tgl_masuk = strlen(trim($tgl_masuk))>0 ? "`".$tgl_masuk."`" : "";
                    $tgl_capeg = strlen(trim($tgl_capeg))>0 ? "`".$tgl_capeg."`" : "";
                    $tgl_tetap = strlen(trim($tgl_tetap))>0 ? "`".$tgl_tetap."`" : "";
                    $tgl_berhenti = strlen(trim($tgl_berhenti))>0 ? "`".$tgl_berhenti."`" : "";
                    $alasan_berhenti = strlen(trim($alasan_berhenti))>0 ? "`".$alasan_berhenti."`" : "";
                    $dplk_dapen = strlen(trim($dplk_dapen))>0 ? "`".$dplk_dapen."`" : "";
                    $bank_dplk = strlen(trim($bank_dplk))>0 ? "`".$bank_dplk."`" : "";
                    $no_peserta = strlen(trim($no_peserta))>0 ? "`".$no_peserta."`" : "";
                    $no_bpjs_kes = strlen(trim($no_bpjs_kes))>0 ? "`".$no_bpjs_kes."`" : "";
                    $no_bpjs_tk = strlen(trim($no_bpjs_tk))>0 ? "`".$no_bpjs_tk."`" : "";
                    $tahun_pemberhentian = strlen(trim($tahun_pemberhentian))>0 ? "`".$tahun_pemberhentian."`" : "";
                    $kode_pln_group = strlen(trim($kode_pln_group))>0 ? "`".$kode_pln_group."`" : "";
                    $datanya[] = array($nip,$nama_lengkap,$tgl_lahir,$jenis_kelamin,$person_grade,$phdp_terakhir,$agama,$nik,$npwp,$tgl_masuk,$tgl_capeg,$tgl_tetap,$tgl_berhenti,$alasan_berhenti,$dplk_dapen,$bank_dplk,$no_peserta,$no_bpjs_kes,$no_bpjs_tk,$tahun_pemberhentian,$kode_pln_group);
                }
                foreach ($datanya as $line){
                    fwrite($file, implode('|', $line) . "\r\n");
                }
                fclose($file); 
    
                if(file_exists($uploadDir1.$filename)){
                    if($id==0){
                        $sql = "insert into edata(blth,id_edata,tgl_export,file_export,petugas) values('$blth2','$idsnya2','$tgl_export','$namafile','$userhris')";
                    } else {
                        $sql = "update edata set tgl_export='$tgl_export',file_export='$namafile',petugas='$userhris' where id=$id";
                    }
                    $result = @mysqli_query($koneksi,$sql);
                    if ($result){
                        $sukses++;
                        //$pesan = "Sukses";
                    } else {
                        //$pesan = mysqli_error($koneksi);
                    }
                }

            }
        }
    }
    echo json_encode(array('success'=>true));
    //echo json_encode(array('success'=>$pesan));
    

}           
?>