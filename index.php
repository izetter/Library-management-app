<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
        echo "Connected successfully";
        echo "<br>";
        echo "<br>";

        $sql = "SELECT * FROM books";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h2>Books table</h2>";
        // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "ISBN: " . $row["ISBN"] . " - Title: " . $row["title"] . " - Publisher: " . $row["publisher"] . " - Year: " . $row["year"] . " - Dewey code: " . $row["dewey_code"] . " - Current inventory: " . $row["current_inventory"] . " - Total inventory: " . $row["total_inventory"] . "<br>";      // What's inside the square brackets is the name of the columns of a table, case sensitive.
            }
        } else {
        echo "0 results";
        }

        echo "<br>";

        $sql = "SELECT * FROM authors";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h2>Authors table</h2>";
        // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "Author ID: " . $row["author_id"] . " - Author Last Name: " . $row["author_last_name"] . " - Author First Name: " . $row["author_first_name"] . "<br>";
            }
        } else {
        echo "0 results";
        }

        echo "<br>";

        $sql = "SELECT * FROM keywords";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h2>Keywords table</h2>";
        // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "Keyword ID: " . $row["keyword_id"] . " - Keyword: " . $row["keyword"] . "<br>";
            }
        } else {
        echo "0 results";
        }
        
        $conn->close();
    ?>
</body>
</html>