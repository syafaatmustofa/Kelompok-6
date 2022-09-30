<?php
include "../config.php";
?>

<?php
include "../layout/header.php";
?>
<title>Data Buku</title>
</head>

<body class="sb-nav-fixed">
    <?php 
    include "../layout/navbar.php";
    ?>
    <div id="layoutSidenav">
        <?php
            include "../layout/sidebar.php";
            ?>
    </div>
    <div id="layoutSidenav_content" class="w-75" style="position: relative; left: 20%; margin-top: 100px;">
        <div class="container">
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
                                <td> <?php echo $data['cover']; ?> </td>
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
    </div>
    </div>
    </div>
    < <!-- Membuat Navbar : Nur -->
        <!-- <nav class="navbar navbar-expand-lg" style="background-color: #FF884B;">
        <div class="container">
            <a class="navbar-brand" href="#">My Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
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
    </nav> -->
        <!-- Akhir Navbar : Nur -->
        <!-- Tabel Data Siswa : Nur -->

        <!-- Akhir Tabel Data Siswa : Nur -->
        <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous">
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