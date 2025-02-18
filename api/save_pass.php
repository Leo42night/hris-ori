<?php
session_start();
$userhris = $_SESSION["userakseshris"];
if ($userhris){
    include 'koneksi.php';
    //$pass_lama = md5(htmlspecialchars($_REQUEST['pass_lama']));
    //$pass_baru = md5(htmlspecialchars($_REQUEST['pass_baru']));
    //$pass_baru2 = md5(htmlspecialchars($_REQUEST['pass_baru2']));
    $pass_lama = md5($_REQUEST['pass_lama']);
    $pass_baru = md5($_REQUEST['pass_baru']);
    $pass_baru2 = md5($_REQUEST['pass_baru2']);

    $rs2 = mysqli_query($koneksi,"select user_pass from masteruser where user_name='$userhris'");
    $hasil2 = mysqli_fetch_array($rs2);
    $pass_lama2 = stripslashes ($hasil2['user_pass']);
    
    if ($pass_lama!=$pass_lama2){
        echo json_encode(array('errorMsg'=>'Password lama yang dimasukkan salah!'));
    } else if ($pass_baru!=$pass_baru2){
        echo json_encode(array('errorMsg'=>'Password baru yang dimasukkan tidak sama!'));
    } else {
        $sql = "update masteruser set user_pass='$pass_baru' where user_name='$userhris'";
        $result = @mysqli_query($koneksi,$sql);
        if ($result){
            echo json_encode(array('success'=>true));
        } else {
            echo json_encode(array('errorMsg'=>'Gagal reset password.'));
        }
    }
}
?>