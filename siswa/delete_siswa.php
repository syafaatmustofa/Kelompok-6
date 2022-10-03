<?php 
include '../config.php';
$id = $_GET['nis'];
mysqli_query($db, "DELETE FROM siswa WHERE nis=$id")or die(mysql_error());

header("location:data_siswa.php?pesan=delete");
?>