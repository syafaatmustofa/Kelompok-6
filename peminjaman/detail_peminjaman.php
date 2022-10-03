<?php
include "../config.php";
session_start();
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
    </div>
    <div id="layoutSidenav_content" class="w-75" style="position: relative; left: 20%; margin-top: 100px;">
        <div class="container tabel">
            <div class="card mt-5">
                <div class="card-header" style="background-color: #f7f7f7;">
                    <h1 class="mx-auto">HISTORY PEMINJAMAN</h1>
                </div>
                <div class="card-body">
                    <!-- search -->
                    <div class="container">
                        <form action=class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                    <!-- search -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="table">
                            <tbody>
                                <?php
					$id_peminjaman = $_GET['id_peminjaman'];
					$ambil = mysqli_query($db, "SELECT * FROM peminjaman WHERE id_peminjaman = $id_peminjaman");
					while($data = mysqli_fetch_assoc($ambil)) {
				?>
                                <tr>
                                    <td>Cover</td>
                                    <td><img src="../assets/cover/<?php echo $data['cover'] ?>" class="img-thumbnail"
                                            alt="" style="width: 100px;"></td>
                                </tr>
                                <tr>
                                    <td>Kode Buku</td>
                                    <td><input type="text" class="form-control" name="kode_buku"
                                            value="<?php echo $data['id_buku'] ?>" readonly></input></td>
                                </tr>
                                <tr>
                                    <td>Judul</td>
                                    <td><input type="text" class="form-control" name="kode_buku"
                                            value="<?php echo $data['judul'] ?>" readonly</input></td>
                                    </td>
                                <tr>
                                    <td>NIS</td>
                                    <td><input type="text" class="form-control" name="nis" placeholder="Masukkan NIS"
                                            required></input></td>
                                </tr>
                                <tr>
                                    <td>Petugas</td>
                                    <td><input type="text" class="form-control" name="nip"
                                            value="<?= $_SESSION['nip'] ?>"></input></td>
                                </tr>
                                </tr>
                                <td>Total</td>
                                <td><input type="number" class="form-control" name="total"></input></td>
                                </tr>
                                <?php
						}
					?>
                                <tr>
                                    <td>Tanggal Peminjaman</td>
                                    <td><input type="date" class="form-control" name="pinjam"></input></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pengembalian</td>
                                    <td><input type="date" class="form-control" name="kembali"></input></td>
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
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js">
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