<?php
include "../config.php";
$id = $_GET['id_peminjaman'];
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
                <div class="card-header text-white" style="background-color: #827397;">Tambah Data Siswa</div>
                <div class="card-body mb-3">
                    <form class="mt-1" action="" method="POST">
                        <?php
                       $ambil = mysqli_query($db, "SELECT * FROM peminjaman join siswa join petugas on peminjaman.id_siswa = siswa.nis and peminjaman.id_petugas = petugas.nip AND id_peminjaman=$id");
                        $data = mysqli_fetch_assoc($ambil);
                        ?>
                        <div class="mb-3">
                            <label class="form-label">ID Peminjaman</label>
                            <input type="text" class="form-control" name="id_peminjaman" id="id_peminjaman" value="<?= $data['id_peminjaman']?>"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ID Siswa</label>
                            <input type="text" class="form-control" name="nis" id="nis" value="$data['nis'] ?>-<?= $data['namas'] ?>"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">ID Petugas</label>
                            <input type="text" class="form-control" name="nip" id="nip" value=<?= $data['nip'] ?>-<?= $data['nama'] ?>"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" name="tanggal_peminjaman" id="tanggal_peminjaman"
                                value="<?= $data['tanggal_peminjaman'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Pengembalian</label>
                            <input type="date" class="form-control" name="tanggal_pengembalian" id="tanggal_pengembalian"
                                value="<?= $data['tanggal_pengembalian'] ?>" required>
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
    $id_peminjaman = $_POST['id_peminjaman'];
    $id_siswa = $_POST['nis'];
    $id_petugas = $_POST['nip'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];

    $query = mysqli_query($db, "UPDATE peminjaman SET id_peminjaman='$id_peminjaman', id_siswa='$nis', id_petugas='$nip', tanggal_peminjaman='$tanggal_peminjaman', tanggal_pengembalian='$tanggal_pengembalian' WHERE id_peminjaman=$id");
    
    if($query){
        echo "<script>alert('Data berhasil diupdate!'); window.location='home_peminjaman.php';</script>";
    } else {
        echo 'Data Gagal ditambahkan';
    }
}
