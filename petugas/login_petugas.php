<?php
include("../config.php");
session_start();

if (isset($_SESSION['nip'])) {
    header('location: home_petugas.php');
    exit;
}

if (isset($_POST["login"])) {
    $username = $_POST["nip"];
    $query = mysqli_query($db, "SELECT * FROM petugas WHERE nip = '$username'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        $_SESSION['nip'] = $data['nip'];
        header('location:home_petugas.php');
    } else { ?>
<script>
alert("Akun tidak terdaftar!")
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
    <title>Login Page</title>
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
    <div class="form-wrapper">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="my-1 text-center">
                        <h3 class="font-weight-bold mb-3">Halaman Login Petugas</h3>
                        <p class="text-muted">Login MyLibrary untuk melanjutkan.</p>
                    </div>
                    <form method="POST">
                        <div class="form-group">
                            <label for="username">NIP</label>
                            <div class="form-icon-wrapper">
                                <input type="password" name="nip" required class="form-control" id="nip"
                                    placeholder="Masukkan NIP Anda">
                                <i class="form-icon-left mdi mdi-email"></i>
                                <a class="form-icon-right password-show-hide" title="Hide or show password">
                                    <i class="mdi mdi-eye"></i>
                                </a>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block mb-2" name="login">Login</button>
                        </div>
                        <div class="text-divider">atau</div>
                        <div class="account-links justify-content-center">
                            <a href="../siswa/login_siswa.php" class="btn text-white mb-3 text-center"
                                style="width: 100%;background-color:#827397">Login
                                sebagai Siswa</a>
                            <br>
                            <a href="../admin/login_admin.php" class="btn text-white text-center"
                                style="width: 100%;background-color:#827397">Login
                                sebagai Admin</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class=" container mx-auto p-5 mt-5  bg-secondary bg-opacity-10 border border-secondary">
        <form method="POST">
            <div class="text-center">
                <h1>HALAMAN LOGIN PETUGAS</h1>
            </div>
            <div class="mb-3 form-group">
                <label for="username">ID Anda</label>
                <input type="password" name="nip" required class="form-control" id="nip" placeholder="Masukkan ID Anda">
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
                <p>masuk sebagai siswa <a href="./../siswa/login_siswa.php" class="siswa">klik disini</a> </p>
        
            </div>
        </form>
    </div>
    <script>
        function lihat() {
            let x = document.getElementById("nip");
            if (x.type == "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script> -->
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Jquery -->
    <script src="../assets/dist/vendor/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../assets/dist/vendor/bootstrap-4.5.3/js/bootstrap.min.js"></script>
    <!-- Latform scripts -->
    <script src="../assets/dist/js/latform.min.js"></script>
</body>

</html>