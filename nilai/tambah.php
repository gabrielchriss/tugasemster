<?php include '../config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Nilai</title>
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        /* Jika belum dimasukkan di style.css, ini tambahan minimal */
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 40px auto;
        }

        .form-container h2 {
            text-align: center;
            color: #333;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .form-container select,
        .form-container input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Tambah Nilai</h2>
        <form method="post" action="simpan.php">
            <label for="mahasiswa_id">Mahasiswa:</label>
            <select name="mahasiswa_id" required>
                <?php
                $mhs = $koneksi->query("SELECT * FROM mahasiswa");
                while ($row = $mhs->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nama']}</option>";
                }
                ?>
            </select>

            <label for="mata_kuliah_id">Mata Kuliah:</label>
            <select name="mata_kuliah_id" required>
                <?php
                $mk = $koneksi->query("SELECT * FROM mata_kuliah");
                while ($row = $mk->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nama_mk']}</option>";
                }
                ?>
            </select>

            <label for="nilai">Nilai:</label>
            <input type="number" name="nilai" step="0.01" required>

            <button type="submit">Simpan</button>
        </form>
    </div>

</body>
</html>
