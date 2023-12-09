<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location:login.php");
    exit;
}

session_destroy();
header("Location:menu.php");
exit;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>