<?php
include '../config.php';

if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  $sqlcek = mysqli_query($db, "SELECT * FROM petugas WHERE nama='$nama'");
  $cek = mysqli_num_rows($sqlcek);

  if ($cek > 0) {
    echo "<script> alert('Petugas sudah ada') </script>";
  } else if ($password !== $cpassword) {
    echo "<script>alert('Password harus sama!')</script>";
  } else {
    $query = mysqli_query($db, "INSERT INTO petugas(nama, password) values ('$nama', '$password')");

    if ($query) {
      echo "<script>alert('Petugas berhasil ditambahkan')</script>";
      echo '<script>window.location.href="login_petugas.php"</script>';
    } else {
      echo "<script>alert('Gagal menambahkan petugas')</script>";
      echo '<script>window.location.href="daftar_petugas.php"</script>';
    }
  }
}

?>

<?php
include "../layout/header.php";
?>
<title>Petugas</title>
</head>

<body class="sb-nav-fixed">
    <?php 
    include "../layout/navbar_admin.php";
    ?>
    <div id="layoutSidenav">
        <?php
            include "../layout/sidebar_admin.php";
            ?>
    </div>
    <div id="layoutSidenav_content" class="w-75 h-100" style="position: relative; left: 20%; margin-top: 100px;">
        <div class="container">
            <div class="card mt-5 mb-5">
                <div class="card-header text-white" style="background-color: #827397;">Tambah Data Petugas</div>
                <div class="card-body mb-3">
                    <form class="mt-1" action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label">NIP</label>
                            <input type="text" class="form-control" name="nip" id="nis"
                                placeholder="Masukkan NIP Petugas" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Petugas</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                placeholder="Masukkan Nama Petugas" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" required aria-label="Default select example"
                                name="jenis_kelamin">
                                <option disabled selected value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat"
                                placeholder="Masukkan Alamat" required>
                        </div>
                        <button type="submit" class="btn btn-primary" value="simpan" name="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
    </script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous">
    </script>
    <script src="../assets/js/datatables-simple-demo.js"></script>

    <script>
    function lihat() {
        let x = document.getElementById("password");
        let y = document.getElementById("cpassword");
        if (x.type == "password" && y.type == "password") {
            x.type = "text";
            y.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
        }
    }

    function check() {
        if (document.getElementById('password').value == document.getElementById('cpassword').value) {
            document.getElementById('cek_password').style.color = 'green';
            document.getElementById('cek_password').innerHTML = 'Password sama';
        } else {
            document.getElementById('cek_password').style.color = 'red';
            document.getElementById('cek_password').innerHTML = 'Password tidak sama';
        }
    }
    </script>

</body>

</html>