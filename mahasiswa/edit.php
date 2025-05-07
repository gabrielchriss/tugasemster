<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM mahasiswa WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="assets/style.css"> <!-- jika ingin external -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding: 30px;
            background-color: #007BFF;
            color: white;
            margin: 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 40px;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
            margin-top: 40px;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .form-container input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #218838;
        }

        .watermark {
            position: fixed;
            bottom: 10px;
            width: 100%;
            text-align: center;
            color: rgba(0, 0, 0, 0.3);
            font-size: 14px;
            font-style: italic;
            z-index: 999;
        }
    </style>
</head>
<body>
    <h1>Edit Mahasiswa</h1>

    <div class="form-container">
        <h2>Edit Data Siswa</h2>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <label for="npm">NPM:</label>
            <input type="text" id="npm" name="npm" value="<?= $data['npm'] ?>" required>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?= $data['nama'] ?>" required>

            <label for="jurusan">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan" value="<?= $data['jurusan'] ?>" required>

            <input type="submit" value="Update">
        </form>
    </div>

    <footer class="watermark">
        &copy; 2025 Sistem Akademik - Dibuat oleh Gabriel Christopher
    </footer>
</body>
</html>
