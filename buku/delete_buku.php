<?php
include '../config.php';

$id = $_GET['id_buku'];
$qdata = mysqli_query($db, "SELECT cover FROM buku WHERE id_buku = '$id'");
$data = mysqli_fetch_array($qdata);
$delete = mysqli_query($db, "DELETE FROM buku WHERE id_buku='$id'");

unlink("./../asset/img/" . $data['cover']);

if ($delete) { ?>
    <script>
        alert("Berhasil menghapus!");
        document.location = "home_buku.php";
    </script>
<?php
} else {
    echo "gagal menghapus";
}

?>
