<?php
    if ($_POST["username"]) {
        echo "Welcome, ". $_POST["username"];
        exit();
    }
?>

<html>
    <body>

    <form action = "" method ="POST">
        Name: <input type = "text" name = "username" />
        <input type = "submit" />
    </form>

    </body>
</html>
