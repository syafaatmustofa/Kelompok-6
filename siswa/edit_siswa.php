<?php
include "../config.php";
$id = $_GET['nis'];
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
                        $cetak = mysqli_query($db, "SELECT * FROM siswa, kelas WHERE siswa.id_kelas = kelas.id_kelas AND nis=$id");
                        $data = mysqli_fetch_assoc($cetak);
                        ?>
                        <div class="mb-3">
                            <label class="form-label">NIS</label>
                            <input type="text" class="form-control" name="nis" id="nis" value="<?= $data['nis']?>"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $data['nama']?>"
                                required>
                        </div>
                        <div class=" mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki"
                                    id="jenis_kelamin1">
                                <label class="form-check-label" for="jenis_kelamin1">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan"
                                    id="jenis_kelamin2">
                                <label class="form-check-label" for="jenis_kelamin2">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat"
                                value="<?= $data['alamat']?>" required>
                        </div>
                        <div class=" mb-3">
                            <label for="pilihkelas">Kelas</label>
                            <select class="form-control" name="kelas" id="kelas">
                                <!-- <option value="">--Pilih Kelas--</option> -->
                                <?php
                                echo "<option value=$data[id_kelas]>$data[nama_kelas]</option>";
                                $sql = mysqli_query($db, "SELECT * FROM kelas");
                                    while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                <option value="<?php echo $data['id_kelas'];?>"><?php echo $data['nama_kelas'];?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
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
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $kelas = $_POST['kelas'];

    $query = mysqli_query($db, "UPDATE siswa SET nis='$nis', nama='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat', id_kelas='$kelas' WHERE nis=$id");
    
    if($query){
        echo "<script>alert('Data berhasil diupdate!'); window.location='data_siswa.php';</script>";
    } else {
        echo 'Data Gagal ditambahkan';
    }
}
