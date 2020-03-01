<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "../includes/db.php" ?>

<?php 
 if (!isset($_SESSION['admin'])){
     header("Location: login.php");
     exit;
} 

	if (isset($_SESSION['admin']) && $_GET['adminedit']) {
		$username = escape($_GET['adminedit']);
		if (!empty($username)) {
			$query = "SELECT * FROM users WHERE username = '".$username."'";
			$select = mysqli_query($connection, $query);
			$row = mysqli_num_rows($select);
			if ($row > 0) {
				$userData = mysqli_fetch_array($select);
				
				if ( $username === $userData['username']) {
					
					$_SESSION['userData'] = $userData;
					$_SESSION['userData']['email'] = $username;

					header("Location: ../welcome.php");
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
	} else {
		header("Location: index.php");
	}
	
 ?>