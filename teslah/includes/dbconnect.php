<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "ip_erp";

//$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

//Checks to see if the database can be connected
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}

// else {echo ' All Okay Leh';}

?>