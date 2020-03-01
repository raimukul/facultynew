<?php 
    if (!isset($_SESSION['userData'])) {
        header("Location: registration.php");
        exit;
    }
    $username = $_SESSION['userData']['username'];
    $query = "SELECT name, position, school, qualification, field_of_teaching, image FROM teacherdata WHERE username = '$username'";
    $select_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_query)) {
        $image              = $row['image'];
        $name               = $row['name'];
        $position           = $row['position'];
        $school             = $row['school'];
        $qualification      = $row['qualification'];
        $field_of_teaching  = $row['field_of_teaching'];
    }
    

    
 ?>
<div class="jumbotron pt-2 mb-0">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <img class="img-thumbnail img-fluid profile-image mx-auto d-block rounded" width="200" style="max-height: 280px;" src="images/<?php echo $image; ?>" alt="<?php echo $image; ?>">
                    </div>
                    <div class="col-sm-8">
                        <div class="row header-profile head-title text-left">
                            <div class="col-12 ">
                                <h1 class="text-capitalize" style="color: #49B5AF; font-size: 40px;"><?php echo $name; ?></h1>
                            </div>
                            <div class="col-12 text-left head-title">
                                
                               <h4 class="text-capitalize"><?php echo $position; ?></h4>
                                <h6><?php echo $school; ?><br>
                                <?php echo $qualification; ?></h6>
                                <h6 class="text-capitalize"><?php echo $field_of_teaching; ?></h6>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 gbulogoonpage text-center">
                <img class="img-fluid " width="200" src="img/gbulogo.png" alt="">
            </div>
        </div>
    </div>
    <hr>
</div>