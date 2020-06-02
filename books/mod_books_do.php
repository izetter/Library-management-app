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
<a href="books.php">BOOKS</a>
<a href="mod_books.php">&#8592; back</a><br>

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

        $id = $_POST['isbn'];
        $title = $_POST['title'];
        $publisher = $_POST['publisher'];
        $year = $_POST['year'];
        $dewey = $_POST['dewey'];
        $currentInv = $_POST['current-inv'];
        $totalInv = $_POST['total-inv'];

        $sql = "UPDATE books SET title = '$title', publisher = '$publisher', year = $year, dewey_code = '$dewey', current_inventory = $currentInv, total_inventory = $totalInv WHERE ISBN = $id";

        if (mysqli_query($conn, $sql)) {
            echo "<p>Record updated successfully.<p>";
            echo "<p>Updated record in the <b>BOOKS TABLE</b> now looks like this:</p>";

            $showthis = "SELECT * FROM books WHERE ISBN = $id";
            $result = $conn->query($showthis);
            if ($result->num_rows > 0) {
                $table = "<table>";
                $table .= "<thead><tr><th>ISBN</th><th>Title</th><th>Publisher</th><th>Year</th><th>Dewey code</th><th>Current inventory</th><th>Total inventory</th></tr></thead>";
                $table .= "<tbody>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $table .= "<tr><td>{$row['ISBN']}</td><td>{$row["title"]}<td>{$row["publisher"]}</td><td>{$row["year"]}</td><td>{$row["dewey_code"]}</td><td>{$row["current_inventory"]}</td><td>{$row["total_inventory"]}</td></tr>";
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
