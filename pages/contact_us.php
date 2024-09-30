<?php
session_start();
include '../connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="website icon" type="png" href="http://localhost/GRP_Assignment/Webpage_items/quiz_icon.png">
    <link rel="stylesheet" href="../styles.css">
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
        width: 29vw;
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
    input[type="text"], input[type="email"], textarea {
        width: 100%;
        font-size: 1.1vw;
        padding: 0.65vw;
        box-shadow: 5px 5px 10px rgba(221, 83, 49, 0.5);
        border: 1px solid #ccc;
        border-radius: 0.5vw;
        margin-top: 0.1vw;
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
</head>

<body>
    <div class="image">
        <p> </p>
    </div>    
    <div class="container">
        <div class="header">
            <h1>CONTACT US</h1>
        </div>
        <div class="form-container">
        <?php 
          

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $message = mysqli_real_escape_string($conn, $_POST['message']);

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error = "Invalid email format.";
                } elseif (empty($name) || empty($message)) {
                    $error = "Name and message are required.";
                } else {
                    $sql = "INSERT INTO contact_us (name, email, message) VALUES ('$name', '$email', '$message')";
                    
                    if ($conn->query($sql) === TRUE) {
                        echo "<p class='message'>Thank you for contacting us! We will get back to you shortly.</p><br/><center><a href='../index.php'><button style='font-size: 1.5vw; width:15vw; height:4vw;'>Back to Home</button></center></a>";
                    } else {
                        echo "<p>Error: " . $conn->error . "</p>";
                    }
                }
            } else {
            ?>
            <form method="POST" action="">
                <h1>CONTACT US</h1>
                <label for="id">STUDENT ID:</label><br>
                <input type="text" name="id" id="id" required><br><br>

                <label for="name">Name:</label><br>
                <input type="text" name="name" id="name" required><br><br>

                <label for="email">Email:</label><br>
                <input type="email" name="email" id="email" required><br><br>

                <label for="message">Message:</label><br>
                <textarea name="message" id="message" required></textarea><br><br>

                <center><button type="submit" style="font-size: 1.5vw; width:15vw; height:4vw;">Send Message</button></center>
                <?php
                if (!empty($error)) {
                    echo "<p class='error'>$error</p>";
                }
                ?>
            </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>
