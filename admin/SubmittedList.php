
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
                   <div class="col-12 table-responsive">
                         <table class="table  table-bordered table-hover ">
                             <thead>
                                 <tr>
                                     <th>SN</th>
                                 
                                     <th>Name</th>
                                 
                                     <th>Email</th>
                                 
                                     <th>Image</th>
                                    
                                    <th>School</th>

                                     <th>View</th>
                                 </tr>
                             </thead>
                             <tbody>
                                <?php  //Others data
                                    $query = "SELECT id, username, name, school, image FROM teacherdata ORDER BY id DESC";
                                    $select_query = mysqli_query($connection, $query);
                                     $sn = 0;
                                    while ($row = mysqli_fetch_assoc($select_query)) { ?>

                                        <tr>
                                         <td><?php echo ++$sn; ?></td>
                                         <td><?php echo $row['name']; ?></td>
                                         <td><?php echo $row['username']; ?></td>
                                         <td><img width="100" class="img-thumbnail img-fluid"src="../images/<?php if($row['image'] == ""){ echo 'image.png';} else{ echo $row['image']; } ?>" ></td>
                                         <td><?php echo $row['school']; ?></td>
                                         <td><a class="btn btn-primary" target="_blank" href="../view.php?view=home&id=<?php echo $row['id']?>">View</a></td>
                                        </tr> 
                                   <?php }
                                 ?>
                                 
                             </tbody>
                         </table>
                    </div>
                </div>
                 <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "include/footer.php" ?>
