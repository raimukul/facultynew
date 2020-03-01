
<?php include "include/header.php" ?>
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

            <div class="" style="overflow-x: auto">
                
                <div class="col-12 ">
                     <table class="table  table-bordered table-hover ">
                         <thead class="bg-danger" >
                             <tr>
                                 <th>SN</th>
                             
                                 <th>Name</th>
                             
                                 <th>Email</th>
                             
                                 <th>Image</th>
                                
                                <th>School</th>

                                 <th>View</th>

                                 <th>Edit Profile</th>

                                 <th>Password Reset</th>

                                 <th>Delete</th>
                             </tr>
                         </thead>
                         <tbody>
                            <?php  //Others data
                                $query = "SELECT id, username, name, school, image FROM teacherdata ORDER BY id DESC";
                                $select_query = mysqli_query($connection, $query);
                                 $sn = 0;
                                while ($row = mysqli_fetch_assoc($select_query)) { ?>

                                    <tr>
                                        <td>
                                            <?php echo ++$sn; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['name']; ?>
                                                
                                        </td>
                                        <td>
                                            <?php echo $row['username']; ?>
                                                
                                        </td>
                                        <td>
                                            <img width="100" class="img-thumbnail img-fluid"src="../images/<?php if($row['image'] == ""){ echo 'image.png';} else{ echo $row['image']; } ?>" >
                                        </td>
                                        <td class="text-truncate"><?php echo $row['school']; ?>
                                            
                                        </td>
                                        <td>
                                            <a class="btn btn-success" target="_blank" href="../view.php?view=home&id=<?php echo $row['id']?>">View</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger " href="adminedit.php?adminedit=<?php echo $row['username']?>">Edit Profile</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary" href="edit.php?edit=<?php echo $row['username']?>">Reset</a>
                                        </td>
                                        <td>
                                            <a onClick="javascript: return confirm('Are you sure want to Delete ?');" class="btn btn-danger" href="update.php?delete=<?php echo $row['username']?>">Delete</a>
                                        </td>
                                    </tr> 
                               <?php }
                             ?>
                             
                         </tbody>
                     </table>
                </div>            
            </div>
        </div>
    </div>
    <!-- /#wrapper -->
<?php include "include/footer.php" ?>
