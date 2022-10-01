<?php
include '../config.php';

$id = $_GET['id_pgm'];
$delete = mysqli_query($db, "DELETE FROM pengembalian WHERE id_pengembalian='$id'");

if ($delete) {
?> <script>
        alert("menghapus");
        document.location = "home_pengembalian.php";
    </script>
<?php
} else {
    echo "gagal";
}
?>
