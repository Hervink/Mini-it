<?php
session_start();
include 'connection.php';

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
            header("Location: dashboard.php");
            exit();
        } else {
            $error_message = "Invalid password.";
        }
    } else {
        $error_message = "Invalid username or student ID.";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
<div class="login-container">
   <center><h1>Login</h1></center> 
    <form action="" method="POST">
        <label for="username">USERNAME</label>
        <input type="text" id="username" name="username" required><br>

        <label for="student_id">STUDENT ID:</label>
        <input type="text" id="student_id" name="student_id" maxlength="15" required><br>

        <label for="password">PASSWORD</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
</div>
</body>
</html>
