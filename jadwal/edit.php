<?php 
include '../config/koneksi.php'; 
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM jadwal_kuliah WHERE id = $id")->fetch_assoc();
$matkul = $koneksi->query("SELECT * FROM mata_kuliah");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mk = $_POST['mata_kuliah_id'];
    $hari = $_POST['hari'];
    $mulai = $_POST['jam_mulai'];
    $selesai = $_POST['jam_selesai'];
    $ruang = $_POST['ruang'];

    $koneksi->query("UPDATE jadwal_kuliah SET 
                    mata_kuliah_id='$mk', hari='$hari', 
                    jam_mulai='$mulai', jam_selesai='$selesai', 
                    ruang='$ruang' WHERE id=$id");
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Jadwal Kuliah</title>
    <link rel="stylesheet" href="assets/style.css"> <!-- Jika pakai file eksternal -->
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
            width: 320px;
            margin: 40px auto;
        }

        .form-container label {
            display: block;
            margin-bottom: 6px;
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
    <h1>Edit Jadwal Kuliah</h1>

    <div class="form-container">
        <h2>Form Edit Jadwal</h2>
        <form method="POST">
            <label for="mata_kuliah_id">Mata Kuliah:</label>
            <select name="mata_kuliah_id" id="mata_kuliah_id" required>
                <?php while($m = $matkul->fetch_assoc()): ?>
                    <option value="<?= $m['id'] ?>" <?= $data['mata_kuliah_id'] == $m['id'] ? 'selected' : '' ?>>
                        <?= $m['nama_mk'] ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label for="hari">Hari:</label>
            <input type="text" name="hari" id="hari" value="<?= $data['hari'] ?>" required>

            <label for="jam_mulai">Jam Mulai:</label>
            <input type="time" name="jam_mulai" id="jam_mulai" value="<?= $data['jam_mulai'] ?>" required>

            <label for="jam_selesai">Jam Selesai:</label>
            <input type="time" name="jam_selesai" id="jam_selesai" value="<?= $data['jam_selesai'] ?>" required>

            <label for="ruang">Ruang:</label>
            <input type="text" name="ruang" id="ruang" value="<?= $data['ruang'] ?>" required>

            <button type="submit">Update</button>
        </form>
    </div>

    <footer class="watermark">
        &copy; 2025 Sistem Akademik - Dibuat oleh Gabriel Christopher
    </footer>
</body>
</html>
