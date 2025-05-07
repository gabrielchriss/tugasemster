<?php include '../config/koneksi.php';

$data = $koneksi->query("SELECT nilai.*, mahasiswa.nama AS nama_mahasiswa, mata_kuliah.nama_mk 
                         FROM nilai 
                         JOIN mahasiswa ON nilai.mahasiswa_id = mahasiswa.id 
                         JOIN mata_kuliah ON nilai.mata_kuliah_id = mata_kuliah.id");
?>
<h2>Data Nilai</h2>
<link rel="stylesheet" href="../assets/style.css">

<a href="tambah.php">+ Tambah Nilai</a>
<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama Mahasiswa</th>
        <th>Mata Kuliah</th>
        <th>Nilai</th>
        <th>Aksi</th>
    </tr>
    <?php $no = 1; while($row = $data->fetch_assoc()): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama_mahasiswa'] ?></td>
        <td><?= $row['nama_mk'] ?></td>
        <td><?= $row['nilai'] ?></td>
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
