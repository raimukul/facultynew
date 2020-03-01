<?php ob_start(); ?>
<?php session_start(); 

if(isset($_SESSION['admin'])){
	header("Location: nextgenadminx/ ");
	exit;
}


?>

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
		$password  		= escape($_POST['password']);
		$username  		= escape($_POST['username']);
		$remember_me 	= $_POST['remember-me'].'<br>';

		if (!empty($username) && !empty($password)) {
			$query = "SELECT * FROM users WHERE username = '".$username."'";
			$select = mysqli_query($connection, $query);
			$row = mysqli_num_rows($select);
			if ($row > 0) {
				$userData = mysqli_fetch_array($select);
                 $db_password = base64_decode($userData['password']);
				if ($password === $db_password && $username === $userData['username']) {
					$str = $username.$userData['name'].RandomToken().uniqid();
					$cookie_value = crypt($str,'$2a$09$gd$3yvdu56&h#fd6d^c676$');
					if (isset($remember_me)) {
						
						$query = "UPDATE users SET remember_me = '$cookie_value' WHERE username = '$username'";
						mysqli_query($connection, $query);
						setcookie("userLogin", $cookie_value, time()+864000);
						
					}
					
					$token =  hash('ripemd160', $cookie_value);
					 $_SESSION['token'] = $token;
					
					$_SESSION['userData'] = $userData;
					$_SESSION['userData']['email'] = $username;

					header("Location: welcome.php");
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
		if(isset($_COOKIE['userLogin'])) {
			$cookie_value = $_COOKIE['userLogin'];
			
   	 		$query = "SELECT * FROM users WHERE remember_me = '$cookie_value'";
   	 		$select = mysqli_query($connection, $query);
   	 		$num_rows = mysqli_num_rows($select);
   	 		if ($num_rows > 0 && $num_rows < 2) {
   	 			$userData = mysqli_fetch_array($select);
  	   	 		$_SESSION['userData'] = $userData;
	   	 		header("Location: welcome.php");
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
		<div class="container-login100 " style="background-image: url('login/images/bg-01.jpg');">
			<div class="row">
				<div class="col-md-6 text-center">
					<div class=" mb-0 pb-4 ">
			            <div class="text-center">
			                <img class="img-fluid" style="height: 175px;  background-color: #ffffff; border-radius: 50%; background: transparent;" src="img/gbulogo.png" alt="">
			                <br><br>
			                <h3 class="font-weight-normal font-italic">Welcome to Gautam Buddha University's Website Council</h3>
			            </div>
			            <hr class="mx-auto" style="width: 90%; border-width: 3px;border-radius: 10%; border-color: #ff4500">
			        </div>
                    <div class="py-2">
                        <a class="btn py-1 bg-success text-white" href='http://mukulrai.in/view.php?view=home&id=10243654' >Before uploading data please see all the details about the form structure.</a>
                    </div> <br>
                    <div class="py-2">
                        <a class="btn btn-danger" href='view.php' >View Submissions</a>
                    </div>

				</div>
				<div class="col-md-6 align-content-center">
					<div class="wrap-login100 zxcvb">
						<form class="login100-form validate-form my0" action="" method="post">
							<span class="login100-form-logo">
								<img class="img-fluid" width="100%" src="img/teacher.png" alt="">
							</span>

							<span class="login100-form-title p-b-34 p-t-27">
								Log in
							</span>

							<div class="wrap-input100 validate-input" data-validate = "Enter username">
								<input class="input100" type="email" name="username" placeholder="Username" minlength="6">
								<span class="focus-input100" data-placeholder="&#xf207;"></span>
							</div>

							<div class="wrap-input100 validate-input" data-validate="Enter password">
								<input class="input100" type="password" name="password" placeholder="Password" minlength="6">
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
                            <br>
                            <div class="container-login100-form-btn text-white" style="border-radius: 20px;">
								If you forgot your password please email us to 17ics057@gbu.ac.in OR  17ics055@gbu.ac.in with username.
							</div>
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
</body>
</html>