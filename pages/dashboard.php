<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
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
        text-align: right;
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
    }

</style>
    
    <div class="menu">
        <a href="book.php">SEARCH BOOK</a>
        <a href="borrowed_book.php">BORROW BOOK</a>
        <a href="return_book.php">RETURN BOOK</a>
        <a href="logout.php">LOGOUT</a>
       
    </div>

</body>
</html>