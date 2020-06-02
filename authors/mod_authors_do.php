<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
<a href="../index.php">HOME</a>
<a href="authors.php">AUTHORS</a>
<a href="mod_authors.php">&#8592; back</a><br>

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

        $id = $_POST['id'];
        $lastName = $_POST['last-name'];
        $firstName = $_POST['first-name'];

        $sql = "UPDATE authors SET author_last_name = '$lastName', author_first_name = '$firstName' WHERE author_id = $id";

        if (mysqli_query($conn, $sql)) {
            echo "<p>Record updated successfully.<p>";
            echo "<p>Updated record in the <b>KEYWORDS TABLE</b> now looks like this:</p>";

            $showthis = "SELECT * FROM authors WHERE author_id = $id";
            $result = $conn->query($showthis);
            if ($result->num_rows > 0) {
                $table = "<table>";
                $table .= "<thead><tr><th>Author ID</th><th>Author last name</th><th>Author first name</th></tr></thead>";
                $table .= "<tbody>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $table .= "<tr><td>$row[author_id]</td><td>$row[author_last_name]</td><td>$row[author_first_name]</td></tr>";
                }
                $table .= "</tbody>";
                $table .= "</table>";
                echo $table;
            }

        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    
        $conn->close();
    ?>
    
</body>
</html>
