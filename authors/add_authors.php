<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Author entries</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <a href="../index.php">HOME</a>
    <a href="authors.php">AUTHORS</a>
    <a href='authors.php'>&#8592; back</a>
    <?php

        echo "<h3>Add entry to the <strong>AUTHORS TABLE</strong></h3>";
        $table = "<table>";
        $table .= "<thead><tr><th>Author ID</th><th>Author last name</th><th>Author first name</th><th></th></tr></thead>";
        $table .= "<tbody>";
        $table .= "<tr><form action='add_authors_do.php' method='post'><td><input type='number' name='id'></td><td><input name='last-name'></td><td><input name='first-name'></td><td><input type='submit'></td></form></tr>";
        echo $table;

    ?>
</body>
</html>