<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Keyword entries</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <a href="../index.php">Home</a>
    <a href='keywords.php'>&#8592; back</a>
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

        $sql = "SELECT * FROM keywords";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h2>Keywords</h2>";
            $table = "<table>";
            $table .= "<thead><tr><th>Keyword ID</th><th>Keyword</th><th></th></tr></thead>";
            $table .= "<tbody>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $table .= "<tr><form action='mod_keywords_do.php' method='post'><td><input class='read-only' name='id' value='{$row["keyword_id"]}' readonly></td><td><input name='keyword' value='{$row["keyword"]}'></td><td><input type='submit'></td></form></tr>";
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