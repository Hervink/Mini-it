<?php
session_start();
include '../connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    
    $query = "SELECT * FROM `student_registration` WHERE `USERNAME` = '$username' AND `STUDENT ID` = '$student_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
       
        if ($user['PASSWORD'] === $password) {
            
            $_SESSION['user_id'] = $user['ID'];
            
            header("Location: /Mini-it/pages/dashboard.php"); 
            exit();
        } else {
            
            $error_message = "Invalid password.";
        }
    } else {
        // Display error if username or student ID is invalid
        $error_message = "Invalid username or student ID.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
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
        padding-right: 2vw;
        width: 29vw;
        text-align: center;
        margin-left: 55vw;
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
    input[type="text"]{
        width: 100%;
        font-size: 1.1vw;
        padding: 0.65vw;
        box-shadow: 5px 5px 10px rgba(221, 83, 49, 0.5);
        border: 1px solid #ccc;
        border-radius: 0.5vw;
        margin-top: 0.1vw;
    }

    input[type="email"],
    input[type="password"] {
        width: 100%;
        font-size: 1.1vw;
        padding: 0.65vw;
        box-shadow: 5px 5px 10px rgba(221, 83, 49, 0.5);
        border: 1px solid #ccc;
        border-radius: 0.5vw;
        margin-top: 0.3vw;
    }
    input[type="submit"] {
        background-color: rgb(221, 83, 49);
        text-align: center;
        font-size: 1.5vw;
        font-family: 'CustomFont';
        width: 11vw;
        height: 3.5vw;
        color: whitesmoke;
        border: solid;
        border-color: rgb(27,27,27);
        border-radius: 0.5vw;
        cursor: pointer;
        transition: font-size 0.2s ease;
        margin-top: 3vw;
    }
    input[type="submit"]:hover {
        background-color: rgb(27,27,27);
        border: solid;
        border-color: rgb(221, 83, 49);
        font-size: 1.8vw;
    }
    .register p {
        margin-top: 3vw;
        font-size: 1vw;
        text-align: center;
        color: rgb(221, 83, 49);
    }
    .register a {
        color: #93c7ff;
        text-decoration: none;
    }
    .container p {
        font-size: 1.3vw;
        color: red ;
    }
    .container button {
        background-color: rgb(221, 83, 49);
        text-align: center;
        font-size: 1.5vw;
        font-family: 'CustomFont';
        width: 11vw;
        height: 3.5vw;
        color: whitesmoke;
        border: solid;
        border-color: rgb(27,27,27);
        border-radius: 0.5vw;
        cursor: pointer;
        transition: font-size 0.2s ease;
        margin-top: 3vw;
        margin: auto;
    }
    .container button:hover {
        background-color: rgb(27,27,27);
        border: solid;
        border-color: rgb(221, 83, 49);
        font-size: 1.8vw;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Log In</h1>
        </div>
        <div class="form-container">
            <form action="" method="POST">
                <label for="username">USERNAME</label>
                <input type="text" id="username" name="username" required><br>

                <label for="student_id">STUDENT ID:</label>
                <input type="text" id="student_id" name="student_id" maxlength="15" required><br>

                <label for="password">PASSWORD</label>
                <input type="password" id="password" name="password" required><br>

                <input type="submit" value="Login">
            </form>

            <!-- Display error message if set -->
            <?php if (isset($error_message)): ?>
                <p><?php echo $error_message; ?></p>
            <?php endif; ?>
        </div>

        <div class="register">
            <p>Don't have an account? <a href="registration.php">Register</a></p>
        </div>
    </div>
</body>
</html>