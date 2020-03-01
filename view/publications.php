
    <div class="site-wrap">
        <?php   include "head.php"; ?>
                    
        <div class="jumbotron mt-0 pt-0">
            <div class="container">
                <div class="row text-left">

                        <?php   include "navigation.php" ?>

                    <div class="col-md-9">
                        <div id="maincontent">
                            <div class="roundbannertop"><div></div></div>
                                <div id="content">
                                    <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                        <h5 class="ml-3">Books</h5>
                                    </div>
                                    <p align = "justify">
                                          
                                       <?php echo $row['books']; ?>
                                    
                                    </p><br>
                                    <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                        <h5 class="ml-3">Patents</h5>
                                    </div>
                                    
                                    <p align = "justify">
                                          
                                       <?php echo $row['patents']; ?>
                                    
                                    </p><br>
                                    <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                        <h5 class="ml-3">Journals</h5>
                                    </div> 
                                    <p align = "justify">
                                          
                                       <?php echo $row['journals']; ?>
                                    
                                    </p>
                                    <br>

                                    <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                        <h5 class="ml-3">Conference Proceedings</h5>
                                    </div>
                                    <p align = "justify">
                                          
                                       <?php echo $row['conference_proceeding']; ?>
                                    
                                    </p><br>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
        
    