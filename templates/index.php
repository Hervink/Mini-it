<?php
session_start();
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
    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="index.php" class="right">DASHBOARD</a>
    <?php else: ?>
        <a href="index.php">HOME</a>
        <a href="book.php">SEARCH BOOK</a>
        <a href="borrowed_book.php">BORROW BOOK</a>
        <a href="return_book.php">RETURN BOOK</a>
        <a href="login.php" class="right">LOGIN</a>
        <a href="registration.php" class="right">REGISTER</a>
        <a href="about.php">ABOUT</a>
        <a href="contact_us.php">CONTACT</a>
    <?php endif; ?>
</div>

<center><h1>WELCOME TO ONLINE LIBRARY MANAGEMENT</h1></center>

</body>
</html>
