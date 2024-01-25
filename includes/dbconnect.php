<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "lms_project";


$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

//Checks to see if the database can be connected
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}


?>
