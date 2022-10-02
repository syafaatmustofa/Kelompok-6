<?php
include "../config.php";
?>

<?php
include "../layout/header.php";
?>
<title>Data Kelas</title>
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
    <div id="layoutSidenav_content" class="w-75 h-100" style="position: relative; left: 20%; margin-top: 100px;">
        <div class="container">
            <div class="card mt-5 mb-5">
                <div class="card-header text-white" style="background-color: #827397;">Data Kelas</div>
                <div class="card-body">
                    <table class="table table-hover table-bordered bordered-dark mt-4">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <a href="nambah_kelas.php" class="btn btn-outline-primary">Tambah Data Kelas</a>
                        </div>
                        <thead class=" text-center">
                            <tr>
                                <th scope="col">ID Kelas</th>
                                <th scope="col">Nama Kelas</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $cetak = mysqli_query($db, "SELECT * FROM kelas");
                            while ($data = mysqli_fetch_assoc($cetak)) {
                            ?>
                            <tr>
                                <td> <?php echo $data['id_kelas']; ?> </td>
                                <td> <?php echo $data['nama_kelas']; ?> </td>
                                <td colspan="2">
                                    <a href="edit_siswa.php?id_kelas=<?= $data['id_kelas']?>"
                                        class="btn btn-warning">Edit</a>
                                    |
                                    <a href="delete_kelas.php?id_kelas=<?= $data['id_kelas']?>"
                                        class="btn btn-danger">Hapus</a>
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
    <script src=" assets/bootstrap/js/bootstrap.bundle.min.js">
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