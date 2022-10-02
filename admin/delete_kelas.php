<?php 
include '../config.php';
$id_kelas = $_GET['id_kelas'];
mysqli_query($db, "DELETE FROM kelas WHERE id_kelas=$id_kelas")or die(mysql_error());

header("location:kelas.php?pesan=delete");
?>