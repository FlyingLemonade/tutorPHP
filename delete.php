<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location:login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    header("Location:menu.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "uastekweb");

$delete =  $_POST["resi"];
$query = $conn->prepare("DELETE FROM transaksi_resi_pengiriman WHERE nomor_resi = ?");

$query->bind_param("i", $delete);
$query->execute();

mysqli_close($conn);


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