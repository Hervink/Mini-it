<?php
session_start();
include 'connection.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<p>You must be logged in to return a book. <a href='login.php'>Login here</a>.</p>";
    exit; // Stop further execution if not logged in
}

$userId = $_SESSION['user_id']; // Get the logged-in user's ID

if (isset($_POST['return'])) {
    $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
    
    // Check if the book is borrowed by the user
    $checkSql = "SELECT * FROM borrowed_books WHERE user_id='$userId' AND isbn='$isbn'";
    $checkResult = $conn->query($checkSql);
    
    if ($checkResult->num_rows > 0) {
        // Delete the borrowed book record
        $sql = "DELETE FROM borrowed_books WHERE user_id='$userId' AND isbn='$isbn'";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Book returned successfully.</p>";
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }
    } else {
        echo "<p>Error: You have not borrowed this book.</p>";
    }
}

// Fetch the borrowed books for the user
$sql = "SELECT b.ISBN, b.TITLE, b.AUTHOR_NAME FROM borrowed_books bb JOIN books b ON bb.isbn = b.ISBN WHERE bb.user_id = '$userId'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Book</title>
</head>
<body>

<h2>Return a Book</h2>
<form method="POST" action="">
    <label for="isbn">Select a Book to Return:</label>
    <select name="isbn" id="isbn" required>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['ISBN'] . "'>" . $row['TITLE'] . " by " . $row['AUTHOR_NAME'] . "</option>";
            }
        } else {
            echo "<option>No borrowed books</option>";
        }
        ?>
    </select>
    <button type="submit" name="return">Return Book</button>
</form>

</body>
</html>
