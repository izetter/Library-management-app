<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User entries</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <a href="../index.php">HOME</a>
    <a href="users.php">USERS</a>
    <a href='users.php'>&#8592; back</a>
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
            $table = "<table>";
            $table .= "<thead><tr><th>User ID</th><th>email</th><th>Password</th><th>Last name</th><th>First name</th><th>Phone</th><th>Address</th><th>User type</th><th></th></tr></thead>";
            $table .= "<tbody>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $table .= "<tr><form action='del_users_do.php' method='post'><td><input type='number' class='read-only' name='id' value='{$row['user_id']}' readonly></td><td><input name='email' value='{$row['email']}'></td><td><input name='pass' value='{$row['password']}'></td><td><input name='last-name' value='{$row['user_last_name']}'></td><td><input name='first-name' value='{$row['user_first_name']}'></td><td><input name='phone' value='{$row['phone']}'></td><td><input name='address' value='{$row['address']}'><td><input name='user-type' value='{$row['user_type']}'></td><td><input type='submit' value='delete'></td></form></tr>";
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