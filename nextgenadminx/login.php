<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "../includes/db.php" ?>

<?php 
	
	$error = null;
	
	if (isset($_POST['submit'])) {
		$password  		= escape($_POST['password']);
		$username  		= escape($_POST['username']);
		$remember_me 	= $_POST['remember-me'];

		if (!empty($username) && !empty($password)) {
			$query = "SELECT * FROM admin WHERE username = '".$username."'";
			$select = mysqli_query($connection, $query);
			$row = mysqli_num_rows($select);
			if ($row > 0) {
				$userData = mysqli_fetch_array($select);
				$password = base64_encode($password);
				if ($password === $userData['password'] && $username === $userData['username'] && $userData['status'] == 'admin') {
					$str = $username.$userData['name'];
					$cookie_value = crypt($str,'$2a$09$gd$3yvdu56&h#fd6d^c676$');
					if (isset($remember_me)) {
						
						$query = "UPDATE users SET remember_me = '$cookie_value' WHERE username = '$username'";
						mysqli_query($connection, $query);
						setcookie("nextgen", $cookie_value, time()+864000);
						
					}
					
					$token =  hash('ripemd160', $cookie_value);
					 $_SESSION['token'] = $token;
					
					$_SESSION['admin'] = $userData;
					$_SESSION['admin']['email'] = $username;

					header("Location: index.php");
				} else{
					$error = "<div class = 'py-2 form-control bg-warning text-white'>
					Password or Not Matched...
				</div>";
				}	
			} else{
				$error = "<div class = 'py-2 form-control bg-warning text-white'>
				This email is not register. <a href='registration.php'>registretion</a>
			</div>";
			}
		} else{
			$error = "<div class = 'py-2 form-control bg-warning text-white'>
				Feild Should note be empty......
			</div>";
		}
		
	}else{
		if(isset($_COOKIE['nextgen'])) {
			$cookie_value = $_COOKIE['nextgen'];
			
   	 		$query = "SELECT * FROM admin WHERE remember_me = '$cookie_value'";
   	 		$select = mysqli_query($connection, $query);
   	 		$num_rows = mysqli_num_rows($select);
   	 		if ($num_rows > 0 && $num_rows < 2) {
   	 			$userData = mysqli_fetch_array($select);
  	   	 		$_SESSION['admin'] = $userData;
	   	 		header("Location: index.php");
   	 			exit;
   	 		}
   	 		
   	 		
		} else {
			if (isset($_SESSION['admin']) && isset($_SESSION['token'])){
			     header("Location: index.php");
			     exit;
			} 
		}
		$error = null;
	}
	

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>GBU | Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="img/gbulogo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100 " style="background-image: url('../login/images/bg-01.jpg');">
			<div class="row">
				<div class="col-md-6 text-center ">
					<div class=" mb-0 pb-4 my-auto">
			            <div class="text-center">
			                <img class="img-fluid" style="height: 175px;  background-color: #ffffff; border-radius: 50%;" src="../img/gbulogo.png" alt="">
			                <br><br>
			                <h3 class="font-weight-normal font-italic">Gautam Buddha University, Admin</h3>
			            </div>
			            <hr style="width: 90%; border-width: 3px;border-radius: 10%; border-color: #ff4500">
			        </div>
				</div>
				<div class="col-md-6 align-content-center">
					<div class="wrap-login100 zxcvb">
						<form class="login100-form validate-form my0" action="" method="post">
							<span class="login100-form-logo">
								<img class="img-fluid" width="100%" src="../img/teacher.png" alt="">
							</span>

							<span class="login100-form-title p-b-34 p-t-27">
								Log in
							</span>

							<div class="wrap-input100 validate-input" data-validate = "Enter username">
								<input class="input100" type="email" name="username" placeholder="Username">
								<span class="focus-input100" data-placeholder="&#xf207;"></span>
							</div>

							<div class="wrap-input100 validate-input" data-validate="Enter password">
								<input class="input100" type="password" name="password" placeholder="Password">
								<span class="focus-input100" data-placeholder="&#xf191;"></span>
							</div>
							<div class="contact100-form-checkbox">
								<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
								<label class="label-checkbox100" for="ckb1">
									Remember me
								</label>
							</div>
							<div class="mb-3">
								<?php echo $error; ?>
							</div>

							<div class="container-login100-form-btn">
								<button name="submit" class="login100-form-btn">
								Login
								</button>
							</div>
							<br>
							<div class="container-login100-form-btn ">
								<a class="p-3 bg-secondary rounded-circle" href="registration.php">If don't have an account?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
</body>
</html>