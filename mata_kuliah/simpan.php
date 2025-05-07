<?php include '../config/koneksi.php';

$kode = $_POST['kode_mk'];
$nama = $_POST['nama_mk'];
$sks  = $_POST['sks'];

$koneksi->query("INSERT INTO mata_kuliah (kode_mk, nama_mk, sks) VALUES ('$kode', '$nama', '$sks')");
header("Location: index.php");
