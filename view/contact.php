
    <div class="site-wrap">
        <?php   include "head.php"; ?>
                    
        <div class="jumbotron mt-0 pt-0">
            <div class="container">
                <div class="row text-left">

                        <?php   include "navigation.php" ?>

                    <div class="col-md-9">
                        <div id="maincontent">
                            <!--    <div></div>-->
                                <div id="content">
                                    <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                       <h5 class="ml-3">Contact Information</h5>
                                    </div>
                                <br>
                                <address> 

                                    <p align = "justify">
                                          
                                       <?php echo $row['contact_information']; ?><br>
                                        Phone: <a href="tel:<?php echo $row['contact_phone_number']; ?>"><?php echo $row['contact_phone_number']; ?> </a><br>
                                       Email:<a href="mailto:<?php echo $row['contact_email']; ?>"> <?php echo $row['contact_email']; ?> </a>
                                        
                                </p><br>
                                </address>
                               
                                <br>
                                <div class="font-weight-normal" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
                                   <h5 class="ml-3">Correspondence Address</h5>
                                </div><br>
                                <address> 

                                    <p align = "justify">
                                          
                                       <?php echo $row['correspondence_address']; ?><br>
                                       Phone: <a href="tel:<?php echo $row['correspondence_phone_number']; ?>"><?php echo $row['contact_phone_number']; ?> </a><br>
                                    Email:<a href="mailto:<?php echo $row['contact_email']; ?>"> <?php echo $row['correspondence_email']; ?> </a>
                                        
                                </p><br>
                                </address>      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>