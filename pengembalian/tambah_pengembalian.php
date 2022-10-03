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
    include "../layout/navbar_petugas.php";
    ?>
    <div id="layoutSidenav">
        <?php
            include "../layout/sidebar_petugas.php";
            ?>
    </div>
    <div id="layoutSidenav_content" class="w-75" style="position: relative; left: 20%; margin-top: 100px;">
        <div class="container tabel">
            <div class="card mt-5">
                <div class="card-header text-white" style="background-color: #827397;">Tambah Data Pengembalian</div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">ID Peminjaman</label>
                            <select class="form-select" aria-label="Default select example" name="id_peminjaman">
                                <?php
                                $ambil = mysqli_query($db, "SELECT * FROM peminjaman");
                                while ($data = mysqli_fetch_array($ambil)) {
                                ?>
                                <option value="<?= $data['id_peminjaman'] ?>"><?= $data['id_peminjaman'];?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Pengembalian</label>
                            <input type="date" class="form-control" name="tanggal_pengembalian">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ada</label>
                            <input type="number" class="form-control" name="ada">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hilang</label>
                            <input type="number" class="form-control" name="hilang">
                        </div>
                        <!-- <div class="mb-3">
                            <label class="form-label">Denda</label>
                            <input type="number" class="form-control" name="denda">
                        </div> -->
                        <button type="submit" class="btn btn-primary" value="simpan" name="submit">Simpan</button>
                        <a class="btn btn-danger" type="button" href=" ../pengembalian/home_pengembalian.php">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
        <script src="assets/bootstrap/js/bootstrap.bundle.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous">
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
    $ada = $_POST['ada'];
    $hilang = $_POST['hilang'];
    
    
    $query1 = mysqli_query($db, "SELECT * FROM peminjaman WHERE id_peminjaman='$id_peminjaman' ");
    $result = mysqli_fetch_assoc($query1);
    $tanggal_hrskembali = $result['tanggal_pengembalian'];
    
    $diff = date_diff(date_create($tanggal_hrskembali), date_create($tanggal_pengembalian));
    $hari = $diff->format('%a');

    $denda = $hari*1000;
    
    $query = mysqli_query($db, "INSERT INTO pengembalian(id_peminjaman,tanggal_pengembalian,denda) VALUES('$id_peminjaman','$tanggal_pengembalian','$denda')");

    if ($query){
        $last_id = mysqli_insert_id($db);
        $query2 = mysqli_query($db, "INSERT INTO detail_pengembalian(id_pengembalian, ada, hilang) VALUES ('$last_id', '$ada', '$hilang')");
        if ($query2){
            echo "<script>alert('Berhasil mengembalikan buku!')</script>";
            echo "<script>window.location.href='home_pengembalian.php'</script>";
        }
    }
    // if ($query) {
    //     $maxid = mysqli_query($db, "SELECT MAX(id_pengembalian) as id_p FROM pengembalian");
    //     $max = mysqli_fetch_array($maxid);

    //     echo '<script>window.location.href="detail_pengembalian.php?id_pgm=' . $max['id_p'] . '";</script>';
    // } else {
    //     echo 'data gagal ditambah';
    // }
}
?>