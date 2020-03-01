<?php include "includes/header.php" ?>
<?php  $books=$patents=$journals=$conference_proceeding=null;
  if (isset($_POST['submit']) && isset($_SESSION['userData'])) {
    $username = $_SESSION['userData']['username'];
    $books = escape($_POST['books']);
    $patents = escape($_POST['patents']);
    $journals = escape($_POST['journals']);
    $conference_proceeding = escape($_POST['conference_proceeding']);
    $query = "UPDATE teacherdata SET books ='$books', patents = '$patents', journals = '$journals', conference_proceeding = '$conference_proceeding' WHERE username = '$username'";
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
                        <div id="maincontent">
                            <form action="" method="post">
                                <div id="content">
                                
                                    <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                        <h5 class="ml-3">Book</h5>                                    
                                    </div><br>
                                    <?php 
                                        if ($row['books'] == null) {?>
                                            <textarea class="form-control" name="books" id="" cols="20" rows="10"></textarea><br>
                                            
                                        <?php } else{?>

                                            <p class="text-justify"> 
                                           <textarea class="form-control" name="books" id="" cols="20" rows="10">
                                                    <?php echo $row['books'] ?>
                                            </textarea><br>
                                            </p>
                                            
                                            

                                        <?php }
                                     ?>
                                    
                                    <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                        <h5 class="ml-3">Patents</h5>
                                    </div><br>
                                    <?php 
                                        if ($row['patents'] == null) {?>
                                            <textarea class="form-control" name="patents" id="" cols="20" rows="10"></textarea><br>
                                            
                                        <?php } else{?>

                                            <p class="text-justify"> 
                                           <textarea class="form-control" name="patents" id="" cols="20" rows="10">
                                                    <?php echo $row['patents'] ?>
                                            </textarea><br>
                                            </p>
                                        <?php }
                                     ?>
                                    
                                    
                                    <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                        <h5 class="ml-3">Journals</h5>
                                    </div> <br>
                                    <?php 
                                        if ($row['journals'] == null) {?>
                                            <textarea class="form-control" name="journals" id="" cols="20" rows="10"></textarea><br>
                                           
                                        <?php } else{?>

                                            <p class="text-justify"> 
                                           <textarea class="form-control" name="journals" id="" cols="20" rows="10">
                                                    <?php echo $row['journals'] ?>
                                            </textarea><br>
                                            </p>

                                        <?php }
                                     ?>
                                    
                                    <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                        <h5 class="ml-3">Conference Proceedings</h5>
                                    </div><br>
                                    <?php 
                                        if ($row['conference_proceeding'] == null) {?>
                                            <textarea class="form-control" name="conference_proceeding" id="" cols="20" rows="10"></textarea><br>
                                             <a class="btn btn-primary float-left" href="research.php"><- Prev</a>
                                            <br>
                                            <input type="submit" name="submit" class="btn btn-danger form-control"><br>
                                            
                                        <?php } else{?>

                                            <p class="text-justify"> 
                                           <textarea class="form-control" name="conference_proceeding" id="" cols="20" rows="10">
                                                    <?php echo $row['conference_proceeding'] ?>
                                            </textarea><br>
                                            </p>
                                            <a class="btn btn-primary float-left" href="researchs"><- Prev</a>
                                            <a class="btn btn-primary float-right" href="students">Next -></a>
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
<?php include "includes/footer.php" ?>

        
    