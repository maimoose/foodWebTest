<?php
// session start
session_start();
//constants to store non repeating values, define(constName, ConstValue)
// step 3: execute query and save data it into db

define('SITEURL', 'http://localhost/foodPhilipino/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME','newphilipinofoodweb');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); 
        // connect to database; parameters localhost-username-password for DB. default username: root password: none
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
?> 