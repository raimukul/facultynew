<div class="col-md-3">
  <div class="text-center profesh" style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
          <h5 class="">Professional</h5>
      </div>
      <nav class="navbar profesh-2 navbar-expand-lg navbar-light bg-light">
          <div class="text-center   navbar-toggler" style="color: #ffff;  padding: 5px 10px; ">
          <h5 class="">Professional</h5>
          </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav" style="display: initial!important;">
            <li class="nav-item py-0">
              <a class="nav-link" href="view.php?view=home&id=<?php echo $get_id; ?>">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view.php?view=teaching&id=<?php echo $get_id; ?>">Teaching</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view.php?view=researchs&id=<?php echo $get_id; ?>">Research</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="view.php?view=publications&id=<?php echo $get_id; ?>">Publications</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="view.php?view=students&id=<?php echo $get_id; ?>">Students</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="view.php?view=contact&id=<?php echo $get_id; ?>">Contact</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="text-center mt-2" >
      <div style="color: #ffff; background-color:#78335d; padding: 5px 0px; ">
          <h5 class="">Updates</h5>
      </div>
      <div class="container p-2" >
          <p align="left">
              <marquee direction="up" behavior="scroll" scrollamount="3" onmouseover="this.stop()" onmouseout="this.start()">
                  <font size="3">
                      <div align="text-left">
                          <font color="red">
                              <p align = "justify">
                                          
                                       <?php echo $row['updates']; ?>
                                    
                                </p><br>
                          </font>
                      </div>
                  </font>
              </marquee>
          </p>
      </div> 
  </div>
</div>