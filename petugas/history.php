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
    <link rel="stylesheet" href="../style.css">
    <title>History Peminjaman</title>
</head>

<body>
    <!-- judul s -->
    <div class="text-center">
        <h1 class="mx-auto">HISTORY PEMINJAMAN</h1>
    </div>
    <!-- judul e -->

    <!-- tabel s -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID Peminjaman</th>
                <th scope="col">Siswa</th>
                <th scope="col">Petugas</th>
                <th scope="col">Tanggal Peminjaman</th>
                <th scope="col">Tanggal Pengembalian</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $ambil = mysqli_query($db, "SELECT * FROM peminjaman join siswa join petugas on peminjaman.id_siswa = siswa.nis and peminjaman.id_petugas = petugas.nip");
            while ($data = mysqli_fetch_assoc($ambil)) {
            ?>
                <tr>
                    <td><?= $data['id_peminjaman'] ?></td>
                    <td><?= $data['nis'] ?>-<?= $data['namas'] ?></td>
                    <td><?= $data['nip'] ?>-<?= $data['nama'] ?></td>
                    <td><?= $data['tanggal_peminjaman'] ?></td>
                    <td><?= $data['tanggal_pengembalian'] ?></td>
                </tr>
            <?php
            }
            ?>
    </table>
    <!-- tabel e -->
    <div class="text-center">
    <a href="buku.php" type="button" class="btn btn-danger"> Kembali </a>
        <a href="peminjaman.php">
            <button class="btn btn-primary" id="tambah">
                Tambah Data
            </button>
        </a>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>