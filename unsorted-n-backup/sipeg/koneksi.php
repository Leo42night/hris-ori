<?php
$koneksi = mysqli_connect("localhost","root","","hris");
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
$koneksi = mysqli_connect("localhost","root","","organikplnt");
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>