<?php
session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if ($userhris && $superadminhris=="1"){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
    
    $offset = ($page-1)*$rows;
    $result = array();

    $grupcari = isset($_POST['grupdatamenucari']) ? $_POST['grupdatamenucari'] : "";
    $parentIdcari = isset($_POST['parentIddatamenucari']) ? $_POST['parentIddatamenucari'] : "";
    $parentId2cari = isset($_POST['parentId2datamenucari']) ? $_POST['parentId2datamenucari'] : "";
    
    $offset = ($page-1)*$rows;
    $result = array();
    
    $perintah = "";
    
    if($grupcari!=""){
        $perintah .= " and a.grup='$grupcari'";
    }
    if($parentIdcari!=""){
        $perintah .= " and a.id='$parentIdcari'";
    }
    if($parentId2cari!=""){
        $perintah .= " and a.id='$parentId2cari'";
    }
    
    /*
    $rs = mysqli_query($koneksi,"select count(*) from nodes order by id asc");
    $row = mysqli_fetch_row($rs);
    $result["total"] = $row[0];    
    */
    $result["total"] = 1;
    
    $items = array();
    //$rs = mysqli_query($koneksi,"select * from nodes where parentId<>'' order by urut,id asc");
    $rs = mysqli_query($koneksi,"select a.*,b.id as id_grup from nodes a inner join master_grup b on a.grup=b.grup where a.parentId<>''".$perintah." order by b.id,a.urut,a.id asc");
    while ($hasil = mysqli_fetch_array($rs)) {
        $id = stripslashes ($hasil['id']);
        $grup = stripslashes ($hasil['grup']);
    	$parentId = stripslashes ($hasil['parentId']);
        $nama_parentId = stripslashes ($hasil['name']);
        $icon = stripslashes ($hasil['icon']);
        $url = stripslashes ($hasil['url']);
        $state = stripslashes ($hasil['state']);
        $urut = stripslashes ($hasil['urut']);
        
        if($url==""){
            $datanya = array();
            $datanya["iddatamenu"] = $id;
            $datanya["grupdatamenu"] = $grup;
            $datanya["nama_parentIddatamenu"] = $nama_parentId;
            $datanya["nama_parentId2datamenu"] = "";
            $datanya["nama_parentId3datamenu"] = "";
            $datanya["namadatamenu"] = $nama_parentId;
            $datanya["icondatamenu"] = $icon;
            $datanya["urldatamenu"] = $url;
            $datanya["statedatamenu"] = $state;
            $datanya["urutdatamenu"] = $urut;
            array_push($items, $datanya);
        }
        
        $rs2 = mysqli_query($koneksi,"select * from nodes where parentId2='$id' order by urut,id asc");
        $jumlah2 = mysqli_num_rows($rs2);
        if($jumlah2>0){
            while ($hasil2 = mysqli_fetch_array($rs2)){
                $id2 = stripslashes ($hasil2['id']);
                $grup2 = stripslashes ($hasil2['grup']);
                $parentId2 = stripslashes ($hasil2['parentId2']);
                $nama_parentId2 = stripslashes ($hasil2['name']);
                $icon2 = stripslashes ($hasil2['icon']);
                $url2 = stripslashes ($hasil2['url']);
                $state2 = stripslashes ($hasil2['state']);
                $urut2 = stripslashes ($hasil2['urut']);

                if($url2==""){
                    $datanya = array();
                    $datanya["iddatamenu"] = $id;
                    $datanya["grupdatamenu"] = $grup2;
                    $datanya["parentIddatamenu"] = $parentId2;
                    $datanya["nama_parentIddatamenu"] = $nama_parentId;
                    $datanya["nama_parentId2datamenu"] = $nama_parentId2;
                    $datanya["nama_parentId3datamenu"] = "";
                    $datanya["namadatamenu"] = $nama_parentId2;
                    $datanya["icondatamenu"] = $icon2;
                    $datanya["urldatamenu"] = $url2;
                    $datanya["statedatamenu"] = $state2;
                    $datanya["urutdatamenu"] = $urut2;
                    array_push($items, $datanya);
                }
                
                $rs3 = mysqli_query($koneksi,"select * from nodes where parentId3='$id2' order by grup,urut,id asc");
                $jumlah3 = mysqli_num_rows($rs3);
                if($jumlah3>0){
                    while($hasil3 = mysqli_fetch_array($rs3)){
                        $id3 = stripslashes ($hasil3['id']);
                        $grup3 = stripslashes ($hasil3['grup']);
                        $parentId3 = stripslashes ($hasil3['parentId3']);
                        $nama_parentId3 = stripslashes ($hasil3['name']);
                        $icon3 = stripslashes ($hasil3['icon']);
                        $url3 = stripslashes ($hasil3['url']);
                        $state3 = stripslashes ($hasil3['state']);
                        $urut3 = stripslashes ($hasil3['urut']);
                            
                        $datanya = array();
                        $datanya["iddatamenu"] = $id;
                        $datanya["grupdatamenu"] = $grup3;
                        $datanya["nama_parentIddatamenu"] = $nama_parentId;
                        $datanya["nama_parentId2datamenu"] = $nama_parentId2;
                        $datanya["nama_parentId3datamenu"] = $nama_parentId3;
                        $datanya["namadatamenu"] = $nama_parentId3;
                        $datanya["icondatamenu"] = $icon3;
                        $datanya["urldatamenu"] = $url3;
                        $datanya["statedatamenu"] = $state3;
                        $datanya["urutdatamenu"] = $urut3;
                        array_push($items, $datanya);
                    }
                } else {
                    if($url2!=""){
                        $datanya = array();
                        $datanya["iddatamenu"] = $id2;
                        $datanya["grupdatamenu"] = $grup2;
                        $datanya["nama_parentIddatamenu"] = $nama_parentId;
                        $datanya["nama_parentId2datamenu"] = "";
                        $datanya["nama_parentId3datamenu"] = $nama_parentId2;
                        $datanya["namadatamenu"] = $nama_parentId2;
                        $datanya["icondatamenu"] = $icon2;
                        $datanya["urldatamenu"] = $url2;
                        $datanya["statedatamenu"] = $state2;
                        $datanya["urutdatamenu"] = $urut2;
                        array_push($items, $datanya);
                    }
                }
            }
        } else {
            if($url!=""){
                $datanya = array();
                $datanya["iddatamenu"] = $id;
                $datanya["grupdatamenu"] = $grup;
                $datanya["nama_parentIddatamenu"] = "";
                $datanya["nama_parentId2datamenu"] = "";
                $datanya["nama_parentId3datamenu"] = $nama_parentId;
                $datanya["namadatamenu"] = $nama_parentId;
                $datanya["icondatamenu"] = $icon;
                $datanya["urldatamenu"] = $url;
                $datanya["statedatamenu"] = $state;
                $datanya["urutdatamenu"] = $urut;
                array_push($items, $datanya);    
            }    
        }
    }
    $result["rows"] = $items;
    echo json_encode($result);
}
?>