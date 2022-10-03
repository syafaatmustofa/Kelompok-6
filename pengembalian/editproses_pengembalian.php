<?php
include '../config.php';

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

?>