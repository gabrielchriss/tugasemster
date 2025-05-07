<?php
include '../config/koneksi.php';

$npm = $_POST['npm'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];

$data = $koneksi->query( "INSERT INTO mahasiswa (npm, nama, jurusan) VALUES ('$npm', '$nama', '$jurusan')");
header("Location: index.php");
?>