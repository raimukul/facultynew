
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
                                <h5 class="ml-3">Ph.D Students</h5>
                            </div>
                                 
                                <p align = "justify">
                                          
                                       <?php echo $row['phd_students']; ?>
                                    
                                </p><br>

                            <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                               <h5 class="ml-3">MTech & BTech Students</h5>
                            </div>
                                    
                                    <p align = "justify">
                                          
                                       <?php echo $row['m_b_tech_students']; ?>
                                    
                                </p><br>

                            <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                <h5 class="ml-3">Graduated Students</h5>
                            </div>   
                                
                                <p align = "justify">
                                          
                                       <?php echo $row['graduated_students']; ?>
                                    
                                </p><br>

                             <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                <h5 class="ml-3">Research Assistants</h5>
                            </div>
                                <p align = "justify">
                                          
                                       <?php echo $row['research_assistants']; ?>
                                    
                                </p><br>
                            <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                <h5 class="ml-3">Summer Interns</h5>
                            </div>

                                <p align = "justify">
                                          
                                       <?php echo $row['summer_interns']; ?>
                                    
                                </p><br>
                                 
                            <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                <h5 class="ml-3">Independent Studies and Projects</h5>
                            </div>
                                    
                                <p align = "justify">
                                          
                                       <?php echo $row['independent_studies']; ?>
                                    
                                </p><br>

                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    