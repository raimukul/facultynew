

    <div class="site-wrap">

        <?php   include "head.php"; ?>
        
        <div class="jumbotron mt-0 pt-0">
            <div class="container">
                <div class="row text-left">
                    <!-- <div class="col-md-3"> -->
                        
                        <?php   include "navigation.php" ?>

                   <!--  </div> -->
                    <div class="col-md-9">
                        <div id="maincontent">
                        
                        <div id="content">
                            <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                <h5 class="ml-3">Biography</h5>
                            </div>
                            
                            <?php echo $row['biography']; ?><br>
                            <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                <h5 class="ml-3">Academics</h5>
                            </div>
                                <?php echo $row['academics']; ?>
                             <br>
                            
                            </div><!-- Content -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        
    