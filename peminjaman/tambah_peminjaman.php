<?php
session_start();
include "../config.php";
session_start();

if (!$_SESSION['nip']) {
    header('location:../petugas/login_petugas.php');
}
?>

<?php
include "../layout/header.php";
?>

<?php

$id_buku = $_GET['id_buku'];
$result = mysqli_query($db, "SELECT * FROM buku WHERE id_buku='$id_buku'");
while ($data2 = mysqli_fetch_array($result)) {
    $judul = $data2['judul'];
    $penulis = $data2['penulis'];
}
$result2 = mysqli_query($db, "SELECT * FROM siswa ");


if (isset($_POST['submit'])) {

    if ($_POST['nis'] == null ) {
        echo "<script>alert('Tolong isi semua field')</script>";
    } else {
        $nis = $_POST['nis'];
        $nip = $_SESSION['nip'];
        $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
        $tanggal_pengembalian = $_POST['tanggal_pengembalian'];

        $sendd = mysqli_query($db, "INSERT INTO `peminjaman` (`id_peminjaman`, `id_siswa`, `id_petugas`, `tanggal_peminjaman`, `tanggal_pengembalian`) VALUES (NULL, '$nis', '$nip', '$tanggal_peminjaman', '$tanggal_pengembalian')");
        $dataid = mysqli_query($db, "SELECT id_peminjaman FROM peminjaman ORDER BY id_peminjaman DESC limit 1");
        $id_peminjaman = '';
        if ($sendd) {
            # code...
            while ($lastid = mysqli_fetch_array($dataid)) {
                $id_peminjaman = $lastid['id_peminjaman'];
            }
            echo $id_peminjaman;
            if ($sendd) {
                $sendd2 = mysqli_query($db, "INSERT INTO `detail_peminjaman` (`id_detail_peminjaman`, `id_buku`, `id_peminjaman`) VALUES (NULL, '$id_buku', '$id_peminjaman');");
                header('location:home_peminjaman.php');
            }
        }
    }
}

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
        <!-- TABEL -->
        <div class="container mt-2 mb-5">
            <h1 class="text-center mb-5">Tambah Peminjaman</h1>
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Siswa</label>
                    <select class="form-select" aria-label="Default select example" name="nis">
                        <?php
                        while ($data = mysqli_fetch_array($result2)) {
                        ?>
                            <option value="<?= $data['nis'] ?>"><?= $data['namas'];
                                                            } ?></option>
                    </select>
                </div>
                <div class="mb-3">
                    <?php $id_buku = $_GET['id_buku'];  ?>
                    <label class="form-label">Buku</label>
                    <input type="text" class="form-control" name="id_buku" value="<?= $id_buku; ?>" disabled>
                </div>
                <div class="mb-3">
                <label class="form-label">Judul</label>
                    <input readonly type="text" name="judul" value="<?php echo $judul . "--" . $penulis; ?>" class="form-control" placeholder="Judul" aria-label="Email" aria-describedby="email-addon">
                </div>
                <div class="mb-3">
                    <label class="form-label">Petugas</label>
<<<<<<< HEAD
                    <input type="text" class="form-control" name="nip" value="<?= $_SESSION['nip']; ?>" disabled>
=======
                    <input type="text" class="form-control" name="nip" value="<?= $_SESSION['nip'];?>" readonly>
>>>>>>> origin/trial
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