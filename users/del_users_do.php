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
<a href="del_users.php">&#8592; back</a><br>

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
        $pass = $_POST['pass'];
        $lastName = $_POST['last-name'];
        $firstName = $_POST['first-name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $userType = $_POST['user-type'];

        $sql = "DELETE FROM users WHERE user_id = $id";

        if (mysqli_query($conn, $sql)) {
            echo "<p>Record deleted successfully.<p>";
            echo "<p>The following record was <strong>DELETED</strong> from the <b>USERS TABLE.</b></p>";

            $table = "<table class='deleted-entry'>";
            $table .= "<thead><tr><th>User ID</th><th>email</th><th>Password</th><th>Last name</th><th>First name</th><th>Phone</th><th>Address</th><th>User type</th></tr></thead>";
            $table .= "<tbody>";
            $table .= "<tr><td>{$id}</td><td>{$email}<td>{$pass}</td><td>{$lastName}</td><td>{$firstName}</td><td>{$phone}</td><td>{$address}</td><td>{$userType}</td></tr>";
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
