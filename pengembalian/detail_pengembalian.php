<?php
include "../config.php";
session_start();
?>

<?php
include "../layout/header.php";
?>
<title>Data Pengembalian</title>
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
                    <h1 class="mx-auto">DETAIL PENGEMBALIAN</h1>
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
					$ambil = mysqli_query($db, "SELECT * FROM detail_pengembalian JOIN pengembalian on  detail_pengembalian.id_pengembalian = pengembalian.id_pengembalian");
					while($data = mysqli_fetch_assoc($ambil)) {
				?>
                                <tr>
                                    <td>Cover</td>
                                    <td><img src="../assets/cover/<?php echo $data['cover'] ?>" class="img-thumbnail"
                                            alt="" style="width: 100px;"></td>
                                </tr>
                                <tr>
                                    <td>ID Pengembembalian</td>
                                    <td><input type="text" class="form-control" name="id_pengembalian"
                                            value="<?php echo $data['id_pengembalian'] ?>" readonly></input></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Ada</td>
                                    <td><input type="text" class="form-control" name="ada"
                                            value="<?php echo $data['ada'] ?>" readonly</input></td>
                                    </td>
                                <tr>
                                    <td>Jumlah Hilang</td>
                                    <td><input type="text" class="form-control" name="hilang"
                                            value="<?php echo $data['hilang'] ?>" readonly</input></td>
                                </tr>

                                <?php
						}
					?>
                            </tbody>
                        </table>
                        <div class="text-end">
                            <a href="home_pengembalian.php" type="button" class="btn btn-danger"> Kembali </a>
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="text-center">
                    <a href="home_pengembalian.php" type="button" class="btn btn-danger"> Kembali </a>
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