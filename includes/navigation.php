<?php 
    $username = $_SESSION['userData']['username'];
    $query = "SELECT * FROM teacherdata WHERE username = '$username'";
    $select_query = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($select_query);
    echo mysqli_error($connection);
  
 ?>
 <?php 
  if (isset($_POST['update_submit']) && isset($_SESSION['userData'])) {
    $username = $_SESSION['userData']['username'];
    $submit_updates = escape($_POST['value_update']);
    $query = "UPDATE teacherdata SET updates = '$submit_updates' WHERE username = '$username'";
    mysqli_query($connection, $query);
  }
  ?>


<div class="col-md-3">
  <div class="text-center profesh" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
    <h5 class="">Professional</h5>
  </div>
    <nav class="navbar profesh-2 navbar-expand-lg navbar-light bg-light">
      <div class="text-center   navbar-toggler" style="color: #ffff;  padding: 5px 10px; ">
      <h5 class="">Professional</h5>
      </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav" style="display: initial!important;;">
            <li class="nav-item ">
              <a class="nav-link" href="home.php">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="teaching.php">Teaching</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="researchs.php">Research</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="publications.php">Publications</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="students.php">Students</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
     </nav>
      <div class="text-center mt-2" >
      <div style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
          <h5 class="">Updates</h5>
      </div>
      <div class="container p-2" >
          <p align="left">
            <form action="" method="post">

            <?php 
                if ($row['updates'] == NULL) {
                  ?>
                    <textarea class="form-control" name="value_update" id="" cols="30" rows="10">
                      
                    </textarea><br>
                    <!-- <input type="submit" name="update_submit" class="form-control btn btn-danger"> -->
            <?php }else{ 

                      ?> 
                    <div id="textarea" style="display: none; width: 100%;">
                   <textarea   class="form-control" name="value_update" id="" cols="10" rows="10"><?php echo $row['updates'] ?></textarea><br>
                   <!-- <input type="submit" name="update_submit" class="form-control btn btn-success" value="Update">-->
                  </div><br>
                    <!--<botton id="updates_edit" onClick="show()" class="btn btn-primary float-right">Edit Updates</botton> -->
                  <br>
                  <marquee direction="up" behavior="scroll" scrollamount="3" onmouseover="this.stop()" onmouseout="this.start()">
                        <font size="3">
                          <div align="text-left">
                              <font color="red">
                                <?php echo $row['updates'] ?>
                              </font>
                          </div>
                      </font>
                  </marquee>
                  <script>
                    function show(){
                      var doc = document.getElementById('textarea');
                      
                      if (doc.style.display =='none') {
                        doc.style.display = 'block';
                      }else{
                        doc.style.display = 'none';
                      }
                    }
                  </script>
                  
                  
                <?php }
                  ?>

              </form>
          </p>
      </div> 
  </div>
</div>