<?php
include 'connection.php'; // Include database connection file

// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
error_reporting(E_ALL);

// Check if the form to return a book is submitted
if (isset($_POST['return'])) {
    $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);

    $sql = "DELETE FROM borrowed_books WHERE isbn = '$isbn'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p>Book returned successfully.</p>";
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
}

// Fetch all borrowed books for returning
$sqlBorrowedBooks = "SELECT isbn, `BORROW DATE`, `RETURN DATE` FROM borrowed_books";
$resultBorrowedBooks = $conn->query($sqlBorrowedBooks);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Book</title>
</head>
<body>

<center><h2>Return Book</h2></center>
<form method="POST" action="">
    <label for="return_isbn">Select a Book to Return:</label>
    <select name="isbn" id="return_isbn" required>
        <?php
        if ($resultBorrowedBooks->num_rows > 0) {
            while ($row = $resultBorrowedBooks->fetch_assoc()) {
                echo "<option value='" . $row['isbn'] . "'>" . $row['isbn'] . " - Borrowed on " . $row['BORROW DATE'] . " (Return by " . $row['RETURN DATE'] . ")</option>";
            }
        } else {
            echo "<option>No borrowed books</option>";
        }
        ?>
    </select>
    <br><br>

    <button type="submit" name="return">Return Book</button>
</form>

</body>
</html>
