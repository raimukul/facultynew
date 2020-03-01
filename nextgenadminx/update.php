<?php include "include/header.php" ?>

<?php 

if (isset($_GET['delete']) && isset($_SESSION['admin'])) {
    $del_id         =   escape($_GET['delete']);
    $t_deta         =   "SELECT image FROM teacherdata WHERE username = '$del_id'";
    $select         =   mysqli_query($connection, $t_deta);
    $t_detaimg      =   mysqli_fetch_array($select);
    $t_deta         =   "DELETE FROM teacherdata WHERE username = '$del_id'";
    $t_deta2        =   "DELETE FROM users WHERE username = '$del_id'";
    $t_deta         =   mysqli_query($connection, $t_deta);
    $t_deta2        =   mysqli_query($connection, $t_deta2);
    if ($t_deta && $t_deta) {
        $path = "../images/".$t_detaimg['image'];
         unlink($path);
        header("Location: index.php");
    }
}

?>