<?php
include 'config.php';

$id_mahasiswa = $_POST['id_mahasiswa'];
$nama = $_POST['nama'];
$tgl_lahir = $_POST['tgl_lahir'];
$nim = $_POST['nim'];
$jurusan = $_POST['jurusan'];
$foto = $_FILES['foto']['name'];
$tmp_name = $_FILES['foto']['tmp_name'];
move_uploaded_file($tmp_name, "img/" . $foto);

$query = mysqli_query($db, "update mahasiswa set nama='$nama', tgl_lahir='$tgl_lahir', nim='$nim', id_jurusan='$jurusan', foto='$foto'  where id_mahasiswa='$id_mahasiswa'");

if ($query) {
    header("location:index2.php");
}
