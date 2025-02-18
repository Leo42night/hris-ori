<?php
//error_reporting(0);
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    
    $id = intval($_REQUEST['id']);
    $gaji_dasar = $_REQUEST['gaji_dasarmgaji'];
    $honorarium = $_REQUEST['honorariummgaji'];
    $honorer = $_REQUEST['honorermgaji'];
    $tarif_grade = $_REQUEST['tarif_grademgaji'];
    $tunjangan_posisi = $_REQUEST['tunjangan_posisimgaji'];
    $p21b = $_REQUEST['p21bmgaji'];
    $tunjangan_kemahalan = $_REQUEST['tunjangan_kemahalanmgaji'];
    $tunjangan_perumahan = $_REQUEST['tunjangan_perumahanmgaji'];
    $tunjangan_transportasi = $_REQUEST['tunjangan_transportasimgaji'];
    $bantuan_pulsa = $_REQUEST['bantuan_pulsamgaji'];
    $tunjangan_kompetensi = $_REQUEST['tunjangan_kompetensimgaji'];
    $dplk_persero = $_REQUEST['dplk_perseromgaji'];
    $dplk_simponi_pr = $_REQUEST['dplk_simponi_prmgaji'];
    // $nama_tunjangan1 = $_REQUEST['nama_tunjangan1mgaji'];
    // $tunjangan1 = $_REQUEST['tunjangan1mgaji'];
    // $nama_tunjangan2 = $_REQUEST['nama_tunjangan2mgaji'];
    // $tunjangan2 = $_REQUEST['tunjangan2mgaji'];
    // $nama_tunjangan3 = $_REQUEST['nama_tunjangan3mgaji'];
    // $tunjangan3 = $_REQUEST['tunjangan3mgaji'];
    // $nama_tunjangan4 = $_REQUEST['nama_tunjangan4mgaji'];
    // $tunjangan4 = $_REQUEST['tunjangan4mgaji'];
    $nama_tunjangan1 = "";
    $tunjangan1 = 0;
    $nama_tunjangan2 = "";
    $tunjangan2 = 0;
    $nama_tunjangan3 = "";
    $tunjangan3 = 0;
    $nama_tunjangan4 = "";
    $tunjangan4 = 0;
    $bpjs_tk_pp = $_REQUEST['bpjs_tk_ppmgaji'];
    $bpjs_tk_kp = $_REQUEST['bpjs_tk_kpmgaji'];
    $bpjs_tk_kkp = $_REQUEST['bpjs_tk_kkpmgaji'];
    $bpjs_tk_htp = $_REQUEST['bpjs_tk_htpmgaji'];
    $bpjs_tk_jhtk = $_REQUEST['bpjs_tk_jhtkmgaji'];
    $bpjs_tk_pk = $_REQUEST['bpjs_tk_pkmgaji'];
    $bpjs_kes_pp = $_REQUEST['bpjs_kes_ppmgaji'];
    $bpjs_kes_pk = $_REQUEST['bpjs_kes_pkmgaji'];
    $rp_bpjs_tk_pp = $_REQUEST['rp_bpjs_tk_ppmgaji'];
    $rp_bpjs_tk_kp = $_REQUEST['rp_bpjs_tk_kpmgaji'];
    $rp_bpjs_tk_kkp = $_REQUEST['rp_bpjs_tk_kkpmgaji'];
    $rp_bpjs_tk_htp = $_REQUEST['rp_bpjs_tk_htpmgaji'];
    $rp_bpjs_tk_jhtk = $_REQUEST['rp_bpjs_tk_jhtkmgaji'];
    $rp_bpjs_tk_pk = $_REQUEST['rp_bpjs_tk_pkmgaji'];
    $pot_koperasi = $_REQUEST['pot_koperasimgaji'];
    $pot_bazis = $_REQUEST['pot_bazismgaji'];
    $dplk_simponi = $_REQUEST['dplk_simponimgaji'];
    $pot_dplk_pribadi = $_REQUEST['pot_dplk_pribadimgaji'];
    $cop_kendaraan = $_REQUEST['cop_kendaraanmgaji'];
    $iuran_peserta = $_REQUEST['iuran_pesertamgaji'];
    $brpr = $_REQUEST['brprmgaji'];
    $sewa_mess = $_REQUEST['sewa_messmgaji'];
    $qurban = $_REQUEST['qurbanmgaji'];
    $arisan = $_REQUEST['arisanmgaji'];
    $nama_potongan1 = $_REQUEST['nama_potongan1mgaji'];
    $potongan1 = $_REQUEST['potongan1mgaji'];
    $nama_potongan2 = $_REQUEST['nama_potongan2mgaji'];
    $potongan2 = $_REQUEST['potongan2mgaji'];
    $nama_potongan3 = "";
    $potongan3 = 0;
    $nama_potongan4 = "";
    $potongan4 = 0;
    // $nama_potongan3 = $_REQUEST['nama_potongan3mgaji'];
    // $potongan3 = $_REQUEST['potongan3mgaji'];
    // $nama_potongan4 = $_REQUEST['nama_potongan4mgaji'];
    // $potongan4 = $_REQUEST['potongan4mgaji'];

    if($id==0){
        $sql = "insert into  master_gaji(nip,gaji_dasar,honorarium,honorer,tarif_grade,tunjangan_posisi,p21b,tunjangan_kemahalan,tunjangan_perumahan,tunjangan_transportasi,bantuan_pulsa,tunjangan_kompetensi,dplk_persero,dplk_simponi_pr";
        $sql .= ",nama_tunjangan1,tunjangan1,nama_tunjangan2,tunjangan2,nama_tunjangan3,tunjangan3,nama_tunjangan4,tunjangan4";
        $sql .= ",bpjs_tk_pp,bpjs_tk_kp,bpjs_tk_kkp,bpjs_tk_htp,bpjs_tk_jhtk,bpjs_tk_pk,rp_bpjs_tk_pp,rp_bpjs_tk_kp,rp_bpjs_tk_kkp,rp_bpjs_tk_htp,rp_bpjs_tk_jhtk,rp_bpjs_tk_pk,bpjs_kes_pp,bpjs_kes_pk";
        $sql .= ",pot_koperasi,pot_bazis,dplk_simponi,pot_dplk_pribadi,cop_kendaraan,iuran_peserta,brpr,sewa_mess,qurban,arisan";
        $sql .= ",nama_potongan1,potongan1,nama_potongan2,potongan2,nama_potongan3,potongan3,nama_potongan4,potongan4)";
        $sql .= " values('$nip','$gaji_dasar','$honorarium','$honorer','$tarif_grade','$tunjangan_posisi','$p21b','$tunjangan_kemahalan','$tunjangan_perumahan','$tunjangan_transportasi','$bantuan_pulsa','$tunjangan_kompetensi','$dplk_persero','$dplk_simponi_pr";
        $sql .= "','$nama_tunjangan1','$tunjangan1','$nama_tunjangan2','$tunjangan2','$nama_tunjangan3','$tunjangan3','$nama_tunjangan4','$tunjangan4";
        $sql .= "','$bpjs_tk_pp','$bpjs_tk_kp','$bpjs_tk_kkp','$bpjs_tk_htp','$bpjs_tk_jhtk','$bpjs_tk_pk','$rp_bpjs_tk_pp','$rp_bpjs_tk_kp','$rp_bpjs_tk_kkp','$rp_bpjs_tk_htp','$rp_bpjs_tk_jhtk','$rp_bpjs_tk_pk','$bpjs_kes_pp','$bpjs_kes_pk";
        $sql .= "','$pot_koperasi','$pot_bazis','$dplk_simponi','$pot_dplk_pribadi','$cop_kendaraan','$iuran_peserta','$brpr','$sewa_mess','$qurban','$arisan";
        $sql .= "','$nama_potongan1','$potongan1','$nama_potongan2','$potongan2','$nama_potongan3','$potongan3','$nama_potongan4','$potongan4')";
    } else {
        $sql = "update master_gaji set gaji_dasar='$gaji_dasar',honorarium='$honorarium',honorer='$honorer',tarif_grade='$tarif_grade',tunjangan_posisi='$tunjangan_posisi',p21b='$p21b',tunjangan_kemahalan='$tunjangan_kemahalan',tunjangan_perumahan='$tunjangan_perumahan',tunjangan_transportasi='$tunjangan_transportasi',bantuan_pulsa='$bantuan_pulsa',tunjangan_kompetensi='$tunjangan_kompetensi',dplk_persero='$dplk_persero',dplk_simponi_pr='$dplk_simponi_pr";
        $sql .= "',nama_tunjangan1='$nama_tunjangan1',tunjangan1='$tunjangan1',nama_tunjangan2='$nama_tunjangan2',tunjangan2='$tunjangan2',nama_tunjangan3='$nama_tunjangan3',tunjangan3='$tunjangan3',nama_tunjangan4='$nama_tunjangan4',tunjangan4='$tunjangan4";
        $sql .= "',bpjs_tk_pp='$bpjs_tk_pp',bpjs_tk_kp='$bpjs_tk_kp',bpjs_tk_kkp='$bpjs_tk_kkp',bpjs_tk_htp='$bpjs_tk_htp',bpjs_tk_jhtk='$bpjs_tk_jhtk',bpjs_tk_pk='$bpjs_tk_pk',rp_bpjs_tk_pp='$rp_bpjs_tk_pp',rp_bpjs_tk_kp='$rp_bpjs_tk_kp',rp_bpjs_tk_kkp='$rp_bpjs_tk_kkp',rp_bpjs_tk_htp='$rp_bpjs_tk_htp',rp_bpjs_tk_jhtk='$rp_bpjs_tk_jhtk',rp_bpjs_tk_pk='$rp_bpjs_tk_pk',bpjs_kes_pp='$bpjs_kes_pp',bpjs_kes_pk='$bpjs_kes_pk";
        $sql .= "',pot_koperasi='$pot_koperasi',pot_bazis='$pot_bazis',dplk_simponi='$dplk_simponi',pot_dplk_pribadi='$pot_dplk_pribadi',cop_kendaraan='$cop_kendaraan',iuran_peserta='$iuran_peserta',brpr='$brpr',sewa_mess='$sewa_mess',qurban='$qurban',arisan='$arisan";
        $sql .= "',nama_potongan1='$nama_potongan1',potongan1='$potongan1',nama_potongan2='$nama_potongan2',potongan2='$potongan2',nama_potongan3='$nama_potongan3',potongan3='$potongan3',nama_potongan4='$nama_potongan4',potongan4='$potongan4' where id=$id";
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