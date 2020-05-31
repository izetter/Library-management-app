<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
<a href="../index.php">Home</a>
<a href="mod_keywords.php">&#8592; back</a><br>

    <?php
        $servername = "localhost";  // IP address or DNS name somehow
        $username = "root";
        $password = "";
        $database = "library";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);   // This is a constructor, they can also be specidief directly as a string rather than using a variable!
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
          echo "Connection failed: " . $conn->connect_error;
        }
        // echo "Connected successfully";

        $wordId = $_POST['id'];
        $word = $_POST['keyword'];

        $sql = "UPDATE keywords SET keyword = '$word' WHERE keyword_id = $wordId";

        if (mysqli_query($conn, $sql)) {
            echo "<p>Record updated successfully.<p>";
            echo "Updated record in the KEYWORDS TABLE now looks like this:";

            $table = "<table>";
            $table .= "<thead><tr><th>Keyword ID</th><th>Keyword</th></tr></thead>";
            $table .= "<tbody>";
            $table .= "<tr><td>{$wordId}</td><td>{$word}</td></tr>";
            $table .= "</tbody>";
            $table .= "</table>";
            echo $table;

        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    
        $conn->close();
    ?>
    
</body>
</html>