<?php
include '../config.php';

$id = $_GET['nip'];
$delete = mysqli_query($db, "DELETE FROM petugas WHERE nip='$id'");

if ($delete) { ?>
    <script>
        alert("Berhasil menghapus!");
        document.location = "home_petugas.php";
    </script>
<?php 
} else {
    echo "gagal menghapus";
}

?>
