
    <div class="site-wrap">
        
        <?php   include "head.php"; ?>

        <div class="jumbotron mt-0 pt-0">
            <div class="container">
                <div class="row text-left">

                        <?php   include "navigation.php" ?>

               

                    <div class="col-md-9">
                        <div id="maincontent">
                        <div class="roundbannertop"><div></div></div>
                        <!--    <div></div>-->
                        <!--    <div></div>-->
                        
                        <div id="content">
                            <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                <h5 class="ml-3">Current Courses - Session <?php echo date('Y'); ?></h5>
                            </div>
                            
                            <?php echo $row['current_course']; ?>
                            <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                <h5 class="ml-3">Planned Courses</h5>
                            </div>
                                <?php echo $row['planned_course']; ?>
                            <br>
                            <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                <h5 class="ml-3">Past Courses</h5>
                            </div>
                                <?php echo $row['past_course']; ?>
                             <br>
                            
                            </div><!-- Content -->
                            <div class="roundbannerbottom"><div></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

