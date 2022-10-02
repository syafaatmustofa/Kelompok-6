<?php
include "../config.php";
$id = $_GET['id_pengembalian'];
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
    <div id="layoutSidenav_content" class="w-75 h-100" style="position: relative; left: 20%; margin-top: 100px;">
        <div class="container">
            <div class="card mt-5 mb-5">
                <div class="card-header text-white" style="background-color: #827397;">Edit Data Pengembalian</div>
                <div class="card-body mb-3">
                    <form class="mt-1" action="editproses_pengembalian" method="POST">
                        <?php
                        $ambil = mysqli_query($db, "SELECT * FROM pengembalian join peminjaman on pengembalian.id_peminjaman = peminjaman.id_peminjaman id_pengembalian='$id'");
                        $data = mysqli_fetch_assoc($ambil);
                        ?>
                        <div class="mb-3">
                            <label class="form-label">ID Pengembalian</label>
                            <input type="text" class="form-control" name="id_pengembalian" id="id_pengembalian"
                                value="<?= $data['id_pengembalian']?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ID Peminjaman</label>
                            <select class="form-select" aria-label="Default select example" name="id_peminjaman">
                                <?php
                        $ambil = mysqli_query($db, "SELECT * FROM pengembalian");
                        while ($data = mysqli_fetch_array($ambil)) {
                        ?>
                                <option value="<?= $data['id_peminjaman'] ?>"> } ?></option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Pengembalian</label>
                            <input type="date" class="form-control" name="tanggal_pengembalian"
                                id="tanggal_pengembalian" value=<<?= $data['tanggal_pengembalian'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Denda</label>
                            <input type="date" class="form-control" name="denda" id="denda"
                                value="<?= $data['denda'] ?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary" value="edit" name="edit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
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
if (isset($_POST['edit'])) {
    $id_pengembalian = $_POST['id_pengembalian'];
    $id_peminjaman = $_POST['id_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $denda = $_POST['denda'];

    $query = mysqli_query($db, "UPDATE pengembalian SET id_pengembalian='$id_pengembalian', id_peminjaman='$id_pengembalian', tanggal_pengembalian='$tanggal_pengembalian', denda='$denda' WHERE id_pengembalian=$id");
    
    if($query){
        echo "<script>alert('Data berhasil diupdate!'); window.location='home_pengembalian.php';</script>";
    } else {
        echo 'Data Gagal ditambahkan';
    }
}
?>