<?php
include 'config.php';

$id = $_GET['id_mhs'];
$qdata = mysqli_query($db, "select foto from mahasiswa where id_mahasiswa = '$id'");
$data = mysqli_fetch_array($qdata);
$delete = mysqli_query($db, "delete from mahasiswa where id_mahasiswa='$id'");

unlink("img/" . $data['foto']);

if ($delete) {
?> <script>
        alert("menghapus");
        document.location = "index2.php";
    </script>
<?php
} else {
    echo "gagal";
}
?>