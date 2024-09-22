<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MINI IT</title>
</head>
<body>
<body>

<div class="menu">
    <a href="index.php">HOME</a>
    <a href="about.php">ABOUT</a>
    <a href="contact.php">CONTACT</a>
    <a href="borrow_book.php">Borrow Book</a>
    <a href="return_book.php">Return Book</a>
    
    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="dashboard.php" class="right">DASHBOARD</a>
       
    <?php else: ?>
        <a href="book.php">SEARCH BOOK</a>
        <a href="login.php" class="right">LOGIN</a>
        <a href="registration.php" class="right">REGISTER</a>
    <?php endif; ?>
</div>

<center><h1>WELCOME TO ONLINE LIBRARY MANAGEMENT</h1></center>

</body>

