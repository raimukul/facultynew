<?php include "includes/header.php" ?>

<?php  
  if (isset($_POST['submit']) && isset($_SESSION['userData']) && isset($_SESSION['token'])) {
    $username = $_SESSION['userData']['username'];
    $research = escape($_POST['research']);
    $query = "UPDATE teacherdata SET research = '$research' WHERE username = '$username'";
    $select_query = mysqli_query($connection, $query);
    if (!$select_query) {
     echo '<div class="bg-danger text-center p-3 text-white "><h4>*error Something went wrong. Please inform to developers at ncmaurya99@gmail.com with screenshots </h4></div>';
    }
  }
?>

    <div class="site-wrap">
        <?php include "includes/head.php" ?> 

        <div class="jumbotron mt-0 pt-0">
            <div class="container">
                <div class="row text-left">
                    <?php include "includes/navigation.php" ?>

                    <div class="col-md-9">
                        <div id="maincontent">
                            <form action="" method="post">
                            <div id="content">
                                <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                    <h5 class="ml-3">Research</h5>
                                </div><br><br>
                                <?php 
                                        if ($row['research'] == null) {?>
                                            <textarea class="form-control" name="research" id="" cols="20" rows="30">
                                                <div class="font-weight-normal" style="color: #ffff; background-color:#FB8C00; padding: 5px 0px; ">
                                                    <h5 class="ml-3">Topic</h5>
                                                </div><br>
                                                ----->


                                            </textarea><br>
                                            <a class="btn btn-primary float-left" href="teaching.php"><- Prev</a> <br><br>
                                            <input type="submit" value="Submit" name="submit" class="btn-danger btn form-control"><br>
                                            <br>
                                        <?php } else{?>

                                            <p class="text-justify"> 
                                           <textarea class="form-control" name="research" id="" cols="20" rows="30">
                                                    <?php echo $row['research'] ?>
                                            </textarea><br>
                                            </p>
                                            <a class="btn btn-primary float-left" href="teaching.php"><- Prev</a>
                                            <a class="btn btn-primary float-right" href="publications.php">Next -></a>
                                                <br><br>
                                            <input type="submit" name="submit" class="btn btn-success form-control" value="Update">

                                        <?php }
                                    ?>
                            </div>
                            </form>
                            </div>
                            <!-- maincontent -->
                            <div id="footer">
                                <div class="superfooter"></div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include "includes/footer.php" ?>