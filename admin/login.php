<?php include('../config/constants.php'); ?>
<html>
    <head>
        <title> Login - FilipinoFood</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class='login'>
            <h1 class="text-center">Login</h1>

            <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if(isset($_SESSION['no-login-msg']))
            {
                echo $_SESSION['no-login-msg'];
                unset($_SESSION['no-login-msg']);
            }
            ?>
            <br><br>
            <!-- Login form starts here  -->
            
            <form action="" method="POST" class="text-center">
                Username: <br>
                <input type="text" name="username" placeholder="Enter Username"> <br>
                Password: <br>
                <input type="password" name="password" placeholder="Enter Password"> <br>
                <input type="submit" name="submit" value="Login" class="btn-primary"> <br>
            </form>
            <!-- login  form ENDS here  -->
                <p class="text-center">Created by <a href="www.mio.com">MaishaaM</a></p>
        </div>
    </body>
</html>
<?php
    //check whther submit btn click or not
    if(isset($_POST['submit']))
    {
        // step 1: get data from FOR<M
        $username = $_POST['username'];
        $password = md5($_POST['password']); //passwprd encryption with MD5

        // step 2: sql query to save data in databaseeeee
        $sql = "SELECT * FROM tbl_admin WHERE 
        username = '$username' AND password ='$password'";
        //3. execute query and save data into db 
        $res = mysqli_query($conn,$sql);
        // this res is for result which is true/false value , true when sql is found  

        $count= mysqli_num_rows($res);
        // 4. check if query is executed data insertes or not and display msg 
        if($count==1)
        {
            // availabel n login successful 
            $_SESSION['login'] = "<div class='success'>Login successful.</div>";
            $_SESSION['user'] = $username; // this is to check whether user is logged 
            // in or not, logout unsets it 
            header('location:'.SITEURL.'admin/'); // Redirect page to Manage Admin 
        }
        else
        {
            // echo "Data is not inserted";
             // create a session variable to display msg here 
             $_SESSION['login'] = "<div class='error text-center'>Failed to Login</div>";
             // Redirect page to Add Admin 
             header('location:'.SITEURL.'admin/login.php'); 
        }
    }
?>