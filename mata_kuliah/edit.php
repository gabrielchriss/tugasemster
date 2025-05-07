<?php 
include '../config/koneksi.php';
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM mata_kuliah WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Mata Kuliah</title>
    <link rel="stylesheet" href="assets/style.css"> <!-- jika ada file CSS eksternal -->
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

        .form-container input[type="text"],
        .form-container input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .form-container button[type="submit"]:hover {
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
    <h1>Edit Mata Kuliah</h1>

    <div class="form-container">
        <h2>Edit Data Mata Kuliah</h2>
        <form method="post" action="update.php">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <label for="kode_mk">Kode MK:</label>
            <input type="text" id="kode_mk" name="kode_mk" value="<?= $data['kode_mk'] ?>" required>

            <label for="nama_mk">Nama MK:</label>
            <input type="text" id="nama_mk" name="nama_mk" value="<?= $data['nama_mk'] ?>" required>

            <label for="sks">SKS:</label>
            <input type="number" id="sks" name="sks" value="<?= $data['sks'] ?>" required>

            <button type="submit">Update</button>
        </form>
    </div>

    <footer class="watermark">
        &copy; 2025 Sistem Akademik - Dibuat oleh Gabriel Christopher
    </footer>
</body>
</html>
