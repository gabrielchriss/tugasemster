<?php include '../config/koneksi.php'; 
$jadwal = $koneksi->query("SELECT jk.*, mk.nama_mk AS nama_mk FROM jadwal_kuliah jk 
                           JOIN mata_kuliah mk ON jk.mata_kuliah_id = mk.id");
?>

<h2>Data Jadwal Kuliah</h2>
<link rel="stylesheet" href="../assets/style.css">

<a href="tambah.php">+ Tambah Jadwal</a>
<table border="1" cellpadding="10">
    <tr>
        <th>No</th><th>Mata Kuliah</th><th>Hari</th><th>Jam</th><th>Ruang</th><th>Aksi</th>
    </tr>
    <?php $no = 1; while($row = $jadwal->fetch_assoc()): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama_mk'] ?></td>
        <td><?= $row['hari'] ?></td>
        <td><?= $row['jam_mulai'] ?> - <?= $row['jam_selesai'] ?></td>
        <td><?= $row['ruang'] ?></td>
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
