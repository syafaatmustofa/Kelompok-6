<?php
include "config.php";
?>

<?php
$cetak = mysqli_query($db, "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas");
while ($data = mysqli_fetch_assoc($cetak)) {
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        .col li{
            list-style-type: none;
        }
    </style>
</head>

<body>
    <!-- navbar awal: syafaat -->

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            </button>
            <span class="navbar-text">
                <a class="nav-link active" aria-current="page" href="#">Home
                    <button class="btn btn-danger" type="submit">Logout</button>
                </a></span>
        </div>
        </div>
    </nav>
    <!-- navbar akhir: syafaat -->
    <!-- content1 awal:syafaat -->
    <div class="container">
        <div class="card mt-5">
            <div class="card-header" style="background-color: #FFD384;">Peminjaman</div>
            <div class="card-body">
                <div>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <li>ID</li>
                                <li>NIS</li>
                                <li>NAMA </li>
                            </div>

                            <div class="col">
                                <li>Kelas</li>
                                <li>Tanggal Pinjam</li>
                                <li>tanggal Kembali</li>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table">
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
    <!-- content1 akhir: syafaat -->



    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>