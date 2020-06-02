<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Book entries</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <a href="../index.php">HOME</a>
    <a href="books.php">BOOKS</a>
    <a href='books.php'>&#8592; back</a>
    <?php
        $servername = "localhost";  // IP address or DNS name somehow
        $username = "root";
        $password = "";
        $database = "library";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);   // This is a constructor, they can also be specified directly as a string rather than using a variable!
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
          echo "Connection failed: " . $conn->connect_error;
        }
        // echo "Connected successfully";

        $sql = "SELECT * FROM books";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h2>Books</h2>";
            $table = "<table>";
            $table .= "<thead><tr><th>ISBN</th><th>Title</th><th>Publisher</th><th>Year</th><th>Dewey code</th><th>Current inventory</th><th>Total inventory</th><th></th></tr></thead>";
            $table .= "<tbody>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $table .= "<tr><form action='del_books_do.php' method='post'><td><input type='number' class='read-only' name='isbn' value='{$row['ISBN']}' readonly></td><td><input class='read-only' name='title' value='{$row['title']}' readonly></td><td><input class='read-only' name='publisher' value='{$row['publisher']}' readonly></td><td><input type='number' class='read-only' name='year' value='{$row['year']}' readonly></td><td><input class='read-only' name='dewey' value='{$row['dewey_code']}' readonly></td><td><input type='number' class='read-only' name='current-inv' value='{$row['current_inventory']}' readonly></td><td><input type='number' class='read-only' name='total-inv' value='{$row['total_inventory']}' readonly></td><td><input type='submit' value='delete'></td></form></tr>";
            }
            $table .= "</tbody>";
            $table .= "</table>";
            echo $table;
        } else {
            echo "0 results";
        }
    
        $conn->close();
    ?>
</body>
</html>