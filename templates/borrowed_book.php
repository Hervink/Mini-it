<?php
include 'connection.php'; // Include database connection file

// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
error_reporting(E_ALL);

// Check if the form to borrow books is submitted
if (isset($_POST['borrow'])) {
    $isbns = $_POST['isbn']; // Array of selected books
    $borrowDate = date("Y-m-d H:i:s"); // Current date and time
    $returnDate = date("Y-m-d H:i:s", strtotime('+7 days')); // Return date after 7 days

    // Loop through each selected book and insert into the borrowed_books table
    foreach ($isbns as $isbn) {
        $isbn = mysqli_real_escape_string($conn, $isbn);

        // Insert book borrowing details into the borrowed_books table
        $sql = "INSERT INTO borrowed_books (ISBN, `BORROW DATE`, `RETURN DATE`) 
                VALUES ('$isbn', '$borrowDate', '$returnDate')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<p>Book with ISBN $isbn borrowed successfully. Return it by $returnDate.</p>";
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }
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
    <title>Borrow Books</title>
</head>
<body>

<center><h2>Borrow Books</h2></center>
<form method="POST" action="">
    <label for="isbn">Select Books:</label>
    <select name="isbn[]" id="isbn" multiple required>
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

    <button type="submit" name="borrow">Borrow Books</button>
</form>

</body>
</html>
