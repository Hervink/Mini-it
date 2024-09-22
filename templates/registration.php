<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
</head>
<body>
    <h2>Student Registration Form</h2>
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
</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
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

    // Insert query
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
