<?php
include "../config.php";
?>

<?php
include "../layout/header.php";
?>
<title>Data Petugas</title>
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
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-white" style="background-color: #827397;">Data Petugas</div>
                <div class="card-body">
                    <table class="table table-hover table-bordered bordered-dark mt-4">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <a href="tambah_petugas.php" class="btn btn-outline-primary">Tambah Data</a>
                        </div>
                        <thead class=" text-center">
                            <tr>
                                <th scope="col">NIP</th>
                                <th scope="col">Nama Petugas</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cetak = mysqli_query($db, "SELECT * FROM petugas");
                            while ($data = mysqli_fetch_assoc($cetak)) {
                            ?>
                            <tr>
                                <td> <?php echo $data['nip']; ?> </td>
                                <td> <?php echo $data['nama']; ?> </td>
                                <td> <?php echo $data['jenis_kelamin']; ?> </td>
                                <td> <?php echo $data['alamat']; ?> </td>
                                <td colspan="2">
                                    <a href="edit_petugas.php?nip=<?= $data['nip']?>" class="btn btn-warning">Edit</a>
                                    |
                                    <a href="delete_petugas.php?nip=<?= $data['nip']?>" class="btn btn-danger">Hapus</a>
                                </td>
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