<?php
session_start();
ini_set('display_errors', 1);   
error_reporting(E_ALL);
$userhris = $_SESSION["userakseshris"];
if ($userhris) {
    function TanggalIndo($date)
    {
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
        return $result;
    }
    function TanggalIndo4($date)
    {
        $BulanIndo = array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agt", "Sep", "Okt", "Nop", "Des");
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $result = $tgl . "-" . $BulanIndo[(int) $bulan - 1] . "-" . $tahun;
        return ($result);
    }

    function TanggalIndo3($date)
    {
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $result = $BulanIndo[(int) $bulan - 1] . " " . $tahun;
        return ($result);
    }

    function TanggalIndo2($date)
    {
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $result = $tgl . "-" . $bulan . "-" . $tahun;
        return ($result);
    }
    function terbilang($x)
    {
        $x = (int) $x;
        $abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        if ($x < 12)
            return " " . $abil[$x];
        elseif ($x < 20)
            return Terbilang($x - 10) . " Belas";
        elseif ($x < 100)
            return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);
        elseif ($x < 200)
            return " Seratus" . Terbilang($x - 100);
        elseif ($x < 1000)
            return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);
        elseif ($x < 2000)
            return " Seribu" . Terbilang($x - 1000);
        elseif ($x < 1000000)
            return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);
        elseif ($x < 1000000000)
            return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);
    }
    $tempdir = "temp/";
    if (!file_exists($tempdir))
        mkdir($tempdir);

    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fungsi.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/phpqrcode/qrlib.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/tools/fpdf.php";
    $tanggal1 = $_REQUEST['tanggal1'];
    $tanggal2 = $_REQUEST['tanggal1'];

    // $idsppd = $_REQUEST['idsppd'];

    $hari_ini = date("Y-m-d");
    $hari_ini2 = TanggalIndo($hari_ini);
    // ob_start(); // Memulai bufering output
    $pdf = new FPDF('p', 'mm', 'A4');
    $pdf->SetMargins(10, 15, 10);
    $pdf->AliasNbPages();
    $pdf->SetAutoPageBreak(false);
    $pdf->SetFillColor(183, 183, 183);
    /*
    $query1 = "SELECT * FROM data_pegawai where approval_sdm='1'";
    $hasilnya1 = $this->db->query($query1)->result();             
    foreach( $hasilnya1 as $row1 ){
        $nama_sdm = $row1->nama;
        $jabatan_sdm = $row1->jabatan;
        $ttd_sdm = $row1->ttd;
    }

    $query2 = "SELECT * FROM data_pegawai where approval_pembayaran='1'";
    $hasilnya2 = $this->db->query($query2)->result();
    foreach( $hasilnya2 as $row2 ){
        $nama_keuangan = $row2->nama;
        $jabatan_keuangan = $row2->jabatan;
        $ttd_keuangan = $row2->ttd;
    }
    */
    //$row2 = $this->db->query("select * from sppd where idsppd='$idsppd'")->row();
    //$query2 = "SELECT a.*,b.nama as nama2,b.jabatan as jabatan2 FROM sppd1 a, data_pegawai b WHERE a.approval2=b.nip and a.idsppd='$idsppd'";

    $rs = mysqli_query($koneksi, "select * from sppd1 where approvebayar='2' and bayar='0' and tgl_approvebayar>='$tanggal1' and tgl_approvebayar<='$tanggal2' order by tgl_approvebayar asc");
    while ($hasil = mysqli_fetch_array($rs)) {
        var_dump($hasil);
        // continue;
        $idsppd = stripslashesx($hasil['idsppd']);
        $tanggal = stripslashesx($hasil['tanggal']);
        $nip = stripslashesx($hasil['nip']);
        $nama = stripslashesx($hasil['nama']);
        $grade = stripslashesx($hasil['grade']);
        $jabatan = stripslashesx($hasil['jabatan']);
        $jenis_sppd = stripslashesx($hasil['jenis_sppd']);
        $level_sppd = stripslashesx($hasil['level_sppd']);
        $no_sppd = stripslashesx($hasil['no_sppd']);
        $transportasi = stripslashesx($hasil['transportasi']);
        $tgl_awal = stripslashesx($hasil['tgl_awal']);
        $tgl_akhir = stripslashesx($hasil['tgl_akhir']);
        $hari = intval($hasil['hari']);
        $hari1 = $hari;
        $hari2 = $hari - 1;

        //$nama_pejabat = $row2->nama2;
        //$jabatan_pejabat = $row2->jabatan2;
        $total_hari = $hari;
        $total_hari2 = $hari - 1;
        $tgl_berangkat = TanggalIndo($tgl_awal);
        $tgl_kembali = TanggalIndo($tgl_akhir);

        $maksud = stripslashesx($hasil['maksud']);
        $kedudukan = stripslashesx($hasil['kedudukan']);
        $tujuan = stripslashesx($hasil['tujuan']);
        $tujuannya = explode(",", $tujuan);
        $jumlah_tujuan = count($tujuannya);
        $tujuan1 = $tujuannya[0];
        $tujuan2 = "";
        $tujuan3 = "";
        $tujuan4 = "";
        if ($jumlah_tujuan == 2) {
            $tujuan2 = $tujuannya[1];
        }
        if ($jumlah_tujuan == 3) {
            $tujuan3 = $tujuannya[2];
        }
        if ($jumlah_tujuan == 4) {
            $tujuan4 = $tujuannya[3];
        }
        $kota_tiba1 = $tujuan1;
        $tgl_tiba1 = TanggalIndo($tgl_awal);
        if ($tujuan2 != "") {
            $kota_berangkat1 = $tujuan1;
            $kota_tujuan1 = $tujuan2;
            $tgl_berangkat1 = "";
        } else {
            $kota_berangkat1 = $tujuan1;
            $kota_tujuan1 = $kedudukan;
            $tgl_berangkat1 = TanggalIndo($tgl_akhir);
        }
        if ($tujuan3 != "") {
            $kota_tiba2 = $tujuan2;
            $tgl_tiba2 = "";
            $kota_berangkat2 = $tujuan2;
            $kota_tujuan2 = $tujuan3;
            $tgl_berangkat2 = "";
        } else {
            $kota_tiba2 = "";
            $tgl_tiba2 = "";
            $kota_berangkat2 = "";
            $kota_tujuan2 = "";
            $tgl_berangkat2 = "";
        }
        if ($tujuan4 != "") {
            $kota_tiba3 = $tujuan3;
            $tgl_tiba3 = "";
            $kota_berangkat3 = $tujuan3;
            $kota_tujuan3 = $kedudukan;
            $tgl_berangkat3 = "";
        } else {
            $kota_tiba3 = "";
            $tgl_tiba3 = "";
            $kota_berangkat3 = "";
            $kota_tujuan3 = "";
            $tgl_berangkat3 = "";
        }

        $rs3 = mysqli_query($koneksi, "select * from biaya_sppd1 where idsppd='$idsppd'");
        $hasil3 = mysqli_fetch_array($rs3);
        $biaya_transporta = stripslashesx($hasil3['transporta']);
        $biaya_transportb = stripslashesx($hasil3['transportb']);
        $biaya_transportc = stripslashesx($hasil3['transportc']);
        $biaya_transportd = stripslashesx($hasil3['transportd']);
        $total_transport = stripslashesx($hasil3['total_transport']);
        $transportasi_lokal = stripslashesx($hasil3['transportasi_lokal']);
        $airport_tax = stripslashesx($hasil3['airport_tax']);

        $hari_konsumsi1 = stripslashesx($hasil3['hari_konsumsi1']);
        $persen_konsumsi1 = stripslashesx($hasil3['persen_konsumsi1']);
        $nilai_konsumsi1 = stripslashesx($hasil3['nilai_konsumsi1']);
        $total_konsumsi1 = stripslashesx($hasil3['total_konsumsi1']);
        $hari_laundry1 = stripslashesx($hasil3['hari_laundry1']);
        $persen_laundry1 = stripslashesx($hasil3['persen_laundry1']);
        $nilai_laundry1 = stripslashesx($hasil3['nilai_laundry1']);
        $total_laundry1 = stripslashesx($hasil3['total_laundry1']);
        $hari_penginapan1 = stripslashesx($hasil3['hari_penginapan1']);
        $persen_penginapan1 = stripslashesx($hasil3['persen_penginapan1']);
        $nilai_penginapan1 = stripslashesx($hasil3['nilai_penginapan1']);
        $total_penginapan1 = stripslashesx($hasil3['total_penginapan1']);

        $hari_konsumsi2 = stripslashesx($hasil3['hari_konsumsi2']);
        $persen_konsumsi2 = stripslashesx($hasil3['persen_konsumsi2']);
        $nilai_konsumsi2 = stripslashesx($hasil3['nilai_konsumsi2']);
        $total_konsumsi2 = stripslashesx($hasil3['total_konsumsi2']);
        $hari_laundry2 = stripslashesx($hasil3['hari_laundry2']);
        $persen_laundry2 = stripslashesx($hasil3['persen_laundry2']);
        $nilai_laundry2 = stripslashesx($hasil3['nilai_laundry2']);
        $total_laundry2 = stripslashesx($hasil3['total_laundry2']);
        $hari_penginapan2 = stripslashesx($hasil3['hari_penginapan2']);
        $persen_penginapan2 = stripslashesx($hasil3['persen_penginapan2']);
        $nilai_penginapan2 = stripslashesx($hasil3['nilai_penginapan2']);
        $total_penginapan2 = stripslashesx($hasil3['total_penginapan2']);

        $hari_pegawai = stripslashesx($hasil3['hari_pegawai']);
        $persen_pegawai = stripslashesx($hasil3['persen_pegawai']);
        $nilai_pegawai = stripslashesx($hasil3['nilai_pegawai']);
        $total_pegawai = stripslashesx($hasil3['total_pegawai']);

        $keluarga = stripslashesx($hasil3['keluarga']);
        $hari_keluarga = stripslashesx($hasil3['hari_keluarga']);
        $persen_keluarga = stripslashesx($hasil3['persen_keluarga']);
        $nilai_keluarga = stripslashesx($hasil3['nilai_keluarga']);
        $total_keluarga = stripslashesx($hasil3['total_keluarga']);

        $pengantar = stripslashesx($hasil3['pengantar']);
        $hari_pengantar = stripslashesx($hasil3['hari_pengantar']);
        $persen_pengantar = stripslashesx($hasil3['persen_pengantar']);
        $nilai_pengantar = stripslashesx($hasil3['nilai_pengantar']);
        $total_pengantar = stripslashesx($hasil3['total_pengantar']);

        $hari_suamiistri = stripslashesx($hasil3['hari_suamiistri']);
        $persen_suamiistri = stripslashesx($hasil3['persen_suamiistri']);
        $nilai_suamiistri = stripslashesx($hasil3['nilai_suamiistri']);
        $total_suamiistri = stripslashesx($hasil3['total_suamiistri']);

        $anak = stripslashesx($hasil3['anak']);
        $hari_anak = stripslashesx($hasil3['hari_anak']);
        $persen_anak = stripslashesx($hasil3['persen_anak']);
        $nilai_anak = stripslashesx($hasil3['nilai_anak']);
        $total_anak = stripslashesx($hasil3['total_anak']);

        $berat_pengepakan = stripslashesx($hasil3['berat_pengepakan']);
        $nilai_pengepakan = stripslashesx($hasil3['nilai_pengepakan']);
        $total_pengepakan = stripslashesx($hasil3['total_pengepakan']);
        $total1 = stripslashesx($hasil3['total']);
        $total2 = 0;
        $total = $total1 + $total2;

        //$ttd = "";

        $approval1 = stripslashesx($hasil['approval1']);
        $rs4 = mysqli_query($koneksi, "select * from data_pegawai where nip='$approval1'");
        $hasil4 = mysqli_fetch_array($rs4);
        if ($hasil4) {
            $nip_pejabat = $approval1;
            $nama_pejabat = stripslashesx($hasil4['nama']);
            $jabatan_pejabat = stripslashesx($hasil4['jabatan']);
            $ttd_sdm = "";
        } else {
            $nip2 = "";
            $nama_pejabat = "";
            $jabatan_pejabat = "";
            $ttd_sdm = "";
        }

        $approvalsdm = stripslashesx($hasil['approvalsdm']);
        $rs4 = mysqli_query($koneksi, "select * from data_pegawai where nip='$approvalsdm'");
        $hasil4 = mysqli_fetch_array($rs4);
        if ($hasil4) {
            $nip_sdm = $approvalsdm;
            $nama_sdm = stripslashesx($hasil4['nama']);
            $jabatan_sdm = stripslashesx($hasil4['jabatan']);
            $ttd_sdm = "";
        } else {
            $nip_sdm = "";
            $nama_sdm = "";
            $jabatan_sdm = "";
            $ttd_sdm = "";
        }

        $approvalbayar = stripslashesx($hasil['approvalbayar']);
        $rs4 = mysqli_query($koneksi, "select * from data_pegawai where nip='$approvalbayar'");
        $hasil4 = mysqli_fetch_array($rs4);
        if ($hasil4) {
            $nip_keuangan = $approvalsdm;
            $nama_keuangan = stripslashesx($hasil4['nama']);
            $jabatan_keuangan = stripslashesx($hasil4['jabatan']);
            $ttd_keuangan = "";
        } else {
            $nip_keuangan = "";
            $nama_keuangan = "";
            $jabatan_keuangan = "";
            $ttd_keuangan = "";
        }


        $no = 1;
        $nama_pengikut1 = "";
        $nama_pengikut2 = "";
        $nama_pengikut3 = "";
        $nama_pengikut4 = "";
        $nama_pengikut5 = "";
        $hubungan_pengikut1 = "";
        $hubungan_pengikut2 = "";
        $hubungan_pengikut3 = "";
        $hubungan_pengikut4 = "";
        $hubungan_pengikut5 = "";
        $rs2 = mysqli_query($koneksi, "select * from pengikut_sppd where idsppd='$idsppd'");
        while ($hasil2 = mysqli_fetch_array($rs2)) {
            if ($no == 1) {
                $nama_pengikut1 = stripslashesx($hasil2['nama']);
                $hubungan_pengikut1 = stripslashesx($hasil2['hubungan']);
            } else if ($no == 2) {
                $nama_pengikut2 = stripslashesx($hasil2['nama']);
                $hubungan_pengikut2 = stripslashesx($hasil2['hubungan']);
            } else if ($no == 3) {
                $nama_pengikut3 = stripslashesx($hasil2['nama']);
                $hubungan_pengikut3 = stripslashesx($hasil2['hubungan']);
            } else if ($no == 4) {
                $nama_pengikut4 = stripslashesx($hasil2['nama']);
                $hubungan_pengikut4 = stripslashesx($hasil2['hubungan']);
            } else if ($no == 5) {
                $nama_pengikut5 = stripslashesx($hasil2['nama']);
                $hubungan_pengikut4 = stripslashesx($hasil2['hubungan']);
            }
            $no = $no + 1;
        }

        $kode_barcode = "PLN TARAKAN\nSPPD\n" . $tanggal . "\n" . $no_sppd . "\n" . $nip . "\n" . $nama;
        $namafile = $no_sppd . "-" . $nip . ".png";
        $namafile = str_replace('/', '_', $namafile);
        $level = QR_ECLEVEL_H;
        //$UkuranPixel=10;
        $UkuranPixel = 6;
        $UkuranFrame = 4;
        QRcode::png($kode_barcode, $tempdir . $namafile, $level, $UkuranPixel, $UkuranFrame);
        $QR = imagecreatefrompng($tempdir . $namafile);
        $logopath = __DIR__ . "/../../assets/plnndwarna.png";
        $logo = @imagecreatefromstring(file_get_contents($logopath));
        imagecolortransparent($logo, imagecolorallocatealpha($logo, 0, 0, 0, 127));
        imagealphablending($logo, false);
        imagesavealpha($logo, true);
        $QR_width = imagesx($QR);
        $QR_height = imagesy($QR);
        $logo_width = imagesx($logo);
        $logo_height = imagesy($logo);
        $logo_qr_width = $QR_width / 2;
        $scale = $logo_width / $logo_qr_width;
        $logo_qr_height = $logo_height / $scale;
        @imagecopyresampled($QR, $logo, $QR_width / 3.8, $QR_height / 2.3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
        imagepng($QR, $tempdir . $namafile);
        $ttd = $tempdir . $namafile;

        $kode_barcode = "PLN TARAKAN\nSPPD\n" . $tanggal . "\n" . $no_sppd . "\n APPROVAL SDM : \n" . $nip_sdm . "\n" . $nama_sdm;
        $namafile = $no_sppd . "-" . $nip_sdm . ".png";
        $namafile = str_replace('/', '_', $namafile);
        $level = QR_ECLEVEL_H;
        //$UkuranPixel=10;
        $UkuranPixel = 6;
        $UkuranFrame = 4;
        QRcode::png($kode_barcode, $tempdir . $namafile, $level, $UkuranPixel, $UkuranFrame);
        $QR = imagecreatefrompng($tempdir . $namafile);
        $logo = @imagecreatefromstring(file_get_contents($logopath));
        imagecolortransparent($logo, imagecolorallocatealpha($logo, 0, 0, 0, 127));
        imagealphablending($logo, false);
        imagesavealpha($logo, true);
        $QR_width = imagesx($QR);
        $QR_height = imagesy($QR);
        $logo_width = imagesx($logo);
        $logo_height = imagesy($logo);
        $logo_qr_width = $QR_width / 2;
        $scale = $logo_width / $logo_qr_width;
        $logo_qr_height = $logo_height / $scale;
        @imagecopyresampled($QR, $logo, $QR_width / 3.8, $QR_height / 2.3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
        imagepng($QR, $tempdir . $namafile);
        $ttd_sdm = $tempdir . $namafile;

        $kode_barcode = "PLN TARAKAN\nSPPD\n" . $tanggal . "\n" . $no_sppd . "\n APPROVAL KEUANGAN : \n" . $nip_keuangan . "\n" . $nama_keuangan;
        $namafile = $no_sppd . "-" . $nip_keuangan . ".png";
        $namafile = str_replace('/', '_', $namafile);
        $level = QR_ECLEVEL_H;
        //$UkuranPixel=10;
        $UkuranPixel = 6;
        $UkuranFrame = 4;
        QRcode::png($kode_barcode, $tempdir . $namafile, $level, $UkuranPixel, $UkuranFrame);
        $QR = imagecreatefrompng($tempdir . $namafile);
        $logo = @imagecreatefromstring(file_get_contents($logopath));
        imagecolortransparent($logo, imagecolorallocatealpha($logo, 0, 0, 0, 127));
        imagealphablending($logo, false);
        imagesavealpha($logo, true);
        $QR_width = imagesx($QR);
        $QR_height = imagesy($QR);
        $logo_width = imagesx($logo);
        $logo_height = imagesy($logo);
        $logo_qr_width = $QR_width / 2;
        $scale = $logo_width / $logo_qr_width;
        $logo_qr_height = $logo_height / $scale;
        @imagecopyresampled($QR, $logo, $QR_width / 3.8, $QR_height / 2.3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
        imagepng($QR, $tempdir . $namafile);
        $ttd_keuangan = $tempdir . $namafile;


        //Halaman 1
        $pdf->AddPage();

        $pdf->SetFont('Arial', '', 8);
        $pdf->Image($logopath, 10, 10, 35, 0);

        $pdf->SetFont('Arial', 'B', 10);
        $y = $pdf->GetY() + 10;
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(0, 5, "SURAT PERINTAH PERJALANAN DINAS DALAM NEGERI", '', 'C', 0);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(0, 5, "NOMOR : " . $no_sppd, '', 'C', 0);

        $pdf->SetLineWidth(0.4);
        $pdf->SetDrawColor(0, 0, 0);
        $dasar = $pdf->GetY() + 4;
        $pdf->SetFont('Arial', '', 9);

        $y = $dasar;
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(0, 175, "", 'LRTB', 'C', 0);

        $y = $dasar;
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 2, "", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(60, 2, "", 'R', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "1", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(60, 4, "Pejabat yang diberi wewenang :", 'R', 'L', 0);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 4, "a.", '', 'L', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(55, 4, "Nama", 'R', 'L', 0);
        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, 4, $nama_pejabat, '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 4, "b.", '', 'L', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(55, 4, "Jabatan", 'R', 'L', 0);
        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, 4, $jabatan_pejabat, '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 2, "", 'RB', 'C', 0);
        $pdf->SetXY(20, $y);
        $pdf->MultiCell(62, 2, "", 'RB', 'L', 0);
        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, 2, "", 'B', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 2, "", 'R', 'C', 0);
        $pdf->SetXY(20, $y);
        $pdf->MultiCell(62, 2, "", 'R', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "2", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(60, 4, "Pejabat yang diperintahkan :", 'R', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 4, "a.", '', 'L', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(55, 4, "Nama", 'R', 'L', 0);
        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, 4, $nama, '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 4, "b.", '', 'L', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(55, 4, "Nomor Induk", 'R', 'L', 0);
        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, 4, $nip, '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 4, "c.", '', 'L', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(55, 4, "Jabatan", 'R', 'L', 0);
        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, 4, $jabatan, '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 2, "", 'RB', 'C', 0);
        $pdf->SetXY(20, $y);
        $pdf->MultiCell(62, 2, "", 'RB', 'L', 0);
        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, 2, "", 'B', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 2, "", 'R', 'C', 0);
        $pdf->SetXY(20, $y);
        $pdf->MultiCell(62, 2, "", 'R', 'L', 0);

        $batas1 = $pdf->GetY();
        $y = $batas1;
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "3", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(60, 4, "Maksud Perjalanan Dinas :", 'R', 'L', 0);
        $x11 = $pdf->GetY();
        $tinggi11 = $x11 - $batas1;

        $maksud12 = explode(';', $maksud);
        $i = 1;
        foreach ($maksud12 as $baris1) {
            if ($i > 1) {
                $y = $pdf->GetY();
            }
            $pdf->SetXY(82, $y);
            $pdf->MultiCell(0, 4, "- " . trim($baris1), '', 'L', 0);
            $i = $i + 1;
        }
        $x12 = $pdf->GetY();
        $tinggi12 = $x12 - $batas1;

        $tinggi1 = max($tinggi11, $tinggi12);
        $selisih1 = $tinggi1 - $tinggi11;
        //$selisih12 = $tinggi1-$tinggi12;
        $pdf->SetXY(10, $x11);
        $pdf->MultiCell(10, $selisih1, "", 'R', 'C', 0);
        $pdf->SetXY(22, $x11);
        $pdf->MultiCell(60, $selisih1, "", 'R', 'C', 0);

        $selisih2 = 24 - $tinggi1;
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, $selisih2, "", 'RB', 'C', 0);
        $pdf->SetXY(20, $y);
        $pdf->MultiCell(62, $selisih2, "", 'RB', 'L', 0);
        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, $selisih2, "", 'B', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 2, "", 'R', 'C', 0);
        $pdf->SetXY(20, $y);
        $pdf->MultiCell(62, 2, "", 'R', 'L', 0);

        $batas2 = $pdf->GetY();
        $y = $batas2;
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "4", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(60, 4, "Alat angkutan yang digunakan :", 'R', 'L', 0);
        $x21 = $pdf->GetY();

        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, 4, $transportasi, '', 'L', 0);
        $x22 = $pdf->GetY();

        $tinggi2 = max($x21, $x22);
        $selisih21 = ($tinggi2 - $x21) * 1;
        $selisih22 = ($tinggi2 - $x22) * 1;

        $selisih31 = 8 - $selisih21;
        $selisih32 = 8 - $selisih22;
        if ($selisih21 > 0) {
            $selisih31 = 0;
        }
        if ($selisih32 <= 0) {
            $selisih32 = 0;
        }
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, $selisih31, "", 'RB', 'C', 0);
        $pdf->SetXY(20, $y);
        $pdf->MultiCell(62, $selisih31, "", 'RB', 'L', 0);
        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, $selisih32, "", 'B', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 2, "", 'R', 'C', 0);
        $pdf->SetXY(20, $y);
        $pdf->MultiCell(62, 2, "", 'R', 'L', 0);

        $batas2 = $pdf->GetY();
        $y = $batas2;
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "5", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(60, 4, "Tempat :", 'R', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 4, "a.", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(55, 4, "Tempat Berangkat (Kedudukan)", 'R', 'L', 0);
        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, 4, $kedudukan, 'R', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 4, "b.", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(55, 4, "Tempat Tujuan", 'R', 'L', 0);
        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, 4, $tujuan1, 'R', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 2, "", 'RB', 'C', 0);
        $pdf->SetXY(20, $y);
        $pdf->MultiCell(62, 2, "", 'RB', 'L', 0);
        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, 2, "", 'B', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 2, "", 'R', 'C', 0);
        $pdf->SetXY(20, $y);
        $pdf->MultiCell(62, 2, "", 'R', 'L', 0);

        $batas3 = $pdf->GetY();
        $y = $batas3;
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "6", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(60, 4, "Lama Perjalanan Dinas :", 'R', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 4, "a.", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(55, 4, "Jumlah Hari", 'R', 'L', 0);
        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, 4, $hari . " Hari", 'R', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 4, "b.", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(55, 4, "Tanggal Berangkat", 'R', 'L', 0);
        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, 4, $tgl_berangkat, 'R', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 4, "c.", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(55, 4, "Tanggal Kembali", 'R', 'L', 0);
        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, 4, $tgl_kembali, 'R', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 2, "", 'RB', 'C', 0);
        $pdf->SetXY(20, $y);
        $pdf->MultiCell(62, 2, "", 'RB', 'L', 0);
        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, 2, "", 'B', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 2, "", 'R', 'C', 0);
        $pdf->SetXY(20, $y);
        $pdf->MultiCell(62, 2, "", 'R', 'L', 0);

        $batas4 = $pdf->GetY();
        $y = $batas4;
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "7", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(60, 4, "Biaya :", 'R', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 4, "a.", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(55, 4, "Jumlah", 'R', 'L', 0);
        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, 4, "Rp.", 'R', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 4, "b.", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(55, 4, "Beban", 'R', 'L', 0);
        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, 4, "Pos : ", 'R', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 4, "c.", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(55, 4, "Penanggung", 'R', 'L', 0);
        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 2, "", 'RB', 'C', 0);
        $pdf->SetXY(20, $y);
        $pdf->MultiCell(62, 2, "", 'RB', 'L', 0);
        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, 2, "", 'B', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 2, "", 'R', 'C', 0);
        $pdf->SetXY(20, $y);
        $pdf->MultiCell(112, 2, "", 'R', 'L', 0);

        $batas4 = $pdf->GetY();
        $y = $batas4;
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "8", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(110, 4, "Pengikut / Pendamping :", 'R', 'L', 0);
        $pdf->SetXY(132, $y);
        $pdf->MultiCell(0, 4, "Hubungan Keluarga", '', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 5, "", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 5, "1", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(105, 5, $nama_pengikut1, 'R', 'L', 0);
        $pdf->SetXY(132, $y);
        $pdf->MultiCell(0, 5, ucwords(strtolower($hubungan_pengikut1)), 'R', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 5, "", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 5, "2", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(105, 5, $nama_pengikut2, 'R', 'L', 0);
        $pdf->SetXY(132, $y);
        $pdf->MultiCell(0, 5, ucwords(strtolower($hubungan_pengikut2)), 'R', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 5, "", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 5, "3", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(105, 5, $nama_pengikut3, 'R', 'L', 0);
        $pdf->SetXY(132, $y);
        $pdf->MultiCell(0, 5, ucwords(strtolower($hubungan_pengikut3)), 'R', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 5, "", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 5, "4", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(105, 5, $nama_pengikut4, 'R', 'L', 0);
        $pdf->SetXY(132, $y);
        $pdf->MultiCell(0, 5, ucwords(strtolower($hubungan_pengikut4)), 'R', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 5, "", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 5, "5", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(105, 5, $nama_pengikut5, 'R', 'L', 0);
        $pdf->SetXY(132, $y);
        $pdf->MultiCell(0, 5, ucwords(strtolower($hubungan_pengikut5)), 'R', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 2, "", 'RB', 'C', 0);
        $pdf->SetXY(20, $y);
        $pdf->MultiCell(112, 2, "", 'RB', 'L', 0);
        $pdf->SetXY(132, $y);
        $pdf->MultiCell(0, 2, "", 'B', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 2, "", 'R', 'C', 0);
        $pdf->SetXY(20, $y);
        $pdf->MultiCell(62, 2, "", 'R', 'L', 0);

        $batas6 = $pdf->GetY();
        $y = $batas6;
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 6, "9", 'R', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(60, 6, "Keterangan Lain-lain :", 'R', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 2, "", 'R', 'C', 0);
        $pdf->SetXY(20, $y);
        $pdf->MultiCell(62, 2, "", 'R', 'L', 0);
        $pdf->SetXY(82, $y);
        $pdf->MultiCell(0, 2, "", '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(120, $y);
        $pdf->MultiCell(0, 6, "", '', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(140, $y);
        $pdf->MultiCell(25, 4, "Dikeluarkan di", '', 'L', 0);
        $pdf->SetXY(165, $y);
        $pdf->MultiCell(0, 4, ": Balikpapan", '', 'L', 0);
        $y = $pdf->GetY();
        $pdf->SetXY(140, $y);
        $pdf->MultiCell(25, 4, "Pada tanggal", '', 'L', 0);
        $pdf->SetXY(165, $y);
        $pdf->MultiCell(0, 4, ": " . TanggalIndo($tanggal), '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(120, $y);
        $pdf->MultiCell(0, 4, "", '', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(120, $y);
        $pdf->MultiCell(0, 4, "a.n. DIREKSI", '', 'C', 0);
        $y = $pdf->GetY();
        $pdf->SetXY(120, $y);
        $pdf->MultiCell(0, 4, $jabatan_sdm, '', 'C', 0);
        $y = $pdf->GetY();
        $pdf->SetXY(120, $y);
        $pdf->MultiCell(0, 20, "", '', 'C', 0);
        if ($ttd_sdm != "") {
            $pdf->Image($ttd_sdm, 150, $y, 20, 0);
        }

        $y = $pdf->GetY();
        $pdf->SetXY(120, $y);
        $pdf->MultiCell(0, 4, $nama_sdm, '', 'C', 0);

        //Halaman 2
        $pdf->AddPage();

        $pdf->SetFont('Arial', '', 8);

        $pdf->SetFont('Arial', 'B', 10);
        $y = $pdf->GetY() + 10;
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(0, 5, "", '', 'C', 0);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(0, 5, "", '', 'C', 0);

        $dasar = $pdf->GetY() + 4;
        $pdf->SetFont('Arial', '', 9);

        $pdf->SetLineWidth(0.4);
        $pdf->SetDrawColor(0, 0, 0);
        $y = $dasar;
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(95, 195, "", 'LRTB', 'C', 0);
        $pdf->SetXY(105, $y);
        $pdf->MultiCell(95, 195, "", 'RTB', 'C', 0);
        $batas_akhir2 = $pdf->GetY();

        $y = $dasar;
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(95, 2, "", '', 'C', 0);
        $pdf->SetXY(105, $y);
        $pdf->MultiCell(95, 2, "", '', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(40, 4, "Berangkat dari", '', 'L', 0);
        $pdf->SetXY(147, $y);
        $pdf->MultiCell(3, 4, ":", '', 'C', 0);
        $pdf->SetXY(150, $y);
        $pdf->MultiCell(0, 4, $kedudukan, '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(0, 4, "(Tempat Kedudukan)", '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(40, 4, "Pada Tanggal", '', 'L', 0);
        $pdf->SetXY(147, $y);
        $pdf->MultiCell(3, 4, ":", '', 'C', 0);
        $pdf->SetXY(150, $y);
        $pdf->MultiCell(0, 4, TanggalIndo($tgl_awal), '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(40, 4, "Ke", '', 'L', 0);
        $pdf->SetXY(147, $y);
        $pdf->MultiCell(3, 4, ":", '', 'C', 0);
        $pdf->SetXY(150, $y);
        $pdf->MultiCell(0, 4, $tujuan1, '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(0, 5, "", '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(40, 4, "Cap dan Tandatangan", '', 'L', 0);
        $pdf->SetXY(147, $y);
        $pdf->MultiCell(3, 4, ":", '', 'C', 0);
        $pdf->SetXY(150, $y);
        $pdf->MultiCell(0, 4, "a.n.DIREKSI", '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(40, 4, "", '', 'L', 0);
        $pdf->SetXY(147, $y);
        $pdf->MultiCell(3, 4, "", '', 'C', 0);
        $pdf->SetXY(150, $y);
        $pdf->MultiCell(0, 4, $nama_sdm, '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetFont('Arial', '', 7);
        $pdf->SetXY(150, $y);
        $pdf->MultiCell(0, 4, $jabatan_sdm, 'B', 'L', 0);
        $x = $pdf->GetY();
        $tinggi = $x - $y;

        $pdf->SetFont('Arial', '', 9);
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(95, $tinggi, "", 'B', 'L', 0);
        $pdf->SetXY(105, $y);
        $pdf->MultiCell(2, $tinggi, "", 'B', 'L', 0);
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(40, $tinggi, "", 'B', 'L', 0);
        $pdf->SetXY(147, $y);
        $pdf->MultiCell(3, $tinggi, "", 'B', 'C', 0);
        $x = $y;

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(95, 2, "", '', 'C', 0);
        $pdf->SetXY(105, $y);
        $pdf->MultiCell(95, 2, "", '', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(12, $y);
        $pdf->MultiCell(40, 4, "Tiba di", '', 'L', 0);
        $pdf->SetXY(52, $y);
        $pdf->MultiCell(3, 4, ":", '', 'L', 0);
        $pdf->SetXY(55, $y);
        $pdf->MultiCell(50, 4, $kota_tiba1, '', 'L', 0);
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(40, 4, "Berangkat dari", '', 'L', 0);
        $pdf->SetXY(147, $y);
        $pdf->MultiCell(3, 4, ":", '', 'C', 0);
        $pdf->SetXY(150, $y);
        $pdf->MultiCell(0, 4, $kota_berangkat1, '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(12, $y);
        $pdf->MultiCell(40, 4, "", '', 'L', 0);
        $pdf->SetXY(52, $y);
        $pdf->MultiCell(3, 4, "", '', 'L', 0);
        $pdf->SetXY(55, $y);
        $pdf->MultiCell(50, 4, "", '', 'L', 0);
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(40, 4, "Ke", '', 'L', 0);
        $pdf->SetXY(147, $y);
        $pdf->MultiCell(3, 4, ":", '', 'C', 0);
        $pdf->SetXY(150, $y);
        $pdf->MultiCell(0, 4, $kota_tujuan1, '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(12, $y);
        $pdf->MultiCell(40, 4, "Pada Tanggal", '', 'L', 0);
        $pdf->SetXY(52, $y);
        $pdf->MultiCell(3, 4, "", '', 'L', 0);
        $pdf->SetXY(55, $y);
        $pdf->MultiCell(50, 4, $tgl_tiba1, '', 'L', 0);
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(40, 4, "Pada Tanggal", '', 'L', 0);
        $pdf->SetXY(147, $y);
        $pdf->MultiCell(3, 4, ":", '', 'C', 0);
        $pdf->SetXY(150, $y);
        $pdf->MultiCell(0, 4, $tgl_berangkat1, '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(0, 5, "", '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(12, $y);
        $pdf->MultiCell(40, 4, "Cap dan Tandatangan", '', 'L', 0);
        $pdf->SetXY(52, $y);
        $pdf->MultiCell(3, 4, "", '', 'L', 0);
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(40, 4, "Cap dan Tandatangan", '', 'L', 0);
        $pdf->SetXY(147, $y);
        $pdf->MultiCell(3, 4, ":", '', 'C', 0);
        $pdf->SetXY(150, $y);
        $pdf->MultiCell(0, 4, "", '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(95, 8, "", 'B', 'L', 0);
        $pdf->SetXY(105, $y);
        $pdf->MultiCell(0, 8, "", 'B', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(95, 2, "", '', 'C', 0);
        $pdf->SetXY(105, $y);
        $pdf->MultiCell(95, 2, "", '', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(12, $y);
        $pdf->MultiCell(40, 4, "Tiba di", '', 'L', 0);
        $pdf->SetXY(52, $y);
        $pdf->MultiCell(3, 4, ":", '', 'L', 0);
        $pdf->SetXY(55, $y);
        $pdf->MultiCell(50, 4, $kota_tiba2, '', 'L', 0);
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(40, 4, "Berangkat dari", '', 'L', 0);
        $pdf->SetXY(147, $y);
        $pdf->MultiCell(3, 4, ":", '', 'C', 0);
        $pdf->SetXY(150, $y);
        $pdf->MultiCell(0, 4, $kota_berangkat2, '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(12, $y);
        $pdf->MultiCell(40, 4, "", '', 'L', 0);
        $pdf->SetXY(52, $y);
        $pdf->MultiCell(3, 4, "", '', 'L', 0);
        $pdf->SetXY(55, $y);
        $pdf->MultiCell(50, 4, "", '', 'L', 0);
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(40, 4, "Ke", '', 'L', 0);
        $pdf->SetXY(147, $y);
        $pdf->MultiCell(3, 4, ":", '', 'C', 0);
        $pdf->SetXY(150, $y);
        $pdf->MultiCell(0, 4, $kota_tujuan2, '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(12, $y);
        $pdf->MultiCell(40, 4, "Pada Tanggal", '', 'L', 0);
        $pdf->SetXY(52, $y);
        $pdf->MultiCell(3, 4, "", '', 'L', 0);
        $pdf->SetXY(55, $y);
        $pdf->MultiCell(50, 4, $tgl_tiba2, '', 'L', 0);
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(40, 4, "Pada Tanggal", '', 'L', 0);
        $pdf->SetXY(147, $y);
        $pdf->MultiCell(3, 4, ":", '', 'C', 0);
        $pdf->SetXY(150, $y);
        $pdf->MultiCell(0, 4, $tgl_berangkat2, '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(0, 5, "", '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(12, $y);
        $pdf->MultiCell(40, 4, "Cap dan Tandatangan", '', 'L', 0);
        $pdf->SetXY(52, $y);
        $pdf->MultiCell(3, 4, "", '', 'L', 0);
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(40, 4, "Cap dan Tandatangan", '', 'L', 0);
        $pdf->SetXY(147, $y);
        $pdf->MultiCell(3, 4, ":", '', 'C', 0);
        $pdf->SetXY(150, $y);
        $pdf->MultiCell(0, 4, "", '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(95, 8, "", 'B', 'L', 0);
        $pdf->SetXY(105, $y);
        $pdf->MultiCell(0, 8, "", 'B', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(95, 2, "", '', 'C', 0);
        $pdf->SetXY(105, $y);
        $pdf->MultiCell(95, 2, "", '', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(12, $y);
        $pdf->MultiCell(40, 4, "Tiba di", '', 'L', 0);
        $pdf->SetXY(52, $y);
        $pdf->MultiCell(3, 4, ":", '', 'L', 0);
        $pdf->SetXY(55, $y);
        $pdf->MultiCell(50, 4, $kota_tiba3, '', 'L', 0);
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(40, 4, "Berangkat dari", '', 'L', 0);
        $pdf->SetXY(147, $y);
        $pdf->MultiCell(3, 4, ":", '', 'C', 0);
        $pdf->SetXY(150, $y);
        $pdf->MultiCell(0, 4, $kota_berangkat3, '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(12, $y);
        $pdf->MultiCell(40, 4, "", '', 'L', 0);
        $pdf->SetXY(52, $y);
        $pdf->MultiCell(3, 4, "", '', 'L', 0);
        $pdf->SetXY(55, $y);
        $pdf->MultiCell(50, 4, "", '', 'L', 0);
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(40, 4, "Ke", '', 'L', 0);
        $pdf->SetXY(147, $y);
        $pdf->MultiCell(3, 4, ":", '', 'C', 0);
        $pdf->SetXY(150, $y);
        $pdf->MultiCell(0, 4, $kota_tujuan3, '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(12, $y);
        $pdf->MultiCell(40, 4, "Pada Tanggal", '', 'L', 0);
        $pdf->SetXY(52, $y);
        $pdf->MultiCell(3, 4, "", '', 'L', 0);
        $pdf->SetXY(55, $y);
        $pdf->MultiCell(50, 4, $tgl_tiba3, '', 'L', 0);
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(40, 4, "Pada Tanggal", '', 'L', 0);
        $pdf->SetXY(147, $y);
        $pdf->MultiCell(3, 4, ":", '', 'C', 0);
        $pdf->SetXY(150, $y);
        $pdf->MultiCell(0, 4, $tgl_berangkat3, '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(0, 8, "", '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(12, $y);
        $pdf->MultiCell(40, 4, "Cap dan Tandatangan", '', 'L', 0);
        $pdf->SetXY(52, $y);
        $pdf->MultiCell(3, 4, "", '', 'L', 0);
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(40, 4, "Cap dan Tandatangan", '', 'L', 0);
        $pdf->SetXY(147, $y);
        $pdf->MultiCell(3, 4, ":", '', 'C', 0);
        $pdf->SetXY(150, $y);
        $pdf->MultiCell(0, 4, "", '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(95, 8, "", 'B', 'L', 0);
        $pdf->SetXY(105, $y);
        $pdf->MultiCell(0, 8, "", 'B', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(95, 2, "", '', 'C', 0);
        $pdf->SetXY(105, $y);
        $pdf->MultiCell(95, 2, "", '', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(12, $y);
        if ($jenis_sppd != "3") {
            $pdf->MultiCell(95, 4, "Tiba Kembali di " . $kedudukan . " Pada Tanggal " . $tgl_kembali, '', 'L', 0);
        } else {
            $pdf->MultiCell(95, 4, "Tiba Kembali di                   Pada Tanggal ", '', 'L', 0);
        }
        $pdf->SetXY(107, $y);
        $pdf->MultiCell(40, 4, "Keterangan Lain-lain :", '', 'L', 0);
        $pdf->SetXY(147, $y);
        $pdf->MultiCell(3, 4, ":", '', 'C', 0);
        $pdf->SetXY(150, $y);
        $pdf->MultiCell(0, 4, "", '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(0, 4, "", '', 'C', 0);

        $pdf->SetFont('Arial', 'I', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(12, $y);
        $pdf->MultiCell(95, 4, "Telah diperika dengan keterangan bahwa perjalanan dilakukan sesuai dengan prosedur yang berlaku.", '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(0, 2, "", '', 'C', 0);

        $pdf->SetFont('Arial', '', 9);
        $y = $pdf->GetY();
        $pdf->SetXY(42, $y);
        $pdf->MultiCell(55, 4, "a.n. DIREKSI", '', 'C', 0);
        $y = $pdf->GetY();
        $pdf->SetXY(42, $y);
        $pdf->MultiCell(55, 4, $jabatan_sdm, '', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(0, 20, "", '', 'C', 0);
        if ($ttd_sdm != "") {
            $pdf->Image($ttd_sdm, 60, $y, 20, 0);
        }

        $y = $pdf->GetY();
        $pdf->SetXY(42, $y);
        $pdf->MultiCell(55, 4, $nama_sdm, '', 'C', 0);

        //$y= $pdf->GetY();
        $y = $batas_akhir2;
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(0, 6, "", '', 'C', 0);

        $pdf->SetFont('Arial', '', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(12, $y);
        $pdf->MultiCell(0, 4, "Catatan :", '', 'L', 0);
        $y = $pdf->GetY();
        $pdf->SetXY(12, $y);
        $pdf->MultiCell(5, 4, "1.", '', 'C', 0);
        $pdf->SetXY(17, $y);
        $pdf->MultiCell(0, 4, "Perjalanan Dinas yang dilakukan menyimpang dari ketentuan dan perintah yang berwenang menjadi tanggungan Pegawai yang bersangkutan.", '', 'L', 0);
        $y = $pdf->GetY();
        $pdf->SetXY(12, $y);
        $pdf->MultiCell(5, 4, "2.", '', 'C', 0);
        $pdf->SetXY(17, $y);
        $pdf->MultiCell(0, 4, "SPPD harus di serahkan kembali paling lambat 14 (empat belas) hari kerja setelah tanggal kedatangan di tempat kedudukan.", '', 'L', 0);

        //Halaman 3
        $pdf->AddPage();

        $pdf->SetFont('Arial', '', 8);
        $pdf->Image($logopath, 10, 10, 35, 0);

        $pdf->SetFont('Arial', 'B', 10);
        $y = $pdf->GetY() + 10;
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(0, 5, "BIAYA PERJALANAN DINAS DALAM NEGERI", '', 'C', 0);

        $pdf->SetLineWidth(0.4);
        $pdf->SetDrawColor(0, 0, 0);
        $dasar10 = $pdf->GetY() + 4;
        $pdf->SetFont('Arial', '', 9);

        $y = $dasar10;
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(40, 4, "SPPD Nomor", '', 'L', 0);
        $pdf->SetXY(62, $y);
        $pdf->MultiCell(3, 4, ":", '', 'L', 0);
        $pdf->SetXY(65, $y);
        $pdf->MultiCell(0, 4, $no_sppd, '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(40, 4, "Tanggal", '', 'L', 0);
        $pdf->SetXY(62, $y);
        $pdf->MultiCell(3, 4, ":", '', 'L', 0);
        $pdf->SetXY(65, $y);
        $pdf->MultiCell(0, 4, TanggalIndo($tanggal), '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(40, 4, "Tempat Tujuan", '', 'L', 0);
        $pdf->SetXY(62, $y);
        $pdf->MultiCell(3, 4, ":", '', 'L', 0);
        $pdf->SetXY(65, $y);
        $pdf->MultiCell(0, 4, $tujuan, '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(40, 4, "Lama Perjalanan Dinas", '', 'L', 0);
        $pdf->SetXY(62, $y);
        $pdf->MultiCell(3, 4, ":", '', 'L', 0);
        $pdf->SetXY(65, $y);
        $pdf->MultiCell(0, 4, $hari . " hari", '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(40, 4, "Nama", '', 'L', 0);
        $pdf->SetXY(62, $y);
        $pdf->MultiCell(3, 4, ":", '', 'L', 0);
        $pdf->SetXY(65, $y);
        $pdf->MultiCell(0, 4, $nama, '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(40, 4, "Jabatan", '', 'L', 0);
        $pdf->SetXY(62, $y);
        $pdf->MultiCell(3, 4, ":", '', 'L', 0);
        $pdf->SetXY(65, $y);
        $pdf->MultiCell(0, 4, $jabatan, '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(40, 4, "", '', 'L', 0);

        $pdf->SetFont('Arial', 'B', 7);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 6, "No", 'LRTB', 'C', 1);
        $pdf->SetXY(20, $y);
        $pdf->MultiCell(110, 6, "RINCIAN BIAYA PERJALANAN DINAS", 'RTB', 'C', 1);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(30, 6, "JUMLAH", 'RTB', 'C', 1);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 6, "KETERANGAN", 'RTB', 'C', 1);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 5, "I", 'LR', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(108, 5, "DALAM NEGERI", 'R', 'L', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(30, 5, "", 'R', 'C', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 5, "", 'R', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 5, "", 'LR', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 5, "1.", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(103, 5, "Transportasi", 'R', 'L', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(30, 5, "", 'R', 'C', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 5, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', '', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(103, 4, "- Bus/kereta api/taksi/kapal/pesawat pp", 'R', 'L', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format($total_transport, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(103, 4, "- Dari rumah ke bandara/stasiun/pelabuhan pp", 'R', 'L', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format($transportasi_lokal, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(103, 4, "- Airport Tax", 'R', 'L', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format(0, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', 'B', 7);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 5, "", 'LR', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 5, "2.", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(103, 5, "Akomodasi PD Umum / Detasering Bulan Pertama", 'R', 'L', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(30, 5, "", 'R', 'C', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 5, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', '', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(45, 4, "- Konsumsi", '', 'L', 0);
        $pdf->SetXY(72, $y);
        $pdf->MultiCell(5, 4, "=", '', 'C', 0);
        $pdf->SetXY(77, $y);
        $pdf->MultiCell(7, 4, $hari_konsumsi1, '', 'R', 0);
        $pdf->SetXY(84, $y);
        $pdf->MultiCell(30, 4, "hari x " . $persen_konsumsi1 . " % x Rp.", '', 'L', 0);
        $pdf->SetXY(114, $y);
        $pdf->MultiCell(16, 4, number_format($nilai_konsumsi1, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format($total_konsumsi1, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', '', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(45, 4, "- Cuci Pakaian", '', 'L', 0);
        $pdf->SetXY(72, $y);
        $pdf->MultiCell(5, 4, "=", '', 'C', 0);
        $pdf->SetXY(77, $y);
        $pdf->MultiCell(7, 4, $hari_laundry1, '', 'R', 0);
        $pdf->SetXY(84, $y);
        $pdf->MultiCell(30, 4, "hari x " . $persen_laundry1 . " % x Rp.", '', 'L', 0);
        $pdf->SetXY(114, $y);
        $pdf->MultiCell(16, 4, number_format($nilai_laundry1, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format($total_laundry1, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', '', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(45, 4, "- Penginapan", '', 'L', 0);
        $pdf->SetXY(72, $y);
        $pdf->MultiCell(5, 4, "=", '', 'C', 0);
        $pdf->SetXY(77, $y);
        $pdf->MultiCell(7, 4, $hari_penginapan1, '', 'R', 0);
        $pdf->SetXY(84, $y);
        $pdf->MultiCell(30, 4, "hari x " . $persen_penginapan1 . " % x Rp.", '', 'L', 0);
        $pdf->SetXY(114, $y);
        $pdf->MultiCell(16, 4, number_format($nilai_penginapan1, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format($total_penginapan1, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', 'B', 7);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 5, "", 'LR', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 5, "3.", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(103, 5, "Akomodasi Detasering Bulan Berikutnya", 'R', 'L', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(30, 5, "", 'R', 'C', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 5, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', '', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(45, 4, "- Konsumsi", '', 'L', 0);
        $pdf->SetXY(72, $y);
        $pdf->MultiCell(5, 4, "=", '', 'C', 0);
        $pdf->SetXY(77, $y);
        $pdf->MultiCell(7, 4, $hari_konsumsi2, '', 'R', 0);
        $pdf->SetXY(84, $y);
        $pdf->MultiCell(30, 4, "hari x " . $persen_konsumsi2 . " % x Rp.", '', 'L', 0);
        $pdf->SetXY(114, $y);
        $pdf->MultiCell(16, 4, number_format($nilai_konsumsi2, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format($total_konsumsi2, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', '', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(45, 4, "- Cuci Pakaian", '', 'L', 0);
        $pdf->SetXY(72, $y);
        $pdf->MultiCell(5, 4, "=", '', 'C', 0);
        $pdf->SetXY(77, $y);
        $pdf->MultiCell(7, 4, $hari_laundry2, '', 'R', 0);
        $pdf->SetXY(84, $y);
        $pdf->MultiCell(30, 4, "hari x " . $persen_laundry2 . " % x Rp.", '', 'L', 0);
        $pdf->SetXY(114, $y);
        $pdf->MultiCell(16, 4, number_format($nilai_laundry2, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format($total_laundry2, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', '', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(45, 4, "- Penginapan", '', 'L', 0);
        $pdf->SetXY(72, $y);
        $pdf->MultiCell(5, 4, "=", '', 'C', 0);
        $pdf->SetXY(77, $y);
        $pdf->MultiCell(7, 4, $hari_penginapan2, '', 'R', 0);
        $pdf->SetXY(84, $y);
        $pdf->MultiCell(30, 4, "hari x " . $persen_penginapan2 . " % x Rp.", '', 'L', 0);
        $pdf->SetXY(114, $y);
        $pdf->MultiCell(16, 4, number_format($nilai_penginapan2, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format($total_penginapan2, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', 'B', 7);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 5, "", 'LR', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 5, "4.", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(103, 5, "Akomodasi PD Perawatan Kesehatan / Perpanjangan", 'R', 'L', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(30, 5, "", 'R', 'C', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 5, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', '', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(45, 4, "- Pegawai", '', 'L', 0);
        $pdf->SetXY(72, $y);
        $pdf->MultiCell(5, 4, "=", '', 'C', 0);
        $pdf->SetXY(77, $y);
        $pdf->MultiCell(7, 4, $hari_pegawai, '', 'R', 0);
        $pdf->SetXY(84, $y);
        $pdf->MultiCell(30, 4, "hari x " . $persen_pegawai . " % x Rp.", '', 'L', 0);
        $pdf->SetXY(114, $y);
        $pdf->MultiCell(16, 4, number_format($nilai_pegawai, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format($total_pegawai, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', '', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(45, 4, "- Keluarga (penderita)", '', 'L', 0);
        $pdf->SetXY(72, $y);
        $pdf->MultiCell(5, 4, "=", '', 'C', 0);
        $pdf->SetXY(77, $y);
        $pdf->MultiCell(7, 4, $hari_keluarga, '', 'R', 0);
        $pdf->SetXY(84, $y);
        $pdf->MultiCell(30, 4, "hari x " . $persen_keluarga . " % x " . $keluarga . " x Rp.", '', 'L', 0);
        $pdf->SetXY(114, $y);
        $pdf->MultiCell(16, 4, number_format($nilai_keluarga, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format($total_keluarga, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', '', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(45, 4, "- Pengantar (kel) prjln Dn", '', 'L', 0);
        $pdf->SetXY(72, $y);
        $pdf->MultiCell(5, 4, "=", '', 'C', 0);
        $pdf->SetXY(77, $y);
        $pdf->MultiCell(7, 4, $hari_pengantar, '', 'R', 0);
        $pdf->SetXY(84, $y);
        $pdf->MultiCell(30, 4, "hari x " . $persen_pengantar . " % x " . $pengantar . " x Rp.", '', 'L', 0);
        $pdf->SetXY(114, $y);
        $pdf->MultiCell(16, 4, number_format($nilai_pengantar, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format($total_pengantar, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', 'B', 7);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 5, "", 'LR', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 5, "5.", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(103, 5, "Bantuan Pindah (max 14 hari)", 'R', 'L', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(30, 5, "", 'R', 'C', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 5, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', '', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(45, 4, "- Istri/suami pegawai", '', 'L', 0);
        $pdf->SetXY(72, $y);
        $pdf->MultiCell(5, 4, "=", '', 'C', 0);
        $pdf->SetXY(77, $y);
        $pdf->MultiCell(7, 4, $hari_suamiistri, '', 'R', 0);
        $pdf->SetXY(84, $y);
        $pdf->MultiCell(30, 4, "hari x " . $persen_suamiistri . " % x Rp.", '', 'L', 0);
        $pdf->SetXY(114, $y);
        $pdf->MultiCell(16, 4, number_format($nilai_suamiistri, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format($total_suamiistri, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', '', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(45, 4, "- Anak Pegawai", '', 'L', 0);
        $pdf->SetXY(72, $y);
        $pdf->MultiCell(5, 4, "=", '', 'C', 0);
        $pdf->SetXY(77, $y);
        $pdf->MultiCell(7, 4, $hari_anak, '', 'R', 0);
        $pdf->SetXY(84, $y);
        $pdf->MultiCell(30, 4, "hari x " . $persen_anak . " % x " . $anak . " x Rp.", '', 'L', 0);
        $pdf->SetXY(114, $y);
        $pdf->MultiCell(16, 4, number_format($nilai_anak, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format($total_anak, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', 'B', 7);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 5, "", 'LR', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 5, "6.", '', 'C', 0);
        $pdf->SetXY(27, $y);
        //$pdf->MultiCell(45,5,"Bantuan Pengepakan",'','L',0);        
        $pdf->MultiCell(103, 5, "Bantuan Pengepakan", 'R', 'L', 0);
        $pdf->SetFont('Arial', '', 8);

        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", 'B', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format($total_pengepakan, 0, ',', '.'), 'RB', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', 'B', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 6, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(103, 6, "JUMLAH ( I )", 'R', 'L', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 6, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 6, number_format($total1, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 6, "", 'R', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 5, "II", 'LR', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(108, 5, "LUAR NEGERI", 'R', 'L', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(30, 5, "", 'R', 'C', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 5, "", 'R', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 5, "", 'LR', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 5, "1.", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(103, 5, "Fasilitas Transportasi", 'R', 'L', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(30, 5, "", 'R', 'C', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 5, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', '', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(93, 4, "- Pesawat pp", '', 'L', 0);
        $pdf->SetXY(120, $y);
        $pdf->MultiCell(10, 4, "USD", 'R', 'R', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format(0, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(103, 4, "- Dari rumah ke bandara/stasiun/pelabuhan pp", 'R', 'L', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format(0, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(103, 4, "- Airport Tax", 'R', 'L', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format(0, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', 'B', 7);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 5, "", 'LR', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 5, "2.", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(103, 5, "Fasilitas Harian &/ Penginapan PD Biasa / Diklat", 'R', 'L', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(30, 5, "", 'R', 'C', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 5, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', '', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(45, 4, "- Lumpsum 100 %", '', 'L', 0);
        $pdf->SetXY(72, $y);
        $pdf->MultiCell(5, 4, "=", '', 'C', 0);
        $pdf->SetXY(77, $y);
        $pdf->MultiCell(7, 4, "", '', 'R', 0);
        $pdf->SetXY(84, $y);
        $pdf->MultiCell(30, 4, "hari x .... US$ = Rp.", '', 'L', 0);
        $pdf->SetXY(114, $y);
        //$pdf->MultiCell(16,4,number_format(0,0,',','.'),'R','R',0);
        $pdf->MultiCell(16, 4, "USD", 'R', 'R', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format(0, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', '', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(57, 4, "  ( Kurs US$ = Rp.   ..................... )", '', 'L', 0);
        $pdf->SetXY(84, $y);
        $pdf->MultiCell(30, 4, "", '', 'L', 0);
        $pdf->SetXY(114, $y);
        $pdf->MultiCell(16, 4, "", 'R', 'R', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, "", 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', 'B', 7);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 5, "", 'LR', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 5, "3.", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(103, 5, "Fasilitas Harian &/ Penginapan PD Perawatan Kesehatan / Perpanjangan", 'R', 'L', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(30, 5, "", 'R', 'C', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 5, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', '', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(45, 4, "- Pegawai", '', 'L', 0);
        $pdf->SetXY(72, $y);
        $pdf->MultiCell(5, 4, "=", '', 'C', 0);
        $pdf->SetXY(77, $y);
        $pdf->MultiCell(7, 4, "-", '', 'R', 0);
        $pdf->SetXY(84, $y);
        $pdf->MultiCell(30, 4, "hari x 100 % x Rp.", '', 'L', 0);
        $pdf->SetXY(114, $y);
        $pdf->MultiCell(16, 4, number_format(0, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format(0, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', '', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(45, 4, "- Keluarga (penderita)", '', 'L', 0);
        $pdf->SetXY(72, $y);
        $pdf->MultiCell(5, 4, "=", '', 'C', 0);
        $pdf->SetXY(77, $y);
        $pdf->MultiCell(7, 4, "-", '', 'R', 0);
        $pdf->SetXY(84, $y);
        $pdf->MultiCell(30, 4, "hari x 100 % x Rp.", '', 'L', 0);
        $pdf->SetXY(114, $y);
        $pdf->MultiCell(16, 4, number_format(0, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format(0, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', '', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(45, 4, "- Pengantar (kel) prjln Dn", '', 'L', 0);
        $pdf->SetXY(72, $y);
        $pdf->MultiCell(5, 4, "=", '', 'C', 0);
        $pdf->SetXY(77, $y);
        $pdf->MultiCell(7, 4, "-", '', 'R', 0);
        $pdf->SetXY(84, $y);
        $pdf->MultiCell(30, 4, "hari x 100 % x Rp.", '', 'L', 0);
        $pdf->SetXY(114, $y);
        $pdf->MultiCell(16, 4, number_format(0, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format(0, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', 'B', 7);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 5, "", 'LR', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(5, 5, "3.", '', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(93, 5, "Fasilitas Baju Hangat", '', 'L', 0);
        $pdf->SetFont('Arial', '', 8);
        $pdf->SetXY(120, $y);
        $pdf->MultiCell(10, 4, "USD", 'R', 'R', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 4, "Rp.", 'B', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 4, number_format(0, 0, ',', '.'), 'RB', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 4, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', 'B', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 6, "", 'LR', 'C', 0);
        $pdf->SetXY(27, $y);
        $pdf->MultiCell(103, 6, "JUMLAH ( II )", 'R', 'L', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 6, "Rp.", '', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 6, number_format(0, 0, ',', '.'), 'R', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 6, "", 'R', 'C', 0);

        $pdf->SetFont('Arial', 'B', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 6, "III", 'LRB', 'C', 0);
        $pdf->SetXY(20, $y);
        $pdf->MultiCell(2, 6, "", 'B', 'C', 0);
        $pdf->SetXY(22, $y);
        $pdf->MultiCell(108, 6, "TOTAL ( I + II )", 'RB', 'L', 0);
        $pdf->SetXY(130, $y);
        $pdf->MultiCell(7, 6, "Rp.", 'B', 'L', 0);
        $pdf->SetXY(137, $y);
        $pdf->MultiCell(23, 6, number_format($total, 0, ',', '.'), 'RB', 'R', 0);
        $pdf->SetXY(160, $y);
        $pdf->MultiCell(0, 6, "", 'RB', 'C', 0);

        $pdf->SetFont('Arial', '', 7);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 4, "", '', 'C', 0);

        $pdf->SetFont('Arial', '', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(100, 4, "Telah dibayar oleh unit pengirim", '', 'L', 0);
        $pdf->SetXY(110, $y);
        $pdf->MultiCell(0, 4, "Telah menerima dari unit pengirim", '', 'L', 0);

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(100, 4, "Sejumlah Rp. " . number_format($total, 0, ',', '.'), '', 'L', 0);
        $pdf->SetXY(110, $y);
        $pdf->MultiCell(0, 4, "Sejumlah Rp. " . number_format($total, 0, ',', '.'), '', 'L', 0);

        $pdf->SetFont('Arial', 'I', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(100, 4, "## " . terbilang($total) . " Rupiah ##", '', 'L', 0);
        $pdf->SetXY(110, $y);
        $pdf->MultiCell(0, 4, "## " . terbilang($total) . " Rupiah ##", '', 'L', 0);

        $pdf->SetFont('Arial', 'B', 8);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(10, 18, "", '', 'C', 0);
        $pdf->SetXY(110, $y);
        $pdf->MultiCell(0, 18, "", '', 'C', 0);
        if ($ttd_keuangan != "") {
            $pdf->Image($ttd_keuangan, 30, $y, 18, 0);
        }
        if ($ttd != "") {
            $pdf->Image($ttd, 130, $y, 18, 0);
        }

        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(60, 4, $nama_keuangan, '', 'C', 0);
        $pdf->SetXY(110, $y);
        $pdf->MultiCell(60, 4, strtoupper($nama), '', 'C', 0);

        $pdf->SetFont('Arial', '', 7);
        $y = $pdf->GetY();
        $pdf->SetXY(10, $y);
        $pdf->MultiCell(60, 4, $jabatan_keuangan, '', 'C', 0);
    }
    // header('Content-Type: application/pdf');
    // header('Content-Disposition: inline; filename="file.pdf"');
    $pdf->Output();
    // ob_end_clean(); // bersihkan buffer sebelum mengirim PDF ke browser
    
}
?>