<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "library_management"; //info from database

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}  // error message

