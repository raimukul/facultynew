<?php include "../includes/db.php"; ?>
<?php 

if (isset($_POST['get'])) {

	$username = escape($_POST['username']);

	if (!empty($username)) {
		$query = "SELECT username, name FROM users WHERE username = '".$username."'";
		$select = mysqli_query($connection, $query);
		$row = mysqli_num_rows($select);
		if ($row > 0) {
			$userData = mysqli_fetch_array($select);
			$otp = rand(1000,9999);

			$to = "fobaji1133@clsn1.com"; 

			// Subject
			$subject = 'GBU data form password resetting.';

			// Message
			$message = 'edrcftvgyhuijok';

			// To send HTML mail, the Content-type header must be set
			$headers[] = 'MIME-Version: 1.0';
			$headers[] = 'Content-type: text/html; charset=iso-8859-1';

			// Additional headers
			$headers[] = 'To: '.$userData['name'].'<'.$username.'>';
			$headers[] = 'From: GBU | Website Council <noreply@webc.in>';

			// Mail it
			mail($to, $subject, $message, implode("\r\n", $headers));
		}
	}
} else{
	//header("Location: login");
}
			
echo "Hello";

 ?>
