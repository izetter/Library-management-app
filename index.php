<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
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
            echo "<h2>Books</h2>";
            $table = "<table>";
            $table .= "<thead><tr><th>ISBN</th><th>Title</th><th>Publisher</th><th>Year</th><th>Dewey code</th><th>Current inventory</th><th>Total inventory</th></tr></thead>";
            $table .= "<tbody>";
            while($row = $result->fetch_assoc()) {
                $table .= "<tr><td><input type='number' value='{$row["ISBN"]}'></td><td><input value='{$row["title"]}'></td><td><input value='{$row["publisher"]}'></td><td><input type='number' value='{$row["year"]}'></td><td><input value='{$row["dewey_code"]}'></td><td><input type='number' value='{$row["current_inventory"]}'></td><td><input type='number' value='{$row["total_inventory"]}'></td></tr>";
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
            echo "<h2>Authors</h2>";
            $table = "<table>";
            $table .= "<thead><tr><th>Author ID</th><th>Last Name</th><th>First Name</th></tr></thead>";
            $table .= "<tbody>";
            while($row = $result->fetch_assoc()) {
                $table .= "<tr><td><input type='number' value='{$row["author_id"]}'></td><td><input value='{$row["author_last_name"]}'></td><td><input value='{$row["author_first_name"]}'></td></tr>";
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
            echo "<h2>Keywords</h2>";
            $table = "<table>";
            $table .= "<thead><tr><th>Keyword ID</th><th>Keyword</th></tr></thead>";
            $table .= "<tbody>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                // echo "Keyword ID: " . $row["keyword_id"] . " - Keyword: " . $row["keyword"] . "<br>";       // This is how ot was before we implemented the dynamically generated table
                // $table .= "<tr>" . "<td>" . $row["keyword_id"] . "</td>" . "<td>" . $row["keyword"] . "</td>" . "</tr>";     // And this is how it was before using inputs
                // $table .= "<tr>" . "<td><input type='number' value='" . $row["keyword_id"] . "'></td>" . "<td><input value='" . $row["keyword"] . "'></td>" . "</tr>";
                $table .= "<tr><td><input type='number' value='{$row["keyword_id"]}'></td><td><input value='{$row["keyword"]}'></td></tr>";
            }
            $table .= "</tbody>";
            $table .= "</table>";
            echo $table;
        } else {
            echo "0 results";
        }

        echo "<br>";

        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h2>Users</h2>";
            $table = "<table>";
            $table .= "<thead><tr><th>User ID</th><th>email</th><th>password</th><th>Last name</th><th>First name</th><th>Phone</th><th>Address</th><th>User type</th></tr></thead>";
            $table .= "<tbody>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                // echo "Keyword ID: " . $row["keyword_id"] . " - Keyword: " . $row["keyword"] . "<br>";       // This is how ot was before we implemented the dynamically generated table
                // $table .= "<tr>" . "<td>" . $row["keyword_id"] . "</td>" . "<td>" . $row["keyword"] . "</td>" . "</tr>";     // And this is how it was before using inputs
                $table .= "<tr><td><input type='number' value='{$row["user_id"]}'></td><td><input value='{$row["email"]}'></td><td><input value='{$row["password"]}'></td><td><input value='{$row["user_last_name"]}'></td><td><input value='{$row["user_first_name"]}'></td><td><input value='{$row["phone"]}'></td><td><input value='{$row["address"]}'></td><td><input value='{$row["user_type"]}'></td></tr>";
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