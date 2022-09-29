<?php
include "../config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <title>Peminjaman</title>
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <h1 class="text-center">REGISTER PEMINJAMAN</h1>
            <div class="card-body">
                <form action="" method="post">
                    <table class="table table-striped">
                        <thead>
                        <tbody>
                            <tr>
                                <td>ID Pengembalian</td>
                                <td><input type="text" class="form-control" name="id_pengembalian" placeholder="Masukkan ID Pengembalian"></input></td>
                            </tr>
                            <tr>
                                <td>ID Peminjaman</td>
                                <td><input type="text" class="form-control" name="id_peminjaman" placeholder="Masukkan ID Peminjaman"></input></td>
                            </tr>
                            <tr>
                                <td>Tanggal Pengembalian</td>
                                <td><input type="date" class="form-control" name="tanggal_pengembalian" placeholder="Masukkan Tanggal Pengembalian"></input></td>
                            </tr>
                            <tr>
                                <td>Denda</td>
                                <td><input type="number" class="form-control" name="denda" placeholder="Masukkan Denda Keterlambatan"></input></td>
                            </tr>
                            </thead>
                        </tbody>
                    </table>
                    <div class="btn-end">
                        <a href="history.php" type="button" class="btn btn-danger"> Kembali </a>
                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $id_pengembalian = $_POST['id_pengembalian'];
    $id_peminjaman = $_POST['id_peminjaman'];
    $tanggal_pengembalian = $_POST['$tanggal_pengembalian'];
    $denda = $_POST['denda'];

    $query_insert = mysqli_query($db, "INSERT INTO pengembalian
	VALUES ('$id_pengembalian', '$id_peminjaman', '$id_tanggal_pengembalian', '$denda')");
    if ($query_insert) {
        header("location: history.php");
    } else
        echo "Tidak bisa terhubung";
}

?>