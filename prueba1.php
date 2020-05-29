<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba 1</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <p>La opción escogida es:</p>
    <?php
        if (isset($_GET["acc"])) {
            $option = $_GET["acc"];
            if ($option == "1") {
    ?>
        <p>PERRITOS!!!</p>
    <?php
            } else if ($option == "2") {
    ?>
        <p>TIGRE!!!</p>
    <?php 
            } else if ($option == "3") {
    ?>
        <p>LOROS!!!</p>
    <?php
            } else {
    ?>
        <p>NADA!!!</p>
    <?php
            }
        } else {
            echo ".l.";
        }
    ?>
</body>
</html>