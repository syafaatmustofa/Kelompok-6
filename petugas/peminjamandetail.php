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
    <title>Home Data</title>

</head>

<body>
    <!-- Membuat Navbar : Nur -->
    <nav class="navbar navbar-expand-lg" style="background-color: #f7f7f7f7;">
        <div class="container">
            <a class="navbar-brand" href="#">My Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <button class="btn btn-danger">Logout</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar : Nur -->
    <!-- Tabel Data Siswa : Nur -->
    <div class="container">
        <div class="card mt-5">
            <div class="card-header" style="background-color: #f7f7f7;">Peminjaman</div>
            <div class="card-body">
                <!-- search -->
                <div class="container-fluid">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
                <!-- search -->
                <table class="table table-hover table-bordered bordered-dark mt-4">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cetak = mysqli_query($db, "SELECT * FROM buku");
                        while ($data = mysqli_fetch_assoc($cetak)) {
                        ?>
                            <tr>
                                <td> <?php echo $data['id_buku']; ?> </td>
                                <td><img src="../assets/img/<?= $data['cover'] ?>" class="rounded" width="75px" alt=""></td>
                                <td> <?php echo $data['judul']; ?> </td>
                                <td><a href="peminjaman.php" type="button" class="btn btn-primary">Pinjam</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="btn-end">
                    
                </div>

            </div>
        </div>
        <!-- Akhir Tabel Data Siswa : Nur -->
        <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>