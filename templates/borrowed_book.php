<?php
include 'connection.php'; // Include database connection file

// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
error_reporting(E_ALL);

// Check if the form to borrow a book is submitted
if (isset($_POST['borrow'])) {
    $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
    $borrowDate = date("Y-m-d H:i:s");
    $returnDate = date("Y-m-d H:i:s", strtotime('+7 days'));

    $sql = "INSERT INTO borrowed_books (isbn, `BORROW DATE`, `RETURN DATE`) 
            VALUES ('$isbn', '$borrowDate', '$returnDate')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p>Book borrowed successfully. Return it by $returnDate.</p>";
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
}

// Check if the form to update a book is submitted
if (isset($_POST['update'])) {
    $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
    $borrowDate = mysqli_real_escape_string($conn, $_POST['borrow_date']);
    $returnDate = mysqli_real_escape_string($conn, $_POST['return_date']);

    $sql = "UPDATE borrowed_books SET `BORROW DATE` = '$borrowDate', `RETURN DATE` = '$returnDate' 
            WHERE isbn = '$isbn'";
    
    echo "<p>SQL Query: $sql</p>"; // Debugging: Show the SQL query

    if ($conn->query($sql) === TRUE) {
        // Redirect to the same page to avoid resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
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
    <title>Update Borrowed Book</title>
</head>
<body>

<center><h2>Borrowed Book</h2></center>
<form method="POST" action="">
    <label for="isbn">Select a Book:</label>
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
    <br><br>

    <label for="borrow_date">Borrow Date:</label>
    <input type="date" name="borrow_date" id="borrow_date" required><br><br>

    <label for="return_date">Return Date:</label>
    <input type="date" name="return_date" id="return_date" required><br><br>

    <button type="submit" name="update">Update Book Details</button>
</form>

</body>
</html>
