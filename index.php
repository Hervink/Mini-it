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
<link rel="website icon" type="png" href="http://localhost/GRP_Assignment/Webpage_items/quiz_icon.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles.css">
    <style>
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: rgb(27,27,27);
        color: whitesmoke;
        font-family: Arial, sans-serif;
    }


    h1 {
        font-size: 3vw;
        text-align: center;
        margin-bottom: 0;
        color: rgb(221, 83, 49);
    }

    .menu {
        background-color: rgb(27,27,27);
        overflow: hidden;
        position: absolute;
        top: 0;
        width: 100%;
        padding: 1.5vw;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .menu a {
        float: left;
        display: block;
        color: whitesmoke;
        text-align: center;
        padding: 1vw 2vw;
        text-decoration: none;
        font-size: 1.2vw;
        transition: background-color 0.3s, color 0.3s;
    }

    .menu a:hover {
        background-color: rgb(221, 83, 49);
        color: whitesmoke;
    }

    .menu a.right {
        float: right;
    }

    .container {
        background: rgb(27,27,27);
 

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


<div class="welcome-message">
    <h1>WELCOME TO ONLINE LIBRARY MANAGEMENT</h1>
</div>


</body>
</html>
