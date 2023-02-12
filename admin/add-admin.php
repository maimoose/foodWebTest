<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>

        <?php if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //Displaying session msg
                unset($_SESSION['add']); //Removing session msg
            } 
        ?> <br><br>
        <form action="" method="POST">
            <table class="tbl-30">

                <tr><td>Full name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>

                <tr><td>Username:</td>
                    <td><input type="text" name="username" placeholder="Your username"></td>
                </tr>

                <tr><td>Password:</td>
                    <td><input type="password" name="password" placeholder="Your password"></td>
                </tr>

                <tr><td colspan="2"><input type="submit" name="submit" value="Add Admin" class="btn-up">
                    </td>
                    <td></td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php 
    // process data from Form and transfer it to database
    // checking submit button click
    if(isset($_POST['submit']))
    {
        // step 1: get data from FOR<M
        $full_name = $_POST['full_name']; 
        $username = $_POST['username'];
        $password = md5($_POST['password']); //passwprd encryption with MD5

        // step 2: sql query to save data in databaseeeee
        $sql = "INSERT INTO tbl_admin SET
        full_name= '$full_name',
        username= '$username',
        password= '$password'";
        //3. execute query and save data into db 
        $res = mysqli_query($conn,$sql) or die(mysqli_error()); 
        // this res is for result which is true/false value , true when sql is found  

        // 4. check if query is executed data insertes or not and display msg 
        if($res==true)
        {
            // echo "Data inserted"; weeee addd sesssionn hereeee
            // create a session variable to display msg here 
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
            // Redirect page to Manage Admin 
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            // echo "Data is not inserted";
             // create a session variable to display msg here 
             $_SESSION['add'] = "<div class='error'>Failed to Add Admin</div>";
             // Redirect page to Add Admin 
             header('location:'.SITEURL.'admin/add-admin.php'); 
        }
    }
?>

<?php include('partials/footer.php'); ?>
