<?php include "includes/header.php"; ?>

<?php $img_massage = "";
    if (isset($_POST['submit'])  && isset($_SESSION['userData']) &&  isset($_SESSION['token'])) {
        $username = $_SESSION['userData']['username'];

        $user_image         = $_FILES['user_image']['name'];
        $user_image_temp    = $_FILES['user_image']['tmp_name'];
        $name               = escape($_POST['name']);
        $position           = escape($_POST['position']);
        $school             = escape($_POST['school']);
        $qualification      = escape($_POST['qualification']);
        $field_of_teaching  = escape($_POST['field_of_teaching']);

        $img_massage = "";
        if (!empty($name) && !empty($user_image) && !empty($position) && !empty($school) && !empty($qualification) && !empty($field_of_teaching)) {
            
            $ext = pathinfo($user_image, PATHINFO_EXTENSION);

            if ($ext == 'jpg' || $ext ==  'png' || $ext == 'jpeg') {
                $image_name = $name.$username.'.'.$ext;
                move_uploaded_file($user_image_temp, "images/$image_name");
                $_SESSION['img'] = $user_image;
                
            }else{
                $img_massage = "Image formate should be of <b>*jpg, *png, *jpeg</b> <br> Reupload image";
            }
            
            $query = "UPDATE teacherdata SET name = '$name', position = '$position', school = '$school', qualification = '$qualification', field_of_teaching = '$field_of_teaching', image = '$image_name' WHERE username = '".$_SESSION['userData']['username']."'";
                $query_user = "UPDATE users SET name = '$name', image = '$image_name' WHERE username = '".$_SESSION['userData']['username']."'";
                $select_query = mysqli_query($connection, $query);
                mysqli_query($connection, $query_user);
                
                if ($select_query) {
                    
                    header('Location: home.php');
                    exit;
                }
        }else{
            echo '<div class="bg-danger text-center p-3 text-white "><h4>All fields should be filled</h4></div>';
        }


    }else if (isset($_GET['edit'])) {
        $db_id = escape($_GET['edit']);
        $query = "SELECT image, name, position, school, qualification, field_of_teaching FROM teacherdata WHERE id = $db_id";
        $query_job = mysqli_query($connection, $query);
        $row_head = mysqli_fetch_array($query_job);
        $user_image         = $row_head['image'];
        $name               = ($row_head['name']);
        $position           = ($row_head['position']);
        $school             =($row_head['school']);
        $qualification      = ($row_head['qualification']);
        $field_of_teaching  = ($row_head['field_of_teaching']);
       
    } else{
        $query = "SELECT image, name, position, school, qualification, field_of_teaching FROM teacherdata WHERE username = '".$_SESSION['userData']['username']."'";
        $query_job = mysqli_query($connection, $query);
        $row_head = mysqli_fetch_array($query_job);
        $image              = $row_head['image'];
        $name               = ($row_head['name']);
        $position           = ($row_head['position']);
        $school             =($row_head['school']);
        $qualification      = ($row_head['qualification']);
        $field_of_teaching  = ($row_head['field_of_teaching']);
        if (!empty($name) && !empty($image) && !empty($position) && !empty($school) && !empty($qualification) && !empty($field_of_teaching)) {
            header("Location: home.php");
            exit;
        }
        
    }
 ?>
<div class=" bg-warning">
        <div class="container p-3">
        Image HEIGHT and WIDTH ratio should be 2*2.5. Better  width = 200px and height = 250px;
        </div>
</div>
<div class="jumbotron pt-2 mb-0">

    <div class="container">
            <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                
                    <div class="col-sm-4 text-center">
                        <img class="img-thumbnail profile-image mx-auto d-block rounded" width="200" src="
                        <?php if(isset($user_image)){
                        	echo  'images/'.$user_image;
                        } else{
                        	echo  'img/test.jpg';
                        }?>" alt="">
                        <input class="form-control" type="file" name="user_image">
                        <p class="text-danger">
                            Image type *jpg, *png, *jpeg <br>
                            <?php echo "$img_massage"; ?>
                        </p>
                    </div>
                    <div class="col-sm-8">
                        <div class="row header-profile text-left">
                            <div class="col-12 head-title">
                                <h3 style="color: #49B5AF; font-size: 30px;">
                                    <input style="color: #49B5AF; font-size: 40px;" class="form-control text-capitalize" type="text" name="name" placeholder="Your Name" value="<?php echo $name; ?>">
                                </h3>
                            </div>
                            <div class="col-12 head-title">
                               <h4><input  class="form-control"  type="text" name="position" placeholder="Position e.g Assistant Professor (Department of ...?..)" value="<?php echo $position;?>"></h4>
                                <h6>
									<select class="form-control" name="school">
										<option class="text-center" value="">------------------Select School------------------</option>
										<option value="University School Of Information And Communication Technology" <?php if ($school == 'University School Of Information And Communication Technology') { echo 'selected';} ?>>University School of Information and Communication Technology</option>
										<option value="University School Of Management"  <?php if ($school == 'University School Of Management') { echo 'selected';} ?>>University School of Management</option>
										<option value="University School Of BioTechnology" <?php if ($school == 'University School Of BioTechnology') { echo 'selected';} ?>>University School of BioTechnology</option>
										<option value="University School Of Engineering" <?php if ($school == 'University School Of Engineering') { echo 'selected';} ?>>University School of Engineering</option>
										<option value="University School Of Buddhist Studies & Civilization" <?php if ($school == 'University School Of Buddhist Studies & Civilization') { echo 'selected';} ?>>University School of Buddhist Studies and Civilization</option>
										<option value="University School Of Vocational Studies & Applied Sciences" <?php if ($school == 'University School Of Vocational Studies & Applied Sciences') { echo 'selected';} ?>>University School of Vocational Studies and Applied Sciences</option>
										<option value="University School Of Humanities & Social Sciences" <?php if ($school == 'University School Of Humanities & Social Sciences') { echo 'selected';} ?>>University School of Humanities & Social Sciences</option>
										<option value="University School Of Low, Justice & Governance"  <?php if ($school == 'University School Of Low, Justice & Governance') { echo 'selected';} ?>>University School of Law, Justice and Governance</option>
									</select>
                                </h6>
                                <h6><input  class="form-control"  type="text" name="qualification" placeholder="PhD(2012), Computer Engineering, Nanyang Technological University, Singapore" value="<?php echo $qualification; ?>"></h6>
                                <h6><input  class="form-control"  type="text" name="field_of_teaching" placeholder="Feild of teaching e.g- IC Technology/Design, Microwave & Antenna, RF MEMS, Analog/Digital/RF Circuits." value="<?php echo $field_of_teaching; ?>"></h6>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
                   
            <div class="col-md-4 gbulogoonpage text-center">
                <img class="img-fluid " width="200" src="img/gbulogo.png" alt="">
                
            </div>
            <div class=" bg-warning">
                <div class="container p-3">
                    **NOTE:- Everytime it is compulsory to upload your image.
                </div>
            </div>
             <input type="submit" name="submit" class="btn btn-success form-control" value="submit">
            
        </div>
    </form>
    <br>
    
    </div>
</div>
    <hr>
 <?php include "includes/footer.php" ?>