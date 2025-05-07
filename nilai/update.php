<?php include '../config/koneksi.php';
$id = $_POST['id'];
$mahasiswa_id = $_POST['mahasiswa_id'];
$mata_kuliah_id = $_POST['mata_kuliah_id'];
$nilai = $_POST['nilai'];

$koneksi->query("UPDATE nilai SET mahasiswa_id='$mahasiswa_id', mata_kuliah_id='$mata_kuliah_id', nilai='$nilai' 
                 WHERE id=$id");
header("Location: index.php");
