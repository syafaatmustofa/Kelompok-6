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
    include "../layout/navbar_admin.php";
    ?>
    <div id="layoutSidenav">
        <?php
            include "../layout/sidebar_admin.php";
            ?>
    </div>
    <div id="layoutSidenav_content" class="w-75" style="position: relative; left: 20%; margin-top: 100px;">
        <div class="container mt-2 mb-5">
            <h1 class="text-center mb-5">Peminjaman Baru</h1>
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Siswa</label>
                    <select class="form-select" aria-label="Default select example" name="nis">
                        <?php
                    $ambil = mysqli_query($db, "SELECT * FROM siswa");
                    while ($data = mysqli_fetch_array($ambil)) {
                    ?>
                        <option value="<?= $data['nis'] ?>"><?= $data['namas'];?>
                        </option>
                        <h1 class="text-center mb-5">Pengembalian Baru</h1>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">id_peminjaman</label>
                                <select class="form-select" aria-label="Default select example" name="id_peminjaman">
                                    <?php
                                    $ambil = mysqli_query($db, "SELECT * FROM peminjaman JOIN siswa on peminjaman.id_siswa = siswa.nis");
                                    while ($data = mysqli_fetch_array($ambil)) {
                                    ?>
                                    <option value="<?= $data['id_peminjaman'] ?>"><?= $data['namas'];
                                                        } ?></option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Petugas</label>
                                <input type="text" class="form-control" name="nip" value="<?= $_SESSION['nip']; ?>"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Peminjaman</label>
                                <input type="date" class="form-control" name="tanggal_peminjaman">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Pengembalian</label>
                                <input type="date" class="form-control" name="tanggal_pengembalian">
                            </div>
                        </form>
                        <input type="submit" class="btn btn-primary" name="submit" value="submit" />
                        <a href="peminjaman.php" class="btn btn-danger"> Kembali</a>
                        <label class="form-label">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" name="tanggal_pengembalian">
                </div>
                <div class="mb-3">
                    <label class="form-label">Denda</label>
                    <input type="number" class="form-control" name="denda">
                </div>
                <?php
                    }
                    ?>
            </form>
            <input type="submit" class="btn btn-primary" name="submit" value="submit" />
            <a href="home_pengembalian.php" class="btn btn-danger"> Kembali</a>
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

<?php
if (isset($_POST['submit'])) {
    $id_peminjaman = $_POST['id_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $denda = $_POST['denda'];

    $query = mysqli_query($db, "INSERT INTO pengembalian(id_peminjaman,tanggal_pengembalian,denda) VALUES('$id_peminjaman','$tanggal_pengembalian','$denda')");

    if ($query) {
        $maxid = mysqli_query($db, "SELECT MAX(id_pengembalian)as id_p FROM pengembalian");
        $max = mysqli_fetch_array($maxid);

        echo '<script>window.location.href="detail_pengembalian.php?id_pgm=' . $max['id_p'] . '";</script>';
    } else {
        echo 'data gagal ditambah';
    }
}
?>