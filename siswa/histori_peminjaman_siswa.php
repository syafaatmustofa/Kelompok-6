<?php
include "../config.php";
session_start();
$id = $_SESSION['nis'];
?>

<?php
include "../layout/header.php";
?>
<title>Histori Peminjaman</title>
</head>

<body class="sb-nav-fixed">
    <?php 
    include "../layout/navbar_petugas.php";
    ?>
    <div id="layoutSidenav">
        <?php
            include "../layout/sidebar_petugas.php";
            ?>
    </div>
    <div id="layoutSidenav_content" class="w-75" style="position: relative; left: 20%; margin-top: 100px;">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-white" style="background-color: #827397;">Histori Peminjaman</div>
                <div class="card-body">
                    <table class="table table-hover table-bordered bordered-dark mt-4">
                        <thead class=" text-center">
                            <tr>
                                <th scope="col">ID Buku</th>
                                <th scope="col">Cover</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Tanggal Pengembalian</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cetak = mysqli_query($db, "SELECT * FROM buku JOIN detail_peminjaman ON buku.id_buku = detail_peminjaman.id_buku JOIN peminjaman ON detail_peminjaman.id_peminjaman = peminjaman.id_peminjaman WHERE peminjaman.id_siswa = '$id'");
                            while ($data = mysqli_fetch_assoc($cetak)) {
                            ?>
                            <tr>
                                <td> <?php echo $data['id_buku']; ?> </td>
                                <td>
                                    <img src="../assets/img/<?= $data['cover']?>" class="img-thumbnail" alt=""
                                        style="width: 100px;">
                                </td>
                                <td> <?php echo $data['judul']; ?> </td>
                                <td> <?php echo $data['tanggal_pengembalian']; ?> </td>
                                <td> <?php 
                                        $num =$data['id_peminjaman'];
                                                        
                                        $sql = "SELECT *  FROM pengembalian WHERE id_peminjaman = '$num'";
                                        $hitung = mysqli_query($db, $sql);
                                                            $numro = mysqli_num_rows($hitung);
                                                            if($numro == 0){
                                                                if ($tgl > $data['tgl_kembali']) {
                                                                    echo "telat";
                                                                } else {
                                                                    echo "dipinjam";
                                                            }  
                                                        }else{
                                                            echo "dikembalikan";
                                                        }
                                                    ?>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js">
    </script>
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

</body>

</html>