<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Author entries</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <a href="../index.php">HOME</a>
    <a href="authors.php">AUTHORS</a>
    <a href='authors.php'>&#8592; back</a>
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

        $sql = "SELECT * FROM authors";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h2>Authors</h2>";
            $table = "<table>";
            $table .= "<thead><tr><th>Author ID</th><th>Author last name</th><th>Author first name</th><th></th></tr></thead>";
            $table .= "<tbody>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $table .= "<tr><form action='del_authors_do.php' method='post'><td><input class='read-only' name='id' value='{$row["author_id"]}' readonly></td><td><input class='read-only' name='last-name' value='{$row["author_last_name"]}' readonly></td><td><input class='read-only' name='first-name' value='{$row["author_first_name"]}' readonly></td><td><input type='submit' value='Delete'></td></form></tr>";
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