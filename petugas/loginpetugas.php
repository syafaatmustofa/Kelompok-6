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
            <h1 class="text-center">LOGIN PETUGAS</h1>
            <div class="card-body">
                <form action="" method="post">
                    <table class="table table-striped">
                        <thead>
                        <tbody>
                                <td>ID Petugas</td>
                                <td><input type="text" class="form-control" name="id_petugas" placeholder="Masukkan Nip"></input></td>
                            </tr>
                            </thead>
                        </tbody>
                    </table>
                    <div class="btn-end text-center">
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
    $id_petugas = $_POST['id_petugas'];

    $query_insert = mysqli_query($db, "INSERT INTO peminjaman
	VALUES ('$id_petugas')");
    if ($query_insert) {
        header("location: history.php");
    } else
        echo "Tidak bisa terhubung";
}

?>