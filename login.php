<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "uastekweb");

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, " SELECT * FROM user_admin WHERE
  username = '$username'");

  if (mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc($result);

    if (password_verify($password, $row["password"])) {
      $_SESSION["username"] = $username;
      $_SESSION["data"] = $row;
      header("Location:menu.php");
      exit;
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="style.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
  <script src="script.js"></script>
  <title>Document</title>
</head>

<body>
  <div class="login-page">
    <form class="form" method="post" action="">
      <input name="username" type="username" placeholder="username" id="username" />
      <input name="password" type="password" placeholder="password" id="password" />
      <button type="submit" name="login">login</button>
    </form>
  </div>
</body>

</html>