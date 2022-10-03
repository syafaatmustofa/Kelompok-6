<?php
session_start();
include "../config.php";

if (!$_SESSION['nip']) {
    header('location:login_petugas.php');
}
?>

<?php
include "../layout/header.php";

// if (!isset($_SESSION['nip']) || !isset($_SESSION['namad']) ) {
//     header('location:./../petugas/login_petugas.php');
// }



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
        <!-- TABEL -->
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
                            <option value="<?= $data['nis'] ?>"><?= $data['namas'];
                                                            } ?></option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Petugas</label>
                    <input type="text" class="form-control" name="nip" value="<?= $_SESSION['nip']; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Peminjaman</label>
                    <input type="date" class="form-control" name="tanggal_peminjaman">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Pengembalian</label>
                    <input type="date" class="form-control" name="tanggal_pengembalian">
                </div>
                <input type="submit" class="btn btn-primary" name="submit" value="submit" />
                <a href="home_peminjaman.php" class="btn btn-danger"> Kembali</a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
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
    $id_siswa = $_POST['nis'];
    $id_petugas = $_POST['nip'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];


    $query = mysqli_query($db, "INSERT INTO peminjaman (id_siswa, id_petugas, tanggal_peminjaman, tanggal_pengembalian) VALUES('$id_siswa', '$id_petugas', '$tanggal_peminjaman', '$tanggal_pengembalian')");

    if($query){
        echo "<script>alert('Data berhasil ditambahkan!'); window.location='home_peminjaman.php';</script>";
    } else {
        echo 'Data Gagal ditambahkan';
    }
}


?>