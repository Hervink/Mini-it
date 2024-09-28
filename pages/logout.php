<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles.css">
    <title>Logout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .image {
        margin-right: 45vw;
        box-shadow: 5px 5px 50px rgba(0, 0, 0, 0.6);
        border-radius: 20px;
    }
    .image img {
        width: 40vw;
    }
    .container {
        background: rgb(27,27,27);
        box-shadow: 10px 10px 40px rgba(221, 83, 49, 0.5);
        border-style: solid;
        border-color: rgb(221, 83, 49);
        border-radius: 1.5vw;
        padding: 1.5vw;
        padding-right: 3vw;
        width: 30vw;
        text-align: center;
    }
    .header {
        margin-bottom: 1.5vw;
        text-align: left;
    }
    h1 {
        font-size: 3vw;
        text-align: center;
        margin-bottom: 0;
        color: rgb(221, 83, 49);
    }
    .form-container {
        margin-bottom: 1vw;
    }
    label {
        display: block;
        margin-top: 1.5vw;
        color: rgb(221, 83, 49);
        font-size: 1.3vw;
        text-align: left;
    }
    
    input[type="submit"], button {
        background-color: rgb(221, 83, 49);
        text-align: center;
        font-size: 1vw;
        font-family: 'CustomFont';
        width: 1vw;
        height: 2vw;
        color: whitesmoke;
        border: solid;
        border-color: rgb(27,27,27);
        border-radius: 0.5vw;
        cursor: pointer;
        transition: font-size 0.2s ease;
        margin-top: 3vw;
    }
    input[type="submit"]:hover, button:hover {
        background-color: rgb(27,27,27);
        border: solid;
        border-color: rgb(221, 83, 49);
        font-size: 1.8vw;
    }
    .container p {
        font-size: 1.3vw;
        color: red;
    }
    </style>
<body>
    <div class="container">
        <h1>Logged Out Successfully</h1>
        <p>You have been logged out. Thank you for using our library management system!</p>
        <button class="home-button" onclick="location.href='../index.php'">Go to Home</button>
    </div>
</body>
</html>
