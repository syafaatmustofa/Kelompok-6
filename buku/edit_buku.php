<?php
include "../config.php";
$id = $_GET['id_buku'];
?>

<?php
include "../layout/header.php";
?>
<title>Edit Buku</title>
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
                <div class="card-header text-white" style="background-color: #827397;">Edit Data Buku</div>
                <div class="card-body mb-3">
                    <form action="editproses_buku.php" method="post" enctype="multipart/form-data">
                        <?php
                                    $id = $_GET['id_buku'];
                                    $ambil = mysqli_query($db, "SELECT * FROM buku WHERE id_buku='$id'");
                                    while ($data = mysqli_fetch_array($ambil)) {
                                    ?>
                        <div class="row mb-3">
                            <div class="col-6">
                                <div class="input-1 w-50 ms-auto">
                                    <div class="mb-3">
                                        <label class="form-label" for="idm">ID Buku</label>
                                        <input type="text" id="idm" class="form-control" readonly name="id_buku"
                                            value="<?php echo $data['id_buku']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Penulis</label>
                                        <input type="text" class="form-control" name="penulis"
                                            value="<?php echo $data['penulis']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Judul</label>
                                        <input type="text" class="form-control" name="judul"
                                            value="<?php echo $data['judul']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tahun</label>
                                        <input type="number" class="form-control" min="1900" max="2099" name="tahun"
                                            value="<?php echo $data['tahun']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Penerbit</label>
                                        <input type="text" class="form-control" name="penerbit"
                                            value="<?php echo $data['penerbit']; ?>">
                                    </div>
                                    <div>
                                        <label class="form-label">Kota</label>
                                        <input type="text" class="form-control" name="kota"
                                            value="<?php echo $data['kota']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-2 w-50">
                                    <div class="mb-3">
                                        <label class="form-label">Sinopsis</label>
                                        <textarea name="sinopsis" class="form-control"
                                            rows="3"><?php echo $data['sinopsis']; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Stok</label>
                                        <input type="number" class="form-control" name="stok"
                                            value="<?php echo $data['stok']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Cover</label>
                                        <input type="file" class="form-control" name="cover">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label d-block">Cover sebelumnya : </label>
                                        <img src="./../assets/img/<?= $data['cover'] ?>" class="rounded" width="70px"
                                            alt="">
                                        <?php
                                                        if ($data['cover'] == "") { ?>
                                        <img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+SISWA"
                                            width="70px" class="rounded">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                        <?php
                                    }
                                    ?>
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

$id_buku= $_POST['id_buku'];
$penulis = $_POST['penulis'];
$judul = $_POST['judul'];
$tahun = $_POST['tahun'];
$penerbit = $_POST['penerbit'];
$kota = $_POST['kota'];
$sinopsis = $_POST['sinopsis'];
$stok = $_POST['stok'];
$cover = $_FILES['cover']['name'];
$tmp_name = $_FILES['cover']['tmp_name'];
move_uploaded_file($tmp_name, "./../assets/img/".$cover);

$query = mysqli_query($db, "UPDATE buku SET penulis='$penulis', tahun='$tahun', judul='$judul', kota='$kota', penerbit='$penerbit', cover='$cover', sinopsis='$sinopsis', stok='$stok' WHERE id_buku='$id_buku'");

if($query) {
    header ("location:home_buku.php");
}

?>