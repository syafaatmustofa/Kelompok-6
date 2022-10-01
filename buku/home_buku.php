<?php
include "../config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Home Data</title>

    <style>
        * {
            padding: 0;
            margin: 0;
        }

        .sidebar {

            position: absolute;
            padding-top: 50px;
            width: 150px;
            height: 100vh;
            background-color: #FF884B;
        }

        .accordion-item {
            background-color: #FF884B;
            border: none;
        }

        .accordion-body a {
            display: flex;
            justify-content: center;
            align-items: center;
            color: black;
            text-decoration: none;
        }

        .accordion-button {
            background-color: #FF884B;
            border: none;
            width: 100px;
        }

        .tabel {
            margin-left: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: fit-content;
        }

        .icon {
            width: 200px;
            font-size: 2em;
        }
    </style>

</head>

<body>
    <!-- Membuat Navbar : Nur -->
    <nav class="navbar navbar-expand-lg" style="background-color: #FF884B;">
        <div class="container">
            <a class="navbar-brand" href="#">My Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active">HOME</a>
                    </li>
                </ul>
                <a href="loginpetugas.php" class="nav-link active"><button class="btn btn-danger">Logout</button></a>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar : Nur -->
    <!-- sidebar -->
    <div class="sidebar d-inline-flex">
        <div class="container position-relative">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="icon bi bi-book pe-2 "></i>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a href="buku.php">Melihat Buku</a>
                        </div>
                    </div>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a href="crudbuku.php">Menambah Buku</a>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <i class="icon bi bi-bag-plus pe-2"></i>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a href="peminjaman.php">Menambahan Peminjaman</a>
                        </div>
                    </div>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a href="history.php">History Peminjaman</a>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <i class="icon bi bi-bag-check pe-2"></i>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a href="pengembalian.php">Menambahan Pengembalian</a>
                        </div>
                    </div>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a href="history.php">History Pengembalian</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar -->
    <!-- Tabel Data Siswa : Nur -->
    <div class="container tabel">
        <div class="card mt-5">
            <div class="card-header" style="background-color: #FFD384;">Data Buku</div>
            <div class="card-body">
                <table class="table table-hover table-bordered bordered-dark mt-4">
                    <thead>
                        <tr>
                            <th scope="col">ID Buku</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Kota</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Sinopsis</th>
                            <th scope="col">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cetak = mysqli_query($db, "SELECT * FROM buku");
                        while ($data = mysqli_fetch_assoc($cetak)) {
                        ?>
                            <tr>
                                <td> <?php echo $data['id_buku']; ?> </td>
                                <td> <?php echo $data['penulis']; ?> </td>
                                <td> <?php echo $data['tahun']; ?> </td>
                                <td> <?php echo $data['judul']; ?> </td>
                                <td> <?php echo $data['kota']; ?> </td>
                                <td> <?php echo $data['penerbit']; ?> </td>
                                <td><img src="../assets/img/<?= $data['cover'] ?>" class="rounded" width="75px" alt=""></td>
                                <td> <?php echo $data['sinopsis']; ?> </td>
                                <td> <?php echo $data['stok']; ?> </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- Akhir Tabel Data Siswa : Nur -->
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
