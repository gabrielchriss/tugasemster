<?php include '../config/koneksi.php'; 
$id = $_GET['id'];
$koneksi->query("DELETE FROM jadwal_kuliah WHERE id = $id");
header("Location: index.php");
