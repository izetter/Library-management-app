<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Keyword entries</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <a href="../index.php">HOME</a>
    <a href="keywords.php">KEYWORDS</a>
    <a href='keywords.php'>&#8592; back</a>
    <?php

        echo "<h3>Add entry to the <strong>KEYWORDS TABLE</strong></h3>";
        $table = "<table>";
        $table .= "<thead><tr><th>Keyword ID</th><th>Keyword</th><th></th></tr></thead>";
        $table .= "<tbody>";
        $table .= "<tr><form action='add_keywords_do.php' method='post'><td><input type='number' name='id'></td><td><input name='keyword'></td><td><input type='submit'></td></form></tr>";
        echo $table;

    ?>
</body>
</html>