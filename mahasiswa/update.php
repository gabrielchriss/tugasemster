<?php
include '../config/koneksi.php';

$id = $_POST['id'];
$npm = $_POST['npm'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];

$data = $koneksi->query( "UPDATE mahasiswa SET npm='$npm', nama='$nama', jurusan='$jurusan' WHERE id=$id");
header("Location: index.php");
?>
