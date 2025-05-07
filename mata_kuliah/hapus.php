<?php include '../config/koneksi.php';
$id = $_GET['id'];
$koneksi->query("DELETE FROM mata_kuliah WHERE id=$id");
header("Location: index.php");
