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
    include "../layout/navbar_petugas.php";
    ?>
    <div id="layoutSidenav">
        <?php
        include "../layout/sidebar_petugas.php";
        ?>
    </div>
    <div id="layoutSidenav_content" class="w-75" style="position: relative; left: 20%; margin-top: 100px;">
        <!-- a -->
        <div class="container-fluid">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        <!-- search -->
        <table class="table table-hover table-bordered bordered-dark mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cover</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cetak = mysqli_query($db, "SELECT * FROM buku");
                while ($data = mysqli_fetch_assoc($cetak)) {
                ?>
                    <tr>
                        <td> <?php echo $data['id_buku']; ?> </td>
                        <td><img src="../assets/img/<?= $data['cover'] ?>" class="rounded" width="75px" alt=""></td>
                        <td> <?php echo $data['judul']; ?> </td>
                        <td><a href="./../peminjaman/tambah_peminjaman.php?id_buku=<?=$data['id_buku'];?>" type="button" class="btn btn-primary">Pinjam</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
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