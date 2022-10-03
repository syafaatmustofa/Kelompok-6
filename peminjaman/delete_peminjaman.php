<?php
include '../config.php';

$id = $_GET['id_peminjaman'];
$delete = mysqli_query($db, "DELETE FROM peminjaman WHERE id_peminjaman='$id'");

if ($delete) {
?> <script>
        alert("menghapus");
        document.location = "home_peminjaman.php";
    </script>
<?php
} else {
    echo "gagal";
}
?>
