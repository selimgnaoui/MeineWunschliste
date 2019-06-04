<?php

$servername = "db";
$username = "root";
$password = "root";
$db="wishlist";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>