<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$data = $koneksi->query( "DELETE FROM mahasiswa WHERE id=$id");
header("Location: index.php");
?>
