<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <a href="../index.php">HOME</a>
    <a href="../index.php">&#8592; back</a><br>

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

        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<h2>Users</h2>";
            echo "<a href='mod_users.php'>Modify entries</a>";
            echo "<a href='add_users.php'>Add entries</a>";
            echo "<a href='del_users.php'>Delete entries</a>";
            $table = "<table>";
            $table .= "<thead><tr><th>User ID</th><th>email</th><th>Password</th><th>Last name</th><th>First name</th><th>Phone</th><th>Address</th><th>User type</th></tr></thead>";
            $table .= "<tbody>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                // echo "Keyword ID: " . $row["keyword_id"] . " - Keyword: " . $row["keyword"] . "<br>";       // This is how ot was before we implemented the dynamically generated table
                // $table .= "<tr>" . "<td>" . $row["keyword_id"] . "</td>" . "<td>" . $row["keyword"] . "</td>" . "</tr>";     // And this is how it was before using inputs
                $table .= "<tr><td>{$row["user_id"]}</td><td>{$row["email"]}</td><td>{$row["password"]}</td><td>{$row["user_last_name"]}</td><td>{$row["user_first_name"]}</td><td>{$row["phone"]}</td><td>{$row["address"]}</td><td>{$row["user_type"]}</td></tr>";
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