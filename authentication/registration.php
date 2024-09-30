<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
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
    <div class="image">
        <p> </p>
    </div>    
    <div class="container">

        <div class="header">
            <h1>Register</h1>
        </div>
        <div class="form-container">
            <form action="registration.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" maxlength="15" required> <br>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" maxlength="15" required> <br>

                <label for="student_id">Student ID:</label>
                <input type="text" id="student_id" name="student_id" maxlength="15" required> <br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" maxlength="40" required> <br>

                <label for="faculty">Faculty:</label>
                <input type="text" id="faculty" name="faculty" maxlength="15" required> <br>

                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="MALE">Male</option>
                    <option value="FEMALE">Female</option>
                </select> <br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" maxlength="15" required> <br>

                <input type="submit" value="Submit">
            </form>
        </div>

        <div class="login">
                <p>Have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $link = mysqli_connect("localhost", "root", "", "library_management");

    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }


    
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $student_id = mysqli_real_escape_string($link, $_POST['student_id']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $faculty = mysqli_real_escape_string($link, $_POST['faculty']);
    $gender = mysqli_real_escape_string($link, $_POST['gender']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    
    $query = "INSERT INTO `student_registration`(`NAME`, `USERNAME`, `STUDENT ID`, `EMAIL`, `FACULTY`, `GENDER`, `PASSWORD`)
              VALUES ('$student_id', '$name', '$username', '$email', '$faculty', '$gender', '$password')";


    if (mysqli_query($link, $query)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($link);
    }

    mysqli_close($link);
}
?>