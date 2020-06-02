<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User entries</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <a href="../index.php">HOME</a>
    <a href="users.php">USERS</a>
    <a href='users.php'>&#8592; back</a>
    <?php

        echo "<h3>Add entry to the <strong>USERS TABLE</strong></h3>";
        $table = "<table>";
        $table .= "<thead><tr><th>User ID</th><th>email</th><th>Password</th><th>Last name</th><th>First name</th><th>Phone</th><th>Address</th><th>User type</th><th></th></tr></thead>";
        $table .= "<tbody>";
        $table .= "<tr><form action='add_users_do.php' method='post'><td><input type='number' name='id'></td><td><input name='email'></td><td><input name='password'></td><td><input name='last-name'></td><td><input name='first-name'></td><td><input name='phone'></td><td><input name='address'></td><td><input name='user-type'></td><td><input type='submit'></td></form></tr>";
        echo $table;

    ?>
</body>
</html>