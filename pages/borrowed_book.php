<?php
session_start();
include '../connection.php'; 

$message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $isbns = $_POST['isbn']; 
    $borrowDate = mysqli_real_escape_string($conn, $_POST['borrow_date']);
    $returnDate = mysqli_real_escape_string($conn, $_POST['return_date']);

    if (strtotime($borrowDate) > strtotime($returnDate)) {
        $message = "Return date must be after the borrow date.";
    } else {
    
        foreach ($isbns as $isbn) {
            $isbn = mysqli_real_escape_string($conn, $isbn);

            
            $query = "INSERT INTO `borrowed_books` (`ISBN`, `BORROW DATE`, `RETURN DATE`) 
                      VALUES ('$isbn', '$borrowDate', '$returnDate')";

        
            error_log("SQL Query: $query");

            if (mysqli_query($conn, $query)) {
                $message = "Books borrowed successfully!";
            } else {
                $message = "Error: " . mysqli_error($conn);
                break; 
            }
        }
    }
}


$sqlBooks = "SELECT ISBN, TITLE, AUTHOR_NAME FROM books WHERE ISBN NOT IN (SELECT ISBN FROM borrowed_books)";
$resultBooks = $conn->query($sqlBooks);


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Books</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }
        form {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 50px auto;
        }
        label {
            display: block;
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 10px;
        }
        select, input[type="date"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1rem;
            margin-bottom: 20px;
        }
        button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            font-size: 1.1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        p {
            color: green;
            font-size: 1rem;
        }
        @media (max-width: 768px) {
            form {
                padding: 20px;
            }
            h2 {
                font-size: 1.5rem;
            }
            button {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<center><h2>Borrow Books</h2></center>

<?php if ($message): ?>
    <p><?php echo htmlspecialchars($message); ?></p>
<?php endif; ?>

<form method="POST" action="">
    <label for="isbn">Select Books:</label>
    <select name="isbn[]" id="isbn" multiple required>
        <?php
        if ($resultBooks && $resultBooks->num_rows > 0) {
            while ($row = $resultBooks->fetch_assoc()) {
                echo "<option value='" . htmlspecialchars($row['ISBN']) . "'>" . htmlspecialchars($row['TITLE']) . " by " . htmlspecialchars($row['AUTHOR_NAME']) . "</option>";
            }
        } else {
            echo "<option>No available books</option>";
        }
        ?>
    </select>

    <label for="borrow_date">Borrow Date:</label>
    <input type="date" name="borrow_date" id="borrow_date" required>

    <label for="return_date">Return Date:</label>
    <input type="date" name="return_date" id="return_date" required>
    <button type="submit" name="borrow">Borrow Books</button>
    <a href="dashboard.php"><button type="button"><img src="../templates/pngegg.png" alt="" style="width: 1.15vw; height: 1.15vw;"></button></a>
    </form>

</body>
</html>
