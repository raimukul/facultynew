
<?php include "include/header.php" ?>
 <?php  $conf = null;
if (isset($_GET['edit']) && isset($_SESSION['admin'])) {
    $edit_username = escape($_GET['edit']);
    $query = "SELECT username, password FROM users WHERE username = '$edit_username'";
    $select_query = mysqli_query($connection, $query);
    $array  = mysqli_fetch_array($select_query);
    $password = base64_decode($array['password']);
}

if (isset($_POST['submit']) && isset($_SESSION['admin'])) {
    $password = base64_encode(escape($_POST['password']));
    $query = "UPDATE users SET password = '$password' WHERE username = '$edit_username'";
    $select_query = mysqli_query($connection, $query);
    if ($select_query) {
        $conf = "<h4 class='font-weight-light ' style='color:#ffffff; padding: 10px 0px; margin-left: 20px;'>Password Updated </h3>";
    $password = base64_decode($password);
    }
}
?>


    <div id="wrapper">

        <!-- Navigation -->
        <?php include "include/navigation.php"; ?>
        <div id="page-wrapper">
            <div class="row">
                    
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small>:- <?php if (isset($_SESSION['admin'])) { echo $_SESSION['admin']['name'];
                            
                        } ?></small>
                    </h1>
                </div>
            </div>
           
<div class="container-fluid">
    
    <div class="">
        <form action="" method="post">
            <h3 class="font-weight-light">Change password Of Username: <small><?php echo $array['username'] ?></small></h3>
            <hr>
            <div class=" w-100 " style=" background-color: green; ">
                <?php echo $conf; ?>
            </div>
            <div class="input-group form-group">
                <div class="form-group">
                    <h4 class="font-weight-light">Current password: <?php echo $password; ?></h4> <br>
                    <label for="password">Password</label>
                    <input class="form-control " type="text" name="password" value="<?php echo $password; ?>">
                </div><br><br>
                <div class="form-group">
                    <input onClick="javascript: return confirm('Are you sure want to Reset the Password ?');" class="btn btn-success" type="submit" name="submit">
                </div>
            </div>
            
        </form>
    </div>

</div>
        </div>
    </div>
    <!-- /#wrapper -->
<?php include "include/footer.php" ?>
