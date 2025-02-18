<?php
$koneksi_teams = mysqli_connect("localhost","root","","teams");
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>