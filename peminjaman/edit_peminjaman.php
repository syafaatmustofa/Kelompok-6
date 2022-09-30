<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php
        $id = $_GET['id_mhs'];
        $ambil = mysqli_query($db, "select  * from mahasiswa where id_mahasiswa='$id'");
        while ($data = mysqli_fetch_array($ambil)) { ?>

            <div class="m-4">
                <form action="editproses.php" method="POST" enctype="multipart/form-data">
                    <div class="m-3">
                        <label class="form-label">id_Mahasiswa</label>
                        <input type="text" class="form-control" readonly name="id_mahasiswa" value="<?= $data['id_mahasiswa']; ?>">
                    </div>
                    <div class="m-3">
                        <label class="form-label">Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama" value="<?= $data['nama']; ?>">
                    </div>
                    <div class="m-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" value="<?= $data['tgl_lahir']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="number" class="form-control" name="nim" value="<?= $data['nim']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jurusan</label>
                        <select class="form-select w-50 mx-auto" aria-label="Default select example " name="jurusan">
                            <option disabled selected>-- Pilih Jurusan --</option>
                            <?php
                            include 'config2.php';

                            $ambil2 = mysqli_query($db, "select * from jurusan");
                            while ($data2 = mysqli_fetch_array($ambil2)) {
                                if ($data['id_jurusan'] == $data2['id_jurusan']) {
                                    echo "<option value=$data2[id_jurusan] selected> $data2[id_jurusan] - $data2[nama_jurusan]</option>";
                                } else {
                                    echo "<option value=$data2[id_jurusan]> $data2[id_jurusan] - $data2[nama_jurusan]</option> ";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto</label>
                        <input type="file" class="form-control w-50 mx-auto" name="foto">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" style="position: relative; left: 25%;">Foto sebelumnya : </label>
                        <img src="img/<?= $data['foto'] ?>" class="rounded" width="70px" alt="" style="display: block; position: relative; left: 25%;">
                        <?php
                        if ($data['foto'] == "") { ?>
                            <img src="https://via.placeholder.com/500x500.png?text=PAS+FOTO+SISWA" width="70px" class="rounded" style="display: block; position: relative; left: 25%;">
                        <?php } ?>
                        <!-- <input type="text" class="form-control w-50 mx-auto" name="foto" value="<?php echo $data['foto']; ?>"> -->
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
                </form>
            </div>
        <?php
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>

<?php
