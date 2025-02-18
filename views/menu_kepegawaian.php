<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/hris-ori/database/koneksi.php'; // Ensure the database connection is included only once globally.

$userhris = $_SESSION["userakseshris"];

if ($userhris) {
    function has_child($id) {
        global $koneksi, $userhris; // Use global variables instead of re-including the file
        $rs = mysqli_query($koneksi, "SELECT COUNT(*) FROM nodes a 
            INNER JOIN aksesuser b ON a.id = b.idmenu 
            AND b.username = '$userhris' 
            AND (b.proses = '1' OR b.lihat = '1') 
            WHERE parentId2 = '$id' AND parentId2 <> ''");
        $row = mysqli_fetch_array($rs);
        return $row[0];
    }

    function has_child2($id) {
        global $koneksi, $userhris;
        $rs = mysqli_query($koneksi, "SELECT COUNT(*) FROM nodes a 
            INNER JOIN aksesuser b ON a.id = b.idmenu 
            AND b.username = '$userhris' 
            AND (b.proses = '1' OR b.lihat = '1') 
            WHERE parentId3 = '$id' AND parentId3 <> ''");
        $row = mysqli_fetch_array($rs);
        return $row[0];
    }

    $items = array();
    $rs = mysqli_query($koneksi, "SELECT a.*, b.proses, b.lihat FROM nodes a 
        LEFT JOIN aksesuser b ON a.id = b.idmenu 
        AND b.username = '$userhris' 
        AND (b.proses = '1' OR b.lihat = '1') 
        WHERE a.grup = 'KEPEGAWAIAN' AND a.parentId <> '' AND a.parentId2 = '' 
        ORDER BY a.urut, a.id ASC");

    while ($hasil = mysqli_fetch_array($rs)) {
        $id = $hasil['id'];
        $name = $hasil['name'];
        $icon = $hasil['icon'];
        $url = $hasil['url'];
        $state = $hasil['state'];
        $proses = $hasil['proses'];
        $lihat = $hasil['lihat'];
        $filter = "$name|$url|$proses|$lihat";

        $datanya = array(
            "id" => $id,
            "text" => "<a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanelnya(\"$filter\")'>$name</a>",
            "iconCls" => $icon
        );

        if (has_child($id) > 0) {
            $datanya["text"] = "<span style='font-weight:bold;font-size:11px;'>$name</span>";
            $datanya['state'] = $state;

            $items2 = array();
            $rs2 = mysqli_query($koneksi, "SELECT a.*, b.proses, b.lihat FROM nodes a 
                LEFT JOIN aksesuser b ON a.id = b.idmenu 
                AND b.username = '$userhris' 
                WHERE a.parentId2 = '$id' AND a.parentId2 <> '' 
                ORDER BY a.urut, a.id ASC");

            while ($hasil2 = mysqli_fetch_array($rs2)) {
                $id2 = $hasil2['id'];
                $name2 = $hasil2['name'];
                $icon2 = $hasil2['icon'];
                $url2 = $hasil2['url'];
                $state2 = $hasil2['state'];
                $proses2 = $hasil2['proses'];
                $lihat2 = $hasil2['lihat'];
                $filter2 = "$name2|$url2|$proses2|$lihat2";

                $rs92 = mysqli_query($koneksi, "SELECT * FROM aksesuser WHERE idmenu='$id2' 
                    AND username='$userhris' 
                    AND (proses='1' OR lihat='1')");
                $jumlahdata92 = mysqli_num_rows($rs92);

                if ($jumlahdata92 > 0 || $userhris == "sandy") {
                    $datanya2 = array(
                        "id" => $id2,
                        "text" => "<a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='addPanelnya(\"$filter2\")'>$name2</a>",
                        "iconCls" => $icon2
                    );

                    if (has_child2($id2) > 0) {
                        $datanya2["text"] = "<span style='font-weight:bold;font-size:11px;'>$name2</span>";
                        $datanya2['state'] = $state2;

                        $items3 = array();
                        $rs3 = mysqli_query($koneksi, "SELECT * FROM nodes WHERE parentId3='$id2' 
                            AND parentId3 <> '' 
                            ORDER BY urut, id ASC");

                        while ($hasil3 = mysqli_fetch_array($rs3)) {
                            $id3 = $hasil3['id'];
                            $name3 = $hasil3['name'];
                            $icon3 = $hasil3['icon'];
                            $url3 = $hasil3['url'];

                            $datanya3 = array(
                                "id" => $id3,
                                "text" => "<a href='javascript:void(0)' style='text-decoration: none; color: black;' onclick='$url3'>$name3</a>",
                                "iconCls" => $icon3
                            );
                            array_push($items3, $datanya3);
                        }
                        $datanya2["children"] = $items3;
                    }
                    array_push($items2, $datanya2);
                }
            }
            $datanya["children"] = $items2;
            array_push($items, $datanya);
        } else {
            array_push($items, $datanya);
        }
    }
    echo json_encode($items);
}
?>
