
<?php session_start(); ?>
<?php 
	//Include GP config file

	//Unset token and user data from session
	unset($_SESSION['token']);
	unset($_SESSION['admin']);

	//Reset OAuth access token
    session_destroy();
	//Destroy entire session
	
	setcookie('admin', "", 1);
	//Redirect to homepage
	header("Location: ../index.php");
    
?>
