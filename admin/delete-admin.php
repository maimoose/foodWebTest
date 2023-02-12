<?php 
//  insert/include constants.php as menu.php ain't here 
include('../config/constants.php');
// 1. get ID of admin to be deleted 
$id = $_GET['id'];
// 2. create sql query to delete admin 
$sql = "DELETE FROM tbl_admin WHERE id=$id";
    // execute sql query  
$res = mysqli_query($conn, $sql);
    //  check 
    if($res==TRUE)
    {
        $_SESSION['delete'] ="<div class='success'>Admin deleted successfully</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }else 
    {
        $_SESSION['deleted'] = "<div class='error'>Failed to delete admin. Try again</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
// 3. redirect to manage admin page with msg (success/error) 


?>