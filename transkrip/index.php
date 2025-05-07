<?php include '../config/koneksi.php'; 


// Ambil data mahasiswa dan nilai
$query = "SELECT m.npm, m.nama, m.jurusan, mk.nama_mk, mk.sks, n.nilai
          FROM nilai n
          JOIN mahasiswa m ON n.mahasiswa_id = m.id
          JOIN mata_kuliah mk ON n.mata_kuliah_id = mk.id
          ORDER BY m.npm, mk.nama_mk";
$result = $koneksi->query($query);

$currentNPM = '';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Transkrip Nilai</title>
  <style>
    table { border-collapse: collapse; width: 80%; margin: 20px auto; }
    th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
    th { background: #eee; }
    h2 { margin-top: 40px; }
  </style>
</head>
<body>
  <h1 style="text-align:center;">Transkrip Nilai Mahasiswa</h1>

  <?php while($row = $result->fetch_assoc()): ?>
    <?php
      if ($currentNPM != $row['npm']):
        if ($currentNPM != '') echo "</table>";
        $currentNPM = $row['npm'];
    ?>
      <h2 style="text-align:center;">NPM: <?= $row['npm'] ?> | <?= $row['nama'] ?> (<?= $row['jurusan'] ?>)</h2>
      <table>
        <tr>
          <th>Mata Kuliah</th>
          <th>SKS</th>
          <th>Nilai</th>
        </tr>
    <?php endif; ?>
    <tr>
      <td><?= $row['nama_mk'] ?></td>
      <td><?= $row['sks'] ?></td>
      <td><?= $row['nilai'] ?></td>
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

</body>
</html>
<link rel="stylesheet" href="../assets/style.css">
