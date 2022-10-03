<?php
include "../config.php";
?>

<?php
include "../layout/header.php";
?>
<title>Data Pengembalian</title>
</head>

<body class="sb-nav-fixed">
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
                <div class="card-header text-white" style="background-color: #827397;">Pengembalian</div>
                <div class="card-body">
                    <!-- search -->
                    <div class="container">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                    <!-- search -->
                    <table class="table table-hover table-bordered bordered-dark mt-4">
                        <thead>
                            <tr>
                                <th scope="col">ID Pengembalian</th>
                                <th scope="col">ID Peminjaman</th>
                                <th scope="col">Tanggal Pengembalian</th>
                                <th scope="col">Denda</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $ambil = mysqli_query($db, "SELECT * FROM pengembalian join peminjaman on pengembalian.id_peminjaman = peminjaman.id_peminjaman");
                        while ($data = mysqli_fetch_assoc($ambil)) {
                        ?>
                            <tr>
                                <td><?= $data['id_pengembalian'] ?></td>
                                <td><?= $data['id_peminjaman'] ?></td>
                                <td><?= $data['tanggal_pengembalian'] ?></td>
                                <td><?= $data['denda'] ?></td>
                                <td colspan="3">
                                    <a href="edit_pengembalian.php?id_pgm=<?php echo $data['id_pengembalian']; ?> ">
                                        <button class="btn btn-warning" id="edit">Edit</button></a>
                                    <a href="delete_pengembalian.php?id_pgm=<?php echo $data['id_pengembalian']; ?> "><button
                                            class="btn btn-danger" id="hapus">Hapus</button></a>
                                    <a href="detail_pengembalian.php?id_pgm=<?php echo $data['id_pengembalian'];?>"><button
                                            class="btn btn-secondary" id="detail">Details</button></a>
                                </td>
                            </tr>
                </div>
                <?php
                        }
        ?>
                </tbody>
                </table>
                <div class="text-center">
                    <a href="home_pengembalian.php" type="button" class="btn btn-danger"> Kembali </a>
                    <a href="tambah_pengembalian.php">
                        <button class="btn btn-primary" id="tambah">
                            Tambah Data
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
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