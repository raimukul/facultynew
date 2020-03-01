
<?php include "include/header.php" ?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "include/navigation.php"; ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>:- <?php echo $_SESSION['userData']['name']; ?></small>
                        </h1>
                    </div>
                </div>

                <!-- /.row -->
                                
                <div class="row">
                    <?php  
                        if (isset($_GET['source']) && isset($_SESSION['name'])) {
                            $source = $_GET['source'];
                        } else{
                            $source = "";
                        }
                        switch ($source) {
                            case 'edit_profile':
                                include '../includes/head_form.php';

                                break;
                            default:
                                include 'include/progress.php';
                                break;
                        }
                            
                     ?>
                </div>
                 <!-- /.row -->
                 <div class="row">
                      
                 </div>     
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "include/footer.php" ?>
