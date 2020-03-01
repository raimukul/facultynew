
<?php session_start(); ?>
<?php 

			$_SESSION['username'] = null;
			$_SESSION['name'] = null;
			$_SESSION['user_id'] = null;

			header("Location: ../index.php");
			exit;
 ?>