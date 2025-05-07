<?php include '../config/koneksi.php';
$mahasiswa_id = $_POST['mahasiswa_id'];
$mata_kuliah_id = $_POST['mata_kuliah_id'];
$nilai = $_POST['nilai'];

$koneksi->query("INSERT INTO nilai (mahasiswa_id, mata_kuliah_id, nilai) 
                 VALUES ('$mahasiswa_id', '$mata_kuliah_id', '$nilai')");
header("Location: index.php");
