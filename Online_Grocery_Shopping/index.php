<?php
	session_start();
	include("function.php");
	
	if(isset($_POST['login'])){
		$username=$_POST['username'];
		$_SESSION['username'] = $username;
		
		$password=$_POST['password'];
		$_SESSION['password'] = $password;
		
		if(check($_SESSION['username'],$_SESSION['password'])==1 && checkAdmin($_SESSION['username'],$_SESSION['password'])==0){
			header("location: website.php");
		}
		else if(check($_SESSION['username'],$_SESSION['password'])==1 && checkAdmin($_SESSION['username'],$_SESSION['password'])==1){
			header("location: product.php");
		}
		else{
			echo "<script>
					alert('Account does not exist.')
				</script>";
		}
	}	
?>

<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="CSS/index.css">
		<style>
			body{
				background-image: url("img/login.jpg");
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
			}
		</style>
	</head>
	<body>
			<div class="block">
				<div>Login</div><br><br>
				<form action="" method="post">
					<input type="text" placeholder="Username" name="username" class="left size" required>
						<a href="Forgot.html" class="font">Forgot Password or Username?</a><br><br>
					<input type="password" placeholder="Password" name="password" class="left size" required>
						<div style="font-size: 10px">Create Account</div>
						<a href="register.php" class="font">REGISTER</a><br><br>
					<input type="submit" name="login" class="button left" value="Login">
				</form>
			</div>
	</body>
</html>
