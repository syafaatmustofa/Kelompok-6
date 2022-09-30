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
    <nav class="navbar navbar-expand-lg" style="background-color: #FF884B;">
        <div class="container">
            <a class="navbar-brand" href="#">My Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Data Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar : Nur -->
    <!-- Tabel Data Siswa : Nur -->
    <div class="container">
        <div class="card mt-5">
            <div class="card-header" style="background-color: #FFD384;">Data Siswa</div>
                <div class="card-body">
                    <table class="table table-hover table-bordered bordered-dark mt-4">
                        <thead>
                            <tr>
                                <th scope="col">NIS</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cetak = mysqli_query($db, "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas");
                            while ($data = mysqli_fetch_assoc($cetak)) {
                            ?>
                            <tr>
                                <td> <?php echo $data['nis']; ?> </td>
                                <td> <?php echo $data['nama']; ?> </td>
                                <td> <?php echo $data['jenis_kelamin']; ?> </td>
                                <td> <?php echo $data['alamat']; ?> </td>
                                <td> <?php echo $data['id_kelas']; ?> </td>
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