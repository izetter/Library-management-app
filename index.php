<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library tables</title>
    <link rel="stylesheet" href="styles.css">
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
        // echo "Connected successfully";

        $sql = "SELECT * FROM books";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h2>Books table</h2>";
            $table = "<table border='2px'>";
            $table .= "<thead><tr><th>ISBN</th><th>Title</th><th>Publisher</th><th>Year</th><th>Dewey code</th><th>Current inventory</th><th>Total inventory</th></tr></thead>";
            $table .= "<tbody>";
            while($row = $result->fetch_assoc()) {
                $table .= "<tr>" . "<td>" . $row["ISBN"] . "</td>" . "<td>" . $row["title"] . "<td>" . $row["publisher"] . "</td>" . "<td>" . $row["year"] . "</td>" . "<td>" . $row["dewey_code"] . "</td>" . "<td>" . $row["current_inventory"] . "</td>" . "<td>" . $row["total_inventory"] . "</td>";
            }
            $table .= "</tbody>";
            $table .= "</table>";
            echo $table;
        } else {
            echo "0 results";
        }

        echo "<br>";

        $sql = "SELECT * FROM authors";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h2>Authors table</h2>";
            $table = "<table border='2px'>";
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

        echo "<br>";

        $sql = "SELECT * FROM keywords";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h2>Keywords table</h2>";
            $table = "<table border='2px'>";
            $table .= "<thead><tr><th>Keyword ID</th><th>Keyword</th></tr></thead>";
            $table .= "<tbody>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                // echo "Keyword ID: " . $row["keyword_id"] . " - Keyword: " . $row["keyword"] . "<br>";       // This is how ot was before we implemented the dynamically generated table
                $table .= "<tr>" . "<td>" . $row["keyword_id"] . "</td>" . "<td>" . $row["keyword"];
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