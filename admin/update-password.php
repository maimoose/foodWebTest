<?php include('partials/menu.php'); ?>
<div class='main-content'>
    <div class='wrapper'>
        <h1>Change Password</h1>
        <br><br>

        <form action="" method='POST'>
            
            <table class="tbl-30">
                <tr>
                    <td>Current password</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password"><br>
                    </td>
                </tr>
                <tr>
                    <td>New password</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password"><br>
                    </td>
                </tr>
                <tr>
                    <td>Confirm password</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password"><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Change password" class="btn-up">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
if(isset($_POST['submit']))
{
    // get data from form
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    // check whether user with ID and password matches
    $sql = "SELECT * FROM tbl_admin
    WHERE id = $id AND current_password = '$current_password'";

    // execute query 
    $res = mysqli_query($conn, $sql);

    if($res==TRUE)
    {
        $count = mysqli_num_rows($res); // chck whether data is available or not

        if($count==1)
        {
            // user exist kore
            // confrm and new matches or not
            if($confirm_password==$new_password){
                // update psw
                $sql2 = "UPDATE tbl_admin SET
                password='$new_password
                WHERE id=$id";

                $res2 = mysqli_query($conn, $sql2);
                if($res2==TRUE)
                {
                    // redirect to mng-admin n shw succeesss msg
                $_SESSION['change-psw'] = "<div class='success'>Password changed Successsfully.</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
                }
                else {
                    $_SESSION['change-psw'] = "<div class='error'>Failed to change Successsfully.</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
                     }

            }else{
                // redirect to mng-admin n shw eerroorr msg
                $_SESSION['psw-not-matched'] = "<div class='error'>Password not matched.</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
        else{
            $_SESSION['user-not-found'] = "<div class='error'>User not Found.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
    
}
?>

<?php include('partials/footer.php'); ?>
