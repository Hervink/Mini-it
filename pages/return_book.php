<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
error_reporting(E_ALL);
include '../connection.php';

if (isset($_POST['return'])) {
    $isbns = $_POST['isbn'];

    foreach ($isbns as $isbn) {
        $isbn = mysqli_real_escape_string($conn, $isbn);
        $sql = "DELETE FROM borrowed_books WHERE ISBN = '$isbn'";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Book with ISBN $isbn returned successfully.</p>";
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

$columns = $conn->query("SHOW COLUMNS FROM borrowed_books");
$hasBorrowDate = false;
$hasReturnDate = false;

while ($column = $columns->fetch_assoc()) {
    if ($column['Field'] == 'BORROW_DATE') {
        $hasBorrowDate = true;
    }
    if ($column['Field'] == 'RETURN_DATE') {
        $hasReturnDate = true;
    }
}

$sqlBorrowedBooks = "SELECT borrowed_books.ISBN, books.TITLE, books.AUTHOR_NAME" . 
                     ($hasBorrowDate ? ", borrowed_books.BORROW_DATE" : "") . 
                     ($hasReturnDate ? ", borrowed_books.RETURN_DATE" : "") . 
                     " FROM borrowed_books 
                     INNER JOIN books ON borrowed_books.ISBN = books.ISBN";

$resultBorrowedBooks = $conn->query($sqlBorrowedBooks);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Books</title>
</head>
<body>

<center><h2>Return Books</h2></center>

<?php
if ($resultBorrowedBooks->num_rows > 0) {
?>
    <form method="POST" action="">
        <label for="isbn">Select Books to Return:</label>
        <select name="isbn[]" id="isbn" multiple required>
            <?php
            while ($row = $resultBorrowedBooks->fetch_assoc()) {
                $optionText = $row['TITLE'] . " by " . $row['AUTHOR_NAME'];
                if ($hasBorrowDate) {
                    $optionText .= " (Borrowed on: " . $row['BORROW_DATE'] . ")";
                }
                if ($hasReturnDate) {
                    $optionText .= ", Return by: " . $row['RETURN_DATE'];
                }
                echo "<option value='" . $row['ISBN'] . "'>$optionText</option>";
            }
            ?>
        </select>
        <br><br>

        <button type="submit" name="return">Return Books</button>
    </form>
<?php
} else {
    echo "<p>You have no borrowed books.</p>";
}
?>

</body>
</html>
