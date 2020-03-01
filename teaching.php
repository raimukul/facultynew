<?php include "includes/header.php" ?>

<?php  
  if (isset($_POST['submit']) && isset($_SESSION['userData'])) {
    $username = $_SESSION['userData']['username'];
    $current_course = escape($_POST['current_course']);
    $planned_course = escape($_POST['planned_course']);
    $past_course = escape($_POST['past_course']);
    $query = "UPDATE teacherdata SET current_course = '$current_course', planned_course = '$planned_course', past_course = '$past_course' WHERE username = '$username'";
    mysqli_query($connection, $query);
    
  }
?>


    <div class="site-wrap">

        <?php include "includes/head.php" ?> 

        <div class="jumbotron mt-0 pt-0">
            <div class="container">
                <div class="row text-left">

                    <?php include "includes/navigation.php" ?>

                    <div class="col-md-9">
                        <div class="p-3 bg-danger text-white">
                            Please enter all the data in <b>unordered list</b> With course code.
                        </div><br>
                        <div id="maincontent">
                            <form action="" method="post">
                            <div id="content">
                                <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                    <h5 class="ml-3">Current Courses - Session 2019</h5>
                                </div><br><?php 
                                        if ($row['current_course'] == null) {?>
                                            <textarea class="form-control" name="current_course" id="" cols="20" rows="10"></textarea><br>
                                
                                        <?php } else{?>
 
                                                <textarea class="form-control" name="current_course" id="" cols="20" rows="10">
                                                    <?php echo $row['current_course'] ?>
                                                </textarea><br>

                                        <?php }
                                     ?>
                                <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                    <h5 class="ml-3">Planned Courses</h5>
                                </div><br>
                                <?php 
                                    if ($row['planned_course'] == null) {?>
                                        <textarea class="form-control" name="planned_course" id="" cols="20" rows="10"></textarea><br>
                                       
                                    <?php } else{?>

                                        <p class="text-justify"> 
                                            <textarea class="form-control" name="planned_course" id="" cols="20" rows="10">
                                                    <?php echo $row['planned_course'] ?>
                                                </textarea><br>
                                        </p>

                                    <?php }
                                ?>
                                
                                <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                    <h5 class="ml-3">Past Courses</h5>
                                </div><br>
                                <?php 
                                    if ($row['past_course'] == null) {?>
                                        <textarea class="form-control" name="past_course" id="" cols="20" rows="10"></textarea><br>
                                        <a class="btn btn-primary float-left" href="home.php"><- Prev</a><br><br>
                                        <input type="submit" name="submit" value="Submit" class="btn btn-danger form-control">
                                    <?php } else{?>

                                        <p class="text-justify"> 
                                           <textarea class="form-control" name="past_course" id="" cols="20" rows="10">
                                                <?php echo $row['past_course']; ?>
                                            </textarea><br>
                                        </p>
                                        <a class="btn btn-primary float-left" href="home.php"><- Prev</a>
                                        <a class="btn btn-primary float-right" href="researchs.php">Next -></a>
                                            <br><br>
                                        <input type="submit" name="submit" class="btn btn-success form-control" value="Update">
                                            
                                    <?php }
                                ?>
                                
                                </div><!-- Content -->
                                
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
<?php include "includes/footer.php" ?>