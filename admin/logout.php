<?php
include('../config/constants.php');
session_destroy(); // unsets $SESSION['user] upon logout
header('location'.SITEURL.'admin/login.php'); // redirect to login page

?>