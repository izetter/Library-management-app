<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authors</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <a href="../index.php">HOME</a>
    <a href="../index.php">&#8592; back</a><br>

    <?php
        $servername = "localhost";  // IP address or DNS name somehow
        $username = "root";
        $password = "";
        // Create connection
        $conn = new mysqli($servername, $username, $password, "library");   // This is a constructor, the fourth parameter is the database to use
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
            $table .= "<thead><tr><th>Author ID</th><th>Last Name</th><th>First Name</th></tr></thead>";
            $table .= "<tbody>";
            while($row = $result->fetch_assoc()) {
                $table .= "<tr><td>$row[author_id]</td><td>$row[author_last_name]</td><td>$row[author_first_name]</td></tr>";
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