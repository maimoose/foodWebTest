<?php
if(!isset($_SESSION['user'])) 
{
    // Authorization control..check if user logged in or 
    $_SESSION['no-login-msg'] = "<div class='error text-center'>Please login to continue.</div>";
    // redirect to login page with message
    header('location'.SITEURL.'admin/login.php');
}
?>