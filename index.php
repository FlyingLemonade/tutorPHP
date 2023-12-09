<?php



$conn = mysqli_connect("localhost", "root", "", "uastekweb");

$query = $conn->prepare("SELECT * FROM detail_log_pengiriman WHERE nomor_resi = ?");

$query->bind_param("i", $_POST["nomor_resi"]);

$query->execute();

$result = $query->get_result();
mysqli_close($conn);
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
            <a class="navbar-brand text-light active" href="#">WELCOME</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="login.php">Login Admin</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid d-flex justify-content-center row">
        <div class="border border-3 mt-4 d-flex justify-content-start row ms-2 col-12">

            <div class="col-12">
                <form method="post" action="index.php">
                    <div class="entry mt-5 mb-5 col-3">
                        <h2>Cek Pengiriman</h2>
                        <div id="resi" class="mt-1 col-12 d-flex ">

                            <input type="text" id="nomor_resi" name="nomor_resi" class="col-12" placeholder="Nomor Pengiriman" />
                            <button class="btn btn-dark text-light col-3" type="submit">Lihat</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-12">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <th>Tanggal</th>
                        <th>Kota</th>

                        <th>Keterangan</th>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row) : ?>
                            <tr>
                                <td><?= $row["tanggal_resi"] ?></td>
                                <td><?= $row["kota"] ?></td>
                                <td><?= $row["keterangan"] ?></td>


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