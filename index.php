<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "includes/db.php" ?>


<?php 
    
   if(isset($_COOKIE['userLogin'])) {
        $cookie_value = $_COOKIE['userLogin'];
        $query = "SELECT * FROM users WHERE remember_me = '$cookie_value'";
        $select = mysqli_query($connection, $query);
        $num_rows = mysqli_num_rows($select);
        if ($num_rows > 0 && $num_rows < 2) {
            $userData = mysqli_fetch_array($select);
            $_SESSION['userData'] = $userData;
            header("Location: welcome");
            exit;
        }
    }
    if (!isset($_SESSION['userData']) && !isset($_SESSION['token'])){
        header("Location: login");
        exit;
    }else{
        header("Location: welcome");
    }

    

 ?>