<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "library_management";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
