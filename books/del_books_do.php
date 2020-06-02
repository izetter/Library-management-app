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
<a href="del_books.php">&#8592; back</a><br>

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

        $sql = "DELETE FROM books WHERE ISBN = $id";

        if (mysqli_query($conn, $sql)) {
            echo "<p>Record deleted successfully.<p>";
            echo "<p>The following record was <strong>DELETED</strong> from the <b>BOOKS TABLE.</b></p>";

            $table = "<table class='deleted-entry'>";
            $table .= "<thead><tr><th>ISBN</th><th>Title</th><th>Publisher</th><th>Year</th><th>Dewey code</th><th>Current inventory</th><th>Total inventory</th></tr></thead>";
            $table .= "<tbody>";
            $table .= "<tr><td>{$id}</td><td>{$title}<td>{$publisher}</td><td>{$year}</td><td>{$dewey}</td><td>{$currentInv}</td><td>{$totalInv}</td></tr>";
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
