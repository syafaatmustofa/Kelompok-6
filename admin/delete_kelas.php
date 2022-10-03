<?php 
include '../config.php';
$id_kelas = $_GET['id_kelas'];
$delete = mysqli_query($db, "DELETE FROM kelas WHERE id_kelas=$id_kelas");

if ($delete) { ?>
    <script>
        alert("Berhasil menghapus!");
        document.location = "../admin/kelas.php";
    </script>
<?php
} else {
    echo "gagal menghapus";
}
?>