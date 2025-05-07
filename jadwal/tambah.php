<?php include '../config/koneksi.php'; 

$matkul = $koneksi->query("SELECT * FROM mata_kuliah");

if ($_POST) {
    $mk = $_POST['mata_kuliah_id'];
    $hari = $_POST['hari'];
    $mulai = $_POST['jam_mulai'];
    $selesai = $_POST['jam_selesai'];
    $ruang = $_POST['ruang'];

    $koneksi->query("INSERT INTO jadwal_kuliah (mata_kuliah_id, hari, jam_mulai, jam_selesai, ruang)
                     VALUES ('$mk', '$hari', '$mulai', '$selesai', '$ruang')");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Jadwal Kuliah</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        /* Styling untuk body dan form */
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
        .form-container input[type="text"],
        .form-container input[type="time"] {
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

    <h1>Tambah Jadwal Kuliah</h1>

    <!-- Form untuk tambah jadwal kuliah -->
    <div class="form-container">
        <h2>Tambah Data Jadwal Kuliah</h2>
        <form method="POST">
            <label for="mata_kuliah_id">Mata Kuliah:</label>
            <select name="mata_kuliah_id" required>
                <?php while($m = $matkul->fetch_assoc()): ?>
                    <option value="<?= $m['id'] ?>"><?= $m['nama_mk'] ?></option>
                <?php endwhile; ?>
            </select>

            <label for="hari">Hari:</label>
            <input type="text" name="hari" required>

            <label for="jam_mulai">Jam Mulai:</label>
            <input type="time" name="jam_mulai" required>

            <label for="jam_selesai">Jam Selesai:</label>
            <input type="time" name="jam_selesai" required>

            <label for="ruang">Ruang:</label>
            <input type="text" name="ruang" required>

            <button type="submit">Simpan</button>
        </form>
    </div>

    <footer class="watermark">
        &copy; 2025 Sistem Akademik - Dibuat oleh Gabriel Christopher
    </footer>

</body>
</html>
