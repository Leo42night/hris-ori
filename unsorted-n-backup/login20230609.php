<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/hris-ori/database/koneksi.php"; 
if(!empty($_POST)){     
    $username = $_POST['username'];
    $password = md5($_POST['password']);

	$sql = "select * from masteruser where user_name='".$username."' and user_pass='".$password."' and aktif='1'";
    $query = mysqli_query($koneksi,$sql);
    if($query){
        $row = mysqli_num_rows($query);
        $hasil = mysqli_fetch_array($query);
        if($row > 0){
            $_SESSION["isLoggedInhris"]=1;
			$_SESSION["userakseshris"]=$hasil['user_name'];
    		$_SESSION["superadminhris"]=$hasil['superadmin'];
    		$_SESSION["namahris"]=$hasil['user_fullname'];
    		$_SESSION["jabatanhris"]=$hasil['jabatan'];
            $_SESSION["emailhris"]=$hasil['user_email'];
            header('Location: index.php');
        }else{
            echo "<span style='color:yellow;'>username atau password salah atau hak akses dibatasi.</span>";
        }
    }
}
?>
<html>
<title>::: H R I S :::</title>
<link rel="shortcut icon" href="favicon2.ico">
<link rel="stylesheet" type="text/css" href="themes/metro/easyui.css">
<link rel="stylesheet" type="text/css" href="themes/icon.css">
<link rel="stylesheet" type="text/css" href="demo.css">
<link rel="stylesheet" type="text/css" href="themes/color.css">
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="jquery.easyui.min.js"></script>
<script type="text/javascript" src="datagrid-filter.js"></script>
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> 
<script>
function ClearForm(){
    //document.MyForm.reset();
	$('#ff').form('reset');
}
</script>
<!--<body style="background-image: url('assets/bgteamsnew.png'); background-size: cover; background-repeat: no-repeat; background-position: top left;">-->
<body onload="ClearForm()">
<!--
<div class="centered2">	
	<form id="ff" action="" method="post" enctype="multipart/form-data">
	<table style="width:100%;">	
	<tr>
		<td style="width:40%;"></td>
		<td style="width:10%;"></td>
		<td style="width:50%;text-align:right;">
			<table style="width:100%;">
			<tr>
				<td></td>
				<td style="width:160px;text-align:right;">
					<img src="images/teams-akhlak.png" style="width:140px;" />
				</td>
				<td style="width:160px;text-align:right;">
					<img src="images/teams-logoplnt.png" style="width:140px;" />
				</td>
			</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="width:35%;"><img src="images/new/hris.png" style="width:100%;" /></td>
		<td style="width:10%;text-align:right;background-color:transparent;"><img src="images/teams-pemisah2.png" style="width:25%;" /></td>
		<td style="width:55%;text-align:center;padding-left:10%;padding-right:10%;">
			<table style="width:100%;">
			<tr>
				<td>
					<input class="kotak-input" type="text" id="username" name="username" autocomplete="off" style="height:30px;width:100%;"/>
				</td>
			</tr>
			<tr>
				<td>
					<input class="kotak-input" type="password" id="password" name="password" autocomplete="off" style="height:30px;width:100%;"/>
				</td>
			</tr>
			<tr>
				<td>
					<button class="tombol-input" type="submit" value="Submit" onClick="submitForm" style="height:40px;width:100%;cursor: pointer;">L O G I N</button>
				</td>
			</tr>
			</table>
		</td>
	</tr>	
	</table>
	</form>	
</div>
-->
<div class="divatas">
	<table style="width:100%">
	<tr>
		<td style="width:210px;">
			<form id="ff" action="" method="post" enctype="multipart/form-data">
			<table style="width:100%;">
			<tr>
				<td>
                    <div style="margin-bottom:5px;">
                        <label for="username" style="font-weight: normal;font-size:14px;font-weight:900 !important;">Username</label>
                        <input class="kotak-input" type="text" id="username" name="username" autocomplete="off" Placeholder="Username" style="height:30px;width:100%;color:#fff;font-size:16px;"/>
                    </div>
				</td>
			</tr>
			<tr>
				<td>
				<div style="margin-bottom:5px;">
                        <label for="password" style="font-weight: normal;font-size:14px;font-weight:900 !important;">Password</label>
                        <input class="kotak-input" type="password" id="password" name="password" autocomplete="off" Placeholder="Password" style="height:30px;width:100%;color:#fff;font-size:16px;"/>
                    </div>					
				</td>
			</tr>
			<tr>
				<td>
					<button class="tombol-input" type="submit" value="Submit" onClick="submitForm" style="height:30px;width:100px;cursor: pointer;font-weight:900 !important;">L O G I N</button>
				</td>
			</tr>
			</table>
			</form>	
		</td>
		<td></td>
		<td style="width:200px;text-align:center;vertical-align:top;">
			<img src="images/teams-akhlak.png" style="width:160px;" />
		</td>
		<td style="width:200px;text-align:center;vertical-align:top;">
			<img src="images/teams-logoplnt.png" style="width:160px;" />
		</td>
	</tr>
	</table>
