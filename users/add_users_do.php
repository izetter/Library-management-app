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
<a href="users.php">USERS</a>
<a href="add_users.php">&#8592; back</a><br>

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
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $lastName = $_POST['last-name'];
        $firstName = $_POST['first-name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $userType = $_POST['user-type'];

        $sql = "INSERT INTO users VALUE($id, '$email', '$pass', '$lastName', '$firstName', '$phone', '$address', '$userType')";

        if (mysqli_query($conn, $sql)) {
            echo "<p>Succesfully added the following record to the <b>USERS TABLE.</b></p>";

            $showthis = "SELECT * FROM users WHERE user_id = $id";
            $result = $conn->query($showthis);
            if ($result->num_rows > 0) {
                $table = "<table>";
                $table .= "<thead><tr><th>User ID</th><th>email</th><th>Password</th><th>Last name</th><th>First name</th><th>Phone</th><th>Address</th><th>User type</th></tr></thead>";
                $table .= "<tbody>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $table .= "<tr><td>{$row["user_id"]}</td><td>{$row["email"]}</td><td>{$row["password"]}</td><td>{$row["user_last_name"]}</td><td>{$row["user_first_name"]}</td><td>{$row["phone"]}</td><td>{$row["address"]}</td><td>{$row["user_type"]}</td></tr>";
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
