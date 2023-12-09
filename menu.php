<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location:login.php");
  exit;
}
$conn = mysqli_connect("localhost", "root", "", "uastekweb");
$result = mysqli_query($conn, "SELECT * FROM transaksi_resi_pengiriman")


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand text-light active" href="#">Halo, Admin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-light" aria-current="page" href="#">Data Resi Pengiriman</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#">User Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="/LatihanUAS/logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid d-flex justify-content-center row">
    <div class="border border-3 mt-4 d-flex justify-content-start row ms-2 col-12">

      <div class="col-12">
        <form method="post" action="submit.php">
          <div class="entry mt-5 mb-5 col-3">
            <h2>Entry Nomor Resi</h2>
            <div id="tanggal " class="mt-2">
              <div>Tanggal</div>
              <input type="datetime-local" id="date" name="date" class="col-12" required />
            </div>
            <div id="resi" class="mt-1 col-12">
              <div>Nomor Resi</div>
              <input type="text" id="nomor_resi" name="nomor_resi" class="col-12" required />
            </div>
            <div class="mt-1 col-12">
              <button class="btn btn-dark text-light mt-2 col-12">Entry</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-12">
        <table class="table table-bordered">
          <thead class="table-dark">
            <th>Nomor Resi</th>
            <th>Tanggal Resi</th>

            <th>Action</th>
          </thead>
          <tbody>
            <?php foreach ($result as $row) : ?>
              <tr>
                <td><?= $row["nomor_resi"] ?></td>
                <td><?= $row["tanggal_resi"] ?></td>

                <td class="d-flex">
                  <form action="entry.php" method="POST">
                    <input type="hidden" name="resi" id="resi" value=<?= $row["nomor_resi"] ?>>
                    <button class="btn btn-primary" type="submit">Entry Log</button>
                  </form>
                  <form action="delete.php" method="POST">
                    <input type="hidden" name="resi" id="resi" value=<?= $row["nomor_resi"] ?>>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
                </td>


              </tr>
            <?php endforeach ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
</body>

</html>