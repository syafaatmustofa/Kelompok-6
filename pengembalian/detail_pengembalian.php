<?php
include "../config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Detail Pengembalian</title>
    <style>
        *,
        html,
        body {
            padding: 0;
            margin: 0;
        }

        .sidebar {

            position: absolute;
            padding-top: 50px;
            width: 150px;
            height: 100vh;
            background-color: #FF884B;
        }

        .accordion-item {
            background-color: #FF884B;
            border: none;
            width: 138px;
        }

        .accordion-body a {
            justify-content: center;
            align-items: center;
            color: black;
            text-decoration: none;
        }

        .accordion-button {
            background-color: #FF884B;
            border: none;
            width: 100px;
        }

        .tabel {
            margin-left: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: fit-content;
        }

        .icon {
            width: 200px;
            font-size: 2em;
        }
    </style>
</head>

<body>
    <!-- Membuat Navbar : Nur -->
    <nav class="navbar navbar-expand-lg" style="background-color: #FF884B;">
        <div class="container">
            <a class="navbar-brand" href="#">My Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active">HOME</a>
                    </li>
                </ul>
                <a class="nav-link active"><button class="btn btn-danger">Logout</button></a>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar : Nur -->
    <!-- sidebar -->
    <div class="sidebar d-inline-flex">
        <div class="container position-relative">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="icon bi bi-book pe-2 "></i>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a href="buku.php">Melihat Buku</a>
                        </div>
                    </div>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a href="crudbuku.php">Menambah Buku</a>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="icon bi bi-bag-plus pe-2"></i>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a href="peminjaman.php">Menambahan Peminjaman</a>
                        </div>
                    </div>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a href="history.php">History Peminjaman</a>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="icon bi bi-bag-check pe-2"></i>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a href="pengembalian.php">Menambahan Pengembalian</a>
                        </div>
                    </div>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <a href="history.php">History Pengembalian</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar -->

            <!-- a -->
            <div class="container tabel">
                <div class="card mt-5">
                    <div class="card-header" style="background-color: #f7f7f7;"><h1 class="mx-auto">DETAIL PENGEMBALIAN</h1></div>
                    <div class="card-body">
                        <!-- search -->
                        <div class="container">
                            <form action= class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                        <!-- search -->
                        <form action="" method="post" enctype="multipart/form-data">
			<table class="table">
				<tbody>
				<?php
					$ambil = mysqli_query($db, "SELECT * FROM detail_pengembalian JOIN pengembalian on  detail_pengembalian.id_pengembalian = pengembalian.id_pengembalian");
					while($data = mysqli_fetch_assoc($ambil)) {
				?>
                    <tr>
						<td>Cover</td>
						<td><img src="../assets/cover/<?php echo $data['cover'] ?>" class= "img-thumbnail" alt="" style="width: 100px;"></td>
					</tr>
					<tr>
						<td>ID Pengembembalian</td>
						<td><input type="text" class="form-control" name="id_pengembalian" value="<?php echo $data['id_pengembalian'] ?>" readonly></input></td>
					</tr>
					<tr>
					<td>Jumlah Ada</td>
					<td><input type="text" class="form-control" name="ada" value="<?php echo $data['ada'] ?>" readonly</input></td>
					</td>
					<tr>
						<td>Jumlah Hilang</td>
						<td><input type="text" class="form-control" name="hilang"value="<?php echo $data['hilang'] ?>" readonly</input></td>
					</tr>
					
					<?php
						}
					?>
				</tbody>
			</table>
			<div class="text-end">
			<a href="home_pengembalian.php" type="button" class="btn btn-danger"> Kembali </a>
			<button type="submit" name="submit" class="btn btn-success">Submit</button>
		</div>
		</form>
	</div>
                        <div class="text-center">
                            <a href="home_pengembalian.php" type="button" class="btn btn-danger"> Kembali </a>
                    </div>
                </div>
            </div>
            
                <!-- a -->
                <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
