<?php 
    
    if (isset($_SESSION['userData'])) {

        $username = $_SESSION['userData']['username'];
        $query = "SELECT * FROM teacherdata WHERE username = '$username'";
        $select_query = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($select_query);

    }
        function progress($x,$y){
            return round(($y/$x)*100);
                            
        }
 ?>

<div class="container">
    
    <div class="row">
        <div class="col-12 card">
            <div class="border-primary">
                <?php
                    $p = 0;
                    for ($x = 10; $x <= 11; $x++) {
                        if ($row[$x] != null) {
                            $p +=1 ;
                        }
                    }
                    $home = progress(2, $p)

                ?>
                <h4> 1. Home Page <small class="bg-success" style="padding: 10px"><?php echo $home .'%'; ?></small></h4>
                <br>
                <progress style="width: 100%" value="<?php echo $home; ?>" class="progress" max="100" min = "0">
                    
                </progress>
                <div class="bg-info " style="padding: 10px 20px;">
                    <a class="btn btn-success" href="../home">Edit</a>
                </div>
            </div><hr><br>
        </div>
        <div class="col-12 card">
            <div class="border-primary">
                <?php
                    $p = 0;
                    for ($x = 12; $x <= 14; $x++) {
                        if ($row[$x] != null) {
                            $p +=1 ;
                        }
                    }
                    $teaching = progress(3, $p)

                ?>
                <h4>2. Teaching Page <small class="bg-success" style="padding: 10px"><?php echo $teaching .'%'; ?></small></h4>
                <br>
                <progress style="width: 100%" value="<?php echo $teaching; ?>" class="progress" max="100" min = "0">
                    
                </progress>
                <div class="bg-info " style="padding: 10px 20px;">
                    <a class="btn btn-success" href="../teaching">Edit</a>
                </div>
            </div><hr><br>
        </div>
        <div class="col-12 card">
            <div class="border-primary">
                <?php
                    $p = 0;
                        if ($row[15] != null) {
                            $p +=1 ;
                        }
                    $research = progress(1, $p)

                ?>
                <h4>3. Research Page <small class="bg-success" style="padding: 10px"><?php echo $research .'%'; ?></small></h4>
                <br>
                <progress style="width: 100%" value="<?php echo $research; ?>" class="progress" max="100" min = "0">
                    
                </progress>
                <div class="bg-info " style="padding: 10px 20px;">
                    <a class="btn btn-success" href="../researchs">Edit</a>
                </div>
            </div><hr><br>
        </div>
        <div class="col-12 card">
            <div class="border-primary">
                <?php
                    $p = 0;
                    for ($x = 16; $x <= 19; $x++) {
                        if ($row[$x] != null) {
                            $p +=1 ;
                        }
                    }
                    $publications = progress(4, $p)

                ?>
                <h4>4. Publications Page <small class="bg-success" style="padding: 10px"><?php echo $publications .'%'; ?></small></h4>
                <br>
                <progress style="width: 100%" value="<?php echo $publications; ?>" class="progress" max="100" min = "0">
                    
                </progress>
                <div class="bg-info " style="padding: 10px 20px;">
                    <a class="btn btn-success" href="../publications">Edit</a>
                </div>
            </div><hr><br>
        </div>
        <div class="col-12 card">
            <div class="border-primary">
                <?php
                    $p = 0;
                    for ($x = 20; $x <= 25; $x++) {
                        if ($row[$x] != null) {
                            $p +=1 ;
                        }
                    }
                    $students = progress(6, $p)

                ?>
                <h4>5. Students Page <small class="bg-success" style="padding: 10px"><?php echo $students .'%'; ?></small></h4>
                <br>
                <progress style="width: 100%" value="<?php echo $students; ?>" class="progress" max="100" min = "0">
                    
                </progress>
                <div class="bg-info " style="padding: 10px 20px;">
                    <a class="btn btn-success" href="../students">Edit</a>
                </div>
            </div><hr><br>
        </div>
        <div class="col-12 card">
            <div class="border-primary">
                <?php
                    $p = 0;
                    for ($x = 26; $x <= 31; $x++) {
                        if ($row[$x] != null) {
                            $p +=1 ;
                        }
                    }
                    $contact = progress(6, $p)

                ?>
                <h4>6. Contact Page <small class="bg-success" style="padding: 10px"><?php echo $contact .'%'; ?></small></h4>
                <br>
                <progress style="width: 100%" value="<?php echo $contact; ?>" class="progress" max="100" min = "0">
                    
                </progress>
                <div class="bg-info " style="padding: 10px 20px;">
                    <a class="btn btn-success" href="../contact">Edit</a>
                </div>
            </div><hr><br>
        </div>
    </div>
</div>