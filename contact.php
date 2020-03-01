<?php include "includes/header.php" ?>
<?php  $correspondence_phone_number=$correspondence_email=$contact_information=$contact_phone_number=$contact_email=$correspondence_address=null;
  if (isset($_POST['submit']) && isset($_SESSION['userData'])) {
    $username = $_SESSION['userData']['username'];
    $contact_information = escape($_POST['contact_information']);
    $contact_phone_number = escape($_POST['contact_phone_number']);
    $contact_email = escape($_POST['contact_email']);

    $correspondence_address = escape($_POST['correspondence_address']);
    $correspondence_phone_number = escape($_POST['correspondence_phone_number']);
    $correspondence_email = escape($_POST['correspondence_email']);
    
    $query = "UPDATE teacherdata SET contact_information ='$contact_information', contact_phone_number = '$contact_phone_number', contact_email = '$contact_email', correspondence_address = '$correspondence_address',  correspondence_phone_number = '$correspondence_phone_number', correspondence_email = '$correspondence_email' WHERE username = '$username'";
        $job = mysqli_query($connection, $query);
        if (!$job) {
                echo "". mysqli_error($connection);
            }    
  }
?>

<!-- teachersdata -->
    <div class="site-wrap">
        <?php include "includes/head.php" ?> 

        <div class="jumbotron mt-0 pt-0">
            <div class="container">
                <div class="row text-left">
                    <?php include "includes/navigation.php" ?>

                    <div class="col-md-9">
                        <div id="maincontent">
                            <form action="" method = "post">
                                <?php if ($row['contact_information'] =='' && $row['contact_phone_number'] == 0 && $row['contact_email'] == '' && $row['correspondence_address'] == '' &&  $row['correspondence_phone_number'] == 0 && $row['correspondence_email'] == '') { ?>
                                    
                                    <div id="content">
                                    <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                       <h5 class="ml-3">Contact Information</h5>
                                    </div> <br>

                                        <textarea id="editor1" class="form-control" name="contact_information"  cols="30" rows="10" placeholder="Enter Address"></textarea><br>

                                        <label for="contact_phone_number"><b>Phone Number</b></label>
                                        <input class="form-control" type="tel"  name="contact_phone_number"  placeholder="+91 9420154521"><br>
                                        <label for="email"><b>Email</b></label>
                                        <input class="form-control" type="email" name="contact_email" placeholder="example@gbu.ac.in">
                                        <br>
                                        <br>


                                        <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                           <h5 class="ml-3">Correspondence Address</h5>
                                        </div>
                                        <br>

                                        <textarea id="editor2" class="form-control" name="correspondence_address"  cols="30" rows="10" placeholder="Enter Address"></textarea>
                                         <br>

                                        <label for="mobile_number"><b>Phone number</b></label>
                                        <input class="form-control" type="tel" name="correspondence_phone_number"  placeholder="+91 9420154522"><br>

                                        <label for="correspondence_email"><b>Email</b></label>
                                        <input class="form-control" type="email" name="correspondence_email" placeholder="example@gbu.ac.in">       
                                    </div><br>
                                    
                                    <a class="btn btn-primary float-left" href="students.php"><- Prev</a><br><br>
                                    <input class="btn btn-danger form-control" value="Submit" type="submit" name="submit" >


                                <?php  } else{ ?>
                                            
                                    <div id="content">
                                    <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                       <h5 class="ml-3">Contact Information</h5>
                                    </div><br>

                                        <textarea id="editor1" class="form-control" name="contact_information" cols="30" rows="10" placeholder="Enter Address">
                                            <?php echo $row['contact_information']; ?>
                                        </textarea>
                                         <br>

                                        <label for="contact_phone_number"><b>Phone Number</b></label>
                                        <input class="form-control" type="tel" name="contact_phone_number"  placeholder="+91 9420154521" value="<?php echo $row['contact_phone_number']; ?>"><br>

                                        <label for="email"><b>Email</b></label>
                                        <input class="form-control" type="email" name="contact_email" placeholder="example@gbu.ac.in" value="<?php echo $row['contact_email']; ?>">
                                        <br>

        <!-- corespondence Address-->                               
                                         <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                           <h5 class="ml-3">Correspondence Address</h5>
                                        </div>
                                        <br>


                                        <textarea id="editor2" class="form-control" name="correspondence_address"  cols="30" rows="10" placeholder="Enter Address">
                                            <?php echo $row['correspondence_address']; ?>"
                                        </textarea>
                                         <br>

                                        <label for="mobile_number"><b>Phone number</b></label>
                                        <input class="form-control" type="tel" name="correspondence_phone_number"  placeholder="+91 9420154522" value="<?php echo $row['correspondence_phone_number']; ?>"><br>

                                        <label for="correspondence_email"><b>Email</b></label>
                                        <input class="form-control" type="email" name="correspondence_email" value="<?php echo $row['correspondence_email']; ?>" placeholder="example@gbu.ac.in">          
                                    </div><br>
                                    <a class="btn btn-primary float-left" href="students.php"><- Prev</a>
                                    <a class="btn btn-primary float-right" href="welcome.php">HOME</a><br><br>

                                    <input class="btn btn-success form-control" type="submit" name="submit"  value="Update">

                                <?php }?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include "includes/footer.php" ?>
