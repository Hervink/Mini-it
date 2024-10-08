<?php
include '../connection.php';


$sql = "SELECT * FROM books"; //query TO SELECT ALL BOOKS
 

if (isset($_POST['submit'])) { //FIRST TIME $_POST = NULL;
   
    $search = mysqli_real_escape_string($conn, $_POST['search']); 
    
    
    $sql = "SELECT * FROM books 
            WHERE TITLE LIKE '%$search%' 
            OR AUTHOR_NAME LIKE '%$search%' 
            OR FACULTY LIKE '%$search%'"; //select the searched book //nwneonwoeFOE FOE FOEoiojoij
}
//$sql = data of all books;

$result = $conn->query($sql); //execute the query
?>

<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARCH BOOKS</title>
  
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(to right, #ff7e5f, #feb47b); 
    margin: 0;
    padding: 20px;
    color: #333;
}

.container {
    max-width: 800px;
    margin: auto;
    background: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    transition: transform 0.2s;
}

.container:hover {
    transform: scale(1.02);
}

h2 {
    color: #ff6b6b; /* Soft red color */
    text-align: center;
    margin-bottom: 20px;
    font-size: 2em;
}

h3 {
    color: #4ecdc4; /* Teal color */
    margin-top: 30px;
    font-size: 1.5em;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

input[type="text"] {
    width: 100%;
    padding: 12px;
    border: 2px solid #4ecdc4; /* Teal border */
    border-radius: 5px;
    transition: border-color 0.3s;
}

input[type="text"]:focus {
    border-color: #ff6b6b; /* Change border to soft red on focus */
    outline: none;
}

.btn {
    background-color: #ff6b6b; /* Soft red button */
    color: white;
    padding: 12px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s, transform 0.2s;
    display: inline-block;
}

.btn:hover {
    background-color: #ff3d3d; /* Darker red on hover */
    transform: translateY(-2px);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #4ecdc4; /* Teal border */
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #feb47b; /* Light orange */
    color: white;
    font-weight: bold;
}

td {
    background-color: #f7f7f7; /* Light gray */
    transition: background-color 0.3s;
}

td img {
    width: 100px;
    height: auto;
    border-radius: 5px;
}

tr:hover td {
    background-color: #ffefdb; /* Light peach on row hover */
}

@media (max-width: 600px) {
    .container {
        padding: 20px;
    }

    input[type="text"] {
        padding: 10px;
    }

    .btn {
        width: 100%;
    }
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
        <a href="dashboard.php"><button type="button" style="background-color:#ff6b6b;"><img src="../templates/pngegg.png" alt="" style="width: 1.15vw; height: 1.15vw;"></button></a>
    </form>

    <h3 class="mt-5">Search Results</h3>

    <table>
        <tr>
            <th>Cover</th>
            <th>ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>Faculty</th>
        </tr>
        
        <?php
        // Check if any results were returned
        if ($result->num_rows > 0) {
            // Display each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><img src='../templates/" . $row['COVER'] . "' alt='Book Cover' width='100' height='150'></td>";
                echo "<td>" . $row['ISBN'] . "</td>";
                echo "<td>" . $row['TITLE'] . "</td>";
                echo "<td>" . $row['AUTHOR_NAME'] . "</td>";
                echo "<td>" . $row['DESCRIPTION'] . "</td>";
                echo "<td>" . $row['FACULTY'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No books found</td></tr>";
        }

     
        $conn->close();
        ?>
    </table>
</div>

</body>
</html>
