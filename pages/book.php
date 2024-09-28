<?php
include '../connection.php';

// Default SQL query to fetch all books
$sql = "SELECT * FROM books";

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the search input and prevent SQL injection
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    
    // Modify the SQL query to search by title, author, or faculty
    $sql = "SELECT * FROM books 
            WHERE TITLE LIKE '%$search%' 
            OR AUTHOR_NAME LIKE '%$search%' 
            OR FACULTY LIKE '%$search%'";
}

// Execute the query
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARCH BOOKS</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        img {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="mt-5">Search Books</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="search">Search by Title, Author, or Faculty:</label>
            <input type="text" class="form-control" id="search" name="search" placeholder="Enter book title, author, or faculty" value="<?php echo htmlspecialchars($search ?? ''); ?>">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Search</button>
    </form>

    <h3 class="mt-5">Search Results</h3>

    <table>
        <tr>
            <th>ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>Faculty</th>
            <th>Cover</th>
        </tr>
        
        <?php
        // Check if any results were returned
        if ($result->num_rows > 0) {
            // Display each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ISBN'] . "</td>";
                echo "<td>" . $row['TITLE'] . "</td>";
                echo "<td>" . $row['AUTHOR_NAME'] . "</td>";
                echo "<td>" . $row['DESCRIPTION'] . "</td>";
                echo "<td>" . $row['FACULTY'] . "</td>";
                // Display book cover image from the 'images' folder
                echo "<td><img src='images/" . $row['COVER'] . "' alt='" . $row['TITLE'] . " Cover'></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No books found</td></tr>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </table>
</div>

</body>
</html>
