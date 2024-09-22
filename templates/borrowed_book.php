<?php
session_start();
include 'connection.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<p>You must be logged in to borrow a book. <a href='login.php'>Login here</a>.</p>";
    exit; // Stop further execution if not logged in
}

// Assuming user_id is stored in session
$userId = $_SESSION['user_id'];

if (isset($_POST['borrow'])) {
    $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
    $borrowDate = date("Y-m-d H:i:s"); // Current date and time

    // Insert the borrowed book details into the borrowed_books table
    $sql = "INSERT INTO borrowed_books (user_id, isbn, borrow_date) VALUES ('$userId', '$isbn', '$borrowDate')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p>Book borrowed successfully.</p>";
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
}

// Fetch all available books for borrowing
$sqlBooks = "SELECT ISBN, TITLE, AUTHOR_NAME FROM books";
$resultBooks = $conn->query($sqlBooks);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Book</title>
</head>
<body>

<h2>Borrow a Book</h2>
<form method="POST" action="">
    <label for="isbn">Select a Book to Borrow:</label>
    <select name="isbn" id="isbn" required>
        <?php
        if ($resultBooks->num_rows > 0) {
            while ($row = $resultBooks->fetch_assoc()) {
                echo "<option value='" . $row['ISBN'] . "'>" . $row['TITLE'] . " by " . $row['AUTHOR_NAME'] . "</option>";
            }
        } else {
            echo "<option>No available books</option>";
        }
        ?>
    </select>
    <button type="submit" name="borrow">Borrow Book</button>
</form>

</body>
</html>
