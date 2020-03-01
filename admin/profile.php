
<?php include "include/header.php" ?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "include/navigation.php"; ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>:- <?php if (isset($_SESSION['userData'])) {echo $_SESSION['userData']['name'];} ?></small>
                        </h1>
                    </div>
                </div>

                <!-- /.row -->
                                
                <div class="row">
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
                                            <img class="img-thumbnail profile-image mx-auto d-block rounded" width="200" style="max-height: 230px;" src="../images/<?php echo $image; ?>" alt="<?php echo $image; ?>">
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="row header-profile head-title text-left">
                                                <div class="col-12 ">
                                                    <h1 style="color: #49B5AF; font-size: 40px;"><?php echo $name; ?></h1>
                                                </div>
                                                <div class="col-12 text-left head-title">
                                                    
                                                   <h4><?php echo $position; ?></h4>
                                                    <h6><?php echo $school; ?><br>
                                                    <?php echo $qualification; ?></h6>
                                                    <h6><?php echo $field_of_teaching; ?></h6>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 gbulogoonpage text-center">
                                    <img class="img-fluid " width="200" src="../img/gbulogo.png" alt="">
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                 <!-- /.row -->
                 <?php 
                    $query = "SELECT id FROM teacherdata WHERE username = '".$_SESSION['userData']['username']."'";
                    $select_query  = mysqli_query($connection,$query);
                    $xid = mysqli_fetch_array($select_query);
                 ?>
                 <div class="row text-center">
                     <a class="btn form-control btn-success" href="../view.php?view=home&id=<?php echo $xid['id']?>">View Your Profile</a> 
                 </div><br>
                 <div class="row text-center">
                     <a class="btn form-control btn-danger" href="../head_form.php?edit=<?php echo $xid['id']; ?>">Edit</a> 
                 </div>  <hr>   
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "include/footer.php" ?>
