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
<style>
        body {
            background-image: url('templates\mmu.jpg'); 
            background-size: cover;
            background-position: center; 
            color: white; 
            font-family: Arial, sans-serif; 
        }
        .menu {
            padding: 10px;
            text-align: center;
            background-color: blue; 
        }
        a {
            color: white;
            text-decoration: none; 
            margin: 0 15px; 
        }
    </style>
<div class="menu">
    <?php if (isset($_SESSION['student id'])): ?>
        <a href="pages/book.php">SEARCH BOOK</a>
        <a href="pages/borrowed_book.php">BORROW BOOK</a>
        <a href="pages/return_book.php">RETURN BOOK</a>
        <a href="pages/logout.php" class="right">LOGOUT</a>
    <?php else: ?>
        <a href="authentication/login.php" class="right">LOGIN</a>
        <a href="authentication/registration.php" class="right">REGISTER</a>
    <?php endif; ?>
    <a href="pages/about.php">ABOUT</a>
    <a href="pages/contact_us.php">CONTACT</a>
</div>

<center><h1>WELCOME TO ONLINE LIBRARY MANAGEMENT</h1></center>

</body>
</html>
