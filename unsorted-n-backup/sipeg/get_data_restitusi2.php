<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    function TanggalIndo2($date){
        if($date!="" && $date!=null){
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $result = $tgl . "." . $bulan . ".". $tahun;	
            return($result);
        } else {
            return("");
        }
    }

    include "koneksi_sipeg.php";
    $idsppd = $_REQUEST['idsppd'];
    // $idsppd = "2024000594";

    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
    
    $offset = ($page-1)*$rows;
    $result = array();
    $result["total"] = 1;    
    
    $items = array();
    $total = 0;
    $rs = mysqli_query($koneksi,"select * from biaya_restitusi where idsppd='$idsppd' and nilai>0 order by id asc");
    while ($hasil = mysqli_fetch_array($rs)) {
    	$id = stripslashes ($hasil['id']);
        $idrestitusi = stripslashes ($hasil['idrestitusi']);
    	$jenis_restitusi = stripslashes ($hasil['jenis_restitusi']);
    	$keterangan = stripslashes ($hasil['keterangan']);
    	$nilai = stripslashes ($hasil['nilai']);
    	// $lampiran = stripslashes ($hasil['lampiran']);
        $total = $total+$nilai;

        $lampirannya = '';
        $lampirannya2 = '';
        $rs2 = mysqli_query($koneksi,"select * from eviden_restitusi where idsppd='$idsppd' and idrestitusi='$idrestitusi' order by id asc");
        while ($hasil2 = mysqli_fetch_array($rs2)) {
            $ideviden = stripslashes ($hasil2['id']);
            $lampiran2 = stripslashes ($hasil2['lampiran']);   
            $lampiran3 = explode(",",$lampiran2);
            $i=1;
            foreach($lampiran3 as $lampiran32){
                if(strpos($lampiran32, "public") !== false){
                    $lampiran = str_replace("public","https://hris.nusadaya.net/storage",$lampiran32);
                } else {
                    $lampiran = str_replace("../","",$lampiran32);
                }
                if($lampiran!=""){
                    if($lampirannya==""){
                        if($i==1){
                            $lampirannya .= '<a target="_blank" href="'.$lampiran.'" style="text-decoration:none;">'.basename($lampiran32).'</a>';
                        } else {
                            $lampirannya .= '<br/><a target="_blank" href="'.$lampiran.'" style="text-decoration:none;">'.basename($lampiran32).'</a>';
                        }
                    } else {
                        if($i==1){
                            $lampirannya .= '<a target="_blank" href="'.$lampiran.'" style="text-decoration:none;">'.basename($lampiran32).'</a>';
                        } else {
                            $lampirannya .= '<br/><a target="_blank" href="'.$lampiran.'" style="text-decoration:none;">'.basename($lampiran32).'</a>';
                        }
                    }
                }
                $i++;                    
            }
            // if(strpos($lampiran2, "public") !== false){
            //     $lampiran3 = explode(",",$lampiran2);
            //     $i=1;
            //     foreach($lampiran3 as $lampiran32){
            //         $lampiran = str_replace("public","https://hris.nusadaya.net/storage",$lampiran32);
            //         if($lampiran!=""){
            //             if($lampirannya==""){
            //                 if($i==1){
            //                     $lampirannya .= '<a target="_blank" href="'.$lampiran.'" style="text-decoration:none;">'.basename($lampiran32).'</a>';
            //                 } else {
            //                     $lampirannya .= '<br/><a target="_blank" href="'.$lampiran.'" style="text-decoration:none;">'.basename($lampiran32).'</a>';
            //                 }
            //             } else {
            //                 if($i==1){
            //                     $lampirannya .= '<a target="_blank" href="'.$lampiran.'" style="text-decoration:none;">'.basename($lampiran32).'</a>';
            //                 } else {
            //                     $lampirannya .= '<br/><a target="_blank" href="'.$lampiran.'" style="text-decoration:none;">'.basename($lampiran32).'</a>';
            //                 }
            //             }
            //         }
            //         $i++;                    
            //     }
            // } else {
            //     $lampiran = str_replace("../","",$lampiran2);
            //     if($lampiran!=""){
            //         if($lampirannya==""){
            //             $lampirannya .= '<a target="_blank" href="'.$lampiran.'" style="text-decoration:none;">'.basename($lampiran).'</a>';
            //         } else {
            //             $lampirannya .= '<br/><a target="_blank" href="'.$lampiran.'" style="text-decoration:none;">'.basename($lampiran).'</a>';
            //         }
            //     }
    
            // }
        }
        // $lampirannya .= '</div>';
    
        $datanya = array();
        $datanya["idrestitusi2"] = $id;
        $datanya["idrestitusirestitusi2"] = $idrestitusi;
        $datanya["idsppdrestitusi2"] = $idsppd;
        $datanya["jenis_restitusirestitusi2"] = $jenis_restitusi;
        $datanya["keteranganrestitusi2"] = $keterangan;
        $datanya["nilairestitusi2"] = $nilai;
        $datanya["lampirannyarestitusi2"] = $lampirannya;
        // $datanya["lampirannya2restitusi2"] = $lampirannya2;
        array_push($items, $datanya);
    }
    $result["rows"] = $items;
    $result["footer"]=array(array("jenis_restitusirestitusi2" => "TOTAL","nilairestitusi2" => $total));
    echo json_encode($result);
}
?>