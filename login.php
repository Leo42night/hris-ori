<?php
session_start();
include 'database/koneksi.php'; 
if(!empty($_POST)){     
    $username = mysqli_real_escape_string($koneksi,$_POST['username']);
    // $password = md5(mysqli_real_escape_string($koneksi,$_POST['password']));
    $password = mysqli_real_escape_string($koneksi,$_POST['password']);
    echo $username." - " . $password;
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
            echo "<div style='color:red;padding:10px;font-size:12px;'>username atau password salah atau hak akses dibatasi.</div>";			
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>::: H R I S :::</title>
	<link rel="shortcut icon" href="assets/favicon2.ico">
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="login-form">
		<table style="width:100%">
		<tr>
			<td style="width:50%;text-align:left;">
				<img src="assets/plnlogo.png" style="width:70%;" />
			</td>
			<td style="width:50%;text-align:right;">
				<img src="images/new/akhlak.png" style="width:70%;" />
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align:center;padding-top:20px;padding-bottom:20px;">
				<!--<h2>H R I S</h2>-->
				<span style="font-size:28px;font-weight:bold;">H R I S</span><br/>
				<span style="font-size:14px;color:#5870f6;">Human Resource Information System</span>
			</td>
		</tr>
		</table>    
		<form id="login-form" action="" method="post" enctype="multipart/form-data">
		<div style="padding-right:20px;">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" placeholder="Enter your username" autocomplete="off" required />
		</div>
		<div style="padding-right:20px;">
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" placeholder="Enter your password" required />
		</div>
		<div>
			<label for="remember-me">
				<input type="checkbox" id="remember-me" /><span style="font-size:12px;">Remember Me</span>
			</label>
		</div>
		<div style="margin-top:15px;">
			<button type="submit" style="font-size:16px;">Login</button>
		</div>
		</form>
		<div id="error-message" class="error-message"></div>
  	</div>

	<script>
		/*
		document.getElementById("login-form").addEventListener("submit", function(event) {
		event.preventDefault(); // Prevent form submission

		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;
		var rememberMe = document.getElementById("remember-me").checked;

		// Perform form validation
		if (username === "" || password === "") {
			document.getElementById("error-message").textContent = "Please fill in all fields.";
		} else {
			// Form is valid, perform login logic here
			// ...
			// If login is successful, redirect the user or perform other actions
		}
		});
		*/
	</script>
</body>
</html>
