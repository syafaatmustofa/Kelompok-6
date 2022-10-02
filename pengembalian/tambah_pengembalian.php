<?php
include "../config.php";

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan 5 jaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <!-- TABEL -->
    <div class="container mt-2 mb-5">
        <<<<<<< HEAD <h1 class="text-center mb-5">Peminjaman Baru</h1>
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Siswa</label>
                    <select class="form-select" aria-label="Default select example" name="nis">
                        <?php
                    $ambil = mysqli_query($db, "SELECT * FROM siswa");
                    while ($data = mysqli_fetch_array($ambil)) {
                    ?>
                        <option value="<?= $data['nis'] ?>"><?= $data['namas'];?>
                        </option>
                        <h1 class="text-center mb-5">Pengembalian Baru</h1>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">id_peminjaman</label>
                                <select class="form-select" aria-label="Default select example" name="id_peminjaman">
                                    <?php
                                    $ambil = mysqli_query($db, "SELECT * FROM peminjaman JOIN siswa on peminjaman.id_siswa = siswa.nis");
                                    while ($data = mysqli_fetch_array($ambil)) {
                                    ?>
                                    <option value="<?= $data['id_peminjaman'] ?>"><?= $data['namas'];
                                                        } ?></option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Petugas</label>
                                <input type="text" class="form-control" name="nip" value="<?= $_SESSION['nip']; ?>"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Peminjaman</label>
                                <input type="date" class="form-control" name="tanggal_peminjaman">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Pengembalian</label>
                                <input type="date" class="form-control" name="tanggal_pengembalian">
                            </div>
                        </form>
                        <input type="submit" class="btn btn-primary" name="submit" value="submit" />
                        <a href="peminjaman.php" class="btn btn-danger"> Kembali</a>
                        =======
                        <label class="form-label">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" name="tanggal_pengembalian">
                </div>
                <div class="mb-3">
                    <label class="form-label">Denda</label>
                    <input type="number" class="form-control" name="denda">
                </div>
            </form>
            <input type="submit" class="btn btn-primary" name="submit" value="submit" />
            <a href="home_pengembalian.php" class="btn btn-danger"> Kembali</a>
            >>>>>>> f310637f5fb497e9c52b9f6081e31ab0efcd5edb
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    $id_peminjaman = $_POST['id_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $denda = $_POST['denda'];

    $query = mysqli_query($db, "INSERT INTO pengembalian(id_peminjaman,tanggal_pengembalian,denda) VALUES('$id_peminjaman','$tanggal_pengembalian','$denda')");

    if ($query) {
        $maxid = mysqli_query($db, "SELECT MAX(id_pengembalian)as id_p FROM pengembalian");
        $max = mysqli_fetch_array($maxid);

        echo '<script>window.location.href="detail_pengembalian.php?id_pgm=' . $max['id_p'] . '";</script>';
    } else {
        echo 'data gagal ditambah';
    }
}


?>