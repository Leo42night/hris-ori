<?php
// Tidak ada tabs views: kartupenghasilan.php, 
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
require_once $_SERVER['DOCUMENT_ROOT'] . '/hris-ori/database/koneksi.php'; // Ensure the database connection is included only once globally.

if ($userhris){
    function has_child($id){
        global $koneksi, $userhris;
        $rs = mysqli_query($koneksi,"select count(*) from nodes a inner join aksesuser b ON a.id=b.idmenu and b.username='$userhris' and (b.proses='1' or b.lihat='1') where parentId2='$id' and parentId2<>''");
        $row = mysqli_fetch_array($rs);
        return $row[0];
    }
    function has_child2($id){
        global $koneksi, $userhris;
        $rs = mysqli_query($koneksi,"select count(*) from nodes a inner join aksesuser b ON a.id=b.idmenu and b.username='$userhris' and (b.proses='1' or b.lihat='1') where parentId3='$id' and parentId3<>''");
        $row = mysqli_fetch_array($rs);
        //return $row[0] > 0 ? true : false;
        return $row[0];
    }

    $items = array();
    //$rs = mysqli_query($koneksi,"select a.*,b.proses,b.lihat from nodes a left join aksesuser b ON a.id=b.idmenu and b.username='$userhris' and (b.proses='1' or b.lihat='1') where a.grup='KEPEGAWAIAN' and a.parentId<>'' and a.parentId2='' order by a.urut,a.id asc");
    $rs = mysqli_query($koneksi,"select a.*,b.proses,b.lihat from nodes a left join aksesuser b ON a.id=b.idmenu and b.username='sandy' and (b.proses='1' or b.lihat='1') where a.grup='PERPAJAKAN' and a.parentId<>'' and a.parentId2='' order by a.urut,a.id asc");
    while ($hasil = mysqli_fetch_array($rs)) {
        $id = $hasil['id'];
        $parentId = $hasil['parentId'];
        $name = $hasil['name'];
        $icon = $hasil['icon'];
        $url = $hasil['url'];
        $state = $hasil['state'];
        $proses = $hasil['proses'];
        $lihat = $hasil['lihat'];
        // $url relatif terhadapa views/tabs/
        $filter = $name."|pajak/".$url."|".$proses."|".$lihat;

        $datanya = array();
        $datanya["id"] = $id;    
        $datanya["text"] = "<a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanelnya(\"".$filter."\")'>".$name."</a>";
        $datanya["iconCls"] = $icon;
        
        $cekdata = has_child($id);
        if($cekdata>0){
            $datanya["text"] = "<span style='font-weight:bold;font-size:11px;'>".$name."</span>";
            $datanya['state'] = $state;

            $items2 = array();
            $rs2 = mysqli_query($koneksi,"select a.*,b.proses,b.lihat from nodes a left join aksesuser b ON a.id=b.idmenu and b.username='$userhris' where a.parentId2='$id' and a.parentId2<>'' order by a.urut,a.id asc");
            while ($hasil2 = mysqli_fetch_array($rs2)) {
                $id2 = $hasil2['id'];
                $parentId2 = $hasil2['parentId2'];
                $name2 = $hasil2['name'];
                $icon2 = $hasil2['icon'];
                $url2 = $hasil2['url'];
                $state2 = $hasil2['state'];
                $proses2 = $hasil2['proses'];
                $lihat2 = $hasil2['lihat'];
                $filter2 = $name2."|pajak/".$url2."|".$proses2."|".$lihat2;

                $rs92 = mysqli_query($koneksi,"select * from aksesuser where idmenu='$id2' and username='$userhris' and (proses='1' or lihat='1')");
                $jumlahdata92 = mysqli_num_rows($rs92);
                if($jumlahdata92>0 || $userhris=="sandy"){
                        
                    $datanya2 = array();
                    $datanya2["id"] = $id2;
                    //$datanya2["text"] = "<a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='".$url2."'>".$name2."</a>";
                    $datanya2["text"] = "<a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanelnya(\"".$filter2."\")'>".$name2."</a>";
                    $datanya2["iconCls"] = $icon2;
                    $cekdata2 = has_child2($id2);
                    if($cekdata2>0){
                        $datanya2["text"] = "<span style='font-weight:bold;font-size:11px;'>".$name2."</span>";
                        $datanya2['state'] = $state2;

                        $items3 = array();
                        $rs3 = mysqli_query($koneksi,"select * from nodes where parentId3='$id2' and parentId3<>'' order by urut,id asc");
                        while ($hasil3 = mysqli_fetch_array($rs3)) {
                            $id3 = $hasil3['id'];
                            $parentId3 = $hasil3['parentId3'];
                            $name3 = $hasil3['name'];
                            $icon3 = $hasil3['icon'];
                            $url3 = $hasil3['url'];
                            $state3 = $hasil3['state'];
                                            
                            $datanya3 = array();
                            $datanya3["id"] = $id3;
                            $datanya3["text"] = "<a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='".$url3."'>".$name3."</a>";
                            $datanya3["iconCls"] = $icon3;
                            array_push($items3, $datanya3);
                        }
                        $datanya2["children"] = $items3;    
                    }                
                    array_push($items2, $datanya2);
                }
                $datanya["children"] = $items2;
            
            }            
            array_push($items, $datanya);
        } else {
            array_push($items, $datanya);
        }        
    }
    echo json_encode($items);
}
?>