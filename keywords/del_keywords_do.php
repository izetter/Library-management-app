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
<a href="del_keywords.php">&#8592; back</a><br>

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

        $sql = "DELETE FROM keywords WHERE keyword_id = $wordId";

        if (mysqli_query($conn, $sql)) {
            echo "<p>Record deleted successfully.<p>";
            echo "<p>The following record was <strong>DELETED</strong> from the <b>KEYWORDS TABLE.</b></p>";

            $table = "<table class='deleted-entry'>";
            $table .= "<thead><tr><th>Keyword ID</th><th>Keyword</th></tr></thead>";
            $table .= "<tbody>";
            $table .= "<tr><td>{$wordId}</td><td>{$word}</td></tr>";
            $table .= "</tbody>";
            $table .= "</table>";
            echo $table;

        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    
        $conn->close();
    ?>
    
</body>
</html>
