
<?php session_start(); ?>
<?php 
	
	
	//Redirect to homepage
	if (isset($_SESSION['admin'])) {
		$_SESSION['userData'] = null;
		unset($_SESSION['userData']);
		header("Location: nextgenadminx/index.php");
		exit;
	} else {
		setcookie('userLogin', "", 1);
		unset($_SESSION['token']);
		unset($_SESSION['userData']);
		session_destroy();
		header("Location: index.php");
	}
	
    
?>
