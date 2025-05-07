<?php include '../config/koneksi.php'; ?>
<h2>Data Mahasiswa</h2>
<link rel="stylesheet" href="../assets/style.css">

<a href="tambah.php">Tambah Mahasiswa</a>
<table border="1" cellpadding="8">
  <tr><th>No</th><th>NPM</th><th>Nama</th><th>Jurusan</th><th>Aksi</th></tr>
  <?php
  $no = 1;
  $data = $koneksi->query( "SELECT * FROM mahasiswa");
  while($row = $data->fetch_assoc()) {
    echo "<tr>
      <td>$no</td>
      <td>{$row['npm']}</td>
      <td>{$row['nama']}</td>
      <td>{$row['jurusan']}</td>
      <td>
        <a href='edit.php?id={$row['id']}'>Edit</a> | 
        <a href='hapus.php?id={$row['id']}'>Hapus</a>
      </td>
    </tr>";
    $no++;
  }
  ?>
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
