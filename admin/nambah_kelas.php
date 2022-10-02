<?php
include "../config.php";
?>

<?php
include "../layout/header.php";
?>
<title>Tambah Data Kelas</title>
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
                <div class="card-header text-white" style="background-color: #827397;">Tambah Data Kelas</div>
                <div class="card-body mb-3">
                    <form class="mt-1" action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label">ID Kelas</label>
                            <input type="number" class="form-control" name="id_kelas" id="id_kelas"
                                placeholder="Masukkan ID Kelas yang belum digunakan" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control" name="nama_kelas" id="nama_kelas"
                                placeholder="Masukkan Nama Kelas" required>
                        </div>
                        <button type="submit" class="btn btn-primary" value="submit" name="submit">Simpan</button>
                        <button type="cancel" onclick="javascript:window.location='kelas.php';" class="btn btn-danger"
                            value="cancel" name="cancel">Cancel</button>
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
if (isset($_POST['submit'])) {
    $id_kelas = $_POST['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];

    $query = mysqli_query($db, "INSERT INTO kelas  (id_kelas, nama_kelas)  VALUES ('$id_kelas','$nama_kelas')");
    
    if($query){
        echo "<script>alert('Data Kelas berhasil ditambahkan!'); window.location='kelas.php';</script>";
    } else {
        echo 'Data Gagal ditambahkan';
    }
}
?>