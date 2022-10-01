<?php
include("../config.php");
session_start();

if (isset($_SESSION['namad'])) {
    header('location: home_admin.php');
    exit;
}

if (isset($_POST["login"])) {
    $username = $_POST["namad"];
    $password = $_POST["password"];
    $query = mysqli_query($db, "SELECT * FROM user WHERE namad = '$username' AND password='$password'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        $_SESSION['namad'] = $data['namad'];
        header('location:index.php');
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
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class=" container mx-auto p-5 mt-5  bg-secondary bg-opacity-10 border border-secondary">
        <form method="POST">
            <div class="text-center">
                <h1>HALAMAN LOGIN</h1>
            </div>
            <div class="mb-3 form-group">
                <label for="username">Username</label>
                <input type="text" name="namad" required class="form-control" id="namad" placeholder="Masukkan Nama Anda">
            </div>
            <div class="mb-3 form-group">
                <label for="password">Password</label>
                <input type="password" name="password" required class="form-control" id="password" placeholder="Masukkan Password Anda">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" onclick="lihat()">
                <label class="form-check-label">Show</label>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mb-5 w-25 " name="login">login</button>
            </div>
            <div class="text-center">
                <p>punya akun ? belum <a href="daftar_admin.php" class="daftar">klik disini</a> </p>
            </div>
        </form>
    </div>
    <script>
        function lihat() {
            let x = document.getElementById("password");
            if (x.type == "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
