
 <nav id="x" class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="welcome">
            <img src="img/gbulogo.png" width="30" height="30" class="d-inline-block align-top" alt=""> Gautam Buddha University
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php 
                            if(isset($_SESSION['userData'])) {
                                    echo $_SESSION['userData']['name'];
                            
                        ?>
                    </a>
                    <div class="dropdown-menu" a ria-labelledby="dropdown" >
                        <a class="dropdown-item bg-success text-white" href="admin/index">Admin</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="home">Home </a>
                        <a class="dropdown-item" href="teaching">Teaching</a>
                        <a class="dropdown-item" href="researchs">Researchs</a>
                        <a class="dropdown-item" href="publications">Publications</a>
                        <a class="dropdown-item" href="students">Students</a>
                        <a class="dropdown-item" href="contact">Contact</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item bg-primary text-white" href="view.php">View List</a>
                        <a onClick="javascript: return confirm('Are you sure want to Logout ?');"  class="dropdown-item bg-danger text-white" href="logout">Logout</a>
                    </div>
                    
                    <?php }else { echo "Profile"; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdown">
                    <a class="dropdown-item" href="index">Login</a>
                </div>
                <?php   }?>
            </li>
        </ul>
        <?php 
            if (isset($_SESSION['admin'])) { ?>
               
            <div class="ml-auto mr-4">
                <div class="nav-item dropdown">
                    <a class="nav-link" href="/nextgenadminx/index.php"> <h5><i>Admin</i></h5></a>
                </div>
               
            </div>
        <?php } ?>
         </div>
    </div>
</nav>
