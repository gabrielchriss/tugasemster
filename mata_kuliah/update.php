<?php include '../config/koneksi.php';

$id    = $_POST['id'];
$kode  = $_POST['kode_mk'];
$nama  = $_POST['nama_mk'];
$sks   = $_POST['sks'];

$koneksi->query("UPDATE mata_kuliah SET kode_mk='$kode', nama_mk='$nama', sks='$sks' WHERE id=$id");
header("Location: index.php");
