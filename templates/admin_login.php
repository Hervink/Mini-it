<?php
session_start();
include 'connection.php';  // Make sure this file connects to your MySQL database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $admin_id = mysqli_real_escape_string($conn, $_POST['admin_id']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to check admin credentials (note the backticks around `ADMIN ID`)
    $query = "SELECT * FROM `admin` WHERE `username` = '$username' AND `ADMIN ID` = '$admin_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $admin = mysqli_fetch_assoc($result);
        
        // Verify password
        if ($admin['PASSWORD'] === $password) {  // Using 'PASSWORD' as seen in the table
            $_SESSION['admin_id'] = $admin['ADMIN ID'];  // Use 'ADMIN ID' as the session key
            header("Location: admin.php");
            exit();
        } else {
            $error_message = "Invalid password.";
        }
    } else {
        $error_message = "Invalid username or admin ID.";
    }

    mysqli_close($conn);
}
?>

<!-- HTML form for admin login -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h2>Admin Login</h2>

    <?php if (isset($error_message)) { echo "<p style='color:red;'>$error_message</p>"; } ?>

    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="admin_id">Admin ID:</label>
        <input type="text" id="admin_id" name="admin_id" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
