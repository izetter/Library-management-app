<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <a href="../index.php">HOME</a>
    <a href="../index.php">&#8592; back</a><br>

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
            echo "<a href='mod_books.php'>Modify entries</a>";
            echo "<a href='add_books.php'>Add entries</a>";
            echo "<a href='del_books.php'>Delete entries</a>";
            $table = "<table>";
            $table .= "<thead><tr><th>ISBN</th><th>Title</th><th>Publisher</th><th>Year</th><th>Dewey code</th><th>Current inventory</th><th>Total inventory</th></tr></thead>";
            $table .= "<tbody>";
            while($row = $result->fetch_assoc()) {
                $table .= "<tr><td>{$row['ISBN']}</td><td>{$row["title"]}<td>{$row["publisher"]}</td><td>{$row["year"]}</td><td>{$row["dewey_code"]}</td><td>{$row["current_inventory"]}</td><td>{$row["total_inventory"]}</td></tr>";
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