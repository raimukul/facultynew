<?php include "includes/header.php"; ?>
<?php 
  if (isset($_POST['submit']) && isset($_SESSION['userData'])) {//
    $username = $_SESSION['userData']['username'];
    $biography = escape($_POST['biography']);
    $academics = escape($_POST['academics']);
    $query = "UPDATE teacherdata SET biography = '$biography', academics = '$academics' WHERE username = '$username'";
    mysqli_query($connection, $query);
    header("Location: teaching");

  }
?>
        <div class="site-wrap">
            <?php include "includes/head.php"; ?>
            <div class="jumbotron mt-0 pt-0">
                <div class="container">
                    <div class="row text-left">

                        <?php include "includes/navigation.php" ?>

                        
                        <div class="col-md-9">
                            
                            <div id="maincontent">
                            <div id="content">

                                <form action="" method = "post">
                                <div class="current-cource">
                                    <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                        <h5 class="ml-3">Biography</h5>
                                    </div><br>
                                    <?php 
                                        if ($row['biography'] == null) {?>
                                            <textarea class="form-control" name="biography" id="" cols="20" rows="10"></textarea><br>
                                        <?php } else{?>

                                            <textarea class="form-control" name="biography" id="" cols="20" rows="10">
                                                <?php echo $row['biography']; ?>
                                            </textarea><br>

                                        <?php }
                                     ?>
                                    
                                    
                                <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                        <h5 class="ml-3">Academics</h5>
                                </div><br>
                                    <?php 
                                        if ($row['academics'] == null) {?>
                                            <textarea class="form-control" name="academics" id="" cols="30" rows="10"></textarea><br>
                                            <a class="btn btn-primary float-left" href="head_form.php?edit=<?php echo $row['id']; ?>"><- Prev</a><br><br>
                                            <input type="submit" name="submit" class="brn btn-danger form-control" value="Submit">
                                        <?php } else{ ?>
                                            <p class="text-justify"> 
                                           <textarea class="form-control" name="academics" id="" cols="20" rows="10">
                                                    <?php echo $row['academics'] ?>
                                            </textarea><br>
                                        </p>
                                        <a class="btn btn-primary float-left" href="head_form.php?edit=<?php echo $row['id']; ?>"><- Prev</a>
                                        <input type="submit" name="submit" class="btn btn-primary float-right" value="Next->">
                                            <br><br>
                                        <input type="submit" name="submit" class="btn btn-success form-control" value="Update">
                                        <?php }
                                     ?>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>
    
        
    