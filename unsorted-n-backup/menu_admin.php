<?php
//session_start();
$userhris = $_SESSION["userakseshris"];
$superadminhris = $_SESSION["superadminhris"];
if ($userhris){
    function has_child($id){
        require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
        $rs = mysqli_query($koneksi,"select count(*) from nodes where parentId2=$id and parentId2<>''");
        $row = mysqli_fetch_array($rs);
        //return $row[0] > 0 ? true : false;
        return $row[0];
    }
    function has_child2($id){
        require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";
        $rs = mysqli_query($koneksi,"select count(*) from nodes where parentId3=$id and parentId3<>''");
        $row = mysqli_fetch_array($rs);
        //return $row[0] > 0 ? true : false;
        return $row[0];
    }

    require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php";

    $items = array();
    $rs = mysqli_query($koneksi,"select a.*,b.proses,b.lihat from nodes a inner join aksesuser b ON a.id=b.idmenu and b.username='$userhris' and (b.proses='1' or b.lihat='1') where a.grup='ADMIN' and a.parentId<>'' and a.parentId2='' order by a.urut,a.id asc");
    while ($hasil = mysqli_fetch_array($rs)) {
        $id = $hasil['id'];
        $parentId = $hasil['parentId'];
        $name = $hasil['name'];
        $icon = $hasil['icon'];
        $url = $hasil['url'];
        $state = $hasil['state'];
        $proses = $hasil['proses'];
        $lihat = $hasil['lihat'];
        $filter = $name."|".$url."|".$proses."|".$lihat;
        echo "<button class='tombol-input' onClick='addPanelnya(\"".$filter."\")' style='width:100%;cursor: pointer;'><i class='".$icon." hijau' style='font-size:10px;margin-left:5px;margin-right:10px;'></i>".$name."</button>";
    }
    if($superadminhris=="1" && $userhris=="sandy"){
        $id = 9998;
        $parentId = "";
        $name = "Pengaturan Menu";
        $icon = "fa fa-list red";
        //$filter = $name."|".$url."|".$proses."|".$lihat;
        $filter2 = "Master Menu|datamenu.php|1|1";
        echo "<button class='tombol-input' onClick='addPanelnya(\"".$filter2."\")' style='width:100%;cursor: pointer;'><i class='".$icon." hijau' style='font-size:10px;margin-left:5px;margin-right:10px;'></i>".$name."</button>";
    }

}
?>
