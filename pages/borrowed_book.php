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

        select {
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

        option {
            padding: 10px;
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
