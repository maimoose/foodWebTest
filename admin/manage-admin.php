<?php include("partials/menu.php");?>
    
    <!-- Main Content Starts -->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>
            <br/>

            <?php if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //Displaying session msg
                unset($_SESSION['add']); //Removing session msg
            } 
           
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete']; //Displaying session msg
                unset($_SESSION['delete']); //Removing session msg
            } 

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update']; //Displaying session msg
                unset($_SESSION['update']); //Removing session msg
            }
            
            if(isset($_SESSION['user-not-found']))
            {
                echo $_SESSION['user-not-found']; //Displaying session msg
                unset($_SESSION['user-not-found']); //Removing session msg
            } 

            if(isset($_SESSION['psw-not-matched']))
            {
                echo $_SESSION['psw-not-matched']; //Displaying session msg
                unset($_SESSION['psw-not-matched']); //Removing session msg
            } 

            if(isset($_SESSION['change-psw']))
            {
                echo $_SESSION['change-psw']; //Displaying session msg
                unset($_SESSION['change-psw']); //Removing session msg
            } 

            
            ?> <br><br>

            <a href="add-admin.php" class="btn-primary"> Add Admin </a>
            <br/><br/>

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php 
                    //query to get all admin
                    $sql= "SELECT * FROM tbl_admin";
                    //check whether query exctd or not
                    $res = mysqli_query($conn, $sql);

                    $sn= 1; // serial number for replacing id
        
                if($res==TRUE)
                {
                    // count rows to check whether we have data in db or not
                    $count = mysqli_num_rows($res); // function to get all rows in sql

                    if($count>0) // check if we hv data
                    {
                        while($rows=mysqli_fetch_assoc($res))
                    {
                        // using while loop to get all data 
                        // while loop will run as long as long it has data in loop 
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];
                ?>

                        <tr>
                        <td><?php echo $sn++;?> </td> 
                        <td><?php echo $full_name; ?> </td> 
                        <td><?php echo $username; ?> </td> 
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-up">Update Admin</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-dlt">Delete Admin</a>
                        </td>                         
                        </tr>
                    
                    <?php

                    }
                }
                

                }
            


                ?>
            </table>
        </div>
        </div>
        <!-- Main Content Ends -->

    <?php include('partials/footer.php');
?>               