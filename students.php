<?php include "includes/header.php" ?>

<?php  

  if (isset($_POST['submit']) && isset($_SESSION['userData'])) {
    $username = $_SESSION['userData']['username'];
    $phd_students = escape($_POST['phd_students']);
    $m_b_tech_students = escape($_POST['m_b_tech_students']);
    $graduated_students = escape($_POST['graduated_students']);
    $research_assistants = escape($_POST['research_assistants']);
    $summer_interns = escape($_POST['summer_interns']);
    $independent_studies = escape($_POST['independent_studies']);
    $query = "UPDATE teacherdata SET phd_students= '$phd_students', m_b_tech_students= '$m_b_tech_students', graduated_students = '$graduated_students', research_assistants = '$research_assistants', summer_interns = '$summer_interns', independent_studies ='$independent_studies' WHERE username = '$username'";
    mysqli_query($connection, $query);
    //echo "string" . mysqli_error($connection);
  } else{
    $phd_sudents=$m_b_tech_students=$graduated_students=$research_assistents=$summen_interns=$independent_studies = NULL;
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
                            
                        <div id="content">
                            <form action="" method="post">
                            <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                <h5 class="ml-3">PhD Students</h5>
                            </div><br>
                                 <?php 
                                    if ($row['phd_students'] == null) {?>
                                        <textarea class="form-control" name="phd_students" id="" cols="20" rows="10"></textarea><br>
                                        
                                    <?php } else{?>

                                        <p class="text-justify"> 
                                           <textarea class="form-control" name="phd_students" id="" cols="20" rows="10">
                                                    <?php echo $row['phd_students'] ?>
                                            </textarea><br>
                                            </p>

                                    <?php }
                                 ?> 
                                        
                                    <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                       <h5 class="ml-3">MTech & BTech Students</h5>
                                    </div>
                                    <br><?php 
                                        if ($row['m_b_tech_students'] == null) {?>
                                            <textarea class="form-control" name="m_b_tech_students" id="" cols="20" rows="10"></textarea><br>
                                            
                                           
                                        <?php } else{?>

                                            <p class="text-justify"> 
                                           <textarea class="form-control" name="m_b_tech_students" id="" cols="20" rows="10">
                                                    <?php echo $row['m_b_tech_students'] ?>
                                            </textarea><br>
                                            </p>

                                        <?php }
                                     ?>
                                    
                                    <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                        <h5 class="ml-3">Graduated Students</h5>
                                    </div>   <br>
                                    <?php 
                                        if ($row['graduated_students'] == null) {?>
                                            <textarea class="form-control" name="graduated_students" id="" cols="20" rows="10"></textarea><br>
                                            
                                        <?php } else{?>

                                            <p class="text-justify"> 
                                           <textarea class="form-control" name="graduated_students" id="" cols="20" rows="10">
                                                    <?php echo $row['graduated_students'] ?>
                                            </textarea><br>
                                            </p>

                                        <?php }
                                     ?>
                                        
                             <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                <h5 class="ml-3">Research Assistant</h5>
                            </div> <br><?php 
                                        if ($row['research_assistants'] == null) {?>
                                            <textarea class="form-control" name="research_assistants" id="" cols="20" rows="10"></textarea><br>
                                            
                                        <?php } else{?>

                                            <p class="text-justify"> 
                                           <textarea class="form-control" name="research_assistants" id="" cols="20" rows="10">
                                                    <?php echo $row['research_assistants'] ?>
                                            </textarea><br>
                                            </p>

                                        <?php }
                                     ?>
                                    
                                    <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                        <h5 class="ml-3">Summer Interns</h5>
                                    </div><br>
                                    <?php 
                                        if ($row['summer_interns'] == null) {?>
                                            <textarea class="form-control" name="summer_interns" id="" cols="20" rows="10"></textarea><br>
                                            
                                            
                                        <?php } else{?>

                                            <p class="text-justify"> 
                                           <textarea class="form-control" name="summer_interns" id="" cols="20" rows="10">
                                                    <?php echo $row['summer_interns'] ?>
                                            </textarea><br>
                                            </p>

                                        <?php }
                                     ?>
                                 
                                    <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                        <h5 class="ml-3">Independent Studies and Projects</h5>
                                    </div><br>
                                    <?php 
                                        if ($row['independent_studies'] == null) {?>
                                            <textarea class="form-control" name="independent_studies" id="" cols="20" rows="10"></textarea><br>
                                            
                                        <a class="btn btn-primary float-left" href="publications.php"><- Prev</a><br><br>
                                            <input class="btn form-control btn-danger" value="Submit" type="submit" name="submit">
                                        <?php } else{?>

                                            <p class="text-justify"> 
                                           <textarea class="form-control" name="independent_studies" id="" cols="20" rows="10">
                                                    <?php echo $row['independent_studies'] ?>
                                            </textarea><br>
                                            </p>
                                            <a class="btn btn-primary float-left" href="publications.php"><- Prev</a>
                                            <a class="btn btn-primary float-right" href="contact.php">Next -></a>
                                                <br><br>
                                            <input type="submit" name="submit" class="btn btn-success form-control" value="Update">

                                        <?php }
                                     ?>
                                    
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
    <?php include "includes/footer.php" ?>