</di>
<script>
	function submitForm(){
		alert("tes");
		$('#ff').form('submit');
	}
</script>
<style>
/*
body {
	font-family: 'Source Sans Pro';
	
}
*/
.divatas {
  	position: fixed;
  	top: 30px;
	left:15px;
	width:100%;
}
.centered {
  	position: fixed;
  	top: 50%;
  /*
  top: 50%;
  left: 50%;
  */
  right:55px;
  margin-top: -80px;
  margin-left: -100px;
}
.centered2 {
	background-color:transparent !important;
  	position: fixed;
  	top: 0%;
	bottom: 20%;
  	left: 15%;
  	right:15%;
	/*
  	margin-top: -80px;
  	margin-left: -100px;
	*/
}
.tengahvertikal {
  position: fixed;
  top: 50%;
  bottom: 50%;
}
.bawah {
  position: fixed;
  bottom: 10px;
  left : 300px;
  margin-left: -100px;
}
.bawahkanan {
  position: fixed;
  bottom: 10px;
  right : 40px;
  /*margin-right: 20px;*/
}
.tengah{
    position: absolute;
	/*
    margin-top: 10px;
    margin-left: -350px;
	*/
    left: 50%;
    top: 50%;
    width: 800px;
    height: 250px;
    background-color: transparent !important;
}
.topleft{
	position: absolute;
	left: -205px !important;
	top: 120px;
	width: 800px;
	height: 250px;
	background-color: transparent !important;	
}
.btn{
	border: none;
	width:auto;
	padding-top:5px;
	padding-bottom:7px;
	padding-left:15px !important;
	padding-right:15px !important;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 12px;
	/*margin: 2px 2px;*/
	border-radius: 5px;
	cursor:pointer;
}
.btn2{
	border: none;
	width:auto;
	padding-top:5px;
	padding-bottom:7px;
	padding-left:10px !important;
	padding-right:10px !important;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 12px;
	/*margin: 2px 2px;*/
	border-radius: 5px;
	cursor:pointer;
}
.btn-danger{
	background-color: #d9534f;
	color: white;
}
.btn-info{
	background-color: #5bc0de;
	color: white;
}
.btn-warning{
	background-color: #f0ad4e;
	color: white;
}
.btn-danger:hover{
	background-color: #f1615d;
	color: white;
}
.btn-info:hover{
	background-color: #64d5f6;
	color: white;
}
.btn-warning:hover{
	background-color: #fbc06d;
	color: white;
}
.btn-primary{
	background-color: #337ab7;
	color: white;
}
.btn-primary:hover{
	background-color: #3f8ed2;
	color: white;
}
.btn-success{
	background-color: #5cb85c;
	color: white;
}
.btn-success:hover{
	background-color: #68c368;
	color: white;
}
.form-input{
	height: 40px !important;
}
#col1{
    background:#337ab7;
}
.headernya{
	background:#337ab7;
	border:1px solid #337ab7;
}

/*
.textbox,.textbox .textbox-text{
	border-radius:10px;
}
*/
/*
.kotak-input {
    border: 0px solid #4c6fd8;
    border-radius: 10px;
    margin-top: 1.5rem;
    box-shadow: 0 3px 3px rgba(0, 0, 0, 0.16);
    padding: 1.2rem;
    height: 6.5rem;	
	font-size:15px;
	background-color:transparent;
}
*/
.tombol-input {
    /*border: 3px solid #4c6fd8;*/
	border:none !important;
    border-radius: 10px;
	background-color:#4c6fd8;
	color:#ffffff;
    margin-top: 0.5rem;
    /*box-shadow: 0 3px 3px rgba(0, 0, 0, 0.16);*/
	font-size:12px;
}
/*
.kotak-input:focus {
  border-color: #069287 !important;
}
*/
html { 
  /*background: url('assets/bgteamsnew.png') no-repeat center center fixed; */
  background: url('images/new/hris.jpg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

input {
	padding: 5px;
	margin: 5px 0;
	outline: none !important;
	border: none !important;
	box-shadow: none !important; 
	border-color: transparent !important;
	border-bottom: 1.5px solid #0d5b71 !important;
	color:black;
	background-color:transparent;
}
input:focus,
input:active {
	padding: 5px;
	margin: 5px 0;
	outline: none !important;
	border: 0 !important;
	box-shadow: none !important; 
	border-color: transparent !important;
	border-bottom: 1.5px solid #0d5b71 !important;
	color:black;
	background-color:transparent;

}

::-webkit-input-placeholder {
	color: #f7f5f5;
}

:-ms-input-placeholder {
	color: #f7f5f5;
}

::placeholder {
	color: #f7f5f5;
}        

</style>
</body>
</html>
