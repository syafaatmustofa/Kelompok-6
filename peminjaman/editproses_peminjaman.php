<?php
include '../config.php';

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

?>
