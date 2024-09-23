<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MINI IT</title>
</head>
<body>

<div class="menu">
    <?php if (isset($_SESSION['student id'])): ?>
        <a href="book.php">SEARCH BOOK</a>
        <a href="borrowed_book.php">BORROW BOOK</a>
        <a href="return_book.php">RETURN BOOK</a>
        <a href="logout.php" class="right">LOGOUT</a>
    <?php else: ?>
        <a href="login.php" class="right">LOGIN</a>
        <a href="registration.php" class="right">REGISTER</a>
    <?php endif; ?>
    <a href="about.php">ABOUT</a>
    <a href="contact_us.php">CONTACT</a>
</div>

<center><h1>WELCOME TO ONLINE LIBRARY MANAGEMENT</h1></center>

</body>
</html>
