<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "library_management";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
