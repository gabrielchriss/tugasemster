<?php include '../config/koneksi.php';?>
<h2>Data Mata Kuliah</h2>
<link rel="stylesheet" href="../assets/style.css">

<a href="tambah.php">+ Tambah Mata Kuliah</a>
<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Kode MK</th>
        <th>Nama MK</th>
        <th>SKS</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    $data = $koneksi->query("SELECT * FROM mata_kuliah");
    while($row = $data->fetch_assoc()):
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['kode_mk'] ?></td>
        <td><?= $row['nama_mk'] ?></td>
        <td><?= $row['sks'] ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
    <!-- Tabel transkrip atau konten lainnya -->

    <!-- Tambahin tombol ini di bawah semua konten -->
    <div style="text-align: center; margin-top: 30px;">
        <button onclick="history.back()" style="padding: 10px 20px; background-color: #6c757d; color: white; border: none; border-radius: 5px; cursor: pointer;">← Kembali</button>
        <a href="../index.php">
            <button style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">🏠 Home</button>
        </a>
    </div>

</body>
</html>
