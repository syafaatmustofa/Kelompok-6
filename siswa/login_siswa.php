<?php
include("../config.php");
session_start();

if (isset($_SESSION['nis'])) {
    header('location: home_siswa.php');
    exit;
}

if (isset($_POST["login"])) {
    $username = $_POST["nis"];
    $query = mysqli_query($db, "SELECT * FROM siswa WHERE nis = '$username'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        $_SESSION['nis'] = $data['nis'];
        header('location:home_siswa.php');
    } else { ?>
    <script>
        alert("ora isok")
    </script>
<?php
    }
    ?>
<?php
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class=" container mx-auto p-5 mt-5  bg-secondary bg-opacity-10 border border-secondary">
        <form method="POST">
            <div class="text-center">
                <h1>HALAMAN LOGIN SISWA</h1>
            </div>
            <div class="mb-3 form-group">
                <label for="username">ID Anda</label>
                <input type="password" name="nis" required class="form-control" id="nis" placeholder="Masukkan ID Anda">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" onclick="lihat()">
                <label class="form-check-label">Show</label>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mb-5 w-25 " name="login">login</button>
            </div>
            <div class="text-center">
                <p>masuk sebagai admin <a href="./../admin/login_admin.php" class="admin">klik disini</a> </p>
                <p>masuk sebagai petugas <a href="./../petugas/login_petugas.php" class="siswa">klik disini</a> </p>
        
            </div>
        </form>
    </div>
    <script>
        function lihat() {
            let x = document.getElementById("nis");
            if (x.type == "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
