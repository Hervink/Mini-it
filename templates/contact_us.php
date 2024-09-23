<?php
session_start();
include 'connection.php'; // Include your database connection file

// Initialize variables for form data and error message
$name = $email = $message = "";
$error = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } elseif (empty($name) || empty($message)) {
        $error = "Name and message are required.";
    } else {
        // Insert contact information into the database
        $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<p>Thank you for contacting us! We will get back to you shortly.</p>";
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
  
</head>
<body>

<h2>Contact Us</h2>
<form method="POST" action="">

<label for="id">STUDENT ID:</label><br>
<input type="id" name="id" id="id" required><br><br>

    <label for="name">Name:</label><br>
    <input type="text" name="name" id="name" required><br><br>
    
    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email" required><br><br>
    
    <label for="message">Message:</label><br>
    <textarea name="message" id="message" required></textarea><br><br>
    
    <button type="submit">Send Message</button>
</form>

<?php
// Display error message if exists
if (!empty($error)) {
    echo "<p class='error'>$error</p>";
}
?>

</body>
</html>
