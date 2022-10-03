<?php
include "../config.php";
session_start();

$id_peminjaman = $_GET['id_peminjaman'];
$tampil = mysqli_query($db, "SELECT * FROM peminjaman join siswa join petugas join buku on peminjaman.id_siswa = siswa.nis and peminjaman.id_petugas = petugas.nip and peminjaman.id_buku = buku.id_buku WHERE peminjaman.id_peminjaman = $id_peminjaman ");
$data2 = mysqli_fetch_assoc($tampil);
?>

<?php
include "../layout/header.php";
?>
<title>Data Peminjaman</title>
</head>

<body class="sb-nav-fixed">
    <?php
    include "../layout/navbar_admin.php";
    ?>
    <div id="layoutSidenav">
        <?php
        include "../layout/sidebar_admin.php";
        ?>
    <?php 
    include "../layout/navbar_petugas.php";
    ?>
    <div id="layoutSidenav">
        <?php
            include "../layout/sidebar_petugas.php";
            ?>
    </div>
    <div id="layoutSidenav_content" class="w-75" style="position: relative; left: 20%; margin-top: 100px;">
        <div class="container tabel">
            <div class="card mt-5">
                <div class="card-header" style="background-color: #f7f7f7;">
                    <h1 class="mx-auto">HISTORY PEMINJAMAN</h1>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="table">
                            <tbody>
                                <?php
                                $id_peminjaman = $_GET['id_peminjaman'];
                                $tampil = mysqli_query($db, "SELECT * FROM peminjaman join siswa join petugas join buku on peminjaman.id_siswa = siswa.nis and peminjaman.id_petugas = petugas.nip and peminjaman.id_buku = buku.id_buku WHERE peminjaman.id_peminjaman = $id_peminjaman ");
                                $data2 = mysqli_fetch_assoc($tampil);
                                ?>
                                <tr>
                                    <td>Cover</td>
                                    <td><img src="../assets/img/<?php echo $data2['cover'] ?>" class="img-thumbnail" alt="" style="width: 100px;"></td>
                                </tr>
                                <tr>
                                    <td>Kode Buku</td>
                                    <td><input type="text" class="form-control" name="kode_buku" value="<?php echo $data2['id_buku'] ?>" disabled></input></td>
                                </tr>
                                <tr>
                                    <td>Judul</td>
                                    <td><input type="text" class="form-control" name="kode_buku" value="<?php echo $data2['judul'] ?>" disabled></input></td>
                                    </td>
                                <tr>
                                    <td>NIS</td>
                                    <td><input type="text" class="form-control" disabled name="nis" value="<?php echo $data2['nis'] ?>"></input></td>
                                </tr>
                                <tr>
                                    <td>Petugas</td>
                                    <td><input type="text" class="form-control" disabled name="nip" value="<?= $data2['nip'] ?>"></input></td>
                                </tr>
                                </tr>
                                </tr>
                                <tr>
                                    <td>Tanggal Peminjaman</td>
                                    <td><input type="date" class="form-control" disabled name="pinjam" value="<?= $data2['tanggal_peminjaman'] ?>"></input></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pengembalian</td>
                                    <td><input type="date" class="form-control" disabled name="kembali" value="<?= $data2['tanggal_pengembalian'] ?>"></input></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-end">
                            <a href="home.php" type="button" class="btn btn-danger"> Kembali </a>
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="text-center">
                    <a href="buku.php" type="button" class="btn btn-danger"> Kembali </a>
                    <a href="peminjaman.php">
                        <button class="btn btn-primary" id="tambah">
                            Tambah Data
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- a -->
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
    </script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous">
    </script>
    <script src="../assets/js/datatables-simple-demo.js"></script>
</body>

</html>