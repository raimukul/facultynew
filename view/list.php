
<style>
    body{
        background-image: linear-gradient(to right top, #070537, #71064f, #c33538, #dc8e00, #a8eb12);
        background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repeat;
        color: #ffffff;
    }
    .timg{
        height: 90px;
        width : 90px;
        border-radius: 50%!important;
    }
    .rowB{

        border: 1px gray solid;
        border-radius: 40px;
    }
   
</style>
<div class="container"><br>
    <div class="rowB row p-1 mb-2 border-light bg-dark">
        <div class="col-md-6 row">
            <div class="col-6 p-2 u1 text-center"><h5>User </h5></div>
            <div class="col-6 p-2 u2 text-center"> <h5>Name</h5></div>
        </div>
        <div class="col-md-6 row">
            <div class="col-6 p-2 u3 text-center"> <h5>Email</h5></div>
            <div class="col-6 p-2 u4 text-center"> <h5>View</h5></div>
        </div>
        
    </div>
         <?php  //Others data
        $query = "SELECT id, username, name, school, image FROM teacherdata ORDER BY id DESC";
        $select_query = mysqli_query($connection, $query);
         $sn = 0;
        while ($row = mysqli_fetch_assoc($select_query)) { ?>
        <div class="rowB row mt-3 mb-3 pt-2 bg-dark">
            <div class="col-md-6 row">
                <div class="col-6 u1 text-center"><img class="timg" width="100" class=" "src="../images/<?php if($row['image'] == ""){ echo 'image.png';} else{ echo $row['image']; } ?>" ></div>
                <div class="col-6 u2 p-3 text-center"><h5 class="text-capitalize"><?php echo $row['name']; ?></h6></div>
            </div>
            <div class="col-md-6 row">
                <div class="col-6 u3 p-3 text-center"><p><?php echo $row['username']; ?></p>
                </div>
            <div class="col-6 u4 p-3 text-center disabled"> <h5><a class="btn btn-primary"  href="#">View</a></h5></div>
            </div>
            <!--view.php?view=home&id=<?php //echo $row['id']?>-->
            
        </div>

    <?php } ?>
</div>
