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
    move_uploaded_file($tmp_name, "../bootstrap/img/" . $cover);

    $query = mysqli_query($db, "INSERT INTO buku(penulis, judul, tahun, penerbit, kota, sinopsis, stok, cover) values ('$penulis', '$judul', '$tahun', '$penerbit', '$kota', '$sinopsis', '$stok', '$cover')");

    if ($query) {
        header("location:home_buku.php");
    }
}

?>
