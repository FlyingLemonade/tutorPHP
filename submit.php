<?php

session_start();
if (!isset($_SESSION["username"])) {
    header("Location:login.php");
    exit;
}

if (isset($_POST["date"]) && isset($_POST["nomor_resi"])) {
    $conn = mysqli_connect("localhost", "root", "", "uastekweb");
    $query = $conn->prepare("INSERT INTO transaksi_resi_pengiriman 
    VALUES (?,?,NULL)");

    $query->bind_param("ss", $_POST["nomor_resi"], $_POST["date"]);
    $query->execute();

    $result = $query->get_result();
}

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