<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
if ($userhris){
    $id = intval($_REQUEST['id']);
    $nip = $_REQUEST['nipmappingpajak'];
    $kode_departemen = $_REQUEST['kode_departemenmappingpajak'];
    $kode_project = $_REQUEST['kode_projectmappingpajak'];
    $honorarium = $_REQUEST['honorariummappingpajak'];
    $honorer = $_REQUEST['honorermappingpajak'];
    $tarif_grade = $_REQUEST['tarif_grademappingpajak'];
    $tunjangan_posisi = $_REQUEST['tunjangan_posisimappingpajak'];
    $p21b = $_REQUEST['p21bmappingpajak'];
    $p22b = $_REQUEST['p22bmappingpajak'];
    $tunjangan_kemahalan = $_REQUEST['tunjangan_kemahalanmappingpajak'];
    $tunjangan_perumahan = $_REQUEST['tunjangan_perumahanmappingpajak'];
    $tunjangan_transportasi = $_REQUEST['tunjangan_transportasimappingpajak'];
    $bantuan_pulsa = $_REQUEST['bantuan_pulsamappingpajak'];
    $tunjangan_kompetensi = $_REQUEST['tunjangan_kompetensimappingpajak'];
    $dplk_persero = $_REQUEST['dplk_perseromappingpajak'];
    $dplk_simponi_pr = $_REQUEST['dplk_simponi_prmappingpajak'];
    $bpjs_tk_pp = $_REQUEST['bpjs_tk_ppmappingpajak'];
    $bpjs_tk_kp = $_REQUEST['bpjs_tk_kpmappingpajak'];
    $bpjs_tk_kkp = $_REQUEST['bpjs_tk_kkpmappingpajak'];
    $bpjs_tk_htp = $_REQUEST['bpjs_tk_htpmappingpajak'];
    $bpjs_kes_pp = $_REQUEST['bpjs_kes_ppmappingpajak'];
    $cop = $_REQUEST['copmappingpajak'];
    $fasilitas_hp = $_REQUEST['fasilitas_hpmappingpajak'];
    $reimburse_kesehatan = $_REQUEST['reimburse_kesehatanmappingpajak'];
    $asuransi_kesehatan = $_REQUEST['asuransi_kesehatanmappingpajak'];
    $sarana_kerja = $_REQUEST['sarana_kerjamappingpajak'];
    $sppd_manual = $_REQUEST['sppd_manualmappingpajak'];
    $asuransi_purna_jabatan = $_REQUEST['asuransi_purna_jabatanmappingpajak'];
    $medical_checkup = $_REQUEST['medical_checkupmappingpajak'];
    $beban_pph21 = $_REQUEST['beban_pph21mappingpajak'];
    $thr = $_REQUEST['thrmappingpajak'];
    $cuti = $_REQUEST['cutimappingpajak'];
    $cuti_besar = $_REQUEST['cuti_besarmappingpajak'];
    $winduan = $_REQUEST['winduanmappingpajak'];
    $iks = $_REQUEST['iksmappingpajak'];
    $ikp = $_REQUEST['ikpmappingpajak'];
    $sppd_pusat = $_REQUEST['sppd_pusatmappingpajak'];
    $sppd_region = $_REQUEST['sppd_regionmappingpajak'];
    $sppd_mutasi = $_REQUEST['sppd_mutasimappingpajak'];

    if($id==0){
        $sql = "insert into mapping_pajak(nip,kode_departemen,kode_project,honorarium,honorer,tarif_grade,tunjangan_posisi,p21b,p22b,tunjangan_kemahalan,tunjangan_perumahan,tunjangan_transportasi,bantuan_pulsa,tunjangan_kompetensi";
        $sql .= ",dplk_persero,dplk_simponi_pr,bpjs_tk_pp,bpjs_tk_kp,bpjs_tk_kkp,bpjs_tk_htp,bpjs_kes_pp,cop,fasilitas_hp,reimburse_kesehatan,asuransi_kesehatan,sarana_kerja,sppd_manual,asuransi_purna_jabatan,medical_checkup";
        $sql .= ",beban_pph21,thr,cuti,cuti_besar,winduan,iks,ikp,sppd_pusat,sppd_region,sppd_mutasi)";
        $sql .= " values('$nip','$kode_departemen','$kode_project','$honorarium','$honorer','$tarif_grade','$tunjangan_posisi','$p21b','$p22b','$tunjangan_kemahalan','$tunjangan_perumahan','$tunjangan_transportasi','$bantuan_pulsa','$tunjangan_kompetensi'";
        $sql .= ",'$dplk_persero','$dplk_simponi_pr','$bpjs_tk_pp','$bpjs_tk_kp','$bpjs_tk_kkp','$bpjs_tk_htp','$bpjs_kes_pp','$cop','$fasilitas_hp','$reimburse_kesehatan','$asuransi_kesehatan','$sarana_kerja','$sppd_manual','$asuransi_purna_jabatan','$medical_checkup'";
        $sql .= ",'$beban_pph21','$thr','$cuti','$cuti_besar','$winduan','$iks','$ikp','$sppd_pusat','$sppd_region','$sppd_mutasi')";
    } else {
        $sql = "update mapping_pajak set kode_departemen='$kode_departemen',kode_project='$kode_project',honorarium='$honorarium',honorer='$honorer',tarif_grade='$tarif_grade',tunjangan_posisi='$tunjangan_posisi',p21b='$p21b',p22b='$p22b',tunjangan_kemahalan='$tunjangan_kemahalan',tunjangan_perumahan='$tunjangan_perumahan',tunjangan_transportasi='$tunjangan_transportasi',bantuan_pulsa='$bantuan_pulsa',tunjangan_kompetensi='$tunjangan_kompetensi'";
        $sql .= ",dplk_persero='$dplk_persero',dplk_simponi_pr='$dplk_simponi_pr',bpjs_tk_pp='$bpjs_tk_pp',bpjs_tk_kp='$bpjs_tk_kp',bpjs_tk_kkp='$bpjs_tk_kkp',bpjs_tk_htp='$bpjs_tk_htp',bpjs_kes_pp='$bpjs_kes_pp',cop='$cop',fasilitas_hp='$fasilitas_hp',reimburse_kesehatan='$reimburse_kesehatan',asuransi_kesehatan='$asuransi_kesehatan',sarana_kerja='$sarana_kerja',sppd_manual='$sppd_manual',asuransi_purna_jabatan='$asuransi_purna_jabatan',medical_checkup='$medical_checkup'";
        $sql .= ",beban_pph21='$beban_pph21',thr='$thr',cuti='$cuti',cuti_besar='$cuti_besar',winduan='$winduan',iks='$iks',ikp='$ikp',sppd_pusat='$sppd_pusat',sppd_region='$sppd_region',sppd_mutasi='$sppd_mutasi' where id='$id'";
    }
    $result = @mysqli_query($koneksi,$sql);
    if ($result){
    	echo json_encode(array(
    		'id' => $id
    	));
    } else {
    	echo json_encode(array('errorMsg'=>mysqli_error($koneksi)));
    }
}    
?>