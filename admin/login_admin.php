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
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../assets/dist/vendor/bootstrap-4.5.3/css/bootstrap.min.css" type="text/css">
    <!-- Material design icons -->
    <link rel="stylesheet" href="../assets/dist/icons/material-design-icons/css/mdi.min.css" type="text/css">
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
    <!-- Latform styles -->
    <link rel="stylesheet" href="../assets/dist/css/latform-style-1.min.css" type="text/css">
</head>

<body>
    <div class="form-wrapper" method="POST">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="my-5 text-center">
                        <h3 class="font-weight-bold mb-3">Login</h3>
                        <p class="text-muted">Login to MyLibrary to continue</p>
                    </div>
                    <form>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <div class="form-icon-wrapper">
                                <input type="text" name="namad" required class="form-control" id="namad"
                                    placeholder="Masukkan Nama Anda">
                                <i class="form-icon-left mdi mdi-email"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="form-icon-wrapper">
                                <input type="password" name="password" required class="form-control" id="password"
                                    placeholder="Masukkan Password Anda">
                                <i class="form-icon-left mdi mdi-lock"></i>
                                <a href="#" class="form-icon-right password-show-hide" title="Hide or show password">
                                    <i class="mdi mdi-eye"></i>
                                </a>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
                        </div>
                        <p class="text-center">
                            Belum punya akun?
                            <a href="daftar_admin.php">Klik Disini</a>.
                        </p>
                        <div class="text-divider">atau</div>
                        <div class="account-links justify-content-center">
                            <a href="login_siswa.php" class="btn text-white mb-3 text-center"
                                style="width: 100%;background-color:#827397">Login
                                sebagai Siswa</a>
                            <br>
                            <a href="login_petugas.php" class="btn text-white text-center"
                                style="width: 100%;background-color:#827397">Login
                                sebagai Petugas</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="container mx-auto p-5 mt-5  bg-secondary bg-opacity-10 border border-secondary">
        <form method="POST">
            <div class="text-center">
                <h1>HALAMAN LOGIN</h1>
            </div>
            <div class="mb-3 form-group">
                <label for="username">Username</label>
                <input type="text" name="namad" required class="form-control" id="namad"
                    placeholder="Masukkan Nama Anda">
            </div>
            <div class="mb-3 form-group">
                <label for="password">Password</label>
                <input type="password" name="password" required class="form-control" id="password"
                    placeholder="Masukkan Password Anda">
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
    </div> -->
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Jquery -->
    <script src="../assets/dist/vendor/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../assets/dist/vendor/bootstrap-4.5.3/js/bootstrap.min.js"></script>
    <!-- Latform scripts -->
    <script src="../assets/dist/js/latform.min.js"></script>
</body>

</html>