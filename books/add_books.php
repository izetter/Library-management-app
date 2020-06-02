<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book entries</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <a href="../index.php">HOME</a>
    <a href="books.php">BOOKS</a>
    <a href='books.php'>&#8592; back</a>
    <?php

        echo "<h3>Add entry to the <strong>BOOKS TABLE</strong></h3>";
        $table = "<table>";
        $table .= "<thead><tr><th>ISBN</th><th>Title</th><th>Publisher</th><th>Year</th><th>Dewey code</th><th>Current inventory</th><th>Total inventory</th><th></th></tr></thead>";
        $table .= "<tbody>";
        $table .= "<tr><form action='add_books_do.php' method='post'><td><input type='number' name='isbn'></td><td><input name='title'></td><td><input name='publisher'></td><td><input type='number' name='year'></td><td><input name='dewey'></td><td><input type='number' name='current-inv'></td><td><input type='number' name='total-inv'></td><td><input type='submit'></td></form></tr>";
        echo $table;

    ?>
</body>
</html>