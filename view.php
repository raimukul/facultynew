<?php include "view/header.php" ?>


<?php include "includes/navbar.php"; ?>


<?php 

	if (isset($_GET['view']) && $_GET['id'] != ''){ /// GEtting DATA
		$get = escape($_GET['view']);
		$get_id = escape($_GET['id']);
		$query = sprintf("SELECT * FROM teacherdata WHERE id = $get_id");
		$select_query = mysqli_query($connection, $query);
		$row = mysqli_fetch_array($select_query);
		$num_row = mysqli_num_rows($select_query);
		if ($num_row <= 0) {
			
			$get = null;
			$get_id = null; 
		}
} else{
			$get = null;
			$get_id = null; 
		}

 ?>
<?php 


	switch ($get) {
		case 'home':
			include "view/home.php";
			break;
		case 'teaching':
			include "view/teaching.php";
			break;
		case 'researchs':
			include "view/researchs.php";
			break;
		case 'publications':
			include "view/publications.php";
			break;
		case 'students':
			include "view/students.php";
			break;
		case 'contact':
			include "view/contact.php";
			break;
		
		default:
			include "view/list.php";
			break;
	}


 ?>

<?php include "view/footer.php"; ?>