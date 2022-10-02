<?php

include '../config.php';

if (isset($_POST['submit'])) {
    $id_buku = $_POST['id_buku'];
    $penulis = $_POST['penulis'];
    $judul = $_POST['judul'];
    $tahun = $_POST['tahun'];
    $penerbit = $_POST['penerbit'];
    $kota = $_POST['kota'];
    $sinopsis = $_POST['sinopsis'];
    $stok = $_POST['stok'];
    $cover = $_FILES['cover']['name'];
    $tmp_name = $_FILES['cover']['tmp_name'];
    move_uploaded_file($tmp_name, "./../assets/img/" . $cover);

    $query = mysqli_query($db, "INSERT INTO buku(penulis, judul, tahun, penerbit, kota, sinopsis, stok, cover) values ('$penulis', '$judul', '$tahun', '$penerbit', '$kota', '$sinopsis', '$stok', '$cover')");

    if ($query) {
        header("location:home_buku.php");
    }
}

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
        
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="form-wrapper">
                                <div class="judul text-center my-4">
                                    <h3>Tambah Buku</h3>
                                </div>
                                <!-- start form -->
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <div class="input-1 w-50 ms-auto">                                                
                                                <div class="mb-3">
                                                    <label class="form-label">Penulis</label>
                                                    <input type="text" class="form-control" name="penulis">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Judul</label>
                                                    <input type="text" class="form-control" name="judul">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Tahun</label>
                                                    <input type="number" class="form-control" min="1900" max="2099" name="tahun">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Penerbit</label>
                                                    <input type="text" class="form-control" name="penerbit">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-2 w-50">
                                                <div>
                                                    <label class="form-label">Kota</label>
                                                    <input type="text" class="form-control" name="kota">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Sinopsis</label>
                                                    <textarea name="sinopsis" class="form-control" rows="3"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Stok</label>
                                                    <input type="number" class="form-control" name="stok">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Cover</label>
                                                    <input type="file" class="form-control" name="cover">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary" name="submit">Gasss</button>
                                    </div>
                                </form>
                                <!-- end form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
