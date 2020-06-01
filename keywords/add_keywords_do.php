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
<a href="keywords.php">KEYWORDS</a>
<a href="add_keywords.php">&#8592; back</a><br>

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

        $wordId = $_POST['id'];
        $word = $_POST['keyword'];

        $sql = "INSERT INTO keywords VALUE($wordId, '$word')";

        if (mysqli_query($conn, $sql)) {
            echo "<p>Succesfully added the following record in the <b>KEYWORDS TABLE.</b></p>";

            $showthis = "SELECT * FROM keywords WHERE keyword_id = $wordId";
            $result = $conn->query($showthis);
            if ($result->num_rows > 0) {
                $table = "<table>";
                $table .= "<thead><tr><th>Keyword ID</th><th>Keyword</th></tr></thead>";
                $table .= "<tbody>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $table .= "<tr><td>{$row["keyword_id"]}</td><td>{$row["keyword"]}</td></tr>";
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
