<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "includes/db.php" ?>
<?php 
 	function RandomToken($length = 40){
	    if(!isset($length) || intval($length) <= 40 ){
	      $length = 40;
	    }
	    if (function_exists('random_bytes')) {
	        return bin2hex(random_bytes($length));
	    }
	    if (function_exists('mcrypt_create_iv')) {
	        return bin2hex(mcrypt_create_iv($length, MCRYPT_DEV_URANDOM));
	    }
	    if (function_exists('openssl_random_pseudo_bytes')) {
	        return bin2hex(openssl_random_pseudo_bytes($length));
	    }
	}
?>
<?php 
	if (isset($_POST['submit'])) {

		$name  				= escape($_POST['name']);
		$username  			= escape($_POST['email']);
		$password  			= escape($_POST['password']);
		$retype_password  	= escape($_POST['retype_password']);


		if (!empty($username) && !empty($name) && !empty($username) && !empty($password) && !empty($retype_password)) {

			$query 		= "SELECT username FROM users WHERE username = '$username'";
			$select 	= mysqli_query($connection, $query);
			$row_num 	= mysqli_num_rows($select);
			if ($row_num > 0) {
				$error = "<div class = 'py-2 form-control bg-warning text-white'>
				This email already register. If this email is your then go to <a href='login.php'>login</a>  page
			</div>";
			} else{

				if ($password === $retype_password) {
                    
                    $en_pass = base64_encode($password);

					$query = "INSERT INTO users (username, password, name) VALUES ('$username', '$en_pass', '$name')";
					$insert = mysqli_query($connection, $query);
					 if ($insert) {
						$query = "INSERT INTO teacherdata (username, name) VALUES ('$username','$name')";
						mysqli_query($connection, $query);
					 	$data = RandomToken().$username;
						$hash =  hash('ripemd160', $data);
						$token =  hash('ripemd160', $hash);
						$_SESSION['token'] = $token.uniqid();
						$userData = array(
		                	'name'		=> $name,
		                	'email'		=> $username,
							'username' 	=> $username,
							'image'		=> null
		            	);
						$_SESSION['userData'] = $userData;

						header("Location: welcome.php");
					 }
					 
				}else{

						$error = "<div class = 'py-2 form-control bg-warning text-white'>
							Password not matched.....
						</div>";
				}

			}
			

		} else {
			$error = "<div class = 'py-2 form-control bg-warning text-white'>
				Any field Should not be empty......
			</div>";
		}
	} else{
		$error = null;
	}	

?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>GBU | Registration</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--===============================================================================================-->
		<link rel="icon" type="image/png" href="img/gbulogo.png"/>
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="login/fonts/iconic/css/material-design-iconic-font.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="login/css/util.css">
		<link rel="stylesheet" type="text/css" href="login/css/main.css">
		<!--===============================================================================================-->
	</head>
	<body>
		
		<div class="limiter">
			<div class=" container-login100" style="background-image: url('login/images/bg-01.jpg');">
				<div class="container">
				<div class="row">
				<div class="col-md-6 text-center">
					<br>
					<div class=" mb-0 pb-4 ">
			            <div class="text-center">
			                <img class="img-fluid" style="height: 175px;  background-color: #ffffff; border-radius: 50%; background: transparent;" src="img/gbulogo.png" alt="">
			                <br><br>
			                <h3 class="font-weight-normal">Welcome to Gautam Buddha University's Website Council</h3>
			            </div>
			            <hr class="mx-auto" style="width: 90%; border-width: 3px;border-radius: 10%; border-color: #ff4500">
			        </div>
                    <div class="py-2">
                        <a class="btn py-1 bg-success text-white" href='http://mukulrai.in/view.php?view=home&id=10243654' >Before uploading data please see all the details about the form structure</a>
                    </div> <br>
                    <div class="py-2">
                        <a class="btn bg-danger text-white" href='view.php' >View Submissions</a>
                    </div>
				</div>
				<div class="col-md-6 align-content-center">
				<div class="wrap-login100">
				<form class="login100-form validate-form" action="" method="post">
                    <span class="login100-form-logo">
                        <img class="img-fluid" width="100%" src="img/teacher.png" alt="">
                    </span>
                    <span class="login100-form-title p-b-34 p-t-27">
                        Registration Form
                    </span>
				<div class="wrap-input100 validate-input" data-validate = "Enter Your Name">
					<input class="input100" type="text" name="name" placeholder="Name" minlength="4">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>
						
				<div class="wrap-input100 validate-input" data-validate = "Enter Email">
				   <input class="input100" type="text" name="email" placeholder="Email"  minlength="6">
					 <span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Enter password">
				  <input class="input100" type="password" name="password" placeholder="Password" minlength="6">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
						</div>

				<div class="wrap-input100 validate-input" data-validate="Enter password">
					<input class="input100" type="password" name="retype_password" placeholder=" Retype Password" minlength="6">
					  <span class="focus-input100" data-placeholder="&#xf191;"></span>
						</div>

				<div class="wrap-input100 ">
					<?php echo $error; ?>
				</div>
			    <div class="container-login100-form-btn">
					<button class="login100-form-btn" name="submit">
					Register
					</button>
				</div>
						
					</form><br><br>
					<div class="container-login100-form-btn ">
								<a class="p-3 bg-secondary rounded-circle" href="index">Already have an account</a>
					</div>
				</div>
			</div>
		</div>
			</div>
		</div>
		</div>
		
		<div id="dropDownSelect1"></div>
		
		<!--===============================================================================================-->
		<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
		<!--===============================================================================================-->
		<script src="login/vendor/animsition/js/animsition.min.js"></script>
		<!--===============================================================================================-->
		<script src="login/vendor/bootstrap/js/popper.js"></script>
		<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
		<!--===============================================================================================-->
		<script src="login/vendor/select2/select2.min.js"></script>
		<!--===============================================================================================-->
		<script src="login/vendor/daterangepicker/moment.min.js"></script>
		<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
		<!--===============================================================================================-->
		<script src="login/vendor/countdowntime/countdowntime.js"></script>
		<!--===============================================================================================-->
		<script src="login/js/main.js"></script>
	</body>
</html>